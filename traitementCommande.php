<?php
	///Démarrage de la session
	session_start();

	///Récupération des données essentielles pour passer commande 
	$username = $_SESSION['username'];

	//Récupération des Elements d'Adresse
	$Adresse1 = isset($_POST["Adresse1"])? $_POST["Adresse1"] : "";
	$Adresse2 = isset($_POST["Adresse2"])? $_POST["Adresse2"] : "";
	$Ville = isset($_POST["Ville"])? $_POST["Ville"] : "";
	$CodePostal = isset($_POST["CP"])? $_POST["CP"] : "";
	$Pays = isset($_POST["Pays"])? $_POST["Pays"] : "";
	$Numero  = isset($_POST["Numero"])? $_POST["Numero"] : "";

    //Récupération des Elements d'Adresse
    $NumBancaire = isset($_POST["NumCarte"])? $_POST["NumCarte"] : "";
    $Cryptogramme = isset($_POST["Cryptogramme"])? $_POST["Cryptogramme"] : "";
    $NomCarte = isset($_POST["NomProprio"])? $_POST["NomProprio"] : "";
    $TypeCarte = isset($_POST["TypeCarte"])? $_POST["TypeCarte"] : "";
    $DateExpiration = isset($_POST["DateExpir"])? $_POST["DateExpir"] : "";
    $Fond = isset($_POST["Fond"])? $_POST["Fond"] : "";

	///Mise en place variable 
	$erreur="";

	///Test si tous les champs sont remplis
	
	//Test sur Adresse 
	if ($Adresse1 =="")
    {
        $erreur .= "Veuillez Saisir L'Adresse de livraison'. <br>";
    }
    if ($Ville =="")
    {
        $erreur .= "Veuillez Saisir La Ville de livraison. <br>";
    }
    if ($CodePostal =="")
    {
        $erreur .= "Veuillez Saisir Le Code Postal de livraison. <br>";
    }
    if ($Pays =="")
    {
        $erreur .= "Veuillez Saisir Le Pays de livraison. <br>";
    }
    if ($Numero =="")
    {
        $erreur .= "Veuillez Saisir Le Numéro de livraison. <br>";
    }
    
    if ( $NumBancaire == "") 
    {
        $erreur .= "Veuillez Saisir votre Numéro Bancaire. <br>";
    }
    if ( $Cryptogramme == "") 
    {
        $erreur .= "Veuillez Saisir votre Cryptogramme. <br>";
    }
    if ( $NomCarte == "") 
    {
        $erreur .= "Veuillez Saisir votre Nom écrit sur la carte. <br>";
    }
    if ( $TypeCarte == "") 
    {
        $erreur .= "Veuillez Saisir votre type de carte. <br>";
    }
    if ( $DateExpiration == "") 
    {
        $erreur .= "Veuillez Saisir votre Date d'Expiration. <br>";
    }
    if ( $Fond == "") 
    {
        $erreur .= "Veuillez Saisir votre Fond. <br>";
    }
    ///Test si Carte encore valide avec la Date d'Expiration
    if ($DateExpiration < date(d/m/y)) 
    {
        $erreur .= "Veuillez Saisir votre Date d'Expiration. <br>";
    }
    
    
	///Récupération de la Base de Donnée et de la Table voulu (utilisateur)
    $database = "ebayece";
    //Connection à la Base de Données
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found)
    {
    	if ($erreur == "") 
        {
            if ($_POST["Commander"])
            {
                ///Ajout des Adresses de Livraison ou des moyens de Paiements si pas déjà utilisés
                $sql1 = "
                      SELECT *
                      FROM comptebancaire 
                      WHERE IDUtil = '$username' AND NumBancaire = '$NumBancaire'";             
                $result1 = mysqli_query($db_handle, $sql1);
                $nbreresult1 = mysqli_num_rows($result1);
                if ($nbreresult1 == 0) 
                {
                    $sql1 = "
                        INSERT INTO comptebancaire (IDUtil,NumBancaire,Cryptogramme,NomCarte,TypeCarte,DateExpiration,Fond)
                        VALUES ('$username','$NumBancaire','$Cryptogramme','$NomCarte','$TypeCarte','$DateExpiration','$Fond')";
                    $insertion = mysqli_query($db_handle, $sql1);

                }
                $sql2 = "
                      SELECT *
                      FROM livraison 
                      WHERE IDPersonne = '$username' AND Adresse1 = '$Adresse1'";
                $result2 = mysqli_query($db_handle, $sql2);
                $nbreresult2 = mysqli_num_rows($result2);
                if ($nbreresult2 ==0) 
                {
                    $sql2 = "
                        INSERT INTO livraison (IDPersonne,Adresse1,Adresse2,CodePostal,Ville,Pays,Numero)
                        VALUES ('$username','$Adresse1','$Adresse2','$CodePostal','$Ville','$Pays','$Numero')";
                    $insertion = mysqli_query($db_handle, $sql2);
                }

                ///Test si FOnd sur Compte sont suffisants 
                $Statut=0;
                $PrixTotal="";
                $sqlPanier = "
                        SELECT PrixFinal
                        FROM panier 
                        WHERE IDACheteurP = '$username' AND Statut = '$Statut'";
                $resultPanier = mysqli_query($db_handle,$sqlPanier);
                while ($data = mysqli_fetch_array($resultPanier)) 
                {
                    $PrixTotal = $PrixTotal + $data['PrixFinal'];
                }


                //Si il y a assez de fond sur le Compte EbayByECE
                if ($PrixTotal < $Fond) 
                {
                    ///Désactivation des Items vendus
                    $sql3 = "
                            SELECT IDItemP 
                            FROM panier 
                            WHERE IDACheteurP = '$username'";
                    $result3 = mysqli_query($db_handle, $sql3);
                    //Boucle pour désactiver un à un les items et les paniers
                    while ($data = mysqli_fetch_array($result3)) 
                    {
                        //Désactivation des items
                        $ID = $data['IDItemP'];
                        $newstatut = 1;
                        $desactivation1 = "
                            UPDATE item
                            SET statut = '$newstatut'
                            WHERE IDItem = '$ID'";
                        $update1 = mysqli_query($db_handle, $desactivation1);
                        //Désactivation des paniers
                        $desactivation2 = "
                            UPDATE panier
                            SET Statut = '$newstatut'
                            WHERE IDItemP = '$ID'";
                        $update2 = mysqli_query($db_handle, $desactivation2);
                    }
                    echo '
                        <script language="JAVASCRIPT">
                            window.location.href = "MonCompte_Page.php"
                        </script>';
                }
                //Si pas assez de fond retour au Panier
                else
                {
                    echo '
                    <script language="JAVASCRIPT">
                        window.location.href = "Panier_Page.php"
                    </script>';
                }

            }

        } 
        else
        {
            echo '
                <script language="JAVASCRIPT">
                    window.location.href = "Panier_Page.php"
                </script>';
        }
    	
    }
?>
