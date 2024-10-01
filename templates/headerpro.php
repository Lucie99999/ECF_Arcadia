<?php

$path='../';
require_once $path.'config/config.php';

//On fait une requête dans la base de données pour récupérer le nom de rôle de l'utilisateur.
$query_role = \Config\DbConnectionSQL::getPDO()->prepare('SELECT * FROM roles WHERE roleID LIKE :userRoleID');
$query_role->bindValue(':userRoleID',$_SESSION['user']['roleID']);
$query_role->execute();
$role= $query_role->fetch(PDO::FETCH_ASSOC);
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
        <h1 class="title_pro"><?php
            if (isset($title_page)) {
                echo $title_page;
            } else {
                echo 'Bienvenue '.$_SESSION['user']['firstname'].' !';
            }
            ?> </h1>
        <img class="profile_picture" src="<?php echo $_SESSION['user']['picturePath'] ?>" alt="Photo de José">
        <p>Compte connecté : <?php echo $_SESSION['user']['firstname'].' - '.substr($role['name'],5) ?></p>
        <a href="<?php echo $path ?>index.php">
            <i class="fa-solid fa-arrow-right-from-bracket fa-3x me-3" style="color: #e9dac4;"></i>
        </a>
    </nav>
</header>
