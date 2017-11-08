<?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);
	
	require_once '../include/header.inc.php';
	require_once '../include/util.inc.php';
?>
<div class="center">
    <section style="left: 0%;
                    transform: none;
                    width: 85%;">
    	<h2><?php echo (isset($_SESSION['login']) && $_SESSION['login'] == "Entropy" ? "Profil administrateur" : "Profil");?></h2>
    	<article>
    		<?php
    			if (isset($_SESSION['login'])) {
    				echo "	<h3> Mise &agrave; jour de la base de donn&eacute;es</h3>
    							<form method=\"post\" action=\"webMaster.php\" enctype=\"multipart/form-data\">
    								<fieldset>
    									<legend>Fichiers csv</legend>
    			     					<label for=\"data\">Choisissez un fichier (CSV | max. 2 Mo) :</label>
    			     					<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"2097152\">
    			     					<input type=\"file\" name=\"data\" id=\"data\">
    									<div class=\"upload-button-bis\" style=\"left: 140px;\">
    			    	 					<input type=\"submit\" name=\"submit\" value=\"Upload\">
    									</div>
    								</fieldset>
    							</form>"; 
    				
    				if (isset ($_FILES['data'])){
    					// check on folders
    					if ($_FILES['data']['error'] > 0){// if the folder is sent
    						echo "<p>Erreur lors du transfert</p>"; 
    
     					} else {
     						// test about extention
     						$extensions_valides = array('csv');
     						$extension_upload = strtolower(substr(strrchr($_FILES['data']['name'], '.') ,1));
     						
     						if (in_array($extension_upload,$extensions_valides)){ // si l'extention est valide 
     							// rename the folder
     							$name= "../files/etablissements_denseignement_superieur.{$extension_upload}";
     							// move the folder
     							$resultat = move_uploaded_file($_FILES['data']['tmp_name'],$name);
     							
    							if ($resultat){
    								echo "<p>Transfert réussi</p>";
    							} else {
    								echo "<p>Echec lors du transfert de donn&eacute;es</p>";
    							}
    
     						} else {
     							echo "<p>Format CSV Uniquement</p>"; 
     						}
     					}
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