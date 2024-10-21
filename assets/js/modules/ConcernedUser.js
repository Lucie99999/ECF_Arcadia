/*Fonctionnalités de la classe ConcernedUser:
 - demander à l'utilisateur quel utilisateur il souhaite modifier ou supprimer
 - retourner cet utilisateur
 */

class ConcernedUser {

    constructor(choice) {
        //On définit les propriétés de la classe.
        this.choice=choice;
        //On décide de lancer certaines méthodes à l'instanciation de la classe.
        this.init();
    }

    init() {
        this.createForm();
    }

    //Méthode permettant de créer le formulaire de saisie.
    createForm(){

        //création du formulaire

        const form = document.createElement('form');
        form.setAttribute('method', 'POST');
        if (this.choice==2) {
            form.setAttribute('action', '/UserManager/updateUser');
            form.setAttribute('id', 'update_form');
        } else {
            form.setAttribute('action', '/UserManager/deleteUser');
            form.setAttribute('id', 'delete_form');
        }

        //création du champ Email

        const label1 = document.createElement('label');
        label1.setAttribute('for', 'email');
        label1.setAttribute('class', 'form-label');
        if (this.choice==2) {
            label1.innerHTML = "Quel utilisateur souhaitez-vous modifier ? ";
        } else {
            label1.innerHTML = "Quel utilisateur souhaitez-vous supprimer ? ";
        }

        const input1 = document.createElement('input');
        input1.setAttribute('type', 'email');
        input1.setAttribute('id', 'email');
        input1.setAttribute('name', 'email');
        input1.setAttribute('placeholder', 'Email de l\'employé');
        input1.setAttribute('class', 'form-control mb-2');
        input1.setAttribute('required', true);

        //On ajoute les éléments au formulaire
        form.appendChild(label1);
        form.appendChild(input1);

        //création du reste du formulaire dans le cadre d'une modification d'utilisateur
        if (this.choice==2) {

            //création du sélecteur pour choisir le champ à modifier

            const label5 = document.createElement('label');
            label5.setAttribute('for', 'modif');
            label5.innerHTML = "Quel champ souhaitez-vous modifier ?";

            const select1 = document.createElement('select');
            select1.setAttribute('id', 'field');
            select1.setAttribute('name', 'field');
            select1.setAttribute('class', 'form-select mb-2');

            const option0 = document.createElement('option');
            option0.setAttribute('value', '');
            option0.innerHTML = "Choisissez un champ à modifier";

            const option1 = document.createElement('option');
            option1.setAttribute('value', '1');
            option1.innerHTML = "NOM";

            const option2 = document.createElement('option');
            option2.setAttribute('value', '2');
            option2.innerHTML = "PRENOM";

            const option3 = document.createElement('option');
            option3.setAttribute('value', '3');
            option3.innerHTML = "EMAIL";

            const option4 = document.createElement('option');
            option4.setAttribute('value', '4');
            option4.innerHTML = "MOT DE PASSE";

            const option5 = document.createElement('option');
            option5.setAttribute('value', '5');
            option5.innerHTML = "ROLE";

            const option6 = document.createElement('option');
            option6.setAttribute('value', '6');
            option6.innerHTML = "PHOTO";

            select1.appendChild(option0);
            select1.appendChild(option1);
            select1.appendChild(option2);
            select1.appendChild(option3);
            select1.appendChild(option4);
            select1.appendChild(option5);
            select1.appendChild(option6);
            form.appendChild(label5);
            form.appendChild(select1);

            //On ajoute une div pour l'élément à modifier : cela nous permettra de le vider à chaque changement de sélection.
            const divSelect = document.createElement('div');
            divSelect.setAttribute('id', 'divSelect');
            form.appendChild(divSelect);

            select1.addEventListener('change', () => {
                //on réinitialise la div
                divSelect.innerHTML="";

                //création du champ valeur à modifier

                const label2 = document.createElement('label');
                label2.setAttribute('for', 'change');
                label2.setAttribute('class', 'form-label');
                label2.innerHTML = "Quel nouvelle valeur souhaitez-vous lui attribuer ? ";
                //On ajoute l'élément à la div
                divSelect.appendChild(label2);

                //Si le champ à modifier n'est pas le rôle
                if (select1.value!=5){
                    const input2 = document.createElement('input');
                    input2.setAttribute('class', 'form-control mb-2');
                    //Si le champ à modifier est nom, prénom ou photo
                    if (select1.value==1 || select1.value==2 || select1.value==6) {
                        input2.setAttribute('type', 'text');
                        input2.setAttribute('placeholder', 'Saisir la valeur de remplacement');
                        //Si le champ à modifier est l'email
                    } else if (select1.value==3) {
                        input2.setAttribute('type', 'email');
                        input2.setAttribute('placeholder', 'Email de remplacement');
                        //Si le champ à modifier est le mot de passe
                    } else if (select1.value==4) {
                        input2.setAttribute('type', 'password');
                        input2.setAttribute('placeholder', 'Mot de passe de remplacement');
                    }
                    //On ajoute l'élément à la div
                    divSelect.appendChild(input2);
                } else {

                    //On crée le select s'il s'agit du rôle à modifier.
                    const select2 = document.createElement('select');
                    select2.setAttribute('id', 'change');
                    select2.setAttribute('name', 'change');
                    select2.setAttribute('class', 'form-select mb-2');

                    const option00 = document.createElement('option');
                    option00.setAttribute('value', '');
                    option00.innerHTML = "Choisissez un rôle";

                    const option20 = document.createElement('option');
                    option20.setAttribute('value', '3');
                    option20.innerHTML = "ROLE_EMP";

                    const option30 = document.createElement('option');
                    option30.setAttribute('value', '2');
                    option30.innerHTML = "ROLE_VET";

                    //On ajoute les éléments au formulaire.
                    select2.appendChild(option00);
                    select2.appendChild(option20);
                    select2.appendChild(option30);
                    divSelect.appendChild(select2);
                }
            })
        }
        //création du bouton annuler

        const button1 = document.createElement('button');
        button1.setAttribute('type', 'button');
        button1.setAttribute('class', 'btn mb-2');
        button1.setAttribute('onclick', "window.location.href ='/UserManager/display';");
        button1.innerHTML = 'Annuler';

        //création du bouton submit

        const submit1 = document.createElement('button');
        submit1.setAttribute('type', 'submit');
        submit1.setAttribute('class', 'btn mb-2 ms-2');
        if (this.choice==2) {
            submit1.innerHTML = 'Modifier l\'utilisateur';
        } else {
            submit1.innerHTML = "Supprimer l\'utilisateur";
        }

        //On ajoute les éléments au formulaire.
        form.appendChild(button1);
        form.appendChild(submit1);

        //On ajoute le formulaire à la div existante du fichier HTML
        document.querySelector("#displayChoice").appendChild(form);
    }

}

export {ConcernedUser};