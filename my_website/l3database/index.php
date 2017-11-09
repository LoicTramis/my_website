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
    		<h3>Base de donn&eacute;es</h3>
    		<p style="text-indent: 2em;"><em>Text here</em></p>
    		 
    		<div class="l3element tooltip">
    			<p class="tooltiptext">Oracle</p>
    			<figure>
    				<img src="../img/l3/javascript_48px.png" alt="img">
    				<figcaption class="hidden">Oracle</figcaption>
    			</figure>
    			<a href="oracle.php">Oracle</a>
    		</div>
    		
    		<div class="l3element tooltip">
    			<p class="tooltiptext">Postreg SQL</p>
    			<figure>
    				<img src="../img/l3/jquery_48px.png" alt="img">
    				<figcaption class="hidden">postregSQL</figcaption>
    			</figure>
    			<a href="postreg.php">Postreg SQL</a>
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