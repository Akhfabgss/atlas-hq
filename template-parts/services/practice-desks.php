<?php
if (!defined('ABSPATH')) exit;

$desks = [
    [
        'id'          => 'property',
        'service_num' => 'Service 1',
        'title'       => 'Property Desk',
        'desc'        => 'Pemeriksaan menyeluruh terhadap integritas struktural, risiko kebakaran industri, serta kerugian gangguan usaha (Business Interruption) secara forensik.',
        'disciplines' => ['Property All Risk (PAR)', 'Business Interruption (BI)'],
    ],
    [
        'id'          => 'machinery',
        'service_num' => 'Service 2',
        'title'       => 'Machinery Breakdown Desk',
        'desc'        => 'Inspeksi kerusakan mesin industri, kegagalan mekanikal, serta evaluasi klaim kerugian operasional pabrik dan pembangkit listrik.',
        'disciplines' => ['Machinery Breakdown (MB)', 'Industrial All Risks (IAR) Endorsement'],
    ],
    [
        'id'          => 'construction',
        'service_num' => 'Service 3',
        'title'       => 'Construction Engineering Desk',
        'desc'        => 'Penilaian risiko proyek konstruksi sipil, pengerjaan infrastruktur, serta klaim kerusakan alat dan kegagalan pemasangan instalasi.',
        'disciplines' => ['Contractor All Risk (CAR)', 'Civil Engineering Completed Risk (CECR)', 'Industrial All Risk (IAR)', 'Erection All Risk (EAR)'],
    ],
    [
        'id'          => 'heavy-equipment',
        'service_num' => 'Service 4',
        'title'       => 'Heavy Equipment Desk',
        'desc'        => 'Spesialis penilaian kerusakan alat berat pertambangan, alat konstruksi, serta klaim kerugian operasional mesin bergerak.',
        'disciplines' => ['Heavy Equipment (HE)', 'Contractor Plant and Machinery (CPM)'],
    ],
    [
        'id'          => 'energy',
        'service_num' => 'Service 5',
        'title'       => 'Energy, Oil & Gas Desk',
        'desc'        => 'Evaluasi risiko komprehensif untuk sektor energi lepas pantai (offshore), instalasi kilang minyak, serta infrastruktur gas bumi.',
        'disciplines' => ['Marine Cargo (Project)', 'Erection All Risks (EAR)', 'Property All Risks and Machinery Breakdown (PAR & MB)', 'Business Interruption (BI)'],
    ],
    [
        'id'          => 'marine',
        'service_num' => 'Service 6',
        'title'       => 'Marine & Miscellaneous Desk',
        'desc'        => 'Layanan penanganan klaim kargo laut, pengangkutan barang, pertanggungjawaban hukum (liability), hingga jaminan keuangan.',
        'disciplines' => [
            'Marine Hull', 'Marine Cargo (MC)', 'Comprehensive General Liability', 'Fidelity Guarantee (FG)', 'Cash In Transit (CIT)', 'Cash In Safe (CIS)',
            'Marine Liability (Carrier\'s Liability, Freight Forwarder Liability, Stevedoring Liability)'
        ],
    ],
];
?>

<!-- 1. PRACTICE DESKS & CORE COMPETENCIES SECTION -->
<section class="py-16 md:py-16 bg-slate-50 font-sans">
    <div class="container mx-auto px-6 max-w-7xl">
        
        <div class="mb-16">
            <h2 class="text-3xl md:text-5xl font-black text-slate-900 tracking-tight">
                Practice Desks & <span class="text-red-600">Core Competencies</span>
            </h2>
            <p class="text-slate-600 text-xs sm:text-sm md:text-base font-medium mt-3">
                Direct engagement with dedicated desk leaders offering deep domain technical literacy.
            </p>
        </div>

        <div class="space-y-8">
            <?php foreach ($desks as $desk) : ?>
                <div id="<?php echo esc_attr($desk['id']); ?>" class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch scroll-mt-28 bg-white p-8 md:p-10 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-xl hover:border-red-500/40 transition-all duration-300">
                    
                    <div class="lg:col-span-5 flex flex-col justify-between space-y-6">
                        <div>
                            <span class="block text-sm font-bold text-red-600  st mb-2">
                                <?php echo esc_html($desk['service_num']); ?>
                            </span>
                            <h3 class="text-xl md:text-2xl font-black text-slate-900  leading-snug mb-3">
                                <?php echo esc_html($desk['title']); ?>
                            </h3>
                            <p class="text-xs md:text-sm font-medium text-slate-600 leading-relaxed">
                                <?php echo esc_html($desk['desc']); ?>
                            </p>
                        </div>

                        <div>
                            <a href="#contact" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-red-600 hover:bg-red-500 text-white text-xs font-bold   transition-all duration-300 shadow-md shadow-red-600/20">
                                <span>Learn More</span> 
                                <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>

                    <div class="lg:col-span-7 bg-slate-50 p-6 md:p-8 rounded-2xl border border-slate-200/60 flex items-start">
                        <div class="w-full">
                            <span class="block text-xs font-black text-red-600  st mb-4">
                                Associated Service Disciplines
                            </span>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                                <?php foreach ($desk['disciplines'] as $discipline) : ?>
                                    <div class="flex items-center justify-between p-2 rounded-xl hover:bg-white hover:shadow-sm transition-all duration-200">
                                        <span class="text-xs font-bold text-slate-700 hover:text-red-600 transition-colors">
                                            <?php echo esc_html($discipline); ?>
                                        </span>
                                        <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-red-600 shrink-0"></i>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>