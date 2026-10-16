<?php
/**
 * Template Name: Single Profile Detail
 * Description: Template dinamis CPT Adjuster / Executive Profiles.
 */

get_header();

// =========================================================================
// READ DYNAMIC ACF FIELDS
// =========================================================================

// 1. Nama Utama (Mengambil dari Judul Post)
$name = get_the_title();

// 2. Title (Gelar Akademik) & Role (Jabatan Resmi)
// Mengambil langsung dari ID Post agar 100% akurat
$credentials = get_post_meta(get_the_ID(), 'profile_title', true);
$role        = get_post_meta(get_the_ID(), 'profile_role', true);

// Fallback jika get_post_meta kosong, coba ambil via ACF
if (empty($credentials)) { $credentials = get_field('profile_title'); }
if (empty($role))        { $role        = get_field('profile_role'); }

// 3. Kontak
$email = get_field('profile_email') ?: '';
$phone = get_field('profile_phone') ?: '';

// 4. Profile Image (Murni Featured Image WP Admin)
if (has_post_thumbnail()) {
    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
} else {
    $image_url = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=800';
}

// 5. Custom QR Code (Opsional)
$raw_qr      = get_field('profile_qr_code');
$qr_code_url = is_array($raw_qr) ? $raw_qr['url'] : $raw_qr;

// Auto QR Code Generator
$qr_image_src = !empty($qr_code_url) 
    ? $qr_code_url 
    : 'https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=' . urlencode("BEGIN:VCARD\nVERSION:3.0\nN:{$name}\nTEL:{$phone}\nEMAIL:{$email}\nEND:VCARD");

// 6. Parsing Bio Paragraphs
$raw_bio        = get_field('profile_bio');
$bio_paragraphs = [];
if ($raw_bio && is_string($raw_bio)) {
    $lines = explode("\n", str_replace("\r", "", $raw_bio));
    foreach ($lines as $line) {
        $clean = trim($line);
        if (!empty($clean)) {
            $bio_paragraphs[] = $clean;
        }
    }
}

// 7. Parsing Key Experiences
$raw_exp     = get_field('profile_experiences');
$experiences = [];
if ($raw_exp && is_string($raw_exp)) {
    $lines = explode("\n", str_replace("\r", "", $raw_exp));
    foreach ($lines as $line) {
        $data = explode('|', $line);
        if (count($data) >= 1 && !empty(trim($data[0]))) {
            $experiences[] = [
                'title' => trim($data[0]),
                'desc'  => isset($data[1]) ? trim($data[1]) : '',
            ];
        }
    }
}

// 8. Parsing Qualifications
$raw_qual       = get_field('profile_qualifications');
$qualifications = [];
if ($raw_qual && is_string($raw_qual)) {
    $lines = explode("\n", str_replace("\r", "", $raw_qual));
    foreach ($lines as $line) {
        $data = explode('|', $line);
        if (count($data) >= 1 && !empty(trim($data[0]))) {
            $qualifications[] = [
                'title' => trim($data[0]),
                'desc'  => isset($data[1]) ? trim($data[1]) : '',
            ];
        }
    }
}
?>

<div id="single-profile-content" class="site-main bg-slate-50 text-slate-900 font-sans py-12 md:py-16">
    <div class="container mx-auto px-6 max-w-7xl">
        
        <!-- 1. PROFILE HERO SECTION -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-start mb-12 md:mb-16">
            
            <!-- PROFILE IMAGE & VCARD -->
            <div class="lg:col-span-5 space-y-6">
                
                <div class="rounded-3xl overflow-hidden shadow-2xl bg-slate-900 border border-slate-200/80 group">
                    <img 
                        src="<?php echo esc_url($image_url); ?>" 
                        alt="<?php echo esc_attr($name); ?>" 
                        class="w-full h-[450px] object-cover object-top group-hover:scale-105 transition-transform duration-700"
                    />
                </div>

                <!-- Digital Executive vCard Box -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center gap-5">
                        <div class="bg-slate-50 p-2 rounded-2xl border border-slate-200/80 shrink-0">
                            <img 
                                src="<?php echo esc_url($qr_image_src); ?>" 
                                alt="Scan QR Code Contact - <?php echo esc_attr($name); ?>" 
                                class="w-24 h-24 object-contain"
                            />
                        </div>

                        <div class="space-y-1.5">
                            <span class="inline-block text-[10px] font-bold text-red-600">
                                DIGITAL QR ENABLED
                            </span>
                            <h4 class="text-xs font-black text-slate-900  ">
                                CONNECT WITH <?php echo esc_html(strtoupper($name)); ?>
                            </h4>
                            <p class="text-sm text-slate-500 font-medium leading-relaxed">
                                Scan the QR code below to quickly add contact information to your device.
                            </p>
                            
                            <button 
                                type="button" 
                                onclick="downloadVCard('<?php echo esc_js($name); ?>', '<?php echo esc_js($email); ?>', '<?php echo esc_js($phone); ?>', '<?php echo esc_js($role); ?>')" 
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-red-600 hover:text-red-500 transition-colors pt-1 cursor-pointer"
                            >
                                <i data-lucide="download" class="w-3.5 h-3.5"></i>
                                <span>Download (.vcf) file</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- PROFILE BIO & CONTACT DETAILS -->
            <div class="lg:col-span-7 space-y-8">
                
                <div>                    
                    <!-- Nama Utama + Gelar (Profile Title) -->
                    <h1 class="text-3xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight flex flex-wrap items-baseline gap-x-3 mb-2">
                        <span class="mb-4"><?php echo esc_html($name); ?></span>
                        <?php if (!empty($credentials)) : ?>
                            <span class="text-xs md:text-sm font-semibold text-slate-500 tracking-normal ">
                                <?php echo esc_html($credentials); ?>
                            </span>
                        <?php endif; ?>
                    </h1>

                    <?php if (!empty($role)) : ?>
                        <p class="text-xs md:text-sm font-bold text-red-600  ">
                            <?php echo esc_html($role); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Quick Contact Pills -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <?php if (!empty($email)) : ?>
                        <a href="mailto:<?php echo esc_attr($email); ?>" class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-3.5 hover:border-red-500/60 hover:shadow-md transition-all group">
                            <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 group-hover:bg-red-600 group-hover:text-white transition-colors">
                                <i data-lucide="mail" class="w-5 h-5"></i>
                            </div>
                            <div class="overflow-hidden">
                                <span class="block text-[10px] font-bold text-slate-400  ">DIRECT EMAIL</span>
                                <span class="text-xs font-bold text-slate-800 truncate block group-hover:text-red-600 transition-colors"><?php echo esc_html($email); ?></span>
                            </div>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($phone)) : ?>
                        <a href="tel:<?php echo esc_attr($phone); ?>" class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-3.5 hover:border-red-500/60 hover:shadow-md transition-all group">
                            <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 group-hover:bg-red-600 group-hover:text-white transition-colors">
                                <i data-lucide="phone" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <span class="block text-[10px] font-bold text-slate-400  ">DIRECT OFFICE / MOBILE</span>
                                <span class="text-xs font-bold text-slate-800 block group-hover:text-red-600 transition-colors"><?php echo esc_html($phone); ?></span>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Dynamic Bio Paragraphs -->
                <?php if (!empty($bio_paragraphs)) : ?>
                    <div class="space-y-4 text-slate-600 text-xs md:text-lg leading-relaxed pt-2 font-medium">
                        <?php foreach ($bio_paragraphs as$paragraph) : ?>
                            <p><?php echo esc_html($paragraph); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>

        </div>

        <!-- 2. KEY EXPERIENCE & QUALIFICATIONS SECTION -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
            
            <!-- KEY EXPERIENCE -->
            <?php if (!empty($experiences)) : ?>
                <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-200/80 shadow-sm hover:shadow-xl transition-all duration-300">
                    <h3 class="text-2xl font-black text-slate-900 mb-6 flex items-center gap-3 tracking-tight">
                        <span class="w-3 h-3 rounded-full bg-red-600"></span>
                        Key Experience
                    </h3>

                    <div class="space-y-3.5">
                        <?php foreach ($experiences as$exp) : ?>
                            <div class="flex items-start gap-3.5 p-3.5 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="briefcase" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 text-sm md:text-base leading-snug"><?php echo esc_html($exp['title']); ?></h4>
                                    <?php if (!empty($exp['desc'])) : ?>
                                        <p class="text-xs text-slate-500 mt-0.5 leading-relaxed font-medium"><?php echo esc_html($exp['desc']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- QUALIFICATIONS -->
            <?php if (!empty($qualifications)) : ?>
                <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-200/80 shadow-sm hover:shadow-xl transition-all duration-300">
                    <h3 class="text-2xl font-black text-slate-900 mb-6 flex items-center gap-3 tracking-tight">
                        <span class="w-3 h-3 rounded-full bg-red-600"></span>
                        Qualifications
                    </h3>

                    <div class="space-y-3.5">
                        <?php foreach ($qualifications as$qual) : ?>
                            <div class="flex items-start gap-3.5 p-3.5 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="award" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 text-sm md:text-base leading-snug"><?php echo esc_html($qual['title']); ?></h4>
                                    <?php if (!empty($qual['desc'])) : ?>
                                        <p class="text-xs text-slate-500 mt-0.5 leading-relaxed font-medium"><?php echo esc_html($qual['desc']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>

    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });

    function downloadVCard(name, email, phone, title) {
        const vcardData = 
`BEGIN:VCARD
VERSION:3.0
N:${name}
FN:${name}
TITLE:${title}
ORG:PT Atlas Adjusting Indonesia
EMAIL;TYPE=INTERNET,WORK:${email}
TEL;TYPE=CELL,WORK:${phone}
END:VCARD`;

        const blob = new Blob([vcardData], { type: 'text/vcard;charset=utf-8;' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        
        a.href = url;
        a.download = `${name.replace(/[^a-z0-9]/gi, '_').toLowerCase()}_contact.vcf`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }
</script>

<?php 
get_footer(); 
?>