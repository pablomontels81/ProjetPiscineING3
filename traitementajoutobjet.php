<?php
    ///Démarrage de la session
    session_start();

    ///Récupération des Données pour Ajout Objet
    $IDOwner = isset($_POST["IDOwner"])? $_POST["IDOwner"] : "";
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $prix = isset($_POST["prix"])? $_POST["prix"] : "";
    $categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
    $DateDebut = isset($_POST["DateDebut"])? $_POST["DateDebut"] : "";
    $DateFin = isset($_POST["DateFin"])? $_POST["DateFin"] : "";
    $photo = isset($_POST["photo"])? $_POST["photo"] : "";
    $video = isset($_POST["video"])? $_POST["video"] : "";
    $achatdirect = isset($_POST["achatdirect"])? $_POST["achatdirect"] : "";
    $enchere = isset($_POST["enchere"])? $_POST["enchere"] : "";
    $meilleuroffre = isset($_POST["meilleuroffre"])? $_POST["meilleuroffre"] : "";


    $erreur = "";
    $RequeteCo ="";
    ///Test Si champs de connection bien remplis
    if ($IDOwner =="")
    {
        $erreur .= "Veuillez Saisir Le Nom du Propriétaire. <br>";
    }
    if ($nom =="")
    {
        $erreur .= "Veuillez Saisir Le Nom de l'Objet. <br>";
    }
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
        //Récupération si existance de la ligne item allant avec ce Propriétaire & ce nom donné
        $RequeteAdd = "SELECT * FROM item WHERE IDOwner = '$IDOwner' AND Nom = '$nom'";
        $ResultatRecherche = mysqli_query($db_handle, $RequeteAdd);
        //Si NbreResultatTrouvé = 1; alors cette objet existe déjà
        $NbreResultatTrouvé = mysqli_num_rows($ResultatRecherche);
        if ($NbreResultatTrouvé == 1) 
        {
            echo '
            <script language="JAVASCRIPT">
                window.location.href = "Vendre_Page_Admin.php"
            </script>';
        }
        
        if ($NbreResultatTrouvé == 0)
        {
                       
            //Alors nous pouvons ajouter cette objet
            $RequeteIn = "INSERT INTO item (IDOwner,DateDebut,DateFin,Categorie,Nom,Enchere,Achatdirect,Meilleuroffre,statut,Prix,urlPhoto,urlVideo)
                          VALUES ('$IDOwner','$DateDebut','$DateFin','$categorie','$nom','$enchere','$achatdirect','$meilleuroffre',0,'$prix','photo','$video')";
            $insertion = mysqli_query($db_handle, $RequeteIn);
            echo '
            <script language="JAVASCRIPT">
                window.location.href = "HomePage.php"
            </script>';
        }
        else 
        {
            echo '
            <script language="JAVASCRIPT">
                window.location.href = "Vendre_Page_Admin.html"
            </script>';
        }
        
    }
    
    ///Fermeture de la connexion
    mysqli_close($db_handle);

?>




