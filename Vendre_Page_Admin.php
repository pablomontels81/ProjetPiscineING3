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
<div>
  <?php 
    $newvendeur = $_SESSION['newvendeur'];
    echo $newvendeur;
    $newvendeur ="";
  ?>
</div>
<div class="container-fluid">
            <div id="login-row">
                <div id="login-column" class="col-md-6 col-md-push-3">
                    <div id="login-box" class="col-md-12" >
                        <form id="form-content" action="adminObjetAdd.php" method="post">
                            <h3 class="text-center text-info">Formulaire d'Ajout d'un Objet</h3>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Votre Prix *" name="prix"/>
                              </div>
                              <div class="form-group">
                                  <select name="categorie">
                                    <option value="">Veuillez choisir une Catégorie</option>
                                    <option value="Ferraille_Tresor">Ferraille ou Trésor</option>
                                    <option value="Musee">Bon pour le Musée</option>
                                    <option value="VIP">Accessoire VIP</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <input type="date" class="form-control" placeholder="Date de Début *" name="DateDebut" />
                              </div>
                              <div class="form-group">
                                  <input type="date" class="form-control" placeholder="Date de Fin" name="DateFin"/>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Nom-Photo.png/jpg"/ name="photo">
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Nom-Vidéo.mov/mp4*" name="video" />
                              </div>
                              <table class="table">
                                    <td>
                                      <label for="achatdirect" class="text-info">Achat Direct ?</label><br>
                                      <input type="radio" name="achatdirect" id="OKAY" value="1">
                                      <label for="OKAY">OUI</label>
                                      <input type="radio" name="achatdirect" id="NON" value="0">
                                      <label for="NON">NON</label>
                                    </td>
                                    <td>
                                      <label for="enchere" class="text-info">Achat par Enchère ?</label><br>
                                      <input type="radio" name="enchere" id="OKAY" value="1">
                                      <label for="OKAY">OUI</label>
                                      <input type="radio" name="enchere" id="NON" value="0">
                                      <label for="NON">NON</label>
                                    </td>
                                    <td>
                                      <label for="meilleuroffre" class="text-info">Achat par Meilleur Offre ? :</label><br>
                                      <input type="radio" name="meilleuroffre" id="OKAY" value="1">
                                      <label for="OKAY">OUI</label>
                                      <input type="radio" name="meilleuroffre" id="NON" value="0">
                                      <label for="NON">NON</label>
                                    </td>
                                </table>
                          </div>
                          <input type="submit" name="submit" class="btn btn-info btn-md" value="Ajouter l'Objet sur EbayByECE ">
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
