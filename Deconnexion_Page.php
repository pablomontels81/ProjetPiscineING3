<?php
	// Démarrage de la session (si existante)
	session_start();
	// Si une session est bien ouverte !
	if ($_SESSION['username']!="") {
		$_SESSION = array();
		session_destroy();
		//Redirection vers Page Connexion
		echo '
		<script language="JAVASCRIPT">
  			window.location.href = "Connexion_Page.html"
		</script>' ;
	}
?>