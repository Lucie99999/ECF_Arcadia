<?php

require_once './config/noSQL.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    if (!$_POST['surname'] || !$_POST['stars'] || !$_POST['comment']) {
        echo 'Un des champs est vide. Veuillez vérifier votre saisie.';
    }
    else {
        // Sélection de la collection
        $collection = $db->selectCollection("Comments");

        // Insertion d'un document dans la collection correspondant aux données saisies.
        $comment = $collection->insertOne([
            'surname' => $_POST['surname'],
            'stars' => $_POST['stars'],
            'comments' => $_POST['comment'],
            'approved' => false
        ]);

        $_SESSION['message'] = 'Votre avis a bien été enregistré. Vous pourrez le voir sur notre plateforme dans quelques jours suite à approbation de nos services.';

        header('Location: ../forms/comment.php');
    }
}

