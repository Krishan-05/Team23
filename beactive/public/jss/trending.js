
document.addEventListener("DOMContentLoaded", () => {
    const wrapper = document.querySelector(".wrapper");
    const carousel = wrapper.querySelector(".carousel");
    const arrowBtns = wrapper.querySelectorAll("i");
    const firstCard = carousel.querySelector(".card");
    const firstCardWidth = firstCard.offsetWidth + 16; 
  
    let isDragging = false, startX, startScrollLeft;
  
    const cards = [...carousel.children];
    const cardsPerView = Math.round(carousel.offsetWidth / firstCardWidth);
  
    cards.slice(-cardsPerView).reverse().forEach(card => {
      carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
    });
  
    cards.slice(0, cardsPerView).forEach(card => {
      carousel.insertAdjacentHTML("beforeend", card.outerHTML);
    });
  
    carousel.scrollLeft = carousel.offsetWidth;
  
    arrowBtns.forEach(btn => {
      btn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id === "left" ? -firstCardWidth : firstCardWidth;
      });
    });
  
    const dragStart = (e) => {
      isDragging = true;
      carousel.classList.add("dragging");
      startX = e.pageX;
      startScrollLeft = carousel.scrollLeft;
    };
  
    const dragging = (e) => {
      if (!isDragging) return;
      carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
    };
  
    const dragStop = () => {
      isDragging = false;
      carousel.classList.remove("dragging");
    };
  
    const infiniteScroll = () => {
      if (carousel.scrollLeft <= 0) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
        carousel.classList.remove("no-transition");
      }
      else if (Math.ceil(carousel.scrollLeft) >= carousel.scrollWidth - carousel.offsetWidth) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");
      }
    };
  
    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener("mousemove", dragging);
    document.addEventListener("mouseup", dragStop);
  
    carousel.addEventListener("touchstart", (e) => dragStart(e.touches[0]));
    carousel.addEventListener("touchmove", (e) => dragging(e.touches[0]));
    document.addEventListener("touchend", dragStop);
  
    carousel.addEventListener("scroll", infiniteScroll);
  });