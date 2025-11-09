<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
    $laPrescription = null;

    // Actions édition / suppression
    if (isset($_GET['action']) && isset($_GET['idpres'])) {
        $action = $_GET['action'];
        $idpres = $_GET['idpres'];

        switch ($action) {
            case 'sup':
                $unControleur->deletePrescription($idpres);
                header("Location: index.php?page=4"); // redirection après suppression
                exit;
            case 'edit':
                $laPrescription = $unControleur->selectWherePrescription($idpres);
                break;
        }
    }

    // Récupérer les patients et médecins pour le formulaire
    $lesPatients = $unControleur->selectAllPatients();
    $lesMedecins = $unControleur->selectAllMedecins();

    // Traitement du formulaire
    if (isset($_POST['Valider'])) {
        $unControleur->insertPrescription($_POST);
        header("Location: index.php?page=4"); // redirection après insertion
        exit;
    }

    if (isset($_POST['Modifier'])) {
        $unControleur->updatePrescription($_POST);
        header("Location: index.php?page=4"); // redirection après modification
        exit;
    }

    // Afficher le formulaire d'insertion / modification
    require_once("Vue/vue_insert_prescription.php");
}

// Filtrage / affichage des prescriptions
if (isset($_POST['Filtrer'])) {
    $lesPrescriptions = $unControleur->selectLikePrescriptions($_POST['filtre']);
} else {
    $lesPrescriptions = $unControleur->selectAllPrescriptions();
}

// Affichage du tableau des prescriptions
require_once("Vue/vue_select_prescriptions.php");
?>
