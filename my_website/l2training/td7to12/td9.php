<?php
	$file_name = basename(__FILE__);
	require_once '../include/header.inc.php';
	require_once '../include/fonctions.inc.php';
	require_once '../include/util.inc.php';
?>

<section>
	<h2>Travaux Dirig&eacute;s N&deg;9</h2>
	<article id="getpost">
		<h3>Get &amp; Post</h3>
		<form action="td9treatment.php" method="post" id="upperform">
			<fieldset>
				<legend>Des chiffres et des lettres</legend>
				<label for="letter"><span>Chaine de caract&egrave;re</span>
					<input type="text" name="word" id="letter" autofocus>
				</label>
				
				<label for="figure"><span>Valeur d&eacute;cimale</span>
					<input type="text" name="value" id="figure">
				</label>
				<input type="submit">
			</fieldset>
		</form>
	</article>
	
	<article id="url">
		<h3>URL</h3>
		<form action="td9unique.php" method="get" autocomplete="on">
			<fieldset>
				<legend>World Wide Web</legend>
				<label for="web"><span>Votre URL</span>
					<input type="text" name="url" id="web" size="40" placeholder="Ex: http://www.google.fr/">
				</label>
				<input type="submit">
			</fieldset>
		</form>
	</article>
	
	<article id="times">
		<h3>Table de multiplication</h3>
		<form action="td9treatment.php" method="get">
			<fieldset>
				<legend>Grand &Eacute;colier</legend>
				<label for="xtime"><span>Quel taille ?</span>
					<select name="size" id="xtime">
						<?php 
							for ($index = 2; $index <= 16; $index++) {
								// pre-selected value for 10
								if ($index == 10) {
									echo "<option value=".$index." selected>".$index."</option>\n";
								} else {
									echo "<option value=".$index.">".$index."</option>\n";
								}
							}
						?>
					</select>
				</label>
				<input type="submit">
			</fieldset>
		</form>
	</article>
	
	<article id="chmod1">
		<h3>CHMOD (version 1)</h3>
		<form action="td9treatment.php" method="get">
			<fieldset>
				<legend>Chmod en octal</legend>
				<?php 
					echo "	<table class=\"chmodletter\">
								<tr>
									<th>&nbsp;</th>
									<th>Utilisateur</th>
									<th>Groupe</th>
									<th>Autres</th>
								</tr>";
					
					for ($line = 1; $line <= 3; $line++) {
						echo "<tr>";
						
						// the 1st cell of every line
						switch ($line) {
							case 1:
								echo "<td>Lire</td>\n";						
								break;
							case 2:
								echo "<td>&Eacute;crire</td>\n";
								break;
							case 3:
								echo "<td>&Eacute;x&eacute;cuter</td>\n";
								break;
							
							default:
								echo "<td>&nbsp;</td>";
								break;
						}
						
						for ($colum = 1; $colum <= 3; $colum++) {
							// every colum represent a different value (octal)
							switch ($line) {
								case 1:	
									echo "<td><input type=\"checkbox\" name=\"read".$colum."\" id=\"read".$colum."\" value=\"4\">r</td>\n";
									break;
								case 2:
									echo "<td><input type=\"checkbox\" name=\"write".$colum."\" id=\"write".$colum."\" value=\"2\">w</td>\n";
									break;
								case 3:
									echo "<td><input type=\"checkbox\" name=\"execute".$colum."\" id=\"execute".$colum."\" value=\"1\">x</td>\n";
									break;
									
								default:
									echo "<td>&nbsp;/td>\n";
									break;
							}					
						}
						echo "</tr>\n";
					}
					echo "</table>"
				?>
				<input type="submit">
			</fieldset>
		</form>
	</article>
	
	<article id="calendar">
		<h3>Calendrier</h3>
		<form action="td9.php" method="get">
			<fieldset>
				<legend>Ann&eacute;e enti&egrave;re ou mois pr&eacute;cis</legend>
				<label for="monthlist"><span>Mois</span>
					<select name="month" id="monthlist">
						<?php 
							for ($month = 0; $month <= 12; $month++) {
								// No month wanted
								if ($month == 0) {
									echo "<option value=\"\">&nbsp;</option>\n";
								// Select the current mont
								} elseif ($month == getCurrentMonth()) {
									echo "<option value=\"".$month."\" selected>".getMonth($month)."</option>\n";
								// Display the other months
								} else {
									echo "<option value=\"".$month."\">".getMonth($month)."</option>\n";
								}
							}
						?>
					</select>
				</label>
				
				<label for="yearlist"><span>Ann&eacute;e</span>
					<select name="year" id="yearlist">
						<?php 
							for ($year = 2000; $year <= 2030; $year++) {
								// the current year
								if ($year == getCurrentYear()) {
									echo "<option value=\"".$year."\" selected>".$year."</option>\n";
								// the other years
								} else {
									echo "<option value=\"".$year."\">".$year."</option>\n";
								}
							}
						?>
					</select>
				</label>				
				<input type="submit">
			</fieldset>
		</form>
		
		<?php 
			// Display the whole year
			if (empty($_GET['month']) && isset($_GET['year'])) {
				echo year_calendar($_GET['year']);
			// For a specific month and year
			} elseif (isset($_GET['month']) && isset($_GET['year'])) {
				echo one_month_calendar($_GET['month'], $_GET['year']);
			// No setting
			} else {
				echo "<p class=\"error\">Aucun calendrier s&eacute;lectionn&eacute; !</p>";
			}
		?>
	</article>
	
	<article id="chmod2">
		<h3>CHMOD (version 2)</h3>
		<form action="td9.php" method="get">
			<fieldset>
				<legend>Chmod d&eacute;taill&eacute; et explicit&eacute;</legend>			
				<label for="dfile" class="radio">Dossier</label>
				<input type="radio" name="file" id="dfile" value="folder" class="radio">	
						
				<label for="ffile" class="radio">Fichier</label>
				<input type="radio" name="file" id="ffile" value="file" class="radio" checked>
				
				<label for="ochmod"><span>Valeur octal</span>
					<input type="text" name="chmod" id="ochmod">
				</label>
				<input type="submit">
			</fieldset>
		</form>
		
		<?php 
			// If the chmod text field is empty
			if (empty($_GET['chmod'])) {
				echo "<p class=\"error\">Aucun chmod d&eacute;tect&eacute; !</p>";
			// The text field must have 3 digits
			} elseif (!empty($_GET['chmod']) && strlen($_GET['chmod']) == 3) {
				echo "	<p class=\"info\">Type de fichier : <em>".$_GET['file']."</em>, Valeur octal : <em>".$_GET['chmod']."</em></p>
						<p>Affichage en mode console : ".chmod_info_spec($_GET['chmod'], $_GET['file'])."</p>";
			// The text field has not 3 digits
			} else {
				echo "<p class=\"error\">Format du chmod invalide</p>";
			}
		?>
		
	</article>
</section>

<div class="sidemenu">
	<h3 style="margin: 16px 40px 0 40px;">Acc&egrave;s</h3>
	<ul>
		<li><a href="#getpost">Get / Post &amp; URL</a></li>
		<li><a href="#times">Table de x &amp; CHMOD v1</a></li>
		<li><a href="#calendar">Calendrier &amp; CHMOD v2</a></li>
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