	<aside>
		<figure>
			<h3>Site de Saint-Martin</h3>
			<p>2 avenue Adolphe-Chauvin</p>
			<p>BP 222, Pontoise</p>
			<p>95302 Cergy-Pontoise cedex</p>
			<p>01 34 25 60 00</p>
			<img src="../img/saintmartin.jpg" alt="Site de saint martin" style="width: 200px; height: 120px;">
			<figcaption>Entr&eacute;e principale</figcaption>	
		</figure>
		<figure style="margin-left: 20px">
			<h3 style="margin-left: 20px">Image al&eacute;atoire</h3>
			<?php 
				echo "	<img src=\"".randomImage()."\" alt=\"A planet\"/>				
						<p style=\"margin-left: 20px\">".get_info_planet()."</p>
						<p style=\"margin-left: 20px\">".get_info_planet("yes")."</p>				
						<figcaption class=\"hidden\">".get_info_planet()."</figcaption>";
			?>
		</figure>		
		
	</aside>