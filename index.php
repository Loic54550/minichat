<?php

session_start();

require("modeleMinichat.php");


$reponse = getMessage();

// connection
$messageErreur = "";
if (isset($_POST['emailConnexion'])) {
    $dataUser = getUser($_POST['emailConnexion']);
    $res = $dataUser->fetch();
    if($res['mdp'] ==  $_POST['pwdConnexion']){
        $_SESSION['pseudo'] = $res['pseudo'];
        $_SESSION['emailConnexion'] = $res['email'];
    } else {
        $messageErreur = "Erreur mail ou mot de pass";
    }
}

if(isset($_POST['deconnexion'])) {
    session_destroy();
    header("Location: index.php");
}

// S'enregistrer
if(isset($_POST['pwdConnexion'])) {
    insertUser($_POST['emailConnexion'], $_POST['pwdConnexion']);
}



//insertMessage
if (isset($_POST['message'])) {
    insertMessage($_POST['pseudo'], $_POST['message']);
}

require('views/minichatView.php');