<?php
$file_name = basename(__FILE__);
$folder_name = basename(__DIR__);

require_once '../include/header.inc.php';

require_once '../include/util.inc.php';
require_once '../include/secure.inc.php';
?>
<section style="background: linear-gradient(#9966ff, #ecb3ff);">
	<h2 style="color: white;"><?php echo (isset($_SESSION['login']) && $_SESSION['login'] == "Entropy" ? "Profil administrateur" : "Profil");?></h2>
	<article>
		<h3 style="color: white;">Historique | agenda</h3>
		<div class="history">
			<p>26/05/12017</p>
			<ul>
				<li>
					<!-- span is for the little circle at the beginning and the end -->
					<span></span>
					<div class="title">Recherche</div>
					<div class="info">Type : D&eacute;taill&eacute;</div>
					<div class="type">
						<p>Recherche de l'&eacute;tablissement UCP (site saint-martin) pour l'acad&eacute;mie Versailles et de la r&eacute;gion &Icirc;le-de-France.</p>
					</div>
					<div class="time">
						<span>9:00</span>
						<span>13:00</span>
					</div>
				</li>
				<li>
					<span></span>
					<div class="title">Recherche</div>
					<div class="info">Type : simple</div>
					<div class="type">
						<p>Recherche des &eacute;blissement pour Paris.</p>
					</div>
					<div class="time">
						<span>9:00</span>
						<span>13:00</span>
					</div>
				</li>
				<li>
					<span></span>
					<div class="title">Graphe</div>
					<div class="info">Type : R&eacute;gion</div>
					<div class="type">
						<p>Affiche l'histogramme globale par ordre d&eacute;croissant et par ordre alphab&eacute;tique.</p>
						<p>Affiche le diagramme circulaire pour la r&eacute;gion Occitanie.</p>
					</div>
					<div class="time">
						<span>9:00</span>
						<span>13:00</span>
					</div>
				</li>
			</ul>
		</div>
	</article>
</section>
<?php 
    require_once '../include/footer.inc.php';
?>