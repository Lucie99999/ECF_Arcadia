<?php
if(session_status() === PHP_SESSION_NONE) session_start();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--J'intègre le framework Bootstrap à mon projet-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Je lie mon fichier de style CSS pour le header-->
    <link rel="stylesheet" href="<?php echo $path ?>assets/css/header.css"/>
    <!--Je lie mon fichier de style CSS pour le footer-->
    <link rel="stylesheet" href="<?php echo $path ?>assets/css/footer.css"/>
    <!--Je lie mon fichier de style CSS à mon fichier HTML.-->
    <link rel="stylesheet" href="<?php echo $path ?>assets/css/<?php echo $namestylesheet ?>.css"/>
    <title>
        <?php
            if (isset($title)) {
                echo $title;
            } else {
                echo 'Bienvenue au zoo Arcadia';
            }
        ?>
    </title>
</head>
<body>
<header>
    <!--On insère notre navbar-->
    <nav class="navbar navbar-expand-lg justify-content-between">
        <a href="index.php?page=landing_page&title=Bienvenue au Zoo Arcadia!">
            <img class="logo" src="<?php echo $path ?>assets/pictures/Logo.png" alt="Logo Zoo Arcadia" width="104" height="104">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="container-fluid d-flex flex-row justify-content-between mx-3 mb-2 mb-lg-0">
                <a class="nav-link link-offset-3" aria-current="page" href="index.php?page=habitats&title=Nos Habitats">Habitats</a>
                <a class="nav-link link-offset-3" aria-current="page" href="index.php?page=animals&title=Nos animaux">Animaux</a>
                <a class="nav-link link-offset-3" aria-current="page" href="index.php?page=services&title=Nos services">Services</a>
                <a class="nav-link link-offset-3" aria-current="page" href="index.php?page=practical_information&title=Informations pratiques">Informations pratiques</a>
                <a class="nav-link link-offset-3" aria-current="page" href="index.php?page=contact&title=Contact">Contact</a>
                <a class="nav-link link-offset-3" aria-current="page" href="index.php?page=forms/connection&title=Connexion à l'espace professionnel">🔒 Espace pro</a>
            </ul>
        </div>
    </nav>
</header>
