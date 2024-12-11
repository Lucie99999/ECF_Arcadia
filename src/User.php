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
}