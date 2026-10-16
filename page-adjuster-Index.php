<?php
/**
 * Template Name: Adjuster Index Directory
 * Description: Page template modular untuk direktori lengkap Adjuster & Personel Atlas
 */

get_header(); 
?>

<div class="site-main font-sans bg-slate-50 text-slate-900 pb-20">

    <?php 
    get_template_part('template-parts/adjusters/hero'); 
    get_template_part('template-parts/adjusters/grid'); 
    ?>

</div>

<?php 
get_footer(); 
?>