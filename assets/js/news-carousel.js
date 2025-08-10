document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.getElementById('news-carousel');
    const dotsContainer = document.getElementById('news-carousel-dots');
    
    if (!carousel || !dotsContainer) {
        return;
    }

    const cards = carousel.querySelectorAll('.news-card');
    const dots = dotsContainer.querySelectorAll('.dot');
    
    // A single function to manage the active state of cards and dots.
    const setActiveState = (index) => {
        dots.forEach(dot => dot.classList.remove('active'));
        cards.forEach(card => card.classList.remove('is-active'));
        
        if (dots[index]) {
            dots[index].classList.add('active');
        }
        
        if (window.innerWidth >= 768 && cards[index]) {
            cards[index].classList.add('is-active');
        }
    };

    // A reliable check to see if a card is fully visible in the carousel's viewport
    const isCardFullyVisible = (card) => {
        const carouselRect = carousel.getBoundingClientRect();
        const cardRect = card.getBoundingClientRect();

        return (
            cardRect.left >= carouselRect.left &&
            cardRect.right <= carouselRect.right
        );
    };


    // The click event listener now includes a check to scroll if necessary
    dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                setActiveState(index);
                
                const cardElement = cards[index];
                if (cardElement) {
                    // For desktop, check if the card is not fully visible, then scroll
                    if (window.innerWidth >= 768) {
                        if (!isCardFullyVisible(cardElement)) {
                            // Calculate the scroll position to align the card to the left
                            const scrollLeftPosition = cardElement.offsetLeft - carousel.offsetLeft;
                            
                            carousel.scrollTo({
                                left: scrollLeftPosition,
                                behavior: 'smooth'
                            });
                        }
                    } else { // For mobile, always scroll on click
                        const scrollLeftPosition = cardElement.offsetLeft - carousel.offsetLeft;
                        carousel.scrollTo({
                            left: scrollLeftPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

    // The scroll listener remains to update the dots when a user manually scrolls on mobile
    carousel.addEventListener('scroll', () => {
        if (window.innerWidth < 768) {
            let activeIndex = 0;
            let minDistance = Infinity;
            const scrollLeft = carousel.scrollLeft;
            const carouselCenter = scrollLeft + (carousel.offsetWidth / 2);

            cards.forEach((card, index) => {
                const cardCenter = card.offsetLeft + (card.offsetWidth / 2);
                const distance = Math.abs(cardCenter - carouselCenter);

                if (distance < minDistance) {
                    minDistance = distance;
                    activeIndex = index;
                }
            });
            setActiveState(activeIndex);
        }
    });

    // Initial call to set the active state of the first card/dot on page load.
    setActiveState(0);
    
    // Handle resizing to re-evaluate the active state.
    window.addEventListener('resize', () => {
        setActiveState(0);
    });
});