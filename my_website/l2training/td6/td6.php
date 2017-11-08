<?php
	function asciiTable(){
		echo "<table class=\"ascii\">
				<tr>
				<th>&nbsp;</th>\n";
		
		// the header of the table
		for($colum = 0; $colum < 16; $colum++) {
			printf("<th>%X</th>\n", $colum);
		}
		echo "</tr>\n";		
		
		// set the table
		for($line = 2; $line <= 7; $line++) {
			// the first colum is filled with numbers
			echo "<tr> <td class=\"sideColum\">".$line."</td>\n";
			
			for($colum = 0; $colum < 16; $colum++) {
				// we start at the 32nd character
				$ascii = $line*16+$colum;
				// set the class for the css
				$classNumber = "basic";
			
				// If the character is a number,
				if($ascii >= 48 && $ascii <= 57) {
					$classNumber = "number";
				
				// or an uppercase letter,
				} elseif($ascii >= 65 && $ascii <= 90) {
					$classNumber = "uppercase";
				
				// or a lowercase letter.
				} elseif($ascii >= 97 && $ascii <= 122) {
					$classNumber = "lowercase";
				}
				
				$charAscii = htmlentities(chr($ascii),ENT_DISALLOWED);
				echo "<td class=\"".$classNumber."\">".$charAscii."</td>\n";
			}
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
	
	/**
	 * Function uses in the coloPalette to determine the luminance of the color.
	 * Formula details explained here : http://en.wikipedia.org/wiki/SRGB#Specification_of_the_transformation
	 * 
	 * @return String the color - black if too bright or white if too dark according to the threshold.
	 */
	function getTextColor($redColor, $greenColor, $blueColor, $threshold) {
		// Linear canal of the sRGB colors
		$redRGB = $redColor / 255;
		$greenRGB = $greenColor / 255;
		$blueRGB = $blueColor / 255;
	
		// linear colors for the formula
		$redLinear = pow(($redRGB + 0.055) / 1.055, 2.4);
		$greenLinear = pow(($greenRGB + 0.055) / 1.055, 2.4);
		$blueLinear = pow(($blueRGB + 0.055) / 1.055, 2.4);
	
		//the formula
		$luma = (0.2126 * $redLinear + 0.7152 * $greenLinear + 0.0722 * $blueLinear) * 100;
	
		// if the result is below the threshold then return white, otherwise black
		return ($luma <= $threshold ? "white" : "black");
	}

	// Without the form the variable will still have a default value
	function colorPalette($threshold=25) {
		// initialize all variables
		$redText = $greenText = $blueText = hexdec(33); // base value with which the rgbCounter will be increment		
		$redCounter = $greenCounter = $blueCounter = 0; 
		$redColor = $greenColor = $blueColor = 0;
	
		echo "<table>";
		for ($line = 0 ; $line < 18; $line++) {				
			echo "<tr>";
				
			// Reset the green counter and increments the red counter every 3 lines.
			if ($line % 3 == 0 && $line > 0) {
				$greenCounter=0;
				$redCounter++;
			}
				
			$blueCounter=0;  // reset the blue counter each line
			for ($colum = 0; $colum < 12; $colum++) {
	
				// Reset the blue counter and increment the green one, if the loop is halfway the table
				if ($colum == 6) {
					$blueCounter=0;
					$greenCounter++;
				}
				
				// rgbColor are the final result, they contains 
				$redColor = $redText * $redCounter;
				$greenColor = $greenText * $greenCounter;
				$blueColor = $blueText * $blueCounter;
	
				// display the text, the text color and the background-color
				// if the dechex function returns a value with 1 figure add a 0
				echo "<td class =\"colorWeb\" style=\"background-color: #".(dechex($redColor) == '00' ? ('0'.dechex($redColor)) : dechex($redColor))
																		  .(dechex($greenColor) == '00' ? ('0'.dechex($greenColor)) : dechex($greenColor))
																		  .(dechex($blueColor) == '00' ? ('0'.dechex($blueColor)) : dechex($blueColor))."; color:".getTextColor($redColor, $greenColor, $blueColor, $threshold).";\">#";
				printf('%02X', $redColor);
				printf('%02X', $greenColor);
				printf("%02X</td>\n", $blueColor);
				$blueCounter++;
			}
			$greenCounter++;
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
		table {
			border: 1px dashed black;
			margin: auto;
		}
		th, .sideColum {
			font-weight: bold;
		}
		th, td {
			text-align: center;
			border: 1px solid black;
		}
		/* For the ascii table */
		.ascii td, th {
			padding: 7px 7px 7px 7px;
		}
		.basic {
			color: black;		
		}
		.number, .uppercase, .lowercase {
			background-color: #CCC;		
		}		
		.number {
			color: red;		
		}
		.uppercase {
			color: green;		
		}
		.lowercase {
			color: blue;		
		}
		
		/* For the safe web palette */
		.colorWeb {
			margin: 0 0 0 0;
			padding: 0 0 0 0;
			text-indent: 0;
			font-size: 11pt;
		}
		input {
			display: block;
		}
		input[type=range] {
			margin: 10px 0 0 0;
			width: 100%;
		}
		input[type=submit] {
			margin: 10px auto 10px auto;
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
			<li><a href="../td5/td5.php" title="Introduction au PHP">TD 5</a></li>		
			<li><a href="td6.php" title="Plus de couleur">TD 6</a></li>					
			<li><a href="../td7to12/td7.php" title="Fonctions">TD 7</a></li>		
			<li><a href="../td7to12/td8.php" title="Calendrier">TD 8</a></li>					
			<li><a href="../td7to12/td9.php" title="Formalaire">TD 9</a></li>		
			<li><a href="../td7to12/td10.php" title="Untitled">TD 10</a></li>					
			<li><a href="../td7to12/td11.php" title="Untitled">TD 11</a></li>		
			<li><a href="../td7to12/td12.php" title="Untitled">TD 12</a></li>		
		</ul>
	</nav>
	
	<!-- la section principale -->
	<section>
		<h2 style=" font-size: xx-large;">Travaux Dirig&eacute;s N&deg;6</h2>
		<article>
			<h3 id="ascii">Table ASCII</h3>
			
			<?php
				asciiTable();	
			?>	
			
		</article>		
		
		<article>
			<h3 id="safewebcolor">Palette Web</h3>
			
			<p>Changer le seuil pour afficher diff&eacute;rent texte en blanc.</p>
			<form method="GET" action="td6.php">
				<input type="range" min="10" max="40" value="25" step="5" name="threshold"/>
				<input type="submit" value="Changez de seuil !" title="Essayez"/>
			</form>
			<div class="toobig">
			<?php 				
				(isset($_GET["threshold"]) ? $threshold = $_GET["threshold"] : $threshold = 25);
				colorPalette($threshold);
			?>
			</div>
			<p class="edit">NDLR : Le texte en blanc s'affiche en fonction de luminosit&eacute; de la couleur de fond.
			Changer le seuil signifie modifier &agrave; partir de quel point la couleur de fond est "fonc&eacute;".</p>	
		</article>
	</section>
	
	<div class="sidemenu">
		<h3 style="margin: 16px 40px 0 40px;">Acc&egrave;s</h3>
		<ul>
			<li><a href="#ascii">Table ASCII</a></li>
			<li><a href="#safewebcolor">Palette Web</a></li>
			<li><a href="#backtotop">Haut de page</a></li>
		</ul>
	</div>
		
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
				   target="_blank">PHP - Notions de bases </a>
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
