<?php
	$file_name = basename(__FILE__);
	
	require_once '../include/header.inc.php';
	require_once '../include/fonctions.inc.php';

?>
<section>
	<h2>Travaux dirig&eacute;s N&deg; 12</h2>
	<article>
		<h3>Image SVG g&eacute;n&eacute;r&eacute;e</h3>
		<p>Teneur en vitamine C par aliment (mg/100g)</p>
		<div class="svg">
		<?php 
			$fruit_names = get_vitamin_c_fruit_names(TRUE);
			$fruit_values = get_vitamin_c_fruit_names(FALSE);
			$total_fruits = count($fruit_names);
			
			echo build_svg_graph($total_fruits, $fruit_values, $fruit_names);			
		?>
 		</div>
	</article>
		
	<article>
		<h3>Image PNG g&eacute;n&eacute;r&eacute;e</h3>
		<p>Teneur en vitamine C par aliment (mg/100g)</p>
 		<div class="svg">
 		<figure>
	 		<img src="td12image.php" alt="Image_PNG">
			<figcaption class="hidden">Fig. 12.1: Vitamine C v2</figcaption> 		
 		</figure>
 		</div>
	</article>
	
	<article>
		<h3>Image PNG avec data &amp; base64</h3>
		<div class="svg">
			<figure>
				<?php
					$embedded_data = build_png_64_graph();
					
					echo "<img src=\"data:image/png;base64,".base64_encode($embedded_data)."\">"					
				?>
				<figcaption class="hidden">Fig. 12.2: Vitamine C v3</figcaption>		
			</figure>	
		</div>
	</article>
	
	<article>
		<h3>Biblioth&egrave;que graphique PHP</h3>
		<p>Teneur en vitamine C par aliment (mg/100g)</p>
		<div class="svg">
			<figure>
				<img src="td12jpgraph.php" alt="Image_PNG">
				<figcaption class="hidden">Fig. 12.3: Vitamine C v4</figcaption>			
			</figure>
		
		</div>
	</article>
</section>

<?php
	require_once '../include/aside.inc.php';
	require_once '../include/footer.inc.php';
?>