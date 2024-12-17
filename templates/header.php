<?php
session_start();

//On fait une requête dans la base de données pour récupérer le nom de rôle de l'utilisateur s'il existe.
if (isset($_SESSION['user'])){
    $query_role = \Config\DbConnectionSQL::getPDO()->prepare('SELECT * FROM roles WHERE roleID LIKE :userRoleID');
    $query_role->bindValue(':userRoleID',$_SESSION['user']['roleID']);
    $query_role->execute();
    $role = $query_role->fetch(PDO::FETCH_ASSOC);
    $nomRole = substr($role['name'],5);
    $classRole = strtolower(substr($role['name'],5));
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Je lie mon fichier de style CSS pour le header-->
    <link rel="stylesheet" href="../assets/css/header.css"/>
    <!--Je lie mon fichier de style CSS pour le footer-->
    <link rel="stylesheet" href="../assets/css/footer.css"/>
    <!--Je lie mon fichier de style CSS à mon fichier HTML.-->
    <link rel="stylesheet" href="../assets/css/<?php echo $_SESSION['stylesheet'] ?>.css"/>
    <title>
        <?php
            if (isset($_SESSION['title'])) {
                echo $_SESSION['title'];
            } else {
                echo 'Bienvenue au zoo Arcadia';
            }
        ?>
    </title>
</head>
<body>
<header>
    <!--On insère notre navbar-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- S'il n'y a aucun utilisateur enregistré dans la session, alors on affiche le menu dédié aux visiteurs. -->
            <?php if (!isset($_SESSION['user'])){?>
                <a class="navbar-brand py-0" href="/LandingPage/display">
                    <img class="logo" src="../assets/pictures/Logo.png" alt="Logo Zoo Arcadia" width="104" height="104">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav container-fluid justify-content-between mx-3 mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link link-offset-3" aria-current="page" href="/Habitats/display">Habitats</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-offset-3" aria-current="page" href="/Animals/display">Animaux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-offset-3" aria-current="page" href="/Services/display">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-offset-3" aria-current="page" href="/PracticalInformation/display">Informations pratiques</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-offset-3" aria-current="page" href="/Contact/display">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-offset-3" aria-current="page" href="/Connection/display">🔒 Espace pro</a>
                        </li>
                    </ul>
                </div>
            <?php } else { ?>
                    <a class="col-md-1" href="/LandingPage/display">
                        <img class="logo" src="../assets/pictures/Logo.png" alt="Logo Zoo Arcadia" width="104" height="104">
                    </a>
                    <h1 class="d-none d-sm-block col-md-4 title_pro"><?php echo $_SESSION['title'];?> </h1>
                    <img class="d-none d-lg-block col-md-2 profile_picture" src="<?php echo $_SESSION['user']['picturePath'] ?>" alt="Photo de l'employé connecté">
                    <p class="d-none d-lg-block col-md-3">Compte connecté : <?php echo $_SESSION['user']['firstname'].' - '.$nomRole ?></p>
                    <a class="col-md-1" href="/LandingPage/display">
                        <i class="fa-solid fa-arrow-right-from-bracket fa-3x me-3" style="color: #e9dac4;"></i>
                    </a>
            <?php } ?>
        </div>
    </nav>
</header>
