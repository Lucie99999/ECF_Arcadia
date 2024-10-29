<?php

namespace App\controllers;

//Chargement de l'autoload de Composer
require_once __DIR__ . '/../../vendor/autoload.php';

use PDO;

class UserManager
{
    //Méthode permettant de créer un utilisateur
    public function createUser($form)
    {
        //Si un des champs du formulaire est vide.
        if (!$form['name'] || !$form['surname'] || !$form['email'] || !$form['pwd'] || ($form['role'] == "*")) {
            $_SESSION['message'] = 'Un des champs est vide, veuillez vérifier la saisie.';
            $_SESSION['stylesheet'] = "users";
            $_SESSION['title'] = "Gestion des utilisateurs";
            $_SESSION['JSstylesheet'] = "CRUD_user";
            return __DIR__ . '/../../templates/CRUDUser.php';
        } else {
            //On vérifie ensuite si l'utilisateur saisi existe en base de données.
            $sql1 = 'SELECT email FROM users WHERE email=:email';
            $statement1 = \Config\DbConnectionSQL::getPDO()->prepare($sql1);
            $statement1->bindValue(':email', \Config\DbConnectionSQL::protectDbData($form['email']), PDO::PARAM_STR);
            if ($statement1->execute()) {
                $user = $statement1->fetch(PDO::FETCH_ASSOC);
                if ($user !== false) {
                    //Si un utilisateur correspond au mail saisi, on retourne sur la page de choix liée à l'utilisateur et on affiche un message.
                    $_SESSION['message'] = 'L\'utilisateur saisi existe déjà, veuillez corriger votre saisie.';
                    $_SESSION['stylesheet'] = "users";
                    $_SESSION['title'] = "Gestion des utilisateurs";
                    $_SESSION['JSstylesheet'] = "CRUD_user";
                    return __DIR__ . '/../../templates/CRUDUser.php';
                } else {
                    //Si l'utilisateur n'existe pas, alors on peut procéder à son insertion en base de données.
                    $sql2 = 'INSERT INTO users(userID, name,firstname,email,password,createdAt,roleID) VALUES (UUID(),:name,:firstname,:email,:password, NOW(), :role)';
                    $statement2 = \Config\DbConnectionSQL::getPDO()->prepare($sql2);
                    $statement2->bindValue(':name', \Config\DbConnectionSQL::protectDbData($form['name']), PDO::PARAM_STR);
                    $statement2->bindValue(':firstname', \Config\DbConnectionSQL::protectDbData($form['surname']), PDO::PARAM_STR);
                    $statement2->bindValue(':email', \Config\DbConnectionSQL::protectDbData($form['email']), PDO::PARAM_STR);
                    $statement2->bindValue(':role', $form['role'], PDO::PARAM_INT);
                    //On hashe le mot de passe en utilisant BCRYPT
                    $statement2->bindValue(':password', password_hash($form['pwd'], PASSWORD_BCRYPT));
                    if ($statement2->execute()) {
                        $_SESSION['message'] = 'L\'utilisateur a bien été créé.';
                        $_SESSION['stylesheet'] = "professionalspace";
                        $_SESSION['title'] = "Espace professionnel";
                        return __DIR__ . '/../../templates/professionalspace.php';
                    } else {
                        $_SESSION['message'] = 'Impossible de créer l\'utilisateur.';
                        $_SESSION['stylesheet'] = "users";
                        $_SESSION['title'] = "Gestion des utilisateurs";
                        $_SESSION['JSstylesheet'] = "CRUD_user";
                        return __DIR__ . '/../../templates/CRUDUser.php';
                    }
                }
            } else {
                $_SESSION['message'] = 'Impossible de créer l\'utilisateur.';
                $_SESSION['stylesheet'] = "users";
                $_SESSION['title'] = "Gestion des utilisateurs";
                $_SESSION['JSstylesheet'] = "CRUD_user";
                return __DIR__ . '/../../templates/CRUDUser.php';
            }
        }
    }

    //Cette méthode permet d'afficher tous les utilisateurs en JSON.
    public function readAllUsers()
    {
        $sql = 'SELECT users.name AS Nom, users.firstname AS Prénom, users.email AS Email, SUBSTR(roles.name,6) AS Rôle FROM users JOIN roles ON users.roleID=roles.roleID ORDER BY Rôle, Nom';
        $statement = \Config\DbConnectionSQL::getPDO()->prepare($sql);
        if ($statement->execute()) {
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            $result = [];
            if ($users !== null) {
                $array = [];
                foreach ($users as $user) {
                    array_push($array, $user['Nom'], $user['Prénom'], $user['Email'], $user['Rôle']);
                    array_push($result, $array);
                    $array = [];
                }
                return $result;
            } else {
                $_SESSION['message'] = 'Il n\'y a pas d\'utilisateurs en base';
            }
        } else {
            $_SESSION['message'] = 'Une erreur s\'est produite.';
        }
    }

    public function updateUser($form)
    {
        if (!$form['email'] || ($form['field'] == '') || $form['answer']=="*" || $form['answer']=='') {
            $_SESSION['message'] = 'Le formulaire n\'est pas complet,veuillez vérifier la saisie.';
            $_SESSION['stylesheet'] = "users";
            $_SESSION['title'] = "Gestion des utilisateurs";
            $_SESSION['JSstylesheet'] = "CRUD_user";
            return __DIR__ . '/../../templates/CRUDUser.php';
        } else {
            if ($form['email'] == 'jose.dupont@arcadia.fr') {
                $_SESSION['message'] = 'Vous ne pouvez pas modifier l\'administrateur de l\'application, veuillez vérifier la saisie.';
                $_SESSION['stylesheet'] = "users";
                $_SESSION['title'] = "Gestion des utilisateurs";
                $_SESSION['JSstylesheet'] = "CRUD_user";
                return __DIR__ . '/../../templates/CRUDUser.php';
            } else {
                $sql1 = 'SELECT email FROM users WHERE email=:email';
                $statement1 = \Config\DbConnectionSQL::getPDO()->prepare($sql1);
                $statement1->bindValue(':email', \Config\DbConnectionSQL::protectDbData($form['email']), PDO::PARAM_STR);
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
                        switch ($form['field']) {
                            //Si le champ à modifier est le nom.
                            case '1':
                                $sql2 = 'UPDATE users SET name=:name, updatedAT = NOW() WHERE email=:email';
                                $statement2 = \Config\DbConnectionSQL::getPDO()->prepare($sql2);
                                $statement2->bindValue(':email', \Config\DbConnectionSQL::protectDbData($form['email']), PDO::PARAM_STR);
                                $statement2->bindValue(':name', \Config\DbConnectionSQL::protectDbData($form['answer']), PDO::PARAM_STR);
                                break;
                            //Si le champ à modifier est le prénom.
                            case '2':
                                $sql2 = 'UPDATE users SET firstname=:firstname, updatedAT = NOW() WHERE email=:email';
                                $statement2 = \Config\DbConnectionSQL::getPDO()->prepare($sql2);
                                $statement2->bindValue(':email', \Config\DbConnectionSQL::protectDbData($form['email']), PDO::PARAM_STR);
                                $statement2->bindValue(':firstname', \Config\DbConnectionSQL::protectDbData($form['answer']), PDO::PARAM_STR);
                                break;
                            //Si le champ à modifier est l'email.
                            case '3':
                                $sql2 = 'UPDATE users SET email=:emailAnswer, updatedAT = NOW() WHERE email=:email';
                                $statement2 = \Config\DbConnectionSQL::getPDO()->prepare($sql2);
                                $statement2->bindValue(':email', \Config\DbConnectionSQL::protectDbData($form['email']), PDO::PARAM_STR);
                                $statement2->bindValue(':emailAnswer', \Config\DbConnectionSQL::protectDbData($form['answer']), PDO::PARAM_STR);
                                break;
                            //Si le champ à modifier est le mot de passe.
                            case '4':
                                $sql2 = 'UPDATE users SET password=:password, updatedAT = NOW() WHERE email=:email';
                                $statement2 = \Config\DbConnectionSQL::getPDO()->prepare($sql2);
                                $statement2->bindValue(':email', \Config\DbConnectionSQL::protectDbData($form['email']), PDO::PARAM_STR);
                                $statement2->bindValue(':password', password_hash(\Config\DbConnectionSQL::protectDbData($form['answer']), PASSWORD_BCRYPT));
                                break;
                            //Si le champ à modifier est le rôle.
                            case '5':
                                $sql2 = 'UPDATE users SET roleID=:roleID, updatedAT = NOW() WHERE email=:email';
                                $statement2 = \Config\DbConnectionSQL::getPDO()->prepare($sql2);
                                $statement2->bindValue(':email', \Config\DbConnectionSQL::protectDbData($form['email']), PDO::PARAM_STR);
                                $statement2->bindValue(':roleID', $form['answer'], PDO::PARAM_INT);
                                break;
                            //Si le champ à modifier est la photo.
                            case '6':
                                //$sql2 = 'UPDATE users SET picturePath=:picturePath WHERE email=:email';
                                //$statement2 = \Config\DbConnectionSQL::getPDO()->prepare($sql2);
                                $_SESSION['message'] = 'Cette fonctionnalité n\'est pas encore développée.';
                                $_SESSION['stylesheet'] = "users";
                                $_SESSION['title'] = "Gestion des utilisateurs";
                                $_SESSION['JSstylesheet'] = "CRUD_user";
                                return __DIR__ . '/../../templates/CRUDUser.php';
                            default:
                                $_SESSION['message'] = 'Le formulaire n\'est pas complet,veuillez vérifier la saisie.';
                                $_SESSION['stylesheet'] = "users";
                                $_SESSION['title'] = "Gestion des utilisateurs";
                                $_SESSION['JSstylesheet'] = "CRUD_user";
                                return __DIR__ . '/../../templates/CRUDUser.php';
                        }
                        if ($statement2->execute()) {
                            $_SESSION['message'] = 'L\'utilisateur a bien été modifié.';
                            $_SESSION['stylesheet'] = "professionalspace";
                            $_SESSION['title'] = "Espace professionnel";
                            return __DIR__ . '/../../templates/professionalspace.php';
                        } else {
                            $_SESSION['message'] = 'Impossible de modifier l\'utilisateur.';
                            $_SESSION['stylesheet'] = "users";
                            $_SESSION['title'] = "Gestion des utilisateurs";
                            $_SESSION['JSstylesheet'] = "CRUD_user";
                            return __DIR__ . '/../../templates/CRUDUser.php';
                        }
                    }
                } else {
                    $_SESSION['message'] = 'Impossible de modifier l\'utilisateur.';
                    $_SESSION['stylesheet'] = "users";
                    $_SESSION['title'] = "Gestion des utilisateurs";
                    $_SESSION['JSstylesheet'] = "CRUD_user";
                    return __DIR__ . '/../../templates/CRUDUser.php';
                }
            }
        }
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
            if ($form['email'] == 'jose.dupont@arcadia.fr') {
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