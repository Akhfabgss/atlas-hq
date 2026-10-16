<?php
/**
 * Template Name: Single Post Detail
 * Description: Template standar WordPress untuk menampilkan detail postingan artikel / berita
 */

$post_id         = get_the_ID();
$like_count      = (int) get_post_meta($post_id, '_post_like_count', true) ?: 100; 
$comment_count   = get_comments_number($post_id);
$formatted_likes = $like_count >= 1000 ? round($like_count / 1000, 1) . 'k' : $like_count;

$content       = get_post_field('post_content', get_the_ID());
$word_count    = str_word_count(strip_tags($content));
$read_time     = ceil($word_count / 200); 
$review_status = get_post_meta(get_the_ID(), '_article_review_status', true);

get_header(); 
?>

<!-- 1. ARTICLE DETAIL & SIDEBAR SECTION -->
<div id="main-content" class="site-main font-sans bg-slate-50 text-slate-900 pb-20 pt-8">

    <?php while (have_posts()) : the_post(); ?>

        <div class="container mx-auto px-6 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <!-- ARTICLE CONTENT MAIN COLUMN -->
                <article class="lg:col-span-8 space-y-8" data-aos="fade-up" data-aos-duration="800">
                    
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                        <?php the_title(); ?>
                    </h1>

                    <div class="flex flex-wrap items-center justify-between gap-4 py-3 border-y border-slate-200/80 text-xs text-slate-500 font-medium">
                        <div class="flex items-center gap-3">
                            <?php 
                            $author_id = get_the_author_meta('ID');
                            $avatar    = get_avatar_url($author_id, ['size' => 96]);
                            ?>
                            <img src="<?php echo esc_url($avatar); ?>" alt="<?php the_author(); ?>" class="w-10 h-10 rounded-full object-cover border border-slate-200" />
                            <div>
                                <h4 class="font-bold text-slate-900 flex items-center gap-1.5 text-xs">
                                    <?php the_author(); ?>
                                </h4>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 text-sm font-medium text-slate-500">
                            <span class="flex items-center gap-1.5">
                                <i data-lucide="calendar" class="w-3.5 h-3.5 text-slate-400"></i>
                                <?php echo get_the_date('j M Y'); ?>
                            </span>

                            <?php if ($read_time > 0) : ?>
                                <span>•</span>
                                <span class="flex items-center gap-1.5">
                                    <i data-lucide="clock" class="w-3.5 h-3.5 text-slate-400"></i>
                                    <?php echo $read_time; ?> min baca
                                </span>
                            <?php endif; ?>

                            <?php if (!empty($review_status)) : ?>
                                <span>•</span>
                                <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200/80 font-bold text-[10px] flex items-center gap-1">
                                    <i data-lucide="check-circle" class="w-3 h-3 text-emerald-600"></i>
                                    <?php echo esc_html($review_status); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="article-body-content text-slate-700 text-sm md:text-base leading-relaxed space-y-6 pt-2">
                        <?php the_content(); ?>
                    </div>

                    <?php 
                    $post_tags = get_the_tags();
                    if ($post_tags) : 
                    ?>
                        <div class="pt-6 border-t border-slate-200/80 space-y-2">
                            <span class="text-[10px] font-bold text-slate-400  st block">Topik Terkait:</span>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach ($post_tags as $tag) : ?>
                                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="px-3 py-1.5 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 text-xs font-semibold transition-colors">
                                        #<?php echo esc_html($tag->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="p-4 bg-white w-full rounded-2xl border border-slate-200/80 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-6 text-xs font-bold text-slate-600 w-full sm:w-auto justify-between sm:justify-start">
                            
                            <button type="button" id="like-btn" data-post-id="<?php echo $post_id; ?>" class="flex items-center gap-1.5 hover:text-red-600 transition-colors">
                                <i data-lucide="thumbs-up" class="w-4 h-4 text-slate-500"></i>
                                <span id="like-count"><?php echo esc_html($formatted_likes); ?></span> 
                                <span class="font-medium text-slate-400">Like</span>
                            </button>

                            <a href="#comments" class="flex items-center gap-1.5 hover:text-red-600 transition-colors">
                                <i data-lucide="message-square" class="w-4 h-4 text-slate-500"></i>
                                <span><?php echo esc_html($comment_count); ?></span> 
                                <span class="font-medium text-slate-400">Komentar</span>
                            </a>

                        </div>

                        <form action="<?php echo esc_url(site_url('/wp-comments-post.php')); ?>" method="post" class="w-full sm:w-auto relative">
                            <input 
                                type="text" 
                                name="comment" 
                                placeholder="Tulis tanggapan teknis..." 
                                class="w-full sm:w-64 pl-4 pr-10 py-2.5 rounded-xl bg-slate-100 text-xs font-medium focus:outline-none focus:ring-1 focus:ring-slate-300 text-slate-800" 
                                required 
                            />
                            <input type="hidden" name="comment_post_ID" value="<?php echo $post_id; ?>" />
                            
                            <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 w-7 h-7 rounded-lg bg-slate-900 text-white flex items-center justify-center hover:bg-red-600 transition-colors" title="Kirim">
                                <i data-lucide="send" class="w-3.5 h-3.5"></i>
                            </button>
                        </form>
                    </div>

                </article>

                <!-- SIDEBAR COLUMN -->
                <aside class="lg:col-span-4 space-y-8 sticky top-24" data-aos="fade-left" data-aos-duration="800">
                    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm space-y-4">
                        <span class="block text-sm font-bold  st text-red-600">
                            Bagikan Artikel
                        </span>
                        
                        <div class="grid grid-cols-5 gap-2">
                            <a href="https://linkedin.com/shareArticle?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="w-full h-10 rounded-xl bg-slate-100 hover:bg-red-600 hover:text-white flex items-center justify-center transition-all p-2.5 group" title="LinkedIn">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/linkedin.svg" class="w-4 h-4 text-slate-700 group-hover:text-white">
                            </a>

                            <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="w-full h-10 rounded-xl bg-slate-100 hover:bg-red-600 hover:text-white flex items-center justify-center transition-all p-2.5 group" title="WhatsApp">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/whatsapp.svg" class="w-4 h-4 text-slate-700 group-hover:text-white">
                            </a>

                            <a href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="w-full h-10 rounded-xl bg-slate-100 hover:bg-red-600 hover:text-white flex items-center justify-center transition-all p-2.5 group" title="Facebook">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/facebook.svg" class="w-4 h-4 text-slate-700 group-hover:text-white">
                            </a>

                            <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" class="w-full h-10 rounded-xl bg-slate-100 hover:bg-red-600 hover:text-white flex items-center justify-center transition-all p-2.5 group" title="Kirim Email">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/email.svg" class="w-4 h-4 text-slate-700 group-hover:text-white">
                            </a>

                            <button type="button" onclick="navigator.clipboard.writeText('<?php echo get_permalink(); ?>'); alert('Link berhasil disalin!');" class="w-full h-10 rounded-xl bg-slate-100 hover:bg-red-600 hover:text-white flex items-center justify-center transition-all p-2.5 group" title="Salin Link">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/link.svg" class="w-4 h-4 text-slate-700 group-hover:text-white">
                            </button>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold  st text-red-600">Artikel Terkait</span>
                            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="text-sm font-bold  text-slate-500 hover:text-red-600 transition-colors">Lihat Semua</a>
                        </div>

                        <div class="space-y-3">
                            <?php
                            $related_query = new WP_Query([
                                'post_type'      => 'post',
                                'posts_per_page' => 4,
                                'post__not_in'   => [get_the_ID()],
                                'orderby'        => 'rand',
                            ]);

                            if ($related_query->have_posts()) :
                                while ($related_query->have_posts()) : $related_query->the_post();
                                    $rel_categories  = get_the_category();
                                    $rel_category    = !empty($rel_categories) ? $rel_categories[0]->name : 'Insights';

                                    $rel_content   = get_post_field('post_content', get_the_ID());
                                    $rel_word_count= str_word_count(strip_tags($rel_content));
                                    $rel_read_time = max(1, ceil($rel_word_count / 200));

                                    $rel_thumb = has_post_thumbnail() 
                                        ? get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') 
                                        : 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=200';
                            ?>
                                <a href="<?php the_permalink(); ?>" class="flex items-center gap-3 group border-b border-slate-100 pb-3 last:border-b-0 last:pb-0">
                                    <img src="<?php echo esc_url($rel_thumb); ?>" alt="<?php the_title_attribute(); ?>" class="w-14 h-14 rounded-xl object-cover shrink-0" />
                                    <div class="space-y-0.5">
                                        <span class="block text-[9px] font-bold text-red-600  st">
                                            <?php echo esc_html($rel_category); ?> • <?php echo $rel_read_time; ?> MIN BACA
                                        </span>
                                        <h4 class="text-xs font-bold text-slate-900 group-hover:text-red-600 transition-colors line-clamp-2">
                                            <?php the_title(); ?>
                                        </h4>
                                    </div>
                                </a>
                            <?php 
                                endwhile; 
                                wp_reset_postdata(); 
                            endif; 
                            ?>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm space-y-4">
                        <div class="flex items-center gap-2 text-slate-900 font-bold text-sm">
                            <i data-lucide="mail" class="w-4 h-4 text-red-600"></i>
                            <span class="font-bold  tracking-tight text-xs">Atlas Risk Briefing</span>
                        </div>
                        <p class="text-xs font-medium text-slate-600 leading-relaxed">
                            Dapatkan kompendium mingguan studi kasus klaim, pembaharuan regulasi OJK, dan riset risiko industri langsung ke surel Anda.
                        </p>
                        <form action="#" method="post" class="space-y-3">
                            <input type="email" placeholder="nama.rekan@asuransi.co.id" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-xs focus:outline-none font-medium" required />
                            <button type="submit" class="w-full py-3 bg-red-600 hover:bg-red-500 text-white font-bold text-xs   rounded-xl transition-all duration-300 shadow-lg shadow-red-600/20 inline-flex items-center justify-center gap-2">
                                <span>Langganan Briefing Teknis</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>

                </aside>

            </div>
        </div>

    <?php endwhile; ?>

</div>

<style>
.article-body-content blockquote {
    background-color: #f8fafc;
    border-left: 4px solid #dc2626;
    padding: 1.5rem;
    border-radius: 0 1rem 1rem 0;
    margin: 1.5rem 0;
    font-style: italic;
    font-weight: 600;
    color: #1e293b;
}

.article-body-content h2 {
    font-size: 1.75rem;
    font-weight: 900;
    color: #0f172a;
    margin-top: 2rem;
    margin-bottom: 1rem;
    letter-spacing: -0.025em;
}

.article-body-content h3 {
    font-size: 1.25rem;
    font-weight: 800;
    color: #0f172a;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
}

.article-body-content p {
    margin-bottom: 1.25rem;
    line-height: 1.75;
}
</style>

<?php 
get_footer(); 
?>