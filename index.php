<?php
session_start();
require_once("Controleur/controleur.class.php");
$unControleur = new Controleur();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>MedicalCare</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<center>
    <?php
    // Si pas connecté → page de connexion
    if (!isset($_SESSION['email'])) {
        require_once("Vue/vue_connexion.php");
    }

    // Vérification du formulaire de connexion
    if (isset($_POST['Connexion'])) {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        $unUser = $unControleur->selectUser($email, $mdp);

        if ($unUser == null) {
            echo "<br> Veuillez vérifier vos identifiants.";
        } else {
            $_SESSION['user'] = $unUser;
            $_SESSION['email'] = $unUser['email'];
            $_SESSION['nom'] = $unUser['nom'];
            $_SESSION['prenom'] = $unUser['prenom'];
            $_SESSION['role'] = $unUser['role'];

            header("Location: index.php?page=1");
            exit();
        }
    }

    // Si connecté → afficher la navbar et les pages
    if (isset($_SESSION['email'])) {

        // Inclure ta navbar (composant séparé)
        require_once("Vue/Composants/vue_navbar.php");

        // Déterminer la page à charger
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        switch ($page) {
            case 1: require_once("Controleur/home.php"); break;
            case 2: require_once("Controleur/gestion_patients.php"); break;
            case 3: require_once("Controleur/gestion_medecins.php"); break;
            case 4: require_once("Controleur/gestion_prescriptions.php"); break;
            case 5: require_once("Controleur/gestion_consultations.php"); break;
            case 6:
                session_destroy();
                header("Location: index.php");
                exit();
                break;
            default:
                require_once("Controleur/error.php");
                break;
        }
    }
    ?>
</center>
</body>
</html>
