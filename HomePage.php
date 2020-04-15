<?php
  session_start();
?>


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
 /*   .uni{
     background-image: url("images/univers.jpg");
    }*/
    
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
        <img src="logo.png"
           height="25px"
           width="50px">
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
        <li><a href="vendre.html">Vendre</a></li>
        <li><a href="#">Admin</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Mon panier</a></li>
      </ul>
    </div>
  </div>
</nav>


<h1 class="text-center">
  Bienvenue sur EceEbay
  <?php
    ///Récupération de la Base de Donnée et de la Table voulu (utilisateur)
    $database = "ebayece";
    //Connection à la Base de Données
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    $username = $_SESSION['username'];
    ///Test Si Login présent dans Base de Données puis si Bon Password
    if ($db_found)
    {
      $sql = "SELECT * FROM utilisateur WHERE Pseudo= '$username'";
      $result = mysqli_query($db_handle, $sql);
      while ($data = mysqli_fetch_assoc($result)) {
        echo $data['Prenom']." ".$data['Nom'];
      }
    }

  ?>
</h1>
  
    <p class="text-center">Pionnier des ventes aux enchères en ligne</p>
    <br><br>  
  </div>
</div>

  
<br><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary ">
        <div class="panel-heading">Nos offres pour la Saint-Valentin</div>
        <div class="panel-body"><img src="images/stvalentin.jpg" class="img-responsive" style="width:300px;height:250px;" alt="Image"></div>
        <div class="panel-footer">Découvrez nos produits spécialement pour les amoureux</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary ">
        <div class="panel-heading">Nos offres speciales fêtes des mères</div>
        <div class="panel-body"><img src="images/mere.jpg" class="img-responsive" style="width:300px;height:250px;" alt="Image"></div>
        <div class="panel-footer">Acheter 2 produits de beauté le 3e vous est offert !</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary ">
        <div class="panel-heading">Bénificiez d'une estimation de vos objets de valeurs </div>
        <div class="panel-body"><img src="images/vases.jpg" class="img-responsive" style="width:300px;height:250px;" alt="Image"></div>
        <div class="panel-footer">Nos spécialistes sont là pour vous aider</div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Promos du jour</div>
        <div class="panel-body"><img src="images/telephone.jpg" class="img-responsive" style="width:300px;height:250px;" alt="Image"></div>
        <div class="panel-footer">De la technologie à petit prix aujourd'hui</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Les bons plans modes de la semaine à ne pas louper</div>
        <div class="panel-body"><img src="images/sap.jpg" class="img-responsive" style="width:300px;height:250px;" alt="Image"></div>
        <div class="panel-footer">Pour des affaires tendances c'est par ici !</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Bientôt le Black Friday ...</div>
        <div class="panel-body"><img src="images/blff.jpg" class="img-responsive" style="width:300px;height:250px;" alt="Image"></div>
        <div class="panel-footer">Regardez nos offres</div>
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

