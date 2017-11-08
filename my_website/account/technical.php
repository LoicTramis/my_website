 <?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);
	
	require_once '../include/header.inc.php';
	
	require_once '../include/util.inc.php';
	require_once '../include/secure.inc.php';
?>

<section style="background: linear-gradient(#9966ff, #ecb3ff); color: white;">
	<h2 style="color: white;">Informations g&eacute;n&eacute;rales</h2>
	<article>
		<h3>Informations sur le PC :</h3>
		<?php
		     $browser = get_browser_name();
		     $browser_name = get_browser_name($browser);
		     $os = get_OS_name();
		     echo " <div class=\"client-card\">
                        <p>Adresse IP : ".$_SERVER['SERVER_ADDR']."</p>
                        <p>Nom de l'utilisateur : ".get_current_user()."</p>
                        <div class=\"browser\">
                            Navigateur :                 
                		    <div class=\"$browser\"></div>
                            <p>".$browser_name."</p>
                        </div>
                        <div class=\"os\">
                            Syst&egrave;me d'exploitation :
                            <div class=\"$os[1]\"></div>
                            <p>".$os[0]."</p>
                        </div>
                        <div class=\"screen\">
                            R&eacute;solution de l'&eacute;cran :
                            <p id=\"demo\"></p>
                        </div>
                    </div>";
		?>
		<script type="text/javascript">
    		var width_screen = screen.width;
    		var height_screen = screen.height;
	    	document.getElementById("demo").innerHTML = width_screen + "x" + height_screen + "p";
		</script>
	</article>
	<article>
		<h3>Informations sur le serveur : </h3>
		<?php
// 		     echo " <p>Version PHP : ".phpversion()."</p>
//                     <p>Syst&egrave;me d'exploitation : ".PHP_OS."</p>
//                     <p>Adresse IP : ".$_SERVER['SERVER_ADDR']."</p>
//                     <p>Nom du serveur : ".$_SERVER['SERVER_NAME']."</p>
//                     <p>M&eacute;thode de requ&ecirc;te : ".$_SERVER['REQUEST_METHOD']."</p>
//                     <p>Temps Unix : ".$_SERVER['REQUEST_TIME']."</p>";
		?>
	</article>
</section>

<?php 
    require_once '../include/footer.inc.php';
?>