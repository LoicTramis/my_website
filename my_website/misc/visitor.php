<?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);
    
    require_once '../include/header.inc.php';
?>
<section style="background: linear-gradient(#55a6f6, #ecb3ff); color: white;">
	<h2>Visiteurs</h2>
	<article>
		<h3>Administrateur</h3>
		<div class="visitor-card">
			<div class="top-section">
    			<div class="img-part">
    				<figure>
    					<img src="../img/logo_entropy.svg" alt="">
    					<figcaption class="hidden">Profile</figcaption>
    				</figure>
    			</div>
    			<div class="info-part">
    				<?php
    				    echo "  <p>".$_SESSION['ip']."</p>
                                <p>".$_SESSION['login']."</p>
                                <p>".$_SESSION['firstname']."</p>
                                <p>".$_SESSION['lastname']."</p>";
    				?>
    			</div>
    			<div class="rank-part">
    				<?php 
    				    echo "  <figure>
                                    <img src=\"\" alt=\"Crown\">
                                    <figcaption>Admin</figcaption>                                         
                                </figure>";
    				?>
    			</div>			
			</div>
			
    		<div class="middle-section">
    			<?php
    			
				    echo "  <div class=\"browser\">
                                Navigateur :
                                <div class=\"".$_SESSION['browser']."\"></div>
                                <p>".$_SESSION['browser-name']."</p>
                            </div>
                            <div class=\"os\">
                                Syst&egrave;me d'exploitation :
                                <div class=\"".$_SESSION['os'][1]."\"></div>
                                <p>".$_SESSION['os'][0]."</p>
                            </div>
                            <p>".$_SESSION['screen']."</p>";
    			?>
    		</div>
    		
    		<div class="bottom-section">
    			<p>Statistiques :</p>
    			<p>Historique</p>
    		</div>
		</div>
	</article>
</section>
<?php 
    require_once '../include/footer.inc.php';
?>