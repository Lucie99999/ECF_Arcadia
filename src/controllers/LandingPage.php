<?php
namespace App\controllers;

//Chargement de l'autoload de Composer
require_once __DIR__ . '/../../vendor/autoload.php';

class LandingPage{

    public function display(){
        $_SESSION['stylesheet']="landingpage";
        $_SESSION['title']="Bienvenue au zoo Arcadia!";
        return __DIR__.'/../../templates/landingpage.php';
    }

    public function api(){
        return [
            'success'=>true,
            'message'=>'API accessible'
        ];
    }
}