<main>
    <?php if (isset($_SESSION['message'])){ ?>
        <div class="alert alert-warning" role="alert">
            <?php echo $_SESSION['message'];
            unset($_SESSION['message']);?>
        </div>
    <?php } ?>
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col mx-3">
                <a href="/UserManager/display">
                    <figure>
                        <img src="../assets/pictures/pexels-ifaw-5487067.jpg" alt="Image des employés du zoo" width="300" height="175">
                        <figcaption>Employés/vétérinaires</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col">
                <a href="<?php echo $path ?>templates/forms/CRUD_animal.php">
                    <figure>
                        <img src="../assets/pictures/lions/pexels-goran-vrakela-64248-615277.jpg" alt="Image des animaux du zoo" width="300" height="175">
                        <figcaption>Animaux</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col">
                <a href="<?php echo $path ?>templates/forms/CRUD_habitat.php">
                    <figure>
                        <img src="../assets/pictures/jungle/pexels-ch1276-540006.jpg" alt="Image d'un habitat du zoo" width="300" height="175">
                        <figcaption>Habitats</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col">
                <a href="<?php echo $path ?>templates/forms/CRUD_service.php">
                    <figure>
                        <img src="../assets/pictures/restauration/pexels-igor-starkov-233202-799869.jpg" alt="Image d'un restaurant du zoo" width="300" height="175">
                        <figcaption>Services</figcaption>
                    </figure>
                </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col mx-3">
                <a href="<?php echo $path ?>templates/forms/CRUD_hours.php">
                    <figure>
                        <img src="../assets/pictures/pexels-lexi-lauwers-1431940-18267651.jpg" alt="Image d'une horloge" width="300" height="175">
                        <figcaption>Horaires</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col">
                <a href="<?php echo $path ?>forms/CRUD_hours.php">
                    <figure>
                        <img src="../assets/pictures/pexels-molnartamasphotography-24862406.jpg" alt="Image des animaux du zoo" width="300" height="175">
                        <figcaption>Saisie alimentation</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col">
                <a href="<?php echo $path ?>forms/CRUD_hours.php">
                    <figure>
                        <img src="../assets/pictures/pexels-evelina-ulickaite-3892657-24994444.jpg" alt="Image des animaux du zoo" width="300" height="175">
                        <figcaption>Affichage alimentation</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col">
                <a href="<?php echo $path ?>validation_comments.php">
                    <figure>
                        <img src="../assets/pictures/Avis.png" alt="Image d'un client heureux" width="300" height="175">
                        <figcaption>Avis clients</figcaption>
                    </figure>
                </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col mx-3">
                <a href="<?php echo $path ?>forms/report_entry.php">
                    <figure>
                        <img src="../assets/pictures/pexels-cytonn-955389.jpg" alt="Image d'une personne qui écrit" width="300" height="175">
                        <figcaption>Saisie compte-rendus</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col">
                <a href="<?php echo $path ?>forms/report_entry.php">
                    <figure>
                        <img src="../assets/pictures/pexels-sora-shimazaki-5668837.jpg" alt="Image d'une personne lisant un rapport" width="300" height="175">
                        <figcaption>Affichage des compte-rendus</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col">
                <a href="<?php echo $path ?>forms/report_entry.php">
                    <figure>
                        <img src="../assets/pictures/pexels-goumbik-590037.jpg" alt="Image de feuilles posées sur un bureau avec des graphiques" width="300" height="175">
                        <figcaption>Dashboard</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
</main>
