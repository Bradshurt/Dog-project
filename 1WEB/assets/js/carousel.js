const carousel = document.getElementById('carousel');
const leftBtn = document.querySelector('.carousel-btn.left');
const rightBtn = document.querySelector('.carousel-btn.right');

let autoScrollInterval;
let isScrolling = false;
const scrollSpeed = 3;
const pauseDuration = 5000;

function cloneItemsOnce() {
  const existingClones = carousel.querySelectorAll('[data-clone="true"]');
  if (existingClones.length > 0) return;

  const items = carousel.querySelectorAll('.carousel-item');
  items.forEach(item => {
    const clone = item.cloneNode(true);
    clone.setAttribute('data-clone', 'true');
    carousel.appendChild(clone);
  });
}

function autoScroll() {
  if (isScrolling) return;

  const itemWidth = carousel.querySelector('.carousel-item').offsetWidth;
  const maxScroll = carousel.scrollWidth - carousel.clientWidth;

  if (carousel.scrollLeft >= maxScroll - itemWidth) {
    isScrolling = true;
    carousel.style.scrollBehavior = 'auto';
    carousel.scrollLeft = 0;
    setTimeout(() => {
      carousel.style.scrollBehavior = 'smooth';
      isScrolling = false;
    }, 50);
  } else {
    carousel.scrollBy({ left: scrollSpeed, behavior: 'smooth' });
  }
}

function startAutoScroll() {
  stopAutoScroll();
  autoScrollInterval = setInterval(autoScroll, 200);
}

function stopAutoScroll() {
  clearInterval(autoScrollInterval);
}

function scrollCarousel(direction) {
  stopAutoScroll();
  isScrolling = true;

  const scrollAmount = carousel.offsetWidth;
  carousel.scrollBy({
    left: direction === 'left' ? -scrollAmount : scrollAmount,
    behavior: 'smooth'
  });

  setTimeout(() => {
    isScrolling = false;
    startAutoScroll();
  }, pauseDuration);
}

carousel.addEventListener('scroll', () => {
  if (!isScrolling) {
    stopAutoScroll();
    setTimeout(startAutoScroll, pauseDuration);
  }
});

document.addEventListener('visibilitychange', () => {
  if (document.hidden) {
    stopAutoScroll();
  } else {
    startAutoScroll();
  }
});

cloneItemsOnce();
startAutoScroll();

leftBtn.addEventListener('click', () => scrollCarousel('left'));
rightBtn.addEventListener('click', () => scrollCarousel('right'));