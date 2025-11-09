<?php
require_once("Modele/modele.class.php");

class Controleur
{
    private $unModele;

    public function __construct()
    {
        $this->unModele = new Modele();
    }

    /**** Gestion des patients ****/
    public function insertPatient($tab)
    {
        //Controller les données

        //Appel du modèle
        $this->unModele->insertPatient($tab);
    }

    public function selectAllPatients()
    {
        return $this->unModele->selectAllPatients();
    }

    public function selectLikePatients($filtre)
    {
        return $this->unModele->selectLikePatients($filtre);
    }

    public function deletePatient($idpatient)
    {
        //controler d'abord que le client existe

        //si il existe on supprime
        $this->unModele->deletePatient($idpatient);
    }

    public function updatePatient($tab)
    {
        //controler les données
        $this->unModele->updatePatient($tab);
    }

    public function selectWherePatient($idpatient)
    {
        return $this->unModele->selectWherePatient($idpatient);
    }

    /**** Gestion des médecins ****/
    public function insertMedecin($tab)
    {
        // Contrôler les données
        $this->unModele->insertMedecin($tab);
    }

    public function selectAllMedecins()
    {
        return $this->unModele->selectAllMedecins();
    }

    public function selectLikeMedecins($filtre)
    {
        return $this->unModele->selectLikeMedecins($filtre);
    }

    public function deleteMedecin($idmedecin)
    {
        $this->unModele->deleteMedecin($idmedecin);
    }

    public function updateMedecin($tab)
    {
        $this->unModele->updateMedecin($tab);
    }

    public function selectWhereMedecin($idmedecin)
    {
        return $this->unModele->selectWhereMedecin($idmedecin);
    }

    /**** Gestion des prescriptions ****/
    public function insertPrescription($tab)
    {
        $this->unModele->insertPrescription($tab);
    }

    public function selectAllPrescriptions()
    {
        return $this->unModele->selectAllPrescriptions();
    }

    public function selectLikePrescriptions($filtre)
    {
        return $this->unModele->selectLikePrescriptions($filtre);
    }

    public function deletePrescription($idpres)
    {
        $this->unModele->deletePrescription($idpres);
    }

    public function updatePrescription($tab)
    {
        $this->unModele->updatePrescription($tab);
    }

    public function selectWherePrescription($idpres)
    {
        return $this->unModele->selectWherePrescription($idpres);
    }

    /**** Gestion des consultations ****/
    public function insertConsultation($tab)
    {
        $this->unModele->insertConsultation($tab);
    }

    public function selectAllConsultations()
    {
        return $this->unModele->selectAllConsultations();
    }

    public function selectLikeConsultations($filtre)
    {
        return $this->unModele->selectLikeConsultations($filtre);
    }

    public function deleteConsultation($idconsult)
    {
        $this->unModele->deleteConsultation($idconsult);
    }

    public function updateConsultation($tab)
    {
        $this->unModele->updateConsultation($tab);
    }

    public function selectWhereConsultation($idconsult)
    {
        return $this->unModele->selectWhereConsultation($idconsult);
    }




    /**** Gestion de la connexion ****/
    public function selectUser($email, $mdp){
        //Controler email et mdp
        return $this->unModele->selectUser($email, $mdp);
    }
}
