<?php
    //On démarre une session si celle-ci n'est pas active.
    if (session_status() === 1) {
        session_start();
    }
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
        <a href="<?php echo $path ?>index.php">
            <img class="logo" src="<?php echo $path ?>assets/pictures/Logo.png" alt="Logo Zoo Arcadia" width="104" height="104">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="title_pro">Bienvenue <?php echo $_SESSION['user']['firstname'] ?> !</h1>
        <a href="<?php echo $path ?>index.php">
            <i class="fa-solid fa-arrow-right-from-bracket fa-3x me-3 sign_out" style="color: #e9dac4;"></i>
        </a>
    </nav>
</header>
