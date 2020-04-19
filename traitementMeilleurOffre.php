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
	  		FROM meilleuroffre
	  		WHERE IDItemM ='$IDItem' AND IDAcheteurM ='$username'"; 
	  	
	  	$result  = mysqli_query($db_handle,$sql);
	  	//Couple déjà existant du coup modification de l'offre si elle est supérieur seulement
	  	if (mysqli_num_rows($result) != false) 
	  	{
	  		$sql = "
		  		SELECT *
		  		FROM meilleuroffre
		  		WHERE IDItemM ='$IDItem' AND IDAcheteurM ='$username'"; 
		  	$result = mysqli_query($db_handle,$sql);
	  		while ($data = mysqli_fetch_assoc($result)) 
	  		{
	  			$Compteur = $data['Compteur'];
	  			$NewCompteur = $Compteur+1;
	  			$PrixMax = $data['SurEnchere'];
	  			if ($Compteur > 5)
	  			{
	  				echo '
					<script language="JAVASCRIPT">
					  	window.location.href = "Categorie_Page.php"
					</script>' ;
	  			}
	  			else
	  			{
	  				if ($PrixMax < $EnchereMax) 
				  	{
				  		
				  		$sql = "
					  		UPDATE meilleuroffre
					  		SET SurEnchere = '$EnchereMax', Compteur = '$NewCompteur'
					  		WHERE IDItemM = '$IDItem' AND IDAcheteurM = '$username'
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
				  			window.location.href = "AchatMeilleurOffre_Page.php?IDItem='.$IDItem.'"
						</script>' ;
				  	}
	  			}
	  		}
	  	}
	  	//On ne peut baisser une Offre
	  	else
	  	{
	  		$sql = "
		  		INSERT INTO meilleuroffre (IDItemM , IDAcheteurM , Acceptation , Compteur , SurEnchere)
		  		VALUES ('$IDItem','$username',0,1,'$EnchereMax')";
		  	$insertion = mysqli_query($db_handle, $sql);
		  	echo '
			<script language="JAVASCRIPT">
		  		window.location.href = "Categorie_Page.php"
			</script>' ;
	  	}
	  	

	}
  	
?>