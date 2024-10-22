<?php

namespace App\controllers;

//Chargement de l'autoload de Composer
require_once __DIR__ . '/../../vendor/autoload.php';

class PracticalInformation
{

    public function display(){
        $_SESSION['stylesheet']="practicalinformation";
        $_SESSION['title']="Informations pratiques";
        return __DIR__.'/../../templates/practicalinformation.php';
    }
}