/*Fonctionnalité de la classe SecurityInscription:
 - vérifier que les données rentrées par l'utilisateur sont conformes aux expressions régulières souhaitées
 - lancer le formulaire
 */

class SecurityInscription {

    constructor() {
        this.form = document.querySelector(".js-creation-form");
        this.init();
    }

    init(){
        this.securityCheck();
    }

    securityCheck(){
        this.form.addEventListener("submit",(event)=>{
            //Inhibition du rechargement de page.
            event.preventDefault();

            //Récupération des données
            const name = document.getElementById("name").value;
            const surname = document.getElementById("surname").value;
            const mail = document.getElementById("email").value;
            const password = document.getElementById("pwd").value;
            const errorElement = document.getElementById("error");

            //Détermination des regex rattachés aux 2 champs à contrôler
            const nameRegex = new RegExp('[A-Z]+\'?-?[A-Z]+');
            const surnameRegex = new RegExp('^[A-Z][a-zà-ÿ]+-*[A-Z]*[a-zà-ÿ]*')
            const mailRegex = new RegExp('[a-z]+-?[a-z]*.[a-z]+-?[a-z]*@arcadia.fr');
            const passwordRegex = new RegExp(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,}$/);

            //Vérification des entrées utilisateurs
            if (((mailRegex.test(mail)) && (passwordRegex.test(password)) && (nameRegex.test(name)) && (surnameRegex.test(surname))) == false)  {
                errorElement.textContent = "Veuillez entrer des données valides.";
                errorElement.setAttribute('class','alert alert-danger');
                errorElement.setAttribute('role','alert');
            } else {
               this.form.submit();
            }
            this.form.reset();
        });
    }

}

export {SecurityInscription};