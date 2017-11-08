<?php
$file_name = basename(__FILE__);
$folder_name = basename(__DIR__);

require_once '../include/header.inc.php';

?>
<section>
	<h2>Pr&eacute;sentation</h2>
	<article >
		<h3>JavaScript</h3>
		<p style="text-indent: 2em;">Exercices JavaScript</p>

		<div class="miscelement tooltip">
			<p class="tooltiptext">Conditions, boucles &amp; fonctions.</p>
			<figure>
				<img src="../img/misc/condition.png" alt="img">
				<figcaption class="hidden">Condition</figcaption>
			</figure>
			<a href="./basic.php">Basique</a>
		</div>

		<div class="miscelement tooltip">
			<p class="tooltiptext">Enqu&ecirc;te, compte &amp; sondage.</p>
			<figure>
				<img src="../img/misc/form.png" alt="img">
				<figcaption class="hidden">Formulaire</figcaption>
			</figure>
			<a href="./form.php">Formulaire</a>
		</div>

		<div class="miscelement tooltip">
			<p class="tooltiptext">Lecture &amp; &eacute;criture.</p>
			<figure>
				<img src="../img/misc/json.png" alt="img">
				<figcaption class="hidden">Fichiers</figcaption>
			</figure>
			<a href="#">Fichiers</a>
		</div>

		<div class="miscelement tooltip">
			<p class="tooltiptext">Mod&egrave;le objet de document.</p>
			<figure>
				<img src="../img/misc/dom.png" alt="img">
				<figcaption class="hidden">Arbre</figcaption>
			</figure>
			<a href="#">DOM</a>
		</div>

		<div class="miscelement tooltip">
			<p class="tooltiptext">Asynchrone JavaScript &amp; XML.</p>
			<figure>
				<img src="../img/misc/ajax.png" alt="img">
				<figcaption class="hidden">Chevron</figcaption>
			</figure>
			<a href="#">AJAX</a>
		</div>
	</article>

</section>
<?php
	require_once '../include/footer.inc.php';
?>
