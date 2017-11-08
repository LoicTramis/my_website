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
    		<h3>Par type d'&eacute;tablissement</h3>
    		<form action="synthetic_type.php" method="get">			
    			<fieldset>
    				<legend>Choisissez le type d'&eacute;tablissement</legend>
    				<select name="types">
    				<?php 
    					$types= get_types();
    					$total_types= count($types);
    					
    					for ($index = 0; $index < $total_types; $index++) {
    						echo "<option value=\"".$types[$index]."\">".$types[$index]."</option>\n";
    					}
    				?>
    				</select>
    				<input type="submit">
    				<a href="synthetic_type.php?showall=type">D&eacute;voiler tout</a>
    			</fieldset>
    		</form>
    		<?php 
    			if (isset($_GET["types"]) && !empty($_GET["types"])) {
    				$types= get_types();
    				$total_types= count($types);
    				
    				$total_eta = get_total_institutions_by_types($_GET["types"]);
    				
    				$formated_type = urldecode($_GET["types"]);
    				
    				pie_plot($formated_type, $total_eta, $total_types, "type");
    				
    				echo " 	<figure>
    							<img src = \"../img/graph/type/$formated_type.png\" alt =\"barGraph\"/>
    							<figcaption>Graphique : $formated_type</figcaption>
    						</figure>"; 
    			}
    			
    			if (isset($_GET["showall"]) && $_GET["showall"] == "type") {
    				// Display alphabetical sort link
    				if (isset($_GET["sort"]) && $_GET["sort"] == "TRUE") {
    					echo "	<div class=\"sort-button\">
    								<a href=\"synthetic_type.php?showall=type&sort=FALSE\"><i class=\"ion-funnel\"></i>Trier par ordre alphab&eacute;tique</a>
    							</div>
    							<div class=\"image-graph\">
    							<figure>
    								<img src=\"synthetic_type_graph.php?sort=TRUE\" alt=\"Graphique\">
    								<figcaption>Graphique des type d'&eacute;tablissement</figcaption>
    							</figure>
    						</div>";
    					// Display numerical sort link && the graph
    				} else {
    					echo "	<div class=\"sort-button\">
    								<a href=\"synthetic_type.php?showall=type&sort=TRUE\"><i class=\"ion-funnel\"></i>Trier par ordre d&eacute;croissant</a>
    							</div>
    							<div class=\"image-graph\">
    							<figure>
    								<img src=\"synthetic_type_graph.php?sort=FALSE\" alt=\"Graphique\">
    								<figcaption> des type d'&eacute;tablissement</figcaption>
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