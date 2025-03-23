document.addEventListener('DOMContentLoaded', () => {
    // Carousel Functionality
    const items = document.querySelectorAll('.carousel-item');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    let current = 0;

    function updateCarousel(newIndex, direction) {
        const currentItem = items[current];
        const newItem = items[newIndex];

        currentItem.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
        newItem.style.transition = 'none';

        newItem.style.transform = direction === 'next' ? 'translateX(100%)' : 'translateX(-100%)';
        newItem.style.opacity = '0';


        newItem.offsetHeight;


        currentItem.style.transform = direction === 'next' ? 'translateX(-100%)' : 'translateX(100%)';
        currentItem.style.opacity = '0';
        newItem.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
        newItem.style.transform = 'translateX(0)';
        newItem.style.opacity = '1';

        currentItem.classList.remove('active');
        newItem.classList.add('active');

        current = newIndex;
    }

    prev.addEventListener('click', () => {
        const prevIndex = (current - 1 + items.length) % items.length;
        updateCarousel(prevIndex, 'prev');
    });

    next.addEventListener('click', () => {
        const nextIndex = (current + 1) % items.length;
        updateCarousel(nextIndex, 'next');
    });

    

});