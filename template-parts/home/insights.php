<?php
if (!defined('ABSPATH')) exit;

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$insights_query = new WP_Query($args);
?>

<!-- 1. INSIGHTS & BULLETINS SECTION -->
<section class="py-16 md:py-16 bg-slate-50 font-sans">
  <div class="container mx-auto px-6 max-w-7xl">
    
    <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="800">
      <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">
        Insights & <span class="text-red-600">Bulletins</span>
      </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <?php if ($insights_query->have_posts()) : ?>
        <?php while ($insights_query->have_posts()) : $insights_query->the_post(); ?>
          
          <?php
          $categories = get_the_category();
          $category_name = !empty($categories) ? $categories[0]->name : 'Bulletin';

          $content = get_the_content();
          $word_count = str_word_count(strip_tags($content));
          $read_time = ceil($word_count / 200);
          if ($read_time < 1) $read_time = 1;

          $thumbnail_url = has_post_thumbnail() 
            ? get_the_post_thumbnail_url(get_the_ID(), 'large') 
            : get_template_directory_uri() . '/assets/images/default-insight.jpg';
          ?>

          <article class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 shadow-sm hover:shadow-xl hover:border-red-500/40 transition-all duration-300 flex flex-col justify-between group">
            
            <div>
              <div class="relative h-52 overflow-hidden bg-slate-100">
                <img 
                  src="<?php echo esc_url($thumbnail_url); ?>" 
                  alt="<?php the_title_attribute(); ?>" 
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                />
                
                <div class="absolute top-4 left-4 bg-slate-900/90 backdrop-blur-md text-white text-sm font-bold   px-3 py-1.5 rounded-lg border border-white/10">
                  <?php echo esc_html($category_name); ?>
                </div>
              </div>

              <div class="p-6">
                <div class="flex items-center gap-1.5 text-xs text-red-600 font-semibold mb-3">
                  <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                  <span><?php echo $read_time; ?> min read</span>
                  <span class="text-slate-300">•</span>
                  <span class="text-slate-500"><?php echo get_the_date('F Y'); ?></span>
                </div>

                <h3 class="text-lg font-bold text-slate-900 leading-snug group-hover:text-red-600 transition-colors line-clamp-3">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h3>
              </div>
            </div>

            <div class="px-6 pb-6 pt-2">
              <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-xs font-bold tracking-tight text-red-600 hover:text-red-500 transition-all">
                <span>Read Full Dossier</span>
                <span class="group-hover:translate-x-1 transition-transform"><i data-lucide="arrow-right" class="w-4 h-4"></i></span>
              </a>
            </div>

          </article>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <p class="text-center text-slate-500 col-span-3">Belum ada artikel yang diterbitkan.</p>
      <?php endif; ?>
    </div>

    <div class="text-center mt-12">
                    <a href="<?php echo esc_url(home_url('/news-insights/')); ?>" class="inline-flex items-center gap-2 text-sm font-bold text-red-600 hover:text-red-500 transition-colors group">
                        <span>View All Whitepapers & Reports</span> 
                        <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </a>
    </div>

  </div>
</section>