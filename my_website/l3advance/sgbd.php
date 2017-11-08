<?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);

    require_once '../include/header.inc.php';
    require_once '../include/sgbd.conf.inc.php';
?>
<section>
	<h2>Connexion au serveur BD</h2>
	<article>
		<h3>Connexion</h3>
		<?php 
		  $connection = mysqli_connect($host, $username, $password, $database, $port);
		  if ($connection) {
		      echo "Connect&eacute;";
		  }
		?>
	</article>
</section>
<?php 
    require_once '../include/footer.inc.php';
?>