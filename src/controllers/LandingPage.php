<?php
namespace App\controllers;

//Chargement de l'autoload de Composer
require_once __DIR__ . '/../../vendor/autoload.php';

class LandingPage{

    public function display(){
        return __DIR__.'/../../templates/landingpage.php';
    }
}