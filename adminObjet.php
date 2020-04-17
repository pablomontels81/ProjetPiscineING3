<?php
    ///Démarrage de la session
    session_start();

    ///Récupération des Données pour Ajout Objet
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $IDOwner = isset($_POST["IDOwner"])? $_POST["IDOwner"] : "";

    $erreur = "";
    ///Test Si champs de connection bien remplis
    if ($nom =="")
    {
        $erreur .= "Veuillez Saisir Le Nom de l'Objet. <br>";
    }
    if ($IDOwner =="") 
    {
        $erreur .= "Veuillez Saisir Le Nom d'Utilisateur du Propriétaire de l'Objet. <br>";
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
        if ($_POST["buttonAdd"])
        {
            //Récupération si existance de la ligne item allant avec ce Propriétaire et Nom donné
            $RequeteAdd = "SELECT * FROM item WHERE IDOwner = '$IDOwner' AND Nom = '$nom'";
            $ResultatRecherche = mysqli_query($db_handle, $RequeteAdd);
            //Si NbreResultatTrouvé = 1; alors cette objet existe déjà.
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
                echo " Boucle Objet Non Repertorié <br>";
                ///Test si Utilisateur est bien vendeur.
                $RequeteAdd = "SELECT * FROM utilisateur WHERE Pseudo= '$IDOwner' AND Vendeur=1";
                $ResultatRecherche = mysqli_query($db_handle, $RequeteAdd);
                //Si NbreResultatTrouvé = 1; alors l'utilisateur est bien un vendeur
                $NbreResultatTrouve = mysqli_num_rows($ResultatRecherche);
                if ($NbreResultatTrouve == 1) 
                {
                    $_SESSION['newvendeur']=$IDOwner;
                    $_SESSION['newObjet']=$nom;
                    echo '
                    <script language="JAVASCRIPT">
                        window.location.href = "Vendre_Page_Admin.php"
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
        if (isset($_POST["boutonSUP"]))
        {
            //Récupération si existance de la ligne item allant avec ce Propriétaire et Nom donné
            $Requete = "SELECT * FROM item WHERE IDOwner = '$IDOwner' AND Nom = '$nom'";
            $ResultatRecherche = mysqli_query($db_handle, $Requete);
            //Si NbreResultatTrouvé = 1; alors cette objet existe 
            $NbreResultatTrouvé = mysqli_num_rows($ResultatRecherche);
            if ($NbreResultatTrouvé == 1) 
            {
                //Requête puis envoie de l'Ordre de suppression
                $sql = "DELETE FROM item WHERE IDOwner = '$IDOwner' AND Nom = '$nom'";
                mysqli_query($db_handle, $sql);
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