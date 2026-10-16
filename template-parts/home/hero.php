<?php
if (!defined('ABSPATH')) exit;
?>

<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<!-- 1. HERO HEADER & WORLD MAP -->
<section class="relative pt-12 md:pt-16 bg-slate-50 overflow-hidden font-sans pb-12">
    <div class="container mx-auto px-6 text-center w-full relative z-10 my-12 md:my-16">
        <div class="absolute inset-0 top-80 z-0 opacity-40 pointer-events-none flex justify-center items-center w-full">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/world-map-dots.png" alt="World Map Pattern" class="w-full object-contain" />
        </div>

        <div class="relative max-w-5xl z-10 items-center mx-auto text-center" data-aos="fade-up" data-aos-duration="800">
            <h1 class="text-4xl md:text-6xl font-black text-slate-900 tracking-tight leading-tight mb-6">
                Digital HQ <span class="text-red-600">PT Atlas Adjusting</span> Indonesia
            </h1>

            <p class="text-sm md:text-base font-medium text-slate-600 max-w-3xl mx-auto leading-relaxed">
                Meningkatkan efisiensi inspeksi klaim asuransi melalui penanganan transparan via Case Management Portal, pemetaan lokasi presisi, dan integrasi kecerdasan buatan.
            </p>
        </div>
    </div>

    <!-- 2. MAIN HERO SLIDER CONTAINER -->
    <div class="container mx-auto px-4 sm:px-6 max-w-7xl">
        <div class="z-10 relative rounded-[32px] overflow-hidden shadow-2xl bg-slate-950 border border-slate-800 min-h-[420px] md:min-h-[480px] flex flex-col justify-between p-8 md:p-12" data-aos="fade-up" data-aos-delay="200">
            
            <div class="relative z-20 flex items-center justify-between w-full mb-6">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-red-950/60 border border-red-800/50 text-red-400 text-sm font-bold">
                    <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span> Range of Services
                </span>
                
                <div class="text-xs font-black st text-slate-300">
                    <span id="current-slide" class="text-red-500 text-sm">01</span> / <span class="text-slate-400">06</span>
                </div>
            </div>

            <div class="swiper heroSwiper absolute inset-0 z-0 w-full h-full">
                <div class="swiper-wrapper">

                    <div class="swiper-slide relative bg-cover bg-center h-full w-full flex items-end p-8 md:p-12" style="background-image: linear-gradient(to top, rgba(2, 6, 23, 0.95) 10%, rgba(2, 6, 23, 0.4) 60%, rgba(2, 6, 23, 0.7) 100%), url('<?php echo get_template_directory_uri(); ?>/assets/images/services/property-header.jpg');">
                        <div class="w-full lg:w-7/12 pr-0 lg:pr-8 mb-16 md:mb-12">
                            <h2 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight tracking-tight">
                                Property Desk
                            </h2>

                            <p class="text-slate-300 text-xs md:text-sm font-medium leading-relaxed mb-6 max-w-xl">
                                Penanganan klaim properti dan liability untuk kerugian akibat kerusakan aset, kebakaran, bencana, maupun tuntutan pihak ketiga, dengan analisis kerugian yang akurat dan komprehensif.
                            </p>

                            <a href="#contact" class="inline-flex items-center gap-2 px-6 py-3.5 mb-6 rounded-xl bg-red-600 hover:bg-red-500 text-white text-sm font-bold transition-all shadow-lg shadow-red-600/30">
                                <span>Konsultasi Penanganan Klaim</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide relative bg-cover bg-center h-full w-full flex items-end p-8 md:p-12" style="background-image: linear-gradient(to top, rgba(2, 6, 23, 0.95) 10%, rgba(2, 6, 23, 0.4) 60%, rgba(2, 6, 23, 0.7) 100%), url('<?php echo get_template_directory_uri(); ?>/assets/images/services/machine-header.webp');">
                        <div class="w-full lg:w-7/12 pr-0 lg:pr-8 mb-16 md:mb-12">
                            <h2 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight tracking-tight">
                                Machinery Breakdown Desk
                            </h2>

                            <p class="text-slate-300 text-xs md:text-sm font-medium leading-relaxed mb-6 max-w-xl">
                                Penanganan klaim kerusakan mesin dengan investigasi teknis, evaluasi penyebab dan kerugian, serta koordinasi adjustment untuk membantu meminimalkan dampak terhadap operasional.
                            </p>

                            <a href="#contact" class="inline-flex items-center gap-2 px-6 py-3.5 mb-6 rounded-xl bg-red-600 hover:bg-red-500 text-white text-sm font-bold transition-all shadow-lg shadow-red-600/30">
                                <span>Konsultasi Penanganan Klaim</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide relative bg-cover bg-center h-full w-full flex items-end p-8 md:p-12" style="background-image: linear-gradient(to top, rgba(2, 6, 23, 0.95) 10%, rgba(2, 6, 23, 0.4) 60%, rgba(2, 6, 23, 0.7) 100%), url('<?php echo get_template_directory_uri(); ?>/assets/images/services/construction-header.jpg');">
                        <div class="w-full lg:w-7/12 pr-0 lg:pr-8 mb-16 md:mb-12">
                            <h2 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight tracking-tight">
                                Construction Engineering Desk
                            </h2>

                            <p class="text-slate-300 text-xs md:text-sm font-medium leading-relaxed mb-6 max-w-xl">
                                Penanganan klaim proyek konstruksi dan engineering, termasuk CAR dan EAR, untuk kerusakan pekerjaan, mesin, peralatan, serta risiko liability selama siklus proyek.
                            </p>

                            <a href="#contact" class="inline-flex items-center gap-2 px-6 py-3.5 mb-6 rounded-xl bg-red-600 hover:bg-red-500 text-white text-sm font-bold transition-all shadow-lg shadow-red-600/30">
                                <span>Konsultasi Penanganan Klaim</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide relative bg-cover bg-center h-full w-full flex items-end p-8 md:p-12" style="background-image: linear-gradient(to top, rgba(2, 6, 23, 0.95) 10%, rgba(2, 6, 23, 0.4) 60%, rgba(2, 6, 23, 0.7) 100%), url('<?php echo get_template_directory_uri(); ?>/assets/images/services/heavy-header.webp');">
                        <div class="w-full lg:w-7/12 pr-0 lg:pr-8 mb-16 md:mb-12">
                            <h2 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight tracking-tight">
                                Heavy Equipment Desk
                            </h2>

                            <p class="text-slate-300 text-xs md:text-sm font-medium leading-relaxed mb-6 max-w-xl">
                                Penanganan klaim alat berat seperti excavator, bulldozer, crane, dan loader, mencakup kerusakan akibat kecelakaan, kebakaran, pencurian, operasional, transportasi, dan risiko lainnya.
                            </p>

                            <a href="#contact" class="inline-flex items-center gap-2 px-6 py-3.5 mb-6 rounded-xl bg-red-600 hover:bg-red-500 text-white text-sm font-bold transition-all shadow-lg shadow-red-600/30">
                                <span>Konsultasi Penanganan Klaim</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide relative bg-cover bg-center h-full w-full flex items-end p-8 md:p-12" style="background-image: linear-gradient(to top, rgba(2, 6, 23, 0.95) 10%, rgba(2, 6, 23, 0.4) 60%, rgba(2, 6, 23, 0.7) 100%), url('<?php echo get_template_directory_uri(); ?>/assets/images/services/energy-header.webp');">
                        <div class="w-full lg:w-7/12 pr-0 lg:pr-8 mb-16 md:mb-12">
                            <h2 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight tracking-tight">
                                Energy, Oil & Gas Desk
                            </h2>

                            <p class="text-slate-300 text-xs md:text-sm font-medium leading-relaxed mb-6 max-w-xl">
                                Penanganan klaim energi, oil & gas mencakup physical damage, machinery breakdown, business interruption, fire, explosion, hingga transportasi dan project cargo dari upstream hingga downstream.
                            </p>

                            <a href="#contact" class="inline-flex items-center gap-2 px-6 py-3.5 mb-6 rounded-xl bg-red-600 hover:bg-red-500 text-white text-sm font-bold transition-all shadow-lg shadow-red-600/30">
                                <span>Konsultasi Penanganan Klaim</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide relative bg-cover bg-center h-full w-full flex items-end p-8 md:p-12" style="background-image: linear-gradient(to top, rgba(2, 6, 23, 0.95) 10%, rgba(2, 6, 23, 0.4) 60%, rgba(2, 6, 23, 0.7) 100%), url('<?php echo get_template_directory_uri(); ?>/assets/images/services/marine-header.webp');">
                        <div class="w-full lg:w-7/12 pr-0 lg:pr-8 mb-16 md:mb-12">
                            <h2 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight tracking-tight">
                                Marine & Miscellaneous Desk
                            </h2>

                            <p class="text-slate-300 text-xs md:text-sm font-medium leading-relaxed mb-6 max-w-xl">
                                Penanganan klaim Marine Cargo, Marine Hull, serta specialty lines seperti General Liability, Fidelity Guarantee, Cash in Transit, dan Cash in Safe.
                            </p>

                            <a href="#contact" class="inline-flex items-center gap-2 px-6 py-3.5 mb-6 rounded-xl bg-red-600 hover:bg-red-500 text-white text-sm font-bold transition-all shadow-lg shadow-red-600/30">
                                <span>Konsultasi Penanganan Klaim</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- 3. SLIDER CONTROLS & RIGHT SOLUTION PANEL -->
            <div class="relative z-20 flex flex-col lg:flex-row items-end justify-between gap-6 w-full">
                
                <div class="flex items-center gap-4">
                    <button type="button" class="hero-prev w-11 h-11 rounded-xl bg-slate-900/90 hover:bg-red-600 text-white flex items-center justify-center border border-slate-700/80 hover:border-red-500 transition-all duration-300 shadow-lg" aria-label="Slide Sebelumnya">
                        <i data-lucide="chevron-left" class="w-5 h-5"></i>
                    </button>

                    <button type="button" class="hero-next w-11 h-11 rounded-xl bg-slate-900/90 hover:bg-red-600 text-white flex items-center justify-center border border-slate-700/80 hover:border-red-500 transition-all duration-300 shadow-lg" aria-label="Slide Selanjutnya">
                        <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </button>

                    <div class="w-32 h-1 bg-slate-800 rounded-full overflow-hidden hidden sm:block">
                        <div id="progress-bar" class="h-full bg-red-600 transition-all duration-300" style="width: 16.66%;"></div>
                    </div>
                </div>

                <div class="w-full lg:w-[380px] bg-slate-900/90 backdrop-blur-md border border-slate-700/70 rounded-2xl p-2.5 shadow-2xl">
                    <div class="solution-menu-scroll max-h-[260px] overflow-y-auto no-scrollbar space-y-1.5">
                        
                        <div class="solution-item active cursor-pointer p-3 rounded-xl transition-all duration-300 border border-slate-700 bg-slate-900 text-white flex items-center justify-between" data-slide="0">
                            <div>
                                <span class="text-xs font-regular text-red-500 block  st">SERVICE 01</span>
                                <span class="font-bold text-sm">Property Desk</span>
                            </div>
                            <i data-lucide="chevron-right" class="arrow text-red-500 w-4 h-4 transition-colors"></i>
                        </div>

                        <div class="solution-item cursor-pointer p-3 rounded-xl transition-all duration-300 border border-transparent hover:border-slate-700 hover:bg-slate-900/60 text-slate-300 flex items-center justify-between" data-slide="1">
                            <div>
                                <span class="text-xs font-regular text-slate-500 block  st">SERVICE 02</span>
                                <span class="font-bold text-sm">Machinery Breakdown Desk</span>
                            </div>
                            <i data-lucide="chevron-right" class="arrow text-slate-500 w-4 h-4 transition-colors"></i>
                        </div>

                        <div class="solution-item cursor-pointer p-3 rounded-xl transition-all duration-300 border border-transparent hover:border-slate-700 hover:bg-slate-900/60 text-slate-300 flex items-center justify-between" data-slide="2">
                            <div>
                                <span class="text-xs font-regular text-slate-500 block  st">SERVICE 03</span>
                                <span class="font-bold text-sm">Construction Engineering Desk</span>
                            </div>
                            <i data-lucide="chevron-right" class="arrow text-slate-500 w-4 h-4 transition-colors"></i>
                        </div>

                        <div class="solution-item cursor-pointer p-3 rounded-xl transition-all duration-300 border border-transparent hover:border-slate-700 hover:bg-slate-900/60 text-slate-300 flex items-center justify-between" data-slide="3">
                            <div>
                                <span class="text-xs font-regular text-slate-500 block  st">SERVICE 04</span>
                                <span class="font-bold text-sm">Heavy Equipment Desk</span>
                            </div>
                            <i data-lucide="chevron-right" class="arrow text-slate-500 w-4 h-4 transition-colors"></i>
                        </div>

                        <div class="solution-item cursor-pointer p-3 rounded-xl transition-all duration-300 border border-transparent hover:border-slate-700 hover:bg-slate-900/60 text-slate-300 flex items-center justify-between" data-slide="4">
                            <div>
                                <span class="text-xs font-regular text-slate-500 block  st">SERVICE 05</span>
                                <span class="font-bold text-sm">Energy, Oil & Gas Desk</span>
                            </div>
                            <i data-lucide="chevron-right" class="arrow text-slate-500 w-4 h-4 transition-colors"></i>
                        </div>

                        <div class="solution-item cursor-pointer p-3 rounded-xl transition-all duration-300 border border-transparent hover:border-slate-700 hover:bg-slate-900/60 text-slate-300 flex items-center justify-between" data-slide="5">
                            <div>
                                <span class="text-xs font-regular text-slate-500 block  st">SERVICE 06</span>
                                <span class="font-bold text-sm">Marine & Miscellaneous Desk</span>
                            </div>
                            <i data-lucide="chevron-right" class="arrow text-slate-500 w-4 h-4 transition-colors"></i>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>