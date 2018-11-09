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
// Connexion à la base de données


// Récupération des 20 derniers messages

function getMessage() {
    $bdd = co();
    $reponse = $bdd->prepare(
        'SELECT * 
        FROM minichat 
        LEFT JOIN utilisateur 
            ON utilisateur.id = minichat.utilisateurId; 
        ORDER BY ID 
        DESC LIMIT 0, 20'
    );

    return $reponse;
}

function insertMessage($pseudo, $message) {
    $bdd = co();
    $req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES (:pseudo, :message)');
    $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->bindParam(':message', $message, PDO::PARAM_STR);
    $req->execute();
}

function getUser($email) {
    $bdd = co();
    $reponse = $bdd->prepare('
        SELECT * 
        FROM  utilisateur
        WHERE email = :email
    ');
    $reponse->bindParam(":email", $email);
    $reponse->execute();
    return $reponse;
}

function insertUser($mdp, $email, $pseudo) {
    $bdd = co();
    $req = $bdd->prepare('INSERT INTO utilisateur (pseudo, email, mdp) VALUES(:pseudo, :email, :mdp)');
    $req->bindParam(":pseudo", $pseudo);
    $req->bindParam(":mdp", $mdp);
    $req->bindParam(":email", $email);
    $req->execute();
}