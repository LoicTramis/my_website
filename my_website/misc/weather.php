<?php
	$file_name = basename(__FILE__);
	$folder_name = basename(__DIR__);
	
	require_once '../include/header.inc.php';
?>
<section>
	<h2>M&eacute;t&eacute;o</h2>
	<article>
		<h3>Test m&eacute;t&eacute;o</h3>
		<div id="meteo"></div>
		
		<script src="../js/ajax.js"></script>
		<script src="../js/cours.js"></script>
	</article>

</section>
<?php 
	require_once '../include/footer.inc.php';
?>