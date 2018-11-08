<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="js/bootstrap.js"></script>
        <link rel="stylesheet" href="bootstrap.css" />
        <title>Mini-chat2</title>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="jumbotron">
                <img src="Sorting_bubblesort_anim.gif">   
                <h1 class="display-4">Bienvenue à Tous</h1>
                <p class="lead">Les algos sont nos amis pour la vie.</p>
                <hr class="my-4">
            </div>
        </div>
        <div>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ex:linda@gmail.com">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de Passe</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de Passe">
                </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>    
        <div>
            <form action="minichat2_post.php" method="post">
            <p>
            <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
            <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />
            <input type="submit" value="Envoyer" />
            </p>
            </form>
        </div>








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
    </body>
</html>