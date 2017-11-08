<?php
    session_set_cookie_params(0,'/');
    session_start();

    require_once './include/util.inc.php';
    require_once './include/secure.inc.php';

    $_SESSION['ip'] = $_SERVER['SERVER_ADDR'];

?>

<!DOCTYPE html>

<html lang="fr">
	<head>
		<title>Entropy - Version Beta</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link href="./css/style.css" rel="stylesheet" type="text/css">
		<link href="./css/ionicons.css" rel="stylesheet" type="text/css">
		<link href="./css/font-awesome.css" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" type="image/png" href="./img/icontest.png"/>
		<style type="text/css">
            section {
				background-color: #EEE;
				box-shadow: 0px 0px 0px transparent;
				padding: 0px;
			}
			article {
			    color: white;
				display: table;
				height: auto;
				margin: 10px 0px;
				border-radius: 5px;
				box-shadow: 0px 0px 10px #888888;
			}
			h2 {
				text-transform: none;
			}
			ul li {
				padding-bottom: 5px;
				display: block;
			}
			/* All the <div> element with ".button" class*/
			div.button {
				display: inline-block;
				padding: 10px 0px;
				margin: 5px 0px 3px 0px;
			}
			/* Every <a> element that is within a <div> element with ".button" class */
			div.button a {
				border-bottom: 3px solid #583d8f;
			}
			/* Hover effect on a <a> element for every <div> element that is the 3rd child of its parent,
			counting from last child & where the parent is a <div> element. */
			div.button:nth-last-child(3) a:hover {
				background-color: #5c4785;
				border-color: #bd7f6b;
				color: #bd7f6b;
			}
			/* Hover effect on a <a> element for every <div> element that is the 2nd child of its parent,
			counting from last child & where the parent is a <div> element. */
			div.button:nth-last-child(2) a:hover {
				border-color: #5cac3f;
				background-color: #5c4785;
				color: #5cac3f;
			}
			/* Hover effect on a <a> element for every <div> element that is the last child of its parent,
			where the parent is a <div> element. */
			div.button:last-child a:hover {
				background-color: #5c4785;
				border-color: #3e81f4;
				color: 	#3e81f4;
			}
			a {
				padding: 10px 5px;
				text-decoration: none;
				color: white;
			}
			a:hover {
				background-color: transparent;
				color: #6600ff;
			}
			/* All elements with ".title" class */
			.text-home {
			    display: inline-block;
			    width: 50%;
			    vertical-align: top;
			}
			.title {
				display: block;
				font-family: "Agency FB";
				font-size: 22pt;
				font-weight: bold;
				letter-spacing: 2px;
				text-align: center;
				margin: 0;
				padding: 2px 0px;
			}
			.subtitle {
				font-size: larger;
				text-indent: 1em;
				margin-bottom: 0px;
			}
			.subsubtitle {
				font-weight: bold;
				text-indent: 2em;
				margin-bottom: 0px;
			}
			.list ul {
			    margin: 8px 0px 0px 10px;
			}
			.image-home {
			    position: relative;
			    display: inline-block;
			    height: auto;
			    width: 50%;
			    vertical-align: bottom;
			}
			.image-home > figure {
			    height: auto;
				margin: 0;
				padding: 0;
			}
			.image-home > figure > img {
			    border-bottom-right-radius: 5px;
			    float: right;

			}
		</style>
		<script>
      		window.onscroll = stay_top;

			function stay_top() {
			  var nav_tag = document.getElementsByTagName("nav");

                if (window.pageYOffset > 100) {
                  nav_tag[0].style.position = "fixed";
                  nav_tag[0].style.top = "0px";
                  nav_tag[0].style.boxShadow = "0px 1px 1px #ccc";
                } else {
                  nav_tag[0].style.position = "absolute";
                  nav_tag[0].style.top = "100px";
                  nav_tag[0].style.boxShadow = "0px 2px 2px #ccc";
                }
			}

		</script>
	</head>

	<body>
		<header>
			<h1 class="hidden">Lo&iuml;c Tramis - Version beta</h1>
			<div>
    			<figure>
    				<img src="./img/logo_main.png" alt="Main logo" height="50">
    				<figcaption class="hidden">Entropy</figcaption>
    			</figure>
			</div>
		</header>

		<nav>
    		<div class="nav-div">
    			<ul>
    				<li>
    					<a href="./" style="color: #944dff;font-weight: bold;"><i class="fa fa-home"></i>Accueil</a>
    				</li>
    				<li>
    					<a href="./l2index/index.php"><i class="fa fa-book"></i>Licence 2</a>
    				</li>
    				<li>
    					<a href="./l3index/index.php"><i class="fa fa-archive"></i>Licence 3</a>
    				</li>
    				<li>
    					<a href="./misc/index.php"><i class="fa fa-inbox"></i>Hors Programme</a>
    				</li>
    				<li class="logo-entropy">
    					<figure>
    						<img src="./img/logo_entropy.svg" alt="home">
    					<figcaption class="hidden">Entropy</figcaption>
    					</figure>
    				</li>

    				<?php
    				// session open or user/admin is log in
    				if (isset($_SESSION['login']) || is_connected("./files/secure_data.csv")) {
    				    // the admin is logged in
    				    if ($_SESSION['login'] == "Entropy") {
    				        echo "	<li class=\"nav-session\">
        									<a href=\"./account/index.php\">
                                                <i class=\"ion-key\" style=\"
                                                                        font-size: 18pt;
                                                                        left: -20px;
                                                                        position: absolute;
                                                                        text-shadow: 0px 0px 3px #aaa;
                                                                        top: 4px;
                                                                        transform: rotate(45deg)\"></i>
        										".$_SESSION['login']."
        										<i class=\"ion-power\" style=\"color: #33adff; text-shadow: 0px 0px 3px #aaa;\"></i>
        									</a>
        								</li>";
    				        // the user is logged in
    				    } else {
    				        echo "	<li class=\"nav-session\">
        									<a href=\"./account/index.php\">
                                                <i class=\"ion-person\" style=\"
                                                                        font-size: 14pt;
                                                                        left: -22px;
                                                                        position: absolute;
                                                                        text-shadow: 0px 0px 3px #aaa;
                                                                        top: 8px;\"></i>
        										".$_SESSION['login']."
        										<i class=\"ion-power\" style=\"color: #33adff; text-shadow: 0px 0px 3px #aaa;\"></i>
        									</a>
        								</li>";
    				    }
    				    // the user is logged out
    				} else {
    				    echo "	<li class=\"nav-session\">
    									<a href=\"./account/index.php\">Connectez-vous<i class=\"ion-power\" style=\"text-shadow: 0px 0px 3px #aaa;\"></i></a>
    								</li>";
    				}
    				?>
    			</ul>
			</div>
		</nav>

		<section>
			<h2 class="hidden">Entropy - Lo&iuml;c Tramis</h2>

			<!-- SUB NAV BAR -->
			<article style="background-color: #583d8f; height: auto;
			     margin-top: 0px;">
				<h3 class="hidden">Pr&eacute;sentation</h3>
				<p class="title">Bienvenue</p>
				<div style="display: inline-block; position: relative; left:50%; transform: translate(-50%,0%); width: auto;%">
    				<div class="button">
    					<a href="#secondyear">Deuxi&egrave;me ann&eacute;e</a>
    				</div>
    				<div class="button">
    					 <a href="#thirdyear">Troisi&egrave;me ann&eacute;e</a>
    				</div>
    				<div class="button">
    					 <a href="#contact">Hors programme</a>
    				</div>
				</div>
			</article>

			<!-- SECOND YEAR -->
			<article id="secondyear" style="background-color: #bd7f6b;">
				<h3 class="hidden">2<sup>&egrave;me</sup> ann&eacute;e - HTML 5 - CSS 3 - PHP 5.6</h3>
				<!-- the links -->
				<div class="text-home">
    				<p class="title"><a href="./l2index/index.php">2<sup>&egrave;me</sup> ann&eacute;e</a></p>
    				<p class="subtitle">Introduction au d&eacute;veloppement Web</p>
    				<p class="subsubtitle">Travaux dirig&eacute;s :</p>
    				<div class="list">
						<ul>
							<li><a href="./l2training/">TD 1 : Introduction XHTML &amp; CSS</a></li>
							<li><a href="./l2training/">TD 2 : Perfectionnement XHTML &amp; CSS</a></li>
							<li><a href="./l2training/">TD 3 : Introduction HTML 5 &amp; h&eacute;bergement</a></li>
							<li><a href="./l2training/">TD 4 : Consolidation HTML 5 &amp; CSS</a></li>
							<li><a href="./l2training/td5/td5.php">TD 5 : PHP - introduction</a></li>
							<li><a href="./l2training/td6/td6.php">TD 6 : PHP - tests et boucles</a></li>
							<li><a href="./l2training/td7to12/td7.php">TD 7 : PHP - fonctions, constantes, tableaux &amp; constructions multifichiers</a></li>
							<li><a href="./l2training/td7to12/td8.php">TD 8 : PHP - tableaux &amp; fonctions</a></li>
							<li><a href="./l2training/td7to12/td9.php">TD 9 : Formulaires HTML &amp; PHP</a></li>
							<li><a href="./l2training/td7to12/td10.php">TD 10 : Fichiers &amp; dossiers</a></li>
							<li><a href="./l2training/td7to12/td11.php">TD 11 : Cookies, sessions &amp; redirections</a></li>
							<li><a href="./l2training/td7to12/td12.php">TD 12 : Images</a></li>
						</ul>
    				</div>
    				<p class="subsubtitle">Projet :</p>
    				<div class="list">
						<ul>
							<li style="margin-bottom: 20px;"><a href="./l2project/">Recherches &amp; graphes</a></li>
						</ul>
    				</div>
    			</div>
				<!-- the picture -->
				<div class="image-home">
					<figure>
						<img src="./img/l2_home.svg" alt="l2_home.png">
						<figcaption class="hidden">D&eacute;veloppement Web - PHP</figcaption>
					</figure>
				</div>
			</article>
			<!-- THIRD YEAR -->
			<article id="thirdyear" style="background-color: #5cac3f;">
				<h3 class="hidden">3<sup>&egrave;me</sup> ann&eacute;e - SQL</h3>
                <!-- the links -->
				<div class="text-home">
					<p class="title"><a href="./l3index/index.php">3<sup>&egrave;me</sup> ann&eacute;e</a></p>
					<p class="subtitle">Base de donn&eacute;es</p>
					<p class="subsubtitle">Travaux dirig&eacute;s :</p>
    				<div class="list">
						<ul>
							<li><a href="#">TD 1 : DDL</a></li>
							<li><a href="#">TD 2 : DML </a></li>
							<li><a href="#">TD 3 : PHP - Oracle</a></li>
							<li><a href="#">TD 4 : SGBD</a></li>
						</ul>
					</div>
					<p class="subsubtitle">Projet :</p>
    				<div class="list">
						<ul>
							<li><a href="#"><em>Project_title</em></a></li>
						</ul>
					</div>
					<p class="subtitle">D&eacute;veloppement Web avanc&eacute;</p>
					<p class="subsubtitle">Travaux dirig&eacute;s :</p>
    				<div class="list">
						<ul>
							<li><a href="#"><em>Training_title</em></a></li>
						</ul>
					</div>
					<p class="subsubtitle">Projet :</p>
    				<div class="list">
						<ul>
							<li style="margin-bottom: 20px;"><a href="#"><em>Project_title</em></a></li>
						</ul>
					</div>
				</div>
			    <!-- the picture -->
				<div class="image-home">
					<figure>
						<img src="./img/l3_home.svg" alt="l3_home.png">
						<figcaption class="hidden">D&eacute;veloppement Web - SQL</figcaption>
					</figure>
				</div>
			</article>
			<!-- PERSONNAL PROJECT -->
			<article id="contact" style="background-color: #1162f1;">
				<h3 class="hidden">Hors programme</h3>
			    <!-- the links -->
				<div class="text-home">
					<p class="title"><a href="./misc/index.php">Hors programme</a></p>
					<p class="subtitle">Apprentissage</p>
    				<div class="list">
							<ul>
								<li><a>JavaScript</a></li>
								<li><a>Angular</a></li>
								<li><a>Node.js</a></li>
							</ul>
					</div>
					<p class="subtitle">Projet personnel</p>
    				<div class="list">
							<ul>
								<li><a>Calendrier</a></li>
								<li><a>M&eacute;t&eacute;o</a></li>
							</ul>
					</div>
				</div>
				<!-- the picture -->
				<div class="image-home">
					<figure>
						<img src="./img/about.svg" alt="about.png">
						<figcaption class="hidden">Divers</figcaption>
					</figure>
				</div>
			</article>
		</section>
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
    					<img src="./img/footer/<?php echo get_day();?>.png" alt="nom du jour">
    					<figcaption class="hidden">Jour de le semaine</figcaption>
    				</figure>
    				<p style="float: right;">Derni&egrave;re modification : <?php echo date("d/m/Y.", getlastmod());?></p>
				</div>
			</div>
			<div class="footer-about">
				<div class="about-content">
					<div>
    					<figure>
    						<img src="./img/logo_grayscale.png" alt="logo">
    						<figcaption class="hidden">Logo Entropy</figcaption>
    					</figure>
    					<p><strong>Entropy</strong> est un site &eacute;tudiant qui regroupe tous les TD et projets r&eacute;alis&eacute;s durant la licence Informatique
    					&agrave; l'universit&eacute; de Cergy-Pontoise.</p>
					</div>

					<div>
    					<ul>
    						<li><strong>Statistiques</strong></li>
    						<li>Visiteurs en ligne : </li>
    						<li>Visiteurs total : <?php echo get_total_visitors($_SESSION['ip'], TRUE)?></li>
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
