<?php
if (!defined('ABSPATH')) exit;
?>

<!-- 1. ABOUT US SECTION -->
<section class="py-16 md:py-16 bg-slate-50 font-sans overflow-hidden">
  <div class="container mx-auto px-6 max-w-7xl">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
      
      <div class="lg:col-span-6 space-y-6" data-aos="fade-up" data-aos-duration="800">
        <h2 class="text-4xl md:text-5xl font-black text-slate-900 leading-tight tracking-tight">
          A Legacy of <br />
          <span class="text-red-600">Technical Excellence</span>
        </h2>

        <div class="space-y-4 text-slate-600 text-xs md:text-sm font-medium leading-relaxed">
          <p>
            Founded in late 2016, ATLAS ADJUSTING (Alliance of Technical Loss Adjusting Services) provides high-quality loss adjusting and claims services to the Indonesian insurance market.
          </p>
          <p>
            Our team brings together over a century of combined experience, valuing a traditional adjusting approach while ensuring prompt, professional service with the highest integrity. We are committed to delivering accurate reports and amicable claim resolutions, managing expectations through proper communication. Adhering to the Code of Conduct from the Association of Indonesian Insurance Adjusters (APKAI), we support the development of the local insurance industry in line with national financial authority visions.
          </p>
        </div>

        <div class="pt-2">
          <a href="<?php echo esc_url(home_url('/leadership/')); ?>" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl bg-red-600 hover:bg-red-500 text-white font-bold text-sm transition-all duration-300 shadow-lg shadow-red-600/30">
            <span>Meet Our Team</span>
            <i data-lucide="users" class="w-4 h-4"></i>
          </a>
        </div>
      </div>

      <div class="lg:col-span-6 relative flex justify-center lg:justify-end items-center">
        <div class="absolute top-3 right-8 md:right-16 w-52 md:w-64 h-8 rounded-2xl border-2 border-red-500/40 pointer-events-none -z-0"></div>

        <div class="relative z-10 grid grid-cols-2 gap-4 md:gap-5 max-w-lg items-start">
          <div class="space-y-2 pt-8 md:pt-14">
            <div class="rounded-2xl overflow-hidden shadow-md aspect-[4/3] bg-white border border-slate-200/80">
              <img 
                src="<?php echo get_template_directory_uri(); ?>/assets/images/about/atlas-1.jpg" 
                alt="ATLAS Adjusting Team Work Upper" 
                class="w-full h-full object-cover object-[center_top]"
              />
            </div>

            <div class="rounded-2xl overflow-hidden shadow-md aspect-[4/3] bg-white border border-slate-200/80">
              <img 
                src="<?php echo get_template_directory_uri(); ?>/assets/images/about/atlas-1.jpg" 
                alt="ATLAS Adjusting Team Work Lower" 
                class="w-full h-full object-cover object-[center_bottom]"
              />
            </div>
          </div>

          <div class="relative">
            <div class="rounded-2xl overflow-hidden shadow-xl h-[320px] md:h-[380px] bg-white border border-slate-200/80">
              <img 
                src="<?php echo get_template_directory_uri(); ?>/assets/images/about/atlas-2.png" 
                alt="Senior Insurance Adjuster" 
                class="w-full h-full object-cover"
              />
            </div>

            <div class="absolute -bottom-20 left-1/2 -translate-x-1/2 md:left-2 md:translate-x-0 z-20 w-max">
              <div class="relative bg-red-600 text-white px-5 py-3 rounded-2xl shadow-2xl flex items-center gap-3">
                <div class="absolute -top-2 left-6 w-0 h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-b-8 border-b-red-600"></div>

                <div class="bg-white/20 p-2 rounded-xl flex items-center justify-center">
                  <i data-lucide="shield-check" class="w-6 h-6 text-white"></i>
                </div>

                <div>
                  <div class="text-lg md:text-xl font-black leading-none">6000+</div>
                  <div class="text-[10px] md:text-xs font-semibold opacity-90 leading-tight">Case Completed</div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>