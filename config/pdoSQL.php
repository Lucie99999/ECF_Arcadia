<?php

try {
    $pdo = new PDO('mysql:host=mysql-lsaurel.alwaysdata.net;dbname=lsaurel_ecfarcadia', 'lsaurel_ecf',
    'S*EN*JHJ3ne-zJ@');

    //On démarre une session si elle n'est pas active.
    if (session_status() === 1) {
        session_start();
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>