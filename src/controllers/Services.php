<?php

namespace App\controllers;

//Chargement de l'autoload de Composer
require_once __DIR__ . '/../../vendor/autoload.php';

class Services
{

    public function display(){
        return __DIR__.'/../../templates/services.php';
    }
}