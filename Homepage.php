<?php
  session_start();
  ///Test pour reconnaître les droits
  $username = $_SESSION['username'];
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
      $AchatDirect = "AchatDirectSansItem_Page.php";
      $Enchere = "EnchereSansItem_Page.php";
      $MeilleurOffre = "MeilleurOffreSansItem_Page.php";
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

    ///Recherche d'Enchère arrivant en fin de temps
    $DateActuelle = date('y-m-d');
    $testEnchere = "
      SELECT item.IDItem AS ID
      FROM enchere 
      INNER JOIN item 
      ON item.IDItem = enchere.IDItemE 
      WHERE item.DateFin <= '$DateActuelle' 
      ";
    $result = mysqli_query($db_handle, $testEnchere);
    while ($data = mysqli_fetch_array($result)) 
    {
      ///Recherche du Gagnant de l'enchère
      $Item = $data['ID'];
      $GagnantEnchere = "
        SELECT IDItemE, IDAcheteurE, PrixMax 
        FROM enchere 
        WHERE enchere.IDEnchere='$Item' 
        GROUP BY PrixMax DESC LIMIT 1"; 
      //Récupération du Gagnant
      $RecupGagnant = mysqli_query($db_handle, $GagnantEnchere);
      while ($dataGagnant = mysqli_fetch_array($RecupGagnant)) 
      {
        //Récupération des données pour ajouter au panier
        $Item = $dataGagnant['IDItemE'];
        $Acheteur = $dataGagnant['IDAcheteurE'];
        $Prix = $dataGagnant['PrixMax'];
        //Ajout au panier de l'Acheteur 
        $sql = "
          INSERT INTO panier (IDItemP , IDAcheteurP , PrixFinal , Statut)
          VALUES ('$Item','$Acheteur','$Prix',0)";
        $insertion = mysqli_query($db_handle,$sql);
        //Désactivation de l'Item pour qu'il ne puisse être acheté après les enchères en mode Achat Libre
        $newstatut = 1;
        $sql = "
          UPDATE item
          SET statut = '$newstatut'
          WHERE IDItem = '$Item'";
        $update = mysqli_query($db_handle,$sql);

      }
    }
    ///Recherche de Meilleur Offre ayant dépassé les 5 chances
    $Compteur = 5;
    $testOffre = "
      DELETE 
      FROM meilleuroffre 
      WHERE Compteur > '$Compteur' ";
    $update = mysqli_query($db_handle,$testOffre);

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
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: -20px;
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
    #login {
   margin: 0;
   padding: 0;
   background-image: url("images/univers.jpg");
    height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 10px;
  margin-left: auto;
  max-width: 600px;
  height: 450px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
.note
{
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
#form-content
{
    margin-top: 50px;
    padding: 2%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
    background-color: #EAEAEA;
}
.form-control{
    border-radius:1.5rem;
}
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
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

