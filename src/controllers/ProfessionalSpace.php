<?php

namespace App\controllers;

//Chargement de l'autoload de Composer
require_once __DIR__ . '/../../vendor/autoload.php';

class ProfessionalSpace
{

    public function display(){
        $_SESSION['stylesheet']="professionalspace";
        $_SESSION['title']='Bienvenue '.$_SESSION['user']['firstname'].' !';
        return __DIR__.'/../../templates/professionalspace.php';
    }
}