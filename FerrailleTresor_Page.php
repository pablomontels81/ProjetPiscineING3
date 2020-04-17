
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
        <li class="active"><a href="#">Accueil</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégorie</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Ferraillerie et trésor</a><br>
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
<br><br><br><br><br>

<!-- CARROUSSEL -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>


    <!-- Wrapper for slides -->
     <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/lustre.jpg" alt="" style="width:503px;height:348px;">
        <div class="carousel-caption">
          <h3>Ferrailles et autres trésors</h3>
          <p>Allez à leur découverte</p>
        </div>      
      </div>

      <div class="item">
        <img src="images/carroussel1.png" alt="" style="width:703px;height:448px;">
        <div class="carousel-caption">
          <h3>Ferrailles et autres trésors</h3>
          <p>Allez à leur découverte</p>
        </div>      
      </div>

      <div class="item">
        <img src="images/carroussel2.png" alt="Image"style="width:703px;height:448px;">
        <div class="carousel-caption">
          <h3>Ferrailles et autres trésors</h3>
          <p>Allez à leur découverte</p>
        </div>      
      </div>
    </div>  
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<br><br> 
<br><br>
<br><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class= "panel-footer"><br>
        <div class="panel-body"><img src="images/meuble.jpg" class="img-responsive" style="width:300px; height:180px"; alt="Image"></div><br>
      </div>
        <br><div class="panel-white">Meuble 18ème siècle</div>
        <strong><div class="panel-white">75€</div></strong>

<button type="button">Achat Direct</button><button type="button">Enchère</button><button type="button">Meilleure offre</button>
    <br><br>  
  </div>

    
  <div class="row">
    <div class="col-sm-4">
      <div class= "panel-footer"><br>
        <div class="panel-body"><img src="images/miroir.jpg" class="img-responsive" style="width:300px; height:180px"; alt="Image"></div><br>
      </div>
        <br><div class="panel-white">Miroir d'époque</div>
        <strong><div class="panel-white">115€</div></strong>
<button type="button">Achat Direct</button><button type="button">Enchère</button><button type="button">Meilleure offre</button>
     <br><br>   
    </div>


   
  <div class="row">
    <div class="col-sm-4">
      <div class= "panel-footer"><br>
        <div class="panel-body"><img src="images/malles.jpg" class="img-responsive" style="width:300px; height:180px"; alt="Image"></div><br>
      </div>
        <br><div class="panel-white">Malles style grandes découvertes du 19ème</div>
        <strong><div class="panel-white">400€</div></strong>
        <button type="button">Achat Direct</button><button type="button">Enchère</button><button type="button">Meilleure offre</button>
        <br><br>
<br><br>
    </div>
</div>


<div class="container">    
   <div class="row">
    <div class="col-sm-4">
      <div class= "panel-footer"><br>
        <div class="panel-body"><img src="images/ferraille.jpg" class="img-responsive" style="width:300px; height:180px"; alt="Image"></div><br>
      </div>
        <br><div class="panel-white">Casserole en ferraille du 19ème siècle</div>
        <strong><div class="panel-white">75€</div></strong>
        <button type="button">Achat Direct</button><button type="button">Enchère</button><button type="button">Meilleure offre</button>
        <br><br>
    </div>
     <div class="row">
    <div class="col-sm-4">
      <div class= "panel-footer"><br>
        <div class="panel-body"><img src="images/pieces.jpg" class="img-responsive" style="width:300px; height:180px"; alt="Image"></div><br>
      </div>
        <br><div class="panel-white">Pièces 5 francs Napoléon III</div>
        <strong><div class="panel-white">220€</div></strong>
        <button type="button">Achat Direct</button><button type="button">Enchère</button><button type="button">Meilleure offre</button>
      <br><br> 
    </div>
    <div class="row">
    <div class="col-sm-4">
      <div class= "panel-footer"><br>
        <div class="panel-body"><img src="images/piece2.png" class="img-responsive" style="width:300px; height:180px"; alt="Image"></div><br>
      </div>
        <br><div class="panel-white">Pièce Napoléon 1er</div>
        <strong><div class="panel-white">760€</div></strong>
        <button type="button">Achat Direct</button><button type="button">Enchère</button><button type="button">Meilleure offre</button>
        <br><br>
    </div>
</div><br><br>

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
