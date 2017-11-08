<?php
	$file_name = basename(__FILE__);
	require_once '../include/header.inc.php';
	require_once '../include/secure.inc.php';
	
	if (isset($_GET["status"])) {
		session_unset();
		$_SESSION["times"] = 1;
//		$_SESSION["deconnect"] = 1;
	}
?>
<section>
	<h2>Travaux Dirig&eacute;s N&deg;11</h2>
	<article>
		<?php
		// Session set
		if (isset($_SESSION["id"])) {
			// Display the profil with some informations
			echo "<h3>Profile</h3>
					<p>Identifiant : ".$_SESSION["id"]."</p>
					<p>Nom : ".$_SESSION["lastname"]."</p>
					<p>Pr&eacute;nom : ".$_SESSION["firstname"]."</p>";
			// Access to the restricted page only for Iron Man
			if ($_SESSION["id"] == "IronMan") {
				echo "	<p>Vous avez d&eacute;sormais acc&egrave;s &agrave; la page restreinte !</p>
						<a href=\"td11calendar.php\" class=\"buttonCalendar\">Calendrier 12,017</a>";
			// Other than Tony Stark
			} else {
				echo "	<p>D&eacute;sol&eacute;. Vous n'avez pas acc&egrave;s au contenu restreint (Aide : Essayez avec IronMan).</p>
						<p>Essayez toujours.</p>
						<a href=\"td11phpredirect.php\" class=\"buttonCalendar\">Calendrier 12,017</a>";
			}
			echo "<a href=\"td11profile.php?status=signout\" class=\"buttonSignOut\">D&eacute;connexion</a>";
		// Session over/disconnect or new
		} else {
			echo "<h3>Connexion</h3>
					<p>Connectez-vous pour avoir acc&egrave;s au contenu restreint</p>
					<p>La page se rechargera automatiquement si vous venez de vous connecter. (10 sec)</p>
					<a href=\"td11phpredirect.php\" class=\"buttonCalendar\">Calendrier 12,017</a>
					<a href=\"td11.php#login\" class=\"buttonSignIn\">Connexion</a>";
		}
		// Get the name information from the form
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			// Valid password
			if (is_password_valid($_POST['password'])) {
				$user_info = get_secure_data();
				$_SESSION["firstname"] = get_family_firstname($_POST['username']);
				$_SESSION["lastname"] = get_family_lasttname($_POST['username']);
				$_SESSION["id"] = $_POST['username'];
			// Invalid password
			} else {
				echo "<p>Mot de passe pour <strong>".$_POST['username']."</strong> invalide.</p>";
			}			
		}		
		?>	
	</article>
</section>