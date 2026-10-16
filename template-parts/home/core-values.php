<?php
if (!defined('ABSPATH')) exit;
?>

<!-- 1. CORE VALUES SECTION -->
<section class="py-16 md:py-16 bg-slate-50 font-sans">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="800">
      <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">
        Core <span class="text-red-600">Values</span>
      </h2>
    </div>

    <div class="flex flex-col md:flex-row gap-5 h-[440px]" id="core-values-accordion">
      
      <div class="value-card active relative rounded-3xl p-8 cursor-pointer transition-all duration-500 ease-in-out overflow-hidden flex-[3] bg-slate-900 text-white border border-slate-800 shadow-xl">
        <div class="card-active flex flex-col h-full justify-between">
          <span class="text-3xl font-black text-red-500">01</span>
          <h3 class="text-2xl md:text-3xl font-black tracking-tight mb-auto mt-6">Professional</h3>
          <p class="text-xs md:text-sm font-medium text-slate-300 leading-relaxed max-w-md">
            Upholding the highest standards of technical excellence, objectivity, and regulatory compliance across all loss adjusting disciplines. Our certified adjusters leverage deep technical knowledge to deliver objective, highly precise evaluations.
          </p>
        </div>
        <div class="card-collapsed hidden flex-col items-center pt-2">
          <span class="text-3xl font-black text-red-500 mb-8">01</span>
          <span class="rotate-0 [writing-mode:vertical-rl] text-xl font-bold ">Professional</span>
        </div>
      </div>

      <div class="value-card relative rounded-3xl p-8 cursor-pointer transition-all duration-500 ease-in-out overflow-hidden flex-1 bg-white text-slate-900 border border-slate-200/80 hover:border-red-500/40 hover:shadow-xl">
        <div class="card-active hidden flex-col h-full justify-between">
          <span class="text-3xl font-black text-red-500">02</span>
          <h3 class="text-2xl md:text-3xl font-black tracking-tight mb-auto mt-6">Trust</h3>
          <p class="text-xs md:text-sm font-medium text-slate-300 leading-relaxed max-w-md">
            Fostering enduring client partnerships founded on complete transparency, active stakeholder collaboration, and reliable SLAs. We ensure real-time visibility throughout the loss adjustment lifecycle.
          </p>
        </div>
        <div class="card-collapsed flex flex-col items-center pt-2">
          <span class="text-3xl font-black text-red-600 mb-8">02</span>
          <span class="rotate-0 [writing-mode:vertical-rl] text-xl font-bold ">Trust</span>
        </div>
      </div>

      <div class="value-card relative rounded-3xl p-8 cursor-pointer transition-all duration-500 ease-in-out overflow-hidden flex-1 bg-white text-slate-900 border border-slate-200/80 hover:border-red-500/40 hover:shadow-xl">
        <div class="card-active hidden flex-col h-full justify-between">
          <span class="text-3xl font-black text-red-500">03</span>
          <h3 class="text-2xl md:text-3xl font-black tracking-tight mb-auto mt-6">Integrity</h3>
          <p class="text-xs md:text-sm font-medium text-slate-300 leading-relaxed max-w-md">
            Maintaining unyielding ethical standards and strict impartiality in every claim assessment. We operate as a trusted independent entity, providing unbiased evaluations adhering strictly to policy conditions.
          </p>
        </div>
        <div class="card-collapsed flex flex-col items-center pt-2">
          <span class="text-3xl font-black text-red-600 mb-8">03</span>
          <span class="rotate-0 [writing-mode:vertical-rl] text-xl font-bold ">Integrity</span>
        </div>
      </div>

      <div class="value-card relative rounded-3xl p-8 cursor-pointer transition-all duration-500 ease-in-out overflow-hidden flex-1 bg-white text-slate-900 border border-slate-200/80 hover:border-red-500/40 hover:shadow-xl">
        <div class="card-active hidden flex-col h-full justify-between">
          <span class="text-3xl font-black text-red-500">04</span>
          <h3 class="text-2xl md:text-3xl font-black tracking-tight mb-auto mt-6">Technology</h3>
          <p class="text-xs md:text-sm font-medium text-slate-300 leading-relaxed max-w-md">
            Integrating advanced digital solutions including 3D LiDAR drone surveying, AI-assisted claims processing via Afhrodite, and Case Management Portals to accelerate SLA times and enhance assessment accuracy.
          </p>
        </div>
        <div class="card-collapsed flex flex-col items-center pt-2">
          <span class="text-3xl font-black text-red-600 mb-8">04</span>
          <span class="rotate-0 [writing-mode:vertical-rl] text-xl font-bold ">Technology</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 2. CORE VALUES ACCORDION SCRIPT -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('#core-values-accordion .value-card');

    cards.forEach(card => {
      card.addEventListener('mouseenter', function() {
        cards.forEach(c => {
          c.classList.remove('flex-[3]', 'bg-slate-900', 'border-slate-800', 'text-white', 'shadow-xl');
          c.classList.add('flex-1', 'bg-white', 'border-slate-200/80', 'text-slate-900');
          
          c.querySelector('.card-active').classList.add('hidden');
          c.querySelector('.card-active').classList.remove('flex');
          c.querySelector('.card-collapsed').classList.remove('hidden');
          c.querySelector('.card-collapsed').classList.add('flex');
        });

        this.classList.remove('flex-1', 'bg-white', 'border-slate-200/80', 'text-slate-900');
        this.classList.add('flex-[3]', 'bg-slate-900', 'border-slate-800', 'text-white', 'shadow-xl');

        this.querySelector('.card-active').classList.remove('hidden');
        this.querySelector('.card-active').classList.add('flex');
        this.querySelector('.card-collapsed').classList.add('hidden');
        this.querySelector('.card-collapsed').classList.remove('flex');
      });
    });
  });
</script>