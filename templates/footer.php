<?php
use App\controllers\Hours;
?>
<footer>
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-6 col-md-1 my-3 text-center">
                    <a href="/landingpage/display">
                        <img class="logo" src="../assets/pictures/Logo.png" alt="Logo Zoo Arcadia" width="104" height="104">
                    </a>
                </div>
                <div class="col-6 col-md-2 my-3">
                    <p class="bold pb-3">VENIR</p>
                    <p>Zoo Arcadia</p>
                    <p>Route de Brocéliande</p>
                    <p>56800 CAMPENEAC</p>
                    <a href="/landingpage/display">Accéder au parc</a>
                </div>
                <div class="col-12 col-md-4 text-center align-self-center pb-3">
                    <p>Suivez-nous sur les réseaux !</p>
                    <div class="d-flex flex-row justify-content-center">
                        <a class="mx-2" href="#">
                            <i class="fa-brands fa-facebook-f" style="color: #ef813e;"></i>
                        </a>
                        <a class="mx-2" href="#">
                            <i class="fa-brands fa-x-twitter" style="color: #ef813e;"></i>
                        </a>
                        <a class="mx-2" href="#">
                            <i class="fa-brands fa-instagram" style="color: #ef813e;"></i>
                        </a>
                        <a class="mx-2" href="#">
                            <i class="fa-brands fa-pinterest-p" style="color: #ef813e;"></i>
                        </a>
                        <a class="mx-2" href="#">
                            <i class="fa-brands fa-tiktok" style="color: #ef813e;"></i>
                        </a>
                    </div>
                </div>
                <div class="col-0 col-md-1"></div>
                <div class="col-12 col-md-2 my-3">
                    <p class="bold text-center pb-3">HORAIRES</p>
                    <p class="text-center"><?php
                    $objet = new Hours();
                    $cursor = $objet->readHours();
                    foreach ($cursor as $hour) {
                        echo "Lundi : ".$hour['lundi']."<br>";
                        echo "Mardi : ".$hour['mardi']."<br>";
                        echo "Mercredi : ".$hour['mercredi']."<br>";
                        echo "Jeudi : ".$hour['jeudi']."<br>";
                        echo "Vendredi : ".$hour['vendredi']."<br>";
                        echo "Samedi : ".$hour['samedi']."<br>";
                        echo "Dimanche : ".$hour['dimanche']."<br>";
                    }
                    ?></p>
                </div>
            </div>
            <div class="row justify-content-center text-center mx-1">
                    <a class="col-3 col-sm-1 p-0 link-offset-3 footer_link" href="/landingpage/display">©️ Arcadia 2024</a>
                    <a class="col-3 col-sm-2 p-0 link-offset-3 footer_link" href="#">Mentions légales</a>
                    <a class="col-4 col-sm-2 p-0 link-offset-3 footer_link" href="#">Données personnelles</a>
                    <a class="col-5 col-sm-2 p-0 link-offset-3 footer_link" href="#">Gestion des cookies</a>
                    <a class="col-1 p-0 link-offset-3 footer_link" href="#">CGV</a>
                    <a class="col-4 col-sm-2 p-0 link-offset-3 footer_link" href="#">Règlement intérieur</a>
                    <a class="col-2 col-sm-1 p-0 link-offset-3 footer_link" href="#">Plan du site</a>
            </div>
        </div>
    </footer>
<!--J'intègre mon script JS à ma page.-->
<?php if (isset($_SESSION['JSstylesheet'])) {?>
    <script type=module src="../assets/js/<?php echo $_SESSION['JSstylesheet'] ?>.js"></script>
<?php }
    unset($_SESSION['JSstylesheet']);?>
<!--J'intègre mon script Fontawesome pour les icônes.-->
<script src="https://kit.fontawesome.com/9cdb1625d6.js" crossorigin="anonymous"></script>
<!--J'intègre le framework Bootstrap à mon projet.-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>