<?php
if (!defined('ABSPATH')) exit;
?>

<!-- 1. SITE HEADER & NAVIGATION BAR -->
<header class="sticky top-0 z-50 bg-white border-b border-slate-200 text-slate-800 shadow-sm">
    <div class="container mx-auto px-6 max-w-7xl h-20 flex items-center justify-between relative">

        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 group shrink-0">
            <img 
                src="<?php echo get_template_directory_uri(); ?>/assets/images/LOGO-PT-ATLAS-ADJUSTING-INDONESIA.png" 
                alt="Atlas Adjusting Indonesia" 
                class="w-44 md:w-48 object-contain" 
            />
        </a>

        <nav class="hidden lg:flex items-center gap-8 h-full">
            <a 
                href="<?php echo esc_url(home_url('/')); ?>"
                class="relative py-2 text-sm font-bold text-slate-800 hover:text-red-600 transition-colors after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-red-600 after:transition-all hover:after:w-full <?php echo (is_front_page() || is_home()) ? 'text-red-600 after:w-full' : ''; ?>"
            >
                Home
            </a>

            <!-- MEGA MENU: SOLUTIONS -->
            <div class="h-full flex items-center group/nav">
                <a 
                    href="<?php echo esc_url(home_url('/range-of-service/')); ?>"
                    class="relative py-2 text-sm font-bold text-slate-800 hover:text-red-600 transition-colors inline-flex items-center gap-1.5 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-red-600 after:transition-all hover:after:w-full <?php echo is_page(['range-of-service', 'property-desk', 'machinery-breakdown-desk', 'construction-engineering-desk', 'heavy-equipment-desk', 'energy-oil-gas-desk', 'marine-miscellaneous-desk']) ? 'text-red-600 after:w-full' : ''; ?>"
                >
                    Solutions
                    <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform group-hover/nav:rotate-180"></i>
                </a>

                <div class="absolute left-0 top-full w-full bg-white border-b border-slate-200 shadow-xl hidden group-hover/nav:block transition-all duration-300">
                    <div class="container mx-auto px-6 max-w-7xl py-8">
                        <div class="grid grid-cols-3 gap-8">
                            
                            <div class="space-y-2">
                                <a href="<?php echo esc_url(home_url('/property-desk/')); ?>" class="block p-3 rounded-2xl border border-transparent hover:border-slate-200/80 hover:bg-slate-50 transition-all duration-300 group">
                                    <h4 class="font-bold text-sm text-slate-900 group-hover:text-red-600 transition-colors">Property Desk</h4>
                                    <p class="text-xs text-slate-500 mt-0.5">PAR, Fire & Business Interruption Loss Assessment</p>
                                </a>
                                <a href="<?php echo esc_url(home_url('/machinery-breakdown-desk/')); ?>" class="block p-3 rounded-2xl border border-transparent hover:border-slate-200/80 hover:bg-slate-50 transition-all duration-300 group">
                                    <h4 class="font-bold text-sm text-slate-900 group-hover:text-red-600 transition-colors">Machinery Breakdown Desk</h4>
                                    <p class="text-xs text-slate-500 mt-0.5">Industrial Plant Failures & Critical Equipment Damage</p>
                                </a>
                            </div>

                            <div class="space-y-2">
                                <a href="<?php echo esc_url(home_url('/construction-engineering-desk/')); ?>" class="block p-3 rounded-2xl border border-transparent hover:border-slate-200/80 hover:bg-slate-50 transition-all duration-300 group">
                                    <h4 class="font-bold text-sm text-slate-900 group-hover:text-red-600 transition-colors">Construction & Engineering Desk</h4>
                                    <p class="text-xs text-slate-500 mt-0.5">CAR, EAR & Infrastructure Project Risk Loss Adjusting</p>
                                </a>
                                <a href="<?php echo esc_url(home_url('/heavy-equipment-desk/')); ?>" class="block p-3 rounded-2xl border border-transparent hover:border-slate-200/80 hover:bg-slate-50 transition-all duration-300 group">
                                    <h4 class="font-bold text-sm text-slate-900 group-hover:text-red-600 transition-colors">Heavy Equipment Desk</h4>
                                    <p class="text-xs text-slate-500 mt-0.5">Mining Machinery, CPM Fleet & Heavy Machinery Claims</p>
                                </a>
                            </div>

                            <div class="space-y-2">
                                <a href="<?php echo esc_url(home_url('/energy-oil-gas-desk/')); ?>" class="block p-3 rounded-2xl border border-transparent hover:border-slate-200/80 hover:bg-slate-50 transition-all duration-300 group">
                                    <h4 class="font-bold text-sm text-slate-900 group-hover:text-red-600 transition-colors">Energy, Oil & Gas Desk</h4>
                                    <p class="text-xs text-slate-500 mt-0.5">Upstream, Midstream, Downstream & Project Cargo</p>
                                </a>
                                <a href="<?php echo esc_url(home_url('/marine-miscellaneous-desk/')); ?>" class="block p-3 rounded-2xl border border-transparent hover:border-slate-200/80 hover:bg-slate-50 transition-all duration-300 group">
                                    <h4 class="font-bold text-sm text-slate-900 group-hover:text-red-600 transition-colors">Marine & Miscellaneous Desk</h4>
                                    <p class="text-xs text-slate-500 mt-0.5">Marine Hull, Cargo, Liabilities & Financial Lines</p>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <a 
                href="<?php echo esc_url(home_url('/coverage-map/')); ?>"
                class="relative py-2 text-sm font-bold text-slate-800 hover:text-red-600 transition-colors after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-red-600 after:transition-all hover:after:w-full <?php echo is_page('coverage-map') ? 'text-red-600 after:w-full' : ''; ?>"
            >
                Locations
            </a>

            <!-- MEGA MENU: ABOUT -->
            <div class="h-full flex items-center group/nav">
                <a 
                    href="<?php echo esc_url(home_url('/leadership/')); ?>"
                    class="relative py-2 text-sm font-bold text-slate-800 hover:text-red-600 transition-colors inline-flex items-center gap-1.5 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-red-600 after:transition-all hover:after:w-full <?php echo (is_page(['leadership', 'our-associate', 'adjuster-index', 'korean-desk'])) ? 'text-red-600 after:w-full' : ''; ?>"
                >
                    About
                    <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform group-hover/nav:rotate-180"></i>
                </a>

                <div class="absolute left-0 top-full w-full bg-white border-b border-slate-200 shadow-xl hidden group-hover/nav:block transition-all duration-300">
                    <div class="container mx-auto px-6 max-w-7xl py-8">
                        <div class="grid grid-cols-4 gap-6">
                            <a href="<?php echo esc_url(home_url('/leadership/')); ?>" class="p-4 rounded-2xl border border-transparent hover:border-slate-200/80 hover:bg-slate-50 transition-all duration-300 group">
                                <h4 class="font-bold text-slate-900 text-sm group-hover:text-red-600 transition-colors">Leadership</h4>
                                <p class="text-xs text-slate-500 mt-1">Our board of directors and executive management team.</p>
                            </a>
                            <a href="<?php echo esc_url(home_url('/our-associate/')); ?>" class="p-4 rounded-2xl border border-transparent hover:border-slate-200/80 hover:bg-slate-50 transition-all duration-300 group">
                                <h4 class="font-bold text-slate-900 text-sm group-hover:text-red-600 transition-colors">Our Associates</h4>
                                <p class="text-xs text-slate-500 mt-1">Certified loss adjusters & engineering partners roster.</p>
                            </a>
                            <a href="<?php echo esc_url(home_url('/adjuster-index/')); ?>" class="p-4 rounded-2xl border border-transparent hover:border-slate-200/80 hover:bg-slate-50 transition-all duration-300 group">
                                <h4 class="font-bold text-slate-900 text-sm group-hover:text-red-600 transition-colors">Adjuster Index</h4>
                                <p class="text-xs text-slate-500 mt-1">Complete technical expertise directory.</p>
                            </a>
                            <a href="<?php echo esc_url(home_url('/korean-desk/')); ?>" class="p-4 rounded-2xl border border-transparent hover:border-slate-200/80 hover:bg-slate-50 transition-all duration-300 group">
                                <h4 class="font-bold text-slate-900 text-sm group-hover:text-red-600 transition-colors">Korean Desk</h4>
                                <p class="text-xs text-slate-500 mt-1">Dedicated liaison services for Korean insurers & firms.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <a 
                href="<?php echo esc_url(home_url('/career/')); ?>"
                class="relative py-2 text-sm font-bold text-slate-800 hover:text-red-600 transition-colors after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-red-600 after:transition-all hover:after:w-full <?php echo is_page('career') ? 'text-red-600 after:w-full' : ''; ?>"
            >
                Career
            </a>

            <!-- DROPDOWN MENU: INSIGHTS & EVENTS -->
            <div class="h-full flex items-center group/nav">
                <a 
                    href="<?php echo esc_url(home_url('/news-insights/')); ?>"
                    class="relative py-2 text-sm font-bold text-slate-800 hover:text-red-600 transition-colors inline-flex items-center gap-1.5 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-red-600 after:transition-all hover:after:w-full <?php echo (is_page(['news-insights', 'events']) || is_single()) ? 'text-red-600 after:w-full' : ''; ?>"
                >
                    Insights
                    <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform group-hover/nav:rotate-180"></i>
                </a>

                <div class="absolute left-0 top-full w-full bg-white border-b border-slate-200 shadow-xl hidden group-hover/nav:block transition-all duration-300">
                        <div class="container mx-auto px-6 max-w-7xl py-8">
                            <div class="grid grid-cols-2 gap-6">
                                <a href="<?php echo esc_url(home_url('/news-insights/')); ?>" class="block p-3 rounded-xl hover:bg-slate-50 transition-all group">
                                    <h4 class="font-bold text-sm text-slate-900 group-hover:text-red-600 transition-colors">News & Bulletins</h4>
                                    <p class="text-xs text-slate-500 mt-0.5">Industry reports, technical whitepapers & claim insights.</p>
                                </a>
                                <a href="<?php echo esc_url(home_url('/events/')); ?>" class="block p-3 rounded-xl hover:bg-slate-50 transition-all group border-t border-slate-100">
                                    <h4 class="font-bold text-sm text-slate-900 group-hover:text-red-600 transition-colors">Events & Webinars</h4>
                                    <p class="text-xs text-slate-500 mt-0.5">Upcoming corporate seminars, training & industry briefings.</p>
                                </a>
                            </div>
                        </div>
                    </div>
                 </div>

            <a 
                href="<?php echo esc_url(home_url('/contact/')); ?>"
                class="relative py-2 text-sm font-bold text-slate-800 hover:text-red-600 transition-colors after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-red-600 after:transition-all hover:after:w-full <?php echo is_page('contact') ? 'text-red-600 after:w-full' : ''; ?>"
            >
                Contact
            </a>
        </nav>

        <div class="flex items-center">
            <a 
                href="https://cmp.atlasadjusting.net" 
                target="_blank"
                class="inline-flex items-center justify-center px-6 py-2.5 rounded-full text-xs font-bold   bg-red-600 hover:bg-red-500 text-white transition-all shadow-md hover:shadow-lg shadow-red-600/20"
            >
                Client Login
            </a>
        </div>

    </div>
</header>