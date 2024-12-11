<?php

namespace App\controllers;

//Chargement de l'autoload de Composer
require_once __DIR__ . '/../../vendor/autoload.php';

class Hours
{

    public function readHours()
    {
        //Sélection de la collection
        $collection = \Config\DbConnectionNoSQL::getDB()->selectCollection("Openings");

        //Détermination de la saison
        $month = date('m');
        if ($month == "01" or $month == "11" or $month == "12" or $month == "02" or $month == "03") {
            $season = 'Hiver';
        } else {
            $season = 'Eté';
        }
        //Lecture de tous les documents de la collection qui ont pour valeur $season
        $result = $collection->find(['season' => $season]);
        return $result;
    }
}
