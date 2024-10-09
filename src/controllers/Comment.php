<?php
namespace App\controllers;

//Chargement de l'autoload de Composer
require_once __DIR__ . '/../../vendor/autoload.php';

class Comment{

    public function managePostForm($form){
        if (!$form['surname'] || !$form['stars'] || !$form['comment']) {
            $_SESSION['message']='Un des champs est vide. Veuillez vérifier votre saisie.';
            return __DIR__.'/../../templates/comment.php';
        }
        else {
            // Sélection de la collection
            $collection = \Config\DbConnectionNoSQL::getDB()->selectCollection("Comments");

            // Insertion d'un document dans la collection correspondant aux données saisies.
            $collection->insertOne([
                'surname' => $_POST['surname'],
                'stars' => $_POST['stars'],
                'comments' => $_POST['comment'],
                'approved' => false
            ]);
            $_SESSION['message'] = 'Votre avis a bien été enregistré. Vous pourrez le voir sur notre plateforme dans quelques jours suite à approbation de nos services.';
            return __DIR__.'/../../templates/comment.php';
        }
    }

    //Méthode qui s'exécute pour l'affichage des pages
    public function display(){
        $_SESSION['stylesheet']="comment";
        $_SESSION['title']="Donnez votre avis";
        return __DIR__.'/../../templates/comment.php';
    }
}