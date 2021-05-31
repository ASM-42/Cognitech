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
        <form action='../transition/connexion_en.php' method="post">
            <input type="email" class="container" name="email" placeholder="Email" required><br>
            <input type="password" class="container" name="pwd" placeholder="Password" required><br>
            <a class="mdpOublie inscription" href="../Password_Recovery/forgot-password_en.php">Forgot Password ?</a></br>
            <button type="submit" name='connexion' class="envoyer" value="Connexion">Log In</button>
        </form>
        <a href="sinscrire_en.php" class="inscription">Don't have an account? Sign in <b>here</b></a>
    </div>
</div>
</main>
<div class="topleft">
    <a href="../index_en.html"><i class="material-icons colorYellow" style="font-size: 3em;">home</i></a>
</div>


</body>
</html>
