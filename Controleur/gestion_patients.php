<?php
if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){

    $lePatient = null;
    if(isset($_GET['action']) && isset($_GET['idpatient'])){
        $action = $_GET['action'];
        $idpatient = $_GET['idpatient'];

        switch($action){
            case 'sup' : $unControleur->deletePatient($idpatient); break;
            case 'edit' : $lePatient = $unControleur->selectWherePatient($idpatient); break;
        }
    }
    require_once("Vue/vue_insert_patient.php");
    if(isset($_POST['Valider'])){
        $unControleur->insertPatient($_POST);
        echo "<br> Insertion réussie du patient <br>";
    }

    if(isset($_POST['Modifier'])){
        $unControleur->updatePatient($_POST);
        echo "<br> Modification réussie du patient <br>";
        //recharger la page
        header("Location: index.php?page=2");
    }
}

if(isset($_POST['Filtrer'])){
    $lesPatients = $unControleur->selectLikePatients($_POST['filtre']);
} else {
    $lesPatients = $unControleur->selectAllPatients();
}
require_once("Vue/vue_select_patients.php");
?>
