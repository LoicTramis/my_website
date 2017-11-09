<?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);
    
    require_once '../include/header.inc.php';
    require_once '../include/oracle.conf.inc.php';
    require_once '../include/fonctions_oracle.inc.php';
?>
<section>
	<h2>PHP - Oracle</h2>
	<a href="./">Page pr&eacute;c&eacute;dente</a>
	
	<article>
		<h3>Affichage complet (r&eacute;sultat)</h3>
		<?php 
		  display_all_tables();
		?>
	</article>
</section>
<?php 
	require_once '../include/footer.inc.php';
?>