<?php
session_start();
require('dbconnect.php');
//Réception des données du formulaire
$prenom = $_POST['prenom'];
$message = $_POST['message'];
echo "Prénom:".$prenom."<br>Message:".$message;


$insert=$db->prepare("INSERT INTO contacts(prenom, message) VALUES(?,?)");
$insert->execute(array($prenom, $message));

header('Location:formulaire.html');

?>
