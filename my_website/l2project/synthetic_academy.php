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
    		<h3>Par acad&eacute;mie</h3>
    		<form action="synthetic_academy.php" method="get">			
    			<fieldset>
    				<legend>Choisissez l'acad&eacute;mie</legend>
    				<select name="academies">
    				<?php 
    					$academies = get_academies();
    					$total_academies = count($academies);
    					
    					echo "<optgroup label=\"M&eacute;trop&ocirc;le\">";
    					
    					for ($index = 0; $index < $total_academies; $index++) {
    						if (!is_dom_tom(($academies[$index]))) {
    							echo "<option value=\"".$academies[$index]."\">".$academies[$index]."</option>\n";
    						}
    					}
    					// overseas department of France
    					echo "	</optgroup>
    								<optgroup label=\"DOM-TOM\">";
    					
    					for ($index = 0; $index < $total_academies; $index++) {
    						if (is_dom_tom(($academies[$index]))) {
    							echo "<option value=\"".$academies[$index]."\">".$academies[$index]."</option>\n";
    						}
    					}
    					echo "</optgroup>";
    				?>
    				</select>
    				<input type="submit">
    				<a href="synthetic_academy.php?showall=academy">D&eacute;voiler tout</a>
    			</fieldset>
    		</form>
    		
    		
    		<?php 		
    			if (isset($_GET["academies"]) && !empty($_GET["academies"])) {
    				echo "	<p> Nombre d'&eacute;tablissement pour : ".$_GET["academies"]."
    						Total : ".get_total_institutions_by_academy($_GET["academies"])."</p>";
    				$academies = get_academies();
    				$total_academies = count($academies);
    				
    				$total_eta = get_total_institutions_by_academy($_GET["academies"]);
    				
    				$formated_academy = urldecode($_GET["academies"]);
    				
    				pie_plot($formated_academy, $total_eta, $total_academies, "academy");
    				
    				echo " 	<figure>
    							<img src = \"../img/graph/academy/$formated_academy.png\" alt =\"barGraph\"/>
    							<figcaption>Graphique : $formated_academy</figcaption>
    						</figure>"; 
    			}
    			
    			if (isset($_GET["showall"]) && $_GET["showall"] == "academy") {
    				// Display alphabetical sort link
    				if (isset($_GET["sort"]) && $_GET["sort"] == "TRUE") {
    					echo "	<div class=\"sort-button\">
    								<a href=\"synthetic_academy.php?showall=academy&sort=FALSE\"><i class=\"ion-funnel\"></i>Trier par ordre alphab&eacute;tique</a>
    							</div>
    							<div class=\"image-graph\">
    							<figure>
    								<img src=\"synthetic_academy_graph.php?sort=TRUE\" alt=\"Graphique\">
    								<figcaption>Graphique des acad&eacute;mies</figcaption>
    							</figure>
    						</div>";
    				// Display numerical sort link && the graph
    				} else {
    					echo "	<div class=\"sort-button\">
    								<a href=\"synthetic_academy.php?showall=academy&sort=TRUE\"><i class=\"ion-funnel\"></i>Trier par ordre d&eacute;croissant</a>
    							</div>
    							<div class=\"image-graph\">
    							<figure>
    								<img src=\"synthetic_academy_graph.php?sort=FALSE\" alt=\"Graphique\">
    								<figcaption>Graphique des acad&eacute;mies</figcaption>
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