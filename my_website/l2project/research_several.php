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
    		<h3>Recherche multi-crit&egrave;res</h3>
    		<form action="research_several.php" method="get">
    			<fieldset>
    				<legend>Choisisser les crit&egrave;res</legend>
    				<label for="status">Statut</label>
    				<select name="status" id="status">
    					<?php 
    						$status = get_status();
    						$total_status = count($status);
    						
    						for ($index = 0; $index < $total_status; $index++) {
    							echo "<option value=\"".$status[$index]."\" ".(($status[$index] == "Public") ? "selected" : "").">".$status[$index]."</option>\n";
    						}					
    					?>
    				</select>
    				<label for="type">Type</label>
    				<select name="type" id="type">
    					<?php 
    						$types = get_types();
    						$total_types = count($types);
    						
    						for ($index = 0; $index < $total_types; $index++) {
    							echo "<option value=\"".$types[$index]."\">".$types[$index]."</option>\n";
    						}
    					?>
    				</select>
    				
    				<label for="region">R&eacute;gion</label>
    				<select name="region" id="region">
    					<?php 
    						$regions = get_regions();
    						$total_regions = count($regions);
    						
    						// mainland France
    						echo "<optgroup label=\"M&eacute;trop&ocirc;le\">";
    						for ($index = 1; $index < $total_regions; $index++) {
    							if (!is_dom_tom(($regions[$index]))) {
    								echo "<option value=\"".$regions[$index]."\">".$regions[$index]."</option>\n";
    							}
    						}
    						// overseas department of France
    						echo "	</optgroup>
    								<optgroup label=\"DOM-TOM\">";
    						
    						for ($index = 1; $index < $total_regions; $index++) {
    							if (is_dom_tom(($regions[$index]))) {
    								echo "<option value=\"".$regions[$index]."\">".$regions[$index]."</option>\n";
    							}
    						}
    						echo "</optgroup>";
    					?>
    				</select>
    				<div class="button-research">
    					<input type="submit">
    				</div>
    			</fieldset>
    		</form>
    		
    		<?php 
    			if (!empty($_GET["status"]) && !empty($_GET["type"]) && !empty($_GET["region"])) {
    				echo multiple_research($_GET["status"], $_GET["type"], $_GET["region"]);
    			}
    		?>
    	</article>
    </section>
    <?php 
        echo ((isset($_SESSION['login']) && $_SESSION['admin'] == true) ? "<div class=\"preference l2 admin\">" : "<div class=\"preference l2\">");
    	echo "<h4>Pr&eacute;f&eacute;rences</h4>";
    	// research has been lanch
    	if (!empty($_GET['status']) && !empty($_GET['type']) && !empty($_GET['region'])) {
    		// save button
    		echo "	<p>Enregistrer vos pr&eacute;f&eacute;rences maintenant !</p>
    				<div class=\"save-button\">
    					<a href=\"./research_several.php?status=".urlencode($_GET["status"])."&type=".urlencode($_GET["type"])."&region=".urlencode($_GET["region"])."&save=true\" 
    						title=\"Pour une prochaine fois\"><i class=\"ion-ios-download-outline\"></i>Sauver</a>
    				</div>";
    	// no research
    	} else {
    		echo "<p>Aucune recherche.</p>";
    	}
    	// research has been saved
    	if (!empty($_COOKIE["status"]) && !empty($_COOKIE["type"]) && !empty($_COOKIE["region"])) {
    		// load button
    		echo "	<p>Votre derni&egrave;re recherche enregistr&eacute;e : </p>
    					<ul>
    						<li>".$_COOKIE["status"]."</li>
    						<li>".$_COOKIE["type"]."</li>
    						<li>".$_COOKIE["region"]."</li>
    					</ul>
    				
    				<div class=\"load-button\">
    					<a href=\"./research_several.php?status=".urlencode($_COOKIE["status"])."&type=".urlencode($_COOKIE["type"])."&region=".urlencode($_COOKIE["region"])."\" 
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