<?php

include("connect.php"); //Contient les valeurs des variables SERVEUR, LOGIN, MDP et BDD

if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {

    // On regarde si les variables existent et on s'assure que les champs ne soient pas vides
    if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['mdp1']) && !empty($_POST['mdp1']))
        && (isset($_POST['mdp2']) && !empty($_POST['mdp2']))) {

        // On regarde si les 2 mdp sont similaires
        if ($_POST['mdp1'] != $_POST['mdp2']) {
            $erreur = 'Les 2 mdp sont differents.';echo $erreur;
            echo"<br/><a href=\"accueil.php\">Accueil</a>";exit();}

        else {
            // Si les mdp correspondent, connexion à la BDD
            $connexion = mysqli_connect (SERVEUR, LOGIN, MDP);

            if (!$connexion) {echo "La connexion à la bdd a échoué\n"; exit();}

            mysqli_select_db ($connexion, BDD); print "Connexion à la bdd réussie puis";echo "<br/>";

            // On parcourt la bdd et on range les éventuels login identiques existants dans un tableau
            $sql = 'SELECT count(*) FROM membres WHERE id="'.mysqli_escape_string($connexion, $_POST['login']).'"';
            $req = mysqli_query($connexion, $sql) or die('Erreur SQL !<br/>'.$sql.'<br/>'.mysqli_error($connexion));
            $data = mysqli_fetch_array($req);

            // Si le login n'est pas déjà utilisé, on inscrit l'utilisateur
            if ($data[0] == 0) {
                $sql = 'INSERT INTO membres VALUES(NULL,"'.mysqli_escape_string($connexion, $_POST['login']).'", 
                "'.mysqli_escape_string($connexion, md5($_POST['mdp1'])).'", 
                "'.mysqli_escape_string($connexion, $_POST['nom']).'", 
                "'.mysqli_escape_string($connexion, $_POST['prenom']).'", 
                "'.mysqli_escape_string($connexion, $_POST['dateDeNaissance']).'", 
                "'.mysqli_escape_string($connexion, $_POST['email']).'"
                )';
                mysqli_query($connexion, $sql) or die('Erreur SQL !'.$sql.'<br />'.mysqli_error($connexion));
                $erreur = 'inscription reussie !';
                echo $erreur;
                echo"<br/><a href=\"accueil.php\">Accueil</a>";exit();}

            //Sinon on n'inscrit pas l'utilisateur
            else {
                $erreur = 'Echec de l\'inscription !<br/>Login déjà utilisé';
                echo $erreur;
                echo"<br/><a href=\"accueil.php\">Accueil</a>";exit();
            }}}

    //Si au moins un des champs est vide --> erreur
    else {
        $erreur = 'Echec de l\'inscription !<br/>Au moins un des champs est vide';
        echo $erreur;
        echo"<br/><a href=\"accueil.php\">Accueil</a>";exit();
    }}
?>

