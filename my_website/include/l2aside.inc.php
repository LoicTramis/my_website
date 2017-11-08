<aside class="l2">
	<h4>Recherche</h4>
	<ul>
		<li><a href="../l2project/research_single.php">Simple</a></li>
		<li><a href="../l2project/research_several.php">Multi-crit&egrave;res</a></li>
		<li><a href="../l2project/detailed_step1.php">D&eacute;taill&eacute;e</a></li>
	</ul>
	<h4>Graphique</h4>
	<ul>
		<li><a href="../l2project/synthetic_region.php?showall=region">R&eacute;gion</a></li>
		<li><a href="../l2project/synthetic_academy.php?showall=academy">Acad&eacute;mie</a></li>
		<li><a href="../l2project/synthetic_city.php?showall=city">Ville</a></li>
		<li><a href="../l2project/synthetic_type.php?showall=type">Type</a></li>
	</ul>
	<?php
	if (isset($_SESSION['login']) && $_SESSION['login'] == "Entropy" ) {
		echo "	<h4>Administrateur</h4>
				<ul>
					<li><a href=\"../l2project/webmaster.php\">Gestionnaire</a></li>
					<li><a href=\"../l2project/phpinfo.php\">PHP info</a></li>
				</ul>";
	}
	?>
</aside>