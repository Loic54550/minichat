<?php

function co() {
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

// Récupération des 20 derniers messages
function getMessage() {
    $bdd = co();
    $reponse = $bdd->prepare('
        SELECT * 
        FROM minichat 
        LEFT JOIN utilisateur 
            ON utilisateur.id = minichat.utilisateurId; 
        ORDER BY ID 
        DESC LIMIT 0, 20
    ');
    $reponse->execute();

    return $reponse;
}
// Vérification pseudo
function checkUser($pseudo) {
    $bdd = co();
    $req = $bdd->prepare('SELECT ID FROM utilisateur WHERE pseudo = :pseudo');
    $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->execute();
    return $req->rowCount();
}

//Insertion message
function insertMessage($utilisateurId, $message) {
    $bdd = co();
    $req = $bdd->prepare('INSERT INTO minichat (utilisateurId, message) VALUES (:utilisateurId, :message)');
    $req->bindParam(':utilisateurId', $utilisateurId, PDO::PARAM_STR);
    $req->bindParam(':message', $message, PDO::PARAM_STR);
    $req->execute();
}

//Récupération email mdp
function getUser($email, $pwd) {
    $bdd = co();
    $req = $bdd->prepare('SELECT * FROM utilisateur WHERE email = :email AND mdp = :password');
    $req->bindParam(':email', $email, PDO::PARAM_STR);
    $req->bindParam(':password', $pwd, PDO::PARAM_STR);
    $req->execute();
    return $req;
}



//Insertion email mdp
function insertUser($email, $mdp, $pseudo) {
    $bdd = co();
    $req = $bdd->prepare('INSERT INTO utilisateur (email, mdp, pseudo) VALUES (:email, :mdp, :pseudo)');
    $req->bindParam(":email", $email);
    $req->bindParam(":mdp", $mdp);
    $req->bindParam(":pseudo", $pseudo);
    $req->execute();
}
 

