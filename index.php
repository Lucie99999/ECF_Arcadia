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
        $_SESSION['stylesheet']='landingpage';
        $_SESSION['title']='Bienvenue au zoo Arcadia!';
    }

    //On supprime la partie 0 de l'URI car elle correspond au slash.
    unset($uriParts[0]);

    //On détruit les données de session utilisateur si elles existent.
    if ((isset($_SESSION['user'])) && (($uriParts[1] !== "UserManager") && ($uriParts[1] !== "professionalspace"))){
        unset($_SESSION['user']);
        $_SESSION['message']='Vous avez bien été déconnecté.';
    }

    //La partie 1 de l'URI correspond au controller appelé.
    $controller=ucfirst($uriParts[1]);

    //La partie 2 de l'URI correspond à la méthode appelée.
    $method=$uriParts[2];

    //La partie 3 de l'URI correspond au paramètre qui sera donné à la méthode du controller
    //$parameter=$uriParts[3] ?? null;

    $controllerName = 'App\\controllers\\'.$controller;
    $controller = new $controllerName();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $page = $controller->$method($_POST);
    } else {
        //méthode GET, on récupère le chemin de la page
        if ($method !== 'display'){
            $result=($controller->$method());
            echo json_encode($result);
        } else {
            $page = $controller->$method();
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
        }
    }
?>
