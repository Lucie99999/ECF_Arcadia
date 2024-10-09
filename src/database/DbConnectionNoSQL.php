<?php

namespace Config;

use MongoDB;
use Exception;

class DbConnectionNoSQL
{
    //Définition de l'uri pour se connecter à MongoDB
    const URI = 'mongodb+srv://luciesaurel3:xiDgej-vidwoq-wardi8@ecfarcadiastudi.aabmp.mongodb.net/?retryWrites=true&w=majority&appName=ECFArcadiaStudi';

    static $db = null;
    /*
    - Méthode permettant de définir la connexion à la base de données MongoDB
    */
    public static function getDB()
    {
        try {
            if (self::$db !== null){
                return self::$db;
            } else {
                //Utilisation du client MongoDB pour se connecter à la base noSQL
                $client = new MongoDB\Client(self::URI);
                // Sélection de la base de données
                self::$db = $client->selectDatabase("ECFArcadia");
                return self::$db;
            }
        } catch (Exception $e) {
            $_SESSION['message']='Erreur de connexion à la base de données : ' . $e->getMessage();
            header('location: ../index.php');
        }
    }

    /*Méthode permettant de protéger les données saisies en base de données*/
    public static function protectDbData($value){

        $value=htmlspecialchars($value);
        $value=strip_tags($value);

        return $value;
    }
}