<?php

	require_once '../include/util.inc.php';
	require_once '../include/fonctions.inc.php';
	require_once '../include/secure.inc.php';
	
	session_start();
	
	// not working well, -- WIP -- (endless refresh page loop)
	if (!isset($_SESSION["id"])) {
		$_SESSION["times"] = 1;
	}
	// same here (endless refresh page loop)
	if (isset($_GET["status"])) {
		$_SESSION["times"] = 1;
	}
	// if the superglobal variable is defined AND is "alternatif"	
	if (isset($_GET['style']) && ($_GET['style'] == "alternatif" || $_GET['style'] == "style")
						      && isset($_COOKIE["cookiestyle"])) {
		$uname =  $_GET['style'];
		setcookie('cookiestyle', $uname, time()+60*60,'/');
		$_COOKIE['cookiestyle'] = $uname;
	}
	//Cookie set
	if (isset($_COOKIE["cookiestyle"])) {
		$style = $_COOKIE["cookiestyle"];
	//Cookie not set yet (i.e. the first time)
	} else {
		$style = "style";
		setcookie('cookiestyle', $style, time()+60*60,'/');
	}
	
?>

<!DOCTYPE html>

<html lang="fr">
<head>
	<title>Lo&iuml;c Tramis - UCP</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	
	<?php
		// Refresh the page to sync the profile with the nav bar (endless loop -- WIP --)
		if ($file_name == "td11profile.php" && $_SESSION["times"] == 1) {
			echo "<meta http-equiv=\"refresh\" content=\"8; URL=td11profile.php\">";
			$_SESSION["times"]++;
		}
		// html redirect
		if ($file_name == "td11htmlredirect.php") {
			echo "<meta http-equiv=\"refresh\" content=\"4; URL=../index.html\">";
		}
		// Special page (Restricted access)
		if ($file_name == "td11calendar.php") {
			echo "<link href=\"../style/calendar.css\" rel=\"stylesheet\" type=\"text/css\">";
		} else {
			echo "<link href=\"../style/".$style.".css\" rel=\"stylesheet\" type=\"text/css\">";
		}
	?>
	<style type="text/css">		
		h1 {
			margin-top: 0; 
			text-align: center;
			font-size: 20pt;
			font-family: Comfortaa, sans-serif;		
		}
		h2 {
			font-size: xx-large;
		}
		h2, h3, h4 {
			font-family: Comfortaa, sans-serif;
		}
		a {
			text-decoration: none;
		}
		
		ul {
			padding-left: 0;
			padding-right: 0;
			overflow: hidden;
		}
		li {
			font-weight: bold;
			color: #CCC;
		}
		table {
			border: 1px dashed black;
			margin-left: auto;
			margin-right: auto;
		}
		th, .sideColum {
			font-weight: bold;
		}
		th, td {
			text-align: center;
			border: 1px solid black;
		}
		em {
			font-style: italic;
		}
		/* For the ascii table */
		.ascii td, th {
			padding: 7px 7px 7px 7px;
		}
		.basic {
			color: black;		
		}
		.number, .uppercase, .lowercase {
			background-color: #CCC;		
		}		
		.number {
			color: red;		
		}
		.uppercase {
			color: green;		
		}
		.lowercase {
			color: blue;		
		}
		
		/* For the safe web palette */
		.colorWeb {
			margin: 0 0 0 0;
			padding: 0 0 0 0;
			text-indent: 0;
			font-size: 11pt;
		}
		input {
			display: block;
		}
		input[type=range] {
			margin: 10px 0 0 0;
			width: 100%;
		}
		input[type=submit] {
			margin: 10px auto 10px auto;
		}
	</style>
</head>

<body>
	<!-- header -->
	<header>
		<h1>Lo&iuml;c TRAMIS - UCP</h1>
		
	</header>
	
	<!-- internal navigation bar-->
	<nav id="backtotop">
		<ul style="height: 46px;">
			<li>
				<figure style="padding: 0px; margin: 0px">
					<a href="../index.html" title="Accueil" style="padding: 0px; margin: 0px;">
						<img src="../img/homeicon.png" alt="home" style="width: 46px;">
					</a>
					<figcaption class="hidden">Home</figcaption>
				</figure>
			</li>				
			<li><a href="../td5/td5.php" title="Introduction au PHP">TD 5</a></li>		
			<li><a href="../td6/td6.php" title="Plus de couleur">TD 6</a></li>					
			<li><a href="td7.php" title="Fonctions">TD 7</a></li>		
			<li><a href="td8.php" title="Calendrier">TD 8</a></li>					
			<li><a href="td9.php" title="Formulaires">TD 9</a></li>		
			<li><a href="td10.php" title="Fichiers">TD 10</a></li>					
			<li><a href="td11.php" title="Cookie/Session">TD 11</a></li>		
			<li><a href="td12.php" title="Graphe">TD 12</a></li>
			<?php
				// Only Iron man has the right to access the calendar page
				if (isset($_SESSION["id"]) && $_SESSION["id"] == "IronMan") {
					echo "<li><a href=\"td11calendar.php\">Acc&egrave;s autoris&eacute;</a></li>";
				// ohters don't
				} else {
					echo "<li><a href=\"td11phpredirect.php\">Acc&egrave;s refus&eacute;</a></li>";
				}
				
				// Display username informations
				if (isset($_SESSION["id"])) {
					echo "	<li style=\"float: right;\">
								<a href=\"td11profile.php\">"
									.$_SESSION["firstname"]." ".$_SESSION["lastname"]."
								</a>
							</li>
							<li style=\"float: right;\">
								<figure style=\"padding: 0px; margin: 0px\">				
									<a href=\"td11profile.php\" style=\"padding: 0px; margin: 0px;\">
										<img src=\"../img/marvel_icon/".get_profil_icon($_SESSION["id"]).".png\" alt=\"avenger\">
									</a>
									<figcaption class=\"hidden\">".$_SESSION["id"]."</figcaption>
								</figure>			
							</li>";
				// Suggest to log in
				} else {
					echo "	<li style=\"float: right;\">
								<a href=\"td11.php#login\">Connexion</a>
							</li>";;
				}
				// Don't need second calendar for the calendar page
				if ($file_name != "td11calendar.php") {
					echo "	<li class=\"dropdown\" style=\"float: right;\">
								<a href=\"#\" class=\"drop\">".today()."</a>
								<div class=\"dropdown-cal\">"
									.one_month_calendar(03, 2017)."
								</div>
							</li>";
				}
			?>
		</ul>
	</nav>
	