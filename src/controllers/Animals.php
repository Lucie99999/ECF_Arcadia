<?php

namespace App\controllers;

//Chargement de l'autoload de Composer
require_once __DIR__ . '/../../vendor/autoload.php';

class Animals
{

    public function display(){
        $_SESSION['stylesheet']="animals";
        $_SESSION['title']="Nos animaux";
        return __DIR__.'/../../templates/animals.php';
    }
}