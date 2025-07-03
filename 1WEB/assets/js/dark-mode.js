const toggle = document.querySelector('.darkmode-toggle');
const darkIcon = toggle.querySelector('i');

toggle.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode');

  
  if (document.body.classList.contains('dark-mode')) {
    darkIcon.classList.remove('fa-moon');
    darkIcon.classList.add('fa-sun');
  }
  else {
    darkIcon.classList.remove('fa-sun');
    darkIcon.classList.add('fa-moon');
  }
});