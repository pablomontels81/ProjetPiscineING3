<?php
  session_start();
  ///Test pour reconnaître les droits
  $username = $_SESSION['username'];
  $IDItem = $_GET['IDItem'];

  ///Récupération de la Base de Donnée et de la Table voulu (utilisateur)
  $database = "ebayece";
  //Connection à la Base de Données
  $db_handle = mysqli_connect('localhost', 'root', '' );
  $db_found = mysqli_select_db($db_handle, $database);
  ///Test Si Login présent dans Base de Données puis si Bon Password
  if ($db_found)
  {
    //Test si Admin
    $sql = "SELECT * FROM utilisateur WHERE Pseudo= '$username' AND Admin = 1 ";
    $result = mysqli_query($db_handle, $sql);
    $Nbresult = mysqli_num_rows($result);
    if ($Nbresult == 1)
    {
        $admin = "Admin_Page.php";
    }
    else
    {
      $admin = "#";
    }
    //Test si Vendeur
    $sql = "SELECT * FROM utilisateur WHERE Pseudo= '$username' AND Vendeur = 1 ";
    $result = mysqli_query($db_handle, $sql);
    $Nbresult = mysqli_num_rows($result);
    if ($Nbresult == 1)
    {
        $vendeur = "Vendre_Page.php";
    }
    else
    {
      $vendeur = "#";
    }
    //Test si Acheteur
    $sql = "SELECT * FROM utilisateur WHERE Pseudo= '$username' AND Acheteur = 1 ";
    $result = mysqli_query($db_handle, $sql);
    $Nbresult = mysqli_num_rows($result);
    if ($Nbresult == 1)
    {
      $categorie = "Categorie_Page.php";
      $FerrailleTresor = "FerrailleTresor_Page.php";
      $Musee = "BonMusee_Page.php";
      $VIP = "AccessoireVIP_Page.php";
      $AchatDirect = "AchatDirect_Page";
      $Enchere = "Enchere_Page";
      $MeilleurOffre = "MeilleurOffre_Page";
      $MonCompte = "MonCompte_Page.php";
      $Panier = "Panier_Page.php";
    }
    else
    {
      $categorie = "#";
      $FerrailleTresor = "#";
      $Musee = "#";
      $VIP = "#";
      $AchatDirect = "#";
      $Enchere = "#";
      $MeilleurOffre = "#";
      $MonCompte = "#";
      $Panier = "#";
    }
  }
  
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
<!------ Include the above in your HEAD tag ---------->
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      border-bottom-color: black;
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
    .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  
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
        <li class="active"><a href="HomePage.php">Accueil</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="<?php echo $categorie ;?>" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégorie</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo $categorie ;?>">Voir les Catégories</a><br>
              <a class="dropdown-item" href="<?php echo $FerrailleTresor ;?>">Feraille ou Trésor</a><br>
              <a class="dropdown-item" href="<?php echo $Musee ;?>">Bon Pour le Musée</a><br>
              <a class="dropdown-item" href="<?php echo $VIP ;?>">Accessoire VIP</a><br><br>
              <div class="dropdown-divider"></div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Achat</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo $AchatDirect ;?>">Achat Direct</a><br>
              <a class="dropdown-item" href="<?php echo $Enchere ;?>">Enchère</a><br>
              <a class="dropdown-item" href="<?php echo $MeilleurOffre ;?>">Meilleur Offre</a><br><br>
              
            </div>
          </li>
          <li><a href="<?php echo $vendeur; ?>"; ?>Vendre</a></li>
          <li><a href="<?php echo $admin; ?>">Admin</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo $MonCompte ;?>"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
        <li><a href="<?php echo $Panier ;?>"><span class="glyphicon glyphicon-shopping-cart"></span> Mon panier</a></li>
        <li><a href="Deconnexion_Page.php"><span class="glyphicon glyphicon-off"> Déconnexion</span></a></li>
      </ul>
      </div>
  </nav>

<br><br><br><br><br>


<br><br>
<br><br>

<FONT size= "12pt"><center><strong><div class="panel-white">Achat par meilleure offre !</div></strong></center><br><br></FONT>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class= "panel-footer"><br>
                <div class="panel-body"><img src="images/lustre.jpg" class="img-responsive" style="width:300px; height:180px"; alt="Image">
                </div>
            </div>
            <br>
<!--             <div class="panel-white">Fauteuil style Mondrian</div>
            <strong><div class="panel-white">360€</div></strong>
                <button type="button">Achat Direct</button>
                <br><br>   -->
        </div>

    
        <div class="row">
            <div class="col-sm-7">
                <div class= "panel-footer"><br>
                    <div class="panel-body"><strong>Bibliothèque style Charlotte Perriand</strong><br>Bibliothèque authentique de Charlotte Perriand très bien conservée<br>Très design Vendeur : Louise Goudet<br>ID : 367 165 836 209<br><br>Montant que vous souhaitez proposer:<input type ="number" id="tentacles" name="tentacles"
       min="670"><br><input type="button" value="Placez votre meilleure offre"><br><br>

                    </div>
                </div>
                <br><br>   
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br>



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
  </body>
</html>
