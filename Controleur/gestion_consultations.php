<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
    $laConsultation = null;

    // Actions édition / suppression
    if (isset($_GET['action']) && isset($_GET['idconsult'])) {
        $action = $_GET['action'];
        $idconsult = $_GET['idconsult'];

        switch ($action) {
            case 'sup':
                $unControleur->deleteConsultation($idconsult);
                header("Location: index.php?page=5"); // redirection après suppression
                exit;
            case 'edit':
                $laConsultation = $unControleur->selectWhereConsultation($idconsult);
                break;
        }
    }

    // Récupérer les patients et médecins pour le formulaire
    $lesPatients = $unControleur->selectAllPatients();
    $lesMedecins = $unControleur->selectAllMedecins();

    // Traitement du formulaire
    if (isset($_POST['Valider'])) {
        $unControleur->insertConsultation($_POST);
        header("Location: index.php?page=5"); // redirection après insertion
        exit;
    }

    if (isset($_POST['Modifier'])) {
        $unControleur->updateConsultation($_POST);
        header("Location: index.php?page=5"); // redirection après modification
        exit;
    }

    // Afficher le formulaire d'insertion / modification
    require_once("Vue/vue_insert_consultation.php");
}

// Filtrage / affichage des consultations
if (isset($_POST['Filtrer'])) {
    $lesConsultations = $unControleur->selectLikeConsultations($_POST['filtre']);
} else {
    $lesConsultations = $unControleur->selectAllConsultations();
}

// Affichage du tableau des consultations
require_once("Vue/vue_select_consultations.php");
?>
