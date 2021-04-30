<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="connexion.css">
    <title>Connexion</title>
</head>
<body>
<main class="main">
<div>
    <i class="material-icons colorBleu" style="font-size: 10em;">person_outline</i>
    <div class="formulaire">
        <form action='connexion.php' method="post">
            <input type="email" class="container" name="email" placeholder="Email" required><br>
            <input type="password" class="container" name="pwd" placeholder="Mot de passe" required><br>
            <a class="mdpOublie inscription" href="#">Mot de passe oublié ?</a></br>
            <button type="submit" name='connexion' class="envoyer" value="Connexion">SE CONNECTER</button>
        </form>
        <a href="sinscrire.php" class="inscription">Vous n'avez pas de compte ? Créez en un <b>ici</b></a>
    </div>
</div>
</main>
<div class="topleft">
    <a href="../index.html"><i class="material-icons colorBleu" style="font-size: 3em;">home</i></a>
</div>

<div id="google_translate_element"></div>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'fr'}, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>
