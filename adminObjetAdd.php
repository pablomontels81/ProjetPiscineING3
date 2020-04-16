<?php
    ///Démarrage de la session
    session_start();

    ///Récupération des Données pour Ajout Objet
    $prix = isset($_POST["prix"])? $_POST["prix"] : "";
    $categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
    $DateDebut = isset($_POST["DateDebut"])? $_POST["DateDebut"] : "";
    $DateFin = isset($_POST["DateFin"])? $_POST["DateFin"] : "";
    $photo = isset($_POST["photo"])? $_POST["photo"] : "";
    $video = isset($_POST["video"])? $_POST["video"] : "";
    $achatdirect = isset($_POST["achatdirect"])? $_POST["achatdirect"] : "";
    $enchere = isset($_POST["enchere"])? $_POST["enchere"] : "";
    $meilleuroffre = isset($_POST["meilleuroffre"])? $_POST["meilleuroffre"] : "";
    $username = $_SESSION['vendeur'];
    $nom = $_SESSION['nom'];


    $erreur = "";
    $RequeteCo ="";
    ///Test Si champs de connection bien remplis
    if ($prix =="") 
    {
        $erreur .= "Veuillez Saisir Le Prix de l'Objet. <br>";
    }
    if ($categorie =="")
    {
        $erreur .= "Veuillez Saisir La Catégorie de l'Objet. <br>";
    }
    if ($DateDebut =="") 
    {
        $erreur .= "Veuillez Saisir La Date de Début de vente de  l'Objet. <br>";
    }
    if ($DateDebut =="") 
    {
        $erreur .= "Veuillez Saisir La Date de Fin de vente de  l'Objet. <br>";
    }
    if ($achatdirect =="")
    {
        $erreur .= "Veuillez Saisir si OUI ou NON vous voulez activer ce mode de vente. <br>";
    }
    if ($enchere =="")
    {
        $erreur .= "Veuillez Saisir si OUI ou NON vous voulez activer ce mode de vente. <br>";
    }
    if ($meilleuroffre =="")
    {
        $erreur .= "Veuillez Saisir si OUI ou NON vous voulez activer ce mode de vente. <br>";
    }
    if ($DateDebut > $DateFin) {
        $erreur .= "Veuillez saisir des dates correctes. <br>";
    }
    if (($achatdirect == 0)&&($enchere ==0)&&($meilleuroffre ==0)) {
        $erreur .= "Veuillez sélectionner au moins un type de vente. <br>";
    }
    if ($prix <= 0) {
        $erreur .= "Veuillez saisir un prix strictment positif";
    }

    
    ///Récupération de la Base de Donnée et de la Table voulu (utilisateur)
    $database = "ebayece";
    //Connection à la Base de Données
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    
    if ($erreur != "") {
        echo '
            <script language="JAVASCRIPT">
                window.location.href = "Vendre_Page.html"
            </script>';
    }
    ///Test Si Login présent dans Base de Données puis si Bon Password
    if ($db_found)
    {        
        //Alors nous pouvons ajouter cette objet
        $RequeteIn = "INSERT INTO item (IDOwner,DateDebut,DateFin,Categorie,Nom,Enchere,Achatdirect,Meilleuroffre,statut,Prix,urlPhoto,urlVideo)
                      VALUES ('$username','$DateDebut','$DateFin','$categorie','$nom','$enchere','$achatdirect','$meilleuroffre',0,'$prix','photo','$video')";
        $insertion = mysqli_query($db_handle, $RequeteIn);
        echo '
        <script language="JAVASCRIPT">
            window.location.href = "HomePage.php"
        </script>';
              
    }
    //Remise à zéro des paramètres session pour l'ajout
    $_SESSION['vendeur'] = "";
    $_SESSION['nom'] = "";    
    ///Fermeture de la connexion
    mysqli_close($db_handle);

?>