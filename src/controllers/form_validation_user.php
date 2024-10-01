<?php
//Chargement de l'autoload de Composer
require_once __DIR__ . '/../vendor/autoload.php';

$path='../';
require_once '../config/config.php';
//require_once '../src/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
    if (!$_POST['name'] || !$_POST['surname'] || !$_POST['email'] || !$_POST['pwd'] || ($_POST['role'] == 0)) {
        $_SESSION['message'] = 'Un des champs est vide, veuillez vérifier la saisie.';
        header('Location:../forms/CRUD_user.php');
    } else {
        $user = new \App\User($_POST['name'],$_POST['surname'],$_POST['email'],$_POST['pwd'],$_POST['role']);
        $user->createUser($user);
    }
}
