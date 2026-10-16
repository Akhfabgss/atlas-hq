<?php
/**
 * Template Part: Professionals Grid Section (Pure CPT Database)
 */

$args = [
    'post_type'      => 'adjuster',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_query'     => [
        [
            'key'     => 'display_locations',
            'value'   => 'professionals',
            'compare' => 'LIKE',
        ],
    ],
    'orderby'        => 'date',
    'order'          => 'ASC',
];

$pro_query = new WP_Query($args);
?>

<!-- 3. PROFESSIONALS SECTION -->
<section class="py-12 font-sans">
    <div class="container mx-auto px-6 max-w-7xl">
        
        <div class="mb-10 max-w-7xl">
            <span class="inline-block text-sm font-bold  st text-red-600 mb-2">Technical Experts</span>
            <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">
                Our <span class="text-red-600">Professionals</span>
            </h2>
            <p class="text-slate-600 text-xs md:text-sm mt-2 leading-relaxed font-medium">
                Atlas Adjusting Indonesia’s experts bring together technical proficiency, industry insight, and extensive field experience to manage complex claims across a wide range of industries. Through independent evaluation, meticulous investigation, and practical recommendations, our professionals help clients navigate every stage of the claims process with confidence.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php if ($pro_query->have_posts()) : ?>
                <?php while ($pro_query->have_posts()) : $pro_query->the_post(); 
                    $role  = get_field('profile_role') ?: 'Technical Adjuster';
                    $email = get_field('profile_email') ?: '';
                    $title = get_field('profile_title') ?: '';
                    
                    $img_url = has_post_thumbnail() 
                        ? get_the_post_thumbnail_url(get_the_ID(), 'large') 
                        : 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=800';
                ?>
                    <div class="group relative rounded-3xl overflow-hidden shadow-md bg-slate-900 h-[430px] transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl border border-slate-200/60 cursor-pointer">
                        
                        <!-- Full Card Click Overlay Link -->
                        <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="View profile of <?php the_title_attribute(); ?>"></a>

                        <img 
                            src="<?php echo esc_url($img_url); ?>" 
                            alt="<?php the_title_attribute(); ?>" 
                            class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500"
                        />

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent pointer-events-none"></div>

                        <div class="absolute bottom-4 inset-x-4 bg-white/95 backdrop-blur-md rounded-2xl p-4 shadow-lg flex items-center justify-between border border-slate-100 group-hover:border-red-500/60 transition-colors z-20">
                            <div class="pr-2">
                                <h4 class="font-black text-slate-900 text-base leading-tight group-hover:text-red-600 transition-colors">
                                    <?php the_title(); ?>
                                </h4>
                                <p class="text-sm text-slate-500 font-medium mt-0.5 leading-tight line-clamp-1" title="<?php echo esc_attr($title); ?>">
                                    <?php echo esc_html($title); ?>
                                </p>
                                <p class="text-xs text-red-600 font-bold mt-1.5  ">
                                    <?php echo esc_html($role); ?>
                                </p>
                            </div>

                            <!-- Direct Email Button -->
                            <?php if (!empty($email)) : ?>
                                <a 
                                    href="mailto:<?php echo esc_attr($email); ?>" 
                                    title="Kirim Email ke <?php the_title_attribute(); ?>" 
                                    class="w-9 h-9 rounded-xl bg-slate-100 hover:bg-red-600 text-slate-600 hover:text-white flex items-center justify-center transition-all shrink-0 shadow-sm z-30"
                                >
                                    <i data-lucide="mail" class="w-4 h-4"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="text-sm text-slate-500 col-span-full">Belum ada data Professionals yang dicentang di WP Admin.</p>
            <?php endif; ?>

        </div>

    </div>
</section>