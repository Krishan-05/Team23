document.addEventListener('DOMContentLoaded', () => {
    // Carousel Functionality
    const items = document.querySelectorAll('.carousel-item');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    let current = 0;

    function updateCarousel(newIndex, direction) {
        const currentItem = items[current];
        const newItem = items[newIndex];

        // Reset transforms and transitions
        currentItem.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
        newItem.style.transition = 'none';

        // Position the new item offscreen
        newItem.style.transform = direction === 'next' ? 'translateX(100%)' : 'translateX(-100%)';
        newItem.style.opacity = '0';

        // Trigger layout reflow to apply the offscreen position
        newItem.offsetHeight; // Forces reflow

        // Animate current item out and new item in
        currentItem.style.transform = direction === 'next' ? 'translateX(-100%)' : 'translateX(100%)';
        currentItem.style.opacity = '0';
        newItem.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
        newItem.style.transform = 'translateX(0)';
        newItem.style.opacity = '1';

        // Update classes
        currentItem.classList.remove('active');
        newItem.classList.add('active');

        // Update current index
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

    // Newsletter Subscription Functionality
    document.getElementById('newsletter-form').addEventListener('submit', function (event) {
        // Prevent the form from submitting normally
        event.preventDefault();

        // Display the success message
        alert('Subscription has been successful!\nCheck your email for our newsletter!');
        

    });
});
