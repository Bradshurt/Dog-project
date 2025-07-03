const searchToggle = document.querySelector('.search-toggle');
const searchContainer = document.querySelector('.search-container');
const searchBar = document.querySelector('.search-bar');

function handleResponsiveSearch() {
    if (window.innerWidth <= 768) {
        searchContainer.classList.add('active');
        if (searchToggle) searchToggle.style.display = 'none';
    } else {
        searchContainer.classList.remove('active');
        if (searchToggle) searchToggle.style.display = '';
    }
}

window.addEventListener('resize', handleResponsiveSearch);
window.addEventListener('DOMContentLoaded', handleResponsiveSearch);

if (searchToggle && searchContainer && searchBar) {
    searchToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        searchContainer.classList.toggle('active');
        if (searchContainer.classList.contains('active')) {
            searchBar.focus();
        }
    });

    document.addEventListener('click', (e) => {
        if (
            searchContainer.classList.contains('active') &&
            !searchContainer.contains(e.target)
        ) {
            searchContainer.classList.remove('active');
        }
    });
}