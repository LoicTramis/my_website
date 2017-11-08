<?php
	$file_name = basename(__FILE__);
	require_once '../include/header.inc.php';
?>

<section>
	<h2>Travaux Dirig&eacute;s N&deg;11</h2>
	<article id="cookie">
		<h3>Cookie</h3>
		<?php 		
			if (empty($_COOKIE["cookiestyle"])) {
				echo "<p> Style par d&eacute;faut.</p>";
			} else {
				echo "<p> Le style actuel est : ".$_COOKIE["cookiestyle"]."</p>";
			}				
			echo "	<p class=\"button\">Changer de style : 
						<a href=\"td11.php?style=alternatif\" class=\"buttonDay\">Mode jour</a>
						<a href=\"td11.php?style=style\" class=\"buttonNight\">Mode nuit</a>
					</p>";			
		?>
	</article>
	
	<article id="login">
		<h3>Session</h3>
		<form action="td11profile.php" method="post">
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
				<div class="tooltip" style="width: 250px;">
					<p class="tooltipbutton">D&eacute;voiler les mots de passe</p>
					<div class="tooltiplist">
						<p style="font-size: 14pt; font-weight: bold;">IDENTIFIANT - MOT DE PASSE</p>
						<p>IronMan-mark10(acc&egrave;s &agrave; la page)</p>
						<p>BlackPanther-vib20</p>
						<p>CaptainAmerica-shield30</p>
						<p>BlackWidow-suit40</p>					
					</div>
				</div>
		
		
	</article>
	
	<article id="redirecthtml">
		<h3>Redirection HTML</h3>
		<a href="td11htmlredirect.php" class="buttonHTMLRedirect">Redirection - HTML</a>
	</article>
	
	<article id="redirectphp">
		<h3>Redirection PHP</h3>
		<a href="td11phpredirect.php" class="buttonPHPRedirect">Redirection - PHP</a>
	</article>
</section>

<div class="sidemenu">
	<h3 style="margin: 16px 40px 0 40px;">Acc&egrave;s</h3>
	<ul>
		<li><a href="#cookie">Cookie</a></li>
		<li><a href="#login">Session</a></li>
		<li><a href="#redirecthtml">Redirection HTML</a></li>
		<li><a href="#redirectphp">Redirection PHP</a></li>
		<li><a href="#">Haut de page</a></li>
	</ul>
</div>

<?php
	require_once '../include/aside.inc.php';
	require_once '../include/footer.inc.php';
?>