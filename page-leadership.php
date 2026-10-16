<?php
/**
 * Template Name: Leadership & Team Directory
 * Description: Page template modular untuk Board of Directors & Professionals
 */

get_header(); 
?>

<div class="site-main font-sans bg-slate-50 text-slate-900 pb-20">

    <?php 
    get_template_part('template-parts/leadership/hero'); 
    get_template_part('template-parts/leadership/board'); 
    get_template_part('template-parts/leadership/professionals'); 
    ?>

</div>

<?php 
get_footer(); 
?>