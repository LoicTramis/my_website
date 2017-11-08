<?php
	$file_name = basename(__FILE__);
	require_once ("../include/header.inc.php");
	require_once ("../include/fonctions.inc.php");
	require_once ("../include/util.inc.php");
?>
<section>
	<h2>Travaux Dirig&eacute;s N&deg;8</h2>
	<article id="url">
		<?php 
			echo "	<h3>URL</h3>".
						split_url("http://www.u-cergy.fr");			
		?>
	</article>
	
	<article>
		<h3>CHMOD</h3>
		<?php 
			echo "	<p>400 => ".chmod_info("400")."</p>
					<p>640 => ".chmod_info("640")."</p>
					<p>755 => ".chmod_info("755")."</p>";
		?>
	</article>
	
	
	<article id="css">
		<h3>CSS alternatif</h3>
		<p><a href="td8.php?style=alternatif" class="link">Mode jour (1 param&egrave;tre)</a></p>
		<p><a href="td8.php?style=alternatif&lang=en" class="link">Mode jour &amp; anglais (2 param&egrave;tres)</a></p>
		<p><a href="td8.php?lang=fr" class="link">Mode fran&ccedil;ais (1 param&egrave;tre)</a></p>
		<p><a href="td8.php?lang=en&style=style" class="link">Mode anglais &amp; standard (2 param&egrave;tres)</a></p>
	</article>
	
	<article id="cal">
		<h3>Calendrier</h3>
		<?php 
			echo "	<h4>3 mois</h4>"
						.year_calendar()."
								
					<h4>Ann&eacute;e 3x4</h4>
						<div class=\"toobig\">"
							.year_calendar(2017)."
						</div>
								
					<h4>Ann&eacute;e 6x2</h4>
						<div class=\"toobig\">"
							.year_calendar(2017,6)."
						</div>";
		?>
	</article>
</section>

<div class="sidemenu">
	<h3 style="margin: 16px 40px 0 40px;">Acc&egrave;s</h3>
	<ul>
		<li><a href="#url">URL &amp; CHMOD</a></li>
		<li><a href="#css">CSS</a></li>
		<li><a href="#cal">Calendrier</a></li>
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