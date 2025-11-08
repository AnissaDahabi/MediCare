<?php
    class Modele {
        private $unPdo;

        public function __construct()
        {
            $url = "mysql:host=mysql-medicare.alwaysdata.net;dbname=medicare_db;charset=utf8mb4";
            $user = "medicare";
            $mdp = "";

            try {
                $this->unPdo = new PDO($url, $user, $mdp);
                $this->unPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exp) {
                echo "<br> Erreur de connexion à " . $url;
                echo $exp->getMessage();
            }
        }

        /**** Gestion des patients ***/
        public function insertPatient($tab){
            $requete = "INSERT INTO Patient VALUES (null, :nom, :prenom, :adresse, :email, :tel, :role);";
            $donnees = array(":nom"=>$tab['nom'], ":prenom"=>$tab['prenom'], ":adresse"=>$tab['adresse'], ":email"=>$tab['email'], ":tel"=>$tab['tel'], ":role"=>$tab['role']
                );
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }

        public function selectAllPatients(){
            $requete = "SELECT * FROM Patient;";
            $exec = $this->unPdo->prepare($requete);
            $exec->execute();
            return $exec->fetchAll();
        }

        public function selectLikePatients($filtre){
            $requete = "SELECT * FROM Patient WHERE nom like :filtre OR prenom like :filtre OR email like :filtre OR adresse like :filtre OR tel like :filtre;";
            $donnees = array(":filtre"=>"%".$filtre."%");
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
            return $exec->fetchAll();
        }

        public function deletePatient($idpatient){
            $requete = "DELETE FROM Patient WHERE idpatient = :idpatient;";
            $donnees = array(":idpatient"=>$idpatient);
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }

        public function updatePatient($tab){
            $requete = "UPDATE Patient SET nom=:nom, prenom=:prenom, adresse=:adresse, email=:email, tel=:tel WHERE idclient=:idclient;";
            $donnees = array(":nom"=>$tab["nom"], ":prenom"=>$tab["prenom"], ":email"=>$tab["email"], ":adresse"=>$tab["adresse"], ":tel"=>$tab["tel"], ":idclient"=>$tab["idclient"]);
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }

        public function selectWherePatient($idpatient){
            $requete = "SELECT * FROM Patient WHERE idpatient = :idpatient;";
            $donnees = array(":idpatient"=>$idpatient);
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
            return $exec->fetch();
        }

        /**** Gestion de la connexion ****/
        public function selectUser ($email, $mdp){
            $requete ="select * from User where email =:email and mdp = :mdp; ";
            $donnees = array(":email"=>$email, ":mdp"=>$mdp);
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
            return $exec->fetch();
        }

    }
