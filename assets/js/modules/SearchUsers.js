/*Fonctionnalités de la classe SearchUsers :
 - récupérer l'ensemble des utilisateurs dans la base de données
 - créer un tableau
 - insérer les données utilisateurs dans le tableau.
 */
import {ConcernedUser} from "./ConcernedUser.js";

class SearchUsers {

    constructor(choice){
        //On définit les propriétés de la classe.
        this.choice=choice;
        //On lance la méthode qui récupère les données employés.
        this.getEmployees();
    }

    //Méthode permettant de récupérer les données de l'ensemble des utilisateurs de la plateforme professionnelle du zoo.
    getEmployees(){
        //On saisit l'URL où on récupère les données.
        fetch('/UserManager/readAllUsers')
            .then(response => {
                if (!response.ok){
                    throw new Error('Erreur de réseau');
                }
                return response.json();
            })
            .then(data => {
                //On crée le tableau avec les valeurs trouvées en base de données.
                this.createTable(data);
                //On affiche le formulaire permettant d'identiquer l'utilisateur à modifier et à supprimer.
                new ConcernedUser(this.choice);
            })
            .catch(error => {
                console.log('Erreur de fetch'.error);
            });
    }

    //Méthode permettant de créer un tableau avec les données récupérées.
    createTable(array){
        //introduction au tableau des utilisateurs
        const intro = document.createElement('p');
        intro.innerHTML = "Pour rappel, voici la liste de tous les employés travaillant actuellement au zoo :";
        //création de la structure de la table
        const table1 = document.createElement('table');
        table1.setAttribute('id', 'tableUser');
        table1.setAttribute('class', 'table table-bordered table-striped');
        //création de la ligne entête du tableau
        const head = document.createElement('thead');
        const tr1 = document.createElement('tr');
        const th1 = document.createElement('th');
        th1.setAttribute('scope', 'col');
        const th2 = document.createElement('th');
        th2.setAttribute('scope', 'col');
        const th3 = document.createElement('th');
        th3.setAttribute('scope', 'col');
        const th4 = document.createElement('th');
        th4.setAttribute('scope', 'col');
        const th5 = document.createElement('th');
        th5.setAttribute('scope', 'col');
        th1.innerHTML = "N°";
        th2.innerHTML = "Nom";
        th3.innerHTML = "Prénom";
        th4.innerHTML = "Email";
        th5.innerHTML = "Rôle";
        //Ajout des éléments au tableau.
        head.appendChild(tr1);
        tr1.appendChild(th1);
        tr1.appendChild(th2);
        tr1.appendChild(th3);
        tr1.appendChild(th4);
        tr1.appendChild(th5);
        table1.appendChild(head);
        //création du corps du tableau
        const body = document.createElement('tbody');
        //création d'une ligne pour chaque employé
        for (let i=0; i < array.length; i++) {
            const tr =document.createElement('tr');
            const th =document.createElement('th');
            th.setAttribute('scope', 'row');
            th.innerHTML = i+1;
            const td1 = document.createElement('td');
            td1.innerHTML = array[i][0];
            const td2 = document.createElement('td');
            td2.innerHTML = array[i][1];
            const td3 = document.createElement('td');
            td3.innerHTML = array[i][2];
            const td4 = document.createElement('td');
            td4.innerHTML = array[i][3];
            tr.appendChild(th);
            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            body.appendChild(tr);
            table1.appendChild(body);
        }
        //On ajoute le tableau et l'intro à la div existante du fichier HTML
        document.querySelector("#displayChoice").appendChild(intro);
        document.querySelector("#displayChoice").appendChild(table1);

    }
}

export {SearchUsers};