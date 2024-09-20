# ECF Zoo Arcadia

## Description du projet
Application conçue dans le cadre de ma formation chez Studi

Application Web créée dans le but d’améliorer la visibilité, la notoriété et l’image de marque du zoo Arcadia. 

Outil de travail au quotidien pour l’ensemble des employés du zoo

Son rôle est de permettre:
- aux visiteurs de découvrir les animaux et les habitats du zoo, les services proposés, les horaires d’ouverture. Il permet également de contacter le zoo et de déposer des avis.
- aux employés, vétérinaires et administrateur d'avoir une plateforme de travail, de partager des données et de visualiser des indicateurs.

## Auteur

- [@ Lucie Saurel](https://github.com/Lucie99999)

## Capture d'écran de la page d'accueil de l'application

![Page d'accueil](./assets/pictures/page_accueil_arcadia.png)
 
## Pré-requis

PHP 8.3.11 (https://www.php.net/downloads.php)

## Installation en local

Cloner le projet

```bash
  git clone https://github.com/Lucie99999/ECF_Arcadia.git
```

Aller dans le répertoire du projet

```bash
  cd ECF_Arcadia
```

Installer composer à la racine du projet

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
Installer la dépendance mongodb à la racine du projet

```bash
php composer.phar require mongodb/mongodb
```
## Utilisation

Démarrer le serveur intégré à php

```bash
php -S localhost:8080
```
Ouvrir un navigateur et saisir l'URL : http://localhost:8080/

- [Manuel d'utilisation](.Livrables/Manuel d'utilisation.pdf)

## Déploiement sur Heroku

Pour déployer ce projet :

- Créer un compte sur Heroku
- Installer Heroku sur le poste de travail mac avec la commande ci-dessous saisie dans l'invite de commande mac

```bash
  brew tap heroku/brew && brew install heroku
```
Pour d'autres systèmes d'exploitation, consulter la documentation (https://devcenter.heroku.com/articles/heroku-cli)
- S'authentifier sur la plateforme Heroku dans l'invite de commande du poste de travail :
```bash
  heroku login
```
- Ouvrir l'IDE et ouvrir un terminal de commande
- S'assurer d'être à la racine du projet et créer une application sur Heroku :
```bash
  heroku create
```
- Déployer le projet avec la commande suivante :
```bash
  git push heroku main
```




