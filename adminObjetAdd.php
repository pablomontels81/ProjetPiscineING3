<?php
    ///Démarrage de la session
    session_start();

    $username = $_SESSION['newvendeur'];
    $nom = $_SESSION['newObjet'];
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

    $erreurs ="";

    ///Test Si champs de connection bien remplis
    if ($username =="")
    {
        $erreurs .= "Veuillez Saisir Le Propriétaire de l'Objet. <br>";
    }
    if ($nom =="")
    {
        $erreurs .= "Veuillez Saisir Le Nom de l'Objet. <br>";
    }
    if ($prix =="") 
    {
        $erreurs .= "Veuillez Saisir Le Prix de l'Objet. <br>";
    }
    if ($categorie =="")
    {
        $erreurs .= "Veuillez Saisir La Catégorie de l'Objet. <br>";
    }
    if ($DateDebut =="") 
    {
        $erreurs .= "Veuillez Saisir La Date de Début de vente de  l'Objet. <br>";
    }
    if ($DateDebut =="") 
    {
       $erreurs .= "Veuillez Saisir La Date de Fin de vente de  l'Objet. <br>";
    }
    if ($achatdirect =="")
    {
        $erreurs .= "Veuillez Saisir si OUI ou NON vous voulez activer ce mode de vente. <br>";
    }
    if ($enchere =="")
    {
        $erreurs .= "Veuillez Saisir si OUI ou NON vous voulez activer ce mode de vente. <br>";
    }
    if ($meilleuroffre =="")
    {
        $erreurs .= "Veuillez Saisir si OUI ou NON vous voulez activer ce mode de vente. <br>";
    }
    if ($DateDebut > $DateFin) {
        $erreurs .= "Veuillez saisir des dates correctes. <br>";
    }
    if (($achatdirect == 0)&&($enchere ==0)&&($meilleuroffre ==0)) {
        $erreurs .= "Veuillez sélectionner au moins un type de vente. <br>";
    }
    if ($prix <= 0) {
        $erreurs .= "Veuillez saisir un prix strictment positif";
    }

    
    ///Récupération de la Base de Donnée et de la Table voulu (utilisateur)
    $database = "ebayece";
    //Connection à la Base de Données
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    
    if ($erreurs != "") {
        echo '
            <script language="JAVASCRIPT">
                window.location.href = "Vendre_Page_Admin.php"
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
            window.location.href = "Admin_Page.php"
        </script>';
                     
    }
      
    ///Fermeture de la connexion
    mysqli_close($db_handle);

?>