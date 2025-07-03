const navToggle = document.querySelector('.nav-toggle');
const navMenu = document.querySelector('.nav-menu');
const icon = navToggle.querySelector('.style-icon');
function closeMenu () {
    navMenu.classList.remove('active');
    navToggle.classList.remove('active');
    navToggle.setAttribute('aria-expanded', false);
    icon.classList.remove('fa-xmark');
    icon.classList.add('fa-bars');
}
navToggle.addEventListener('click' , (e) => {
    e.preventDefault();
    const isActive = navMenu.classList.toggle('active');
    navToggle.classList.toggle('active');
    navToggle.setAttribute('aria-expanded', isActive);
    if (isActive) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-xmark');
    } else {
        icon.classList.remove('fa-xmark');
        icon.classList.add('fa-bars');
    }
});
document.addEventListener('click', (e) => {
    if (
        navMenu.classList.contains('active') && 
        !navMenu.contains(e.target) && 
        !navToggle.contains(e.target)
    ) {
        closeMenu();
    }
});
