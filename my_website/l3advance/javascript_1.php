<?php
$file_name = basename(__FILE__);
$folder_name = basename(__DIR__);

require_once '../include/header.inc.php';
?>
<section>
	<h1>JavaScript Part 1/2</h1>
	<a href="./form.php">Page suivante</a>
	<p onmouseover="console.log('La souris est passe sur la paragraphe 1')" id="para">Paragraphe 1</p>
	<p onmouseover="change_color()" id="para">Paragraphe 2</p>
	<p onclick="document.getElementById('para').innerHTML = 'oui oui'" id="para">Paragraphe 3</p>
	<button onclick="push()" id="bou">Appuyer !</button>
</section>

<script type="text/javascript">	


	function change_color() {
		document.getElementById('para').style.color = 'red';
	}

	function change_size(taille) {
		document.getElementById('para').style.fontSize = taille;
	}
</script>
<?php 
    require_once '../include/footer.inc.php';
?>