<?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);
    
    require_once '../include/header.inc.php';
    
    require_once '../include/util.inc.php';
    require_once '../include/secure.inc.php';
?>
<section style="background: linear-gradient(#9966ff, #ecb3ff);">
	<h2 style="color: white;"><?php echo (isset($_SESSION['login']) && $_SESSION['login'] == "Entropy" ? "Profil administrateur" : "Profil");?></h2>
	<article style="color:white;">
    	<h3 style="text-align:center;">Profile</h3>
    	<p style="text-align:center;">Pr&eacute;nom : <?php echo $_SESSION['firstname']?></p>
    	<p style="text-align:center;">Nom : <?php echo $_SESSION['lastname'] ?></p>
    	<p style="text-align:center;">Identifiant : <?php echo $_SESSION['login'] ?></p>
    	<p style="text-align:center;">E-mail : <?php echo $_SESSION['email']?></p>
    	<div class="signout-button">
    		<a href="signout.php"><i class="ion-log-out"></i>D&eacute;connexion</a>
    	</div>		
	</article>
</section>
<?php 

?>