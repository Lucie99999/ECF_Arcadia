<?php

namespace App;

use PDO;

//Chargement de l'autoload de Composer
require_once __DIR__ . '/../vendor/autoload.php';

class User
{
    private $_name;
    private $_firstname;
    private $_email;
    private $_password;
    private $_role;

    //Constructeur
    public function __construct($name, $firstname, $email, $password, $role)
    {
        $this->_name = $name;
        $this->_firstname = $firstname;
        $this->_email = $email;
        $this->_password = $password;
        $this->_role = $role;
    }

    //Méthodes getters et setters
    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function getFirstname()
    {
        return $this->_firstname;
    }

    public function setFirstname($firstname)
    {
        $this->_firstname = $firstname;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function setPassword($password)
    {
        $this->_password = $password;
    }

    public function getRole()
    {
        return $this->_role;
    }

    public function setRole($role)
    {
        $this->_role = $role;
    }

    //Méthode permettant de créer un utilisateur
    public function createUser(User $user)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
            if (!$user->getName() || !$user->getFirstname() || !$user->getEmail() || !$user->getPassword() || ($user->getRole() == 0)) {
                $_SESSION['message'] = 'Un des champs est vide, veuillez vérifier la saisie.';
                header('Location:../forms/CRUD_user.php');
            } else {
                $sql = 'INSERT INTO users(userID, name,firstname,email,password,createdAt,roleID) VALUES (UUID(),:name,:firstname,:email,:password, NOW(), :role)';
                $statement = \Config\DbConnectionSQL::getPDO()->prepare($sql);
                $statement->bindValue(':name', \Config\DbConnectionSQL::protectDbData($user->getName()),PDO::PARAM_STR);
                $statement->bindValue(':firstname', \Config\DbConnectionSQL::protectDbData($user->getFirstname()),PDO::PARAM_STR);
                $statement->bindValue(':email', \Config\DbConnectionSQL::protectDbData($user->getEmail()),PDO::PARAM_STR);
                $statement->bindValue(':role', $user->getRole(),PDO::PARAM_INT);
                //On hashe le mot de passe en utilisant BCRYPT
                $statement->bindValue(':password', password_hash($user->getPassword(), PASSWORD_BCRYPT));
                if ($statement->execute()) {
                    $_SESSION['message'] = 'L\'utilisateur a bien été créé.';
                    header('Location:../forms/CRUD_user.php');
                } else {
                    $_SESSION['message'] = 'Impossible de créer l\'utilisateur.';
                    header('Location:../forms/CRUD_user.php');
                }
            }
        }
    }

    //Méthode permettant de lire la donnée d'un utilisateur déjà présent en base de données.
    public function readUser(User $user)
    {

    }

    //Méthode permettant de mettre à jour un utilisateur déjà présent en base de données.
    public function updateUser()
    {

    }

    //Méthode permettant de supprimer un utilisateur
    public function deleteUser()
    {

    }
}