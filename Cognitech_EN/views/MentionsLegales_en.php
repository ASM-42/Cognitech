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
    <title>Legal Notice</title>
    <link href="../css/CGU.css" rel="stylesheet"/>
    <link href="../css/Borderau_Bleu.css" rel="stylesheet"/>
</head>
<body>


<div class="navbarBleue">
    <?php if ($result['role'] == 'pilote'): ?>
        <a class="recherche" href="StatistiquePilote.php">My statistics</a>
    <?php elseif ($result['role'] == 'admin'): ?>
        <a class="recherche" href="accueil_admin.php">Home</a>
    <?php else: ?>
        <a class="recherche" href="accueil_gestionnaire.php">Home</a>
    <?php endif; ?>
    <?php if ($result['role'] == 'admin'): ?>
    <?php elseif ($result['role'] == 'pilote'): ?>
    <?php else: ?>
        <a class="compte" href="rechercher.php">Search</a>
    <?php endif; ?>
    <?php if ($result['role'] == 'admin'): ?>
        <a class="compte" href="profil.php">My account</a>
    <?php elseif ($result['role'] == 'pilote'): ?>
        <a class="compte" href="profil.php">My account</a>
    <?php else: ?>
        <a class="troisieme" href="profil.php">My account</a>
    <?php endif; ?>
    <?php if ($result['role'] == 'admin'): ?>
        <a class="FAQ " href="FAQ_admin.php">FAQ</a>
    <?php else: ?>
        <a class="FAQ " href="FAQ.php">FAQ</a>
    <?php endif; ?>
    <a class="CGU colorActif" href="">T&Cs</a>
    <a class="MentionsLegales" href="MentionsLegales.php">Legal Notice</a>
    <a class="support" href="contact.php">Support</a>
    <a class="deconnecter" href="../index.html">Log Out</a>

</div>

<div class = "center">
    <h2>Legal Notice</h2>

    <h3>Definitions</h3>
    <p>
        <b>Client :</b>
        any professional or capable natural person within the meaning of Articles 1123 et seq. of the Civil Code, or legal entity, who visits the Site which is the subject of these general conditions.
        <br>
        <b>Provisions and Services:</b>
        http://CogniTest.com makes available to Customers:
    </p>

    <p>
        <b>Content:</b>
        All the elements constituting the information present on the Site, including text - images - videos.
    </p>

    <p>
        <b>Customer information:</b>
        Hereinafter referred to as "Information (s)" which correspond to all personal data that may be held by http://CogniTest.com
        for the management of your account, customer relationship management and for analysis and statistical purposes.
    </p>

    <p>
        <b>User:</b>
        Internet user connecting, using the above-mentioned site.
    </p>
    <p>
        <b>Personal information:</b>
        "Information that allows, in any form whatsoever, directly or not, the identification of the natural persons to whom they apply" (Article 4 of Law No. 78-17 of 6 January 1978).
    </p>
    <p>The terms "personal data", "data subject", "sub-processor" and "sensitive data" have the meaning defined by the General Data Protection Regulation (GDPR: No. 2016-679)</p>

    <h3>1. Introduction to the website.</h3>
    <p>
        Under Article 6 of Law No. 2004-575 of June 21, 2004 for confidence in the digital economy, it is specified to users of the website http://CogniTest.com
        the identity of the various parties involved in its realization and monitoring:

    <p>
        <strong>Owner</strong>
        :  SARL Infinite Measures Share capital of 10000€ VAT number: FR 40 123456824 - 28 rue Notre Dame des Champs 75006 Paris
        <br/>

        <strong>Publication Manager</strong>
        Amandine Lemay - amandine.lemay@eleve.isep.fr
        <br/>
        <strong>Webmaster</strong>
        Martin Pochat Cottiloux - martin.pochat@eleve.isep.fr
        <br/>
        <strong>Host</strong>
        : ovh - 2 rue Kellermann 59100 Roubaix 1007
        <br/>
        <strong>Data Protection Officer</strong>
        Xavier Derville - xavier.derville@eleve.isep.fr
        <br/>
    </p>

    <h3>2. General terms and conditions of use of the Site and the services offered.</h3>

    <p>The Site constitutes an intellectual work protected by the provisions of the Intellectual Property Code and applicable International Regulations.
        The Customer may not in any way reuse, transfer or exploit for its own account all or part of the elements or works of the Site.</p> <p>

    <p>
        The use of the site http://CogniTest.com implies full and complete acceptance of the general conditions of use described below. These conditions of use are likely to be modified or completed at any time, the users of the site
        are therefore invited to consult them regularly.
    </p>

    <p>
        This website is normally accessible to users at all times. An interruption for technical maintenance reasons may however be decided by
        http://CogniTest.com, which will then endeavor to inform users in advance of the dates and times of the intervention.
        The website http://CogniTest.com is updated regularly. Similarly, the legal notices may be modified at any time: they are nevertheless binding on the user, who is invited to refer to them as often as possible in order to read them.
    </p>

    <h3>3. Description of the services provided.</h3>

    <p>
        The website http://CogniTest.com is intended to provide information concerning all of the company's activities.

        Infinite Measures strives to provide information on the http://CogniTest.com website that is as accurate as possible. However, it cannot be held responsible for omissions, inaccuracies and shortcomings in the updating, whether they are of its own making or of the making of third-party partners who provide it with this information.
    </p>

    <p>
        All information indicated on the http://CogniTest.com website is given as an indication, and is likely to evolve. In addition, the information on the site
        is not exhaustive. It is given subject to modifications having been made since it was put online.
    </p>

    <h3>4. Contractual limitations on technical data.</h3>

    <p>
        The website uses JavaScript technology.

        The website cannot be held responsible for any material damage related to the use of the site. In addition, the user of the site undertakes to access the site using recent equipment, free of viruses and with a last generation browser updated
        The site http://CogniTest.com is hosted by a provider on the territory of the European Union in accordance with the provisions of the General Regulation on Data Protection (RGPD: No. 2016-679)
    </p>

    <p>The objective is to provide a service that ensures the best accessibility rate. The host ensures the continuity of its service 24 Hours a day, every day of the year. However, it reserves the right to interrupt the hosting service for the shortest possible periods of time, in particular for maintenance purposes, improvement of its infrastructures, failure of its infrastructures or if the Benefits and Services generate traffic deemed abnormal.</p>

    <p>
        http://CogniTest.com and the host cannot be held responsible in case of malfunction of the Internet network, telephone lines or computer and telephony equipment related in particular to network congestion preventing access to the server.
    </p>

    <h3>5. Intellectual property and counterfeiting.</h3>

    <p>
        http://CogniTest.com is the owner of the intellectual property rights and holds the rights of use on all the elements accessible on the website, in particular the texts, images, graphics, logos, videos, icons and sounds.
        Any reproduction, representation, modification, publication, adaptation of all or part of the elements of the site, whatever the means or the process used, is prohibited, except prior written authorization of :
        http://CogniTest.com.
        .
    </p>

    <p>Any unauthorized exploitation of the site or any of the elements it contains will be considered as constituting an infringement and prosecuted in accordance with the provisions of Articles L.335-2 et seq. of the Intellectual Property Code.</p>

    <h3>6. Limitations of liability.</h3>

    <p>
        http://CogniTest.com acts as the publisher of the site. http://CogniTest.com is responsible for the quality and veracity of the Content it publishes.
    </p>

    <p>
        http://CogniTest.com cannot be held responsible for direct and indirect damage caused to the user's equipment, when accessing the website
        and resulting either from the use of equipment that does not meet the specifications indicated in point 4, or from the appearance of a bug or incompatibility.
    </p>

    <p>
        http://CogniTest.com can also not be held responsible for indirect damages (such as loss of market or loss of opportunity) resulting from the use of the site .
        Interactive spaces (possibility of asking questions in the contact space) are available to users.
        http://CogniTest.com reserves the right to remove, without prior notice, any content deposited in this space that would contravene the legislation applicable in France, in particular the provisions relating to data protection. If necessary,
        http://CogniTest.com also reserves the possibility of calling into question the civil and/or penal responsibility of the user, in particular in the event of message with racist, injurious, defamatory, or pornographic character, whatever the support used (text, photograph?).
    </p>

    <h3>7. Management of personal data.</h3>

    <p>The Customer is informed of the regulations concerning marketing communication, the law of June 21, 2014 for confidence in the Digital Economy, the Data Protection Act of August 06, 2004 as well as the General Data Protection Regulation (RGPD: n° 2016-679). </p>

    <h4>7.1 Persons responsible for the collection of personal data</h4>

    <p>
        For the Personal Data collected in the context of the creation of the User's personal account and browsing on the Site, the person responsible for processing the Personal Data is: Infinite Measures.
        http://CogniTest.com is represented by Xavier Derville, its legal representative
    </p>

    <p>
        As the person responsible for the processing of the data it collects, http://CogniTest.com
        undertakes to respect the framework of the legal provisions in force. In particular, it is the Client's responsibility to establish the purposes of its data processing, to provide its prospects and clients, from the collection of their consents, with complete information on the processing of their personal data and to maintain a register of processing in accordance with the reality.
        Every time http://CogniTest.com
        processes Personal Data, it takes all reasonable steps to ensure the accuracy and relevance of the Personal Data with regard to the purposes for which
        http://CogniTest.com processes them.
    </p>

    <h4>7.2 Purpose of the data collected</h4>

    <p>
        http://CogniTest.com is likely to process all or part of the data:
    </p>

    <ul>

        <li>to enable browsing on the Site and the management and traceability of the services ordered by the user: connection and usage data of the Site, billing, order history, etc. </li>

        <li>to prevent and fight against computer fraud (spamming, hacking...): computer equipment used for navigation, IP address, password (hashed) </li>

        <li>to improve navigation on the Site: connection and usage data </li>

        <li>
            to conduct optional satisfaction surveys on http://CogniTest.com
            : email address
        </li>
        <li>to conduct communication campaigns (sms, email): phone number, email address</li>

    </ul>

    <p>
        http://CogniTest.com does not market your personal data, which are therefore only used by necessity or for statistical and analytical purposes.
    </p>

    <h4>7.3 Right of access, rectification and opposition</h4>

    <p>

        In accordance with the European regulations in force, the Users of http://CogniTest.com
        have the following rights:
    </p>
    <ul>

        <li>right of access (Article 15 RGPD) and rectification (Article 16 RGPD), update, completeness of Users' data right of blocking or erasure of Users' personal data (Article 17 RGPD), when they are inaccurate, incomplete, equivocal, outdated, or whose collection, use, communication or storage is prohibited </li>

        <li>right to withdraw consent at any time (Article 13-2c GDPR) </li>

        <li>right to limit the processing of Users' data (Article 18 RGPD) </li>

        <li>right to object to the processing of Users' data (Article 21 RGPD) </li>

        <li>right to portability of data provided by Users, where such data are subject to automated processing based on their consent or on a contract (Article 20 RGPD) </li>

        <li>
            Right to define the fate of Users' data after their death and to choose to whom
            http://CogniTest.com should communicate (or not) their data to a third party that they have previously designated
        </li>
    </ul>

    <p>
        As soon as http://CogniTest.com has knowledge of the death of a User and in the absence of instructions from him,
        it undertakes to destroy its data, unless its retention is necessary for evidentiary purposes or to meet a legal obligation.
    </p>

    <p>
        If the User wishes to know how http://CogniTest.com uses his Personal Data, to ask to rectify them or to oppose their processing, the User can contact us
        In writing to the following address:
    </p>
    <p>
        Infinite Measures - DPO, 28 rue Notre Dame des Champs
        <br>

        75006 Paris
    </p>

    <p>
        In this case, the User must indicate the Personal Data that he would like http://CogniTest.com
        correct, update or delete, identifying himself/herself precisely with a copy of an identity document (identity card or passport).
    </p>

    <p>

        Requests for deletion of Personal Data will be subject to the obligations that are imposed on
        http://CogniTest.com by law, in particular with regard to the retention or archiving of documents. Finally, Users of the site
        may file a complaint with the supervisory authorities, and in particular with the CNIL (https://www.cnil.fr/fr/plaintes).
    </p>

    <h4>7.4 Non-disclosure of personal data</h4>

    <p>
        http://CogniTest.com refrains from processing, hosting or transferring the Information collected on its Customers to a country located outside the European Union or recognized as "non-adequate" by the European Commission without informing the customer in advance. However,
        it remains free to choose its technical and commercial subcontractors provided that they present sufficient guarantees with regard to the requirements of the General Data Protection Regulation (GDPR: No. 2016-679).
    </p>

    <p>
        http://CogniTest.com undertakes to take all necessary precautions to preserve the security of the Information and in particular that it is not communicated to unauthorized persons. However, if an incident impacting the integrity or confidentiality of the Customer's Information is brought to the attention of
        http://CogniTest.com, it shall inform the Customer as soon as possible and communicate the corrective measures taken. In addition
        http://CogniTest.com does not collect any "sensitive data".
    </p>

    <p>

        The User's Personal Data may be processed by subsidiaries
        and subcontractors (service providers), exclusively in order to achieve the purposes of this policy.
    </p>
    <p>

        Within the limits of their respective attributions and for the purposes mentioned above, the main persons likely to have access to the Users' data
        are mainly the agents of our customer service.
    </p>


    <h3>8. Hypertext links "cookies" and internet tags ("tags")</h3>
    <p>

        The http://CogniTest.com website contains a number of hyperlinks to other sites.
        However, http://CogniTest.com does not have the possibility of checking the content of the sites thus visited, and will consequently assume no responsibility for this fact.
    </p>
    <p>
        Unless you decide to disable cookies, you agree that the site may use them. You can deactivate these cookies at any time and free of charge from the deactivation options offered to you and recalled below, knowing that this may reduce or prevent accessibility to all or part of the Services offered by the site.
    </p>

    <h4>8.1. "COOKIES"</h4>
    <p>
        A "cookie" is a small information file sent to the User's browser and stored within the User's terminal (e.g. computer, smartphone), (hereinafter "Cookies"). This file includes information such as the User's domain name, the User's Internet service provider, the User's operating system, and the date and time of access. Cookies will in no way damage the User's terminal.</p>.
    <p>
        http://CogniTest.com is likely to process the User's information concerning his visit to the Site, such as the pages consulted, the searches carried out. This information allows
        http://CogniTest.com to improve the content of the Site, the User's navigation.
    </p>
    <p>

        Since Cookies facilitate navigation and/or the provision of services offered by the Site, the User may configure his browser to allow him to decide whether or not he wishes to accept them so that Cookies are stored in the terminal or, on the contrary, that they are rejected, either systematically or according to their issuer. The User may also configure his browser software so that he is offered the option of accepting or rejecting Cookies from time to time, before a Cookie is likely to be recorded in his terminal.
        http://CogniTest.com informs the User that, in this case, it is possible that not all the functionalities of his navigation software will be available.
    </p>
    <p>

        If the User refuses the storage of Cookies in his terminal or browser, or if the User deletes those stored there, the User is informed that his navigation and experience on the Site may be limited. This could also be the case when
        http://CogniTest.com or one of its service providers cannot recognize, for technical compatibility purposes, the type of browser used by the terminal, the language and display settings or the country from which the terminal appears to be connected to the Internet.
    </p>
    <p>

        Where applicable,http://CogniTest.com declines all responsibility for the consequences related to the degraded functioning of the Site and any services offered
        resulting from the refusal of Cookies by the User of the impossibility for http://CogniTest.com
        to record or consult the Cookies necessary for their functioning because of the choice of the User. For the management of Cookies and the User's choices, the configuration of each browser is different. It is described in the browser's help menu, which will show how the User can change his or her wishes regarding Cookies.
    </p>
    <p>

        At any time, the User can make the choice to express and modify his wishes regarding Cookies.
        http://CogniTest.com may additionally use the services of external service providers to assist in collecting and processing the information described in this section.
    </p>
    <p>

        Finally, by clicking on the icons dedicated to the social networks Twitter, Facebook, Linkedin and Google Plus appearing on the Site of
        http://CogniTest.com or in its mobile application and if the User has accepted the deposit of cookies by continuing to navigate on the Website or mobile application of
        http://CogniTest.com , Twitter, Facebook, Linkedin and Google Plus can also deposit cookies on your terminals (computer, tablet, cell phone).</p>
    <p>

        These types of cookies are deposited on your terminals only if you consent to them, by continuing your navigation on the Website or the mobile application of
        http://CogniTest.com.
        At any time, the User may nevertheless revoke his or her consent to
        http://CogniTest.com deposit this type of cookies.
    </p>

    <h4>Article 8.2. INTERNET TAGS</h4>.

    <p>

        http://CogniTest.com may occasionally employ Internet tags (also known as "tags," or action tags, single-pixel GIFs, clear GIFs, invisible GIFs, and one-to-one GIFs) and deploy them through a web analytics partner that may be located (and therefore store related information, including the User's IP address) in a foreign country.
    </p>

    <p>
        These tags are placed both in online advertisements that allow users to access the Site, and on individual pages of the Site.
    </p>
    <p>

        This technology allows http://CogniTest.com
        to evaluate visitors' responses to the Site and the effectiveness of its actions (e.g., the number of times a page is opened and the information viewed), as well as the User's use of this Site.
    </p>
    <p>

        The external provider may collect information about visitors to the Site and other websites through these tags, compile reports on Site activity for
        http://CogniTest.com , and provide other services relating to the use of the Site and the Internet.
    </p>

</div>

</body>
