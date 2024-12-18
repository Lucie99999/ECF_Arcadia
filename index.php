<?php
    echo session_save_path();
    session_start([
        'cookie_lifetime'=>86400
    ]);

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    //Chargement de l'autoload de Composer
    require_once __DIR__ . '/vendor/autoload.php';

    //On récupère l'URI.
    $uri = $_SERVER['REQUEST_URI'];
    $uriParts=explode('/',$uri);

    //Si pas d'uriParts, alors on est sur la page d'accueil.
    if (($uriParts[1])=="") {
        $uriParts[1]='LandingPage';
        $uriParts[2]='display';
        $_SESSION['stylesheet']='landingpage';
        $_SESSION['title']='Bienvenue au zoo Arcadia!';
    }

    //On supprime la partie 0 de l'URI car elle correspond au slash.
    unset($uriParts[0]);

    //On détruit les données de session utilisateur si elles existent et qu'on est en dehors de l'espace professionnel.
    $condition = ((isset($_SESSION['user'])) && ($uriParts[1] !== "UserManager") && ($uriParts[1] !== "ProfessionalSpace"));
    if ($condition){
        unset($_SESSION['user']);
        $_SESSION['message']='Vous avez bien été déconnecté.';
    }

    //La partie 1 de l'URI correspond au controller appelé.
    $controller=ucfirst($uriParts[1]);

    //La partie 2 de l'URI correspond à la méthode appelée.
    $method=$uriParts[2];

    $controllerName = 'App\\controllers\\'.$controller;
    $controller = new $controllerName();

    if (substr($method,0,4) === 'read'){
        $result=($controller->$method());
        echo json_encode($result);
    } else {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $page = $controller->$method($_POST);
        } else {
            $page = $controller->$method();
        }
        //On affiche l'entête de page.
        require_once 'templates/header.php';

        //On affiche la partie main de la page.
        require_once $page;

        //On affiche le bas de page.
        require_once 'templates/footer.php';
    }

?>
