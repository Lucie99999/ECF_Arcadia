<?php

//Chargement de l'autoload de Composer
require 'vendor/autoload.php';

use MongoDB\Driver\ServerApi;

try {

    //Définition de l'uri pour se connecter à MongoDB
    $uri = 'mongodb+srv://luciesaurel3:xiDgej-vidwoq-wardi8@ecfarcadiastudi.aabmp.mongodb.net/?retryWrites=true&w=majority&appName=ECFArcadiaStudi';

    // Set the version of the Stable API on the client
    $apiVersion = new ServerApi(ServerApi::V1);

    //Utilisation du client MongoDB pour se connecter à la base noSQL
    $client = new MongoDB\Client($uri, [], ['serverApi' => $apiVersion]);

    // Sélection de la base de données
    $db = $client->selectDatabase("ECFArcadia");

    //On démarre une session si elle n'est pas active.
    if (session_status() === 1) {
        session_start();
    }

} catch (Exception $e) {
    echo 'Exception :'.$e->getMessage();
}


