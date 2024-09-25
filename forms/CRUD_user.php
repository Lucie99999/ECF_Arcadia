<?php
$path="../";
$namestylesheet="CRUD_user";
$nameJSsheet="CRUD_user";
$title="Gestion des utilisateurs";
$title_page="Utilisateurs";
require_once '../templates/headerpro.php';
?>
    <main class="align-self-center">
        <?php if (isset($_SESSION['message'])){ ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $_SESSION['message'];
                      unset($_SESSION['message']);?>
            </div>
        <?php } ?>

        <!-- On ajoute le rappel à l'espace professionnel.-->
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $path ?>templates/professional_space.php">Espace professionnel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Employés / vétérinaires</li>
            </ol>
        </nav>
        <!--On demande à la personne de choisir ce qu'elle souhaite faire.-->
        <form action="" method="post">
            <label for="choice">Que souhaitez-vous faire ?</label>
            <select name="choice" id="choice" class="ms-3">
                <option value="">--Choisissez une option--</option>
                <option value="1">Créer un nouvel utilisateur</option>
                <option value="2">Modifier un utilisateur existant</option>
                <option value="3">Supprimer un utilisateur existant</option>
            </select>
        </form>
        <!--On insère la div qui accueillera l'insertion HTML depuis le fichier JS.-->
        <div id="displayChoice">
        </div>
    </main>
<?php
require_once '../templates/footer.php';
?>