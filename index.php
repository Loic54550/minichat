<?php

require("modeleMinichat.php");


$reponse = getMessage();

// connection
$messageErreur = "";
if (isset($_POST['email'])) {
    $dataUser = getUser($_POST['email']);
    $res = $dataUser->fetch();
    if($res['mdp'] ==  $_POST['pwd']){
        $_SESSION['pseudo'] = $res['pseudo'];
        $_SESSION['email'] = $res['email'];
    } else {
        $messageErreur = "Erreur mail ou mot de pass";
    }
}

// inserer un utilisateur
if(isset($_POST['pwdInscription'])) {
    insertUser($_POST['pwdInscription'], $_POST['emailInscription'], $_POST['pseudoInscription']);
}



//insertMessage
if (isset($_POST['message'])) {
    insertMessage($_POST['pseudo'], $_POST['message']);
}

require('views/minichatView.php');