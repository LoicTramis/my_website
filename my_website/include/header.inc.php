<?php
	// end the session when the browser is closed
	session_set_cookie_params(0,'/');
	// start a new session or resume the last one
	session_start();

	require_once '../include/util.inc.php';
	require_once '../include/secure.inc.php';

	// There is always be a session (no 'isset' needed)
	$_SESSION['ip'] = $_SERVER['SERVER_ADDR'];
	$_SESSION['browser'] = get_browser_name();
	$_SESSION['browser-name'] = get_browser_name($_SESSION['browser']);
	$_SESSION['os'] = get_OS_name();
	$_SESSION['screen'] = "coming";

	if (isset($_GET['save'])){
		// cookie for the single research
		if (!empty($_GET['simple'])) {
			$simple = $_GET['simple'];

			setcookie('simple', $simple, time()+3600*24*31, "/");

			$_COOKIE["simple"] = $simple; // instant effect
		}
		// cookies for the several categories research
		if (isset($_GET["status"]) && isset($_GET["type"]) && isset($_GET["region"]) ) {
			$status = $_GET["status"];
			$type = $_GET["type"];
			$region = $_GET["region"];

			setcookie('status', $status, time()+3600*24*31, "/");
			setcookie('type', $type, time()+3600*24*31, "/");
			setcookie('region', $region, time()+3600*24*31, "/");

			$_COOKIE["status"] = $status; // instant effect
			$_COOKIE["type"] = $type; // instant effect
			$_COOKIE["region"] = $region; // instant effect

		}
		// cookies for the detail research
		if (isset($_GET["academy"]) && isset($_GET["city"]) && isset($_GET["university"]) ) {
			$academy = $_GET["academy"];
			$city = $_GET["city"];
			$university = $_GET["university"];

			setcookie('academy', $academy, time()+3600*24*31, "/");
			setcookie('city', $city, time()+3600*24*31, "/");
			setcookie('university', $university, time()+3600*24*31, "/");

			$_COOKIE["academy"] = $academy; // instant effect
			$_COOKIE["city"] = $city; // instant effect
			$_COOKIE["university"] = $university; // instant effect
		}
	}
	// Current folder for the active page
	$style = get_current_folder($folder_name);
	$logo = get_logo_folder($folder_name);
?>

<!DOCTYPE html>

<html lang="fr">
	<head>
		<title>Entropy - Version Beta</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<link href="../css/form.css" rel="stylesheet" type="text/css">
		<link href="../css/image.css" rel="stylesheet" type="text/css">
		<?php
			if ($file_name == "calendar.php") {
				echo "<link href=\"../css/calendar.css\" rel=\"stylesheet\" type=\"text/css\">";
			}
		?>
		<link href="../css/ionicons.css" rel="stylesheet" type="text/css">
		<link href="../css/font-awesome.css" rel="stylesheet" type="text/css">
		<link href="../img/icontest.png" rel="shortcut icon" type="image/png">
		<script src="../js/javascriptJS.js"></script>
		<script src="../js/jquery-3.2.1.min.js"></script>
		<script>
      		window.onscroll = stay_top;

			function stay_top() {
			  var nav_tag = document.getElementsByTagName("nav");

			  	// when the top of the page is below 100px
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
		<style type="text/css"></style>
	</head>

	<body>
		<header>
			<h1 class="hidden">Lo&iuml;c Tramis - Version beta</h1>
			<div>
    			<figure>
    				<img src="../img/logo_main.png" alt="Main logo" height="50">
    				<figcaption class="hidden">Entropy</figcaption>
    			</figure>
			</div>
		</header>
		<nav>
    		<div class="nav-div">
    			<ul>
    				<li class="sliding-middle-out">
    					<a href="../index.php"><i class="fa fa-home"></i>Accueil</a>
    				</li>
    				<li class="sliding-middle-out">
    					<a href="../l2index/index.php" <?php echo (($folder_name == "l2index" || $folder_name == "l2trainig" || $folder_name == "l2project") ? $style : ""); ?>><i class="fa fa-book"></i>Licence 2</a>
    				</li>
    				<li class="sliding-middle-out">
    					<a href="../l3index/index.php" <?php echo (($folder_name == "l3index" || $folder_name == "l3database" || $folder_name == "l3advance" || $folder_name == "l3project") ? $style : ""); ?>><i class="fa fa-archive"></i>Licence 3</a>
    				</li>
    				<li class="sliding-middle-out">
    					<a href="../misc/index.php" <?php echo (($folder_name == "misc" || $folder_name == "miscjs" || $folder_name == "miscangular" ||$folder_name == "miscnode") ? $style : ""); ?>><i class="fa fa-inbox"></i>Hors Programme</a>
    				</li>
    				<li class="logo-entropy">
    					<figure>
    						<img src=<?php echo $logo;?> alt="home">
    					<figcaption class="hidden">Bike</figcaption>
    					</figure>
    				</li>
    				<?php
    				// session open or user/admin is log in
    				if (isset($_SESSION['login']) || is_connected("../files/secure_data.csv")) {
    				    // the admin is logged in
    				    if ($_SESSION['login'] == "Entropy") {
    				        echo "	<li class=\"nav-session\">
        									<a href=\"../account/index.php\" ".(($folder_name == "account") ? $style : "").">
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
        									<a href=\"../account/index.php\" ".(($folder_name == "account") ? $style : "").">
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
    							     <a href=\"../account/index.php\" ".(($folder_name == "account") ? $style : "").">Connectez-vous<i class=\"ion-power\" style=\"text-shadow: 0px 0px 3px #aaa;\"></i></a>
    							</li>";
    				}
    				?>
    			</ul>
			</div>
		</nav>
