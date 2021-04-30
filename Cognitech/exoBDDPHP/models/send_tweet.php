<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = "coursbdd";

$connexion = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['submit'])) {
    if(!empty($_POST['auteur']) && !empty($_POST['tweet'])) {
        $auteur = $_POST['auteur'];
        $texte = $_POST['tweet'];

        $sql = 'INSERT INTO tweets VALUES(NULL,"'.mysqli_escape_string($connexion, $_POST['auteur']).'", 
                "'.mysqli_escape_string($connexion, $_POST['tweet']).'",
                DEFAULT
                )';

        $run = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

        if ($run) {
            echo "Form envoyé";
        } else {
            echo "Form non envoyé";
        }
    } else {
        echo "Tous les champs sont requis";
    }
}

?>