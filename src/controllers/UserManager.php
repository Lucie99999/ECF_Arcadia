<?php

namespace App\controllers;

//Chargement de l'autoload de Composer
require_once __DIR__ . '/../../vendor/autoload.php';

use PDO;

class UserManager
{
    //Méthode permettant de créer un utilisateur
    public function createUser($form){
        if (!$form['name'] || !$form['surname'] || !$form['email'] || !$form['pwd'] || ($form['role'] == 0)) {
            $_SESSION['message'] = 'Un des champs est vide, veuillez vérifier la saisie.';
            $_SESSION['stylesheet']="users";
            $_SESSION['title']="Gestion des utilisateurs";
            $_SESSION['JSstylesheet']="CRUD_user";
            return __DIR__.'/../../templates/CRUDUser.php';
        } else {
            $sql = 'INSERT INTO users(userID, name,firstname,email,password,createdAt,roleID) VALUES (UUID(),:name,:firstname,:email,:password, NOW(), :role)';
            $statement = \Config\DbConnectionSQL::getPDO()->prepare($sql);
            $statement->bindValue(':name', \Config\DbConnectionSQL::protectDbData($form['name']),PDO::PARAM_STR);
            $statement->bindValue(':firstname', \Config\DbConnectionSQL::protectDbData($form['surname']),PDO::PARAM_STR);
            $statement->bindValue(':email', \Config\DbConnectionSQL::protectDbData($form['email']),PDO::PARAM_STR);
            $statement->bindValue(':role', $form['role'],PDO::PARAM_INT);
            //On hashe le mot de passe en utilisant BCRYPT
            $statement->bindValue(':password', password_hash($form['pwd'], PASSWORD_BCRYPT));
            if ($statement->execute()) {
                $_SESSION['message'] = 'L\'utilisateur a bien été créé.';
                $_SESSION['stylesheet']="professionalspace";
                $_SESSION['title']="Espace professionnel";
                return __DIR__.'/../../templates/professionalspace.php';
            } else {
                $_SESSION['message'] = 'Impossible de créer l\'utilisateur.';
                $_SESSION['stylesheet']="users";
                $_SESSION['title']="Gestion des utilisateurs";
                $_SESSION['JSstylesheet']="CRUD_user";
                return __DIR__.'/../../templates/CRUDUser.php';
            }
        }
    }

    //Cette méthode permet d'afficher tous les utilisateurs en JSON.
    public function readAllUsers(){
        $sql='SELECT users.name AS Nom, users.firstname AS Prénom, users.email AS Email, SUBSTR(roles.name,6) AS Rôle FROM users JOIN roles ON users.roleID=roles.roleID ORDER BY Rôle, Nom';
        $statement = \Config\DbConnectionSQL::getPDO()->prepare($sql);
        if ($statement->execute()) {
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            $result=[];
            if ($users!==null){
                $array=[];
                foreach ($users as $user) {
                    array_push($array,$user['Nom'],$user['Prénom'],$user['Email'],$user['Rôle']);
                    array_push($result,$array);
                    $array=[];
                }
                return $result;
            } else {
                $_SESSION['message']='Il n\'y a pas d\'utilisateurs en base';
            }
        } else {
            $_SESSION['message']='Une erreur s\'est produite.';
        }
    }

    public function updateUser($user){

    }

    public function deleteUser($form)
    {
        if (!$form['email']) {
            $_SESSION['message'] = 'L\'email utilisateur n\'est pas renseigné,veuillez vérifier la saisie.';
            $_SESSION['stylesheet'] = "users";
            $_SESSION['title'] = "Gestion des utilisateurs";
            $_SESSION['JSstylesheet'] = "CRUD_user";
            return __DIR__ . '/../../templates/CRUDUser.php';
        } else {
            if ($form['email'] = 'jose.dupont@arcadia.fr') {
                $_SESSION['message'] = 'Vous ne pouvez pas supprimer l\'administrateur de l\'application, veuillez vérifier la saisie.';
                $_SESSION['stylesheet'] = "users";
                $_SESSION['title'] = "Gestion des utilisateurs";
                $_SESSION['JSstylesheet'] = "CRUD_user";
                return __DIR__ . '/../../templates/CRUDUser.php';
            } else {
                $sql1 = 'SELECT email FROM users WHERE email=:email';
                $sql2 = 'DELETE FROM users WHERE email=:email';
                $statement1 = \Config\DbConnectionSQL::getPDO()->prepare($sql1);
                $statement2 = \Config\DbConnectionSQL::getPDO()->prepare($sql2);
                $statement1->bindValue(':email', \Config\DbConnectionSQL::protectDbData($form['email']), PDO::PARAM_STR);
                $statement2->bindValue(':email', \Config\DbConnectionSQL::protectDbData($form['email']), PDO::PARAM_STR);
                if ($statement1->execute()) {
                    $user = $statement1->fetch(PDO::FETCH_ASSOC);
                    if ($user === false) {
                        //Si aucun utilisateur ne correspond au mail saisi, on retourne sur l'espace professionnel et on affiche un message.
                        $_SESSION['message'] = 'L\'utilisateur saisi n\'existe pas.';
                        $_SESSION['stylesheet'] = "users";
                        $_SESSION['title'] = "Gestion des utilisateurs";
                        $_SESSION['JSstylesheet'] = "CRUD_user";
                        return __DIR__ . '/../../templates/CRUDUser.php';
                    } else {
                        if ($statement2->execute()) {
                            $_SESSION['message'] = 'L\'utilisateur a bien été supprimé.';
                            $_SESSION['stylesheet'] = "professionalspace";
                            $_SESSION['title'] = "Espace professionnel";
                            return __DIR__ . '/../../templates/professionalspace.php';
                        } else {
                            $_SESSION['message'] = 'Impossible de supprimer l\'utilisateur.';
                            $_SESSION['stylesheet'] = "users";
                            $_SESSION['title'] = "Gestion des utilisateurs";
                            $_SESSION['JSstylesheet'] = "CRUD_user";
                            return __DIR__ . '/../../templates/CRUDUser.php';
                        }
                    }
                } else {
                    $_SESSION['message'] = 'Impossible de supprimer l\'utilisateur.';
                    $_SESSION['stylesheet'] = "users";
                    $_SESSION['title'] = "Gestion des utilisateurs";
                    $_SESSION['JSstylesheet'] = "CRUD_user";
                    return __DIR__ . '/../../templates/CRUDUser.php';
                }
            }
        }
    }

    public function display(){
        $_SESSION['stylesheet']="users";
        $_SESSION['title']="Gestion des utilisateurs";
        $_SESSION['JSstylesheet']="CRUD_user";
        return __DIR__.'/../../templates/CRUDUser.php';
    }

}