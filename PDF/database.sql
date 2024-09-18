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
    animalID INT(11) DEFAULT NULL,
    habitatID INT(11) DEFAULT NULL,
    serviceID INT(11) DEFAULT NULL,
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

-- On aurait pu créer manuellement un utilisateur de base de données pour cette base de données.

CREATE USER 'lsaurel_ecf' IDENTIFIED BY 'S*EN*JHJ3ne-zJ@';

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

-- On insère des données dans la table "pictures".

INSERT INTO pictures(title, path, habitatID) VALUES
    ('savane1','./assets/pictures/savane/pexels-rachel-claire-4846091.jpg',1),
    ('savane2','./assets/pictures/savane/pexels-490714164-28157156.jpg',1),
    ('savane3','./assets/pictures/savane/pexels-magda-ehlers-pexels-3844917.jpg',1);

INSERT INTO pictures(title, path, habitatID) VALUES
    ('jungle1','./assets/pictures/jungle/pexels-ch1276-540006.jpg',2),
    ('jungle2','./assets/pictures/jungle/pexels-christopher-borges-1300281899-27295751.jpg',2),
    ('jungle3','./assets/pictures/jungle/pexels-davidriano-975771.jpg',2),
    ('jungle4','./assets/pictures/jungle/pexels-lichtblick800-27520012.jpg',2);

INSERT INTO pictures(title, path, habitatID) VALUES
    ('marais1','./assets/pictures/marais/pexels-vicki-hess-372578-1000069.jpg',3),
    ('marais2','./assets/pictures/marais/pexels-adam-sondel-381265-3923270.jpg',3),
    ('marais3','./assets/pictures/marais/pexels-chris-f-38966-27367121.jpg',3),
    ('marais4','./assets/pictures/marais/pexels-dibert-635622.jpg',3),
    ('marais5','./assets/pictures/marais/pexels-ivanhdz-27638369.jpg',3);

INSERT INTO pictures(title,path,serviceID) VALUES
    ('restaurant1','./assets/pictures/restauration/pexels-igor-starkov-233202-799869.jpg',1),
    ('restaurant2','./assets/pictures/restauration/pexels-valeriya-1199957.jpg',1);

INSERT INTO pictures(title,path,serviceID) VALUES
    ('guide1','./assets/pictures/visite_guidee/pexels-loquellano-17087507.jpg',2);

INSERT INTO pictures(title,path,serviceID) VALUES
    ('train1','./assets/pictures/petit_train/pexels-umutdagli-22607722.jpg',3);

-- On insère des données dans la table races.
INSERT INTO races(name) VALUES
    ('zèbre'),('girafe'),('loutre'),('anaconda'),('toucan'),('jaguar'),('lion');

--On insère des données dans la table animals.
INSERT INTO animals(surname, raceID, habitatID, createdAt) VALUES
    ('Titi',1,1,NOW()),
    ('Léon',2,1,NOW()),
    ('Gepetto',3,3,NOW()),
    ('Khan',4,2,NOW()),
    ('Touk',5,2,NOW()),
    ('Scar',6,2,NOW()),
    ('Mufasa',7,1,NOW()),
    ('Sophie',2,1,NOW()),
    ('Flore',2,1,NOW());

--On modifie la table pictures en ajoutant la colonne raceID.
ALTER TABLE pictures
    ADD raceID INT(11) DEFAULT NULL,
ADD FOREIGN KEY (raceID) REFERENCES races(raceID);

--On insère des données dans la table pictures.
INSERT INTO pictures(title,path,raceID) VALUES
    ('girafe1','./assets/pictures/girafes/pexels-pixabay-38534.jpg',2),
    ('girafe2','./assets/pictures/girafes/pexels-roger-brown-3435524-5715513.jpg',2),
    ('girafe3','./assets/pictures/girafes/pexels-jdgromov-7101150.jpg',2),
    ('girafe4','./assets/pictures/girafes/pexels-alasdair-braxton-621739-2251446.jpg',2),
    ('girafefond','./assets/pictures/girafes/fond-pexels-nextvoyage-1210642.jpg',2);

INSERT INTO pictures(title,path,raceID) VALUES
    ('zebra1','./assets/pictures/zebras/pexels-padrinan-14379556.jpg',1),
    ('zebra2','./assets/pictures/zebras/pexels-creative-vix-7299.jpg',1),
    ('zebra3','./assets/pictures/zebras/pexels-mikhail-nilov-7710559.jpg',1);

INSERT INTO pictures(title,path,raceID) VALUES
    ('otter1','./assets/pictures/otters/pexels-luke-seago-20457134-12227431.jpg',3),
    ('otter2','./assets/pictures/otters/pexels-pixabay-53510.jpg',3);

INSERT INTO pictures(title,path,raceID) VALUES
    ('anaconda1','./assets/pictures/anacondas/pexels-soubhagya23-4063745.jpg',4);

INSERT INTO pictures(title,path,raceID) VALUES
    ('toucan1','./assets/pictures/toucans/pexels-tiagolinobr-4468188.jpg',5);

INSERT INTO pictures(title,path,raceID) VALUES
    ('jaguar1','./assets/pictures/jaguars/pexels-nicknunezv-7327452.jpg',6),
    ('jaguar2','./assets/pictures/jaguars/pexels-yigithan02-773004.jpg',6);

INSERT INTO pictures(title,path,raceID) VALUES
    ('lion1','./assets/pictures/lions/pexels-goran-vrakela-64248-615277.jpg',7),
    ('lion2','./assets/pictures/lions/pexels-anntarazevich-6796883.jpg',7);

--On insère des données dans la table races.
INSERT INTO races(name) VALUES ('alligator'),('heron'),('salamander');

--On insère des données dans la table pictures.
INSERT INTO pictures(title,path,raceID) VALUES
    ('alligator1','./assets/pictures/alligators/pexels-mariacamila-7346730.jpg',8),
    ('heron1','./assets/pictures/herons/pexels-rzierik-3912764.jpg',9),
    ('salamander1','./assets/pictures/salamanders/pexels-mikolaj-kolodziejczyk-2377168-4102897.jpg',10);









