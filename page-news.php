<?php
/**
 * Template Name: News & Insights Index
 * Description: Page template kustom untuk portal berita, wawasan, dan artikel WordPress.
 */

get_header(); 
?>

<section id="news-index" class="font-sans bg-slate-50 text-slate-900 pb-20 overflow-hidden">

    <div class="container mx-auto px-6 max-w-7xl pt-12 md:pt-16">
        
        <!-- 1. PAGE TITLE HEADER -->
        <div class="mb-8" data-aos="fade-up" data-aos-duration="800">
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">
                News & <span class="text-red-600">Insights</span>
            </h1>
        </div>

        <!-- 2. HERO FEATURED SECTION -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-16">
            
            <?php
            $featured_query = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 1,
                'post_status'    => 'publish',
            ]);

            $featured_id = 0;

            if ($featured_query->have_posts()) :
                while ($featured_query->have_posts()) : $featured_query->the_post();
                    $featured_id = get_the_ID();
                    $categories  = get_the_category();
                    $cat_1       = !empty($categories[0]) ? $categories[0]->name : 'Insights';
                    $cat_2       = !empty($categories[1]) ? $categories[1]->name : 'Laporan Utama';
                    $thumb_url   = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=1200';
                    
                    $content_text = strip_tags(get_the_content());
                    $read_time    = max(1, ceil(str_word_count($content_text) / 200));
            ?>
                <!-- FEATURED ARTICLE -->
                <div class="lg:col-span-8 relative group rounded-3xl overflow-hidden shadow-xl bg-slate-900 min-h-[460px] md:min-h-[520px] flex flex-col justify-end p-6 md:p-8 border border-slate-200/60" data-aos="fade-up" data-aos-duration="800">
                    <img 
                        src="<?php echo esc_url($thumb_url); ?>" 
                        alt="<?php the_title_attribute(); ?>" 
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-70"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent"></div>

                    <div class="relative z-10 bg-white/95 backdrop-blur-md rounded-2xl p-6 md:p-8 shadow-2xl border border-white/60 space-y-4 text-slate-900">
                        <div class="flex flex-wrap items-center gap-2 text-sm font-bold text-slate-600  ">
                            <span class="flex items-center gap-1.5 text-red-600">
                                <span class="w-2 h-2 rounded-full bg-red-600"></span>
                                <?php echo esc_html($cat_1); ?>
                            </span>
                            <?php if (!empty($categories[1])) : ?>
                                <span>• <?php echo esc_html($cat_2); ?></span>
                            <?php endif; ?>
                        </div>

                        <h2 class="text-2xl md:text-3xl font-black text-slate-900 leading-tight group-hover:text-red-600 transition-colors">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <p class="text-xs md:text-sm text-slate-600 leading-relaxed line-clamp-2">
                            <?php echo get_the_excerpt(); ?>
                        </p>

                        <div class="pt-2 border-t border-slate-200/60 flex flex-wrap items-center gap-3 text-sm font-medium text-slate-500">
                            <span><?php echo get_the_date('j F Y'); ?></span>
                            <span>•</span>
                            <span class="inline-flex items-center gap-1">
                                <i data-lucide="clock" class="w-3.5 h-3.5 text-slate-400"></i>
                                <?php echo $read_time; ?> min baca
                            </span>
                            <span>•</span>
                            <span>Oleh <?php the_author(); ?></span>
                        </div>
                    </div>
                </div>
            <?php 
                endwhile; 
                wp_reset_postdata(); 
            endif; 
            ?>

            <!-- SIDEBAR POSTS -->
            <div class="lg:col-span-4 space-y-4" data-aos="fade-left" data-aos-duration="800">
                <h3 class="text-lg font-bold text-slate-900 mb-2">Latest Articles</h3>

                <?php
                $sidebar_query = new WP_Query([
                    'post_type'      => 'post',
                    'posts_per_page' => 4,
                    'post__not_in'   => [$featured_id],
                    'post_status'    => 'publish',
                ]);

                if ($sidebar_query->have_posts()) :
                    while ($sidebar_query->have_posts()) : $sidebar_query->the_post();
                        $cats       = get_the_category();
                        $cat_name   = !empty($cats) ? $cats[0]->name : 'Insurtech AI';
                        $side_thumb = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') : 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=300';
                        
                        $side_content   = strip_tags(get_the_content());
                        $side_read_time = max(1, ceil(str_word_count($side_content) / 200));
                ?>
                    <a href="<?php the_permalink(); ?>" class="bg-white p-3.5 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md hover:border-red-500/40 transition-all flex items-center gap-4 group">
                        <div class="w-20 h-20 rounded-xl overflow-hidden bg-slate-100 shrink-0">
                            <img src="<?php echo esc_url($side_thumb); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                        </div>
                        <div class="space-y-1">
                            <span class="block text-[10px] font-bold text-red-600  ">
                                <?php echo esc_html($cat_name); ?>
                            </span>
                            <h4 class="font-bold text-slate-900 text-xs leading-snug line-clamp-2 group-hover:text-red-600 transition-colors">
                                <?php the_title(); ?>
                            </h4>
                            <span class="flex items-center gap-1.5 text-[10px] text-slate-400">
                                <span><?php echo get_the_date('j F Y'); ?></span>
                                <span>•</span>
                                <i data-lucide="clock" class="w-3 h-3"></i>
                                <span><?php echo $side_read_time; ?> min baca</span>
                            </span>
                        </div>
                    </a>
                <?php 
                    endwhile; 
                    wp_reset_postdata(); 
                endif; 
                ?>
            </div>

        </div>

        <!-- 3. MAIN ARTICLES GRID -->
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $grid_query = new WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => 6,
            'paged'          => $paged,
            'post__not_in'   => [$featured_id],
            'post_status'    => 'publish',
        ]);

        if ($grid_query->have_posts()) : 
        ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <?php while ($grid_query->have_posts()) : $grid_query->the_post(); 
                    $cats       = get_the_category();
                    $cat_name   = !empty($cats) ? $cats[0]->name : 'Whitepaper';
                    $card_thumb = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium_large') : 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=800';
                    
                    $grid_content   = strip_tags(get_the_content());
                    $grid_read_time = max(1, ceil(str_word_count($grid_content) / 200));
                ?>
                    <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 shadow-sm hover:shadow-xl hover:border-red-500/40 transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="<?php echo ($grid_query->current_post * 100); ?>">
                        <div>
                            <div class="relative h-48 bg-slate-900 overflow-hidden">
                                <span class="absolute top-3 left-3 z-10 bg-slate-950/80 text-white text-[10px] font-bold px-3 py-1 rounded-md backdrop-blur-md">
                                    <?php echo esc_html($cat_name); ?>
                                </span>
                                <img src="<?php echo esc_url($card_thumb); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            </div>

                            <div class="p-6 space-y-2">
                                <span class="flex items-center gap-1.5 text-sm text-slate-400 font-medium">
                                    <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                                    <span><?php echo $grid_read_time; ?> min baca</span>
                                    <span>•</span>
                                    <span><?php echo get_the_date('j F Y'); ?></span>
                                </span>
                                <h3 class="font-bold text-slate-900 text-base leading-snug group-hover:text-red-600 transition-colors">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                            </div>
                        </div>

                        <div class="p-6 pt-0">
                            <a href="<?php the_permalink(); ?>" class="text-xs font-bold text-red-600 flex items-center justify-between pt-4 border-t border-slate-100 group-hover:text-red-500 transition-colors">
                                Read Full Dossier <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- 4. PAGINATION -->
            <div class="flex items-center justify-center gap-2 mb-20 text-xs font-bold">
                <?php
                echo paginate_links([
                    'total'        => $grid_query->max_num_pages,
                    'current'      => $paged,
                    'prev_text'    => '<i data-lucide="arrow-left" class="w-4 h-4 inline"></i>',
                    'next_text'    => '<i data-lucide="arrow-right" class="w-4 h-4 inline"></i>',
                    'type'         => 'plain',
                    'before_page_number' => '<span class="w-9 h-9 rounded-full flex items-center justify-center hover:bg-slate-200 transition-colors">',
                    'after_page_number'  => '</span>',
                ]);
                ?>
            </div>
        <?php 
            wp_reset_postdata(); 
        endif; 
        ?>

        <!-- 5. NEWSLETTER SIGN UP BANNER -->
        <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-red-950 text-white rounded-3xl p-8 md:p-12 shadow-2xl relative overflow-hidden" data-aos="fade-up" data-aos-duration="800">
            <div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-full bg-red-600/20 blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-2xl space-y-4">
                <h2 class="text-2xl md:text-4xl font-black tracking-tight leading-tight">
                    Sign up to get more from Atlas Adjusting Indonesia
                </h2>
                <p class="text-xs md:text-sm text-slate-300">
                    Thought leadership • Regulatory updates • New solutions • News & insights
                </p>
                <div class="pt-2">
                    <a href="#subscribe" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full bg-red-600 hover:bg-red-500 text-white font-bold text-xs   transition-all shadow-lg hover:-translate-y-0.5">
                        Subscribe Now <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

</section>

<?php 
get_footer(); 
?>