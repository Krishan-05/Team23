document.addEventListener('DOMContentLoaded', () => {
    // Carousel Functionality
    const items = document.querySelectorAll('.carousel-item');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    let current = 0;

    function updateCarousel(index, direction) {
        // Remove active class from current item
        const currentItem = items[current];
        currentItem.classList.remove('active');
        currentItem.classList.add(direction === 'next' ? 'exit-left' : 'exit-right');

        // Wait for animation to complete
        currentItem.addEventListener('transitionend', () => {
            currentItem.classList.remove('exit-left', 'exit-right');
        }, { once: true });

        // Set new active item
        const newItem = items[index];
        newItem.classList.add('active');
    }

    prev.addEventListener('click', () => {
        const nextIndex = (current - 1 + items.length) % items.length;
        updateCarousel(nextIndex, 'prev');
        current = nextIndex;
    });

    next.addEventListener('click', () => {
        const nextIndex = (current + 1) % items.length;
        updateCarousel(nextIndex, 'next');
        current = nextIndex;
    });

    // Newsletter Subscription Functionality
    document.getElementById('newsletter-form').addEventListener('submit', function (event) {
        // Prevent the form from submitting normally
        event.preventDefault();

        // Display the success message
        alert('Subscription has been successful!\nCheck your email for our newsletter!');

    });
});
