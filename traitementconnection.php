<?php
	///Récupération des Données pour Identification Basique( Pseudo + Password)
	$login = isset($_POST["identifiant"])? $_POST["identifiant"] : "";
	$pass = isset($_POST["password"])? $_POST["password"] : "";
	$erreur = "";
	$messageUtilisateur = "";
	$RequeteCo ="";
	///Test Si champs de connection bien remplis
	if ($login =="")
	{
		$erreur .= "Veuillez Saisir Votre Identifiant. <br>";
	}
	if ($pass =="") 
	{
		$erreur .= "Veuillez Saisir Votre Mot de Passe. <br>";
	}

	///Récupération de la Base de Donnée et de la Table voulu (utilisateur)
	$database = "ebayece";
	//Connection à la Base de Données
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);

	///Test Si Login présent dans Base de Données puis si Bon Password
	if ($db_found)
	{
		//Récupération si existance de la ligne utilisateur allant avec ce Login et Password donné
		$RequeteCo = "SELECT * FROM utilisateur WHERE Pseudo= '$login' AND Password= '$pass'";
		$ResultatRecherche = mysqli_query($db_handle, $RequeteCo);
		//Si NbreResultatTrouvé = 1; alors connection sinon retour sur page de connection
		$NbreResultatTrouvé = mysqli_num_rows($ResultatRecherche);
		if ($NbreResultatTrouvé == 1) 
		{
			echo "Connection réussite vous allez bientôt être redirigé";
			/*$messageUtilisateur = "<h1>Connection réussite vous allez bientôt être redirigé </h1>";*/
		}
		else
		{
			echo "Connection échoué vous allez bientôt être redirigé vers la page de connection";
			/*$messageUtilisateur = "<h1>Connection échoué vous allez bientôt être redirigé vers la page de connection</h1>";*/
		}

	}

?>