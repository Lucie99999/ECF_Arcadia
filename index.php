<?php
require_once 'config/pdo.php';

/*On fait une requête dans la base de données pour afficher tous les habitats.*/
$query_habitats = $pdo->query("SELECT * FROM habitats");
$habitats = $query_habitats->fetchAll(PDO::FETCH_ASSOC);

$title="Bienvenue au zoo Arcadia";
require_once "templates/header.php";
?>
    <main>
        <!--On met le titre.-->
        <h1>Bienvenue au zoo Arcadia</h1>

        <!--On insère le caroussel général du zoo.-->
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner carousel-general">
                <div class="carousel-item active">
                    <img src="./assets/pictures/global_zoo/pexels-guerrero-de-la-luz-346901328-24991332.jpg" class="d-block w-100" alt="Vue globale du zoo, habitat Savane">
                </div>
                <div class="carousel-item">
                    <img src="./assets/pictures/global_zoo/pexels-evelina-ulickaite-3892657-24994444.jpg" class="d-block w-100" alt="Femme avec des chèvres">
                </div>
                <div class="carousel-item">
                    <img src="./assets/pictures/global_zoo/pexels-zoosnow-803412-1680214.jpg" class="d-block w-100" alt="Vue sur le marais, ensemble de flamants roses">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
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
                    <button type="button" class="btn" onclick="window.location.href ='#';">Découvrez tous nos habitats</button>
                </div>
            </div>
            <!--On insère une carte qui va se répliquer en fonction des habitats saisis dans la base de données.-->
            <div class="row">
                <?php
                    $i=1;
                    foreach ($habitats as $habitat) {
                ?>
                    <div class="col-sm-4 mb-3 mb-sm-0 px-5">
                        <div class="card">
                            <div id="carouselCards<?php echo $i ?>" class="carousel slide">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselCards<?php echo $i ?>" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselCards<?php echo $i ?>" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselCards<?php echo $i ?>" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner style="height="50px;">
                                    <div class="carousel-item active">
                                        <img src="./assets/pictures/savane/pexels-rachel-claire-4846091.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="./assets/pictures/savane/ class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="..." class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselCards<?php echo $i ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselCards<?php echo $i ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="card-body">
                                <a href="#" class="card-link"><?php echo $habitat['name']?></a>
                            </div>
                        </div>
                    </div>
                <?php
                    $i=$i+1;
                    } ?>
            </div>
        </div>

        <!--On insère un titre secondaire et le bouton pour aller sur la page correspondante.-->
        <div class="container-fluid text-end">
            <div class="row">
                <div class="col-6 col-md-4"></div>
                <div class="col-6 col-md-4">
                    <h2>Nos animaux</h2>
                </div>
                <div class="col-6 col-md-4 pe-4">
                    <button type="button" class="btn" onclick="window.location.href ='#';">Découvrez tous nos animaux</button>
                </div>
            </div>
        </div>

        <!--On insère un titre secondaire et le bouton pour aller sur la page correspondante.-->
        <div class="container-fluid text-end">
            <div class="row">
                <div class="col-6 col-md-4"></div>
                <div class="col-6 col-md-4">
                    <h2>Nos services</h2>
                </div>
                <div class="col-6 col-md-4 pe-4">
                    <button type="button" class="btn" onclick="window.location.href ='#';">Découvrez tous nos services</button>
                </div>
            </div>
        </div>

        <!--On insère un titre secondaire et le bouton pour aller sur la page correspondante.-->
        <div class="container-fluid text-end">
            <div class="row">
                <div class="col-6 col-md-4"></div>
                <div class="col-6 col-md-4">
                    <h2>Avis clients</h2>
                </div>
                <div class="col-6 col-md-4 pe-4">
                    <button type="button" class="btn" onclick="window.location.href ='#';">Donnez votre avis</button>
                </div>
            </div>
        </div>
    </main>
<?php
require_once "templates/footer.php";
?>