		<footer>
			<div class="footer-social">
				<div class="social-content">
    				<h3>R&eacute;seaux sociaux :</h3>
    				<ul>
    					<li class="facebook"><a href="http://www.facebook.com/entropyce" target="_blank"><i class="fa fa-facebook"></i></a></li>
    					<li class="twitter"><a href="http://www.twitter.com/entropyce" target="_blank"><i class="fa fa-twitter"></i></a></li>
    					<li class="linkedin"><a href="http://www.twitter.com/entropyce" target="_blank"><i class="fa fa-linkedin"></i></a></li>
    					<li class="instagram"><a href="http://www.twitter.com/entropyce" target="_blank"><i class="fa fa-instagram"></i></a></li>
    					<li class="googleplus"><a href="http://www.twitter.com/entropyce" target="_blank"><i class="fa fa-google-plus"></i></a></li>
    				</ul>
    				<p style="float: right;">Me contacter :</p>
				</div>
			</div>
			<div class="footer-date">
				<div class="date-content">
    				<figure>
    					<img src="../img/footer/<?php echo get_day();?>.png" alt="nom du jour">
    					<figcaption class="hidden">Jour de le semaine</figcaption>
    				</figure>
    				<p style="float: right;">Derni&egrave;re modification : <?php echo date("d/m/Y.", getlastmod());?></p>
				</div>
			</div>
			<div class="footer-about">
				<div class="about-content">
					<div>
    					<figure>
    						<img src="../img/logo_grayscale.png" alt="logo">
    						<figcaption class="hidden">Logo Entropy</figcaption>
    					</figure>
    					<p><strong>Entropy</strong> est un site &eacute;tudiant qui regroupe tous les TD et projets r&eacute;alis&eacute;s durant la licence Informatique
    					&agrave; l'universit&eacute; de Cergy-Pontoise.</p>
					</div>

					<div>
    					<ul>
    						<li><strong>Statistiques</strong></li>
    						<li>Visiteurs en ligne : </li>
    						<li>Visiteurs total : <?php echo get_total_visitors($_SESSION['ip'])?></li>
    					</ul>
					</div>

					<div>
    					<ul>
    						<li><strong>&Agrave; propos</strong></li>
    						<li>L'auteur</li>
    						<li>L'universit&eacute;</li>
    					</ul>
					</div>
				</div>
			</div>
			<div class="footer-legal">
				<div class="legal-content">
					<p>&copy; 2017 - Tous droits r&eacute;serv&eacute;s</p>
				</div>
			</div>
		</footer>	
	</body>
</html>