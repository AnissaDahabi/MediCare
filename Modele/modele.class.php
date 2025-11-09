<?php
    class Modele {
        private $unPdo;

        public function __construct()
        {
            $url = "mysql:host=mysql-medicare.alwaysdata.net;dbname=medicare_db;charset=utf8mb4";
            $user = "medicare";
            $mdp = "Anissa1624!!";

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
            $requete = "INSERT INTO Patient VALUES (null, :nom, :prenom, :adresse, :email, :tel);";
            $donnees = array(":nom"=>$tab['nom'], ":prenom"=>$tab['prenom'], ":adresse"=>$tab['adresse'], ":email"=>$tab['email'], ":tel"=>$tab['tel']);
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

        /**** Gestion des médecins ***/
        public function insertMedecin($tab){
            $requete = "INSERT INTO Medecin VALUES (null, :nom, :prenom, :email, :tel, :specialite);";
            $donnees = array(
                ":nom"=>$tab['nom'],
                ":prenom"=>$tab['prenom'],
                ":email"=>$tab['email'],
                ":tel"=>$tab['tel'],
                ":specialite"=>$tab['specialite']
            );
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }

        public function selectAllMedecins(){
            $requete = "SELECT * FROM Medecin;";
            $exec = $this->unPdo->prepare($requete);
            $exec->execute();
            return $exec->fetchAll();
        }

        public function selectLikeMedecins($filtre){
            $requete = "SELECT * FROM Medecin 
                WHERE nom LIKE :filtre 
                OR prenom LIKE :filtre 
                OR email LIKE :filtre 
                OR tel LIKE :filtre 
                OR specialite LIKE :filtre;";
            $donnees = array(":filtre"=>"%".$filtre."%");
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
            return $exec->fetchAll();
        }

        public function deleteMedecin($idmedecin){
            $requete = "DELETE FROM Medecin WHERE idmedecin = :idmedecin;";
            $donnees = array(":idmedecin"=>$idmedecin);
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }

        public function updateMedecin($tab){
            $requete = "UPDATE Medecin 
                SET nom=:nom, prenom=:prenom, email=:email, tel=:tel, specialite=:specialite 
                WHERE idmedecin=:idmedecin;";
            $donnees = array(
                ":nom"=>$tab['nom'],
                ":prenom"=>$tab['prenom'],
                ":email"=>$tab['email'],
                ":tel"=>$tab['tel'],
                ":specialite"=>$tab['specialite'],
                ":idmedecin"=>$tab['idmedecin']
            );
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }

        public function selectWhereMedecin($idmedecin){
            $requete = "SELECT * FROM Medecin WHERE idmedecin = :idmedecin;";
            $donnees = array(":idmedecin"=>$idmedecin);
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
            return $exec->fetch();
        }

        /**** Gestion des prescriptions ***/
        public function insertPrescription($tab){
            $requete = "INSERT INTO Prescription VALUES (null, :date_pres, :prescription, :idpatient, :idmedecin);";
            $donnees = array(
                ":date_pres"=>$tab['date_pres'],
                ":prescription"=>$tab['prescription'],
                ":idpatient"=>$tab['idpatient'],
                ":idmedecin"=>$tab['idmedecin']
            );
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }

        public function selectAllPrescriptions(){
            $requete = "SELECT p.idpres, p.date_pres, p.prescription, 
                       pat.nom AS nom_patient, pat.prenom AS prenom_patient, 
                       m.nom AS nom_medecin, m.prenom AS prenom_medecin
                FROM Prescription p
                INNER JOIN Patient pat ON p.idpatient = pat.idpatient
                INNER JOIN Medecin m ON p.idmedecin = m.idmedecin
                ORDER BY p.date_pres DESC;";
            $exec = $this->unPdo->prepare($requete);
            $exec->execute();
            return $exec->fetchAll();
        }

        public function selectLikePrescriptions($filtre){
            $requete = "SELECT p.idpres, p.date_pres, p.prescription, 
                       pat.nom AS nom_patient, pat.prenom AS prenom_patient, 
                       m.nom AS nom_medecin, m.prenom AS prenom_medecin
                FROM Prescription p
                INNER JOIN Patient pat ON p.idpatient = pat.idpatient
                INNER JOIN Medecin m ON p.idmedecin = m.idmedecin
                WHERE p.prescription LIKE :filtre
                   OR pat.nom LIKE :filtre
                   OR m.nom LIKE :filtre;";
            $donnees = array(":filtre"=>"%".$filtre."%");
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
            return $exec->fetchAll();
        }

        public function deletePrescription($idpres){
            $requete = "DELETE FROM Prescription WHERE idpres = :idpres;";
            $donnees = array(":idpres"=>$idpres);
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }

        public function updatePrescription($tab){
            $requete = "UPDATE Prescription 
                SET date_pres=:date_pres, prescription=:prescription, 
                    idpatient=:idpatient, idmedecin=:idmedecin 
                WHERE idpres=:idpres;";
            $donnees = array(
                ":date_pres"=>$tab['date_pres'],
                ":prescription"=>$tab['prescription'],
                ":idpatient"=>$tab['idpatient'],
                ":idmedecin"=>$tab['idmedecin'],
                ":idpres"=>$tab['idpres']
            );
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }

        public function selectWherePrescription($idpres){
            $requete = "SELECT * FROM Prescription WHERE idpres = :idpres;";
            $donnees = array(":idpres"=>$idpres);
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
            return $exec->fetch();
        }

        /**** Gestion des consultations avec horaires ****/
        public function insertConsultation($tab){
            // Insérer la consultation
            $requete = "INSERT INTO Consultation VALUES (null, :prix, :idpatient, :idmedecin);";
            $donnees = array(
                ":prix"=>$tab['prix'],
                ":idpatient"=>$tab['idpatient'],
                ":idmedecin"=>$tab['idmedecin']
            );
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);

            // Récupérer l'id de la consultation insérée
            $idconsult = $this->unPdo->lastInsertId();

            // Insérer l'horaire
            $requeteHoraire = "INSERT INTO Horaire VALUES (null, :idconsult, :debut, :fin);";
            $donneesHoraire = array(
                ":idconsult"=>$idconsult,
                ":debut"=>$tab['debut'],
                ":fin"=>$tab['fin']
            );
            $execHoraire = $this->unPdo->prepare($requeteHoraire);
            $execHoraire->execute($donneesHoraire);
        }

        public function selectAllConsultations(){
            $requete = "SELECT c.idconsult, c.prix, 
                       p.nom AS nom_patient, p.prenom AS prenom_patient, 
                       m.nom AS nom_medecin, m.prenom AS prenom_medecin,
                       h.debut, h.fin
                FROM Consultation c
                INNER JOIN Patient p ON c.idpatient = p.idpatient
                INNER JOIN Medecin m ON c.idmedecin = m.idmedecin
                INNER JOIN Horaire h ON c.idconsult = h.idconsult;";
            $exec = $this->unPdo->prepare($requete);
            $exec->execute();
            return $exec->fetchAll();
        }

        public function selectWhereConsultation($idconsult){
            $requete = "SELECT c.idconsult, c.prix, 
                       c.idpatient, c.idmedecin,
                       p.nom AS nom_patient, p.prenom AS prenom_patient, 
                       m.nom AS nom_medecin, m.prenom AS prenom_medecin,
                       h.debut, h.fin
                FROM Consultation c
                INNER JOIN Patient p ON c.idpatient = p.idpatient
                INNER JOIN Medecin m ON c.idmedecin = m.idmedecin
                INNER JOIN Horaire h ON c.idconsult = h.idconsult
                WHERE c.idconsult = :idconsult;";
            $donnees = array(":idconsult"=>$idconsult);
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
            return $exec->fetch();
        }

        public function updateConsultation($tab){
            // Mettre à jour la consultation
            $requete = "UPDATE Consultation 
                SET prix=:prix, idpatient=:idpatient, idmedecin=:idmedecin
                WHERE idconsult=:idconsult;";
            $donnees = array(
                ":prix"=>$tab['prix'],
                ":idpatient"=>$tab['idpatient'],
                ":idmedecin"=>$tab['idmedecin'],
                ":idconsult"=>$tab['idconsult']
            );
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);

            // Mettre à jour l'horaire
            $requeteHoraire = "UPDATE Horaire SET debut=:debut, fin=:fin WHERE idconsult=:idconsult;";
            $donneesHoraire = array(
                ":debut"=>$tab['debut'],
                ":fin"=>$tab['fin'],
                ":idconsult"=>$tab['idconsult']
            );
            $execHoraire = $this->unPdo->prepare($requeteHoraire);
            $execHoraire->execute($donneesHoraire);
        }

        public function deleteConsultation($idconsult){
            // La suppression cascade supprimera automatiquement l'horaire
            $requete = "DELETE FROM Consultation WHERE idconsult=:idconsult;";
            $donnees = array(":idconsult"=>$idconsult);
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }

        public function selectLikeConsultations($filtre){
            $requete = "SELECT c.idconsult, c.prix, 
                       p.nom AS nom_patient, p.prenom AS prenom_patient, 
                       m.nom AS nom_medecin, m.prenom AS prenom_medecin,
                       h.debut, h.fin
                FROM Consultation c
                INNER JOIN Patient p ON c.idpatient = p.idpatient
                INNER JOIN Medecin m ON c.idmedecin = m.idmedecin
                INNER JOIN Horaire h ON c.idconsult = h.idconsult
                WHERE p.nom LIKE :filtre OR m.nom LIKE :filtre;";
            $donnees = array(":filtre"=>"%".$filtre."%");
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
            return $exec->fetchAll();
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