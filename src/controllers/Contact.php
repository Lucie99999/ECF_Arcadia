<?php

namespace App\controllers;

//Chargement de l'autoload de Composer
require_once __DIR__ . '/../../vendor/autoload.php';

class Contact
{

    public function display(){
        $_SESSION['stylesheet']="contac";
        $_SESSION['title']="Contactez-nous";
        return __DIR__.'/../../templates/contact.php';
    }
}