<?php

session_start();

require("modeleMinichat.php");

// connection
$messageErreur = "";
if (isset($_POST['emailConnexion'], $_POST['pwdConnexion'])) {
    $dataUser = getUser($_POST['emailConnexion'], $_POST['pwdConnexion']);
    $res = $dataUser->fetch();
    if($res['mdp'] ==  $_POST['pwdConnexion']) {
        $_SESSION['pseudo'] = $res['pseudo'];
        $_SESSION['emailConnexion'] = $res['email'];
        $messageErreur = "YOU ARE CONNECTED";
    } else {
        $messageErreur = "Erreur mail ou mot de pass";
    }
}

if(isset($_POST['deconnexion'])) {
    session_destroy();
    header("Location: index.php");
}

// S'enregistrer
if(isset($_POST['pwdInscription'])) {
    insertUser($_POST['emailInscription'], $_POST['pwdInscription'], $_POST['pseudoInscription']);
}

//insertMessage
if (isset($_POST['message']) && isset($_SESSION['utilisateurId'])) {
    insertMessage($_SESSION['utilisateurId'], $_POST['message']);
}
$reponse = getMessage();

require_once "vendor/autoload.php";

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

$twig->addGlobal('session', $_SESSION);

$template= $twig->loadTemplate('index.twig.html');

echo $twig->render($template, array(
        'messageErreur' => $messageErreur,
        'reponse' => $reponse,
        'param3' =>'reo'
));

//require('views/minichatView.php');