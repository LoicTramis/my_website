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
    		<h3>Par ville</h3>
    		<form action="synthetic_city.php" method="get">			
    			<fieldset>
    				<legend>Choisissez la ville</legend>
    				<select name="cities">
    				<?php 
    					$cities = get_cities();
    					$total_cities = count($cities);
    					
    					for ($index = 0; $index < $total_cities; $index++) {
    						echo "<option value=\"".$cities[$index]."\">".$cities[$index]."</option>\n";
    					}
    				?>
    				</select>
    				<input type="submit">
    				<a href="synthetic_city.php?showall=city">D&eacute;voiler tout</a>
    			</fieldset>
    		</form>
    		<?php 
    			if (isset($_GET["cities"]) && !empty($_GET["cities"])) {
    				$cities = get_cities();
    				$total_cities = count($cities);
    				
    				$total_eta = get_total_institutions_by_city($_GET["cities"]);
    				
    				$formated_city = urldecode($_GET["cities"]);
    				
    				pie_plot($formated_city, $total_eta, $total_cities, "city");
    				
    				echo " 	<figure>
    							<img src = \"../img/graph/city/$formated_city.png\" alt =\"barGraph\"/>
    							<figcaption>Graphique : $formated_city</figcaption>
    						</figure>"; 
    			}
    			
    			if (isset($_GET["showall"]) && $_GET["showall"] == "city") {
    				// Display alphabetical sort link
    				if (isset($_GET["sort"]) && $_GET["sort"] == "TRUE") {
    					echo "	<div class=\"sort-button\">
    								<a href=\"synthetic_city.php?showall=city&sort=FALSE\"><i class=\"ion-funnel\"></i>Trier par ordre alphab&eacute;tique</a>
    							</div>
    							<div class=\"image-graph\">
    							<figure>
    								<img src=\"synthetic_city_graph.php?sort=TRUE\" alt=\"Graphique\">
    								<figcaption>Graphique des villes</figcaption>
    							</figure>
    						</div>";
    					// Display numerical sort link && the graph
    				} else {
    					echo "	<div class=\"sort-button\">
    								<a href=\"synthetic_city.php?showall=city&sort=TRUE\"><i class=\"ion-funnel\"></i>Trier par ordre d&eacute;croissant</a>
    							</div>
    							<div class=\"image-graph\">
    							<figure>
    								<img src=\"synthetic_city_graph.php?sort=FALSE\" alt=\"Graphique\">
    								<figcaption>Graphique des villes</figcaption>
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