<?php
if (!defined('ABSPATH')) exit;
?>

<!-- 1. TECHNOLOGY & MVP VIDEO SHOWCASE -->
<section class="py-16 md:py-16 bg-slate-50 font-sans">
  <div class="container mx-auto px-6 max-w-7xl">
    
    <div class="mb-12" data-aos="fade-up" data-aos-duration="800">
      <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">
        Technology <span class="text-red-600">& MVP</span>
      </h2>
    </div>

    <div class="bg-slate-950 rounded-3xl overflow-hidden shadow-2xl border border-slate-800 grid grid-cols-1 lg:grid-cols-12 min-h-[480px]">
      <div class="lg:col-span-5 p-8 md:p-12 flex flex-col justify-between text-white z-10">
        <div>
          <div class="flex items-center gap-2 text-sm text-red-500  st mb-6">
            <span id="video-date">24 SEPTEMBER 2026</span>
            <span class="text-slate-600">•</span>
            <span id="video-duration-text">24 MENIT TONTONAN</span>
          </div>

          <h3 id="video-title" class="text-2xl md:text-3xl font-black tracking-tight text-white mb-6 leading-snug">
            Demokratisasi Superintelijensi: Dunia Perlu Bersiap
          </h3>

          <p id="video-desc" class="text-xs md:text-sm font-medium text-slate-300 leading-relaxed max-w-md">
            Bret Taylor, Co-founder Sierra & Ketua Dewan OpenAI, berpendapat bahwa risiko siber jangka pendek sangat nyata namun dapat diatasi. Kekuatan terbesarnya adalah mendistribusikan pengetahuan terbaik di dunia kepada setiap individu dan lini industri.
          </p>
        </div>

        <div class="pt-8">
          <a id="video-cta" href="#explore" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-red-600 hover:bg-red-500 text-white font-bold text-xs   transition-all duration-300 shadow-lg shadow-red-600/30">
            <span>Explore More</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
        </div>
      </div>

      <div class="lg:col-span-7 relative bg-slate-900 group flex items-center justify-center overflow-hidden min-h-[300px] lg:min-h-full">
        <img 
          id="video-poster"
          src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=1200" 
          alt="Video Showcase Cover" 
          class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-700"
        />

        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-black/30"></div>

        <div class="absolute top-6 right-6 z-20 flex items-center gap-2">
          <button type="button" class="w-8 h-8 rounded-full bg-black/40 backdrop-blur-md border border-white/20 text-white/80 hover:text-white flex items-center justify-center transition-all duration-300" aria-label="Informasi Video">
            <i data-lucide="info" class="w-4 h-4"></i>
          </button>
          <button type="button" class="w-8 h-8 rounded-full bg-black/40 backdrop-blur-md border border-white/20 text-white/80 hover:text-white flex items-center justify-center transition-all duration-300" aria-label="Bagikan Video">
            <i data-lucide="share-2" class="w-4 h-4"></i>
          </button>
        </div>

        <div class="relative z-20 flex items-center gap-6">
          <button type="button" class="text-white/80 hover:text-white flex flex-col items-center text-[10px] font-bold  transition-all duration-300" aria-label="Mundur 15 detik">
            <i data-lucide="rotate-ccw" class="w-5 h-5 mb-1"></i>
            <span>15s</span>
          </button>

          <button type="button" id="play-btn" class="w-16 h-16 rounded-full bg-white text-red-600 shadow-2xl flex items-center justify-center hover:scale-110 transition-transform duration-300" aria-label="Putar Video">
            <i data-lucide="play" class="w-7 h-7 fill-current ml-1"></i>
          </button>

          <button type="button" class="text-white/80 hover:text-white flex flex-col items-center text-[10px] font-bold  transition-all duration-300" aria-label="Maju 15 detik">
            <i data-lucide="rotate-cw" class="w-5 h-5 mb-1"></i>
            <span>15s</span>
          </button>
        </div>

        <div class="absolute bottom-6 inset-x-6 z-20 flex items-center gap-4 text-white/80 text-xs font-mono">
          <span>0:00</span>
          <div class="flex-1 h-1 bg-white/30 rounded-full relative overflow-hidden cursor-pointer">
            <div class="w-1/3 h-full bg-red-600 rounded-full"></div>
          </div>
          <span>24:16</span>
          <button type="button" class="hover:text-white transition-colors" aria-label="Volume">
            <i data-lucide="volume-2" class="w-4 h-4"></i>
          </button>
          <button type="button" class="hover:text-white transition-colors" aria-label="Layar Penuh">
            <i data-lucide="maximize" class="w-4 h-4"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- 2. INTERACTIVE PLAYLIST GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-6" id="video-playlist">
      
      <div 
        class="playlist-item active cursor-pointer rounded-2xl p-6 transition-all duration-300 border border-red-600 bg-red-600 text-white shadow-xl hover:shadow-2xl"
        data-date="24 SEPTEMBER 2026"
        data-duration="24 MENIT TONTONAN"
        data-title="Demokratisasi Superintelijensi: Dunia Perlu Bersiap"
        data-desc="Bret Taylor, Co-founder Sierra & Ketua Dewan OpenAI, berpendapat bahwa risiko siber jangka pendek sangat nyata namun dapat diatasi. Kekuatan terbesarnya adalah mendistribusikan pengetahuan terbaik di dunia kepada setiap individu dan lini industri."
        data-poster="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=1200"
      >
        <div class="flex items-center gap-2 text-[10px] font-bold  st mb-3 text-white/90">
          <span>01</span>
          <span>•</span>
          <span>SEDANG DIPUTAR</span>
        </div>
        <h4 class="font-bold text-sm leading-snug mb-8 line-clamp-2">
          Demokratisasi superintelijensi & kesiapan industri
        </h4>
        <div class="flex items-center justify-between text-xs text-white/80 font-medium">
          <span>Bret Taylor</span>
          <span>24:16</span>
        </div>
      </div>

      <div 
        class="playlist-item cursor-pointer rounded-2xl p-6 transition-all duration-300 border border-slate-800 bg-slate-900 hover:border-red-500/40 hover:shadow-xl text-white"
        data-date="18 SEPTEMBER 2026"
        data-duration="18 MENIT TONTONAN"
        data-title="Transformasi AI Skala Enterprise: Mengapa Peran CEO Sangat Krusial"
        data-desc="Analisis mendalam mengenai pentingnya kepemimpinan eksekutif dalam mendorong adopsi kecerdasan buatan, perombakan workflow operational, dan mitigasi risiko implementasi teknologi."
        data-poster="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1200"
      >
        <div class="flex items-center gap-2 text-[10px] font-bold  st mb-3 text-slate-400">
          <span>02</span>
          <span>•</span>
          <span>KEPEMIMPINAN</span>
        </div>
        <h4 class="font-bold text-sm leading-snug mb-8 line-clamp-2 text-slate-200">
          Transformasi AI skala enterprise: Mengapa peran CEO sangat krusial
        </h4>
        <div class="flex items-center justify-between text-xs text-slate-400 font-medium">
          <span>Studi McKinsey</span>
          <span>18:40</span>
        </div>
      </div>

      <div 
        class="playlist-item cursor-pointer rounded-2xl p-6 transition-all duration-300 border border-slate-800 bg-slate-900 hover:border-red-500/40 hover:shadow-xl text-white"
        data-date="10 SEPTEMBER 2026"
        data-duration="31 MENIT TONTONAN"
        data-title="Infrastruktur Komputasi Masa Depan dan Efisiensi Konsumsi Energi"
        data-desc="Eksplorasi solusi data center generasi berikutnya, efisiensi konsumsi daya komputasi AI, serta strategi keberlanjutan infrastruktur server skala besar."
        data-poster="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=1200"
      >
        <div class="flex items-center gap-2 text-[10px] font-bold  st mb-3 text-slate-400">
          <span>03</span>
          <span>•</span>
          <span>INFRASTRUKTUR</span>
        </div>
        <h4 class="font-bold text-sm leading-snug mb-8 line-clamp-2 text-slate-200">
          Infrastruktur komputasi masa depan dan efisiensi konsumsi energi
        </h4>
        <div class="flex items-center justify-between text-xs text-slate-400 font-medium">
          <span>Analisis Sektor</span>
          <span>31:05</span>
        </div>
      </div>

      <div 
        class="playlist-item cursor-pointer rounded-2xl p-6 transition-all duration-300 border border-slate-800 bg-slate-900 hover:border-red-500/40 hover:shadow-xl text-white"
        data-date="02 SEPTEMBER 2026"
        data-duration="22 MENIT TONTONAN"
        data-title="Keamanan Siber di Era Model Otonom dan Kepatuhan Regulasi Global"
        data-desc="Panduan taktis bagi organisasi dalam mengamankan sistem otonom, perlindungan integritas data, serta penyelarasan regulasi tata kelola teknologi informasi."
        data-poster="https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=1200"
      >
        <div class="flex items-center gap-2 text-[10px] font-bold  st mb-3 text-slate-400">
          <span>04</span>
          <span>•</span>
          <span>GOVERNANSI</span>
        </div>
        <h4 class="font-bold text-sm leading-snug mb-8 line-clamp-2 text-slate-200">
          Keamanan siber di era model otonom dan kepatuhan regulasi global
        </h4>
        <div class="flex items-center justify-between text-xs text-slate-400 font-medium">
          <span>Wawasan Kebijakan</span>
          <span>22:15</span>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- 3. INTERACTIVE VIDEO SWITCHER SCRIPT -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('.playlist-item');
    const dateEl = document.getElementById('video-date');
    const durationEl = document.getElementById('video-duration-text');
    const titleEl = document.getElementById('video-title');
    const descEl = document.getElementById('video-desc');
    const posterEl = document.getElementById('video-poster');

    items.forEach(item => {
      item.addEventListener('click', function() {
        items.forEach(i => {
          i.classList.remove('bg-red-600', 'border-red-600', 'shadow-2xl');
          i.classList.add('bg-slate-900', 'border-slate-800');
          i.querySelector('h4').classList.remove('text-white');
          i.querySelector('h4').classList.add('text-slate-200');
          
          const tag = i.querySelector('div');
          tag.classList.remove('text-white/90');
          tag.classList.add('text-slate-400');
        });

        this.classList.remove('bg-slate-900', 'border-slate-800');
        this.classList.add('bg-red-600', 'border-red-600', 'shadow-2xl');
        this.querySelector('h4').classList.remove('text-slate-200');
        this.querySelector('h4').classList.add('text-white');
        
        const activeTag = this.querySelector('div');
        activeTag.classList.remove('text-slate-400');
        activeTag.classList.add('text-white/90');

        dateEl.textContent = this.getAttribute('data-date');
        durationEl.textContent = this.getAttribute('data-duration');
        titleEl.textContent = this.getAttribute('data-title');
        descEl.textContent = this.getAttribute('data-desc');
        posterEl.src = this.getAttribute('data-poster');
      });
    });
  });
</script>