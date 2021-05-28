<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");
$email = $_SESSION['email'];
$sql = $bdd -> query('SELECT * FROM users WHERE email="'.$email.'"');
$result = $sql -> fetch();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mentions Légales</title>
    <link href="../css/CGU.css" rel="stylesheet"/>
    <link href="../css/Borderau_Bleu.css" rel="stylesheet"/>
</head>
<body>


<div class="container">
    <?php if ($result['role'] == 'pilote'): ?>
        <a class="recherche" href="#">Mes statistiques</a>
    <?php elseif ($result['role'] == 'admin'): ?>
        <a class="recherche" href="accueil_admin.php">Accueil</a>
    <?php else: ?>
        <a class="recherche" href="accueil_gestionnaire.php">Accueil</a>
    <?php endif; ?>
    <?php if ($result['role'] == 'admin'): ?>
    <?php elseif ($result['role'] == 'pilote'): ?>
    <?php else: ?>
        <a class="compte" href="rechercher.php">Rechercher</a>
    <?php endif; ?>
    <?php if ($result['role'] == 'admin'): ?>
        <a class="compte" href="profil.php">Mon Compte</a>
    <?php elseif ($result['role'] == 'pilote'): ?>
        <a class="compte" href="profil.php">Mon Compte</a>
    <?php else: ?>
        <a class="troisieme" href="profil.php">Mon Compte</a>
    <?php endif; ?>
    <a class="FAQ" href="FAQ.php">FAQ</a>
    <a class="CGU" href="CGU.php">CGU</a>
    <a class="MentionsLegales colorActif" href="">Mentions Légales</a>
    <a class="support" href="contact.php">Support</a>
    <a class="deconnecter" href="../index.html">Se Deconnecter</a>

</div>

<div class = "center">
    <h2>Mentions Légales</h2>

    <h3>Définitions</h3>
    <p>
        <b>Client :</b>
        tout professionnel ou personne physique capable au sens des articles 1123 et suivants du Code civil, ou personne morale, qui visite le Site objet des présentes conditions générales.
        <br>
        <b>Prestations et Services :</b>
        http://CogniTest.com met à disposition des Clients :
    </p>

    <p>
        <b>Contenu :</b>
        Ensemble des éléments constituants l’information présente sur le Site, notamment textes – images – vidéos.
    </p>

    <p>
        <b>Informations clients :</b>
        Ci après dénommé « Information (s) » qui correspondent à l’ensemble des données personnelles susceptibles d’être détenues par http://CogniTest.com
        pour la gestion de votre compte, de la gestion de la relation client et à des fins d’analyses et de statistiques.
    </p>

    <p>
        <b>Utilisateur :</b>
        Internaute se connectant, utilisant le site susnommé.
    </p>
    <p>
        <b>Informations personnelles :</b>
        « Les informations qui permettent, sous quelque forme que ce soit, directement ou non, l'identification des personnes physiques auxquelles elles s'appliquent » (article 4 de la loi n° 78-17 du 6 janvier 1978).
    </p>
    <p>Les termes « données à caractère personnel », « personne concernée », « sous traitant » et « données sensibles » ont le sens défini par le Règlement Général sur la Protection des Données (RGPD : n° 2016-679)</p>

    <h3>1. Présentation du site internet.</h3>
    <p>
        En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé aux utilisateurs du site internet http://CogniTest.com
        l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi:

    <p>
        <strong>Propriétaire</strong>
        :  SARL Infinite Measures Capital social de 10000€ Numéro de TVA: FR 40 123456824 – 28 rue Notre Dame des Champs 75006 Paris
        <br/>

        <strong>Responsable publication</strong>
        Amandine Lemay – amandine.lemay@eleve.isep.fr
        <br/>
        <strong>Webmaster</strong>
        Martin Pochat Cottiloux – martin.pochat@eleve.isep.fr
        <br/>
        <strong>Hébergeur</strong>
        : ovh – 2 rue Kellermann 59100 Roubaix 1007
        <br/>
        <strong>Délégué à la protection des données</strong>
        Xavier Derville – xavier.derville@eleve.isep.fr
        <br/>
    </p>


    <h3>2. Conditions générales d’utilisation du site et des services proposés.</h3>

    <p>Le Site constitue une œuvre de l’esprit protégée par les dispositions du Code de la Propriété Intellectuelle et des Réglementations Internationales applicables.
        Le Client ne peut en aucune manière réutiliser, céder ou exploiter pour son propre compte tout ou partie des éléments ou travaux du Site.</p>

    <p>
        L’utilisation du site http://CogniTest.com implique l’acceptation pleine et entière des conditions générales d’utilisation ci-après décrites. Ces conditions d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment, les utilisateurs du site
        sont donc invités à les consulter de manière régulière.
    </p>

    <p>
        Ce site internet est normalement accessible à tout moment aux utilisateurs. Une interruption pour raison de maintenance technique peut être toutefois décidée par
        http://CogniTest.com, qui s’efforcera alors de communiquer préalablement aux utilisateurs les dates et heures de l’intervention.
        Le site web http://CogniTest.com est mis à jour régulièrement. De la même façon, les mentions légales peuvent être modifiées à tout moment : elles s’imposent néanmoins à l’utilisateur qui est invité à s’y référer le plus souvent possible afin d’en prendre connaissance.
    </p>

    <h3>3. Description des services fournis.</h3>

    <p>
        Le site internet http://CogniTest.com a pour objet de fournir une information concernant l’ensemble des activités de la société.

        Infinite Measures s’efforce de fournir sur le site http://CogniTest.com des informations aussi précises que possible. Toutefois, il ne pourra être tenu responsable des oublis, des inexactitudes et des carences dans la mise à jour, qu’elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations.
    </p>

    <p>
        Toutes les informations indiquées sur le site http://CogniTest.com sont données à titre indicatif, et sont susceptibles d’évoluer. Par ailleurs, les renseignements figurant sur le site
        ne sont pas exhaustifs. Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne.
    </p>

    <h3>4. Limitations contractuelles sur les données techniques.</h3>

    <p>
        Le site utilise la technologie JavaScript.

        Le site Internet ne pourra être tenu responsable de dommages matériels liés à l’utilisation du site. De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour
        Le site http://CogniTest.com est hébergé chez un prestataire sur le territoire de l’Union Européenne conformément aux dispositions du Règlement Général sur la Protection des Données (RGPD : n° 2016-679)
    </p>

    <p>L’objectif est d’apporter une prestation qui assure le meilleur taux d’accessibilité. L’hébergeur assure la continuité de son service 24 Heures sur 24, tous les jours de l’année. Il se réserve néanmoins la possibilité d’interrompre le service d’hébergement pour les durées les plus courtes possibles notamment à des fins de maintenance, d’amélioration de ses infrastructures, de défaillance de ses infrastructures ou si les Prestations et Services génèrent un trafic réputé anormal.</p>

    <p>
        http://CogniTest.com et l’hébergeur ne pourront être tenus responsables en cas de dysfonctionnement du réseau Internet, des lignes téléphoniques ou du matériel informatique et de téléphonie lié notamment à l’encombrement du réseau empêchant l’accès au serveur.
    </p>

    <h3>5. Propriété intellectuelle et contrefaçons.</h3>

    <p>
        http://CogniTest.com est propriétaire des droits de propriété intellectuelle et détient les droits d’usage sur tous les éléments accessibles sur le site internet, notamment les textes, images, graphismes, logos, vidéos, icônes et sons.
        Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de :
        http://CogniTest.com.
        .
    </p>

    <p>Toute exploitation non autorisée du site ou de l’un quelconque des éléments qu’il contient sera considérée comme constitutive d’une contrefaçon et poursuivie conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.</p>

    <h3>6. Limitations de responsabilité.</h3>

    <p>
        http://CogniTest.com agit en tant qu’éditeur du site. http://CogniTest.com est responsable de la qualité et de la véracité du Contenu qu’il publie.
    </p>

    <p>
        http://CogniTest.com ne pourra être tenu responsable des dommages directs et indirects causés au matériel de l’utilisateur, lors de l’accès au site internet
        , et résultant soit de l’utilisation d’un matériel ne répondant pas aux spécifications indiquées au point 4, soit de l’apparition d’un bug ou d’une incompatibilité.
    </p>

    <p>
        http://CogniTest.com ne pourra également être tenu responsable des dommages indirects (tels par exemple qu’une perte de marché ou perte d’une chance) consécutifs à l’utilisation du site .
        Des espaces interactifs (possibilité de poser des questions dans l’espace contact) sont à la disposition des utilisateurs.
        http://CogniTest.com se réserve le droit de supprimer, sans mise en demeure préalable, tout contenu déposé dans cet espace qui contreviendrait à la législation applicable en France, en particulier aux dispositions relatives à la protection des données. Le cas échéant,
        http://CogniTest.com se réserve également la possibilité de mettre en cause la responsabilité civile et/ou pénale de l’utilisateur, notamment en cas de message à caractère raciste, injurieux, diffamant, ou pornographique, quel que soit le support utilisé (texte, photographie …).
    </p>

    <h3>7. Gestion des données personnelles.</h3>

    <p>Le Client est informé des réglementations concernant la communication marketing, la loi du 21 Juin 2014 pour la confiance dans l’Economie Numérique, la Loi Informatique et Liberté du 06 Août 2004 ainsi que du Règlement Général sur la Protection des Données (RGPD : n° 2016-679). </p>

    <h4>7.1 Responsables de la collecte des données personnelles</h4>

    <p>
        Pour les Données Personnelles collectées dans le cadre de la création du compte personnel de l’Utilisateur et de sa navigation sur le Site, le responsable du traitement des Données Personnelles est : Infinite Measures.
        http://CogniTest.com est représenté par Xavier Derville, son représentant légal
    </p>

    <p>
        En tant que responsable du traitement des données qu’il collecte, http://CogniTest.com
        s’engage à respecter le cadre des dispositions légales en vigueur. Il lui appartient notamment au Client d’établir les finalités de ses traitements de données, de fournir à ses prospects et clients, à partir de la collecte de leurs consentements, une information complète sur le traitement de leurs données personnelles et de maintenir un registre des traitements conforme à la réalité.
        Chaque fois que http://CogniTest.com
        traite des Données Personnelles, il prend toutes les mesures raisonnables pour s’assurer de l’exactitude et de la pertinence des Données Personnelles au regard des finalités pour lesquelles
        http://CogniTest.com les traite.
    </p>

    <h4>7.2 Finalité des données collectées</h4>

    <p>
        http://CogniTest.com est susceptible de traiter tout ou partie des données :
    </p>

    <ul>

        <li>pour permettre la navigation sur le Site et la gestion et la traçabilité des prestations et services commandés par l’utilisateur : données de connexion et d’utilisation du Site, facturation, historique des commandes, etc. </li>

        <li>pour prévenir et lutter contre la fraude informatique (spamming, hacking…) : matériel informatique utilisé pour la navigation, l’adresse IP, le mot de passe (hashé) </li>

        <li>pour améliorer la navigation sur le Site : données de connexion et d’utilisation </li>

        <li>
            pour mener des enquêtes de satisfaction facultatives sur http://CogniTest.com
            : adresse email
        </li>
        <li>pour mener des campagnes de communication (sms, mail) : numéro de téléphone, adresse email</li>

    </ul>

    <p>
        http://CogniTest.com ne commercialise pas vos données personnelles qui sont donc uniquement utilisées par nécessité ou à des fins statistiques et d’analyses.
    </p>

    <h4>7.3 Droit d’accès, de rectification et d’opposition</h4>

    <p>

        Conformément à la réglementation européenne en vigueur, les Utilisateurs de http://CogniTest.com
        disposent des droits suivants :
    </p>
    <ul>

        <li>droit d'accès (article 15 RGPD) et de rectification (article 16 RGPD), de mise à jour, de complétude des données des Utilisateurs droit de verrouillage ou d’effacement des données des Utilisateurs à caractère personnel (article 17 du RGPD), lorsqu’elles sont inexactes, incomplètes, équivoques, périmées, ou dont la collecte, l'utilisation, la communication ou la conservation est interdite </li>

        <li>droit de retirer à tout moment un consentement (article 13-2c RGPD) </li>

        <li>droit à la limitation du traitement des données des Utilisateurs (article 18 RGPD) </li>

        <li>droit d’opposition au traitement des données des Utilisateurs (article 21 RGPD) </li>

        <li>droit à la portabilité des données que les Utilisateurs auront fournies, lorsque ces données font l’objet de traitements automatisés fondés sur leur consentement ou sur un contrat (article 20 RGPD) </li>

        <li>
            droit de définir le sort des données des Utilisateurs après leur mort et de choisir à qui
            http://CogniTest.com devra communiquer (ou non) ses données à un tiers qu’ils aura préalablement désigné
        </li>
    </ul>

    <p>
        Dès que http://CogniTest.com a connaissance du décès d’un Utilisateur et à défaut d’instructions de sa part,
        il s’engage à détruire ses données, sauf si leur conservation s’avère nécessaire à des fins probatoires ou pour répondre à une obligation légale.
    </p>

    <p>
        Si l’Utilisateur souhaite savoir comment http://CogniTest.com utilise ses Données Personnelles, demander à les rectifier ou s’oppose à leur traitement, l’Utilisateur peut nous contacter
        par écrit à l’adresse suivante :
    </p>
    <p>
        Infinite Measures – DPO, 28 rue Notre Dame des Champs
        <br>

        75006 Paris
    </p>

    <p>
        Dans ce cas, l’Utilisateur doit indiquer les Données Personnelles qu’il souhaiterait que http://CogniTest.com
        corrige, mette à jour ou supprime, en s’identifiant précisément avec une copie d’une pièce d’identité (carte d’identité ou passeport).
    </p>

    <p>

        Les demandes de suppression de Données Personnelles seront soumises aux obligations qui sont imposées à
        http://CogniTest.com par la loi, notamment en matière de conservation ou d’archivage des documents. Enfin, les Utilisateurs du site
        peuvent déposer une réclamation auprès des autorités de contrôle, et notamment de la CNIL (https://www.cnil.fr/fr/plaintes).
    </p>

    <h4>7.4 Non-communication des données personnelles</h4>

    <p>
        http://CogniTest.com s’interdit de traiter, héberger ou transférer les Informations collectées sur ses Clients vers un pays situé en dehors de l’Union européenne ou reconnu comme « non adéquat » par la Commission européenne sans en informer préalablement le client. Pour autant,
        il reste libre du choix de ses sous-traitants techniques et commerciaux à la condition qu’il présentent les garanties suffisantes au regard des exigences du Règlement Général sur la Protection des Données (RGPD : n° 2016-679).
    </p>

    <p>
        http://CogniTest.com s’engage à prendre toutes les précautions nécessaires afin de préserver la sécurité des Informations et notamment qu’elles ne soient pas communiquées à des personnes non autorisées. Cependant, si un incident impactant l’intégrité ou la confidentialité des Informations du Client est portée à la connaissance de
        http://CogniTest.com , celle-ci devra dans les meilleurs délais informer le Client et lui communiquer les mesures de corrections prises. Par ailleurs
        http://CogniTest.com ne collecte aucune « données sensibles ».
    </p>

    <p>

        Les Données Personnelles de l’Utilisateur peuvent être traitées par des filiales
        et des sous-traitants (prestataires de services), exclusivement afin de réaliser les finalités de la présente politique.
    </p>
    <p>

        Dans la limite de leurs attributions respectives et pour les finalités rappelées ci-dessus, les principales personnes susceptibles d’avoir accès aux données des Utilisateurs
        sont principalement les agents de notre service client.
    </p>


    <h3>8. Liens hypertextes « cookies » et balises (“tags”) internet</h3>
    <p>

        Le site http://CogniTest.com contient un certain nombre de liens hypertextes vers d’autres sites.
        Cependant, http://CogniTest.com n’a pas la possibilité de vérifier le contenu des sites ainsi visités, et n’assumera en conséquence aucune responsabilité de ce fait.
    </p>
    <p>
        Sauf si vous décidez de désactiver les cookies, vous acceptez que le site puisse les utiliser. Vous pouvez à tout moment désactiver ces cookies et ce gratuitement à partir des possibilités de désactivation qui vous sont offertes et rappelées ci-après, sachant que cela peut réduire ou empêcher l’accessibilité à tout ou partie des Services proposés par le site.
    </p>

    <h4>8.1. « COOKIES »</h4>
    <p>
        Un « cookie » est un petit fichier d’information envoyé sur le navigateur de l’Utilisateur et enregistré au sein du terminal de l’Utilisateur (ex : ordinateur, smartphone), (ci-après « Cookies »). Ce fichier comprend des informations telles que le nom de domaine de l’Utilisateur, le fournisseur d’accès Internet de l’Utilisateur, le système d’exploitation de l’Utilisateur, ainsi que la date et l’heure d’accès. Les Cookies ne risquent en aucun cas d’endommager le terminal de l’Utilisateur.</p>
    <p>
        http://CogniTest.com est susceptible de traiter les informations de l’Utilisateur concernant sa visite du Site, telles que les pages consultées, les recherches effectuées. Ces informations permettent à
        http://CogniTest.com d’améliorer le contenu du Site, de la navigation de l’Utilisateur.
    </p>
    <p>

        Les Cookies facilitant la navigation et/ou la fourniture des services proposés par le Site, l’Utilisateur peut configurer son navigateur pour qu’il lui permette de décider s’il souhaite ou non les accepter de manière à ce que des Cookies soient enregistrés dans le terminal ou, au contraire, qu’ils soient rejetés, soit systématiquement, soit selon leur émetteur. L’Utilisateur peut également configurer son logiciel de navigation de manière à ce que l’acceptation ou le refus des Cookies lui soient proposés ponctuellement, avant qu’un Cookie soit susceptible d’être enregistré dans son terminal.
        http://CogniTest.com informe l’Utilisateur que, dans ce cas, il se peut que les fonctionnalités de son logiciel de navigation ne soient pas toutes disponibles.
    </p>
    <p>

        Si l’Utilisateur refuse l’enregistrement de Cookies dans son terminal ou son navigateur, ou si l’Utilisateur supprime ceux qui y sont enregistrés, l’Utilisateur est informé que sa navigation et son expérience sur le Site peuvent être limitées. Cela pourrait également être le cas lorsque
        http://CogniTest.com ou l’un de ses prestataires ne peut pas reconnaître, à des fins de compatibilité technique, le type de navigateur utilisé par le terminal, les paramètres de langue et d’affichage ou le pays depuis lequel le terminal semble connecté à Internet.
    </p>
    <p>

        Le cas échéant,http://CogniTest.com décline toute responsabilité pour les conséquences liées au fonctionnement dégradé du Site et des services éventuellement proposés
        , résultant du refus de Cookies par l’Utilisateur de l’impossibilité pour http://CogniTest.com
        d’enregistrer ou de consulter les Cookies nécessaires à leur fonctionnement du fait du choix de l’Utilisateur. Pour la gestion des Cookies et des choix de l’Utilisateur, la configuration de chaque navigateur est différente. Elle est décrite dans le menu d’aide du navigateur, qui permettra de savoir de quelle manière l’Utilisateur peut modifier ses souhaits en matière de Cookies.
    </p>
    <p>

        À tout moment, l’Utilisateur peut faire le choix d’exprimer et de modifier ses souhaits en matière de Cookies.
        http://CogniTest.com pourra en outre faire appel aux services de prestataires externes pour l’aider à recueillir et traiter les informations décrites dans cette section.
    </p>
    <p>

        Enfin, en cliquant sur les icônes dédiées aux réseaux sociaux Twitter, Facebook, Linkedin et Google Plus figurant sur le Site de
        http://CogniTest.com ou dans son application mobile et si l’Utilisateur a accepté le dépôt de cookies en poursuivant sa navigation sur le Site Internet ou l’application mobile de
        http://CogniTest.com , Twitter, Facebook, Linkedin et Google Plus peuvent également déposer des cookies sur vos terminaux (ordinateur, tablette, téléphone portable).
    </p>
    <p>

        Ces types de cookies ne sont déposés sur vos terminaux qu’à condition que vous y consentiez, en continuant votre navigation sur le Site Internet ou l’application mobile de
        http://CogniTest.com.
        À tout moment, l’Utilisateur peut néanmoins revenir sur son consentement à ce que
        http://CogniTest.com dépose ce type de cookies.
    </p>

    <h4>Article 8.2. BALISES (“TAGS”) INTERNET</h4>

    <p>

        http://CogniTest.com peut employer occasionnellement des balises Internet (également appelées « tags », ou balises d’action, GIF à un pixel, GIF transparents, GIF invisibles et GIF un à un) et les déployer par l’intermédiaire d’un partenaire spécialiste d’analyses Web susceptible de se trouver (et donc de stocker les informations correspondantes, y compris l’adresse IP de l’Utilisateur) dans un pays étranger.
    </p>

    <p>
        Ces balises sont placées à la fois dans les publicités en ligne permettant aux internautes d’accéder au Site, et sur les différentes pages de celui-ci.
    </p>
    <p>

        Cette technologie permet à http://CogniTest.com
        d’évaluer les réponses des visiteurs face au Site et l’efficacité de ses actions (par exemple, le nombre de fois où une page est ouverte et les informations consultées), ainsi que l’utilisation de ce Site par l’Utilisateur.
    </p>
    <p>

        Le prestataire externe pourra éventuellement recueillir des informations sur les visiteurs du Site et d’autres sites Internet grâce à ces balises, constituer des rapports sur l’activité du Site à l’attention de
        http://CogniTest.com , et fournir d’autres services relatifs à l’utilisation de celui-ci et d’Internet.
    </p>

</div>

</body>