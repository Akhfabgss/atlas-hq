<?php
/**
 * Template Name: Single Event Detail
 * Description: Template dinamis untuk CPT Event, Webinar, dan Pelatihan Teknis
 */

get_header();

// =========================================================================
// HELPER FUNCTIONS CONVERT DATE & TIME
// =========================================================================

function format_indo_date($date_raw) {
    if (empty($date_raw)) return '';

    // Jika format input mengandung slash seperti 18/10/2026 atau 18-10-2026
    if (strpos($date_raw, '/') !== false) {
        $parts = explode('/', $date_raw);
        if (count($parts) === 3) {
            $date_raw = $parts[2] . '-' . $parts[1] . '-' . $parts[0];
        }
    } elseif (strpos($date_raw, '-') !== false) {
        $parts = explode('-', $date_raw);
        if (count($parts) === 3 && strlen($parts[0]) === 2) {
            $date_raw = $parts[2] . '-' . $parts[1] . '-' . $parts[0];
        }
    }

    $timestamp = strtotime($date_raw);
    if (!$timestamp) return $date_raw;

    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    
    $d = date('j', $timestamp);
    $m = (int)date('n', $timestamp);
    $y = date('Y', $timestamp);

    return "{$d} {$bulan[$m]} {$y}";
}

function format_clean_time($time_raw) {
    if (empty($time_raw)) return '';
    
    $timestamp = strtotime($time_raw);
    if (!$timestamp) return $time_raw;

    return date('H:i', $timestamp) . ' WIB';
}

// =========================================================================
// AMBIL DATA DINAMIS DARI ACF & DATABASE
// =========================================================================

$title        = get_the_title();
$category     = get_field('event_category') ?: 'Seminar & Webinar';
$type         = get_field('event_type') ?: 'Webinar Daring (Zoom)';
$status       = get_field('event_status') ?: 'Open for Registration';
$is_open     = get_field('event_is_open'); // Boolean (true/false)

// Meta Jadwal & Narasumber (TERCONVERT)
$raw_date     = get_field('event_date');
$date         = !empty($raw_date) ? format_indo_date($raw_date) : get_the_date('j F Y');

$raw_time     = get_field('event_time');
$time         = !empty($raw_time) ? format_clean_time($raw_time) : '09:00 - 12:00 WIB';

$location     = get_field('event_location') ?: 'Jakarta Head Office / Online';
$speakers     = get_field('event_speakers') ?: 'Tim Komite Teknis PT Atlas Adjusting Indonesia';

// Narasi & Detail
$description  = get_field('event_description') ?: get_the_content();
$overview     = get_field('event_overview');
$registration = get_field('event_registration_url') ?: home_url('/contact/');

// Featured Image / Banner
$banner_img   = has_post_thumbnail() 
    ? get_the_post_thumbnail_url(get_the_ID(), 'full') 
    : 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=1600';

// Parsing Agenda Rundown
$raw_agenda   = get_field('event_agenda');
$agenda_list  = [];
if ($raw_agenda && is_string($raw_agenda)) {
    $lines = explode("\n", str_replace("\r", "", $raw_agenda));
    foreach ($lines as $line) {
        $data = explode('|', $line);
        if (count($data) >= 2) {
            $agenda_list[] = [
                'time'    => trim($data[0]),
                'topic'   => trim($data[1]),
                'speaker' => isset($data[2]) ? trim($data[2]) : '',
            ];
        }
    }
}

// Parsing Target Audience
$raw_audience = get_field('event_audience');
$audience     = [];
if ($raw_audience && is_string($raw_audience)) {
    $lines = explode("\n", str_replace("\r", "", $raw_audience));
    foreach ($lines as $line) {
        $clean = trim($line);
        if (!empty($clean)) {
            $audience[] = $clean;
        }
    }
}
?>

<main id="main-content" class="site-main font-sans bg-slate-50 text-slate-900 pb-24 overflow-hidden">

    <!-- 1. HERO SHOWCASE SECTION -->
    <section class="relative bg-slate-950 text-white pt-24 pb-48 overflow-hidden font-sans">
        <img 
            src="<?php echo esc_url($banner_img); ?>" 
            alt="Background Hero Event" 
            class="absolute inset-0 w-full h-full object-cover object-center opacity-20 filter blur-sm scale-105 pointer-events-none"
        />
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/80 via-slate-950/90 to-slate-950"></div>

        <div class="container mx-auto px-6 max-w-6xl relative z-10 space-y-6" data-aos="fade-up" data-aos-duration="800">
            <div>
                <a href="javascript:history.back()" class="inline-flex items-center gap-2.5 text-xs font-bold text-slate-300 hover:text-white transition-all group">
                    <span class="w-8 h-8 rounded-full bg-white/10 group-hover:bg-white/20 flex items-center justify-center transition-colors">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    </span>
                    BACK TO AGENDA
                </a>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-red-600 text-white text-[10px] md:text-xs font-extrabold tracking-wider shadow-md">
                    <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                    <?php echo esc_html($category); ?>
                </span>

                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-slate-200 text-[10px] md:text-xs font-bold tracking-wider">
                    <i data-lucide="video" class="w-3.5 h-3.5 text-red-500"></i>
                    <?php echo esc_html($type); ?>
                </span>
            </div>

            <h1 class="text-3xl sm:text-4xl md:text-5xl font-black tracking-tight leading-tight text-white max-w-4xl">
                <?php echo esc_html($title); ?>
            </h1>

            <?php if (!empty($overview)) : ?>
                <p class="text-slate-300 text-sm md:text-base leading-relaxed max-w-3xl opacity-90 font-medium">
                    <?php echo esc_html($overview); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- 2. FEATURED BANNER IMAGE -->
    <section class="relative z-20 -mt-36 sm:-mt-40 md:-mt-44 pb-12">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="rounded-3xl overflow-hidden shadow-2xl bg-slate-900 border border-white/10 aspect-[16/9] md:aspect-[21/9] w-full group relative" data-aos="zoom-in" data-aos-duration="600">
                <img 
                    src="<?php echo esc_url($banner_img); ?>" 
                    alt="<?php echo esc_attr($title); ?>" 
                    class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-700"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
            </div>
        </div>
    </section>

    <!-- 3. MAIN CONTENT -->
    <section class="py-12 md:py-16">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <div class="lg:col-span-8 space-y-12" data-aos="fade-up" data-aos-duration="800">
                    <div class="space-y-4">
                        <h2 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                            About the Event
                        </h2>
                        <div class="text-slate-600 text-sm md:text-base leading-relaxed font-medium space-y-4">
                            <?php if (!empty($description)) : ?>
                                <?php echo wpautop(esc_html($description)); ?>
                            <?php else : ?>
                                <p>Technical knowledge sessions and industry insight training organized by PT Atlas Adjusting Indonesia to strengthen the understanding of reinsurance risk management.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if (!empty($audience)) : ?>
                        <div class="space-y-4">
                            <h2 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                                Target Audience
                            </h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                                <?php foreach ($audience as $aud) : ?>
                                    <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 border border-red-100">
                                            <i data-lucide="user-check" class="w-4 h-4"></i>
                                        </div>
                                        <span class="font-bold text-slate-800 text-xs md:text-sm"><?php echo esc_html($aud); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($agenda_list)) : ?>
                        <div class="space-y-6">
                            <h2 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                                Rundown & Agenda
                            </h2>

                            <div class="space-y-3">
                                <?php foreach ($agenda_list as $agenda) : ?>
                                    <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-red-500/40 transition-colors">
                                        <div class="flex items-center gap-3 shrink-0">
                                            <span class="px-3 py-1.5 rounded-xl bg-slate-900 text-white text-xs font-mono font-bold">
                                                <?php echo esc_html($agenda['time']); ?>
                                            </span>
                                        </div>
                                        <div class="flex-1 space-y-0.5">
                                            <h4 class="font-black text-slate-900 text-sm md:text-base"><?php echo esc_html($agenda['topic']); ?></h4>
                                            <?php if (!empty($agenda['speaker'])) : ?>
                                                <p class="text-xs text-red-600 font-bold flex items-center gap-1">
                                                    <i data-lucide="mic" class="w-3 h-3"></i>
                                                    <span><?php echo esc_html($agenda['speaker']); ?></span>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- SIDEBAR -->
                <div class="lg:col-span-4 sticky top-24" data-aos="fade-left" data-aos-duration="800">
                    <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-200/80 shadow-lg space-y-6">
                        <div class="items-center justify-between pb-2 border-b border-slate-100">
                            <span class="inline-flex items-center gap-1.5 text-xs font-bold tracking-wider px-3 py-1 mb-3 rounded-full <?php echo ($is_open !== false) ? 'bg-emerald-50 text-emerald-600 border border-emerald-200' : 'bg-slate-100 text-slate-500'; ?>">
                                <span class="w-2 h-2 rounded-full <?php echo ($is_open !== false) ? 'bg-emerald-500 animate-pulse' : 'bg-slate-400'; ?>"></span>
                                <?php echo esc_html($status); ?>
                            </span>
                        </div>

                        <div class="space-y-4 text-xs font-medium text-slate-700">
                            <div class="flex items-start gap-3.5">
                                <div class="w-9 h-9 rounded-xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 border border-red-100">
                                    <i data-lucide="calendar" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <span class="block text-[10px] text-slate-400 font-bold">Date</span>
                                    <span class="text-xs font-extrabold text-slate-900"><?php echo esc_html($date); ?></span>
                                </div>
                            </div>

                            <div class="flex items-start gap-3.5">
                                <div class="w-9 h-9 rounded-xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 border border-red-100">
                                    <i data-lucide="clock" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <span class="block text-[10px] text-slate-400 font-bold">Time</span>
                                    <span class="text-xs font-extrabold text-slate-900"><?php echo esc_html($time); ?></span>
                                </div>
                            </div>

                            <div class="flex items-start gap-3.5">
                                <div class="w-9 h-9 rounded-xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 border border-red-100">
                                    <i data-lucide="map-pin" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <span class="block text-[10px] text-slate-400 font-bold">Location / Access</span>
                                    <span class="text-xs font-extrabold text-slate-900"><?php echo esc_html($location); ?></span>
                                </div>
                            </div>

                            <div class="flex items-start gap-3.5">
                                <div class="w-9 h-9 rounded-xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 border border-red-100">
                                    <i data-lucide="users" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <span class="block text-[10px] text-slate-400 font-bold">Speakers</span>
                                    <span class="text-xs font-extrabold text-slate-900 leading-snug block mt-0.5"><?php echo esc_html($speakers); ?></span>
                                </div>
                            </div>
                        </div>

                        <hr class="border-slate-100" />

                        <?php if ($is_open !== false) : ?>
                            <a href="<?php echo esc_url($registration); ?>" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-red-600 hover:bg-red-500 text-white font-extrabold text-xs tracking-wider rounded-xl transition-all duration-300 shadow-lg shadow-red-600/20 group">
                                <span>Event Registration</span>
                                <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        <?php else : ?>
                            <button disabled class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-slate-200 text-slate-500 font-extrabold text-xs tracking-wider rounded-xl cursor-not-allowed">
                                <span>Registration Closed</span>
                            </button>
                        <?php endif; ?>

                        <p class="text-[10px] text-slate-400 text-center font-medium leading-relaxed">
                            Free for representatives of insurance, reinsurance, and partner brokerage companies.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>

<?php 
get_footer(); 
?>