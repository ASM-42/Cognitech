<?php
try {
    $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
    $db = new PDO('mysql:host=localhost;dbname=coursbdd;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //Mettre les noms des champs en majuscule
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die('Erreur : '.$e->getMessage());
}
?>
