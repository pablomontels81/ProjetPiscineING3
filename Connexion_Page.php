<!DOCTYPE html>
<html lang="en">
<head>
  <title>EceEbay</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: -20px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
    .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    #entete {
    	color: white;
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
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
       </button>


     <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="#">
        <img style="height:30px;"src="logo.png">
       </a>
      </nav>

    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
           <li class="active"><a href="#">Accueil</a></li>
            <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégorie</a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">High-Tech</a><br>
                  <a class="dropdown-item" href="#">Mode</a><br>
                 <a class="dropdown-item" href="#">Maison & Jardin</a><br>
              <a class="dropdown-item" href="#">Occasion</a><br>
                 <a class="dropdown-item" href="#">Collection & Antiquité</a><br>
                   <div class="dropdown-divider"></div>
              </div>
        </li>
          <li><a href="#">Acheter aux enchères</a></li>
          <li><a href="#">Vendre</a></li>
          <li><a href="#">Admin</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Mon panier</a></li>
      </ul>
    </div>
 </div>
</nav>


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


<footer class="container-fluid text-center">
  <p>Pour s'abonner à notre newsletter et être toujours à l'affut des bons plans c'est ici !</p>  
  <form class="form-inline">Inscrivez-vous:
    <input type="email" class="form-control" size="50" placeholder="Adresse mail">
    <button type="button" class="btn btn-danger">S'inscrire</button>
  </form>
</footer>

<small>
<footer class="page-footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h6 class="text-center">Information additionnelle</h6>
            <p class="text-center">
            Nous pronons au sein de ce site, un esprit de bonne camarederie et seront vigilant à toutes formes de violences au sein de notre site. 
            </p>
            <p class="text-center">
            Nous sommes présents afin de vous permettre de vendre et d'acheter des objets au sein de la communauté de l'ECE.
            </p>
          </div>
          <div class="col-sm-12">
            <br><br>
 

            <p class="text-center">
            <h6 class="text-center">Contact</h6>
            <p class="text-center">
            37, quai de Grenelle, 75015 Paris, France <br>
            serviceclient@ebayece.fr <br>
            +33 01 02 03 04 05 <br>
            +33 01 03 02 05 04
            </p>
          </div>
        </div>
      </div>
      <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: Pablo MONTELS & Jeanne ROQUES</div>
    </footer>
  </small>
  </body>
</html>
