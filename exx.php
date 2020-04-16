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
  </style>
</head>
<body>

<?php include 'navbar.php';?>
<!-- <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>


  <nav class="navbar navbar-expand-md">
      <a class="navbar-brand" href="#">
        <img src="logo.png"
           height="70px"
           width="100px">
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

 -->

  <div id="login">
    <div id="entete">
<h3 class="text-center">Bienvenue sur EceEbay</h3>
  
    <p class="text-center">Pionnier des ventes aux enchères en ligne</p>
    <br><br>     <br><br>    <br><br>    <br><br> 
     <h2 class="text-center">Veuillez sélectionner un Objet disponible en Vente <br>par Achat Direct afin de pouvoir placer un Achat<br> Direct !</h2>
  </div>

<!-- 
    <h3 class="text-center">Veuillez sélectionner un Objet disponible en Vente <br>par Achat Direct afin de pouvoir placer un Achat<br> Direct !</h6></h3>
    </h3> <br><br> <br><br> <br><br>  -->
 

</div>
<small>
<footer class="container-fluid text-center">
  <p>Pour s'abonner à notre newsletter et être toujours à l'affut des bons plans c'est ici !</p>  
  <form class="form-inline">Inscrivez-vous:
    <input type="email" class="form-control" size="50" placeholder="Adresse mail">
    <button type="button" class="btn btn-danger">S'inscrire</button>
  </form>
        <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12"><br>
            <h6 class="text-center">Information additionnelle</h6>
            <p class="text-center">
            Nous pronons au sein de ce site, un esprit de bonne camarederie et seront vigilant à toutes formes de violences au sein de notre site. 
            </p>
            <p class="text-center">
            Nous sommes présents afin de vous permettre de vendre et d'acheter des objets au sein de la communauté de l'ECE.
            </p>
          </div>
          <div class="col-sm-12">
            
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
    </p></div></div></div></footer></small></h3></h3></div></div></div></div></nav>
      <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: Pablo MONTELS & Jeanne ROQUES</div>
</footer>
  </small>

</body>
</html>
