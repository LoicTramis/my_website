<?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);

	require_once '../include/header.inc.php';
	
	require_once '../include/fonctions.inc.php';
	require_once '../include/graph.inc.php';
	require_once '../include/util.inc.php';
?>
<div class="center">
    <section style="left: 0%;
                    transform: none;
                    width: 85%;">
    	<h2>Graphiques</h2>
    	<article>
    		<h3>Par r&eacute;gion</h3>
    		<form action="synthetic_region.php" method="get">			
    			<fieldset>
    				<legend>Choisissez la r&eacute;gion</legend>
    				<select name="regions">
    				<?php 
    					$regions = get_regions();
    					$total_regions = get_total_regions();
    					
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
    				<input type="submit">
    				<a href="synthetic_region.php?showall=region">D&eacute;voiler tout</a>
    			</fieldset>			
    		</form>
    		<?php 
    			if (isset($_GET["regions"]) && !empty($_GET["regions"])) {
    				$regions = get_regions();
    				$total_regions = get_total_regions();
    				
    				$total_eta = get_total_institutions_by_region($_GET["regions"]);
    				
    				$formated_region = urldecode($_GET["regions"]);
    				
    				pie_plot($formated_region, $total_eta, $total_regions, "region");
    				
    				echo " 	<figure>
    							<img src = \"../img/graph/region/$formated_region.png\" alt =\"barGraph\"/>
    							<figcaption>Graphique : $formated_region</figcaption>
    						</figure>"; 
    			}
    			
    			if (isset($_GET["showall"]) && $_GET["showall"] == "region") {
    				// Display alphabetical sort link
    				if (isset($_GET["sort"]) && $_GET["sort"] == "TRUE") {
    					echo "	<div class=\"sort-button\">
    								<a href=\"synthetic_region.php?showall=region&sort=FALSE\"><i class=\"ion-funnel\"></i>Trier par ordre alphab&eacute;tique</a>
    							</div>
    							<div class=\"image-graph\">
    							<figure>
    								<img src=\"synthetic_region_graph.php?sort=TRUE\" alt=\"Graphique\">
    								<figcaption>Graphique des r&eacute;gions</figcaption>
    							</figure>
    						</div>";
    					// Display numerical sort link && the graph
    				} else {
    					echo "	<div class=\"sort-button\">
    								<a href=\"synthetic_region.php?showall=region&sort=TRUE\"><i class=\"ion-funnel\"></i>Trier par ordre d&eacute;croissant</a>
    							</div>
    							<div class=\"image-graph\">
    							<figure>
    								<img src=\"synthetic_region_graph.php?sort=FALSE\" alt=\"Graphique\">
    								<figcaption>Graphique des r&eacute;gions</figcaption>
    							</figure>
    						</div>";
    				}
    			}
    		?>
    	</article>
    </section>
    
    <?php 
    	require_once '../include/l2aside.inc.php';
	?>
</div>
<?php
	require_once '../include/footer.inc.php';
?>