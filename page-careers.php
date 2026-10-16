<?php
/**
 * Template Name: Careers Page
 * Description: Page template kustom untuk halaman Karir & Lowongan Pekerjaan PT Atlas Adjusting Indonesia.
 */

get_header(); 

$open_positions = [
    [
        'title'       => 'Senior Marine Loss Adjuster',
        'type'        => 'Full Time',
        'description' => 'Mengelola investigasi klaim maritim skala besar, lambung kapal (H&M), serta kargo komersial internasional.',
        'location'    => 'Jakarta HO',
        'salary'      => 'Kualifikasi Senior',
        'link'        => home_url('/contact/')
    ],
    [
        'title'       => 'CAR / EAR Engineering Adjuster',
        'type'        => 'Full Time',
        'description' => 'Penilaian kerusakan teknis konstruksi rekayasa sipil, alat berat, dan klaim properti industri (PAR/IAR).',
        'location'    => 'Jakarta HO',
        'salary'      => 'Kualifikasi Senior',
        'link'        => home_url('/contact/')
    ],
    [
        'title'       => '3D LiDAR & Drone Survey Specialist',
        'type'        => 'Full Time / Field',
        'description' => 'Bertanggung jawab atas pemetaaan volumetrik 3D, inspeksi fotogrametri udara, dan pemodelan deformasi titik risiko.',
        'location'    => 'Jakarta / Nationwide Field',
        'salary'      => 'Kualifikasi Spesialis',
        'link'        => home_url('/contact/')
    ],
    [
        'title'       => 'Korean Desk Claim Coordinator',
        'type'        => 'Full Time',
        'description' => 'Memfasilitasi komunikasi teknis, analisis klausul polis, dan penyusunan report klaim untuk perusahaan reasuransi Korea.',
        'location'    => 'Jakarta HO',
        'salary'      => 'Kualifikasi Senior',
        'link'        => home_url('/contact/')
    ],
    [
        'title'       => 'Energy & Power Plant Risk Engineer',
        'type'        => 'Full Time',
        'description' => 'Investigasi insiden teknis reaktor, kilang minyak/gas, fasilitas energi terbarukan, dan klaim Business Interruption (BI).',
        'location'    => 'Jakarta HO',
        'salary'      => 'Kualifikasi Specialist',
        'link'        => home_url('/contact/')
    ],
    [
        'title'       => 'Legal & Claims Settlement Officer',
        'type'        => 'Full Time',
        'description' => 'Meninjau aspek hukum polis reasuransi, klausul arbitrase BANI, dan penyiapan berkas rekomendasi klaim awal.',
        'location'    => 'Jakarta HO',
        'salary'      => 'Kualifikasi Professional',
        'link'        => home_url('/contact/')
    ],
];

$client_logos = [
    ['name' => 'ACA Insurance', 'file' => 'Aca-Logo.png'],
    ['name' => 'Askrindo', 'file' => 'Askrindo-Logo.png'],
    ['name' => 'Asuransi Astra', 'file' => 'Asuransi-Astra-Logo.png'],
    ['name' => 'Asuransi Sinar Mas', 'file' => 'AsuransiSinarmas-Logo.png'],
    ['name' => 'Avrist', 'file' => 'Avrist-logo.png'],
    ['name' => 'BRI Insurance', 'file' => 'BRI-Logo.png'],
    ['name' => 'Buditama', 'file' => 'Buditama-Logo.png'],
    ['name' => 'FPG Insurance', 'file' => 'Fpg-Logo.png'],
    ['name' => 'Fresnel', 'file' => 'Fresnel-logo.png'],
    ['name' => 'IBS Group', 'file' => 'IBS-logo.jpg'],
    ['name' => 'Indosurance Broker', 'file' => 'Indosurance-logo.png'],
    ['name' => 'Jasa Raharja Putera', 'file' => 'JasaRaharja-logo.png'],
    ['name' => 'Jasindo', 'file' => 'Jasindo-Logo.png'],
    ['name' => 'JPS', 'file' => 'JPS-Log.png'],
    ['name' => 'KB Insurance', 'file' => 'Kb-Logo.jpg'],
    ['name' => 'KBRU Insurance Brokers', 'file' => 'Kbru-Logo.png'],
    ['name' => 'LGI Insurance', 'file' => 'LGI-Logo.jpg'],
    ['name' => 'Metriz Korindo', 'file' => 'MetrizKorindo-Logo.png'],
    ['name' => 'Mitra Harmoni', 'file' => 'MitraHarmoni-Logo.png'],
    ['name' => 'MNC Insurance', 'file' => 'MNCI-Asurance.jpg'],
    ['name' => 'PAIB Indonesia', 'file' => 'Paib-logo.png'],
    ['name' => 'Shinta Ingeris', 'file' => 'Shinta-Logo.png'],
    ['name' => 'Sompo Insurance', 'file' => 'sompo-logo.jpg'],
    ['name' => 'Starset', 'file' => 'startset-logo.jpg'],
    ['name' => 'SUS', 'file' => 'Sus-logo.png'],
    ['name' => 'Tokio Marine', 'file' => 'TokioMarine.png'],
    ['name' => 'Tripa Insurance', 'file' => 'Tripa-Logo.png'],
];
?>

<main id="main-content" class="site-main font-sans bg-slate-50 text-slate-900 pb-20 overflow-hidden">

    <!-- 1. HERO HEADER BANNER -->
    <section class="bg-slate-950 text-white py-16 md:py-32 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-red-950/20 via-transparent to-slate-950/90 pointer-events-none"></div>

        <div class="container mx-auto px-6 max-w-7xl relative z-10 space-y-4" data-aos="fade-up" data-aos-duration="800">
            <h1 class="text-4xl md:text-6xl font-black tracking-tight">
                Careers & <span class="text-red-600">Opportunities</span>
            </h1>
        </div>
    </section>

    <!-- 2. MEET THE TEAM INTRO SECTION -->
    <section class="py-16 md:py-20 bg-slate-50">
        <div class="container mx-auto px-6 max-w-7xl space-y-10">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-end" data-aos="fade-up" data-aos-duration="800">
                <div class="lg:col-span-7">
                    <span class="text-sm font-bold text-red-600  st block mb-2">OUR CULTURE & TALENTS</span>
                    <h2 class="text-3xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                        Meet the team work behind our success
                    </h2>
                </div>
                <div class="lg:col-span-5">
                    <p class="text-xs md:text-sm font-medium text-slate-600 leading-relaxed">
                        Our team consists of highly dedicated independent professionals—from certified adjusters and technical engineers to maritime and energy claim specialists experienced in handling the most complex industrial risks.
                    </p>
                </div>
            </div>

            <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200/80 bg-slate-100 max-h-[480px]" data-aos="zoom-in" data-aos-duration="600">
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/team-working.jpg" 
                    alt="PT Atlas Adjusting Indonesia Multidisciplinary Team" 
                    class="w-full h-full object-cover object-center"
                    onerror="this.src='https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1200';"
                />
            </div>

        </div>
    </section>

    <!-- 3. CURRENTLY OPEN POSITIONS SECTION -->
    <section class="py-16 md:py-16 bg-slate-50">
        <div class="container mx-auto px-6 max-w-7xl space-y-12">
            
            <div class="text-center max-w-2xl mx-auto space-y-2" data-aos="fade-up">
                <span class="text-sm font-bold text-red-600  st block">JOIN OUR TEAM</span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">
                    Currently open positions
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php foreach ($open_positions as $job) : ?>
                    <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-200/80 shadow-sm hover:shadow-xl hover:border-red-500/40 transition-all duration-300 flex flex-col justify-between space-y-6 group" data-aos="fade-up" data-aos-delay="<?php echo (array_search($job, $open_positions) * 100); ?>">
                        
                        <div class="space-y-4">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-lg md:text-xl font-bold text-slate-900 group-hover:text-red-600 transition-colors">
                                        <?php echo esc_html($job['title']); ?>
                                    </h3>
                                    <span class="inline-block mt-1 text-sm font-bold text-slate-400">
                                        <?php echo esc_html($job['type']); ?>
                                    </span>
                                </div>

                                <a href="<?php echo esc_url($job['link']); ?>" class="w-10 h-10 rounded-full bg-slate-100 group-hover:bg-red-600 text-slate-800 group-hover:text-white flex items-center justify-center shrink-0 transition-all shadow-sm">
                                    <i data-lucide="arrow-up-right" class="w-5 h-5"></i>
                                </a>
                            </div>

                            <p class="text-xs md:text-sm font-medium text-slate-600 leading-relaxed">
                                <?php echo esc_html($job['description']); ?>
                            </p>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3 text-xs font-semibold text-slate-500">
                            <span class="flex items-center gap-1.5">
                                <i data-lucide="map-pin" class="w-4 h-4 text-red-600"></i>
                                <?php echo esc_html($job['location']); ?>
                            </span>
                            <span class="flex items-center gap-1.5">
                                <i data-lucide="briefcase" class="w-4 h-4 text-slate-400"></i>
                                <?php echo esc_html($job['salary']); ?>
                            </span>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <!-- 4. TRUSTED PARTNERS MARQUEE -->
    <section class="py-12 bg-slate-50 overflow-hidden">
        <div class="container mx-auto px-6 max-w-7xl mb-8 text-center">
            <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight" data-aos="fade-up">
                Trusted by leading insurance companies & global reinsurers
            </h2>
        </div>

        <div class="relative w-full overflow-hidden flex py-4 [mask-image:_linear-gradient(to_right,_transparent_0,_black_128px,_black_calc(100%-128px),_transparent_100%)]">
            <div class="flex items-center space-x-6 animate-marquee whitespace-nowrap">
                <?php 
                for ($i = 0; $i < 2; $i++) : 
                    foreach ($client_logos as $client) : 
                        $logo_url = get_template_directory_uri() . '/assets/images/clients/' . $client['file'];
                ?>
                    <div class="client-card flex-shrink-0 w-48 md:w-56 h-28 md:h-32 bg-white rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-center p-6 relative transition-all duration-300 hover:border-red-500/60 hover:shadow-xl hover:-translate-y-1">
                        <img 
                            src="<?php echo esc_url($logo_url); ?>" 
                            alt="<?php echo esc_attr($client['name']); ?>" 
                            class="max-h-16 max-w-full object-contain filter grayscale hover:grayscale-0 transition-all opacity-80 hover:opacity-100"
                        />
                    </div>
                <?php 
                    endforeach; 
                endfor; 
                ?>
            </div>
        </div>
    </section>

</main>

<style>
@keyframes marquee {
    0% { transform: translateX(0%); }
    100% { transform: translateX(-50%); }
}
.animate-marquee {
    display: flex;
    width: max-content;
    animation: marquee 35s linear infinite;
}
.animate-marquee:hover {
    animation-play-state: paused;
}
</style>

<?php 
get_footer(); 
?>