<?php
	//Démarrage de la session 
	session_start();
	//Mise en place variable nécessaires
	$username = $_SESSION['username'];
  	$IDItem = $_GET['IDItem'];
  	$PrixFinal = "";

  	///Récupération de la Base de Donnée et de la Table voulu (utilisateur)
	$database = "ebayece";
	//Connection à la Base de Données
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
  	

  	if ($db_found)
  	{
  		//C'est Achat Direct du coup récupération du Prix Fixé par Vendeur
  		$sql = "
	  		SELECT Prix
	  		FROM item 
	  		WHERE IDItem = '$IDItem'
	  	";
	  	$result  = mysqli_query($db_handle,$sql);
	  	while ($data = mysqli_fetch_array($result)) 
	  	{
	  		$PrixFinal = $PrixFinal + $data['Prix'];
	  	}
	  	//C'est Achat Direct du coup ajout au Panier en Direct
	  	$sql = "
	  		INSERT INTO panier (IDItemP , IDAcheteurP , PrixFinal , Statut)
	  		VALUES ('$IDItem','$username','$PrixFinal',0)";
	  	$insertion = mysqli_query($db_handle, $sql);
	  	echo '
				<script language="JAVASCRIPT">
	  				window.location.href = "Categorie_Page.php"
				</script>' ;

	}
  	
?>