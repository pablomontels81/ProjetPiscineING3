<?php
	///Démarrage de la session
	session_start();

	///Récupération des Données pour création du compte
	$login = isset($_POST["identifiant"])? $_POST["identifiant"] : "";
	$pass = isset($_POST["password"])? $_POST["password"] : "";
	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
	$email = isset($_POST["email"])? $_POST["email"] : "";
	$clause = isset($_POST["clause"])? $_POST["clause"] : "";
	$vendeur = isset($_POST["vendeur"])? $_POST["vendeur"] : "";
	$acheteur = isset($_POST["acheteur"])? $_POST["acheteur"] : "";
	
	$erreur = "";
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
	if ($email =="") 
	{
		$erreur .= "Veuillez Saisir Votre Mot de Passe. <br>";
	}
	else{
		$position =1;
		$serveur = explode('@', $email);
		if ($serveur[$position] !="edu.ece.fr") {
			$erreur .= "Veuillez Saisir Une Adresse Email ECE. <br>";
		}
	}
	if ($nom =="") 
	{
		$erreur .= "Veuillez Saisir Votre Nom. <br>";
	}
	if ($prenom =="") 
	{
		$erreur .= "Veuillez Saisir Votre Prénom. <br>";
	}
	if ($clause =="") 
	{
		$erreur .= "Veuillez Accepter ou Pas la Clause. <br>";
	}
	if ($vendeur =="") 
	{
		$erreur .= "Veuillez renseigner si vous allez vendre ou pas sur notre site. <br>";
	}
	if ($acheteur =="") 
	{
		$erreur .= "Veuillez renseigner si vous allez acheter ou pas sur notre site. <br>";
	}
	///Test si l'Email est bien un EMail de l'ECE.
	///Test si l'utilisateur est ni Vendeur ni Acheteur alors ne pas le saisir.
	if (($acheteur==0)&&($vendeur==0))
	{
		$erreur .= "Vous êtes obligé d'être Vendeur ou Acheteur pour accéder à ce site. <br>";
	}

	///Récupération de la Base de Donnée et de la Table voulu (utilisateur)
	$database = "ebayece";
	//Connection à la Base de Données
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);

	///Test Si Login présent dans Base de Données puis si Bon Password
	if ($db_found)
	{
		if ($erreur == "") {
			//Récupération de la Table et test si un pseudo pas déjà attribué ou si email déjà attribué.
			$RequeteIn = "SELECT * FROM utilisateur WHERE Pseudo= '$login' OR Email= '$email'";
			$ResultatRecherche = mysqli_query($db_handle, $RequeteIn);
			//Si NbreResultatTrouvé = 1; alors pas d'inscription possible car pas de doublon accepté !
			$NbreResultatTrouvé = mysqli_num_rows($ResultatRecherche);
			if ($NbreResultatTrouvé == 0) 
			{
				//Enregistrement du nouveau utilisateur sur la base de données
				$RequeteIn = "INSERT INTO utilisateur (Pseudo,Nom,Prenom,Email,Password,Clause,Admin,Vendeur,Acheteur)
							  VALUES ('$login','$nom','$prenom','$email','$pass','$clause',0,'$vendeur','$acheteur')";
				$insertion = mysqli_query($db_handle, $RequeteIn);
				//Enregistrement du username
				$_SESSION['username']= $login;
				//Redirection vers HomePage
				echo '
				<script language="JAVASCRIPT">
	  				window.location.href = "HomePage.php"
				</script>';
			}
			else
			{
				echo '
				<script language="JAVASCRIPT">
	  				window.location.href = "Inscription_Page.php"
				</script>';
			}
		}
		else
			{
				//Redirection vers Page Inscription car il y a un problème
				echo '
				<script language="JAVASCRIPT">
	  				window.location.href = "Inscription_Page.html"
				</script>' ;
			}
		
		
	}
	///Fermeture de la connexion
	mysqli_close($db_handle);

?>