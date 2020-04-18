<?php
	//Démarage de la session
	session_start();
	//Récupération de l'ID de notre Utilisateur
	$username = $_SESSION['username'];
	$objet = isset($_POST["Objet"])? $_POST["Objet"] : "";

	$erreur="";

	///Récupération de la Base de Donnée et de la Table voulu (utilisateur)
    $database = "ebayece";
    //Connection à la Base de Données
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    if ($objet =="")
    {
        $erreur .= "Veuillez Saisir Le Nom d'Utilisateur de l'Utilisateur. <br>";
    }
    if ($erreur =="") 
    {
    	if ($db_found) 
    	{
    		$sql = "DELETE FROM panier
    			WHERE IDItemP= '$objet' AND IDAcheteurP= '$username'";
    		$modif = mysqli_query($db_handle, $sql);
            echo '
            <script language="JAVASCRIPT">
                window.location.href = "Panier_Page.php"
            </script>';  		
    	}
    }
    else
    {
    	echo '
            <script language="JAVASCRIPT">
                window.location.href = "Panier_Page.php"
            </script>';
    }
?>