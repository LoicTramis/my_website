<?php
	$file_name = basename(__FILE__);
	$folder_name = basename(__DIR__);
	
	require_once '../include/header.inc.php';
	
	require_once '../include/fonctions.inc.php';
	require_once '../include/util.inc.php';
	
	if (isset($_GET["academy"]) && isset($_GET["city"]) && isset($_GET["university"])) {
		$academy = $_GET["academy"];
		$city = $_GET["city"];
		$university = $_GET["university"];
	}
?>
<div class="center">
    <section style="left: 0%;
                    transform: none;
                    width: 85%;">
    	<h2>Trouver un &eacute;tablissement</h2>
    	<article>
    		<h3>Recherche d&eacute;taill&eacute;e</h3>
    			<div class="progress-nav">
    				<ul class="progress-bar">
    					<li class="progress-completed">Acad&eacute;mie</li>
    					<li class="progress-completed">Ville</li>
    					<li class="progress-completed">&Eacute;tablissement</li>
    					<li class="progress-active">Carte d'identit&eacute;</li>
    				</ul>
    			</div>
    			<?php 				
    				echo "	<p>R&eacute;sultat pour l'acad&eacute;mie <strong>$academy</strong> dans la ville <strong>$city</strong>
    						de l'&eacute;tablissement <strong>$university</strong>.</p>".get_comprehensive_university($academy, $city, $university)."						
    						
    						<div class=\"buttons\" style=\"	bottom: 10px;
    														display: inline-block;
    														float: right;
    														width: 100%;\">
    							<div class=\"button-restart\">
    								<a href=\"detailed_step1.php\">Relancer</a>
    							</div>
    	
    							<div class=\"button-previous\">
    								<a href=\"detailed_step3.php?academy=".urlencode($academy)."&city=".urlencode($city)."\">Pr&eacute;c&eacute;dent</a>
    							</div>
    							<div class=\"button-disable-finish\">
    								<a href=\"#\">Terminer</a>
    							</div>
    						</div>";				
    			?>
    	</article>
    </section>
    
    <?php 
        echo ((isset($_SESSION['login']) && isset($_SESSION['admin']) && $_SESSION['admin'] == true) ? "<div class=\"preference l2 admin\">" : "<div class=\"preference l2\">");
    	echo "<h4>Pr&eacute;f&eacute;rences</h4>";
    	// research has been lanch
    	if (!empty($_GET['academy']) && !empty($_GET['city']) && !empty($_GET["university"])) {
    		// save button
    		echo "	<p>Enregistrer vos pr&eacute;f&eacute;rences maintenant !</p>
    				<div class=\"save-button\">
    					<a href=\"./detailed_treatment.php?academy=".urlencode($_GET["academy"])."&city=".urlencode($_GET["city"])."&university=".urlencode($_GET["university"])."&save=true\" 
    						title=\"Pour une prochaine fois\"><i class=\"ion-ios-download-outline\"></i>Sauver</a>
    				</div>";
    	// no research
    	} else {
    		echo "<p>Aucune recherche.</p>";
    	}
    	// research has been saved
    	if (!empty($_COOKIE["academy"]) && !empty($_COOKIE["city"]) && !empty($_COOKIE["university"])) {
    		// load button				
    		echo "	<p>Votre derni&egrave;re recherche enregistr&eacute;e :	</p>
    				<ul>
    					<li>".$_COOKIE["academy"]."</li>
    					<li>".$_COOKIE["city"]."</li>
    					<li>".$_COOKIE["university"]."</li>
    				</ul>
    				<div class=\"load-button\">
    					<a href=\"./detailed_treatment.php?academy=".urlencode($_COOKIE["academy"])."&city=".urlencode($_COOKIE["city"])."&university=".urlencode($_COOKIE["university"])."\" 
    						title=\"Derni&egrave;re sauvegarde\"><i class=\"ion-ios-upload-outline\"></i>Charger</a>
    				</div></div>";
    	// no research saved
    	} else {
    		echo "<p>Aucune sauvegarde.</p></div>";
    	}
    
    	require_once '../include/l2aside.inc.php';
	?>
</div>
<?php
	require_once '../include/footer.inc.php';
?>
