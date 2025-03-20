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
  
      newItem.offsetHeight; // Force reflow
  
      currentItem.style.transform = direction === 'next' ? 'translateX(-100%)' : 'translateX(100%)';
      currentItem.style.opacity = '0';
      newItem.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
      newItem.style.transform = 'translateX(0)';
      newItem.style.opacity = '1';
  
      currentItem.classList.remove('active');
      newItem.classList.add('active');
      current = newIndex;
    }
  
    if (prev && next && items.length > 0) {
      prev.addEventListener('click', () => {
        const prevIndex = (current - 1 + items.length) % items.length;
        updateCarousel(prevIndex, 'prev');
      });
      next.addEventListener('click', () => {
        const nextIndex = (current + 1) % items.length;
        updateCarousel(nextIndex, 'next');
      });
    }
  
    // Newsletter Subscription Functionality
    const newsletterForm = document.getElementById('newsletter-form');
    if (newsletterForm) {
      newsletterForm.addEventListener('submit', event => {
        event.preventDefault();
        alert('Subscription has been successful!\nCheck your email for our newsletter!');
      });
    }
  
    // Dark Mode Toggle Functionality
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    if (darkModeToggle) {
      darkModeToggle.addEventListener('click', () => {
        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        if (isDark) {
          document.documentElement.removeAttribute('data-theme');
          darkModeToggle.textContent = '🌙';
          localStorage.setItem('theme', 'light');
        } else {
          document.documentElement.setAttribute('data-theme', 'dark');
          darkModeToggle.textContent = '☀️';
          localStorage.setItem('theme', 'dark');
        }
      });
    }
  });
  