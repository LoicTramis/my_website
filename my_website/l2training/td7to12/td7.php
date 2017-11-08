<?php
	$file_name = basename(__FILE__);
	require_once ("../include/header.inc.php");
	require_once ("../include/fonctions.inc.php");
?>
<section>
		<h2>Travaux Dirig&eacute;s N&deg;7</h2>
		<article id="functions">
			<h3>Les fonctions</h3>
			<h4>Page orpheline</h4>
				<p>Les exercices du TD 5 &agrave; l'image de la fonction <em>phpinfo()</em> : <a href="td7info.php" class="link">TD7 info</a><p>
			<h4>Table ASCII</h4>
				<?php
					echo returnAsciiTable();
				?>
			<h4>Palette Web</h4>
				<div class="toobig">
				<?php 
					echo returnColorPalette();
				?>
				</div>
			<h4>Table de multiplication</h4>
				<?php
					multiplicationTable();
				?>
				<p class="edit">Edit: sans param&egrave;tre</p>			 
		</article>
		
		<article id="param">
			<h3>Param&egrave;tres par d&eacute;faut</h3>
			<h4>Tableau de bases</h4>
			<?php
				baseTable(32,"down");
			?>		
		</article>
</section>

<div class="sidemenu">
	<h3 style="margin: 16px 40px 0 40px;">Acc&egrave;s</h3>
	<ul>
		<li><a href="#functions">Ascii, palette, multiplication</a></li>
		<li><a href="#param">Bases</a></li>
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
require_once ("../include/aside.inc.php");
require_once ("../include/footer.inc.php"); 
?>