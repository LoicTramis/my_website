<?php
	$file_name = basename(__FILE__);
	require_once '../include/header.inc.php';
	require_once '../include/secure.inc.php';
?>

<section>
	<h2>Travaux Dirig&eacute;s N&deg;10</h2>
	<article id="hits">
		<h3>Compteur de visites</h3>
		<?php 
			echo "<p class=\"hits\">".getVisits()."</p>";
		?>
	</article>
	
	<article id="randomimage">
		<h3>Image al&eacute;atoire</h3>
		<?php 
			echo "<figure>
					<img src=\"".randomImage()."\" alt=\"A planet\"/>
					<figcaption>".get_info_planet()."</figcaption>
				 </figure>";
		?>		
	</article>
	
	<article id="login">
		<h3>Identifiant &amp; mot de passe</h3>
		<form action="td10.php" method="post">
			<fieldset>
				<legend>Log in</legend>
				<figure>
					<img src="../img/kurzgesagtduck.png" alt="Duck">
					<figcaption class="hidden">Canard de Kurzgesagt</figcaption>
				</figure>
			
				<label for="uname" >Identifiant :</label>
				<input 	type="text"
						list="avengers"
						name="username" 
						id="uname"
						size="20"
						placeholder="Entrer l'identifiant" required>
				<datalist id="avengers">
					<option value="IronMan">Iron Man</option>
					<option value="BlackPanther">Black Panther</option>
					<option value="CaptainAmerica">Captain America</option>
					<option value="BlackWidow">Black Widow</option>
				</datalist>
				
				<label for="pwd">Mot de passe :</label>
				<input type="password" name="password" id="pwd" placeholder="Entrer le mot de passe" required>
				
				<input type="submit">
			</fieldset>
		</form>
				<div class="tooltip">
					<p class="tooltipbutton">D&eacute;voiler les mots de passe</p>
					<div class="tooltiplist">
						<p style="font-size: 14pt; font-weight: bold; color: #fff0b3">IDENTIFIANT - MOT DE PASSE</p>
						<p>IronMan-mark10</p>
						<p>BlackPanther-vib20</p>
						<p>CaptainAmerica-shield30</p>
						<p>BlackWidow-suit40</p>					
					</div>
				</div>
		
		<?php 
			store_secure_data();
						
			if (!empty($_POST['username']) && !empty($_POST['password'])) {
				if (is_password_valid($_POST['password'])) {
					$user_info = get_secure_data();
					echo "	<p class=\"aftervalid\">Identification r&eacute;ussie.</p>
							<p class=\"aftervalid\">Bienvenue <strong>".get_family_names($_POST['username'])."</strong> !</p>";
				} else {
					echo "<p>Mot de passe pour <strong>".$_POST['username']."</strong> invalide.</p>";
				}
			}
			
		?>
	</article>
</section>

<div class="sidemenu">
	<h3 style="margin: 16px 40px 0 40px;">Acc&egrave;s</h3>
	<ul>
		<li><a href="#hits">Fr&eacute;quentation</a></li>
		<li><a href="#randomimage">Plan&egrave;te</a></li>
		<li><a href="#login">Connexion</a></li>
		<li><a href="#">Haut de page</a></li>
		<?php 
		if (isset($_SESSION["id"]) && $_SESSION["id"] == "IronMan") {
			echo "<h3 style=\"margin: 16px 40px 0 40px;\">Acc&egrave;s r&eacute;serv&eacute;</h3>
					<ul>
						<li><a href=\"td11calendar.php\">Calendrier 12,017</a>
					</ul>";
		}
		?>
	</ul>
</div>
<?php
	require_once '../include/aside.inc.php';
	require_once '../include/footer.inc.php';
?>
