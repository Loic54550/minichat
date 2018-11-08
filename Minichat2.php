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
        <div class="row justify-content-md-center">
            <div class="col-md-6 text-center">
                <div class="jumbotron">
                    <img src="anime.gif">   
                    <h1 class="display-4">Welcome to all</h1>
                    <p class="lead">Algos are our friends for life.</p>
                    <hr class="my-4">
                </div>
            </div>
        </div>
        <div>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email adress</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ex:linda@gmail.com">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
    </body>
</html>