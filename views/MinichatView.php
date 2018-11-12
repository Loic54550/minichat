<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="lib/css/bootstrap.css"/>
    <link rel="stylesheet" href="src/css/style.css">
    <script type="text/javascript" src="lib/js/jquery.js"></script>   
    <script type="text/javascript" src="lib/js/bootstrap.bundle.js"></script>
    <title>Mini-chat2</title>
</head>
<body>
    <div style="color: white">
        <?php 

        var_dump($_SESSION) ?>

    </div>
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Social Networks
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <button class="dropdown-item" type="button">Facebook</button>
        <button class="dropdown-item" type="button">Twitter</button>
      </div>
    </div>
    <div class="wrapper">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <div class="jumbotron">
                    <a href="index.php"><img src="src/img/giphy.gif"></a>
                    <h1>Welcome to
                    <?php 
                        if(isset($_SESSION['pseudo'])) {
                            echo $_SESSION['pseudo'];
                        } else {
                            echo "ALL";
                        }
                    ?>
                    </h1>
                    <form action="index.php" method="post">
                        <input type="hidden" name="deconnexion">
                        <button type="submit" class="btn btn-primary">Déconnexion</button>
                    </form>  
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">                   
                <a data-toggle="modal" class="btn btn-danger" data-target="#exampleModal" >Login</a>
                <a data-toggle="modal" class="btn btn-primary" data-target="#exampleModal2">Register</a>
                <?= $messageErreur ?>
            </div>
        </div>
        <form action="index.php" method="post">
             <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">          
                    <div class="row">
                        <div class="col-md-12"> 
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message">Message</label> 
                                <input type="text" class="form-control" name="message" id="message" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 text-center"> 
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div> 
                </div>
             </div>  
        </form>
        <?php 
            while ($donnees = $reponse->fetch()) {
                echo $donnees['pseudo'] . " " . $donnees['message'];
            }
        ?>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <label for="exampleInputEmail1">Minichat</label>
        <div class="border-top-0 form-control shadow-lg p-3 mb-5 h-25 bg-white rounded border-dark bg-light" id="zonetexte">
        </div>
    </div>
    <!-- Modal Login -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="index.php" method="post">
              <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email adress</label>
                    <input type="text" class="form-control" name="emailConnexion" aria-describedby="emailHelp" placeholder="ex:linda@gmail.com">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="pwdConnexion" placeholder="Password">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Connexion</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal Register -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="index.php" method="post">
              <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email adress</label>
                    <input type="text" class="form-control" name="emailInscription" aria-describedby="emailHelp" placeholder="ex:linda@gmail.com">
                </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Pseudo</label>
                    <input type="text" class="form-control" name="pseudoInscription" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="pwdInscription" placeholder="Password">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
              </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>