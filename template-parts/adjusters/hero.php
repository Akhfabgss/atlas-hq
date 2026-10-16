<?php
/**
 * Template Part: Adjuster Index Hero & Category Filter Pills
 */
?>

<!-- 1. ADJUSTER INDEX HERO SECTION -->
<section class="pt-16 md:pt-24 pb-10 bg-slate-50 text-center border-b border-slate-200/80">
    <div class="container mx-auto px-6 max-w-5xl">
        <h1 class="text-4xl md:text-6xl font-black text-slate-900 tracking-tight mb-6">
            <span class="text-red-600">Adjuster</span> Index
        </h1>
        <p class="text-sm md:text-base text-slate-600 leading-relaxed max-w-3xl mx-auto mb-10 font-medium">
            Meet our certified loss adjusters, marine surveyors, and engineering specialists operating in compliance with OJK standards across Indonesia and the Asia-Pacific network.
        </p>

        <!-- Category Filter Pills -->
        <div class="flex flex-wrap items-center justify-center gap-3 text-xs font-bold" id="adjuster-filter-pills">
            <button data-filter="all" class="filter-btn active px-5 py-2.5 rounded-full bg-slate-900 text-white font-bold  text-xs transition-all shadow-sm">
                All Adjusters
            </button>       
            <button data-filter="executive" class="filter-btn px-5 py-2.5 rounded-full bg-white text-slate-600 hover:bg-red-50 hover:text-red-600 border border-slate-200/80 font-bold  text-xs transition-all">
                Executive & Advisory
            </button>
            <button data-filter="he-mb" class="filter-btn px-5 py-2.5 rounded-full bg-white text-slate-600 hover:bg-red-50 hover:text-red-600 border border-slate-200/80 font-bold  text-xs transition-all">
                Mechanical & HE Specialist
            </button>
            <button data-filter="construction" class="filter-btn px-5 py-2.5 rounded-full bg-white text-slate-600 hover:bg-red-50 hover:text-red-600 border border-slate-200/80 font-bold   text-xs transition-all">
                Civil & Construction (CAR/PAR)
            </button>
            <button data-filter="marine" class="filter-btn px-5 py-2.5 rounded-full bg-white text-slate-600 hover:bg-red-50 hover:text-red-600 border border-slate-200/80 font-bold   text-xs transition-all">
                Marine Cargo & Transit
            </button>
        </div>
    </div>
</section>