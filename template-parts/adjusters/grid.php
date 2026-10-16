<?php
/**
 * Template Part: Adjusters Grid (Filtered by Display Location: Adjuster Index)
 */

// Query mengambil Adjuster dari CPT 'adjuster' yang HANYA dicentang 'adjuster_index'
$args = [
    'post_type'      => 'adjuster',
    'posts_per_page' => -1, // Ambil semua data sesuai filter
    'post_status'    => 'publish',
    'orderby'        => 'menu_order title',
    'order'          => 'ASC',
    'meta_query'     => [
        [
            'key'     => 'display_locations',
            'value'   => 'adjuster_index', // Hanya ambil yang centang 'adjuster_index'
            'compare' => 'LIKE',
        ],
    ],
    'orderby'        => 'date',
    'order'          => 'ASC',
];

$adjuster_query = new WP_Query($args);
?>

<div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="adjuster-cards-grid">
    <?php 
    if ($adjuster_query->have_posts()) :
        while ($adjuster_query->have_posts()) : $adjuster_query->the_post();
            
            // Ambil data ACF
            $name     = get_field('profile_name') ?: get_the_title();
            $title    = get_field('profile_title') ?: 'Technical Loss Adjuster';
            $role     = get_field('profile_role') ?: 'Adjuster';
            $tag      = get_field('profile_tag') ?: 'PAR';
            
            // Ambil gambar utama (Featured Image)
            $img_url = has_post_thumbnail() 
                ? get_the_post_thumbnail_url(get_the_ID(), 'large') 
                : 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=800';
    ?>
        <div class="adjuster-card group relative rounded-3xl overflow-hidden shadow-md bg-slate-900 h-[430px] transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl border border-slate-200/60 cursor-pointer">
            
            <!-- Link Otomatis Mengarah ke Single Profile Orang Tersebut -->
            <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="View profile of <?php echo esc_attr($name); ?>"></a>

            <img 
                src="<?php echo esc_url($img_url); ?>" 
                alt="<?php echo esc_attr($name); ?>" 
                class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500"
            />

            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent pointer-events-none"></div>

            <div class="absolute bottom-4 inset-x-4 bg-white/95 backdrop-blur-md rounded-2xl p-4 shadow-lg border border-slate-200/80 group-hover:border-red-500/60 transition-colors z-20">
                <h4 class="font-black text-slate-900 text-sm leading-snug line-clamp-1 group-hover:text-red-600 transition-colors" title="<?php echo esc_attr($name); ?>">
                    <?php echo esc_html($name); ?>
                </h4>
                <p class="text-[10px] text-slate-500 font-medium mt-0.5 leading-tight line-clamp-1" title="<?php echo esc_attr($title); ?>">
                    <?php echo esc_html($title); ?>
                </p>
                
                <div class="flex items-center justify-between gap-3 mt-3 pt-2 border-t border-slate-100 min-w-0">
                    <!-- Role: Tetap 1 baris & Scroll Horizontal jika panjang -->
                    <div class="overflow-x-auto whitespace-nowrap scrollbar-none [ms-overflow-style:none] [scrollbar-width:none]">
                        <span class="text-sm font-semibold text-slate-700 flex items-center gap-1.5">
                            <i data-lucide="briefcase" class="w-3.5 h-3.5 text-slate-400 shrink-0"></i>
                            <span><?php echo esc_html($role); ?></span>
                        </span>
                    </div>

                    <!-- Tag: Tetap 1 baris & Scroll Horizontal jika panjang -->
                    <div class="overflow-x-auto whitespace-nowrap scrollbar-none [ms-overflow-style:none] [scrollbar-width:none] shrink-0 max-w-[45%] text-right">
                        <span class="text-[10px] font-bold text-red-600  ">
                            <?php echo esc_html($tag); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    <?php 
        endwhile; 
        wp_reset_postdata(); 
    else :
    ?>
        <p class="text-sm text-slate-500 col-span-full">Belum ada data Adjuster yang dicentang 'Adjuster Index' di WP Admin.</p>
    <?php endif; ?>
</div>

<style>
    /* Sembunyikan Scrollbar untuk Chrome, Safari, dan Opera */
    .scrollbar-none::-webkit-scrollbar {
        display: none;
    }

    /* Sembunyikan Scrollbar untuk IE, Edge, dan Firefox */
    .scrollbar-none {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>