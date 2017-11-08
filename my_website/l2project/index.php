<?php
	$file_name = basename(__FILE__);
	$folder_name = basename(__DIR__);
	
	require_once '../include/header.inc.php';
?>
<div class="center">
    <section style="left: 0%;
                    transform: none;
                    width: 85%;">
    	<h2>Pr&eacute;sentation</h2>
    	<article>
    		<h3>Recherche</h3>
    		<p style="text-indent: 2em;">Trouver un &eacute;tablissement d'enseignement sup&eacute;rieur
    		 avec les recherches simples, multicrit&egrave;res ou d&eacute;taill&eacute;es.</p>
    		 
    		<div class="l2element tooltip">
    			<p class="tooltiptext">Un seul mot-cl&eacute;.</p>
    			<figure>
    				<img src="../img/l2/simple.png" alt="img">
    				<figcaption class="hidden">Loupe</figcaption>
    			</figure>
    			<a href="research_single.php">Simple</a>
    		</div>
    		
    		<div class="l2element tooltip">
    			<p class="tooltiptext">Status, type et r&eacute;gion.</p>
    			<figure>
    				<img src="../img/l2/multiple.png" alt="img">
    				<figcaption class="hidden">Choix-Multiple</figcaption>
    			</figure>
    			<a href="research_several.php">Multicrit&egrave;res</a>
    		</div>	
    		
    		<div class="l2element tooltip">
    			<p class="tooltiptext">3 &eacute;tapes: Acad&eacute;mie - Ville - Nom</p>
    			<figure>
    				<img src="../img/l2/id.png" alt="img">			
    				<figcaption class="hidden">Carte d'identit&eacute;</figcaption>
    			</figure>
    			<a href="detailed_step1.php">D&eacute;taill&eacute;e</a>
    		</div>
    	</article>
    
    	<article>
    		<h3>Graphiques</h3>
    		<p style="text-indent: 2em;">Acc&eacute;der aux histogrammes et aux diagrammes circulaires.</p>
    		
    		<div class="l2element tooltip">
    			<p class="tooltiptext">&Icirc;le-de-France, Bretagne, Occitanie...</p>
    			<figure>
    				<img src="../img/l2/region.png" alt="img">				
    				<figcaption class="hidden">Carte</figcaption>
    			</figure>
    			<a href="synthetic_region.php?showall=region">R&eacute;gion</a>
    		</div>
    		
    		<div class="l2element tooltip">
    			<p class="tooltiptext">Versailles, Paris, Rouen...</p>
    			<figure>
    				<img src="../img/l2/academy.png" alt="img">
    				<figcaption class="hidden">Acad&eacute;mie</figcaption>
    			</figure>
    			<a href="synthetic_academy.php?showall=academy">Acad&eacute;mie</a>
    		</div>
    		
    		<div class="l2element tooltip">
    			<p class="tooltiptext">Paris, Bordeaux, Cachan...</p>				
    			<figure>
    				<img src="../img/l2/city.png" alt="img">
    				<figcaption class="hidden">Administration</figcaption>
    			</figure>
    			<a href="synthetic_city.php?showall=city">Ville</a>
    		</div>
    		
    		<div class="l2element tooltip">
    			<p class="tooltiptext">Sant&eacute;, sciences, arts...</p>			
    			<figure>
    				<figcaption class="hidden">Payant</figcaption>
    				<img src="../img/l2/book.png" alt="img">
    			</figure>
    			<a href="synthetic_type.php?showall=type">Type</a>
    		</div>
    	</article>
    	<?php 
    	   if (isset($_SESSION['login']) && $_SESSION['login'] == "Entropy") {
    	?>
    	<article>
    		<h3>Administrateur</h3>
    		<p style="text-indent: 2em;">Acc&eacute;der aux histogrammes et aux diagrammes circulaires.</p>
    		
    		<div class="l2element tooltip">
    			<p class="tooltiptext">&Icirc;le-de-France, Bretagne, Occitanie...</p>
    			<figure>
    				<img src="../img/l2/Upload_48px.png" alt="img">				
    				<figcaption class="hidden">Carte</figcaption>
    			</figure>
    			<a href="../l2project/webmaster.php">M-&Agrave;-J</a>
    		</div>
    		
    		<div class="l2element tooltip">
    			<p class="tooltiptext">Versailles, Paris, Rouen...</p>
    			<figure>
    				<img src="../img/l2/Info_48px.png" alt="img">
    				<figcaption class="hidden">Acad&eacute;mie</figcaption>
    			</figure>
    			<a href="../account/phpinfo.php">PHP Info</a>
    		</div>
    	</article>
    	<?php 
    	   }
    	?>
    	
    </section>
    <?php 
    	require_once '../include/l2aside.inc.php';
    ?>
</div>
<?php
	require_once '../include/footer.inc.php';
?>