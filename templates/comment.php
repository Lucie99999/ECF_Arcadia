<main>
    <?php
    if (isset($_SESSION['message'])){ ?>
        <div class="alert alert-warning" role="alert">
            <?php echo $_SESSION['message'];
                  unset($_SESSION['message']);?>
        </div>
    <?php } ?>

    <!-- On ajoute le rappel aux pages précédentes.-->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/landingpage/display">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Avis</li>
        </ol>
    </nav>

    <!--On crée le formulaire pour laisser des avis-->
    <form class="d-flex flex-column align-items-center m-5 px-5" action="/comment/managePostForm" method="post">
        <div class="m-4">
            <label for="surname">Prénom :</label>
            <input type="text" id="surname" name="surname" placeholder="Votre prénom">
        </div>
        <div class="m-4">
            <label for="stars">Nombre d'étoiles :</label>
            <select name="stars" id="stars">
                <option value="">--Choisissez une valeur--</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div>
            <label for="comment">Commentaire :</label>
            <textarea type="text" id="comment" name="comment" rows="20" cols="35" placeholder="Ecrivez votre commentaire ici"></textarea>
        </div>
        <div class="m-4">
            <button type="button" class="btn" onclick="window.location.href ='/landingpage/display';">Annuler</button>
            <button type="submit" class="btn" >Soumettre mon avis</button>
        </div>
    </form>
</main>

