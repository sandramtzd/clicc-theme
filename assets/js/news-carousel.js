// assets/js/news-carousel.js
document.addEventListener('DOMContentLoaded', () => {
    // Only initialize Swiper if the element exists
    if (document.querySelector('.news-swiper')) {
        new Swiper('.news-swiper', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            // The default loop is true, which will apply to mobile
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                // When window width is less than 768px (for mobile)
                767: {
                    slidesPerView: 1.2, // Show more than one slide to indicate a carousel
                },
                // When window width is 768px or more (for desktop)
                768: {
                    slidesPerView: 3, // Show 3 cards side-by-side
                    spaceBetween: 20, // Add spacing between cards
                    loop: false, // <-- This is the key change to fix pagination
                    centeredSlides: false, // Don't center slides on desktop
                    effect: 'slide', // Use a simple slide effect on desktop
                }
            }
        });
    }
});