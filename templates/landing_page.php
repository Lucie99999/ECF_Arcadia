<?php
//On fait une requête dans la base de données pour afficher tous les habitats.
$query_habitats = \Config\DbConnectionSQL::getPDO()->query("SELECT * FROM habitats");
$habitats = $query_habitats->fetchAll(PDO::FETCH_ASSOC);

//On fait une requête dans la base de données pour afficher tous les services.
$query_services = \Config\DbConnectionSQL::getPDO()->query("SELECT * FROM services");
$services = $query_services->fetchAll(PDO::FETCH_ASSOC);

//On fait une requête dans la base de données pour afficher toutes les races.
$query_races = \Config\DbConnectionSQL::getPDO()->query("SELECT * FROM races");
$races= $query_races->fetchAll(PDO::FETCH_ASSOC);

//On détermine le nombre de fois où on va reproduire le schéma de carousel-item pour la partie Animaux de la page d'accueil.
$nbraces=count($races);
$result=intval($nbraces/3);
$rest=fmod($nbraces,3);
$nbiterationcarousel = 0;
if ($rest!==0) {
    $nbiterationcarousel = $result + 1;
} else {
    $nbiterationcarousel = $result;
}

//On détruit les données de session utilisateur si elles existent.
if (isset($_SESSION['user'])){
    unset($_SESSION['user']);
    $_SESSION['message']='Vous avez bien été déconnecté.';
}

?>
    <main>
        <?php if (isset($_SESSION['message'])){ ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $_SESSION['message'];
                      unset($_SESSION['message']);?>
            </div>
        <?php } ?>
        <!--On met le titre.-->
        <h1>Bienvenue au zoo Arcadia</h1>

        <!--On insère le caroussel général du zoo.-->
        <div id="carouselExampleIndicatorsGeneral" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicatorsGeneral" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicatorsGeneral" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicatorsGeneral" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner carousel-general">
                <div class="carousel-item active">
                    <img src="../assets/pictures/global_zoo/pexels-guerrero-de-la-luz-346901328-24991332.jpg" class="d-block w-100" alt="Vue globale du zoo, habitat Savane">
                </div>
                <div class="carousel-item">
                    <img src="../assets/pictures/global_zoo/pexels-evelina-ulickaite-3892657-24994444.jpg" class="d-block w-100" alt="Femme avec des chèvres">
                </div>
                <div class="carousel-item">
                    <img src="../assets/pictures/global_zoo/pexels-zoosnow-803412-1680214.jpg" class="d-block w-100" alt="Vue sur le marais, ensemble de flamants roses">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorsGeneral" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicatorsGeneral" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!--On insère le texte d'introduction-->
        <p class="introduction_text">Situé à 10 minutes de la forêt de Brocéliande, le <span class="bold">zoo Arcadia</span>, le plus grand parc animalier de Bretagne,invite petits et grands à découvrir dans un cadre naturel exceptionnel de 80 hectares,+ de 1000 animaux à travers d’incroyables aventures...</p>
        
        <!--On crée la partie "Habitats" de la page d'accueil.-->
        <div class="container-fluid text-end">
            <!--On insère un titre secondaire et le bouton pour aller sur la page correspondante.-->
            <div class="row">
                <div class="col-6 col-md-4"></div>
                <div class="col-6 col-md-4">
                    <h2>Nos habitats</h2>
                </div>
                <div class="col-6 col-md-4 pe-4">
                    <button type="button" class="btn" onclick="window.location.href ='index.php?page=habitats';">Découvrez tous nos habitats</button>
                </div>
            </div>
            <!--On insère une carte qui va se répliquer en fonction des habitats saisis dans la base de données.-->
            <div class="row mt-4">
                <?php
                    $i=1;
                    foreach ($habitats as $habitat) {

                        //On récupère l'ID de l'habitat et son nom.
                        $habitatID = $habitat['habitatID'];
                        $habitatName = $habitat['name'];

                        //On fait une requête dans la base de données pour afficher toutes les photos concernant l'habitat en question.
                        $query_picture_habitat = \Config\DbConnectionSQL::getPDO()->prepare("SELECT * FROM pictures WHERE habitatID LIKE :idHabitat");
                        $query_picture_habitat->bindValue(':idHabitat',$habitatID);
                        $query_picture_habitat->execute();
                        $pictures_habitat = $query_picture_habitat->fetchAll(PDO::FETCH_ASSOC);

                ?>
                    <div class="col-sm-4 mb-3 mb-sm-0 px-5">
                        <div class="card">
                            <div id="carouselCards<?php echo $i ?>" class="carousel slide">
                                <!--On crée autant d'indicateurs de caroussel qu'il y a de photos.-->
                                <div class="carousel-indicators">
                                    <?php
                                        $k=0;
                                        foreach ($pictures_habitat as $picture) {
                                    ?>
                                    <button type="button" data-bs-target="#carouselCards<?php echo $i ?>" data-bs-slide-to="<?php echo $k ?>" <?php if ($k==0){?>class="active" aria-current="true" <?php } ?> aria-label="Slide <?php echo $i ?>"></button>
                                    <?php
                                        $k=$k+1;
                                        }
                                    ?>
                                </div>
                                <!--On crée autant d'éléments du caroussel qu'il y a de photos.-->
                                <div class="carousel-inner carousel-habitats">
                                    <?php
                                        $j=1;
                                        foreach ($pictures_habitat as $picture) {
                                    ?>
                                    <div class="carousel-item<?php if ($j==1){echo ' active';}?>">
                                        <img src="<?php echo $picture['path']?>" class="d-block w-100 image-item" alt="Image <?php echo $habitatName?> <?php echo $j ?>">
                                    </div>
                                    <?php
                                        $j=$j+1;
                                    }
                                    ?>
                                </div>
                                <!--Boutons suivant et précédent du caroussel -->
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselCards<?php echo $i ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselCards<?php echo $i ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <!--On inscrit le texte correspondant à chaque carte-->
                            <div class="card-body">
                                <a href="#" class="card-link"><h3><?php echo $habitat['name']?></h3></a>
                            </div>
                        </div>
                    </div>
                <?php
                    $i=$i+1;
                    } ?>
            </div>
        </div>

        <!--On crée la partie "Animaux" de la page d'accueil.-->
        <div class="container-fluid text-end">
            <!--On insère un titre secondaire et le bouton pour aller sur la page correspondante.-->
            <div class="row">
                <div class="col-6 col-md-4"></div>
                <div class="col-6 col-md-4">
                    <h2>Nos animaux</h2>
                </div>
                <div class="col-6 col-md-4 pe-4">
                    <button type="button" class="btn" onclick="window.location.href ='index.php?page=animals';">Découvrez tous nos animaux</button>
                </div>
            </div>
            <div class="row mt-4">
                <!--On crée un caroussel avec des cartes pour chaque race. On affiche 3 races par slide.-->
                <div id="carouselExampleIndicatorsAnimals" class="carousel slide">
                    <div class="carousel-indicators indicator-animal">
                        <?php
                        for ($p=0;$p<$nbiterationcarousel;$p++) {
                        ?>
                        <button type="button" data-bs-target="#carouselExampleIndicatorsAnimals" data-bs-slide-to="<?php echo $p?>" aria-label="Slide <?php echo ($p+1) ?>" <?php if ($p==0){?>class="active" aria-current="true"<?php } ?>></button>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="carousel-inner">
                        <?php
                        //On fait une boucle sur le nombre d'itérations des slides du caroussel trouvé plus haut.
                        for ($n=0; $n < $nbiterationcarousel; $n++) {
                        ?>
                        <div class="carousel-item animals <?php if ($n==0){?>active<?php }?>">
                                <?php
                                //On fait une boucle pour récupérer 3 animaux par slide du caroussel.
                                for ($m=$n*3; $m<3*($n+1); $m++) {

                                    if (isset($races[$m]['raceID'])) {

                                    //On récupère l'ID de la race et son nom.
                                    $raceID = $races[$m]['raceID'];
                                    $raceName = $races[$m]['name'];


                                    //On fait une requête dans la base de données pour afficher la 1ère photo de la race sélectionnée.
                                    $query_picture_race = \Config\DbConnectionSQL::getPDO()->prepare("SELECT * FROM pictures WHERE raceID LIKE :idRace AND title LIKE :title");
                                    $query_picture_race->bindValue(':idRace',$raceID);
                                    $query_picture_race->bindValue(':title','%1');
                                    $query_picture_race->execute();
                                    $picture_race = $query_picture_race->fetch(PDO::FETCH_ASSOC);

                                ?>
                                    <!--On insère une carte qui va se répliquer en fonction des races saisies dans la base de données.-->
                                    <div class="card px-5">
                                        <img src="<?php echo $picture_race['path']?>" class="card-img-top image-item" alt="Image de <?php echo $raceName?>">
                                        <div class="card-body">
                                            <h3 class="card-text"><?php echo $raceName?>s</h3>
                                        </div>
                                    </div>
                                <?php
                                    }
                                }
                                ?>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    <button class="carousel-control-prev carousel-button-animals" type="button" data-bs-target="#carouselExampleIndicatorsAnimals" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next carousel-button-animals" type="button" data-bs-target="#carouselExampleIndicatorsAnimals" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <!--On crée la partie "Services" de la page d'accueil.-->
        <div class="container-fluid text-end">
            <!--On insère un titre secondaire et le bouton pour aller sur la page correspondante.-->
            <div class="row mt-4">
                <div class="col-6 col-md-4"></div>
                <div class="col-6 col-md-4">
                    <h2>Nos services</h2>
                </div>
                <div class="col-6 col-md-4 pe-4">
                    <button type="button" class="btn" onclick="window.location.href ='index.php?page=services';">Découvrez tous nos services</button>
                </div>
            </div>
            <!--On insère une carte qui va se répliquer en fonction des services saisis dans la base de données.-->
            <div class="row mt-4">
                <?php
                    $l=1;
                    foreach ($services as $service) {
                        //On récupère l'ID du service et son nom.
                        $serviceID = $service['serviceID'];
                        $serviceName = $service['name'];

                        //On fait une requête dans la base de données pour afficher la 1ère photo du service sélectionné.
                        $query_picture_service = \Config\DbConnectionSQL::getPDO()->prepare("SELECT * FROM pictures WHERE serviceID LIKE :idService AND title LIKE :title");
                        $query_picture_service->bindValue(':idService',$serviceID);
                        $query_picture_service->bindValue(':title','%1');
                        $query_picture_service->execute();
                        $picture_service = $query_picture_service->fetch(PDO::FETCH_ASSOC);
                ?>
                    <div class="col-sm-4 mb-3 mb-sm-0 px-5 d-flex flex-row align-items-center justify-content-around">
                        <img src="<?php echo $picture_service['path']?>" class="img-fluid picture_service" alt="Image <?php echo $serviceName?>">
                        <h3><?php echo $serviceName?></h3>
                    </div>
                <?php
                        $l=$l+1;
                    }
               ?>
            </div>
        </div>

        <!--On crée la partie "Avis" de la page d'accueil.-->
        <div class="container-fluid text-end">
            <!--On insère un titre secondaire et le bouton pour aller sur la page correspondante.-->
            <div class="row mt-4">
                <div class="col-6 col-md-4"></div>
                <div class="col-6 col-md-4">
                    <h2>Avis clients</h2>
                </div>
                <div class="col-6 col-md-4 pe-4">
                    <button type="button" class="btn" onclick="window.location.href ='index.php?page=forms/comment&title=Donnez votre avis';">Donnez votre avis</button>
                </div>
            </div>
            <div class="row mt-4">
                <h3>
                    <?php
                        echo 'test';
                    ?>
                </h3>
            </div>
        </div>
    </main>