<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="../css/connexion.css">
    <title>Connexion</title>
</head>
<body>
<main class="main">
<div>
    <i class="material-icons colorWhite" style="font-size: 10em;">person_outline</i>
    <div class="formulaire">
        <?php
        if (isset($_GET['message']) && $_GET['message']== '1')
        {
            ?>
            <p>Email ou mot de passe erroné</p>
        <?php } elseif (isset($_GET['message']) && $_GET['message']== '2') {
            ?>
            <p>Votre inscription n'a pas encore été validée.</p>
        <?php }
        elseif (isset($_GET['message']) && $_GET['message']== '3') {
            ?>
            <p>Plusieurs membres ont<br/>les memes login et mot de passe.</p>
        <?php }
        elseif (isset($_GET['message']) && $_GET['message']== '4') {
            ?>
            <p>Errreur de saisie !<br/>Au moins un des champs est vide.</p>
        <?php }

        ?>
        <form action='../transition/connexion.php' method="post">
            <input type="email" class="container" name="email" placeholder="Email" required><br>
            <input type="password" class="container" id="myInput" name="pwd" placeholder="Mot de passe" required><br>
            <input type="checkbox" onclick="myFunction()">Voir le mot de passe
            <a class="inscription" href="../transition/Password_Recovery/forgot-password.php">Mot de passe oublié ?</a></br>
            <button type="submit" name='connexion' class="envoyer" value="Connexion">Se connecter</button>
        </form>
        <a href="sinscrire.php" class="inscription">Vous n'avez pas de compte ? Créez en un <b>ici</b></a>
    </div>
</div>
</main>
<div class="topleft">
    <a href="../index.php"><i class="material-icons colorYellow" style="font-size: 3em;">home</i></a>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</body>
</html>
