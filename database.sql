-- Création de la base de données

CREATE DATABASE lsaurel_ecfarcadia;

-- Utilisation de cette base de données

USE lsaurel_ecfarcadia;

-- Création de la table "roles" pour stocker les informations liées aux rôles

CREATE TABLE roles(
    roleID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

-- Création de la table "races" pour stocker les informations liées aux races animales

CREATE TABLE races(
    raceID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

-- Création de la table "services" pour stocker les informations liées aux services

CREATE TABLE services(
    serviceID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL
);

-- Création de la table "habitats" pour stocker les informations des habitats

CREATE TABLE habitats(
    habitatID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    commentHabitat TEXT,
    createdAt DATETIME NOT NULL,
    updatedAt DATETIME
);

-- Création de la table "animals" pour stocker les informations liées aux animaux

CREATE TABLE animals(
    animalID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    surname VARCHAR(50) NOT NULL,
    raceID INT(11) NOT NULL,
    habitatID INT(11) NOT NULL,
    createdAt DATETIME NOT NULL,
    updatedAt DATETIME,
    FOREIGN KEY (raceID) REFERENCES races(raceID),
    FOREIGN KEY (habitatID) REFERENCES habitats(habitatID)
);

-- Création de la table "servings" pour stocker les informations liées aux portions alimentaires

CREATE TABLE servings(
    servingID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    foodName VARCHAR(50) NOT NULL,
    weight INT(11) NOT NULL,
    givenAt DATETIME NOT NULL,
    animalID INT(11) NOT NULL,
    FOREIGN KEY (animalID) REFERENCES animals(animalID)
);

-- Création de la table "pictures" pour stocker les informations liées aux images

CREATE TABLE pictures(
    pictureID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    path VARCHAR(250) NOT NULL,
    animalID INT(11),
    habitatID INT(11),
    serviceID INT(11),
    FOREIGN KEY (animalID) REFERENCES animals(animalID),
    FOREIGN KEY (habitatID) REFERENCES habitats(habitatID),
    FOREIGN KEY (serviceID) REFERENCES services(serviceID)
);

-- Création de la table "users" pour stocker les informations des utilisateurs

CREATE TABLE users(
                      userID CHAR(36) NOT NULL PRIMARY KEY,
                      name VARCHAR(50) NOT NULL,
                      firstname VARCHAR(50) NOT NULL,
                      email VARCHAR(50) NOT NULL UNIQUE,
                      password VARCHAR(60) NOT NULL,
                      createdAt DATETIME NOT NULL,
                      updatedAT DATETIME,
                      roleID INT(11) NOT NULL,
                      FOREIGN KEY (roleID) REFERENCES roles(roleID)
);

-- Création de la table "reports" pour stocker les informations liées aux rapports vétérinaires

CREATE TABLE reports(
                        reportID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        stateAnimal VARCHAR(50) NOT NULL,
                        foodSuggestion TEXT NOT NULL,
                        visitDate DATETIME NOT NULL,
                        detailStateAnimal TEXT NOT NULL,
                        animalID INT(11) NOT NULL,
                        userID CHAR(36) NOT NULL,
                        FOREIGN KEY (animalID) REFERENCES animals(animalID),
                        FOREIGN KEY (userID) REFERENCES users(userID)
);

-- On crée un utilisateur de base de données pour cette base de données.

--CREATE USER 'user_php'@'localhost' IDENTIFIED BY 'S*EN*JHJ3ne-zJ@_';

-- On attribue à l'utilisateur des droits d'accès sur la table "users" de notre base de données.

--GRANT SELECT, INSERT, UPDATE, DELETE ON ArcadiaZooBDD.users TO 'user_php'@'localhost';

-- On attribue à l'utilisateur des droits d'accès sur la table "roles" de notre base de données.
--GRANT SELECT ON ArcadiaZooBDD.roles TO 'user_php'@'localhost';

-- On attribue à l'utilisateur des droits d'accès sur la table "races" de notre base de données.
--GRANT SELECT, INSERT, UPDATE, DELETE ON ArcadiaZooBDD.races TO 'user_php'@'localhost';

-- On attribue à l'utilisateur des droits d'accès sur la table "habitats" de notre base de données.
--GRANT SELECT ON ArcadiaZooBDD.habitats TO 'user_php'@'localhost';

-- On insère des données dans la table "roles".

INSERT INTO roles(name) VALUES
    ('ROLE_ADMIN'),
    ('ROLE_VETERINAIRE'),
    ('ROLE_EMPLOYE');

-- On insère des données dans la table "habitats".

INSERT INTO habitats(name,description,createdAt) VALUES
    ('savane','Dans cette vaste plaine de 2 hectares, viens à la rencontre des animaux les plus emblématiques d’Afrique (girafes, lions, zèbres,...)',DATE(NOW())),
    ('jungle','Dans cet espace, tu partiras à la découverte d’espèces jamais vues en Europe! Anaconda, toucan, mille-pattes géant et plein d’autres animaux t’attendent !',DATE(NOW())),
    ('marais','Viens découvrir les espèces qui peuplent nos marais (alligator d’Amérique, grue, caïman, salamandres...)',DATE(NOW()));

-- On insère des données dans la table "services".

INSERT INTO services(name, description) VALUES
    ('restauration','Un espace restauration vous permettra de vous détendre en famille pour le déjeuner ou le goûter'),
    ('visite des habitats avec un guide (gratuit)','Un guide vous explique toutes les conditions pour survivre dans chaque habitat. Les horaires des visites sont disponibles à l’entrée du parc.'),
    ('visite du zoo en petit train','Notre petit train vous fait faire le tour du parc en 1h avec audioguide. Le point de rendez-vous se situe devant l’enclos des girafes.');


