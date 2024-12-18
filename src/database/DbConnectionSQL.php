<?php

namespace Config;

use PDO;
use PDOException;

class DbConnectionSQL
{
    const DSN = 'mysql:host=mysql-lsaurel.alwaysdata.net;dbname=lsaurel_ecfarcadia';
    const USER = 'lsaurel_ecf';
    const PASSWORD = 'S*EN*JHJ3ne-zJ@';

    static $pdo = null;

    /*
    - Méthode permettant de définir la connexion à la base de données AlwaysData
    - Méthode Singleton : permet d'instancier la variable self::$pdo une et une seule fois et
    de s'en reservir sans avoir à la redéfinir à chaque fois.
    */
    public static function getPDO()
    {
        try {
            //On évite des connexions multiples à la base de données.
            if (self::$pdo !== null) {
                return self::$pdo;
            } else {
            self::$pdo = new PDO(self::DSN, self::USER, self::PASSWORD);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
            return self::$pdo;
            }
        } catch (PDOException $e) {
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