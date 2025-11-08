<?php
require_once("Vue/Composants/vue_navbar.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Care</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>

<div class="home-container">
    <img src="Images/homeImg.png" alt="home image" height="450">
    <div>
        <h2>Bienvenue sur MediCare <?= isset($_SESSION['prenom']) ? $_SESSION['prenom'] : ''; ?> !</h2>
        <h3>Gérez facilement vos médecins, patients, consultations et prescriptions</h3>
    </div>
</div>

<footer>
    <p>&copy; 2025 MediCare - Tous droits réservés</p>
</footer>

</body>
</html>
