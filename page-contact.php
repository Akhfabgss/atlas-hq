<?php
/**
 * Template Name: Contact Page
 * Description: Page template kustom untuk halaman Contact Us dengan integrasi Contact Form 7
 */

get_header(); 
?>

<main id="main-content" class="site-main font-sans bg-slate-50 text-slate-900 pb-20 overflow-hidden">

    <!-- 1. HERO BANNER WITH BACKGROUND IMAGE -->
    <section class="relative py-20 md:py-48 bg-slate-900 text-white overflow-hidden shadow-2xl">
        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/images/contact-hero-bg.jpg" 
            alt="Atlas Adjusting Headquarters Building" 
            class="absolute inset-0 w-full h-full object-cover object-center opacity-40"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>

        <div class="container mx-auto px-6 md:px-12 max-w-7xl relative z-10 text-center" data-aos="fade-up" data-aos-duration="800">
            <h1 class="text-4xl md:text-6xl font-black tracking-tight leading-tight mb-4">
                Get In Touch <span class="text-red-600">With Us</span>
            </h1>
            <p class="text-slate-300 text-xs sm:text-sm md:text-base font-medium leading-relaxed max-w-2xl mx-auto">
                Meet our certified loss adjusters, marine surveyors, and engineering specialists operating in compliance with OJK standards across Indonesia and the Asia-Pacific network.
            </p>
        </div>
    </section>

    <!-- 2. CONTACT INFORMATION & INQUIRY FORM SECTION -->
    <section class="py-12 md:py-20">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-start">
                
                <div class="lg:col-span-6 space-y-8" data-aos="fade-up" data-aos-duration="800">
                    <div>
                        <span class="text-sm font-bold  st text-red-600 block mb-2">
                            Direct Communication
                        </span>
                        <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight  mb-4">
                            Contact Information
                        </h2>
                        <p class="text-slate-600 text-xs sm:text-sm md:text-base font-medium leading-relaxed">
                            We pride ourselves on responsive, high-integrity, and professional communication. Reach out to our Jakarta headquarters through any of the channels below.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-red-600 text-white flex items-center justify-center shrink-0 shadow-lg shadow-red-600/30">
                                <i data-lucide="phone" class="w-6 h-6 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg md:text-xl font-bold text-slate-900 leading-tight">
                                    Head Office Telephone
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-600 font-medium mt-0.5">
                                    +62 21 276 54017
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-red-600 text-white flex items-center justify-center shrink-0 shadow-lg shadow-red-600/30">
                                <i data-lucide="mail" class="w-6 h-6 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg md:text-xl font-bold text-slate-900 leading-tight">
                                    Electronic Mail
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-600 font-medium mt-0.5">
                                    info@atlasadjusting.net
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-red-600 text-white flex items-center justify-center shrink-0 shadow-lg shadow-red-600/30">
                                <i data-lucide="map-pin" class="w-6 h-6 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg md:text-xl font-bold text-slate-900 leading-tight">
                                    Office Location
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-600 font-medium mt-0.5">
                                    Jl. Mangga No. 1, Gandaria Selatan, Cilandak, Jakarta. 12420. Indonesia
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-sm space-y-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="flex items-center gap-2">
                            <span class="text-[10px] font-bold text-slate-800  ">
                                HEAD OFFICE MAP LOCATION
                            </span>
                        </div>

                        <div class="w-full h-64 rounded-2xl overflow-hidden border border-slate-200/60 shadow-inner">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.8037613624393!2d106.7925181!3d-6.2894636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1ec52c5aa2d%3A0x897f2cd6f7b11c97!2sJl.%20Mangga%20No.1%20Gandaria%20Sel.%20Cilandak%20Jakarta%20Selatan!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                                class="w-full h-full border-0" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                        <p class="text-sm text-slate-400 font-medium">
                            Gandaria Selatan, Cilandak, South Jakarta
                        </p>
                    </div>

                </div>

                <div class="lg:col-span-6 bg-red-600 text-white p-6 sm:p-8 md:p-10 rounded-3xl shadow-2xl relative" data-aos="fade-left" data-aos-duration="800">
                    <span class="inline-block px-3 py-1 rounded-full bg-white/20 text-[10px] font-bold st  mb-4 text-white">
                        ONLINE INQUIRY
                    </span>

                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight mb-2">
                        Send a Message
                    </h2>

                    <p class="text-xs sm:text-sm font-medium text-white/90 leading-relaxed mb-6">
                        Fill out the form below and our team of adjusting specialists will get back to you promptly within one business day.
                    </p>

                    <div class="cf7-custom-form-wrapper">
                        <?php 
                        if (shortcode_exists('contact-form-7')) {
                            echo do_shortcode('[contact-form-7 id="3425290" title="Contact form 1"]');
                        } else {
                            ?>
                            <form action="#" method="post" class="space-y-4">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-bold   mb-1 text-white/90">YOUR NAME *</label>
                                        <input type="text" placeholder="e.g. John Doe" class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 text-xs focus:outline-none font-medium placeholder-slate-400 border border-transparent focus:border-slate-300" required />
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-bold   mb-1 text-white/90">PHONE / WHATSAPP</label>
                                        <input type="text" placeholder="+62 812..." class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 text-xs focus:outline-none font-medium placeholder-slate-400 border border-transparent focus:border-slate-300" />
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-bold   mb-1 text-white/90">YOUR EMAIL *</label>
                                    <input type="email" placeholder="name@company.com" class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 text-xs focus:outline-none font-medium placeholder-slate-400 border border-transparent focus:border-slate-300" required />
                                </div>

                                <div>
                                    <label class="block text-[10px] font-bold   mb-1 text-white/90">SUBJECT / SERVICE DESK *</label>
                                    <input type="text" placeholder="Claims Case" class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 text-xs focus:outline-none font-medium placeholder-slate-400 border border-transparent focus:border-slate-300" required />
                                </div>

                                <div>
                                    <label class="block text-[10px] font-bold   mb-1 text-white/90">YOUR MESSAGE / CLAIM OVERVIEW *</label>
                                    <textarea rows="4" placeholder="Please provide details regarding your inquiry, location of risk, or claim assistance required..." class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 text-xs focus:outline-none font-medium placeholder-slate-400 border border-transparent focus:border-slate-300" required></textarea>
                                </div>

                                <p class="text-[10px] text-white/80 leading-tight">
                                    By submitting this form, you acknowledge that information provided will be processed in accordance with our professional client confidentiality protocols.
                                </p>

                                <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-white text-red-600 hover:bg-slate-100 font-bold text-xs   rounded-xl transition-all shadow-lg">
                                    SUBMIT MESSAGE
                                </button>
                            </form>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="mt-8 pt-4 border-t border-white/20 flex flex-col sm:flex-row items-center justify-between text-sm text-white/80 gap-2">
                        <span class="flex items-center gap-1.5">
                            <i data-lucide="shield-check" class="w-3.5 h-3.5 text-white"></i>
                            SSL Encrypted Transmission
                        </span>
                    </div>

                </div>

            </div>
        </div>
    </section>

</main>

<?php 
get_footer(); 
?>