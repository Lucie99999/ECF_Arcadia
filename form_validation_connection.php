<?php

require_once 'config/pdoSQL.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
    if (!$_POST['mail'] || !$_POST['pwd']) {
        $_SESSION['message'] = 'Vous n\'avez pas rempli tous les éléments permettant la connexion. Veuillez vérifier et recommencer.';
        header('Location:../forms/connection.php');
    } else {
        //On vient vérifier si un utilisateur de la base de données correspond à l'utilisateur saisi dans le formulaire de connexion.
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :mail");
        $statement->bindValue(':mail', $_POST['mail']);
        if ($statement->execute()) {
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            if($user === false) {
                //On n'indique pas à l'utilisateur qu'il s'agit de l'email qui ne convient pas pour une question de sécurité.
                $_SESSION['message'] = 'Identifiants invalides';
                header('Location:../forms/connection.php');
            } else {
                //On vérifie le hash du password.
                if (password_verify($_POST['pwd'], $user['password'])) {
                    unset($user['password']);
                    $_SESSION['user'] = $user;
                    header('Location:../templates/professional_space.php');
                } else {
                    $_SESSION['message'] = 'Identifiants invalides';
                    header('Location:../forms/connection.php');
                }
            }
        } else {
            $_SESSION['message'] = 'Identifiants invalides';
            header('Location:../forms/connection.php');
        }
    }

}
?>
