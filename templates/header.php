<?php
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
    <!--Je lie mon fichier de style CSS à mon fichier HTML.-->
    <link rel="stylesheet" href="./assets/css/index.css"/>
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
        <img class="logo" src="./assets/pictures/Logo.png" alt="Logo Zoo Arcadia" width="104" height="104">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="container-fluid d-flex flex-row justify-content-between mx-3 mb-2 mb-lg-0">
                <a class="nav-link link-offset-3" aria-current="page" href="#">Habitats</a>
                <a class="nav-link link-offset-3" aria-current="page" href="#">Animaux</a>
                <a class="nav-link link-offset-3" aria-current="page" href="#">Services</a>
                <a class="nav-link link-offset-3" aria-current="page" href="#">Informations pratiques</a>
                <a class="nav-link link-offset-3" aria-current="page" href="#">Contact</a>
                <a class="nav-link link-offset-3" aria-current="page" href="#">🔒 Espace pro</a>
            </ul>
        </div>
    </nav>
</header>
