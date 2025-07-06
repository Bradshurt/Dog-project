<?php
require_once '../database/bd.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = trim($_POST['nom'] ?? '');
    $age = intval($_POST['age'] ?? 0);
    $race = trim($_POST['race'] ?? '');

    // Vérification des champs
    if ($nom && $age > 0 && $race && isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $photo = $_FILES['photo'];
        $ext = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($ext, $allowed)) {
            $photoName = uniqid("chien_", true) . '.' . $ext;
            $targetPath = "../assets/uploads/" . $photoName;

            if (move_uploaded_file($photo['tmp_name'], $targetPath)) {
                $stmt = $pdo->prepare("INSERT INTO chiens (nom, age, race, photo) VALUES (?, ?, ?, ?)");
                $stmt->execute([$nom, $age, $race, $photoName]);

                $success = "Le chien a été ajouté avec succès.";
            } else {
                $error = "Erreur lors du téléchargement de la photo.";
            }
        } else {
            $error = "Format de fichier non autorisé.";
        }
    } else {
        $error = "Tous les champs sont obligatoires.";
    }
}

if(isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM chiens WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: Backoffice.php");
    exit();
}
$result = $pdo->query("SELECT * FROM chiens ORDER BY id DESC");

if (isset($_GET['toggle']) && is_numeric($_GET['toggle'])) {
    $id = (int) $_GET['toggle'];

    $stmt = $pdo->prepare("SELECT etat FROM chiens WHERE id = ?");
    $stmt->execute([$id]);
    $chien = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($chien) {
        $newEtat = $chien['etat'] ? 0 : 1;

        $update = $pdo->prepare("UPDATE chiens SET etat = ? WHERE id = ?");
        $update->execute([$newEtat, $id]);
    }

    header("Location: Backoffice.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Gestion LovDOG</title>
</head>
<body>
    <main class="backoffice-main">
        <div class="chien-upload-delet">
            <div class="data-upload">
                <h2>Ajout d’un nouveau chien</h2>

                <?php if ($success): ?>
                    <p class="message success"><?= htmlspecialchars($success) ?></p>
                <?php elseif ($error): ?>
                    <p class="message error"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>

                <form class="form-backoffice" action="Backoffice.php" method="POST" enctype="multipart/form-data">
                    <label class="label" for="nom">Nom du chien</label>
                    <input type="text" name="nom" id="nom" required>

                    <label class="label" for="age">Âge</label>
                    <input type="number" name="age" id="age" required min="0">

                    <label class="label" for="race">Race</label>
                    <input type="text" name="race" id="race" required>

                    <div class="image">
                        <label class="label-photo" for="photo">Photo</label>
                        <input type="file" name="photo" id="photo" accept="image/*" required>
                        <div class="choose-image">
                            <label for="photo" class="btn-upload">Choisir une image</label>
                            <span id="file-name">Aucun fichier choisi</span>
                        </div>
                    </div>

                    <button type="submit">Ajouter le chien</button>
                </form>
            </div>

            <div class="data-table">
                <h2>Liste des chiens</h2>
                <table class="chien-list">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Âge</th>
                            <th>Race</th>
                            <th>Disponibilité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($chien = $result->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?= htmlspecialchars($chien['id']) ?></td>
                                <td><?= htmlspecialchars($chien['nom']) ?></td>
                                <td><?= htmlspecialchars($chien['age']) ?></td>
                                <td><?= htmlspecialchars($chien['race'])?></td>
                                <td><?= $chien['etat'] ? 'Disponible' : 'Indisponible' ?></td>
                                <td>
                                    <a class="toggle-dispo" href="?toggle=<?= $chien['id'] ?>">
                                        <?= $chien['etat'] ? 'Marquer comme adopté' : 'Rendre disponible' ?>
                                    </a>
                                </td>
                                <td>
                                    <a class="delete-chien" href="?delete=<?= $row['id']?>" onclick="return confirm('Voulez vous supprimer?')">supprimer</a>
                                </td>

                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="../assets/js/backoffice.js"></script>
</body>
</html>