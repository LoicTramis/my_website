<?php 
function helloLoop($end) {
	echo "<ul class=\"loop\">\n";

	for($i = 0; $i < $end; $i++) {
		echo "<li style=\"display: block;\">hello num&eacute;ro ".$i." </li>\n";
	}
	echo "</ul>\n";
}

function timeDate() {
	echo "<p class=\"content\">Nous sommes le ".date("d/m/Y")." et il est ".date("H:i:s.")."</p>\n";
}

function hexecho() {
	echo "<p class=\"content\">";
	
	// display the 16 figures of the hexa base
	for($index = 0; $index < 16; $index++) {
		echo dechex($index)." ";
	}
	echo "</p>\n";
}

function hexprint() {
	echo "<p class=\"content\">";
	
	// display the 16 figures of the hexa base
	for($index = 0; $index < 16; $index++) {
		printf('%x ', $index);
	}
	echo "</p>\n";
}

function multiplicationTable($size) {
	echo "<table class=\"times\">";

	/* The head of the table */
	echo "<tr>";
	for($colum = 0; $colum <= $size ; $colum++) {
		if($colum == 0) {
			echo "<th>x";
		} else {
			echo "<th>".$colum;
		}
		echo "</th>";
	}
	echo "</tr>\n";


	for($colum = 1; $colum <= $size; $colum++) {
		echo "<tr>";
			
		for($line = 0; $line <= $size; $line++) {
			if($line == 0) {
				echo "<td style=\"font-weight: bold; background-color: #6ab8c8;\">".$colum."</td>";
			} else {
				echo "<td>".$colum * $line."</td>";
			}
		}
		echo "</tr>\n";
	}
	echo "</table>\n";
}

function conversionv1() {
	echo "<p class=\"content\">".hexdec(41)." = 0x".dechex(65)." = ".chr(65)."</p>";
}

function conversionv2() {
	echo "<p class=\"content\">".chr(43)." = ".ord('+')." = 0x".dechex(43)."</p>";
}

function baseTable($end) {
	// header of the table
	echo "<table class=\"base\">
			<tr style=\"background-color: #6ab8c8;\">
				<th>Binaire</th>
				<th>Octal</th>
				<th>D&eacute;cimal</th>
				<th>H&eacute;xad&eacute;cimal</th>
			</tr>\n";

	// alternate the background-color (light grey / very light grey)
	for($line = 1; $line <= $end; $line++) {
		// Alternate color/background-color per line
		if ($line % 2 == 0) {
			$color="#777";
			$bcolor="#e6e6e6";
		} else {
			$color="black";
			$bcolor="#d5d5d5";
		}
		// print the different value with the alternate color/background-color
		echo "<tr style=\"color: ".$color."; background-color: ".$bcolor.";\">";
		printf("<td>%08d</td>",decbin($line));
		printf("<td>%02d</td>",decoct($line));
		printf("<td>%02d</td>",$line);
		printf("<td>%02s</td>",dechex($line));
		echo "</tr>\n";
	}
	echo "</table>\n";
}
?>

<!DOCTYPE html>

<html>
<head>
	<title>Lo&iuml;c Tramis - UCP</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link href="../style/style.css" rel="stylesheet" type="text/css">
	<link href="td.css" rel="stylesheet" type="text/css">
	<style type="text/css">		
		h1 {
			margin-top: 0; 
			text-align: center;
			font-size: 20pt;
			font-family: Comfortaa, sans-serif;		
		}
		
		h2, h3, h4 {
			font-family: Comfortaa, sans-serif;
			font-size: large;
		}
		a {
			text-decoration: none;
		}
		
		ul {
			padding-left: 0;
			padding-right: 0;
		}
		li {
			font-weight: bold;
		}
		em {
			font-style: italic;
			font-family: "Gill sans MT", sans-serif;
		}	
		strong {
			font-weight: bold;
		}
	</style>
</head>

<body>
	<!-- l'en-tête -->
	<header>
		<h1> Lo&iuml;c TRAMIS - UCP</h1>
	</header>
	
	<!-- Pour les liens de navigation (externe)-->
	<nav id="backtotop">
		<ul style="background-color: #3A3A3A; height: 46px;">
			<li>
				<figure style="padding: 0px; margin: 0px">
					<a href="../index.html" title="Accueil" style="padding: 0px; margin: 0px;">
						<img src="../img/homeicon.png" alt="home" style="width: 46px;">
					</a>
					<figcaption class="hidden">Home</figcaption>
				</figure>
			</li>				
			<li><a href="td5.php" title="Introduction au PHP">TD 5</a></li>		
			<li><a href="../td6/td6.php" title="Plus de tableau">TD 6</a></li>					
			<li><a href="../td7to12/td7.php" title="Fonctions">TD 7</a></li>		
			<li><a href="../td7to12/td8.php" title="Calendrier">TD 8</a></li>					
			<li><a href="../td7to12/td9.php" title="Formulaire">TD 9</a></li>		
			<li><a href="../td7to12/td10.php" title="Untitled">TD 10</a></li>					
			<li><a href="../td7to12/td11.php" title="Untitled">TD 11</a></li>		
			<li><a href="../td7to12/td12.php" title="Untitled">TD 12</a></li>		
		</ul>
	</nav>
	
	<!-- la section principale -->
	<section>
		<h2 style=" font-size: xx-large;">Travaux Dirig&eacute;s N&deg;5</h2>

		<article>
			<h3>PHP Info</h3>
			<a href="phpinfo.php" class="link">PHP info</a>	
		</article>
		
		<article>
			<h3>La boucle hello (20 fois)</h3>
			<?php
				helloLoop(20);
			?>
			<p class="edit">Edit : La boucle se fait avec un appel de fonction.</p>
			<p class="edit">Edit 2 : Poss&egrave;de dor&eacute;navant un param&egrave;tre.</p>
		</article>

		<article>
			<h3>La date du jour</h3>
			<?php
				timeDate();
			?>
		</article>

		<article>
			<h3>Les chiffres h&eacute;xad&eacute;cimaux</h3>
			<h4>Avec dechex()</h4>
			<?php
				hexecho();
			?>
			<h4>Avec printf()</h4>
			<?php
				hexprint();
			?>
		</article>

		<article>
			<h3>La table de multiplication</h3>
			<?php		
				multiplicationTable(10);
			?>
			<p class="edit">Edit : La table de multiplication s'affiche d&eacute;sormais avec un appel de fonction.
			<p class="edit">Edit 2 : Poss&egrave;de dor&eacute;navant un param&egrave;tre.</p>
		</article>

		<article>
			<h3>La conversion ASCII</h3>
			<h4>1<sup>&egrave;re</sup> fa&ccedil;on</h4>
			<?php
				conversionv1();
			?>
			<h4>2<sup>&egrave;me</sup> fa&ccedil;on</h4>
			<?php
				conversionv2();
			?>
		</article>
		
		<article>
			<h3>Tableau de bases</h3>
			<?php
				baseTable(17);
			?>
			<p class="edit">Edit : Ce r&eacute;alise d&eacute;sormais avec une fonction.</p>
			<p class="edit">Edit 2 : Poss&egrave;de dor&eacute;navant un param&egrave;tre.</p>
		</article>
	</section>
	
	<aside>
		<figure>
			<h3>Site de Saint-Martin</h3>
			<p>2 avenue Adolphe-Chauvin</p>
			<p>BP 222, Pontoise</p>
			<p>95302 Cergy-Pontoise cedex</p>
			<p>01 34 25 60 00</p>
			<img src="../img/saintmartin.jpg" alt="Site de saint martin" style="width: 200px; height: 120px;">
			<figcaption>Entr&eacute;e principale</figcaption>	
		</figure>
	</aside>
	
	<div class="main-home">
		<figure>
			<a href="../../l2index/index.php">
				<img src="../../img/logo.svg" alt="MainHome">
			</a>
			<figcaption class="hidden">Accueil principale</figcaption>
		</figure>
	</div>
	<footer>
		<ul>
			<li>
				<figure>
					<a href="https://www.u-cergy.fr/" title="Site UCP" target="_blank"> 
						<img src="../img/ucpblanc.jpg" alt="UCP logo blanc" width="120" height="90">
					</a>
					<figcaption class="hidden">Logo UCP</figcaption>
				</figure>
			</li>		
			<li>
				<a href="http://www.u-cergy.fr/fr/ufr-sciences-et-techniques.html" target="_blank">UFR Sciences et Techniques</a>
			</li>
			<li>
				<a href="http://upload.wikimedia.org/wikipedia/commons/0/0e/Cours_php.pdf" 
				   title="Les bases du PHP"
				   target="_blank">Notions de bases - PHP</a>
			</li>
			<li>
				<a href="http://fr.wikipedia.org/wiki/Langage_de_programmation#Paradigmes" 
				   title="Un peu de culture"
				   target="_blank">Quelques infos sur les langages du Web</a>
			</li>
		</ul>			
	</footer>
	
</body>
</html>
