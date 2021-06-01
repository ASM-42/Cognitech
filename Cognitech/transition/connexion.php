<?php

include("connect.php"); //Contient les valeurs des variables SERVEUR, LOGIN, MDP et BDD

if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
    if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['pwd']) && !empty($_POST['pwd']))) {

        //Connexion à la BDD
        $connexion = mysqli_connect (SERVEUR, LOGIN, MDP);

        if (!$connexion) {echo "La connexion a échoué\n"; exit;}
        mysqli_select_db ($connexion,BDD);

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

            $bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");
            $email = $_SESSION['email'];
            $sql = $bdd -> query('SELECT * FROM users WHERE email="'.$email.'"');
            $result = $sql -> fetch();
            $_SESSION['user_id'] = $result['id'];
            $user_id = $_SESSION['user_id'];


            if ($result['role'] == 'pilote') {
                header('Location:../views/profil.php?id='.$user_id);
            } else if  ($result['role'] == 'gestionnaire'){
                header('Location:../views/accueil_gestionnaire.php');
            }
            elseif ($result['role'] == 'admin') {
                header('Location:../views/accueil_admin.php');
            }
            else {
                $erreur = 2;
                Header("location:../views/se_connecter.php?message=".$erreur);
            }

            exit();}

        // Si le visiteur a saisi un mauvais login ou mot de passe --> erreur
        elseif ($data[0] == 0) {
            $erreur1 = 1;

            Header("location:../views/se_connecter.php?message=".$erreur1);
        }

        // Sinon --> autre problème
        else {
            $erreur = 3;
            Header("location:../views/se_connecter.php?message=".$erreur);}}


    // Si l'un des champs est vide --> erreur
    else {
        $erreur = 3;
        Header("location:../views/se_connecter.php?message=".$erreur);}}
?>

