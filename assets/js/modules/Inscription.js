/*Fonctionnalités de la classe Inscription :
 - créer le formulaire permettant à l'utilisateur de créer un nouvel utilisateur
 */

class Inscription {

    constructor() {
        //On lance la méthode qui crée le formulaire.
        this.createForm();
    }

    createForm(){

        //création du formulaire
        const form = document.createElement('form');
        form.setAttribute('method', 'POST');
        form.setAttribute('action', '/UserManager/createUser');
        form.setAttribute('id', 'creation_form');

        //création du champ Nom

        const label1 = document.createElement('label');
        label1.setAttribute('for', 'name');
        label1.setAttribute('class', 'form-label');
        label1.innerHTML = "Nom : ";

        const input1 = document.createElement('input');
        input1.setAttribute('type', 'text');
        input1.setAttribute('id', 'name');
        input1.setAttribute('name', 'name');
        input1.setAttribute('placeholder', 'Nom de l\'employé');
        input1.setAttribute('class', 'form-control');
        input1.setAttribute('required', true);

        //création du champ Prénom

        const label2 = document.createElement('label');
        label2.setAttribute('for', 'surname');
        label2.setAttribute('class', 'form-label');
        label2.innerHTML = "Prénom : ";

        const input2 = document.createElement('input');
        input2.setAttribute('type', 'text');
        input2.setAttribute('id', 'surname');
        input2.setAttribute('name', 'surname');
        input2.setAttribute('placeholder', 'Prénom de l\'employé');
        input2.setAttribute('class', 'form-control');
        input2.setAttribute('required', true);

        //création du champ Email

        const label3 = document.createElement('label');
        label3.setAttribute('for', 'email');
        label3.setAttribute('class', 'form-label');
        label3.innerHTML = "Email : ";

        const input3 = document.createElement('input');
        input3.setAttribute('type', 'email');
        input3.setAttribute('id', 'email');
        input3.setAttribute('name', 'email');
        input3.setAttribute('placeholder', 'Email de l\'employé');
        input3.setAttribute('class', 'form-control');
        input3.setAttribute('required', true);

        //création du champ Mot de passe

        const label4 = document.createElement('label');
        label4.setAttribute('for', 'pwd');
        label4.setAttribute('class', 'form-label');
        label4.innerHTML = "Mot de passe : ";

        const input4 = document.createElement('input');
        input4.setAttribute('type', 'password');
        input4.setAttribute('id', 'pwd');
        input4.setAttribute('name', 'pwd');
        input4.setAttribute('placeholder', 'Mot de passe de l\'employé');
        input4.setAttribute('class', 'form-control');
        input4.setAttribute('required', true);

        //création du champ Rôle

        const label5 = document.createElement('label');
        label5.setAttribute('for', 'role');
        label5.innerHTML = "Rôle : ";

        const select1 = document.createElement('select');
        select1.setAttribute('id', 'role');
        select1.setAttribute('name', 'role');
        select1.setAttribute('class', 'form-select mb-2');

        const option0 = document.createElement('option');
        option0.setAttribute('value', '');
        option0.innerHTML = "Choisissez un rôle";

        const option2 = document.createElement('option');
        option2.setAttribute('value', '3');
        option2.innerHTML = "ROLE_EMP";

        const option3 = document.createElement('option');
        option3.setAttribute('value', '2');
        option3.innerHTML = "ROLE_VET";

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
        submit1.innerHTML = 'Créer l\'utilisateur';

        //On ajoute les éléments au formulaire

        select1.appendChild(option0);
        select1.appendChild(option2);
        select1.appendChild(option3);
        form.appendChild(label1);
        form.appendChild(input1);
        form.appendChild(label2);
        form.appendChild(input2);
        form.appendChild(label3);
        form.appendChild(input3);
        form.appendChild(label4);
        form.appendChild(input4);
        form.appendChild(label5);
        form.appendChild(select1);
        form.appendChild(button1);
        form.appendChild(submit1);

        //On ajoute le formulaire à la div existante du fichier HTML
        document.querySelector("#displayChoice").appendChild(form);
    }
}

export {Inscription};