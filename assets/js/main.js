document.addEventListener('DOMContentLoaded', function () {
    // 1. Inisialisasi awal Lucide Icons
    function renderLucide() {
        if (window.lucide) {
            window.lucide.createIcons();
        }
    }
    renderLucide();

    // 2. Inisialisasi Swiper
    const totalSlides = 6;
    const heroSwiper = new Swiper('.heroSwiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.hero-next',
            prevEl: '.hero-prev',
        },
        on: {
            init: function () {
                renderLucide();
            },
            slideChange: function () {
                const activeIndex = this.realIndex;

                // Update Counter
                const counterEl = document.getElementById('current-slide');
                if (counterEl) {
                    counterEl.textContent = String(activeIndex + 1).padStart(2, '0');
                }

                // Update Progress Bar
                const progressBar = document.getElementById('progress-bar');
                if (progressBar) {
                    const percentage = ((activeIndex + 1) / totalSlides) * 100;
                    progressBar.style.width = percentage + '%';
                }

                // Update Solusi Item Kanan (Scroll internal tanpa menggeser halaman)
                const menuItems = document.querySelectorAll('.solution-item');
                const scrollContainer = document.querySelector('.solution-menu-scroll');

                menuItems.forEach((item, index) => {
                    const arrow = item.querySelector('.arrow');
                    if (index === activeIndex) {
                        item.classList.add('bg-slate-900', 'border-slate-700', 'text-white');
                        item.classList.remove('border-transparent', 'text-slate-300');
                        if (arrow) {
                            arrow.classList.add('text-red-500');
                            arrow.classList.remove('text-slate-500');
                        }

                        // Scroll KONTANER LOKAL SAJA (bukan window/layar utama)
                        if (scrollContainer) {
                            const itemTop = item.offsetTop;
                            const itemHeight = item.offsetHeight;
                            const containerHeight = scrollContainer.clientHeight;
                            
                            // Hitung scroll agar item aktif selalu terlihat di dalam box
                            scrollContainer.scrollTo({
                                top: itemTop - (containerHeight / 2) + (itemHeight / 2),
                                behavior: 'smooth'
                            });
                        }
                    } else {
                        item.classList.remove('bg-slate-900', 'border-slate-700', 'text-white');
                        item.classList.add('border-transparent', 'text-slate-300');
                        if (arrow) {
                            arrow.classList.remove('text-red-500');
                            arrow.classList.add('text-slate-500');
                        }
                    }
                });

                renderLucide();
            }
        }
    });

    // Event Handler Klik Item Solusi Kanan
    const menuItems = document.querySelectorAll('.solution-item');
    menuItems.forEach((item) => {
        item.addEventListener('click', function () {
            const slideIndex = parseInt(this.getAttribute('data-slide'));
            if (!isNaN(slideIndex)) {
                heroSwiper.slideToLoop(slideIndex);
            }
        });
    });
});