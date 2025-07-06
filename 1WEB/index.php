<?php 
require_once './database/bd.php';

$stmt = $pdo->prepare("SELECT nom,race,photo FROM chiens WHERE etat = 1 ORDER BY RAND() LIMIT 10");
$stmt->execute();
$chiens = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include './include/links.php'?>
    <title>LovDOG</title>
  </head>
  <body>
    <?php include './include/header.php'?>
    <main class="containt-main">
      <section class="intro-section">
        <h1>Bienvenue chez LovDOG</h1>
        <p>
          LovDOG est une association à but non lucratif dédiée à la protection
          des animaux. Nous sauvons, soignons et aidons à l’adoption des chiens
          abandonnés. Découvrez notre mission et rejoignez-nous pour offrir une
          seconde chance à nos compagnons à quatre pattes !
        </p>
      </section>
      <section class="map-section">
        <h2>Où nous trouver?</h2>
        <div class="map-container">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.999123456789!2d2.352221315674972!3d48.85661407928765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fdfb8c8c8c9%3A0x7a5b5b5b5b5b5b5b!2sLovDOG%20Association%20de%20protection%20des%20animaux!5e0!3m2!1sfr!2sfr!4v1616161616161"
            width="600"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
          ></iframe>
        </div>
      </section>
      <section class="carousel-section">
        <h2>Les chiens à adopté</h2>

        <div class="carousel-wrapper">
          <button class="carousel-btn left"><i class="fa-solid fa-chevron-left"></i></button>
          <div class="carousel" id="carousel">
            <?php foreach ($chiens as $chien): ?>
              <div class="carousel-item">
                <img src="./assets/uploads/<?= htmlspecialchars($chien['photo']) ?>" alt="<?= htmlspecialchars($chien['nom']) ?>" />
                <div class="info">
                  <h3><?=htmlspecialchars($chien['nom']) ?></h3>
                  <p><?=htmlspecialchars($chien['race'])?></p>
                </div>
              </div>
            <?php endforeach?>
          </div>
          <button class="carousel-btn right"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
      </section>
    </main>
    <?php include './include/footer.php'?>
    <script src="./assets/js/nav-togle.js"></script>
    <script src="./assets/js/search-togle.js"></script>
    <script src="./assets/js/dark-mode.js"></script>
    <script src="./assets/js/carousel.js"></script>

  </body>
</html>
