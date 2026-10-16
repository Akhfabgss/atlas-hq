<?php
/**
 * Template Name: Front Page / Landing Page Utama
 */
get_header();
?>

<div class="site-main">

    <?php 
    get_template_part('template-parts/home/hero'); 
    get_template_part('template-parts/home/core-values'); 
    get_template_part('template-parts/home/about-us');
    get_template_part('template-parts/home/milestone');
    get_template_part('template-parts/home/insights');
    get_template_part('template-parts/home/technology-mvp');
    get_template_part('template-parts/home/clients');
    ?>

</div>

<?php get_footer(); ?>