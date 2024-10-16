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
        //création de la structure de la table
        const table1 = document.createElement('table');
        table1.setAttribute('id', 'tableUser');
        table1.innerHTML = "Pour rappel, voici la liste de tous les employés travaillant actuellement au zoo :";
        //création de la ligne entête du tableau
        const tr1 = document.createElement('tr');
        const th1 = document.createElement('th');
        const th2 = document.createElement('th');
        const th3 = document.createElement('th');
        const th4 = document.createElement('th');
        th1.innerHTML = "Nom";
        th2.innerHTML = "Prénom";
        th3.innerHTML = "Email";
        th4.innerHTML = "Rôle";
        //Ajout des éléments au tableau.
        tr1.appendChild(th1);
        tr1.appendChild(th2);
        tr1.appendChild(th3);
        tr1.appendChild(th4);
        table1.appendChild(tr1);
        //création d'une ligne pour chaque employé
        for (let i=0; i < array.length; i++) {
            const tr =document.createElement('tr');
            const td1 = document.createElement('td');
            td1.innerHTML = array[i][0];
            const td2 = document.createElement('td');
            td2.innerHTML = array[i][1];
            const td3 = document.createElement('td');
            td3.innerHTML = array[i][2];
            const td4 = document.createElement('td');
            td4.innerHTML = array[i][3];
            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            table1.appendChild(tr);
        }
        //On ajoute le tableau à la div existante du fichier HTML
        document.querySelector("#displayChoice").appendChild(table1);
    }
}

export {SearchUsers};