<?php
    session_start();

    //Chargement de l'autoload de Composer
    require_once __DIR__ . '/../vendor/autoload.php';

    $path='../';

    //On récupère le nom de la page dans l'URL.
    $pageName = $_GET['page'] ?? 'landing_page';
    $page = 'templates/'.$pageName.'.php';

    //On récupère le titre de la page dans l'URL.
    $title = $_GET['title'] ?? 'Bienvenue au Zoo Arcadia !';

    //On récupère le nom du fichier CSS dans l'URL.
    $namestylesheet = $_GET['page'] ?? 'landing_page';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $controllerName = 'App\\controllers\\'.ucfirst($pageName);
        $controller = new $controllerName();
        $controller->managePostForm($_POST);
    }

    //On affiche l'entête de page.
    require_once $path.'templates/header.php';
?>
<main>
    <?php
        require_once $path.$page;
    ?>
</main>
<?php
    //On affiche le bas de page.
    require_once $path.'templates/footer.php';
?>
