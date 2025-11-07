DROP DATABASE IF EXISTS CareDb;
CREATE DATABASE CareDb;
USE CareDb;

CREATE TABLE Patient (
    idpatient int(5) not null auto_increment,
    nom varchar(50),
    prenom varchar(50),
    email varchar(100),
    adresse varchar(100),
    tel varchar(50),
    role ENUM('patient', 'admin') DEFAULT 'patient',
    PRIMARY KEY (idpatient)
);

CREATE TABLE Medecin (
    idmedecin int(5) not null auto_increment,
    nom varchar(50),
    prenom varchar(50),
    email varchar(50),
    tel varchar(50),
    specialite varchar(50),
    role ENUM('medecin', 'admin') DEFAULT 'medecin',
    PRIMARY KEY (idmedecin)
);

CREATE TABLE Prescription (
    idpres int(5) not null auto_increment,
    date_pres date,
    prescription text,
    idpatient int(5) not null,
    idmedecin int(5) not null,
    PRIMARY KEY (idpres),
    FOREIGN KEY (idpatient) REFERENCES Patient(idpatient),
    FOREIGN KEY (idmedecin) REFERENCES Medecin(idmedecin)
);

CREATE TABLE Consultation (
    idconsult int(5) not null auto_increment,
    date_consult date not null,
    prix float,
    idmedecin int(5) not null,
    idpatient int(5) not null,
    PRIMARY KEY (idconsult),
    FOREIGN KEY (idpatient) REFERENCES Patient(idpatient),
    FOREIGN KEY (idmedecin) REFERENCES Medecin(idmedecin)
);

CREATE TABLE Horaire (
    idhoraire int(5) not null auto_increment,
    idconsult int(5) not null,
    debut datetime not null,
    fin datetime not null,
    PRIMARY KEY (idhoraire),
    FOREIGN KEY (idconsult) REFERENCES Consultation(idconsult)
);

-- insertion --
INSERT INTO Patient (nom, prenom, email, adresse, tel, role)
VALUES
    ('Dupont', 'Marie', 'marie.dupont@gmail.com', '12 rue Victor Hugo, Paris', '0601020304', 'patient'),
    ('Martin', 'Lucas', 'lucas.martin@gmail.com', '25 avenue de la République, Lyon', '0605060708', 'patient');

INSERT INTO Medecin (nom, prenom, email, specialite, role)
VALUES
    ('Durand', 'Sophie', 'sophie.durand@hopital.fr', 'Cardiologue', 'medecin'),
    ('Leclerc', 'Antoine', 'antoine.leclerc@hopital.fr', 'Généraliste', 'medecin');

INSERT INTO Prescription (date_prescription, prescription, idpatient, idmedecin)
VALUES
    ('2025-11-07', 'Prendre 1 comprimé de paracétamol 3 fois par jour.', 1, 2);

INSERT INTO Consultation (date_consult, prix, idmedecin, idpatient)
VALUES
    ('2025-11-08', 50.00, 2, 1);

INSERT INTO Horaire (idconsult, debut, fin)
VALUES
    (1, '2025-11-08 10:00:00', '2025-11-08 10:30:00');

INSERT INTO Horaire (idconsult, debut, fin)
VALUES
    (1, '2025-11-09 10:00:00', '2025-11-09 10:30:00'),
    (1, '2025-11-10 10:00:00', '2025-11-10 10:30:00');
