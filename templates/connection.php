<?php
$path="../";
?>
<main>
    <?php if (isset($_SESSION['message'])){ ?>
        <div class="alert alert-warning" role="alert">
            <?php echo $_SESSION['message'];
                  unset($_SESSION['message']);?>
        </div>
    <?php } ?>

    <!-- On ajoute le rappel aux pages précédentes.-->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/landingpage/display">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Espace professionnel</li>
        </ol>
    </nav>

    <!--On indique le titre de la page-->
    <h1 class="mx-5">Bienvenue sur l'espace professionnel du zoo Arcadia</h1>

    <!--On crée une div pour gérer les erreurs liées à la connexion.-->
    <div id="error"></div>

    <!--On crée le formulaire de connexion-->
    <form class="d-flex flex-column align-items-center m-5 px-5" id="loginForm" action="/connection/managePostForm" method="post">
        <div class="m-4">
            <label for="mail">Email :</label>
            <input type="email" id="mail" name="mail" placeholder="Email">
        </div>
        <div class="m-4">
            <label for="pwd">Mot de passe :</label>
            <input type="password" id="pwd" name="pwd" placeholder="Mot de passe">
        </div>
        <div class="m-4">
            <button type="button" class="btn" onclick="window.location.href ='/landingpage/display';">Annuler</button>
            <button type="submit" class="btn" >Se connecter</button>
        </div>
    </form>
</main>
