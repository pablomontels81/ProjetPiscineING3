<?php
    //Démarrage de la session 
    session_start();
    //Mise en place variable nécessaires
    $username = $_SESSION['username'];
    $IDMeilleurOffre = isset($_POST["IDMeilleurOffre"])? $_POST["IDMeilleurOffre"] : "";
    $Acceptation = isset($_POST["acceptation"])? $_POST["acceptation"] : "";
    $erreur="";

    ///Test d'Erreur 
    if ($IDMeilleurOffre =="")
    {
        $erreur .= "Veuillez Saisir L'ID. <br>";
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
          window.location.href = "Vendre_Page.php"
      </script>' ;
    }
    if ($db_found) 
    {
      
      //Si proposition accepté
      if ($Acceptation == 1) 
      {
        //D'abord Modifié le statut de la Meilleur Offre 
        $sql = "
          UPDATE meilleuroffre
          SET Acceptation = 1
          WHERE IDMeilleurOffre = '$IDMeilleurOffre'";
        $statut = mysqli_query($db_handle, $sql);

        //Ajout dans Panier de la Meilleur Offre
        $sql = "
          SELECT IDItemM, IDAcheteurM, SurEnchere
          FROM meilleuroffre
          WHERE IDMeilleurOffre='$IDMeilleurOffre'";
        $result = mysqli_query($db_handle,$sql);
        while ($data = mysqli_fetch_array($result)) 
        {
          
          //Récupération des données pour Ajout dans Panier
          $Item = $data['IDItemM'];
          $Acheteur = $data['IDAcheteurM'];
          $Prix = $data['SurEnchere'];
          //Ajout au panier
          $sql = "
            INSERT INTO panier (IDItemP , IDAcheteurP , PrixFinal , Statut)
            VALUES ('$Item','$Acheteur','$Prix',0)";
          $insertion = mysqli_query($db_handle,$sql);
          //Désactivation de l'Item pour qu'il ne puisse être acheté après les enchères en mode Achat Libre
          $newstatut = 1;
          $sql = "
            UPDATE item
            SET statut = '$newstatut'
            WHERE IDItem = '$Item'";
          $update = mysqli_query($db_handle,$sql);
          //Suppression de la meilleur offre
          $sql = "
          	DELETE 
          	FROM meilleuroffre
          	WHERE IDMeilleurOffre='$IDMeilleurOffre'";
          $suppression = mysqli_query($db_handle,$sql);
        }

      }
      //Si proposition refusé 
      if ($Acceptation ==0) 
        {
	        echo '
		    <script language="JAVASCRIPT">
		        window.location.href = "Vendre_Page.php"
		    </script>' ;

        }
    }


?>