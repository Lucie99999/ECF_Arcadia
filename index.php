<?php
    session_start();

    //Chargement de l'autoload de Composer
    require_once __DIR__ . '/vendor/autoload.php';

    //On récupère le nom de l'URL.
    $uri = $_SERVER['REQUEST_URI'];
    $uriParts=explode('/',$uri);

    //Si pas d'uriParts, alors on est sur la page d'accueil.
    if (($uriParts[1])=="") {
        $uriParts[1]='landingpage';
        $uriParts[2]='display';
    }

    //On supprime la partie 0 de l'URI car elle correspond au slash.
    unset($uriParts[0]);

    //La partie 1 de l'URI correspond au controller appelé.
    $controller=ucfirst($uriParts[1]);

    //La partie 2 de l'URI correspond à la méthode appelée.
    $method=$uriParts[2];
    $controllerName = 'App\\controllers\\'.$controller;
    $controller = new $controllerName();

    //On récupère le nom du fichier CSS dans l'URL.
    $namestylesheet = $uriParts[1];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $controller->$method($_POST);
    } else {
        //méthode GET, on récupère le chemin de la page
        $page = $controller->$method();
    }

    //On affiche l'entête de page.
    require_once 'templates/header.php';
?>
<main>
    <?php
        require_once $page;
    ?>
</main>
<?php
    //On affiche le bas de page.
    require_once 'templates/footer.php';
?>
