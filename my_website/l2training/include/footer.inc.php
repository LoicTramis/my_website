	<div class="main-home">
		<figure>
			<a href="../../l2index/index.php">
				<img src="../../img/logo.svg" alt="MainHome">
			</a>
			<figcaption class="hidden">Accueil principale</figcaption>
		</figure>
	</div>
	
	<footer>
		<div class="fimage">
			<figure>
				<a href="https://www.u-cergy.fr/" title="Site UCP" target="_blank"> 
					<img src="../img/ucpblanc.jpg" alt="UCP logo blanc" width="120" height="90">
				</a>
				<figcaption class="hidden">Logo UCP</figcaption>
			</figure>
		</div>
		<div class="flink">
			<h3>Liens externes</h3>
			<ul>
				<li>
					<a href="http://www.u-cergy.fr/fr/ufr-sciences-et-techniques.html" target="_blank">UFR Sciences et Techniques</a>
				</li>
				<li>
					<a href="http://upload.wikimedia.org/wikipedia/commons/0/0e/Cours_php.pdf"
 				  		title="Les bases du PHP"
				  		target="_blank">PHP - Notions de bases</a>
				</li>
				<li>
					<a href="http://fr.wikipedia.org/wiki/Langage_de_programmation#Paradigmes"
						title="Un peu de culture"
						target="_blank">Quelques infos sur les langages du Web</a>
				</li>
			</ul>
		</div>
		
		<div class="finfo">		
			<h3>Date</h3>
			<?php 
					require_once ("../include/util.inc.php");
					
					// return a formatting date of the current day
					echo "<p>".today()."</p>";
					
				?>
		</div>
		<div>
			<?php

			// return the name of the browser
			$currentBrowser = getBrowserName();
				
			echo "	<h3>".$currentBrowser."</h3>
						<figure>
							<img src=\"".getBrowserIcon($currentBrowser)."\" alt=\"Navigateur\">
							<figcaption class=\"hidden\">".$currentBrowser."</figcaption>
						</figure>";
			?>
		</div>
		<div>
			<h3>Visits on the site</h3>
			<?php
				echo "<p class=\"hits\">".getVisits()."</p>";
			?>
		</div>
	</footer>
	
</body>
</html>