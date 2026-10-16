<?php
/**
 * Template Name: Events & Training Index
 * Description: Page template kustom untuk Acara, Pelatihan Teknis, Seminar, dan Webinar PT Atlas Adjusting Indonesia (Dinamis dari CPT Event).
 */

get_header(); 

// =========================================================================
// HELPER FUNCTIONS CONVERT DATE & TIME
// =========================================================================

function format_indo_date($date_raw) {
    if (empty($date_raw)) return '';

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
// 1. QUERY AGENDA MENDATANG (Upcoming Events: event_is_open = 1 / true)
// =========================================================================
$args_upcoming = [
    'post_type'      => ['event', 'events'],
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'meta_query'     => [
        'relation' => 'OR',
        [
            'key'     => 'event_is_open',
            'value'   => '1',
            'compare' => '=',
        ],
        [
            'key'     => 'event_is_open',
            'value'   => true,
            'compare' => '=',
        ],
    ],
];
$upcoming_query = new WP_Query($args_upcoming);

// =========================================================================
// 2. QUERY KEGIATAN SEBELUMNYA (Past Events: event_is_open = 0 / false)
// =========================================================================
$args_past = [
    'post_type'      => ['event', 'events'],
    'posts_per_page' => 6,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'meta_query'     => [
        'relation' => 'OR',
        [
            'key'     => 'event_is_open',
            'value'   => '0',
            'compare' => '=',
        ],
        [
            'key'     => 'event_is_open',
            'value'   => false,
            'compare' => '=',
        ],
    ],
];
$past_query = new WP_Query($args_past);
?>

<main id="main-content" class="site-main font-sans bg-slate-50 text-slate-900 pb-20 overflow-hidden">

    <!-- 1. HERO HEADER SECTION -->
    <section class="pt-12 md:pt-16 pb-12 bg-slate-50 border-b border-slate-200/80">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="max-w-3xl space-y-4" data-aos="fade-up" data-aos-duration="800">
                <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-red-50 text-red-600 border border-red-200/60 text-xs font-bold tracking-wider">
                    <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                    Knowledge Sharing & Training
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight">
                    Events, Training & <span class="text-red-600">Webinars</span>
                </h1>
                <p class="text-slate-600 text-xs sm:text-sm md:text-base font-medium leading-relaxed">
                    Technical training programs, claim investigation workshops, and industry insight seminars organized by PT Atlas Adjusting Indonesia to enhance understanding of reinsurance risk management.
                </p>
            </div>
        </div>
    </section>

    <!-- 2. UPCOMING EVENTS SECTION -->
    <section class="py-12 md:py-16">
        <div class="container mx-auto px-6 max-w-7xl space-y-8">
        
            <div>
                <h2 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight" data-aos="fade-up">Agenda Mendatang</h2>
            </div>

            <?php if ($upcoming_query->have_posts()) : ?>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <?php while ($upcoming_query->have_posts()) : $upcoming_query->the_post(); 
                        $category    = get_field('event_category') ?: 'Seminar & Webinar';
                        $type        = get_field('event_type') ?: 'Webinar Daring';
                        
                        $raw_date    = get_field('event_date');
                        $date        = !empty($raw_date) ? format_indo_date($raw_date) : get_the_date('j F Y');
                        
                        $raw_time    = get_field('event_time');
                        $time        = !empty($raw_time) ? format_clean_time($raw_time) : '09:00 - 12:00 WIB';

                        $speakers    = get_field('event_speakers') ?: 'Tim Komite Teknis';
                        $description = get_field('event_overview') ?: get_the_excerpt();
                        
                        $banner_img  = has_post_thumbnail() 
                            ? get_the_post_thumbnail_url(get_the_ID(), 'large') 
                            : 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=800';
                    ?>
                        <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 shadow-md hover:shadow-xl hover:border-red-500/40 transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="<?php echo ($upcoming_query->current_post * 150); ?>">
                            
                            <div>
                                <div class="relative h-52 bg-slate-900 overflow-hidden">
                                    <img src="<?php echo esc_url($banner_img); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-85" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                                    
                                    <span class="absolute top-4 left-4 z-10 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                                        <?php echo esc_html($category); ?>
                                    </span>

                                    <span class="absolute bottom-4 left-4 z-10 bg-white/90 backdrop-blur-md text-slate-900 text-sm font-bold px-3 py-1 rounded-lg border border-white/50 flex items-center gap-1.5">
                                        <i data-lucide="video" class="w-3.5 h-3.5 text-red-600"></i>
                                        <?php echo esc_html($type); ?>
                                    </span>
                                </div>

                                <div class="p-6 md:p-8 space-y-4">
                                    <h3 class="text-xl font-bold text-slate-900 leading-snug group-hover:text-red-600 transition-colors">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>

                                    <p class="text-xs md:text-sm font-medium text-slate-600 leading-relaxed">
                                        <?php echo esc_html($description); ?>
                                    </p>

                                    <div class="space-y-2 pt-2 border-t border-slate-100 text-xs text-slate-700 font-medium">
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="calendar" class="w-4 h-4 text-red-600 shrink-0"></i>
                                            <span><strong>Tanggal:</strong> <?php echo esc_html($date); ?></span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="clock" class="w-4 h-4 text-red-600 shrink-0"></i>
                                            <span><strong>Waktu:</strong> <?php echo esc_html($time); ?></span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="user-check" class="w-4 h-4 text-red-600 shrink-0"></i>
                                            <span><strong>Narasumber:</strong> <?php echo esc_html($speakers); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 md:p-8 pt-0">
                                <a href="<?php the_permalink(); ?>" class="w-full inline-flex items-center justify-center gap-2 py-3.5 bg-slate-900 group-hover:bg-red-600 text-white font-bold text-xs tracking-wider rounded-xl transition-all duration-300 shadow-md">
                                    <span>Lihat Detail & Reservasi</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>

                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <div class="text-center py-12 bg-white rounded-3xl border border-slate-200/80 text-slate-500 text-sm font-medium">
                    Belum ada agenda mendatang yang dibuka saat ini.
                </div>
            <?php endif; ?>

        </div>
    </section>

    <!-- 3. PAST EVENTS ARCHIVE -->
    <section class="py-12 bg-slate-50 border-t border-slate-200/80">
        <div class="container mx-auto px-6 max-w-7xl space-y-8">
            
            <div class="space-y-1">
                <h2 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight" data-aos="fade-up">Previous Activities and Training</h2>
            </div>

            <?php if ($past_query->have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php while ($past_query->have_posts()) : $past_query->the_post(); 
                        $category    = get_field('event_category') ?: 'Seminar & Webinar';
                        $raw_date    = get_field('event_date');
                        $date        = !empty($raw_date) ? format_indo_date($raw_date) : get_the_date('j F Y');
                        $description = get_field('event_overview') ?: get_the_excerpt();
                    ?>
                        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 space-y-3 hover:border-red-500/40 hover:shadow-xl transition-all duration-300 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="<?php echo ($past_query->current_post * 100); ?>">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between text-xs font-bold text-slate-400 uppercase tracking-wider">
                                    <span><?php echo esc_html($category); ?></span>
                                    <span><?php echo esc_html($date); ?></span>
                                </div>
                                <h4 class="font-bold text-slate-900 text-sm leading-snug hover:text-red-600 transition-colors">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                                <p class="text-xs font-medium text-slate-600 leading-relaxed">
                                    <?php echo esc_html($description); ?>
                                </p>
                            </div>
                            <div class="pt-2">
                                <span class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500">
                                    <i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-600"></i>
                                    Selesai Dikelola
                                </span>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <p class="text-xs text-slate-400">Belum ada riwayat kegiatan sebelumnya.</p>
            <?php endif; ?>

        </div>
    </section>

    <!-- 4. REQUEST PRIVATE PRESENTATION BANNER & FORM -->
    <section class="py-16 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute -right-20 -top-20 w-96 h-96 rounded-full bg-red-600/20 blur-3xl pointer-events-none"></div>
        <div class="absolute -left-20 -bottom-20 w-96 h-96 rounded-full bg-slate-800/30 blur-3xl pointer-events-none"></div>

        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-6 space-y-5" data-aos="fade-up" data-aos-duration="800">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-red-600/20 text-red-400 border border-red-500/30 text-xs font-bold uppercase tracking-wider">
                        <i data-lucide="presentation" class="w-3.5 h-3.5"></i>
                        In-House Knowledge Sharing
                    </span>
                    <h2 class="text-3xl md:text-5xl font-black tracking-tight leading-tight">
                        Looking to Host a <span class="text-red-500">Private Seminar</span> for Your Team? 
                    </h2>
                    <p class="text-slate-300 text-xs md:text-sm font-medium leading-relaxed">
                        We offer custom technical presentations, claim case study reviews, and training on reinsurance risk management—tailored specifically for the underwriting and claims departments at your company. 
                    </p>

                    <div class="space-y-3 pt-2 text-sm text-slate-300 font-medium">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-red-600/20 text-red-500 flex items-center justify-center shrink-0">
                                <i data-lucide="check" class="w-3.5 h-3.5"></i>
                            </div>
                            <span>Custom content aligned with your industry’s risk portfolio.</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-red-600/20 text-red-500 flex items-center justify-center shrink-0">
                                <i data-lucide="check" class="w-3.5 h-3.5"></i>
                            </div>
                            <span>Delivered directly by Technical Specialists at PT Atlas Adjusting Indonesia.</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-red-600/20 text-red-500 flex items-center justify-center shrink-0">
                                <i data-lucide="check" class="w-3.5 h-3.5"></i>
                            </div>
                            <span>Flexible Delivery: Virtual (Zoom/Teams) or On-Site (Client Premises).</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6 bg-white text-slate-900 rounded-3xl p-6 md:p-8 shadow-2xl border border-slate-200/80" data-aos="fade-left" data-aos-duration="800">
                    <div class="space-y-2 mb-6">
                        <span class="text-sm font-bold text-red-600 block mb-1">Private Session Registration</span>
                        <h3 class="text-xl font-black tracking-tight">Schedule a Presentation</h3>
                        <p class="text-xs text-slate-500">Fill out the short form below. Our team will contact you within 24 hours.</p>
                    </div>

                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" class="space-y-4 text-xs font-semibold">
                        <input type="hidden" name="action" value="request_private_presentation">

                        <div>
                            <label class="block text-slate-700 mb-1">Full Name & Title *</label>
                            <input type="text" name="full_name" required placeholder="Contoh: Budi Pratama, S.T." class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-red-600 focus:bg-white transition-all text-xs" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-slate-700 mb-1">Company / Insurer *</label>
                                <input type="text" name="company" required placeholder="PT Asuransi..." class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-red-600 focus:bg-white transition-all text-xs" />
                            </div>
                            <div>
                                <label class="block text-slate-700 mb-1">Position *</label>
                                <input type="text" name="position" required placeholder="Claims Manager / Underwriter" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-red-600 focus:bg-white transition-all text-xs" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-slate-700 mb-1">Company Email *</label>
                                <input type="email" name="email" required placeholder="nama@perusahaan.com" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-red-600 focus:bg-white transition-all text-xs" />
                            </div>
                            <div>
                                <label class="block text-slate-700 mb-1">WhatsApp / Phone Number *</label>
                                <input type="tel" name="phone" required placeholder="+62 812..." class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-red-600 focus:bg-white transition-all text-xs" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-slate-700 mb-1">Topic / Risk Sector of Interest</label>
                            <select name="topic" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-red-600 focus:bg-white transition-all text-xs text-slate-700">
                                <option value="Property & Business Interruption">Property & Business Interruption (BI)</option>
                                <option value="Construction & CAR/EAR Engineering">Construction & CAR/EAR Engineering</option>
                                <option value="Marine Cargo & Hull Machinery">Marine Cargo & Hull Machinery</option>
                                <option value="Energy, Oil & Gas Risks">Energy, Oil & Gas Risks</option>
                                <option value="Insurtech & 3D Drone Surveying">Insurtech & 3D Drone Surveying</option>
                                <option value="Lainnya">Custom Topic</option>
                            </select>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full py-3.5 bg-red-600 hover:bg-red-500 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition-all shadow-lg flex items-center justify-center gap-2 group cursor-pointer">
                                <span>Request Schedule</span>
                                <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

</main>

<?php 
get_footer(); 
?>