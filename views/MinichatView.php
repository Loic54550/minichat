<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script type="text/javascript" src="lib/js/jquery.js"></script>
    <script type="text/javascript" src="lib/js/bootstrap.js"></script>
    <link rel="stylesheet" href="lib/css/bootstrap.css"/>
    <link rel="stylesheet" href="src/css/style.css">
    <title>Mini-chat2</title>
</head>
<body>
    <div class="wrapper">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <div class="jumbotron">
                    <img src="src/img/giphy.gif">
                    <h1>Welcome to 
                    <?php 
                        If(isset($_SESSION['pseudo'])) {
                            echo $_SESSION['pseudo'];
                        } else {
                            echo "ALL";
                        }
                    ?> 
                    <span class="badge badge-primary">New</span></h1>
                    <hr class="my-4">
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <form action="index.php" method="post">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email adress</label>
                        <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="ex: linda@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="pwd" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-danger">Connexion / Deconnexion</button>
                    <a data-toggle="modal" class="btn btn-primary" data-target="#exampleModal">Inscription</a>
                    <?= $messageErreur ?>
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
        <form action="index.php" method="post">
             <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">          
                    <div class="row">
                        <div class="col-md-12">  
                            <div class="form-group">
                                <label for="pseudo">Pseudo</label> 
                                <input type="text" class="form-control" name="pseudo" id="pseudo" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message">Message</label> 
                                <input type="text" class="form-control" name="message" id="message" />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enter</button> 
                </div>
                <div class="col-md-3"></div>
             </div>  
        </form>
        <?php 
            while ($donnees = $reponse->fetch()) {
                echo $donnees['pseudo'] . " " . $donnees['message'];
            }
        ?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="index.php" method="post">
              <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Pseudo</label>
                    <input type="text" class="form-control" name="pseudoInscription" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email adress</label>
                    <input type="text" class="form-control" name="emailInscription" aria-describedby="emailHelp" placeholder="ex:linda@gmail.com">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="pwdInscription" placeholder="Password">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
              </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>