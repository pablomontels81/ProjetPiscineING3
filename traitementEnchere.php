<?php
	//Démarrage de la session 
	session_start();
	//Mise en place variable nécessaires
	$username = $_SESSION['username'];
  	$IDItem = $_SESSION['IDitem'];
  	$EnchereMax = isset($_POST["PrixMax"])? $_POST["PrixMax"] : "";
  	$erreur="";

  	//Test si bien champs sont bien remplis
  	if ($EnchereMax =="")
    {
        $erreur .= "Veuillez Saisir L'Enchère Max'. <br>";
    }
    if ($IDItem =="")
    {
        $erreur .= "Veuillez Saisir L'ID de l'Item. <br>";
    }

  	///Récupération de la Base de Donnée et de la Table voulu (utilisateur)
	$database = "ebayece";
	//Connection à la Base de Données
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
  	

	if ($erreur != "")
	{
		echo '
			<script language="JAVASCRIPT">
			  	window.location.href = "AchatEnchere_Page.php?IDItem='.$IDItem.'"
			</script>' ;
	}
  	if ($db_found)
  	{
  		//Test si Enchere entre ce couple (Acheteur Objet) n'existe pas déjà
  		$sql = "
	  		SELECT *
	  		FROM enchere
	  		WHERE IDItemE ='$IDItem' AND IDAcheteurE ='$username'"; 
	  	
	  	$result  = mysqli_query($db_handle,$sql);
	  	//Couple déjà existant du coup modification de l'offre si elle est supérieur seulement mysql_num_rows(mysql_query("MA REQUETE")) == false
	  	if (mysqli_num_rows($result) != false) 
	  	{
	  		$sql = "
		  		SELECT *
		  		FROM enchere
		  		WHERE IDItemE ='$IDItem' AND IDAcheteurE ='$username'"; 
		  	$result = mysqli_query($db_handle,$sql);
	  		while ($data = mysqli_fetch_assoc($result)) 
	  		{
	  			$PrixMax = $data['PrixMax'];
	  			if ($PrixMax < $EnchereMax) 
			  	{
			  		$sql = "
				  		UPDATE enchere 
				  		SET PrixMax = '$EnchereMax'
				  		WHERE IDItemE = '$IDItem' AND IDAcheteurE = '$username'
				  		";
				  		$update = mysqli_query($db_handle, $sql);
				  		echo '
						<script language="JAVASCRIPT">
					  		window.location.href = "Categorie_Page.php"
						</script>' ;
					
			  			

			  	}
			  	//On ne peut baisser son enchère
			  	else
			  	{
			  		echo '
					<script language="JAVASCRIPT">
			  			window.location.href = "AchatEnchere_Page.php?IDItem='.$IDItem.'"
					</script>' ;
			  	}
	  		}
	  	}
	  	else
	  	{	  		
	  		//C'est Achat Direct du coup ajout au Panier en Direct
		  	$sql = "
		  		INSERT INTO enchere (IDItemE , IDAcheteurE , PrixMax)
		  		VALUES ('$IDItem','$username','$EnchereMax')";
		  	$insertion = mysqli_query($db_handle, $sql);
		  	echo '
			<script language="JAVASCRIPT">
		  		window.location.href = "Categorie_Page.php"
			</script>' ;
	  	}
	  	

	}
	//Remise à zéro de notre Item de session
	$_SESSION['IDitem']="";

  	
?>