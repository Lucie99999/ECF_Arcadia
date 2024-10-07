    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-1 me-4">
                    <a href="/landingpage/display">
                        <img class="logo" src="../assets/pictures/Logo.png" alt="Logo Zoo Arcadia" width="104" height="104">
                    </a>
                </div>
                <div class="col-2 mb-3">
                    <p class="bold">VENIR</p>
                    <p>Zoo Arcadia</p>
                    <p>Route de Brocéliande</p>
                    <p>56800 CAMPENEAC</p>
                    <a href="/landingpage/display">Accéder au parc</a>
                </div>
                <div class="col text-center align-self-center">
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
                <div class="col-3 text-center">
                    <p>Horaires</p>
                </div>
            </div>
            <div class="row">
                <div class="d-flex flex-row justify-content-between px-4 pb-3">
                    <a class="link-offset-3 footer_link" href="/landingpage/display">©️ Arcadia 2024</a>
                    <a class="link-offset-3 footer_link" href="#">Mentions légales</a>
                    <a class="link-offset-3 footer_link" href="#">Données personnelles</a>
                    <a class="link-offset-3 footer_link" href="#">Politique de gestion des cookies</a>
                    <a class="link-offset-3 footer_link" href="#">CGV</a>
                    <a class="link-offset-3 footer_link" href="#">Règlement intérieur</a>
                    <a class="link-offset-3 footer_link" href="#">Plan du site</a>
                </div>
            </div>
        </div>
    </footer>
<!--J'intègre mon script JS à ma page.-->
<?php if (isset($nameJSsheet)) {?>
    <script src="assets/js/<?php echo $nameJSsheet ?>.js"></script>
<?php } ?>
<!--J'intègre mon script Fontawesome pour les icônes.-->
<script src="https://kit.fontawesome.com/9cdb1625d6.js" crossorigin="anonymous"></script>
<!--J'intègre le framework Bootstrap à mon projet.-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>