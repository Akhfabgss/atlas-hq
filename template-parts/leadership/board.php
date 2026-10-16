<?php
/**
 * Template Part: Board of Directors Section (Pure CPT Database)
 */

$args = [
    'post_type'      => 'adjuster',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_query'     => [
        [
            'key'     => 'display_locations',
            'value'   => 'board',
            'compare' => 'LIKE',
        ],
    ],
    'orderby'        => 'date',
    'order'          => 'ASC',
];

$board_query = new WP_Query($args);
?>

<!-- 2. BOARD OF DIRECTORS SECTION -->
<section class="py-16 md:py-20 font-sans">
    <div class="container mx-auto px-6 max-w-7xl">
        
        <div class="mb-10 max-w-7xl">
            <span class="inline-block text-sm font-bold text-red-600 mb-2">Executive Leadership</span>
            <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">
                Our <span class="text-red-600">Board</span>
            </h2>
            <p class="text-slate-600 text-xs md:text-sm mt-2 leading-relaxed font-medium">
                Our leadership team and technical experts combine decades of industry experience, professional qualifications, and practical field expertise to deliver trusted loss adjusting and risk assessment services. Guided by the principles of integrity, independence, and professionalism, we are committed to providing accurate assessments, responsive service, and practical solutions that support insurers, brokers, and corporate clients in making informed decisions.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <?php if ($board_query->have_posts()) : ?>
                <?php while ($board_query->have_posts()) : $board_query->the_post(); 
                    $role  = get_field('profile_role') ?: 'Board Member';
                    $email = get_field('profile_email') ?: '';
                    $phone = get_field('profile_phone') ?: '';
                    $title = get_field('profile_title') ?: '';
                    $bio   = get_field('profile_bio') ?: '';
                    $badge = strtoupper(str_replace(['|', '-'], ' ', $role));
                    
                    $img_url = has_post_thumbnail() 
                        ? get_the_post_thumbnail_url(get_the_ID(), 'large') 
                        : 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=800';
                ?>
                    <div class="group relative rounded-3xl overflow-hidden shadow-md bg-slate-900 h-[440px] cursor-pointer transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl border border-slate-200/60">
                        
                        <!-- Full Card Click Overlay Link -->
                        <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="View profile of <?php the_title_attribute(); ?>"></a>

                        <!-- Default View -->
                        <div class="absolute inset-0 w-full h-full transition-all duration-500 group-hover:scale-105 group-hover:opacity-20">
                            <img 
                                src="<?php echo esc_url($img_url); ?>" 
                                alt="<?php the_title_attribute(); ?>" 
                                class="w-full h-full object-cover object-top"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/30 to-transparent"></div>
                        </div>

                        <div class="absolute bottom-0 inset-x-0 p-6 flex items-end justify-between text-white z-10 transition-all duration-300 group-hover:opacity-0 group-hover:translate-y-4 pointer-events-none">
                            <div class="pr-2">
                                <h3 class="text-lg font-black leading-tight">
                                    <?php the_title(); ?>
                                </h3>
                                <p class="text-sm text-slate-300 font-medium leading-tight mt-0.5 opacity-90">
                                    <?php echo esc_html($title); ?>
                                </p>
                                <p class="text-xs text-red-500 font-bold mt-2  ">
                                    <?php echo esc_html($role); ?>
                                </p>
                            </div>
                            <div class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-md text-white flex items-center justify-center shrink-0">
                                <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                            </div>
                        </div>

                        <!-- Hover View -->
                        <div class="absolute inset-0 bg-red-600 text-white p-6 md:p-8 flex flex-col justify-between z-20 opacity-0 transition-all duration-500 group-hover:opacity-100 pointer-events-none">
                            <div>
                                <span class="inline-block px-3 py-1 rounded-full bg-red-700/80 text-[10px] font-bold st  mb-4 text-white/90 border border-white/10">
                                    • <?php echo esc_html($badge); ?>
                                </span>

                                <h3 class="text-xl font-black leading-tight">
                                    <?php the_title(); ?>
                                </h3>
                                <p class="text-sm text-white/80 font-medium mb-3">
                                    <?php echo esc_html($title); ?>
                                </p>

                                <p class="text-xs leading-relaxed text-white/90 line-clamp-4 font-medium">
                                    <?php echo esc_html($bio); ?>
                                </p>
                            </div>

                            <!-- Direct Actions -->
                            <div class="flex items-center gap-3 pt-4 border-t border-white/20 z-30 pointer-events-auto">
                                <?php if (!empty($phone)) : ?>
                                    <a href="tel:<?php echo esc_attr($phone); ?>" title="Telepon" class="w-10 h-10 rounded-full bg-white/20 hover:bg-white hover:text-red-600 flex items-center justify-center transition-all text-white shadow-sm">
                                        <i data-lucide="phone" class="w-4 h-4"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($email)) : ?>
                                    <a href="mailto:<?php echo esc_attr($email); ?>" title="Kirim Email" class="w-10 h-10 rounded-full bg-white/20 hover:bg-white hover:text-red-600 flex items-center justify-center transition-all text-white shadow-sm">
                                        <i data-lucide="mail" class="w-4 h-4"></i>
                                    </a>
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" class="ml-auto text-xs font-bold underline hover:text-slate-100 flex items-center gap-1">
                                    <span>Full Profile</span>
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="text-sm text-slate-500 col-span-full">Belum ada data Board of Directors yang dicentang di WP Admin.</p>
            <?php endif; ?>

        </div>

    </div>
</section>