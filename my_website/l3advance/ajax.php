<?php
$file_name = basename(__FILE__);
$folder_name = basename(__DIR__);

require_once '../include/header.inc.php';
?>
<div class="center">
    <section style="left: 0%;
                    transform: none;
                    width: 85%;">
    	<h2>AJAX</h2>
    	
    	<article>
    		<h3>Avec JavaScript</h3>
    		<div class="center">
        		<button class="button-js-l3" onclick="fetch_txt()">Donn&eacute;es texte</button>
        		<button class="button-js-l3" onclick="fetch_csv()">Donn&eacute;es CSV</button>
        		<button class="button-js-l3" onclick="fetch_xml()">Donn&eacute;es XML</button>
    			<p id="department"></p>
    		</div>
    	</article>
    	
    	<article>
    		<h3>Avec jQuery</h3>
    		<div class="center">
        		<button class="button-js-l3" onclick="fetch_txt()">Donn&eacute;es texte</button>
        		<button class="button-js-l3" onclick="fetch_csv()">Donn&eacute;es CSV</button>
        		<button class="button-js-l3" onclick="fetch_xml()">Donn&eacute;es XML</button>
    			<p id="department"></p>
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