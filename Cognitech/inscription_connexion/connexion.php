<?php

include("connect.php"); //Contient les valeurs des variables SERVEUR, LOGIN, MDP et BDD

if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
    if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['pwd']) && !empty($_POST['pwd']))) {

        //Connexion à la BDD
        $connexion = mysqli_connect (SERVEUR, LOGIN, MDP);

        if (!$connexion) {echo "La connexion a échoué\n"; exit;}
        mysqli_select_db ($connexion,BDD); print "Connexion BDD reussie puis";echo "<br/>";

        //on parcourt la bdd pour chercher l'existence du login mot et du mot de passe saisis par l'internaute
        //et on range le résultat dans le tableau $data
        $sql = 'SELECT count(*) 
                FROM users WHERE email="'.mysqli_escape_string($connexion, $_POST['email']).'" 
                AND md5="'.mysqli_escape_string($connexion, md5($_POST['pwd'])).'"';

        $req = mysqli_query($connexion, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connexion));
        $data = mysqli_fetch_array($req);


        // Si on obtient une réponse, alors l'utilisateur fait partie de la bdd
        // On démarre une session pour cet utilisateur et on le connecte à l'espace membre
        if ($data[0] == 1){
            session_start();
            $_SESSION['email']=$_POST['email'];
            header('Location:../profil.php');
            exit();}

        // Si le visiteur a saisi un mauvais login ou mot de passe --> erreur
        elseif ($data[0] == 0) {
            $erreur = 'Login ou mot de passe erroné';echo $erreur;
            echo"<br/><a href=\"se_connecter.php\">Accueil</a>";exit();}

        // Sinon --> autre problème
        else {
            $erreur = 'Plusieurs membres ont<br/>les memes login et mot de passe';echo $erreur;
            echo"<br/><a href=\"se_connecter.php\">Accueil</a>";exit();}}


    // Si l'un des champs est vide --> erreur
    else {
        $erreur = 'Errreur de saisie !<br/>Au moins un des champs est vide'; echo $erreur;
        echo"<br/><a href=\"se_connecter.php\">Accueil</a>";exit();}}
?>

