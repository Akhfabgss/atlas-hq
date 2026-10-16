<?php
if (!defined('ABSPATH')) exit;
?>

<!-- 1. OUR MILESTONE HORIZONTAL SCROLL -->
<section id="milestone-pin-section" class="relative h-[300vh] bg-slate-50 font-sans">
  <div class="sticky top-0 h-screen overflow-hidden flex items-center">
    
    <div class="container mx-auto px-6 max-w-7xl">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        
        <div class="lg:col-span-4 space-y-4" data-aos="fade-up" data-aos-duration="800">
          <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">
            Our <span class="text-red-600">Milestone</span>
          </h2>
          <p class="text-slate-600 text-xs md:text-sm font-medium leading-relaxed">
            From its early beginnings, ATLAS ADJUSTING has continued to evolve alongside the Indonesian insurance industry. Each stage of our journey reflects our commitment to strengthening our capabilities, expanding our professional network, and delivering dependable adjusting services to our clients.
          </p>
        </div>

        <div class="lg:col-span-8 overflow-hidden">
          <div id="milestone-track" class="flex gap-8 items-center w-max pl-4 pr-32">

            <div class="w-80 flex-shrink-0 bg-white border border-slate-200/80 rounded-3xl p-6 shadow-sm hover:shadow-xl hover:border-red-500/40 transition-all duration-300 space-y-4">
              <div class="w-12 h-12 rounded-2xl bg-red-600 text-white font-bold text-xl flex items-center justify-center shadow-lg shadow-red-600/30">
                1
              </div>
              <div>
                <h3 class="text-2xl font-black text-slate-900 tracking-tight">2016</h3>
                <p class="text-sm font-bold text-red-600  st mb-2">Established</p>
                <p class="text-xs font-medium text-slate-600 leading-relaxed">
                  Resmi didirikan sebagai entitas penilai kerugian independen untuk melayani pasar asuransi nasional dengan standar kualitas tinggi.
                </p>
              </div>
            </div>

            <div class="w-80 flex-shrink-0 bg-white border border-slate-200/80 rounded-3xl p-6 shadow-sm hover:shadow-xl hover:border-red-500/40 transition-all duration-300 space-y-4">
              <div class="w-12 h-12 rounded-2xl bg-red-600 text-white font-bold text-xl flex items-center justify-center shadow-lg shadow-red-600/30">
                2
              </div>
              <div>
                <h3 class="text-2xl font-black text-slate-900 tracking-tight">6.800+</h3>
                <p class="text-sm font-bold text-red-600  st mb-2">Claims Handled</p>
                <p class="text-xs font-medium text-slate-600 leading-relaxed">
                  Menangani ribuan klaim dari berbagai sektor industri seperti Properti, Rekayasa Teknik, hingga Kargo Laut secara presisi.
                </p>
              </div>
            </div>

            <div class="w-80 flex-shrink-0 bg-white border border-slate-200/80 rounded-3xl p-6 shadow-sm hover:shadow-xl hover:border-red-500/40 transition-all duration-300 space-y-4">
              <div class="w-12 h-12 rounded-2xl bg-red-600 text-white font-bold text-xl flex items-center justify-center shadow-lg shadow-red-600/30">
                3
              </div>
              <div>
                <h3 class="text-2xl font-black text-slate-900 tracking-tight">$7.2B+ USD</h3>
                <p class="text-sm font-bold text-red-600  st mb-2">Assessed Value</p>
                <p class="text-xs font-medium text-slate-600 leading-relaxed">
                  Total akumulasi nilai estimasi kerugian aset industri besar yang telah diverifikasi oleh tim penilai forensik kami.
                </p>
              </div>
            </div>

            <div class="w-80 flex-shrink-0 bg-white border border-slate-200/80 rounded-3xl p-6 shadow-sm hover:shadow-xl hover:border-red-500/40 transition-all duration-300 space-y-4">
              <div class="w-12 h-12 rounded-2xl bg-red-600 text-white font-bold text-xl flex items-center justify-center shadow-lg shadow-red-600/30">
                4
              </div>
              <div>
                <h3 class="text-2xl font-black text-slate-900 tracking-tight">26</h3>
                <p class="text-sm font-bold text-red-600  st mb-2">Adjuster Personnel</p>
                <p class="text-xs font-medium text-slate-600 leading-relaxed">
                  Didukung oleh tim penilai ahli tersertifikasi APKAI dengan keahlian teknis khusus di berbagai cabang industri.
                </p>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
</section>

<!-- 2. GSAP SCROLLTRIGGER ENGINE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    gsap.registerPlugin(ScrollTrigger);

    const track = document.getElementById("milestone-track");
    const section = document.getElementById("milestone-pin-section");

    function getScrollAmount() {
      return -(track.scrollWidth - track.parentElement.clientWidth);
    }

    gsap.to(track, {
      x: getScrollAmount,
      ease: "none",
      scrollTrigger: {
        trigger: section,
        start: "top top",
        end: "bottom bottom",
        scrub: 1, 
        invalidateOnRefresh: true
      }
    });
  });
</script>