<?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);
	
    require_once '../include/header.inc.php';
?>
        <section style="background: linear-gradient(#5cd65c, #ecb3ff);">
        	<h2 style="color: white;">Licence 3</h2>
        	<article>
        		<h3 style="color: white;">Semestre 5</h3>
        		<div style="margin-top: 50px; text-align: center; color: white;">
        			<p>Base de donn&eacute;es</p>
        			<a class="button-thirdyear" href="../l3database/index.php"><i class="fa fa-flask"></i>TD</a>				
        			<a class="button-thirdyear" href="#"><i class="fa fa-database"></i>Projet</a>			
        		</div>
        		<div style="margin-top: 50px; text-align: center; color: white;">
        			<p>D&eacute;veloppement Web Avanc&eacute;</p>
        			<a class="button-thirdyear" href="../l3advance/"><i class="fa fa-flask"></i>TD</a>
        			<a class="button-thirdyear" href="../l3project/"><i class="fa fa-server"></i>Projet</a>
        		</div>
        	</article>
    	</section>
<?php 
    require_once '../include/footer.inc.php';
?>