<?php
/**
 * Template Name: Single Service Desk Detail
 * Description: Template modular dinamis untuk detail masing-masing Service Desk (Property, Korean, Marine, Heavy Equipment, dll.)
 */

get_header();

// =========================================================================
// MENGAMBIL DATA DINAMIS DARI ADVANCED CUSTOM FIELDS (ACF)
// =========================================================================

$title_prefix    = get_field('title_prefix') ?: get_the_title();
$title_highlight = get_field('title_highlight') ?: '';
$subtitle        = get_field('subtitle');

// Hero Image
$hero_img_data   = get_field('hero_img');
$hero_img_url    = is_array($hero_img_data) ? $hero_img_data['url'] : $hero_img_data;

// Desk Overview
$overview_p1     = get_field('overview_p1');
$overview_p2     = get_field('overview_p2');

// =========================================================================
// OLAH FIELD TEXTAREA MENJADI ARRAY (PARSING PIPED FORMAT)
// =========================================================================

// 1. Parsing Solutions List
$raw_solutions_list = get_field('solutions') ?: get_field('solutions_list');
$solutions_list = [];
if ($raw_solutions_list && is_string($raw_solutions_list)) {
    $lines = explode("\n", str_replace("\r", "", $raw_solutions_list));
    foreach ($lines as $line) {
        $data = explode('|', $line);
        if (count($data) >= 2) {
            $solutions_list[] = [
                'title' => trim($data[0]),
                'desc'  => trim($data[1]),
                'icon'  => isset($data[2]) ? trim($data[2]) : 'shield-check',
            ];
        }
    }
}

// 2. Parsing Senior Team (Format: Nama | Role/Jabatan | Badge/Category)
$raw_senior_team = get_field('senior_team') ?: get_field('senior_team_list') ?: get_field('team');
$senior_team = [];
if ($raw_senior_team && is_string($raw_senior_team)) {
    $lines = explode("\n", str_replace("\r", "", $raw_senior_team));
    foreach ($lines as $line) {
        $data = explode('|', $line);
        if (count($data) >= 1 && !empty(trim($data[0]))) {
            $senior_team[] = [
                'name'  => trim($data[0]),
                'role'  => isset($data[2]) ? trim($data[2]) : 'Senior Expert',
                'title' => isset($data[1]) ? trim($data[1]) : '',
            ];
        }
    }
}

// 3. Parsing Regular Team (team_list / sub_team / sub_team_list)
$raw_team = get_field('team_list') ?: get_field('sub_team') ?: get_field('sub_team_list');
$regular_team = [];
if ($raw_team && is_string($raw_team)) {
    $lines = explode("\n", str_replace("\r", "", $raw_team));
    foreach ($lines as $line) {
        $data = explode('|', $line);
        if (count($data) >= 2) {
            $regular_team[] = [
                'name'  => trim($data[0]),
                'title' => trim($data[1]),
            ];
        }
    }
}

// 4. Parsing Client Logos Dinamis via ACF (Atau Fallback Default)
$raw_client_logos = get_field('client_logos') ?: get_field('client_logos_list');
$client_logos = [];

if ($raw_client_logos && is_string($raw_client_logos)) {
    $lines = explode("\n", str_replace("\r", "", $raw_client_logos));
    foreach ($lines as $line) {
        $line_clean = trim($line);
        if (!empty($line_clean)) {
            $client_logos[] = [
                'name' => 'Client Partner',
                'file_or_url' => $line_clean
            ];
        }
    }
} else {
    // Default Logos jika ACF Kosong
    $default_files = ['Aca-Logo.png', 'Askrindo-Logo.png', 'Asuransi-Astra-Logo.png', 'AsuransiSinarmas-Logo.png', 'Avrist-logo.png', 'BRI-Logo.png', 'Jasindo-Logo.png', 'sompo-logo.jpg', 'TokioMarine.png'];
    foreach ($default_files as $file) {
        $client_logos[] = [
            'name' => 'Client Partner',
            'file_or_url' => get_template_directory_uri() . '/assets/images/clients/' . $file
        ];
    }
}
?>

<div id="single-desk-content" class="site-main font-sans bg-slate-50 text-slate-900 overflow-hidden">

    <!-- 1. HERO TITLE & CATEGORY NAVIGATION -->
    <section class="py-16 md:py-16 bg-slate-50 text-center border-b border-slate-200/80">
        <div class="container mx-auto px-6 max-w-5xl">
            <h1 class="text-4xl md:text-6xl font-black text-slate-900 tracking-tight mb-4">
                <?php echo esc_html($title_prefix); ?> 
                <?php if ($title_highlight) : ?>
                    <span class="text-red-600"><?php echo esc_html($title_highlight); ?></span>
                <?php endif; ?>
            </h1>
            
            <?php if ($subtitle) : ?>
                <p class="text-sm md:text-base text-slate-600 leading-relaxed max-w-3xl mx-auto font-medium">
                    <?php echo esc_html($subtitle); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Nav Bar Category Desk -->
    <div class="sticky top-0 z-30 bg-slate-900 text-slate-300 py-4 border-y border-slate-800 shadow-md overflow-x-auto no-scrollbar">
        <div class="container mx-auto px-6 max-w-7xl">
            <ul class="flex items-center justify-between gap-6 whitespace-nowrap text-xs font-bold">
                <li><a href="<?php echo esc_url(home_url('/property-desk/')); ?>" class="relative inline-block py-2 text-slate-300 hover:text-red-500 transition-colors duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-red-500 after:origin-left after:scale-x-0 after:transition-transform after:duration-300 hover:after:scale-x-100 <?php echo is_page(['property-desk', 'property']) ? 'text-red-500 after:scale-x-100' : ''; ?>">Property Desk</a></li>
                <li><a href="<?php echo esc_url(home_url('/machinery-breakdown-desk/')); ?>" class="relative inline-block py-2 text-slate-300 hover:text-red-500 transition-colors duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-red-500 after:origin-left after:scale-x-0 after:transition-transform after:duration-300 hover:after:scale-x-100 <?php echo is_page(['machinery-breakdown-desk', 'machinery-desk', 'machinery']) ? 'text-red-500 after:scale-x-100' : ''; ?>">Machinery Breakdown Desk</a></li>
                <li><a href="<?php echo esc_url(home_url('/construction-engineering-desk/')); ?>" class="relative inline-block py-2 text-slate-300 hover:text-red-500 transition-colors duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-red-500 after:origin-left after:scale-x-0 after:transition-transform after:duration-300 hover:after:scale-x-100 <?php echo is_page(['construction-desk', 'construction-engineering-desk', 'construction']) ? 'text-red-500 after:scale-x-100' : ''; ?>">Construction Engineer Desk</a></li>
                <li><a href="<?php echo esc_url(home_url('/heavy-equipment-desk/')); ?>" class="relative inline-block py-2 text-slate-300 hover:text-red-500 transition-colors duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-red-500 after:origin-left after:scale-x-0 after:transition-transform after:duration-300 hover:after:scale-x-100 <?php echo is_page(['heavy-equipment-desk', 'heavy-equipment']) ? 'text-red-500 after:scale-x-100' : ''; ?>">Heavy Equipment Desk</a></li>
                <li><a href="<?php echo esc_url(home_url('/energy-oil-gas-desk/')); ?>" class="relative inline-block py-2 text-slate-300 hover:text-red-500 transition-colors duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-red-500 after:origin-left after:scale-x-0 after:transition-transform after:duration-300 hover:after:scale-x-100 <?php echo is_page(['energy-desk', 'energy-oil-gas-desk', 'energy']) ? 'text-red-500 after:scale-x-100' : ''; ?>">Energy, Oil & Gas Desk</a></li>
                <li><a href="<?php echo esc_url(home_url('/marine-miscellaneous-desk/')); ?>" class="relative inline-block py-2 text-slate-300 hover:text-red-500 transition-colors duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-red-500 after:origin-left after:scale-x-0 after:transition-transform after:duration-300 hover:after:scale-x-100 <?php echo is_page(['korean-desk', 'marine-miscellaneous-desk', 'korean']) ? 'text-red-500 after:scale-x-100' : ''; ?>">Marine & Miscellaneous Desk</a></li>
            </ul>
        </div>
    </div>

    <!-- 2. DESK OVERVIEW -->
    <?php if ($hero_img_url || $overview_p1 || $overview_p2) : ?>
    <section class="pt-16 md:pt-24 pb-0 bg-slate-900 text-white overflow-hidden">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                <div class="lg:col-span-6 flex items-end">
                    <div class="rounded-t-3xl rounded-b-none overflow-hidden bg-slate-950 shadow-2xl aspect-[4/3] sm:aspect-square md:h-[480px] w-full border-t border-x border-slate-800">
                        <?php if ($hero_img_url) : ?>
                            <img 
                                src="<?php echo esc_url($hero_img_url); ?>" 
                                alt="<?php echo esc_attr($title_prefix); ?>" 
                                class="w-full h-full object-cover object-center"
                            />
                        <?php endif; ?>
                    </div>
                </div>

                <div class="lg:col-span-6 flex flex-col justify-center space-y-6 text-slate-300 text-xs md:text-base leading-relaxed font-medium py-12 md:py-16">
                    <?php if ($overview_p1) : ?>
                        <p class="opacity-90"><?php echo esc_html($overview_p1); ?></p>
                    <?php endif; ?>
                    
                    <?php if ($overview_p2) : ?>
                        <p class="opacity-90"><?php echo esc_html($overview_p2); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- 3. COMPREHENSIVE SOLUTIONS CARDS -->
    <?php if (!empty($solutions_list)) : ?>
    <section class="py-16 md:py-16 bg-slate-50">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight leading-snug">
                    Comprehensive Loss Adjusting <span class="text-red-600"> & Risk Engineering Solutions</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($solutions_list as $sol) : ?>
                    <div class="bg-white rounded-3xl p-8 border border-slate-200/80 shadow-sm hover:shadow-xl hover:border-red-500/40 transition-all duration-300 flex flex-col justify-between group">
                        <div class="space-y-4">
                            <div class="w-10 h-10 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center shrink-0">
                                <i data-lucide="<?php echo esc_attr($sol['icon'] ?: 'shield-check'); ?>" class="w-5 h-5"></i>
                            </div>
                            
                            <h3 class="text-xl font-black text-slate-900 group-hover:text-red-600 transition-colors">
                                <?php echo esc_html($sol['title']); ?>
                            </h3>
                            <p class="text-xs md:text-sm text-slate-600 leading-relaxed font-medium">
                                <?php echo esc_html($sol['desc']); ?>
                            </p>
                        </div>

                        <div class="pt-8 flex items-center justify-between border-t border-slate-100 mt-6">
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="text-xs font-bold text-red-600 hover:text-red-500 transition-colors inline-flex items-center gap-1 group/btn">
                                <span>Dossier Available</span> 
                                <i data-lucide="arrow-right" class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- 4. ENGINEERING & ADJUSTING TEAM -->
    <?php if (!empty($senior_team) || !empty($regular_team)) : ?>
    <section class="py-16 md:py-16 bg-slate-50 border-y border-slate-200/80">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="mb-12">
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">
                    Certified Adjusting <span class="text-red-600">Team</span>
                </h2>
                <p class="text-slate-600 text-xs md:text-sm mt-2 font-medium">
                    Direct access to veteran civil, electrical, IT, and mechanical engineers with AICLA, ANZIIF, and CIP professional standing.
                </p>
            </div>

            <!-- SENIOR TEAM -->
            <?php if (!empty($senior_team)) : ?>
                <div class="flex flex-wrap gap-6 mb-8">
                    <?php foreach ($senior_team as $member) : ?>
                        <div class="flex-1 min-w-[280px] bg-white rounded-3xl p-8 border border-slate-200/80 shadow-sm hover:shadow-lg hover:border-red-500/40 transition-all flex flex-col justify-between space-y-4">
                            <div>
                                <span class="inline-block px-3 py-1 rounded-full bg-red-50 text-red-600 border border-red-200/60 text-[10px] font-bold mb-3">
                                    <?php echo esc_html($member['role']); ?>
                                </span>
                                <h3 class="text-xl font-black text-slate-900 leading-snug">
                                    <?php echo esc_html($member['name']); ?>
                                </h3>
                                <?php if (!empty($member['title'])) : ?>
                                    <p class="text-xs font-bold text-red-600 mt-1">
                                        <?php echo esc_html($member['title']); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- REGULAR TEAM -->
            <?php if (!empty($regular_team)) : ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <?php foreach ($regular_team as $sub) : ?>
                        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm space-y-1.5 hover:border-red-500/50 transition-colors">
                            <h4 class="font-black text-slate-900 text-sm">
                                <?php echo esc_html($sub['name']); ?>
                            </h4>
                            <p class="text-xs font-bold text-red-600 capitalize">
                                <?php echo esc_html($sub['title']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

<!-- 5. FLAGSHIP CASE STUDIES -->
    <section class="py-16 md:py-16 bg-slate-900 text-white">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="mb-12 space-y-2">
                <h2 class="text-3xl md:text-4xl font-black tracking-tight">
                    Flagship Case <span class="text-red-600">Studies</span>
                </h2>
                <p class="text-xs md:text-sm text-slate-400 font-medium">
                    Over <span class="text-red-500 font-bold">IDR 4.2 Trillion</span> in aggregate industrial and commercial claims managed across diverse Asia-Pacific production sectors.
                </p>
            </div>

            <?php
            // 1. Cek dulu apakah ada Case Study yang dipilih MANUAL via ACF Relationship
            $featured_cases = get_field('selected_case_studies');
            $cases_to_display = [];

            if (!empty($featured_cases)) {
                $cases_to_display = array_slice($featured_cases, 0, 2);
            } else {
                // 2. Query HANYA Case Study yang DICENTANG display_desks-nya cocok dengan desk saat ini
                $current_desk_slug = get_post_field('post_name', get_the_ID());
                
                $args_cases = [
                    'post_type'      => 'case_study',
                    'posts_per_page' => 2,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'meta_query'     => [
                        [
                            'key'     => 'display_desks',
                            'value'   => $current_desk_slug,
                            'compare' => 'LIKE',
                        ],
                    ],
                ];

                $cases_query = new WP_Query($args_cases);

                if ($cases_query->have_posts()) {
                    $cases_to_display = $cases_query->posts;
                }
            }

            // 3. RENDER LOOP CARD
            if (!empty($cases_to_display)) : 
            ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <?php foreach ($cases_to_display as $case_post) : 
                        setup_postdata($case_post);
                        $case_id = is_object($case_post) ? $case_post->ID : $case_post;

                        $categories = get_field('case_categories', $case_id) ?: 'Property Claims';
                        $location   = get_field('case_location', $case_id) ?: 'Indonesia';
                        $desc       = get_field('case_subtitle', $case_id) ?: get_the_excerpt($case_id);
                        $permalink  = get_permalink($case_id);
                        $title      = get_the_title($case_id);
                        
                        $thumb_url  = has_post_thumbnail($case_id) 
                            ? get_the_post_thumbnail_url($case_id, 'large') 
                            : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1600';
                    ?>
                        <div class="relative group rounded-3xl overflow-hidden shadow-2xl bg-slate-950 h-[380px] md:h-[420px] flex flex-col justify-between p-8 border border-slate-800">
                            <img 
                                src="<?php echo esc_url($thumb_url); ?>" 
                                alt="<?php echo esc_attr($title); ?>" 
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-30"
                            />
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/70 to-transparent"></div>

                            <div class="relative z-10 flex items-center justify-between text-[10px] font-bold">
                                <span class="bg-red-600/90 text-white px-3 py-1 rounded-full backdrop-blur-md uppercase tracking-wider">
                                    <?php echo esc_html(is_array($categories) ? implode(' • ', $categories) : $categories); ?>
                                </span>
                                <span class="text-slate-300">
                                    <?php echo esc_html($location); ?>
                                </span>
                            </div>

                            <div class="relative z-10 space-y-3">
                                <h3 class="text-xl md:text-2xl font-black text-white leading-snug">
                                    <?php echo esc_html($title); ?>
                                </h3>
                                <p class="text-xs text-slate-300 leading-relaxed line-clamp-3 font-medium">
                                    <?php echo esc_html($desc); ?>
                                </p>
                                <div class="pt-2">
                                    <a href="<?php echo esc_url($permalink); ?>" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-red-600 hover:bg-red-500 text-white text-xs font-bold transition-all shadow-md group/btn uppercase tracking-wider">
                                        <span>Read case study</span>
                                        <i data-lucide="arrow-right" class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php 
                    endforeach; 
                    wp_reset_postdata(); 
                    ?>
                </div>
            <?php else : ?>
                <p class="text-sm text-slate-400">Belum ada Case Study yang diterbitkan untuk desk ini.</p>
            <?php endif; ?>

        </div>
    </section>

    <!-- 6. INSIGHTS & BULLETINS -->
    <section class="py-16 md:py-16 bg-slate-50">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">
                    Insights & <span class="text-red-600">Bulletins</span>
                </h2>
            </div>

            <?php
            $current_page_slug = get_post_field('post_name', get_the_ID());

            $args = [
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
                'category_name'  => $current_page_slug, 
            ];

            $insights_query = new WP_Query($args);

            if (!$insights_query->have_posts()) {
                $args_fallback = [
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                ];
                $insights_query = new WP_Query($args_fallback);
            }

            if ($insights_query->have_posts()) : 
            ?>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                    <?php while ($insights_query->have_posts()) : $insights_query->the_post(); 
                        $categories  = get_the_category();
                        $primary_cat = !empty($categories) ? $categories[0]->name : 'Insights';
                        
                        $thumb_url   = has_post_thumbnail() 
                            ? get_the_post_thumbnail_url(get_the_ID(), 'large') 
                            : 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=800';

                        $content_text = strip_tags(get_the_content());
                        $read_time    = max(1, ceil(str_word_count($content_text) / 200));
                    ?>
                        <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 shadow-sm hover:shadow-xl hover:border-red-500/40 transition-all duration-300 flex flex-col justify-between group">
                            <div>
                                <div class="relative h-48 bg-slate-900 overflow-hidden">
                                    <span class="absolute top-3 left-3 z-10 bg-slate-950/80 text-white text-[10px] font-bold px-3 py-1 rounded-md backdrop-blur-md">
                                        <?php echo esc_html($primary_cat); ?>
                                    </span>
                                    <img 
                                        src="<?php echo esc_url($thumb_url); ?>" 
                                        alt="<?php the_title_attribute(); ?>"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                                    />
                                </div>

                                <div class="p-6 space-y-2">
                                    <span class="flex items-center gap-1.5 text-sm text-slate-400 font-medium">
                                        <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                                        <span><?php echo $read_time; ?> min read</span>
                                        <span>•</span>
                                        <span><?php echo get_the_date('j F Y'); ?></span>
                                    </span>
                                    <h3 class="font-black text-slate-900 text-base leading-snug group-hover:text-red-600 transition-colors">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>

                            <div class="p-6 pt-0">
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-xs font-bold tracking-tight text-red-600 hover:text-red-500 transition-all">
                                    <span>Read Full Dossier</span>
                                    <span class="group-hover:translate-x-1 transition-transform"><i data-lucide="arrow-right" class="w-4 h-4"></i></span>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>

                <div class="text-center">
                    <a href="<?php echo esc_url(home_url('/news-insights/')); ?>" class="inline-flex items-center gap-2 text-sm font-bold text-red-600 hover:text-red-500 transition-colors group">
                        <span>View All Whitepapers & Reports</span> 
                        <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

            <?php else : ?>
                <div class="text-center py-12 text-slate-400 text-sm">
                    No insights published yet.
                </div>
            <?php endif; ?>

        </div>
    </section>

    <!-- 7. NOTABLE ACCOUNTS HANDLED (SEAMLESS INFINITE LOGO SLIDER) -->
    <section class="py-12 bg-slate-50 border-t border-slate-200/80 overflow-hidden">
        <div class="container mx-auto px-6 max-w-7xl mb-8 text-center">
            <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">
                Notable Accounts <span class="text-red-600">Handled</span>
            </h2>
        </div>

        <div class="relative w-full overflow-hidden flex py-4 [mask-image:_linear-gradient(to_right,_transparent_0,_black_128px,_black_calc(100%-128px),_transparent_100%)]">
            <div class="flex items-center space-x-6 animate-marquee whitespace-nowrap shrink-0 w-max">
                <?php 
                for ($i = 0; $i < 4; $i++) : 
                    foreach ($client_logos as $client) : 
                        $logo_target = $client['file_or_url'];
                        if (!filter_var($logo_target, FILTER_VALIDATE_URL) && strpos($logo_target, '/') === false) {
                            $logo_target = get_template_directory_uri() . '/assets/images/clients/' . $logo_target;
                        }
                ?>
                    <div class="client-card flex-shrink-0 w-48 md:w-56 h-28 md:h-32 bg-white rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-center p-6 relative transition-all duration-300 hover:border-t-2 hover:border-t-red-600 hover:shadow-lg hover:-translate-y-1">
                        <img 
                            src="<?php echo esc_url($logo_target); ?>" 
                            alt="<?php echo esc_attr($client['name']); ?>" 
                            class="max-h-16 max-w-full object-contain"
                            onerror="this.src='https://via.placeholder.com/180x60/f8fafc/64748b?text=Client+Partner';"
                        />
                    </div>
                <?php 
                    endforeach; 
                endfor; 
                ?>
            </div>
        </div>
    </section>

</div>

<style>
@keyframes marquee {
    0% { transform: translateX(0%); }
    100% { transform: translateX(-50%); }
}
.animate-marquee {
    display: flex;
    width: max-content;
    animation: marquee 30s linear infinite;
}
.animate-marquee:hover {
    animation-play-state: paused;
}
</style>

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