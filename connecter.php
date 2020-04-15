<!DOCTYPE html>
<html>
<head>
  <title>EceEbay</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
   
    
    /* Remove the jumbotron's default bottom margin */ 
    .jumbotron {
      margin-bottom: 0;
    }
       
#login {
margin: 0;
padding: 0;
background-image: url("images/univers.jpg");
height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
#entete {
color: white;
        }
  </style>
</head>
<body>
<?php include 'navbar.php';?>


	<div id="login">
		<div id="entete">
			<br><br>
		<h3 class="text-center">Bienvenue sur EceEbay</h3>
    	<p class="text-center">Pionnier des ventes aux enchères en ligne</p>

<!--         <h3 class="text-center text-white pt-5">Se connecter</h3> -->
   		 </div>
     <span class="align-middle">middle
             <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Se connecter</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Nom d'utilisateur:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Mot de passe:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Se souvenir de moi</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Soumettre">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="#" class="text-info">S'inscrire ici</a>
                            </div>
                          </form>
                        </div>
                        </form>
                    </div>
</span>

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <?php include 'footer.php';?>
  </body>
</html>
