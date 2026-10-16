<?php
if (!defined('ABSPATH')) exit;

get_header();
?>

<!-- 1. INDEX FALLBACK SCREEN -->
<div class="min-h-screen bg-slate-50 text-slate-900 flex items-center justify-center p-6">
    <div class="max-w-xl w-full bg-white border border-slate-200/80 rounded-3xl p-8 shadow-xl text-center">
        <span class="inline-block px-3 py-1 bg-red-50 text-red-600 border border-red-200/60 rounded-full text-sm font-bold st  mb-4">
            Digital HQ Platform
        </span>
        <h1 class="text-3xl font-black text-slate-900 tracking-tight mb-3">
            PT Atlas Adjusting Indonesia
        </h1>
        <p class="text-slate-600 text-xs md:text-sm font-medium leading-relaxed mb-6">
            Meningkatkan efisiensi inspeksi klaim asuransi melalui penanganan transparan via Case Management Portal, pemetaan lokasi presisi, dan integrasi kecerdasan buatan.
        </p>
        <div class="flex justify-center gap-3">
            <a href="https://cmp.atlasadjusting.net" target="_blank" class="bg-red-600 hover:bg-red-500 text-white font-bold text-xs   px-5 py-2.5 rounded-xl transition-all shadow-lg shadow-red-600/30">
                Explore CMP Portal
            </a>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs   px-5 py-2.5 rounded-xl transition-all border border-slate-800">
                Home Page
            </a>
        </div>
    </div>
</div>

<?php
get_footer();
?>