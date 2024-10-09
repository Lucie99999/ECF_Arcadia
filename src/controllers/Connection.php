<?php
namespace App\controllers;

//Chargement de l'autoload de Composer
require_once __DIR__ . '/../../vendor/autoload.php';

use PDO;

class Connection{

    public function managePostForm($form){
        if (!$form['mail'] || !$form['pwd']) {
            $_SESSION['message'] = 'Vous n\'avez pas rempli tous les éléments permettant la connexion. Veuillez vérifier et recommencer.';
            return __DIR__.'/../../templates/connection.php';
        } else {
            //On vient vérifier si un utilisateur de la base de données correspond à l'utilisateur saisi dans le formulaire de connexion.
            $statement = \Config\DbConnectionSQL::getPDO()->prepare("SELECT * FROM users WHERE email = :mail");
            $statement->bindValue(':mail', $form['mail']);
            if ($statement->execute()) {
                $user = $statement->fetch(PDO::FETCH_ASSOC);
                if($user === false) {
                    //On n'indique pas à l'utilisateur qu'il s'agit de l'email qui ne convient pas pour une question de sécurité.
                    $_SESSION['message'] = 'Identifiants invalides';
                    $_SESSION['stylesheet']="connection";
                    $_SESSION['title']="Connexion à l'espace professionnel";
                    return __DIR__.'/../../templates/connection.php';
                } else {
                    //On vérifie le hash du password.
                    if (password_verify($form['pwd'], $user['password'])) {
                        unset($user['password']);
                        $_SESSION['user'] = $user;
                        $_SESSION['stylesheet']="professionalspace";
                        $_SESSION['title']="Espace professionnel";
                        return __DIR__.'/../../templates/professionalspace.php';
                    } else {
                        $_SESSION['message'] = 'Identifiants invalides';
                        $_SESSION['stylesheet'] = "connection";
                        $_SESSION['title'] = "Connexion à l'espace professionnel";
                        return __DIR__.'/../../templates/connection.php';
                    }
                }
            } else {
                $_SESSION['message'] = 'Identifiants invalides';
                $_SESSION['stylesheet']="connection";
                $_SESSION['title']="Connexion à l'espace professionnel";
                return __DIR__.'/../../templates/connection.php';
            }
        }
    }

    public function display(){
        $_SESSION['stylesheet']="connection";
        $_SESSION['title']="Connexion à l'espace professionnel";
        return __DIR__.'/../../templates/connection.php';
    }
}
?>
