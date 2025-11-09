<?php
if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){

    $leMedecin = null;
    if(isset($_GET['action']) && isset($_GET['idmedecin'])){
        $action = $_GET['action'];
        $idmedecin = $_GET['idmedecin'];

        switch($action){
            case 'sup' : $unControleur->deleteMedecin($idmedecin); break;
            case 'edit' : $leMedecin = $unControleur->selectWhereMedecin($idmedecin); break;
        }
    }

    require_once("Vue/vue_insert_medecin.php");

    if(isset($_POST['Valider'])){
        $unControleur->insertMedecin($_POST);
        echo "<br> Insertion réussie du médecin <br>";
    }

    if(isset($_POST['Modifier'])){
        $unControleur->updateMedecin($_POST);
        echo "<br> Modification réussie du médecin <br>";
        header("Location: index.php?page=3");
    }
}

if(isset($_POST['Filtrer'])){
    $lesMedecins = $unControleur->selectLikeMedecins($_POST['filtre']);
} else {
    $lesMedecins = $unControleur->selectAllMedecins();
}

require_once("Vue/vue_select_medecins.php");
?>

