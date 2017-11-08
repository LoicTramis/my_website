<?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);
	
	require_once '../include/header.inc.php';
	
	require_once '../include/fonctions.inc.php';
	require_once '../include/util.inc.php';
?>
<div class="center">
    <section style="left: 0%;
                    transform: none;
                    width: 85%;">
    	<h2>Trouver un &eacute;tablissement</h2>
    	<article>
    		<h3>Recherche simple</h3>
    		<form action="research_single.php" method="get">
    			<fieldset>
    				<legend>Mot-cl&eacute;</legend>
    				<!-- PHP code is usefull for searching others pages (2, 3...) -->
    				<input type="text" name="simple" value="<?php if (!empty($_GET["simple"])) {
    					echo $_GET["simple"];
    				}?>" placeholder="Rechercher...">
    				<div class="button-research">
    					<input type="submit" value="Valider">
    				</div>
    			</fieldset>
    		</form>
    		
    		<?php 
    			$display_line = 100; // the line we want to display
    			
    			if (isset($_GET["simple"]) && !empty($_GET["simple"])) {
    				
    				$get_simple = $_GET["simple"];
    				
    				if (isset($_GET["page"])) {
    					$get_page = $_GET["page"];
    				} else {
    					$get_page = 1;
    				}
    				
    				$total_line = get_total_lines($get_simple);
    				
    				echo simple_research($get_simple, $get_page, $display_line, $total_line);
    				
    				echo display_pagination($total_line, $display_line, $get_simple, $get_page);
    			}
    		?>
    	</article>
    </section>
    
    <?php 
        echo ((isset($_SESSION['login']) && $_SESSION['admin'] == true) ? "<div class=\"preference l2 admin\">" : "<div class=\"preference l2\">");
    	echo "<h4>Pr&eacute;f&eacute;rences</h4>";
    	// research has been lanch
    	if (!empty($_GET['simple'])) {
    		// save button
    		echo "	<p>Enregistrer les r&eacute;sultat pour <strong>".$_GET["simple"]."</strong> dans vos pr&eacute;f&eacute;rences maintenant !</p>
    				<div class=\"save-button\">
    					<a href=\"./research_single.php?simple=".urlencode($_GET['simple'])."&save=true\" 
    						title=\"Pour une prochaine fois\"><i class=\"ion-ios-download-outline\"></i>Sauver</a>
    				</div>";
    	// no research
    	} else {
    		echo "<p>Aucune recherche.</p>";
    	}
    	// research has been saved
    	if (!empty($_COOKIE['simple'])) {
    		// load button
    		echo "	<p>Votre derni&egrave;re recherche enregistr&eacute;e : <strong>".$_COOKIE["simple"]."</strong>.</p>
    				<div class=\"load-button\">						
    					<a href=\"research_single.php?simple=".urlencode($_COOKIE["simple"])."\" title=\"Ancienne recherche\"><i class=\"ion-ios-upload-outline\"></i>Charger</a>
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