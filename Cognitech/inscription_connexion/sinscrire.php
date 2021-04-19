<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="connexion.css">
    <title>Inscription</title>
</head>
<body>
<main class="main">
    <div>
        <i class="material-icons colorBleu" style="font-size: 10em;">person_outline</i>
        <div class="formulaire">
            <form action="inscription.php" method="post" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Veuillez accepter les CGU'); return false; }">
                <input type="text" class="container" name="prenom" placeholder="Prénom" required><br>
                <input type="text" class="container" name="nom" placeholder="Nom" required><br>
                <input type="date" class="container" name="dateDeNaissance" placeholder="Date de Naissance" required><br>
                <input type="email" class="container" name="email" placeholder="Email" required><br>
                <input type="text" class="container" name="ecurie" placeholder="Ecurie" required><br>
                <input type="password" class="container" name="mdp1" placeholder="Mot de passe" required><br>
                <input type="password" class="container" name="mdp2" placeholder="Confirmer le mot de passe" required><br>

                <input type="checkbox" name="checkbox" class="checkbox" value="check" id="agree" /> J'accepte les CGU
                <button type="submit" name='inscription' class="envoyer" value="Inscription">S'inscrire</button>
            </form>
            <a href="se_connecter.php" class="inscription">Vous avez déjà un compte ? Connectez-vous <b>ici</b></a>
        </div>
    </div>


</main>
<div class="topleft">
    <a href="../index.html"><i class="material-icons colorBleu" style="font-size: 3em;">home</i></a>
</div>
</body>
</html>