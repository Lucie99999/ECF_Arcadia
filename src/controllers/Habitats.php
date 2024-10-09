<?php

namespace App\controllers;

//Chargement de l'autoload de Composer
require_once __DIR__ . '/../../vendor/autoload.php';

class Habitats
{

    public function display(){
        $_SESSION['stylesheet']="habitats";
        $_SESSION['title']="Nos habitats";
        return __DIR__.'/../../templates/habitats.php';
    }
}