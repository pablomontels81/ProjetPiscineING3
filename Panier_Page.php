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
.MonCompte
{
  background-image: url("images/univers.jpg");
}
.ContenuCompte
{
  background-color: white;
  margin-bottom: 20px;
}
.ContenuCompteText
{
  color: white;
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
.formborder {
  border-color: black;
  background-color: white;
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
  <br>

<div class="MonCompte">
<br><br>
  <div class="ContenuCompteText">
    <h1 class="text-center">
      Bienvenue sur EceEbay
      <?php
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
  </div>
    <br><br>  
  

  <div class="container features ContenuCompte">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 formborder">
          <h3 class="feature-title text-center">Récapitulatif de Votre Panier</h3>
          <table class="table">
            <tr>
              <th scope="col">Nom de l'Objet </th>
              <th scope="col">Prix de l'Objet </th>
              <th scope="col">Prix Cumulé</th>
            </tr>
            <?php
              if ($db_found) 
              {
                $statut=0;
                $PrixTot =0;
                $Recherche="
                SELECT item.Nom AS Nom, panier.PrixFinal AS Prix
                FROM panier 
                INNER JOIN item 
                ON item.IDItem=panier.IDItemP 
                WHERE panier.IDAcheteurP = '$username' AND panier.Statut='$statut'";
                $resultatRecherche = mysqli_query($db_handle, $Recherche);
                //Affichage des enchère pour notre utilisateur
                while ($data = mysqli_fetch_array($resultatRecherche)) 
                {
                  $PrixTot=$PrixTot + $data['Prix'];
                  echo '
                  <tr>
                  <td>'.$data['Nom'].'</td>
                  <td>'.$data['Prix'].'</td>
                  <td>'.$PrixTot.'</td>
                  </tr>';      
                }
              }
            ?>
          </table>
          <form action="suppressionItemPanier.php" method="post">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Veuillez Sélectionner l'item à supprimer si besoin !</label>
              <select class="form-control" id="exampleFormControlSelect1" name="Objet">
                <option>Aucune</option>
                <?php
                    ///Test Si Login présent dans Base de Données puis si Bon Password
                    if ($db_found)
                    {    
                      $Recherche="
                      SELECT item.Nom AS Nom, panier.PrixFinal AS Prix, item.IDItem AS ID
                      FROM panier 
                      INNER JOIN item 
                      ON item.IDItem=panier.IDItemP 
                      WHERE panier.IDAcheteurP = '$username' AND panier.Statut='$statut'";
                      $resultatRecherche = mysqli_query($db_handle, $Recherche);
                      //Affichage des enchère pour notre utilisateur
                      while ($data = mysqli_fetch_array($resultatRecherche)) 
                      {
                        $PrixTot=$PrixTot + $data['Prix'];
                        echo '
                        <option value='.$data['ID'].'>'.$data['Nom'].'</option>';      
                      }
                  }
                ?>
              </select>
            </div> 
            <input type="submit" class="btn btn-secondary btn-block but1" value="Supprimer cet élément de mon panier" name="buttonSuppItem">         
          </form>
            
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 form">
          <h3 class="feature-title text-center">Saisie de l'Adresse de Livraison</h3>
          <form id="login-form" class="form" action="traitementCommande.php" method="post">
            <div class="form-group">
                <label class="text-info">Adresse 1:</label><br>
                <input type="text" name="Adresse1" class="form-control">
                                
                <label class="text-info">Adresse 2:</label><br>
                <input type="text" name="Adresse2" class="form-control">
                  
                <label class="text-info">Ville:</label><br>
                <input type="text" name="Ville" class="form-control">
                                
                <label class="text-info">Code Postal:</label><br>
                <input type="text" name="CP" class="form-control">

                <label class="text-info">Pays:</label><br>
                <input type="text" name="Pays" class="form-control">

                <label class="text-info">Numéro:</label><br>
                <input type="text" name="Numero" class="form-control">

            </div>
            <h3 class="feature-title text-center">Adresse de Livraison déjà Enregistré !</h3>
            <p class="text-center">Si vous voulez utiliser une Adresse existante veuillez la saisir dans les champs. Sinon veuillez saisir l'Adresse de Livraison souhaitée.</p>
            <table class="table">
              <tr>
                <th scope="col">Adresse 1 </th>
                <th scope="col">Adresse 2 </th>
                <th scope="col">Ville</th>
                <th scope="col">Code Postal </th>
                <th scope="col">Pays </th>
                <th scope="col">Numéro</th>
              </tr>
            <?php
              ///Test Si Login présent dans Base de Données puis si Bon Password
              if ($db_found)
              {    
                $Recherche="
                  SELECT livraison.Adresse1 AS Adresse1, livraison.Adresse2 AS Adresse2, livraison.CodePostal AS CP, livraison.Ville AS Ville, livraison.Pays AS Pays, livraison.Numero AS Numero
                  FROM livraison 
                  WHERE livraison.IDPersonne = '$username'";
                $resultatRecherche = mysqli_query($db_handle, $Recherche);
                //Affichage des enchère pour notre utilisateur
                while ($data = mysqli_fetch_array($resultatRecherche)) 
                {
                  echo '
                    <tr>
                    <td>'.$data['Adresse1'].'</td>
                    <td>'.$data['Adresse2'].'</td>
                    <td>'.$data['Ville'].'</td>
                    <td>'.$data['CP'].'</td>
                    <td>'.$data['Pays'].'</td>
                    <td>'.$data['Numero'].'</td>
                    </tr>';     
                }
              }
            ?>
            </table>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 form">
          <h3 class="feature-title text-center">Saisie du Mode de Paiement</h3>
          
            <div class="form-group">
                <label class="text-info">Numéro de Carte:</label><br>
                <input type="text" name="NumCarte" class="form-control">
                                
                <label class="text-info">Cryptogramme:</label><br>
                <input type="text" name="Cryptogramme" class="form-control">
                                
                <label class="text-info">Nom Propriétaire:</label><br>
                <input type="text" name="NomProprio" class="form-control">
                                
                <label class="text-info">Date d'Expiration:</label><br>
                <input type="date" name="DateExpir" class="form-control">

                <label class="text-info">Type De Carte:</label><br>
                <select class="form-control" id="exampleFormControlSelect1" name="TypeCarte">
                  <option value=""></option>
                  <option value="Visa">Visa </option>
                  <option value="MasterCard">MasterCard</option>
                  <option value="American Express">American Express</option>
                  <option value="Paypal">Paypal</option>
                </select>

                <label class="text-info">Fond Disponible:</label><br>
                <input type="number" name="Fond" class="form-control">

            </div>
          <h3 class="feature-title text-center">Adresse de Livraison déjà Enregistré !</h3>
            <p class="text-center">Si vous voulez utiliser une Adresse existante veuillez la saisir dans les champs. Sinon veuillez saisir l'Adresse de Livraison souhaitée.</p>
            <table class="table">
              <tr>
                <th scope="col">Num Bancaire </th>
                <th scope="col">Cryptogramme </th>
                <th scope="col">Nom Propri</th>
                <th scope="col">Type de Carte </th>
                <th scope="col">Date d'Expiration </th>
                <th scope="col">Fond</th>
              </tr>
            <?php
              ///Test Si Login présent dans Base de Données puis si Bon Password
              if ($db_found)
              {    
                $Recherche="
                  SELECT comptebancaire.NumBancaire AS NumBancaire, comptebancaire.Cryptogramme AS Cryptogramme, comptebancaire.NomCarte AS NomCarte, comptebancaire.TypeCarte AS TypeCarte, comptebancaire.DateExpiration AS DateExpiration, comptebancaire.Fond AS Fond
                  FROM comptebancaire 
                  WHERE comptebancaire.IDUtil = '$username'";
                $resultatRecherche = mysqli_query($db_handle, $Recherche);
                //Affichage des enchère pour notre utilisateur
                while ($data = mysqli_fetch_array($resultatRecherche)) 
                {
                  echo '
                    <tr>
                    <td>'.$data['NumBancaire'].'</td>
                    <td>'.$data['Cryptogramme'].'</td>
                    <td>'.$data['NomCarte'].'</td>
                    <td>'.$data['TypeCarte'].'</td>
                    <td>'.$data['DateExpiration'].'</td>
                    <td>'.$data['Fond'].'</td>
                    </tr>';     
                }
              }
            ?>
          </table>
          <div>
            <input type="submit" name="Commander" class="btn btn-info btn-md" value="Commander !">
          </div>
        </form>
        </div>
            <br>
            <br>
        </div>
      </form>
      </div>
    </div>
    <br><br>
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

