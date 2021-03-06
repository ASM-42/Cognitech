<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Infinite Measures</title>
    <link href="css/indexstyle.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js" defer></script>

</head>

<body>
<main class="container">

    <section id="page-1">

        <div class="_navbar">
            <a class="active colorBleu" href="#">Accueil</a>
            <a class="active colorBleu" href="#tests" onclick="scrollToOurTests()">Nos tests</a>
            <a class="active colorBleu" href="#contact" onclick="scrollToContactUs()">Nous contacter</a>
            <a class="active colorBleu" href="views/CGU_accueil.html">CGU</a>
            <a class="active colorBleu" href="views/MentionsLegales_accueil.html">Mentions Légales</a>
        </div>
        <h1 class="colorBleu titre">INFINITE MEASURES</h1>
        <p class="resume colorBleu">Bienvenue sur infinite-measures.com ! Au sein de celui-ci, vous aurez
            accès à tous vos résultats de tests psychotechniques.
            <br>
            Accédez à votre profil en cliquant sur "Se connecter" ou découvrez notre activité via l'onglet "Découvrir".
        </p>

        <button class="bouton colorJaune" onclick="scrollToDiscover()">Découvrir</button>
        <a href="views/se_connecter.php"><button class="bouton colorJaune">Se connecter</button></a>

        <div class="langue">
            <a class="drapeau" href=""> <img src="images/france.png"></a>
            <a class="drapeau" href=""> <img src="images/royaume-uni.png"></a>
        </div>
    </section>

    <section id="page-2">
        <div class="discover">
            <h2 class="sous-titre colorBleu text-center">A propos</h2>
            <img class="bannieref1 bouton-send" src="images/f1banniere2.png" alt="">
            <div class="left-right-container">
                <div class="left">
                    <p class="discover-paragraphe colorBleu">
                        Infinite Measures est une société spécialisée dans l'installation de solutions « clé en main » pour les centres d’évaluation psychotechniques.
                        <br>Elle cherche à concevoir ses propres systèmes pour évaluer les capacités psycotechniques des pilotes de Formule 1.
                        <br>Le produit que Infinite Measures vous propose est un produit attractif, bon marché, flexible et dont les données sont facilement accessibles via ce site web.
                        <br>Pour commencer à consulter les données de vos tests, cliquez sur Se connecter.
                    </p>
                </div>
                <img class="logoinfinite bouton-send" src="images/infinite_blue.png">

            </div>

        </div>
    </section>

    <section id="page-3">
        <div class="our-tests"></div>
        <h2 class="sous-titre colorBleu text-center">Nos tests</h2>
        <div class="card-container">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="images/Freq%20cardiaque.png" alt="Card image cap">
                <div class="card-body">
                    <span class="card-title">Mesure du stress</span>
                    <p class="card-text">Nous évaluerons le stress du patient en mesurant son rythme cardiaque et sa température cutanée.</p>
                    <a href="views/se_connecter.php" class="btn btn-primary">En savoir +</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="images/eye2%20(1).png" alt="Card image cap">
                <div class="card-body">
                    <span class="card-title">Acuité visuelle</span>
                    <p class="card-text">Nous allons étudier la réaction d'un sujet à une lumière. Pour ce faire, nous allons mesurer le temps de réaction à un stimulus visuel.</p>
                    <a href="views/se_connecter.php" class="btn btn-primary">En savoir +</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="images/sound%20wave2%20(1).png" alt="Card image cap">
                <div class="card-body">
                    <span class="card-title">Acuité auditive</span>
                    <p class="card-text">Nous mesurerons la qualité de la reconnaissance des sons, le temps de réaction à un stimulus sonore et l'étendue de la perception auditive d'un patient.</p>
                    <a href="views/se_connecter.php" class="btn btn-primary">En savoir +</a>
                </div>
            </div>
        </div>
    </section>

    <section id="page-4" class="mb-4">
        <h2 class="sous-titre colorBleu text-center mx-auto">Nous contacter</h2>
        <div class="contact-form">

            <div class="row mx-auto">
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="nom" class="form-control" autocomplete="chrome-off">
                                    <label for="name" class="">Nom</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="mail" class="form-control" autocomplete="chrome-off">
                                    <label for="email" class="">Email</label>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="Objet" class="form-control" autocomplete="chrome-off">
                                    <label for="subject" class="">Sujet</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                    <label for="message">Message</label>
                                </div>

                            </div>
                        </div>

                    </form>

                    <?php
                    $AdresseMail = "app20202021g9c@gmail.com";

                    if (isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['Objet'])) {
                        // entête , toujours comme ça
                        $header="MIME-Version: 1.0\r\n";
                        $header.="From: CogniTech <".$_POST['mail'].">\r\n";
                        $header.='Content-Type:text/html; charset="uft-8"'."\n";
                        $header.='Content-Transfer-Encoding: 8bit';

                        $Message=htmlentities($_POST['message'],ENT_QUOTES,"UTF-8");
                        // mise en page du format
                        $message='
                <html lang="fr">
                    <body>
                        <div align="center">
                        <u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
					    <u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
					    <br />
                           '.nl2br($Message).'
                           <br/>
                        </div>
                    </body>
                </html>
                ';

                        $Sujet='=?UTF-8?B?'.base64_encode($_POST['Objet']).'?=';

                        if(mail($AdresseMail,$Sujet,$message,$header)) {
                            echo "Le mail à été envoyé avec succès!";
                        }else {
                            echo "Une erreur est survenue, le mail n'a pas été envoyé";
                        }
                    }

                    ?>

                    <div class="d-flex justify-content-center text-center bouton-send">
                        <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Envoyer</a>
                    </div>
                    <div class="status"></div>
                </div>

            </div>
        </div>

    </section>
    <footer>
        <div>
            Copyright &#169; <script type='text/javascript'>var year = new Date();document.write(year.getFullYear());</script> <a href='index.php' class="colorJaune2">Infinite Measures</a><a> | Conçu par Cognitech</a>
        </div>
    </footer>


</main>
</body>


<script type="text/javascript" defer>
    function autoScroll(el) {
        window.scrollTo({
            top: el.offsetTop,
            left: 0,
            behavior: 'smooth'
        })
    }

    function scrollToDiscover() {
        return autoScroll(document.querySelector('#page-2'))
    }

    function scrollToOurTests() {
        return autoScroll(document.querySelector('#page-3'))
    }

    function scrollToContactUs() {
        return autoScroll(document.querySelector('#page-4'))
    }

    let observer = new IntersectionObserver(entry => (entry.length && entry[0].intersectionRatio) ? document.querySelector('#page-2').classList.add('reveal') : null, {
        rootMargin: '0px',
        threshold: 1.0
    })
    observer.observe(document.querySelector('.discover'))
</script>

</html>
