<?php
	$file_name = basename(__FILE__);
	require_once '../include/header.inc.php';
	require_once '../include/fonctions.inc.php';
	require_once '../include/util.inc.php';
?>

<section style="border: 5px solid #3d8f3d;">
	<h2 style="color: #3d8f3d">Travaux Dirig&eacute;s N&deg;9 (Traitement)</h2>
	<article>
		<h3>Get &amp; Post</h3>
		<?php
			// Field not empty	
			if (!empty($_POST["word"])) {
				$words = strtoupper($_POST["word"]);
				echo "<p class=\"info\">La cha&icirc;ne de caract&egrave;res en majuscule : <em>".$words."</em>.</p>";
			} else {
				echo "<p class=\"error\">Aucun mot !</p>";
			}
			
			// Field not empty
			if (!empty($_POST["value"])) {
				// Numeric value
				if (is_numeric($_POST["value"])) {
					$hex_value = dechex($_POST["value"]);
					echo "<p class=\"info\">La valeur h&eacute;xad&eacute;cimale est : <em>0x".$hex_value."</em></p>";
				}
				// Letter or special character
				else {
					echo "<p class=\"warning\"><em>ATTENTION !</em> Valeur <em>".$_POST["value"]."</em> non autoris&eacute;e.</p>";
				}
			// empty field
			} else {
				echo "<p class=\"error\">Aucune valeur !</p>";
			}			
		?>
	</article>
	
	<article>
		<h3>Table de multiplication</h3>
		<?php 
			if (isset($_GET["size"])) {
				multiplicationTable($_GET["size"]);
			} else {
				multiplicationTable();
			}
			
		?>
	</article>
	
	<article>
		<h3>CHMOD (version 1)</h3>
		<?php 			
			echo chmod_octal_form();			
		?>
	</article>
</section>

<?php
	require_once '../include/aside.inc.php'; 
	require_once '../include/footer.inc.php';
?>