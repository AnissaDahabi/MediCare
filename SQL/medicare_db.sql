DROP DATABASE IF EXISTS medicare_db;
CREATE DATABASE medicare_db;
USE medicare_db;

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
