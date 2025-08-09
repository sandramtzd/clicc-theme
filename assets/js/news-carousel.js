document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.getElementById('news-carousel');
    const dotsContainer = document.getElementById('news-carousel-dots');
    
    if (!carousel || !dotsContainer) {
        return;
    }

    const cards = carousel.querySelectorAll('.news-card');
    const dots = dotsContainer.querySelectorAll('.dot');
    
    // We need to get the gap value from the CSS
    const carouselStyles = window.getComputedStyle(carousel);
    const gap = parseFloat(carouselStyles.getPropertyValue('gap'));

    const updateActiveState = () => {
        if (cards.length === 0) return;

        let activeIndex = 0;
        const scrollLeft = carousel.scrollLeft;
        
        // Find the card that is most centered in the viewport
        let minDistance = Infinity;
        cards.forEach((card, index) => {
            const cardCenter = card.offsetLeft - scrollLeft + (card.offsetWidth / 2);
            const carouselCenter = carousel.offsetWidth / 2;
            const distance = Math.abs(cardCenter - carouselCenter);

            if (distance < minDistance) {
                minDistance = distance;
                activeIndex = index;
            }
        });

        // Update active dot
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === activeIndex);
        });

        // Update active card class for the pop-out effect on desktop
        if (window.innerWidth >= 768) {
            cards.forEach((card, index) => {
                card.classList.toggle('is-active', index === activeIndex);
            });
        }
    };

    // Add scroll event listener to update active state
    carousel.addEventListener('scroll', updateActiveState);

    // Add click event listeners to dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            const cardElement = cards[index];
            if (cardElement) {
                // Calculate the scroll position to center the card, accounting for the gap
                const scrollLeftPosition = cardElement.offsetLeft - (carousel.offsetWidth / 2) + (cardElement.offsetWidth / 2);

                carousel.scrollTo({
                    left: scrollLeftPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Initial call and on window resize
    updateActiveState();
    window.addEventListener('resize', updateActiveState);
});