<?php

require_once '../config/pdoSQL.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
    if (!$_POST['name'] || !$_POST['surname'] || !$_POST['email'] || !$_POST['pwd'] || ($_POST['role'] == 0)) {
        echo 'Un des champs est vide, veuillez vérifier la saisie.';
    } else {
        $sql = 'INSERT INTO users(userID, name,firstname,email,password,createdAt,roleID) VALUES (UUID(),:name,:firstname,:email,:password, NOW(), :role)';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':name', htmlspecialchars($_POST['name']));
        $statement->bindValue(':firstname', htmlspecialchars($_POST['surname']));
        $statement->bindValue(':email', htmlspecialchars($_POST['email']));
        $statement->bindValue(':role', $_POST['role']);
        //On hashe le mot de passe en utilisant BCRYPT
        $statement->bindValue(':password', password_hash($_POST['pwd'], PASSWORD_BCRYPT));
        if ($statement->execute()) {
            $_SESSION['message'] = 'L\'utilisateur a bien été créé.';
            header('Location:../forms/CRUD_user.php');
        } else {
            $_SESSION['message'] = 'Impossible de créer l\'utilisateur.';
            header('Location:../forms/CRUD_user.php');
        }
    }
}
