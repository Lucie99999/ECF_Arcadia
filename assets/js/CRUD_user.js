import {SearchUsers} from "./modules/SearchUsers.js";
import {Inscription} from "./modules/Inscription.js";

//On fait appel à l'élément ayant pour id choice dans le fichier HTML lié.
let choice = document.getElementById('choice');
let displayChoice = document.getElementById('displayChoice');

choice.addEventListener('change', () => {
    //Si le choix est de créer un utilisateur, alors on affiche le formulaire pour le créer.
    if (choice.value == 0) {
        //On réinitialise la div DisplayChoice.
        displayChoice.innerHTML = "";
    } else if (choice.value == 1) {
        //On réinitialise la div DisplayChoice.
        displayChoice.innerHTML = "";
        //On crée le formulaire pour créer un utilisateur.
        new Inscription();
    } else if (choice.value == 2) {
        //On réinitialise la div DisplayChoice.
        displayChoice.innerHTML = "";
        //On affiche le tableau de l'ensemble des utilisateurs du zoo.
        new SearchUsers(2);
    } else if (choice.value == 3) {
        //On réinitialise la div DisplayChoice.
        displayChoice.innerHTML = "";
        //On affiche le tableau de l'ensemble des utilisateurs du zoo.
        new SearchUsers(3);
    }
})


