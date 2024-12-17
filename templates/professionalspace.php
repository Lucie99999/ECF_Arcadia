<main class="overflow-scroll">
    <?php if (isset($_SESSION['message'])){ ?>
        <div class="alert alert-warning" role="alert">
            <?php echo $_SESSION['message'];
            unset($_SESSION['message']);?>
        </div>
    <?php } ?>
    <div class="container-fluid my-4">
        <div class="row justify-content-center">
            <div class="col-auto mb-4">
                <a <?php if ($_SESSION['role']=="admin"){?>href="/UserManager/display"<?php } ?>>
                    <figure class="<?php echo $_SESSION['role'] ?>">
                        <img src="../assets/pictures/pexels-ifaw-5487067.jpg" alt="Image des employés du zoo">
                        <figcaption>Employés/vétérinaires</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-auto mb-4">
                <a <?php if ($_SESSION['role']=="admin"){?>href="/AnimalManager/display"<?php } ?>>
                    <figure class="<?php echo $_SESSION['role'] ?>">
                        <img src="../assets/pictures/lions/pexels-goran-vrakela-64248-615277.jpg" alt="Image des animaux du zoo">
                        <figcaption>Animaux</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-auto mb-4">
                <a <?php if ($_SESSION['role']=="admin"){?>href="/HabitatManager/display"<?php } ?>>
                    <figure class="<?php echo $_SESSION['role'] ?>">
                        <img src="../assets/pictures/jungle/pexels-ch1276-540006.jpg" alt="Image d'un habitat du zoo">
                        <figcaption>Habitats</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-auto mb-4">
                <a <?php if (($_SESSION['role'] == "admin")|($_SESSION['role']=="employe")) {?>href="/ServiceManager/display"<?php } ?>>
                    <figure <?php if ($_SESSION['role'] == "employe"){?>class="admin"<?php } else { ?>class="<?php echo $_SESSION['role'] ?>" <?php } ?>>
                        <img src="../assets/pictures/restauration/pexels-igor-starkov-233202-799869.jpg" alt="Image d'un restaurant du zoo">
                        <figcaption>Services</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-auto mb-4">
                <a <?php if ($_SESSION['role'] == "admin"){?>href="/HoursManager/display"<?php } ?>>
                    <figure class="<?php echo $_SESSION['role'] ?>">
                        <img src="../assets/pictures/pexels-lexi-lauwers-1431940-18267651.jpg" alt="Image d'une horloge">
                        <figcaption>Horaires</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-auto mb-4">
                <a <?php if (($_SESSION['role'] == "admin")|($_SESSION['role'] == "employe")) {?>href=""<?php } ?>>
                    <figure <?php if ($_SESSION['role'] == "employe"){?>class="admin"<?php } else { ?>class="<?php echo $_SESSION['role'] ?>" <?php } ?>>
                        <img src="../assets/pictures/pexels-molnartamasphotography-24862406.jpg" alt="Image des animaux du zoo">
                        <figcaption>Saisie alimentation</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-auto mb-4">
                <a <?php if (($_SESSION['role'] == "admin")|($_SESSION['role'] == "veterinaire")) {?>href="test"<?php } ?>>
                    <figure <?php if ($_SESSION['role'] == "veterinaire"){?>class="admin"<?php } else { ?>class="<?php echo $_SESSION['role'] ?>" <?php } ?>>
                        <img src="../assets/pictures/pexels-evelina-ulickaite-3892657-24994444.jpg" alt="Image des animaux du zoo">
                        <figcaption>Affichage alimentation</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-auto mb-4">
                <a <?php if (($_SESSION['role'] == "admin")|($_SESSION['role'] == "employe")) {?>href=""<?php } ?>>
                    <figure <?php if ($_SESSION['role'] == "employe"){?>class="admin"<?php } else { ?>class="<?php echo $_SESSION['role'] ?>" <?php } ?>>
                        <img src="../assets/pictures/Avis.png" alt="Image d'un client heureux">
                        <figcaption>Avis clients</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-auto mb-4">
                <a <?php if (($_SESSION['role'] == "admin")|($_SESSION['role'] == "veterinaire")) {?>href=""<?php } ?>>
                    <figure <?php if ($_SESSION['role'] == "veterinaire"){?>class="admin"<?php } else { ?>class="<?php echo $_SESSION['role'] ?>" <?php } ?>>
                        <img src="../assets/pictures/pexels-cytonn-955389.jpg" alt="Image d'une personne qui écrit">
                        <figcaption>Saisie compte-rendus</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-auto mb-4">
                <a <?php if (($_SESSION['role'] == "admin")|($_SESSION['role'] == "employe")) {?>href=""<?php } ?>>
                    <figure <?php if ($_SESSION['role'] == "employe"){?>class="admin"<?php } else { ?>class="<?php echo $_SESSION['role'] ?>" <?php } ?>>
                        <img src="../assets/pictures/pexels-sora-shimazaki-5668837.jpg" alt="Image d'une personne lisant un rapport">
                        <figcaption>Affichage des compte-rendus</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-auto mb-4">
                <a <?php if ($_SESSION['role'] == "admin"){?>href=""<?php } ?>>
                    <figure class="<?php echo $_SESSION['role'] ?>">
                        <img src="../assets/pictures/pexels-goumbik-590037.jpg" alt="Image de feuilles posées sur un bureau avec des graphiques">
                        <figcaption>Dashboard</figcaption>
                    </figure>
                </a>
            </div>
        </div>
    </div>
</main>
