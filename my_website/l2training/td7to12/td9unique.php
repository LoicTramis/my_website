<?php
	$file_name = basename(__FILE__);
	require_once '../include/header.inc.php';
	require_once '../include/fonctions.inc.php';
	require_once '../include/util.inc.php';
?>

<section style="border: 5px solid #9966cc;">
	<h2 style="color: #9966cc;">Travaux Dirig&eacute;s n&deg;9 (Unique)</h2>
	<article>
		<h3>URL</h3>
		<?php 
			if (!empty($_GET["url"])) {
				echo split_url($_GET['url']);
			} else {
				echo "<p class=\"error\">Aucune URL !</p>";
			}			
		?>
	</article>
</section>

<?php
	require_once '../include/aside.inc.php'; 
?>
<footer style="bottom: 0;">
	<div class="fimage">
		<figure>
			<a href="https://www.u-cergy.fr/" title="Site UCP" target="_blank"> 
				<img src="../img/ucpblanc.jpg" alt="UCP logo blanc" width="120" height="90">
			</a>
			<figcaption class="hidden">Logo UCP</figcaption>
		</figure>
	</div>
	<div class="flink">
		<h3>Liens externes</h3>
		<ul>
			<li>
				<a href="http://www.u-cergy.fr/fr/ufr-sciences-et-techniques.html" target="_blank">UFR Sciences et Techniques</a>
			</li>
			<li>
				<a href="http://upload.wikimedia.org/wikipedia/commons/0/0e/Cours_php.pdf"
			  		title="Les bases du PHP"
			  		target="_blank">PHP - Notions de bases</a>
			</li>
			<li>
				<a href="http://fr.wikipedia.org/wiki/Langage_de_programmation#Paradigmes"
					title="Un peu de culture"
					target="_blank">Quelques infos sur les langages du Web</a>
			</li>
		</ul>
	</div>
		
	<div class="finfo">		
		<h3>Date</h3>
		<?php 
		require_once ("../include/util.inc.php");
		
		// return a formatting date of the current day
		echo "<p>".today()."</p>";
		
		?>
	</div>
	<div>
		<?php

		// return the name of the browser
		$currentBrowser = getBrowserName();
			
		echo "	<h3>".$currentBrowser."</h3>
					<figure>
						<img src=\"".getBrowserIcon($currentBrowser)."\" alt=\"Navigateur\">
						<figcaption class=\"hidden\">".$currentBrowser."</figcaption>
					</figure>";
		?>
	</div>
</footer>
	
</body>
</html>