<?php
/**
 * Template Name: Operations & Coverage Map
 * Description: Template kustom peta interaktif berbasis QGIS / Leaflet.js untuk cakupan operasional (Indonesia, Malaysia, Australia) & Head Office Jakarta.
 */

get_header();

$network_stats = [
    ['value' => '1', 'label' => 'Headquarters (Jakarta HO)'],
    ['value' => '< 4 Jam', 'label' => 'Rapid On-Site Deployment SLA'],
    ['value' => '3 Negara', 'label' => 'Indonesia, Malaysia, & Australia'],
    ['value' => '100%', 'label' => 'Cross-Border Adjusting Coverage'],
];

$coverage_regions = [
    [
        'country'   => 'Indonesia',
        'code'      => 'ID',
        'flag_code' => 'id',
        'desc'      => 'Main operational coverage includes the entire Indonesian archipelago, from Sabang to Merauke.'
    ],
    [
        'country'   => 'Malaysia',
        'code'      => 'MY',
        'flag_code' => 'my',
        'desc'      => 'Risk survey and commercial claim services for the manufacturing and energy sectors.'
    ],
    [
        'country'   => 'Australia',
        'code'      => 'AU',
        'flag_code' => 'au',
        'desc'      => 'Claim handling and regional reinsurance.'
    ],
];
?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<!-- 1. OPERATIONS & COVERAGE MAP HERO -->
<main id="main-content" class="site-main font-sans bg-slate-50 text-slate-900 pb-20 overflow-hidden">

    <section class="pt-12 md:pt-16 pb-12 bg-slate-50 border-b border-slate-200/80">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <div class="lg:col-span-7 space-y-4" data-aos="fade-up" data-aos-duration="800">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight">
                        Vast Operation & <span class="text-red-600">Coverage Map</span>
                    </h1>
                    <p class="text-slate-600 text-xs sm:text-sm md:text-base font-medium leading-relaxed max-w-2xl">
                        Based in Jakarta, PT Atlas Adjusting Indonesia provides highly reputable independent claims handling services, extending its reach across the Indonesian archipelago, Malaysia, and Australia.                    </p>
                </div>

                <div class="lg:col-span-5 grid grid-cols-2 gap-4" data-aos="fade-left" data-aos-duration="800">
                    <?php foreach ($network_stats as $stat) : ?>
                        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm hover:border-red-500/40 hover:shadow-md transition-all duration-300">
                            <span class="block text-2xl md:text-3xl font-black text-red-600 tracking-tight mb-1">
                                <?php echo esc_html($stat['value']); ?>
                            </span>
                            <span class="block text-[10px] font-bold text-slate-500   leading-snug">
                                <?php echo esc_html($stat['label']); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </section>

    <!-- 2. INTERACTIVE QGIS & LEAFLET MAP SECTION -->
    <section class="py-12 md:py-16">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="bg-white rounded-3xl p-6 md:p-10 border border-slate-200/80 shadow-xl space-y-6" data-aos="fade-up" data-aos-duration="800">
                
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-slate-100">
                    <div>
                        <h2 class="text-2xl font-black text-slate-900 tracking-tight">Interactive Regional Map</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Map showing the location of the Jakarta Head Office and the operational coverage zones in Indonesia, Malaysia, and Australia.</p>
                    </div>
                    
                    <div class="flex items-center gap-4 text-xs font-bold text-slate-700 bg-slate-50 px-4 py-2 rounded-xl border border-slate-200/60">
                        <span class="flex items-center gap-2">
                            <span class="w-3.5 h-3.5 rounded-full bg-red-600 shadow-sm border border-white"></span> 
                            Head Office (Jakarta)
                        </span>
                        <span class="flex items-center gap-2">
                            <span class="w-3.5 h-3.5 rounded-md border border-red-600"></span> 
                            Coverage Zone
                        </span>
                    </div>
                </div>

                <div class="relative w-full rounded-2xl overflow-hidden border border-slate-200 shadow-inner">
                    <div id="qgis-interactive-map" class="w-full h-[450px] md:h-[550px] z-10"></div>

                    <div class="absolute bottom-6 left-6 right-6 md:right-auto bg-slate-900/95 backdrop-blur-md text-white p-5 rounded-2xl border border-slate-800 shadow-2xl max-w-md space-y-1.5 z-[500]">
                        <span class="inline-flex items-center gap-1.5 text-red-400 font-bold  text-[10px] ">
                            <i data-lucide="zap" class="w-3.5 h-3.5"></i>
                            Cross-Border Rapid Deployment
                        </span>
                        <p class="text-xs text-slate-300 font-medium leading-relaxed">
                            Tim penilai teknis dan survei drone/LiDAR siap diberangkatkan langsung dari Jakarta HO ke lokasi risiko di seluruh kawasan target.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. HEAD OFFICE CARD & REGIONAL COVERAGE -->
    <section class="pb-16 font-sans">
        <div class="container mx-auto px-6 max-w-7xl space-y-12">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                
                <div class="lg:col-span-7 bg-white p-8 md:p-10 rounded-3xl border border-slate-200/80 shadow-sm flex flex-col justify-between space-y-6" data-aos="fade-up" data-aos-duration="800">
                    <div class="space-y-4">
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 rounded-md bg-red-600 text-white text-[10px] font-black uppercase tracking-wider">
                                HEAD OFFICE
                            </span>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">
                                OPERATIONS CONTROL CENTER
                            </span>
                        </div>

                        <h2 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight">
                            PT Atlas Adjusting Indonesia
                        </h2>

                        <p class="text-xs md:text-sm font-medium text-slate-500 leading-relaxed max-w-2xl">
                            Operating independent loss adjusting and case management services across multiple sectors from our head office in the strategic area of South Jakarta.
                        </p>
                    </div>
                    
                    <div class="space-y-3 pt-2 text-xs md:text-sm font-semibold text-slate-700">
                        <div class="flex items-start gap-3">
                            <i data-lucide="map-pin" class="w-4 h-4 text-red-600 shrink-0 mt-0.5"></i>
                            <span class="text-slate-600">Jl. Mangga No. 1, Gandaria Selatan, Cilandak, Jakarta 12420, Indonesia</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i data-lucide="phone" class="w-4 h-4 text-red-600 shrink-0"></i>
                            <a href="tel:+622127654017" class="text-slate-700 hover:text-red-600 transition-colors">+62 21 276 54017</a>
                        </div>
                        <div class="flex items-center gap-3">
                            <i data-lucide="mail" class="w-4 h-4 text-red-600 shrink-0"></i>
                            <a href="mailto:info@atlasadjusting.net" class="text-slate-700 hover:text-red-600 transition-colors">info@atlasadjusting.net</a>
                        </div>
                    </div>
                </div>

                <!-- KARTU KANAN: DEPLOYMENT READINESS -->
                <div class="lg:col-span-5 bg-white p-8 md:p-10 rounded-3xl border border-slate-200/80 shadow-sm flex flex-col justify-between space-y-6" data-aos="fade-left" data-aos-duration="800">
                    <div class="space-y-4">
                        <span class="inline-block text-[10px] font-black uppercase tracking-widest text-red-600">
                            DEPLOYMENT READINESS
                        </span>

                        <h3 class="font-black text-slate-900 text-xl md:text-2xl tracking-tight leading-snug">
                            Catastrophe Emergency Response
                        </h3>

                        <p class="text-xs md:text-sm font-medium text-slate-500 leading-relaxed">
                            In the event of natural disasters, major fires, or infrastructure failures, our response team is ready to deploy immediately within 4 hours of receiving the assignment notification.
                        </p>
                    </div>

                    <div class="pt-2">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-slate-950 hover:bg-red-600 text-white font-extrabold text-xs uppercase tracking-wide transition-all duration-300 shadow-md group">
                            <span>HUBUNGI HEAD OFFICE</span>
                            <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- 2. CAKUPAN WILAYAH OPERASIONAL (Ganti Code dengan Bendera Negara) -->
            <div class="space-y-6 pt-6">
                <div class="space-y-1">
                    <span class="text-[10px] font-black uppercase tracking-widest text-red-600">GLOBAL NETWORK</span>
                    <h3 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight">Operational Coverage Regions</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($coverage_regions as $reg) : 
                        $flag = !empty($reg['flag_code']) ? strtolower($reg['flag_code']) : strtolower($reg['code']);
                    ?>
                        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:border-red-500/40 hover:shadow-xl transition-all duration-300 space-y-4 flex flex-col justify-between">
                            <div class="space-y-3">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-xs">
                                    <div class="w-7 h-5 rounded overflow-hidden shadow-sm shrink-0">
                                        <img 
                                            src="https://flagcdn.com/w40/<?php echo esc_attr($flag); ?>.png" 
                                            alt="Bendera <?php echo esc_attr($reg['country']); ?>" 
                                            class="w-full h-full object-cover"
                                        />
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <h4 class="text-lg font-black text-slate-900 tracking-tight"><?php echo esc_html($reg['country']); ?></h4>
                                </div>
                                
                                <p class="text-xs font-medium text-slate-500 leading-relaxed"><?php echo esc_html($reg['desc']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </section>

    <!-- 4. EMERGENCY CATASTROPHE RESPONSE CTA -->
    <section class="container mx-auto px-6 max-w-7xl">
        <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-red-950 text-white rounded-3xl p-8 md:p-12 shadow-2xl relative overflow-hidden border border-slate-800" data-aos="fade-up" data-aos-duration="800">
            <div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-full bg-red-600/20 blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-2xl space-y-4">
                <span class="text-sm font-bold  st text-red-400 block">
                    Immediate Claim Mobilization
                </span>
                <h2 class="text-2xl md:text-4xl font-black tracking-tight leading-tight">
                    Need Immediate Field Survey & Risk Assessment?
                </h2>
                <p class="text-xs md:text-sm font-medium text-slate-300 leading-relaxed">
                    Our technical assessors from Jakarta HO are ready to deploy directly to incident locations in Indonesia, Malaysia, and Australia.
                </p>
                <div class="pt-2">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-red-600 hover:bg-red-500 text-white font-bold text-xs   transition-all duration-300 shadow-lg shadow-red-600/30">
                        <span>Submit Survey Assignment</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- 5. LEAFLET MAP SCRIPTS & CONFIG -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    if (typeof L !== 'undefined') {
        const map = L.map('qgis-interactive-map', {
            center: [-8.0, 118.0],
            zoom: 4,
            zoomControl: true,
            scrollWheelZoom: false
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        const hoIcon = L.divIcon({
            className: 'custom-ho-pin',
            html: `
                <div class="relative flex items-center justify-center w-8 h-8">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-5 w-5 bg-red-600 border-2 border-white shadow-lg"></span>
                </div>
            `,
            iconSize: [32, 32],
            iconAnchor: [16, 16]
        });

        const jakartaCoords = [-6.2088, 106.8456];
        const hoMarker = L.marker(jakartaCoords, { icon: hoIcon }).addTo(map);
        
        hoMarker.bindPopup(`
            <div class="font-sans p-1 text-slate-900">
                <span class="text-[9px] font-black  text-red-600  block">Headquarters</span>
                <strong class="text-sm font-bold block mt-0.5">PT Atlas Adjusting Indonesia</strong>
                <p class="text-xs text-slate-600 mt-1">Jakarta, Indonesia</p>
            </div>
        `);

        const coverageHubs = [
            { name: "Jakarta (Headquarters)", coords: [-6.2088, 106.8456], isHO: true },
            { name: "Surabaya", coords: [-7.2575, 112.7521], isHO: false },
            { name: "Medan", coords: [3.5952, 98.6722], isHO: false },
            { name: "Balikpapan (IKN Zone)", coords: [-1.2379, 116.8529], isHO: false },
            { name: "Makassar", coords: [-5.1477, 119.4327], isHO: false },
            { name: "Banda Aceh", coords: [5.5483, 95.3238], isHO: false },
            { name: "Pekanbaru", coords: [0.5071, 101.4478], isHO: false },
            { name: "Palembang", coords: [-2.9761, 104.7754], isHO: false },
            { name: "Batam", coords: [1.1301, 104.0529], isHO: false },
            { name: "Semarang", coords: [-6.9667, 110.4167], isHO: false },
            { name: "Denpasar (Bali)", coords: [-8.6705, 115.2126], isHO: false },
            { name: "Mataram (Lombok)", coords: [-8.5833, 116.1167], isHO: false },
            { name: "Pontianak", coords: [-0.0263, 109.3425], isHO: false },
            { name: "Banjarmasin", coords: [-3.3167, 114.5900], isHO: false },
            { name: "Manado", coords: [1.4748, 124.8428], isHO: false },
            { name: "Palu", coords: [-0.9000, 119.8333], isHO: false },
            { name: "Kupang (NTT)", coords: [-10.1772, 123.6070], isHO: false },
            { name: "Ambon", coords: [-3.6554, 128.1906], isHO: false },
            { name: "Jayapura (Papua)", coords: [-2.5489, 140.7181], isHO: false },
            { name: "Sorong", coords: [-0.8762, 131.2558], isHO: false },
            { name: "Kuala Lumpur", coords: [3.1390, 101.6869], isHO: false },
            { name: "Johor Bahru", coords: [1.4927, 103.7414], isHO: false },
            { name: "Kota Bharu", coords: [6.1254, 102.2381], isHO: false },
            { name: "Melaka", coords: [2.1896, 102.2501], isHO: false },
            { name: "Kuching (Sarawak)", coords: [1.5533, 110.3592], isHO: false },
            { name: "Kota Kinabalu (Sabah)", coords: [5.9804, 116.0735], isHO: false },
            { name: "Miri", coords: [4.3995, 113.9914], isHO: false },
            { name: "Darwin (Northern Territory)", coords: [-12.4634, 130.8456], isHO: false },
            { name: "Cairns (Queensland)", coords: [-16.9186, 145.7781], isHO: false },
            { name: "Port Hedland (WA Mining)", coords: [-20.3107, 118.5753], isHO: false },
            { name: "Broome (Western Australia)", coords: [-17.9614, 122.2359], isHO: false },
            { name: "Townsville", coords: [-19.2590, 146.8169], isHO: false },
            { name: "Karratha (NW Shelf Energy)", coords: [-20.7377, 116.8463], isHO: false },
            { name: "Perth (Energy & Mining)", coords: [-31.9505, 115.8605], isHO: false },
            { name: "Brisbane", coords: [-27.4705, 153.0260], isHO: false },
            { name: "Sydney", coords: [-33.8688, 151.2093], isHO: false },
            { name: "Melbourne", coords: [-37.8136, 144.9631], isHO: false },
            { name: "Adelaide", coords: [-34.9285, 138.6007], isHO: false }
        ];

        coverageHubs.forEach(hub => {
            if (hub.isHO) {
                const hoIcon = L.divIcon({
                    className: 'custom-ho-pin',
                    html: `
                        <div class="relative flex items-center justify-center w-8 h-8">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-5 w-5 bg-red-600 border-2 border-white shadow-lg"></span>
                        </div>`,
                    iconSize: [32, 32],
                    iconAnchor: [16, 16]
                });
                L.marker(hub.coords, { icon: hoIcon }).addTo(map).bindPopup(`<b>${hub.name}</b><br>Headquarters`);
            } else {
                const hubIcon = L.divIcon({
                    className: 'custom-hub-pin',
                    html: `<span class="block w-2.5 h-2.5 rounded-full border-2 border-red-600 shadow-md"></span>`,
                    iconSize: [14, 14],
                    iconAnchor: [7, 7]
                });
                L.marker(hub.coords, { icon: hubIcon }).addTo(map).bindTooltip(`<b>Regional Hub:</b> ${hub.name}`, { sticky: true });
            }
        });
    }
});
</script>

<style>
.leaflet-popup-content-wrapper {
    border-radius: 1rem !important;
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1) !important;
    border: 1px solid #e2e8f0 !important;
}
</style>

<?php 
get_footer(); 
?>