<?php
if (!defined('ABSPATH')) exit;

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

$half_count = ceil(count($client_logos) / 2);
$clients_row1 = array_slice($client_logos, 0, $half_count);
$clients_row2 = array_slice($client_logos, $half_count);

$clients_loop1 = array_merge($clients_row1, $clients_row1);
$clients_loop2 = array_merge($clients_row2, $clients_row2);
?>

<style>
  @keyframes marquee-left {
    0% { transform: translateX(0%); }
    100% { transform: translateX(-50%); }
  }

  @keyframes marquee-right {
    0% { transform: translateX(-50%); }
    100% { transform: translateX(0%); }
  }

  .animate-marquee-left {
    display: flex;
    width: max-content;
    animation: marquee-left 35s linear infinite;
  }

  .animate-marquee-right {
    display: flex;
    width: max-content;
    animation: marquee-right 35s linear infinite;
  }

  .marquee-row:hover .animate-marquee-left,
  .marquee-row:hover .animate-marquee-right {
    animation-play-state: paused;
  }
</style>

<!-- 1. OUR CLIENTS INFINITE MARQUEE -->
<section class="py-16 md:py-16 bg-slate-50 font-sans overflow-hidden">
  <div class="container mx-auto px-6 max-w-7xl">
    
    <div class="text-center mb-12">
      <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">
        Our <span class="text-red-600">Clients</span>
      </h2>
    </div>

    <div class="space-y-6">
      
      <div class="marquee-row overflow-hidden relative w-full py-2">
        <div class="animate-marquee-left gap-6">
          <?php foreach ($clients_loop1 as $client) : ?>
            <div class="client-card flex-shrink-0 w-48 md:w-56 h-28 md:h-32 bg-white rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-center p-6 relative transition-all duration-300 hover:border-red-500/60 hover:shadow-xl hover:-translate-y-1">
              <img 
                src="<?php echo get_template_directory_uri(); ?>/assets/images/clients/<?php echo esc_attr($client['file']); ?>" 
                alt="<?php echo esc_attr($client['name']); ?>" 
                class="max-h-full max-w-full object-contain filter grayscale hover:grayscale-0 transition-all duration-300 opacity-80 hover:opacity-100"
              />
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="marquee-row overflow-hidden relative w-full py-2">
        <div class="animate-marquee-right gap-6">
          <?php foreach ($clients_loop2 as $client) : ?>
            <div class="client-card flex-shrink-0 w-48 md:w-56 h-28 md:h-32 bg-white rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-center p-6 relative transition-all duration-300 hover:border-red-500/60 hover:shadow-xl hover:-translate-y-1">
              <img 
                src="<?php echo get_template_directory_uri(); ?>/assets/images/clients/<?php echo esc_attr($client['file']); ?>" 
                alt="<?php echo esc_attr($client['name']); ?>" 
                class="max-h-full max-w-full object-contain filter grayscale hover:grayscale-0 transition-all duration-300 opacity-80 hover:opacity-100"
              />
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>

  </div>
</section>