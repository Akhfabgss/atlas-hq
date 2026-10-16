<?php
/**
 * Template Name: Our Associates Page
 * Description: Single-file page template dengan penyesuaian khusus Global Reach & Overlapping Asia Pacific Box (Responsive)
 */

get_header(); 
?>

<main id="main-content" class="site-main font-sans bg-slate-50 text-slate-900 overflow-hidden">

    <!-- 1. HERO BANNER -->
    <section class="relative pt-16 md:pt-64 pb-12 md:pb-16 bg-slate-900 text-white mx-4 md:mx-12 mt-6 rounded-3xl overflow-hidden shadow-2xl">
        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/images/adjusteck-building.jpg" 
            alt="Adjusteck Partner Network Building" 
            class="absolute inset-0 w-full h-full object-cover object-center opacity-40"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-transparent"></div>

        <div class="container mx-auto px-6 md:px-8 max-w-7xl relative z-10 pt-8 md:pt-24" data-aos="fade-up" data-aos-duration="800">
            <h1 class="text-3xl sm:text-4xl md:text-6xl font-black tracking-tight leading-tight mb-4">
                Our <span class="text-red-600">Associates</span>
            </h1>
            <p class="text-slate-300 text-xs sm:text-sm md:text-base font-medium leading-relaxed max-w-2xl">
                Meet our certified loss adjusters, marine surveyors, and engineering specialists operating in compliance with OJK standards across Indonesia and the Asia-Pacific network.
            </p>
        </div>
    </section>

    <!-- 2. GLOBAL REACH, HUMAN FOCUS -->
    <section class="py-12 md:py-16">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center">
                
                <div class="lg:col-span-5 relative flex items-center justify-center p-2 sm:p-4" data-aos="fade-right" data-aos-duration="800">
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-12 h-52 border-2 border-slate-300 rounded-l-2xl pointer-events-none hidden sm:block z-0"></div>
                    <div class="relative w-full max-w-lg mt-4 sm:mt-8">
                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3 z-30 flex items-center gap-1.5 sm:gap-2">
                            <span class="text-3xl sm:text-4xl md:text-6xl font-black text-red-600 tracking-[-0.04em] leading-none">
                                10+
                            </span>
                            <span class="text-[9px] sm:text-[10px] md:text-[14px] font-bold text-red-600 leading-tight ">
                                Years working<br>
                                Experience
                            </span>
                        </div>

                        <div class="relative z-10 group rounded-2xl sm:rounded-[2rem] overflow-hidden bg-white border border-slate-200/80 shadow-md">
                            <img 
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/associates/our-associate.png" 
                                alt="Atlas Adjusting Indonesia Branding"
                                class="block w-full object-cover transition-transform duration-700 group-hover:scale-105"
                            />
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7 space-y-4 sm:space-y-6" data-aos="fade-up" data-aos-duration="800">
                    <span class="text-sm font-bold text-red-600 block -mb-4">
                        Worldwide Adjusting Desk
                    </span>
                    <h2 class="text-2xl sm:text-3xl md:text-5xl font-black text-slate-900 tracking-tight leading-snug">
                        Global Reach, Human Focus
                    </h2>

                    <p class="text-slate-600 text-xs sm:text-sm md:text-base font-medium leading-relaxed">
                        Adjusteck is an international Loss Adjusting and Claims Management firm built on human experience and driven by technology. Adjusteck blend a bespoke approach to technical, complex loss adjusting for clients in the insurance and reinsurance markets with enterprise-level risk mitigation expertise.
                    </p>

                    <div class="pt-2">
                        <a href="#contact" class="inline-flex items-center gap-2 px-6 sm:px-8 py-3.5 rounded-xl bg-red-600 hover:bg-red-500 text-white font-bold text-xs   transition-all duration-300 shadow-lg shadow-red-600/30">
                            <span>See More Details</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. ASIA PACIFIC INTEGRATION SECTION -->
    <section class="relative bg-slate-900 text-white pt-12 md:pt-20 pb-36 sm:pb-40 md:pb-48">
        <div class="absolute inset-0 opacity-15 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:20px_20px] pointer-events-none"></div>

        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="text-center max-w-3xl mx-auto my-6 sm:my-12 space-y-3 sm:space-y-4" data-aos="fade-up" data-aos-duration="800">
                <h2 class="text-2xl sm:text-3xl md:text-5xl font-black tracking-tight">
                    <span class="text-red-600">Asia Pacific</span> Integration
                </h2>
                <p class="text-slate-300 text-xs md:text-sm font-medium leading-relaxed opacity-90">
                    By establishing a partnership with international loss adjusting companies, we are able to tap into their expertise and resources in handling large and complex claims. We maintain close contact and reciprocal working agreements with adjusting firms in Malaysia, Singapore, and Australia whereby they can undertake assignments on our behalf throughout Asia Pacific and Australia.
                </p>
            </div>

            <div class="absolute left-4 right-4 sm:left-6 sm:right-6 -bottom-52 translate-y-1/2 max-w-7xl mx-auto bg-white text-slate-900 rounded-2xl sm:rounded-3xl p-5 sm:p-6 md:p-8 shadow-2xl border border-slate-200/80 z-20">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 sm:gap-4 md:gap-6">
                    <div class="bg-slate-50 rounded-2xl p-5 sm:p-8 text-center border border-slate-200/80 shadow-sm hover:border-red-500/40 hover:shadow-xl transition-all duration-300">
                        <h3 class="text-lg sm:text-xl md:text-2xl font-black tracking-tight  mb-1 text-slate-900">
                            SINGAPORE
                        </h3>
                        <p class="text-[10px] sm:text-sm font-bold text-slate-500  ">
                            Direct Survey Sub
                        </p>
                    </div>

                    <div class="bg-slate-50 rounded-2xl p-5 sm:p-8 text-center border border-slate-200/80 shadow-sm hover:border-red-500/40 hover:shadow-xl transition-all duration-300">
                        <h3 class="text-lg sm:text-xl md:text-2xl font-black tracking-tight  mb-1 text-slate-900">
                            MALAYSIA
                        </h3>
                        <p class="text-[10px] sm:text-sm font-bold text-slate-500  ">
                            Petrochemical Desk
                        </p>
                    </div>

                    <div class="bg-slate-50 rounded-2xl p-5 sm:p-8 text-center border border-slate-200/80 shadow-sm hover:border-red-500/40 hover:shadow-xl transition-all duration-300">
                        <h3 class="text-lg sm:text-xl md:text-2xl font-black tracking-tight  mb-1 text-slate-900">
                            AUSTRALIA
                        </h3>
                        <p class="text-[10px] sm:text-sm font-bold text-slate-500  ">
                            Mining & Heavy Plant
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="h-52 sm:h-48 md:h-24 bg-slate-50"></div>

    <!-- 4. GOVERNANCE & ACCREDITATION SECTION -->
    <section class="py-12 sm:py-16 md:py-16 bg-slate-50">
        <div class="container mx-auto px-6 max-w-7xl">
            
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-16 space-y-2 sm:space-y-3" data-aos="fade-up" data-aos-duration="800">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-slate-900 tracking-tight">
                    Operating Under Verified International Governance
                </h2>
                <p class="text-slate-600 text-xs md:text-sm font-medium leading-relaxed">
                    Operating under stringent international governance protocols, anti-bribery standards (ISO 37001), and full regulatory oversight of Otoritas Jasa Keuangan (OJK).
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">

                <!-- 1. ADJUSTECK PARTNER NETWORK -->
                <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-sm hover:shadow-xl hover:border-red-500/40 transition-all duration-300 flex items-center gap-4 group">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-slate-50 p-2 flex items-center justify-center shrink-0 border border-slate-200/80">
                        <img 
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/associates/Partner-Network-Logo2.png'); ?>" 
                            alt="Adjusteck Partner Network" 
                            class="w-full h-full object-contain"
                            onerror="this.onerror=null; this.src='https://via.placeholder.com/100?text=Adjusteck';"
                        />
                    </div>
                    <div class="space-y-2">
                        <h3 class="font-black text-slate-900 text-sm sm:text-base tracking-tight">ADJUSTECK</h3>
                        <p class="text-[9px] sm:text-[10px] font-bold text-emerald-600 tracking-wide">Partner Network</p>
                        <p class="text-[10px] sm:text-xs font-medium text-slate-500 mt-0.5">Official Global Loss Adjusting Alliance</p>
                    </div>
                </div>

                <!-- 2. ISO 37001 ANTI-BRIBERY -->
                <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-sm hover:shadow-xl hover:border-red-500/40 transition-all duration-300 flex items-center gap-4 group">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-slate-50 p-2 flex items-center justify-center shrink-0 border border-slate-200/80">
                        <img 
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/associates/anti-bribery2.png'); ?>" 
                            alt="ISO 37001 Anti-Bribery Certified" 
                            class="w-full h-full object-contain"
                            onerror="this.onerror=null; this.src='https://via.placeholder.com/100?text=ISO+37001';"
                        />
                    </div>
                    <div class="space-y-2">
                        <h3 class="font-black text-slate-900 text-sm sm:text-base tracking-tight">ISO 37001:2016</h3>
                        <p class="text-[9px] sm:text-[10px] font-bold text-slate-600 tracking-wide">Anti-bribery Management</p>
                        <p class="text-[10px] sm:text-xs font-medium text-slate-500 mt-0.5">Certified Anti-Bribery System Standard</p>
                    </div>
                </div>

                <!-- 3. OTORITAS JASA KEUANGAN (OJK) -->
                <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-sm hover:shadow-xl hover:border-red-500/40 transition-all duration-300 flex items-center gap-4 group">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-slate-50 p-2 flex items-center justify-center shrink-0 border border-slate-200/80">
                        <img 
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/associates/Logo-OJK2.png'); ?>" 
                            alt="Licensed & Regulated by OJK" 
                            class="w-full h-full object-contain"
                            onerror="this.onerror=null; this.src='https://via.placeholder.com/100?text=OJK';"
                        />
                    </div>
                    <div class="space-y-2">
                        <h3 class="font-black text-slate-900 text-sm sm:text-base tracking-tight">REGULATED BY OJK</h3>
                        <p class="text-[9px] sm:text-[10px] font-bold text-red-700 tracking-wide">Otoritas Jasa Keuangan</p>
                        <p class="text-[10px] sm:text-xs font-medium text-slate-500 mt-0.5">Registered Loss Adjusting License</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

</main>

<?php 
get_footer(); 
?>