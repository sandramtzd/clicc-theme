document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.getElementById('news-carousel');
    const dotsContainer = document.getElementById('news-carousel-dots');
    
    // Only proceed if the elements exist
    if (!carousel || !dotsContainer) {
        return;
    }

    const dots = dotsContainer.querySelectorAll('.dot');
    
    // Function to update the active dot based on scroll position
    const updateDots = () => {
        // Find the index of the visible card
        const cardWidth = carousel.querySelector('.news-card').offsetWidth + 20; // card width + gap
        const scrollPosition = carousel.scrollLeft;
        const activeIndex = Math.round(scrollPosition / cardWidth);

        dots.forEach((dot, index) => {
            if (index === activeIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    };

    // Add scroll event listener to update dots on scroll
    carousel.addEventListener('scroll', updateDots);
    
    // Add click event listeners to dots for smooth scrolling
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            const cardWidth = carousel.querySelector('.news-card').offsetWidth + 20; // card width + gap
            carousel.scrollTo({
                left: index * cardWidth,
                behavior: 'smooth'
            });
        });
    });
});