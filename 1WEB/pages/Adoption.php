<?php include '../database/bd.php';

$stmt = $pdo->query("SELECT * FROM chiens");
$chiens = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmtRaces = $pdo->query("SELECT DISTINCT race FROM chiens");
$races = $stmtRaces->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../include/links.php'?>
    <title>Adoption de chien</title>
</head>
<body>
    <?php include '../include/header.php'?>
    <main class="main-adoption">
        <section class="intro-adoption">
            <h2>Adoptez un compagnon pour la vie 🐾</h2>
            <p>
                Bienvenue dans notre espace d’adoption ! Ici, vous trouverez tous les chiens que notre association recueille et protège chaque jour. 
                Offrir une seconde chance à ces adorables compagnons, c’est aussi faire le choix de l’amour, de la fidélité et de la bienveillance.
            </p>
            <p>
                Utilisez les filtres ci-dessous pour trouver la race qui vous correspond, ou laissez-vous surprendre par un regard rempli d’affection.
            </p>
        </section>

        <div class="filtrage-container">
            <div class="filtrage-barre">
                <button id="toggle-liste" class="toggle-button">Afficher les races ▼</button>
                <input type="text" id="search-input" placeholder="Rechercher une race...">
            </div>

            <div class="liste-deroulante" id="liste-deroulante">
                <ul>
                    <?php foreach ($races as $race): ?>
                    <li class="filtre-race-item" data-race="<?= strtolower($race['race']) ?>">
                        <?= htmlspecialchars($race['race']) ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

            <div class="cartes-container">
            
                <?php foreach ($chiens as $chien): ?>
                <div class="carte-chien" data-race="<?=strtolower(htmlspecialchars($chien['race'])) ?>">
                    <img src="../assets/uploads/<?= htmlspecialchars($chien['photo']) ?>" alt="<?= htmlspecialchars($chien['nom']) ?>">
                    <div class="contenu">
                        <h3><?= htmlspecialchars($chien['nom']) ?></h3>
                        <p>Âge : <?= htmlspecialchars($chien['age']) ?> an(s)</p>
                        <p>Race : <?= htmlspecialchars($chien['race']) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        
    </main>
    <?php include '../include/footer.php'?>
    <?php include '../include/scriptjs.php'?>
    <script src="../assets/js/filtrage.js"></script>
</body>
</html>