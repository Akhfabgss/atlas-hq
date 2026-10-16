<?php
/**
 * Template Name: Range of Services Page
 * Description: Page template modular untuk menampilkan daftar layanan lengkap Atlas Adjusting
 */

get_header(); 
?>

<!-- 1. RANGE OF SERVICES MAIN -->
<main id="main-content" class="site-main font-sans bg-slate-50 text-slate-900">

    <section class="py-16 md:py-28 bg-slate-50 text-center h-auto">
        <div class="container mx-auto px-6 max-w-5xl">
            <h1 class="text-4xl md:text-6xl font-black text-slate-900 tracking-tight mb-6">
                Range of <span class="text-red-600">Services</span>
            </h1>
            <p class="text-xs sm:text-sm md:text-base font-medium text-slate-600 leading-relaxed max-w-3xl mx-auto">
                Responding when and where you need us — with more experts than anyone — ready to handle every type of loss, from the everyday to the catastrophic.
            </p>
        </div>
    </section>

    <!-- 2. STICKY QUICK NAVIGATION -->
    <div class="sticky top-0 z-30 bg-slate-900 text-slate-300 py-4 border-y border-slate-800 shadow-md overflow-x-auto no-scrollbar">
        <div class="container mx-auto px-6 max-w-7xl">
            <ul class="flex items-center justify-between gap-6 whitespace-nowrap text-xs font-bold  ">
                <li><a href="<?php echo esc_url(home_url('/property-desk/')); ?>" class="relative inline-block py-2 text-slate-300 hover:text-red-500 transition-colors duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-red-500 after:origin-left after:scale-x-0 after:transition-transform after:duration-300 hover:after:scale-x-100 <?php echo is_page(['property-desk', 'property']) ? 'text-red-500 after:scale-x-100' : ''; ?>">Property Desk</a></li>
                <li><a href="<?php echo esc_url(home_url('/machinery-breakdown-desk/')); ?>" class="relative inline-block py-2 text-slate-300 hover:text-red-500 transition-colors duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-red-500 after:origin-left after:scale-x-0 after:transition-transform after:duration-300 hover:after:scale-x-100 <?php echo is_page(['machinery-breakdown-desk', 'machinery-desk', 'machinery']) ? 'text-red-500 after:scale-x-100' : ''; ?>">Machinery Breakdown Desk</a></li>
                <li><a href="<?php echo esc_url(home_url('/construction-engineering-desk/')); ?>" class="relative inline-block py-2 text-slate-300 hover:text-red-500 transition-colors duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-red-500 after:origin-left after:scale-x-0 after:transition-transform after:duration-300 hover:after:scale-x-100 <?php echo is_page(['construction-desk', 'construction-engineering-desk', 'construction']) ? 'text-red-500 after:scale-x-100' : ''; ?>">Construction Engineer Desk</a></li>
                <li><a href="<?php echo esc_url(home_url('/heavy-equipment-desk/')); ?>" class="relative inline-block py-2 text-slate-300 hover:text-red-500 transition-colors duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-red-500 after:origin-left after:scale-x-0 after:transition-transform after:duration-300 hover:after:scale-x-100 <?php echo is_page(['heavy-equipment-desk', 'heavy-equipment']) ? 'text-red-500 after:scale-x-100' : ''; ?>">Heavy Equipment Desk</a></li>
                <li><a href="<?php echo esc_url(home_url('/energy-oil-gas-desk/')); ?>" class="relative inline-block py-2 text-slate-300 hover:text-red-500 transition-colors duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-red-500 after:origin-left after:scale-x-0 after:transition-transform after:duration-300 hover:after:scale-x-100 <?php echo is_page(['energy-desk', 'energy-oil-gas-desk', 'energy']) ? 'text-red-500 after:scale-x-100' : ''; ?>">Energy, Oil & Gas Desk</a></li>
                <li><a href="<?php echo esc_url(home_url('/marine-miscellaneous-desk/')); ?>" class="relative inline-block py-2 text-slate-300 hover:text-red-500 transition-colors duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-red-500 after:origin-left after:scale-x-0 after:transition-transform after:duration-300 hover:after:scale-x-100 <?php echo is_page(['korean-desk', 'marine-miscellaneous-desk', 'korean']) ? 'text-red-500 after:scale-x-100' : ''; ?>">Marine & Miscellaneous Desk</a></li>
            </ul>
        </div>
    </div>

    <?php 
    get_template_part('template-parts/services/showcase'); 
    get_template_part('template-parts/services/practice-desks'); 
    ?>

</main>

<?php 
get_footer(); 
?>