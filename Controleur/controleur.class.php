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


    /**** Gestion de la connexion ****/
    public function selectUser($email, $mdp){
        //Controler email et mdp
        return $this->unModele->selectUser($email, $mdp);
    }
}
