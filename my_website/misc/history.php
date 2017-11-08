<?php
	$file_name = basename(__FILE__);
	$folder_name = basename(__DIR__);
	
	require_once '../include/header.inc.php';
?>
<section style="background: linear-gradient(#55a6f6, #ecb3ff);">
	<h2>TEST</h2>
	<article>
		<h3>Historique | agenda</h3>
		<div class="history">
			<p>Historique du 26/05/12017</p>
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
	<article>
		<h3>Hand Spinner</h3>
		<!-- Fidget Spinner icon by Icons8 -->
	<img class="icon icons8-Fidget-Spinner" width="50" height="50" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAEb0lEQVRoQ+2ajbEMQRSFz4sAESACRIAIEAEiQASIABEgAkSACBABIkAE1Fd1z9Z9XTPdPdNTZWpru+rV7s70TN9z//v0O9ORjLMjwaETkIolr0i6I+mupOuSLkr6LemrpPeSPkj6sbUnbG2Rp5KedQjJnOcd87qnbAUErX8MC7D429D+p7AG92+Fle6HdFjodtzvFnhu4lZAvgSIb5IehBvNrYm74WKXY96NYRTSJsGOm+BSgEDrxANxwjXixDGC8LgT8cE1LAIYrvW4YxXvqEUQ+HusgGYRDjDvQthycUDek4TLYRksybg6mgBGgTyW9CJiApcCGMKhcbITmgYcQvOdbAYYQGOZN5KImSeSXo642CgQNHsztIzrWDBA4FblYA5gSAYAZw7W+xyWXI1lFMiv0P6l0LR/282wwqMQHOvhdmQ3rMIzWI5n/Pu/AfkbK1shc79/htsxvfXMKjCjFrFQtgiavRAxQGzg97gQn1jHFvkT1rBFEH5IlqGHI/tMxQixQHYqB/FAXOwuRqayFpbAKoDBEgQyYJkLCKxBFttV1pqrI4AATDkAAZjd1REEdWXPvRMAuY7QAAIA4LjmzpfsRczsorIDhIBFw9ckPYxa0so8JIDXkshmuBlJYmiMBrsXd2HDKj1NoAtnL/AmyK2ATNWH2uLuCGjj+T48TkAKFTp75Qpe0/JuXcuCvYp60XIVBzsZjBZ+eGzhWjSFFL5c6BCMbOTNFUmAwObTw3GCEmjjhzLXGiC4ETs7BEWzfDLKDOTtrwUvtc973AUAAkDe49MNLBotIFPUTrkAcUH7QcHLww1lvlaux/sBQAszNbpppBqQOWoHF0KT/KFBa7EUhPsUSY9aIsCq1CIqPQU2P5ffO0sjTQFpUTu9Js9sCSBww6U1o5tGmgKyhNrpBbXFvCqNVAKZonbQirMPPk3QollTO1sI6XesppEykKmWHC3QpQKmHJna2QLMEI2UgZSbJISHs+KTdIi1sAQLMrekdkbADNNIGUhJ7VDkKHZzVE1J7WQggOdZQPPHcIaj+pfFb5hGykBKagdroCl3qFgEMo39Nt/NFJZUTs0dAcR83pmr/DCNlIG0aBqCnIrOmKN/Mg0KSYdVnXJLl8xghmmkDMRUjqkdC54tQvZyY2ihTe0A0KnbLMlU3NiN8iZsLY10WLsWI15wKbXTauUzEw9llKnWpWsd4reWtXJT5yMBE9KuK7njNZnQQ0g7Q5ojLtdaTCO16gh+XaN2EAjL5diwa9bScWYY83HEahpprrITHyzgQ5satZPrTe/GCpBO76zB5qp3LeIQC56jkaZ6LXetgMGHc5ostYwloEF58ZqjAdeupWtxOuZ90Lk0WhYz81Rcx3UwOYJaa7TZPt9gDvdow5fu8rAm7/Z+xIGPoD6i4x7vZj1GPuI7yF3bj7iBbLUeWzCFw2v17BDRhg//oT9Jr2jL2ltqhTnFYB1b2dtpb+JYi7/ZfzRoAWlZYzf3T0B2Y4qi+dubXIvlORrX+gdQDJJCgBiblAAAAABJRU5ErkJggg==">
	</article>
	<article>
	
	</article>
</section>
<?php
	require_once '../include/footer.inc.php';
?>