<?php
if (!defined('ABSPATH')) exit;
?>

<footer class="bg-slate-900 text-slate-200 font-sans pt-16 pb-8 border-t border-slate-800">
    <div class="container mx-auto px-6 max-w-7xl">

        <!-- 1. TOP NAVIGATION GRID -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-16">
            <div>
                <h4 class="text-sm font-bold  st text-red-500 mb-5">
                    Layanan
                </h4>
                <ul class="space-y-3.5 text-xs md:text-sm font-medium text-slate-300">
                    <li>
                        <a href="#services" class="hover:text-red-500 transition-colors duration-200">
                            Case Management Portal
                        </a>
                    </li>
                    <li>
                        <a href="#services" class="hover:text-red-500 transition-colors duration-200">
                            Afhrodite AI Engine
                        </a>
                    </li>
                    <li>
                        <a href="#services" class="hover:text-red-500 transition-colors duration-200">
                            3D & Drone Survey
                        </a>
                    </li>
                    <li>
                        <a href="#services" class="hover:text-red-500 transition-colors duration-200">
                            Catastrophe Response
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-bold  st text-red-500 mb-5">
                    Produk Kami
                </h4>
                <ul class="space-y-3.5 text-xs md:text-sm font-medium text-slate-300">
                    <li>
                        <a href="#products" class="hover:text-red-500 transition-colors duration-200">
                            CMP Platform
                        </a>
                    </li>
                    <li>
                        <a href="#products" class="hover:text-red-500 transition-colors duration-200">
                            Atlas Digital HQ
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-bold  st text-red-500 mb-5">
                    Terbaru
                </h4>
                <ul class="space-y-3.5 text-xs md:text-sm font-medium text-slate-300">
                    <li>
                        <a href="#insights" class="hover:text-red-500 transition-colors duration-200">
                            Acara dan Pelatihan
                        </a>
                    </li>
                    <li>
                        <a href="#insights" class="hover:text-red-500 transition-colors duration-200">
                            Seminar & Webinar
                        </a>
                    </li>
                    <li>
                        <a href="#insights" class="hover:text-red-500 transition-colors duration-200">
                            Laporan Kerugian
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-bold  st text-red-500 mb-5">
                    Tentang
                </h4>
                <ul class="space-y-3.5 text-xs md:text-sm font-medium text-slate-300">
                    <li>
                        <a href="#about" class="hover:text-red-500 transition-colors duration-200">
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="#careers" class="hover:text-red-500 transition-colors duration-200">
                            Karir & Internship
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="border-slate-800 mb-12">

        <!-- 2. MIDDLE INFO & NEWSLETTER SECTION -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start mb-16">
            <div class="lg:col-span-5 pr-0 lg:pr-6">
                <span class="text-sm font-bold  st text-red-500 block mb-2">
                    Newsletter
                </span>
                <h3 class="text-lg md:text-xl font-black tracking-tight text-white mb-3">
                    Berlangganan Newsletter Kami
                </h3>
                <p class="text-xs md:text-sm font-medium text-slate-300 leading-relaxed mb-6">
                    Artikel, studi kasus, webinar, event, dan banyak lagi — jangan lewatkan kesempatan untuk menambah wawasan Anda.
                </p>

                <form 
                    action="#" 
                    method="POST" 
                    class="flex items-center gap-2 bg-slate-950/70 border border-slate-800 rounded-2xl p-1.5 focus-within:border-red-500/60 transition-all duration-300 max-w-md"
                >
                    <input 
                        type="email" 
                        placeholder="Email Anda" 
                        class="w-full px-3.5 py-2 text-xs md:text-sm text-white placeholder-slate-500 focus:outline-none bg-transparent"
                        required
                    >
                    <button 
                        type="submit" 
                        class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-xl bg-red-600 hover:bg-red-500 text-white font-bold text-xs   transition-all duration-300 shrink-0 shadow-lg shadow-red-600/30"
                    >
                        <span>Langganan</span>
                        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </button>
                </form>
            </div>

            <div class="lg:col-span-3 lg:border-l lg:border-slate-800 lg:pl-8 space-y-6 pt-2 lg:pt-0">
                <div>
                    <h4 class="text-sm font-bold  st text-red-500 mb-3">
                        Kontak Langsung
                    </h4>
                    <div class="space-y-2.5 text-xs md:text-sm font-medium text-slate-300">
                        <a href="tel:+62211234567" class="flex items-center gap-2.5 hover:text-red-500 transition-colors duration-200">
                            <i data-lucide="phone" class="w-4 h-4 text-red-500 shrink-0"></i>
                            <span>+62 21-1234-5678</span>
                        </a>
                        <a href="mailto:info@atlasadjusting.net" class="flex items-center gap-2.5 hover:text-red-500 transition-colors duration-200">
                            <i data-lucide="mail" class="w-4 h-4 text-red-500 shrink-0"></i>
                            <span>info@atlasadjusting.net</span>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-sm font-bold  st text-red-500 mb-2">
                        Alamat Kantor
                    </h4>
                    <div class="flex items-start gap-2.5 text-xs font-medium text-slate-300 leading-relaxed mb-4">
                        <i data-lucide="map-pin" class="w-4 h-4 text-red-500 shrink-0 mt-0.5"></i>
                        <span>Jl. Mangga No.1, Gandaria Sel., Kec. Cilandak, Kota Jakarta Selatan, 12420</span>
                    </div>

                    <div class="flex items-center gap-2">
                            <a href="https://linkedin.com/shareArticle?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="text-white w-8 h-8 rounded-xl bg-white border border-slate-700/60 flex items-center justify-center hover:bg-red-600 hover:border-red-600 hover:text-white transition-all duration-300" title="LinkedIn">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/linkedin.svg" class="w-4 h-4 text-slate-100 group-hover:text-white">
                            </a>

                            <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="w-8 h-8 rounded-xl bg-white border border-slate-700/60 flex items-center justify-center hover:bg-red-600 hover:border-red-600 hover:text-white transition-all duration-300" title="WhatsApp">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/whatsapp.svg" class="w-4 h-4 text-slate-100 group-hover:text-white">
                            </a>

                            <a href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="w-8 h-8 rounded-xl bg-white border border-slate-700/60 flex items-center justify-center hover:bg-red-600 hover:border-red-600 hover:text-white transition-all duration-300" title="Facebook">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/facebook.svg" class="w-4 h-4 text-slate-100 group-hover:text-white">
                            </a>

                            <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" class="w-8 h-8 rounded-xl bg-white border border-slate-700/60 flex items-center justify-center hover:bg-red-600 hover:border-red-600 hover:text-white transition-all duration-300" title="Kirim Email">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/email.svg" class="w-4 h-4 text-slate-100 group-hover:text-white">
                            </a>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 lg:border-l lg:border-slate-800 lg:pl-8 pt-2 lg:pt-0">
                <h4 class="text-sm font-bold  st text-red-500 mb-4">
                    Our Associates
                </h4>

                <div class="grid grid-cols-3 gap-3">
                    <div class="h-14 bg-white rounded-2xl border border-slate-700/60 p-2.5 flex items-center justify-center hover:border-red-500/60 hover:shadow-xl transition-all duration-300 group">
                        <img 
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/associates/Partner-Network-Logo.png" 
                            alt="Partner Network APKAI" 
                            class="max-h-full max-w-full object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300 opacity-80 group-hover:opacity-100"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                        />
                        <span class="text-[10px] font-bold text-slate-800 hidden">APKAI</span>
                    </div>

                    <div class="h-14 bg-white rounded-2xl border border-slate-700/60 p-2.5 flex items-center justify-center hover:border-red-500/60 hover:shadow-xl transition-all duration-300 group">
                        <img 
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/associates/anti-bribery.png" 
                            alt="Anti-Bribery AAUI" 
                            class="max-h-full max-w-full object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300 opacity-80 group-hover:opacity-100"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                        />
                        <span class="text-[10px] font-bold text-slate-800 hidden">AAUI</span>
                    </div>

                    <div class="h-14 bg-white rounded-2xl border border-slate-700/60 p-2.5 flex items-center justify-center hover:border-red-500/60 hover:shadow-xl transition-all duration-300 group">
                        <img 
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/associates/Logo-OJK.png" 
                            alt="Otoritas Jasa Keuangan (OJK)" 
                            class="max-h-full max-w-full object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300 opacity-80 group-hover:opacity-100"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                        />
                        <span class="text-[10px] font-bold text-slate-800 hidden">OJK</span>
                    </div>
                </div>
            </div>
        </div>

        <hr class="border-slate-800 mb-8">

        <!-- 3. BOTTOM COPYRIGHT BAR -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-xs font-medium text-slate-400">
            <p>
                &copy; <?php echo date('Y'); ?> PT Atlas Adjusting Indonesia. All rights reserved.
            </p>
            <p>
                Situs oleh 
                <span class="font-semibold text-slate-200">
                    PT Atlas Adjusting Indonesia
                </span>
            </p>
        </div>

    </div>
</footer>