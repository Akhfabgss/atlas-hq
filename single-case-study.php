<?php
/**
 * Template Name: Single Case Study Detail
 * Description: Template dinamis untuk CPT Case Study
 */

get_header();

// =========================================================================
// AMBIL DATA DINAMIS ACF
// =========================================================================

$title       = get_the_title();
$subtitle    = get_field('case_subtitle');
$categories  = get_field('case_categories');
$client_name = get_field('client_name') ?: 'Insurance Carrier Partner';
$partner     = get_field('partner_network') ?: 'PT Atlas Adjusting Indonesia';

// Static Link ke Contact Page
$static_contact_url = home_url('/contact/');

// Challenge, Solution, Impact
$challenge   = get_field('case_challenge');
$solution    = get_field('case_solution');
$impact_box  = get_field('case_impact_box');

// Featured Image Banner
$banner_img  = has_post_thumbnail() 
    ? get_the_post_thumbnail_url(get_the_ID(), 'full') 
    : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1600';

// Parsing Highlights List (Format Pipe: Judul | Deskripsi)
$raw_highlights = get_field('case_highlights');
$highlights = [];
if ($raw_highlights && is_string($raw_highlights)) {
    $lines = explode("\n", str_replace("\r", "", $raw_highlights));
    foreach ($lines as $line) {
        $data = explode('|', $line);
        if (count($data) >= 1 && !empty(trim($data[0]))) {
            $highlights[] = [
                'title' => trim($data[0]),
                'desc'  => isset($data[1]) ? trim($data[1]) : '',
            ];
        }
    }
}

// Parsing Metrics Grid (Format Pipe: Value | Label)
$raw_metrics = get_field('case_metrics');
$metrics = [];
if ($raw_metrics && is_string($raw_metrics)) {
    $lines = explode("\n", str_replace("\r", "", $raw_metrics));
    foreach ($lines as $line) {
        $data = explode('|', $line);
        if (count($data) >= 2) {
            $metrics[] = [
                'value' => trim($data[0]),
                'label' => trim($data[1]),
            ];
        }
    }
}

?>

<main id="main-content" class="site-main font-sans bg-slate-50 text-slate-900 pb-24 overflow-hidden">

    <!-- HERO SECTION -->
    <section class="relative bg-slate-950 text-white pt-24 pb-48 overflow-hidden font-sans">
        <img 
            src="<?php echo esc_url($banner_img); ?>" 
            alt="<?php echo esc_attr($title); ?>" 
            class="absolute inset-0 w-full h-full object-cover object-center opacity-25 filter blur-sm scale-105 pointer-events-none"
        />
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/80 via-slate-950/90 to-slate-950"></div>

        <div class="container mx-auto px-6 max-w-6xl relative z-10 space-y-6" data-aos="fade-up" data-aos-duration="800">
            
            <!-- Tombol Kembali -->
            <div>
                <a href="javascript:history.back()" class="inline-flex items-center gap-2.5 text-xs font-bold text-slate-300 hover:text-white transition-all group">
                    <span class="w-8 h-8 rounded-full bg-white/10 group-hover:bg-white/20 flex items-center justify-center transition-colors">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    </span>
                    BACK TO CASE STUDIES
                </a>
            </div>

            <!-- Category Badge -->
            <?php if (!empty($categories)) : ?>
                <div>
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-[10px] md:text-xs font-bold uppercase tracking-wider">
                        <i data-lucide="layers" class="w-3.5 h-3.5"></i>
                        <?php echo esc_html(is_array($categories) ? implode(' • ', $categories) : $categories); ?>
                    </span>
                </div>
            <?php endif; ?>

            <!-- Judul Utama -->
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-black tracking-tight leading-tight text-red-600 max-w-5xl">
                <?php echo esc_html($title); ?>
            </h1>

            <!-- Subtitle Pengantar -->
            <?php if (!empty($subtitle)) : ?>
                <p class="text-slate-300 text-sm md:text-lg leading-relaxed max-w-3xl opacity-90 font-medium">
                    <?php echo esc_html($subtitle); ?>
                </p>
            <?php endif; ?>

        </div>
    </section>

    <!-- FEATURED BANNER IMAGE -->
    <section class="relative z-20 -mt-36 sm:-mt-40 md:-mt-44 pb-12">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="rounded-3xl overflow-hidden shadow-2xl bg-slate-900 border border-white/10 aspect-[16/9] md:aspect-[21/9] w-full group" data-aos="zoom-in" data-aos-duration="600">
                <img 
                    src="<?php echo esc_url($banner_img); ?>" 
                    alt="<?php echo esc_attr($title); ?>" 
                    class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-700"
                />
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <section class="py-12 md:py-16">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <!-- KOLOM KIRI: NARASI -->
                <div class="lg:col-span-8 space-y-12" data-aos="fade-up" data-aos-duration="800">
                    
                    <!-- Challenge -->
                    <?php if (!empty($challenge)) : ?>
                        <div class="space-y-4">
                            <h2 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                                Challenge
                            </h2>
                            <p class="text-slate-600 text-sm md:text-base leading-relaxed font-medium">
                                <?php echo esc_html($challenge); ?>
                            </p>
                        </div>
                    <?php endif; ?>

                    <!-- Solution & Highlights -->
                    <?php if (!empty($solution) || !empty($highlights)) : ?>
                        <div class="space-y-6">
                            <h2 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                                Solution
                            </h2>
                            
                            <?php if (!empty($solution)) : ?>
                                <p class="text-slate-600 text-sm md:text-base leading-relaxed font-medium">
                                    <?php echo esc_html($solution); ?>
                                </p>
                            <?php endif; ?>

                            <!-- Highlights List (Rata Kiri, Judul & Deskripsi) -->
                            <?php if (!empty($highlights)) : ?>
                                <div class="space-y-3 pt-2">
                                    <?php foreach ($highlights as $hl) : ?>
                                        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-start gap-4 text-left">
                                            <div class="w-8 h-8 rounded-xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 mt-0.5 border border-red-100">
                                                <i data-lucide="check" class="w-4 h-4"></i>
                                            </div>
                                            <div class="space-y-1">
                                                <h4 class="font-black text-slate-900 text-sm md:text-base leading-snug">
                                                    <?php echo esc_html($hl['title']); ?>
                                                </h4>
                                                <?php if (!empty($hl['desc'])) : ?>
                                                    <p class="text-xs text-slate-500 leading-relaxed font-medium">
                                                        <?php echo esc_html($hl['desc']); ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Dampak & Hasil -->
                    <?php if (!empty($impact_box) || !empty($metrics)) : ?>
                        <div class="space-y-6 pt-2">
                            <h2 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                                Impact & Results
                            </h2>

                            <?php if (!empty($impact_box)) : ?>
                                <div class="bg-indigo-50/80 border border-indigo-100 rounded-2xl p-6 text-slate-800 text-xs md:text-sm font-medium leading-relaxed shadow-sm">
                                    <?php echo esc_html($impact_box); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($metrics)) : ?>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    <?php foreach ($metrics as $m) : ?>
                                        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm text-center flex flex-col justify-center space-y-2 hover:border-red-500 transition-colors">
                                            <span class="text-3xl md:text-4xl font-black text-red-600 tracking-tight">
                                                <?php echo esc_html($m['value']); ?>
                                            </span>
                                            <p class="text-xs font-bold text-slate-500 leading-snug">
                                                <?php echo esc_html($m['label']); ?>
                                            </p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </div>

                <!-- KOLOM KANAN: SIDEBAR -->
                <div class="lg:col-span-4 sticky top-24" data-aos="fade-left" data-aos-duration="800">
                    <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-200/80 shadow-lg space-y-6">
                        
                        <!-- CTA Static Link ke Contact -->
                        <a href="<?php echo esc_url($static_contact_url); ?>" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-slate-900 hover:bg-red-600 text-white font-extrabold text-xs uppercase tracking-wider rounded-xl transition-all duration-300 shadow-md">
                            <span>Visit Claims Portal</span>
                            <i data-lucide="external-link" class="w-4 h-4"></i>
                        </a>

                        <hr class="border-slate-100" />

                        <div class="space-y-4">
                            <span class="block text-[10px] font-bold text-slate-400 tracking-widest">
                                Client Information
                            </span>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center shrink-0">
                                    <i data-lucide="building-2" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <span class="block text-[10px] text-slate-400 font-bold uppercase">Client</span>
                                    <span class="text-xs font-bold text-slate-800"><?php echo esc_html($client_name); ?></span>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center shrink-0">
                                    <i data-lucide="users" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <span class="block text-[10px] text-slate-400 font-bold uppercase">Partner</span>
                                    <span class="text-xs font-bold text-slate-800"><?php echo esc_html($partner); ?></span>
                                </div>
                            </div>
                        </div>

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