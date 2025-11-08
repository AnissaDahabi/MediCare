DROP DATABASE IF EXISTS CareDb;
CREATE DATABASE CareDb;
USE CareDb;

CREATE TABLE Patient (
                         idpatient INT(5) NOT NULL AUTO_INCREMENT,
                         nom VARCHAR(50) NOT NULL,
                         prenom VARCHAR(50) NOT NULL,
                         email VARCHAR(100) NOT NULL UNIQUE,
                         adresse VARCHAR(100),
                         tel VARCHAR(50),
                         PRIMARY KEY (idpatient)
);

CREATE TABLE Medecin (
                         idmedecin INT(5) NOT NULL AUTO_INCREMENT,
                         nom VARCHAR(50) NOT NULL,
                         prenom VARCHAR(50) NOT NULL,
                         email VARCHAR(50) NOT NULL UNIQUE,
                         tel VARCHAR(50),
                         specialite VARCHAR(50),
                         PRIMARY KEY (idmedecin)
);

CREATE TABLE Prescription (
                              idpres INT(5) NOT NULL AUTO_INCREMENT,
                              date_pres DATE NOT NULL,
                              prescription TEXT NOT NULL,
                              idpatient INT(5) NOT NULL,
                              idmedecin INT(5) NOT NULL,
                              PRIMARY KEY (idpres),
                              FOREIGN KEY (idpatient) REFERENCES Patient(idpatient) ON DELETE CASCADE ON UPDATE CASCADE,
                              FOREIGN KEY (idmedecin) REFERENCES Medecin(idmedecin) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Consultation (
                              idconsult INT(5) NOT NULL AUTO_INCREMENT,
                              prix FLOAT,
                              idpatient INT(5) NOT NULL,
                              idmedecin INT(5) NOT NULL,
                              PRIMARY KEY (idconsult),
                              FOREIGN KEY (idpatient) REFERENCES Patient(idpatient) ON DELETE CASCADE ON UPDATE CASCADE,
                              FOREIGN KEY (idmedecin) REFERENCES Medecin(idmedecin) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Horaire (
                         idhoraire INT(5) NOT NULL AUTO_INCREMENT,
                         idconsult INT(5) NOT NULL,
                         debut DATETIME NOT NULL,
                         fin DATETIME NOT NULL,
                         PRIMARY KEY (idhoraire),
                         FOREIGN KEY (idconsult) REFERENCES Consultation(idconsult) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE User (
                      iduser INT(5) NOT NULL AUTO_INCREMENT,
                      nom VARCHAR(50) NOT NULL,
                      prenom VARCHAR(50) NOT NULL,
                      email VARCHAR(50) NOT NULL UNIQUE,
                      mdp VARCHAR(255) NOT NULL,
                      role ENUM('admin', 'user') NOT NULL,
                      PRIMARY KEY (iduser)
);

INSERT INTO Patient (nom, prenom, email, adresse, tel)
VALUES
    ('Dupont','Marie','marie.dupont@gmail.com','12 rue Victor Hugo, Paris','0601020304'),
    ('Martin','Lucas','lucas.martin@gmail.com','25 avenue de la République, Lyon','0605060708');

INSERT INTO Medecin (nom, prenom, email, tel, specialite)
VALUES
    ('Durand','Sophie','sophie.durand@hopital.fr','0612345678','Cardiologue'),
    ('Leclerc','Antoine','antoine.leclerc@hopital.fr','0698765432','Généraliste');

INSERT INTO Prescription (date_pres, prescription, idpatient, idmedecin)
VALUES
    ('2025-11-07','Prendre 1 comprimé de paracétamol 3 fois par jour.',1,2);

INSERT INTO Consultation (prix, idpatient, idmedecin)
VALUES
    (50.00, 1, 2);

INSERT INTO Horaire (idconsult, debut, fin)
VALUES
    (1,'2025-11-08 10:00:00','2025-11-08 10:30:00'),
    (1,'2025-11-09 10:00:00','2025-11-09 10:30:00'),
    (1,'2025-11-10 10:00:00','2025-11-10 10:30:00');
