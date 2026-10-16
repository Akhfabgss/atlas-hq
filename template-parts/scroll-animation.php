<?php
/**
 * Scroll Animation Module (AOS.js)
 * 
 * Memuat library AOS (Animate On Scroll) via CDN dan menginisialisasinya.
 * Dipanggil di footer.php menggunakan:
 *   <?php get_template_part('template-parts/scroll-animation'); ?>
 * 
 * Jika animasi tidak diinginkan, cukup comment baris pemanggilan di footer.php.
 */

if (!defined('ABSPATH')) exit;
?>

<!-- AOS.js CSS -->
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />

<!-- AOS.js Script -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,        // Default durasi animasi (ms)
            easing: 'ease-out-cubic', // Easing yang halus
            once: true,           // Animasi hanya berjalan sekali (performa lebih baik)
            offset: 80,           // Offset trigger dari viewport
            delay: 0,             // Default delay
            disable: 'mobile',    // Nonaktifkan di perangkat mobile untuk performa
        });
    }
});
</script>
