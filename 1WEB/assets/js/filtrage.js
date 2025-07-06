const toggleBtn = document.getElementById('toggle-liste');
const listeDeroulante = document.getElementById('liste-deroulante');

toggleBtn.addEventListener('click', () => {
  const isVisible = listeDeroulante.style.display === 'block';
  listeDeroulante.style.display = isVisible ? 'none' : 'block';
});

document.addEventListener('click', (e) => {
  if (
    !listeDeroulante.contains(e.target) &&
    !toggleBtn.contains(e.target)
  ) {
    listeDeroulante.style.display = 'none';
  }
});

document.querySelectorAll('.filtre-race-item').forEach(item => {
  item.addEventListener('click', () => {
    const raceCliquee = item.dataset.race;
    filtrerChiens(raceCliquee);
  });
});

document.getElementById('search-input').addEventListener('input', (e) => {
  const terme = e.target.value.toLowerCase();
  document.querySelectorAll('.filtre-race-item').forEach(item => {
    const race = item.dataset.race.toLowerCase();
    item.style.display = race.includes(terme) ? 'block' : 'none';
  });

  if (terme === '') {
    afficherToutesLesCartes();
  }
});

function filtrerChiens(raceFiltre) {
  const cartes = document.querySelectorAll('.carte-chien');

  cartes.forEach(carte => {
    const race = carte.dataset.race;
    if (race === raceFiltre) {
      carte.style.display = 'block';
    } else {
      carte.style.display = 'none';
    }
  });

  majEtatParRace([raceFiltre]);
}

function afficherToutesLesCartes() {
  document.querySelectorAll('.carte-chien').forEach(carte => {
    carte.style.display = 'block';
  });
}

window.addEventListener('DOMContentLoaded', () => {
  afficherToutesLesCartes();
});
