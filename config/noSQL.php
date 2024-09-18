<?php

//Chargement de l'autoload de Composer
require 'vendor/autoload.php';

try {

    //Définition de l'uri pour se connecter à MongoDB
    $uri = 'mongodb+srv://luciesaurel3:xiDgej-vidwoq-wardi8@ecfarcadiastudi.aabmp.mongodb.net/?retryWrites=true&w=majority&appName=ECFArcadiaStudi';

    //Utilisation du client MongoDB pour se connecter à la base noSQL
    $client = new MongoDB\Client($uri);

    // Sélection de la base de données
    $db = $client->selectDatabase("ECFArcadia");

    //On démarre une session si elle n'est pas active.
    if (session_status() === 1) {
        session_start();
    }

} catch (Exception $e) {
    echo 'Exception :'.$e->getMessage();
}


