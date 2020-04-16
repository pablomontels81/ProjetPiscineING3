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
           height="70px"
           width="100px">
      </a>
    </nav>

     <div class="collapse navbar-collapse" id="navbarNav">
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
              <div class="dropdown-divider"></div>
            </div>
          </li>
          <li><a href="Vendre_Page.html">Vendre</a></li>
          <li><a href="#">Admin</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Mon panier</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-off"> Déconnexion</span></a></li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>

