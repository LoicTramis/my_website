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
    		<h3>JavaScript</h3>
    		<p style="text-indent: 2em;"><em>Text here</em></p>
    		 
    		<div class="l3element tooltip">
    			<p class="tooltiptext">Tableau - Navigation - Timer - DOM Window</p>
    			<figure>
    				<img src="../img/l3/javascript_48px.png" alt="img">
    				<figcaption class="hidden">JavaScript</figcaption>
    			</figure>
    			<a href="javascript.php">JavaScript</a>
    		</div>
    		
    		<div class="l3element tooltip">
    			<p class="tooltiptext">Animation - Transition</p>
    			<figure>
    				<img src="../img/l3/jquery_48px.png" alt="img">
    				<figcaption class="hidden">jQuery</figcaption>
    			</figure>
    			<a href=jquery.php>jQuery</a>
    		</div>	
    		
    		<div class="l3element tooltip">
    			<p class="tooltiptext">AJAX</p>
    			<figure>
    				<img src="../img/l2/id.png" alt="img">			
    				<figcaption class="hidden">Carte d'identit&eacute;</figcaption>
    			</figure>
    			<a href="ajax.php">AJAX</a>
    		</div>
    	</article>
    
    	<article>
    		<h3>BD / PDO</h3>
    		<p style="text-indent: 2em;"><em>Insert text here</em></p>
    		
    		<div class="l3element tooltip">
    			<p class="tooltiptext">MySQL - PostregSQL</p>
    			<figure>
    				<img src="../img/l2/region.png" alt="img">				
    				<figcaption class="hidden">Carte</figcaption>
    			</figure>
    			<a href="sgbd.php">SQL</a>
    		</div>
    		
    <!-- 		<div class="l2element tooltip"> -->
    <!-- 			<p class="tooltiptext">Versailles, Paris, Rouen...</p> -->
    <!-- 			<figure> -->
    <!-- 				<img src="../img/l2/academy.png" alt="img"> -->
    <!-- 				<figcaption class="hidden">Acad&eacute;mie</figcaption> -->
    <!-- 			</figure> -->
    <!-- 			<a href="synthetic_academy.php?showall=academy">Acad&eacute;mie</a> -->
    <!-- 		</div> -->
    		
    <!-- 		<div class="l2element tooltip"> -->
    <!-- 			<p class="tooltiptext">Paris, Bordeaux, Cachan...</p>				 -->
    <!-- 			<figure> -->
    <!-- 				<img src="../img/l2/city.png" alt="img"> -->
    <!-- 				<figcaption class="hidden">Administration</figcaption> -->
    <!-- 			</figure> -->
    <!-- 			<a href="synthetic_city.php?showall=city">Ville</a> -->
    <!-- 		</div> -->
    		
    <!-- 		<div class="l2element tooltip"> -->
    <!-- 			<p class="tooltiptext">Sant&eacute;, sciences, arts...</p>			 -->
    <!-- 			<figure> -->
    <!-- 				<figcaption class="hidden">Payant</figcaption> -->
    <!-- 				<img src="../img/l2/book.png" alt="img"> -->
    <!-- 			</figure> -->
    <!-- 			<a href="synthetic_type.php?showall=type">Type</a> -->
    <!-- 		</div> -->
    	</article>
    
    	<article>
    		<h3>XML</h3>
    		<p style="text-indent: 2em;"><em>&Agrave; venir</em></p>
    		
    		<div class="l3element tooltip">
    			<p class="tooltiptext">&Agrave; venir</p>
    			<figure>
    				<img src="../img/l2/Upload_48px.png" alt="img">				
    				<figcaption class="hidden">XML</figcaption>
    			</figure>
    			<a href="#">&Agrave; venir</a>
    		</div>
    	</article>	
    </section>
<?php 
	require_once '../include/l3aside.inc.php';
?>
</div>
<?php
	require_once '../include/footer.inc.php';
?>