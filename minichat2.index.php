<?php

// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// Récupération des 20 derniers messages
$reponse = $bdd->prepare('SELECT * 
                        FROM minichat 
                        LEFT JOIN utilisateur 
                            ON utilisateur.id = minichat.utilisateurId; 
                        ORDER BY ID 
                        DESC LIMIT 0, 20'
);

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch()) {
    echo $donnees['pseudo'] . " " . $donnees['message'];
}


if (isset($_POST['email'])) {
    $req = $bdd->prepare('INSERT INTO item(email, mdp) VALUES(:email, :mdp)');
    $req->bindParam(":mdp", $_POST['mdp']);
    $req->bindParam(":email", $_POST['email']);
    $req->execute();
}

?>