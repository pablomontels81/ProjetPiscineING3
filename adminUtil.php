<?php
    ///Démarrage de la session
    session_start();

    ///Récupération des Données pour l'Utilisateur
    $username = isset($_POST["username"])? $_POST["username"] : "";
    $email = isset($_POST["email"])? $_POST["email"] : "";

    $erreur = "";
    $RequeteCo ="";
    ///Test Si champs de connection bien remplis
    if ($username =="")
    {
        $erreur .= "Veuillez Saisir Le Nom d'Utilisateur de l'Utilisateur. <br>";
    }
    //Double Test si Bien Adresse mail ECE
    if ($email =="") 
    {
        $erreur .= "Veuillez Saisir L'email de l'Utilisateur. <br>";
    }
    else{
        $position =1;
        $serveur = explode('@', $email);
        if ($serveur[$position] !="edu.ece.fr") {
            $erreur .= "Veuillez Saisir Une Adresse Email ECE. <br>";
        }
    }
    
    ///Récupération de la Base de Donnée et de la Table voulu (utilisateur)
    $database = "ebayece";
    //Connection à la Base de Données
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    // Si mal remplissage retour sur Page de début
    if ($erreur != "") {
        echo '
            <script language="JAVASCRIPT">
                window.location.href = "Admin_Page.php"
            </script>';
    }
    ///Test Si Login présent dans Base de Données puis si Bon Password
    if ($db_found)
    {        
        //Si l'Admin veut Add un objet
        if ($_POST["buttonAddUtil"])
        {
            //Récupération de la Table et test si un pseudo pas déjà attribué ou si email déjà attribué.
            $RequeteIn = "SELECT * FROM utilisateur WHERE Pseudo= '$username' AND Vendeur=1)";
            $ResultatRecherche = mysqli_query($db_handle, $RequeteIn);
            //Si NbreResultatTrouvé = 1; alors pas d'inscription possible car pas de doublon accepté !
            $NbreResultatTrouvé = mysqli_num_rows($ResultatRecherche);
            if ($NbreResultatTrouvé == 1) 
            {
                echo '
                <script language="JAVASCRIPT">
                    window.location.href = "Admin_Page.php"
                </script>';
            }
            else
            {
                //Changement Satut de l'utilisateur
                $RequeteIn = "UPDATE utilisateur SET Vendeur=1 WHERE Pseudo= '$username'";
                $modif = mysqli_query($db_handle, $RequeteIn);
                echo '
                <script language="JAVASCRIPT">
                    window.location.href = "HomePage.php"
                </script>';
            }
        }
        if ($_POST["buttonSuppUtil"])
        {
            //Récupération si existance de la ligne item allant avec ce Propriétaire et Nom donné
            $Requete = "SELECT * FROM utilisateur WHERE Pseudo= '$username' AND Vendeur=1";
            $ResultatRecherche = mysqli_query($db_handle, $Requete);
            //Si NbreResultatTrouvé = 1; alors ce vendeur existe 
            $NbreResultatTrouvé = mysqli_num_rows($ResultatRecherche);
            if ($NbreResultatTrouvé == 1) 
            {
                //Requête puis envoie de l'Ordre de modification des droits
                $RequeteIn = "UPDATE utilisateur SET Vendeur=0 WHERE Pseudo= '$username'";
                $modif = mysqli_query($db_handle, $RequeteIn);
                echo '
                <script language="JAVASCRIPT">
                    window.location.href = "HomePage.php"
                </script>';
            }
            else 
            {
                echo '
                <script language="JAVASCRIPT">
                    window.location.href = "Admin_Page.php"
                </script>';

            }
        }
                
        
        
    }
    
    ///Fermeture de la connexion
    mysqli_close($db_handle);

?>