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
      border-bottom-color: black;
    }
   
    #table-spacing {
      border-spacing: 5px;
    }
    /* Remove the jumbotron's default bottom margin */ 
    .jumbotron {
      margin-bottom: 0;
    }
    .form {
      margin-left: 0;
    }
    .but1 {
      background-color: green;
    }
    .but2 {
      background-color: red;
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

<nav class="navbar navbar-expand-md">
      <a class="navbar-brand" href="#">
        <img src="logotest.png"
           height="25px"
           width="60px">
      </a>
      <button class="navbar-toggler navbar-dark" 
          type="button"
          data-toggle="collapse"
          data-target="#main-navigation">
        <span class="navbar-toggler-icon"></span>   
      </button> 
      <div class="collapse navbar-collapse"
         id="main-navigation">
        <ul class="nav navbar-nav">
        <li class="active"><a href="#">Accueil</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégorie</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Accessoire VIP</a><br>
              <a class="dropdown-item" href="#">Bon Pour le Musée</a><br>
              <a class="dropdown-item" href="#">Accessoire VIP</a><br><br>
              <div class="dropdown-divider"></div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Achat</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Achat Direct</a><br>
              <a class="dropdown-item" href="#">Enchère</a><br>
              <a class="dropdown-item" href="#">Meilleur Offre</a><br><br>
              
            </div>
          </li>
          <li><a href="Vendre_Page.html">Vendre</a></li>
          <li><a href="#">Admin</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Mon panier</a></li>
        <li><a href="Deconnexion_Page.php"><span class="glyphicon glyphicon-off"> Déconnexion</span></a></li>
      </ul>
      </div>
  </nav>


<br><br>

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
<div class="container features">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 form">
          <h3 class="feature-title">Action sur un Vendeur</h3>
          <form action="adminUtil.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Nom d'Utilisateur: " name="username">
            </div>
            <input type="submit" class="btn btn-secondary btn-block but1" value="Ajouter en tant que Vendeur" name="buttonAddUtil">
            <input type="submit" class="btn btn-secondary btn-block but2" value="Supprimer en tant que Vendeur" name="buttonSuppUtil">
          </form>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 form">
          <h3 class="feature-title">Action sur un Objet</h3>
          <form action="adminObjet.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Nom de l'Objet: " name="nom">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Nom d'Utilisateur du Vendeur:" name="IDOwner">
            </div>
            <input type="submit" class="btn btn-secondary btn-block but1" value="Ajouter Cet Objet" name="buttonAdd">
            <input type="submit" class="btn btn-secondary btn-block but2" value="Supprimer Cet Objet" name="buttonSupp">
          </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 form ">
          <h3 class="feature-title">Récapitulatif de votre Compte !</h3>


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
                echo '
               
               <table class="table-hover">
                  <tr>
                  <td>Nom Utilisateur : &nbsp</td>
                  <td>&nbsp'.$username.'</td>
                </tr>
                <tr>
                  <td>Mot de Passe : &nbsp</td>
                  <td>&nbsp'.$data['Password'].'</td>
                </tr>
                <tr>
                  <td>Nom : &nbsp</td>
                  <td>&nbsp'.$data['Nom'].'</td>
                </tr>
                <tr>
                  <td>Prénom : &nbsp</td>
                  <td>&nbsp'.$data['Prenom'].'</td>
                </tr>
                <tr>
                  <td>Email : &nbsp</td>
                  <td>&nbsp'.$data['Email'].'</td>
                </tr>
              </table>
               ';
              }
            }
          ?>
          <input type="submit" class="btn btn-secondary btn-block" value="Modifer" name="">
        </div>
      </div>
    </div>

  
<br><br>





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

