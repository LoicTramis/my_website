<?php


function helloLoop($end) {
	echo "<ul class=\"loop\">\n";

	for($i = 0; $i < $end; $i++) {
		echo "<li style=\"display: block;\">hello num&eacute;ro ".$i." </li>\n";
	}
	echo "</ul>\n";
}

function timeDate() {
	echo "<p class=\"content\">Nous sommes le ".date("d/m/Y")." et il est ".date("H:i:s.")."</p>\n";
}

function hexecho() {
	echo "<p class=\"content\">";
	
	// display the 16 figures of the hexa base
	for($index = 0; $index < 16; $index++) {
		echo dechex($index)." ";
	}
	echo "</p>\n";
}

function hexprint() {
	echo "<p class=\"content\">";
	
	// display the 16 figures of the hexa base
	for($index = 0; $index < 16; $index++) {
		printf('%x ', $index);
	}
	echo "</p>\n";
}

function multiplicationTable($size=10) {
	echo "<table class=\"times\">";

	/* The head of the table */
	echo "<tr>";
	for($colum = 0; $colum <= $size ; $colum++) {
		if($colum == 0) {
			echo "<th>x";
		} else {
			echo "<th>".$colum;
		}
		echo "</th>";
	}
	echo "</tr>\n";


	for($colum = 1; $colum <= $size; $colum++) {
		echo "<tr>";
			
		for($line = 0; $line <= $size; $line++) {
			if($line == 0) {
				echo "<td style=\"font-weight: bold; background-color: #6ab8c8;\">".$colum."</td>";
			} else {
				echo "<td>".$colum * $line."</td>";
			}
		}
		echo "</tr>\n";
	}
	echo "</table>\n";
}

function asciiTable(){
		echo "<table class=\"ascii\">
				<tr>
				<th>&nbsp;</th>\n";
		
		// the header of the table
		for($colum = 0; $colum < 16; $colum++) {
			printf("<th>%X</th>\n", $colum);
		}
		echo "</tr>\n";		
		
		// set the table
		for($line = 2; $line <= 7; $line++) {
			// the first colum is filled with numbers
			echo "<tr> <td class=\"sideColum\">".$line."</td>\n";
			
			for($colum = 0; $colum < 16; $colum++) {
				// we start at the 32nd character
				$ascii = $line*16+$colum;
				// set the class for the css
				$classNumber = "basic";
			
				// If the character is a number,
				if($ascii >= 48 && $ascii <= 57) {
					$classNumber = "number";
				
				// or an uppercase letter,
				} elseif($ascii >= 65 && $ascii <= 90) {
					$classNumber = "uppercase";
				
				// or a lowercase letter.
				} elseif($ascii >= 97 && $ascii <= 122) {
					$classNumber = "lowercase";
				}
				
				$charAscii = htmlentities(chr($ascii),ENT_DISALLOWED);
				echo "<td class=\"".$classNumber."\">".$charAscii."</td>\n";
			}
			echo "</tr>\n";
		}
		echo "</table>\n";
}

function returnAsciiTable() {
	$asciiHTML = asciiTable();
	
	return $asciiHTML;
}
	
/**
	 * Function uses in the coloPalette to determine the luminance of the color.
	 * Formula details explained here : http://en.wikipedia.org/wiki/SRGB#Specification_of_the_transformation
	 * 
	 * @return String the color - black if too bright or white if too dark according to the threshold.
	 */
function getTextColor($redColor, $greenColor, $blueColor, $threshold) {
		// Linear canal of the sRGB colors
		$redRGB = $redColor / 255;
		$greenRGB = $greenColor / 255;
		$blueRGB = $blueColor / 255;
	
		// linear colors for the formula
		$redLinear = pow(($redRGB + 0.055) / 1.055, 2.4);
		$greenLinear = pow(($greenRGB + 0.055) / 1.055, 2.4);
		$blueLinear = pow(($blueRGB + 0.055) / 1.055, 2.4);
	
		//the formula
		$luma = (0.2126 * $redLinear + 0.7152 * $greenLinear + 0.0722 * $blueLinear) * 100;
	
		// if the result is below the threshold then return white, otherwise black
		return ($luma <= $threshold ? "white" : "black");
	}

// Without the form the variable will still have a default value
function colorPalette($threshold=25) {
		// initialize all variables
		$redText = $greenText = $blueText = hexdec(33); // base value with which the rgbCounter will be increment		
		$redCounter = $greenCounter = $blueCounter = 0; 
		$redColor = $greenColor = $blueColor = 0;
	
		echo "<table>";
		for ($line = 0 ; $line < 18; $line++) {				
			echo "<tr>";
				
			// Reset the green counter and increments the red counter every 3 lines.
			if ($line % 3 == 0 && $line > 0) {
				$greenCounter=0;
				$redCounter++;
			}
				
			$blueCounter=0;  // reset the blue counter each line
			for ($colum = 0; $colum < 12; $colum++) {
	
				// Reset the blue counter and increment the green one, if the loop is halfway the table
				if ($colum == 6) {
					$blueCounter=0;
					$greenCounter++;
				}
				
				// rgbColor are the final result, they contains 
				$redColor = $redText * $redCounter;
				$greenColor = $greenText * $greenCounter;
				$blueColor = $blueText * $blueCounter;
	
				// display the text, the text color and the background-color
				// if the dechex function returns a value with 1 figure add a 0
				echo "<td class =\"colorWeb\" style=\"background-color: #".(dechex($redColor) == '00' ? ('0'.dechex($redColor)) : dechex($redColor))
																		  .(dechex($greenColor) == '00' ? ('0'.dechex($greenColor)) : dechex($greenColor))
																		  .(dechex($blueColor) == '00' ? ('0'.dechex($blueColor)) : dechex($blueColor))."; color:".getTextColor($redColor, $greenColor, $blueColor, $threshold).";\">#";
				printf('%02X', $redColor);
				printf('%02X', $greenColor);
				printf("%02X</td>\n", $blueColor);
				$blueCounter++;
			}
			$greenCounter++;
			echo "</tr>\n";
		}
		echo "</table>\n";
}

function returnColorPalette() {
	$paletteHTML = colorPalette();
	
	return $paletteHTML;
}

function baseTable($current ,$mode="up") {
	// 1024 bits is the limit for x32 architecture
	$end = 1023;
	// if the parameter is greater than 50, put 50 for the table
	if($current <= $end) {
		$end = $current;
	} 
	// --- VERTICAL MODE ---
	if($mode == "up") {
		// header of the table
		echo "<table class=\"baseUp\">
				<tr style=\"background-color: #6ab8c8;\">
					<th>Binaire</th>
					<th>Octal</th>
					<th>D&eacute;cimal</th>
					<th>H&eacute;xad&eacute;cimal</th>
				</tr>\n";

		// alternate the background-color (light grey / very light grey)
		for($line = 1; $line <= $end; $line++) {
			// Alternate color/background-color per line
			if ($line % 2 == 0) {
				$color="#777";
				$bcolor="#e6e6e6";
			} else {
				$color="black";
				$bcolor="#d5d5d5";
			}
			// print the different value with the alternate color/background-color
			echo "<tr style=\"color: ".$color."; background-color: ".$bcolor.";\">";
			printf("<td>%08d</td>", decbin($line));
			printf("<td>%02d</td>", decoct($line));
			printf("<td>%02d</td>", $line);
			printf("<td>%02s</td>", dechex($line));
			echo "</tr>\n";
		}
		echo "</table>\n";
	} else {
		// --- HORIZONTAL MODE ---
		echo "<table class=\"baseDown\">";
		
		// 4 bases thus 4 lines
		for ($line = 0; $line < 4; $line++) {
			// n colums
			for ($colum = 1; $colum <= $end; $colum++) {
				// Alternate color/background-color per line
				if ($colum % 2 == 0) {
					$color="#777";
					$bcolor="#e6e6e6";
				} else {
					$color="black";
					$bcolor="#d5d5d5";
				}
				
				// The first colum (== 0) is for the name, with some colors
				// Every line is different, so we must indicate which one is the first, the second...
				switch ($line) {
					// The first line
					case 0:
						// For the first cell, we indicate the name
						if ($colum == 1) {
							echo "<tr><td style=\"background-color: #6ab8c8;\">Binaire</td>";
						}
						// Display the number
						printf("<td style=\"color: ".$color."; background-color: ".$bcolor.";\">%08d</td>\n", decbin($colum));
						break;
					// The second line
					case 1:
						// The name
						if ($colum == 1) {
							echo "<tr><td style=\"background-color: #6ab8c8;\">Octal</td>";
						}
						// Display the number
						printf("<td style=\"color: ".$color."; background-color: ".$bcolor.";\">%02d</td>\n", decoct($colum));
						break;
					// The third line
					case 2:
						//The name
						if ($colum == 1) {
							echo "<tr><td style=\"background-color: #6ab8c8;\">D&eacute;cimal</td>\n";
						}
						// Display the number
						printf("<td style=\"color: ".$color."; background-color: ".$bcolor.";\">%02d</td>\n", $colum);
						break;
					// The fourth line
					case 3:
						// The name
						if ($colum == 1) {
							echo "<tr><td style=\"background-color: #6ab8c8;\">H&eacute;xad&eacute;cimal</td>";
						}
						// Display the number
						printf("<td style=\"color: ".$color."; background-color: ".$bcolor.";\">%02s</td>\n", dechex($colum));
						break;
					// Just in case
					default:
						echo "<td>NaN</td>";
					break;
				}			
			}
		echo "</tr>\n";
		}		
	echo "</table>\n";
	}	
}

function td7info() {
	// beginning of the HTML page
	echo "
<!DOCTYPE html>

<html>
	<head>
		<title>Lo&iuml;c Tramis - UCP</title>
		<meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\">
		<style>
			body {
				margin-left: 300px;
			}
			th, td {
				border: 1px solid black;			
			}
			th {
				background-color: #6ab8c8;
			}
		</style>
	</head>
	<body>
		<section>
			<h2>Fonctions</h2>
			<article>
				<h3>Boucle</h3>";
				// call some functions
				helloLoop(10);
	echo "</article>
			<article>
				<h3>Date</h3>";
				timeDate();
	echo "</article>
			<article>
				<h3>Conversion</h3>";
				hexecho();hexprint();
	echo "</article>
			<article>
				<h3>Table de multiplication</h3>";
				multiplicationTable(10);
	echo "</article>
		</section>
	</body>

</html>";
// end of the HTML page
}
/**
 * Get the name of the browser
 * 
 * @return string The name of the browser
 */
function getBrowserName() {
	// Get many informations about the browers
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	
	// Default value
	$browser = "Unknown Browser";
	
	// The most use browsers
	$browser_array  =   array(
			'/msie/i'		=>'Internet Explorer',
			'/firefox/i'	=>'Firefox',
			'/safari/i'		=>'Safari',
			'/chrome/i'		=>'Chrome',
			'/edge/i'		=>'Edge',
			'/opera/i'		=>'Opera', //Opera uses both names "opera" and "OPR"
			'/OPR/i'		=>'Opera',
			'/netscape/i'	=>'Netscape', // Not so used
			'/maxthon/i'	=>'Maxthon',
			'/konqueror/i'	=>'Konqueror',
			'/mobile/i'		=>'Handheld Browser' // Smartphones
	);
	
	// Read through the array and for each key...
	foreach ($browser_array as $regex => $value) {
		// ...check if the HTML client informations match with one of the key in the array
		if (preg_match($regex, $user_agent)) {
			// then affect the value to the varible
			$browser = $value;
		}			
	}
	return $browser;
}

/**
 * Return the web browser icon of the current browser.
 * 
 * @param string $browser
 * @return string The path of the icon
 */
function getBrowserIcon($browser) {
	$icons = array(
			'Internet Explorer'	=>"../img/web_icon/ie.png",
			'Firefox' 			=>"../img/web_icon/firefox.png",
			'Safari' 			=>"../img/web_icon/safari.png",
			'Chrome' 			=>"../img/web_icon/chrome.png",
			'Edge' 				=>"../img/web_icon/edge.png",
			'Opera' 			=>"../img/web_icon/opera.png",
			'Netscape' 			=>"../img/web_icon/netscape.png",
			'Maxthon' 			=>"../img/web_icon/maxthon.png",
			'Konqueror' 		=>"../img/web_icon/konqueror.png",
			'Handheld Browser'	=>"../img/web_icon/phone.png",
			'Unknown Browser'	=>"../img/web_icon/browser.png",
			
	);
	return $icons[$browser];
}

function split_url($url) {
	// return the url onto different informations
	$splited = parse_url($url);
	
	// split all the url informations with '.' as separator
	$host = explode('.',$splited['host']);
	$publicHyperText = $host[0]; // Ex: www
	$organism = $host[1]; // Ex: google
	$tld = $host[2]; // Ex: com
	
	// names of the TLD
	$tldNames = array(
			'fr'	=>	'France',
			'com'	=>	'Commercial',
			'net'	=>	'Network',
			'org'	=>	'Organisme',			
	);
	// get the protocole
	$scheme = $splited['scheme'];
	
	return "	<p class=\"info\">Le protocole : <em>".$scheme."</em></p>
				<p class=\"info\">Le TLD : <em>".$tldNames[$tld]."</em></p>
				<p class=\"info\">L'organisme : <em>".$organism."</em></p>
				<p class=\"info\">Le nom de la machine : <em>".$publicHyperText."</em></p>";
	
}

/**
 * Return chmod information from octal values.
 * Ex: 777 => - rwx rwx rwx  
 * 
 * @param unknown $chmod
 * @param string $type
 * @return string
 */
function chmod_info($chmod, $type="file") {
	$file = "- ";

	if ($type !== "file") {
		$file = "d ";
	}

	$user = $chmod[0];
	$group = $chmod[1];
	$others = $chmod[2];

	$user_right	= chmod_get_right($user);
	$group_right = chmod_get_right($group);
	$others_right = chmod_get_right($others);
	$chmod_right = $file.$user_right." ".$group_right." ".$others_right;

	return $chmod_right;
}

/**
 * Return understanding informations about chmod from octal values.
 * 
 * @param unknown $chmod
 * @param string $type
 * @return string
 */
function chmod_info_spec($chmod, $type="file") {
	$file = "- ";

	if ($type !== "file") {
		$file = "d ";
	}

	$user = $chmod[0];
	$group = $chmod[1];
	$others = $chmod[2];

	$user_right	= chmod_get_right($user);
	$group_right = chmod_get_right($group);
	$others_right = chmod_get_right($others);

	// Get the specification of the "x" for each member
	// 1,2 and 3 are for determine the type of member (1 -> user, 2-> group, 3-> others)
	$user_spec = chmod_get_spec($user, $file, 1);
	$group_spec = chmod_get_spec($group, $file, 2);
	$others_spec = chmod_get_spec($others, $file, 3);

	$member_spec = $user_spec.$group_spec.$others_spec;
	$chmod_right = $file.$user_right." ".$group_right." ".$others_right;

	return $chmod_right.$member_spec;
}

/**
 * Function for the chmod_info method
 * Converts a octal value into binary value, then return the matching chmod right.
 * Example: 123 => 001 010 111 => --x -w- rwx
 * 
 * @param unknown $octal
 * @return string
 */
function chmod_get_right($octal) {
	$right = "";
	
	// First, convert the octal to binary and add zeros if necessary 
	$bin = sprintf("%03b",$octal);

	// array of 3 bits for separate treatment
	$bits = array(
			0	=>	$bin[0],
			1	=>	$bin[1],
			2	=>	$bin[2],
	);
	
	// for each bits on the binary number
	foreach ($bits as $key => $value) {
		// if the bit is 1 or 0
		switch ($key) {
			case 0:
				if ($value == 1) {
					$right .= "r";
				} else {
					$right .= "-";
				}
				break;
			case 1:
				if ($value == 1) {
					$right .= "w";
				} else {
					$right .= "-";
				}
				break;
			case 2:
				if ($value == 1) {
					$right .= "x";
				} else {
					$right .= "-";
				}	
				break;
			default:
				$right .= "";
				break;
		}
	}
	return $right;
}

/**
 * Tell the specification for a file or a folder (execute or recurse).
 * Return the result if the octal value contains a 1 (i.e. 1, 3, 5 and 7).
 * 
 * @param int $octal - chmod value
 * @param string $type - file or folder ( "-" or "d" )
 * @param int $member - 1 for user, 2 for group, 3 for others
 * @return string
 */
function chmod_get_spec($octal, $type="- ", $member) {
	// CSS : 0 means invalid chmod, so different class for it
	if ($octal == 0) {
		$class = "warning";
	} else {
		$class = "info";
	}
	
	$right = "<p class=\"".$class."\">";
	$spec = "";
	// First, convert the octal to binary and add zeros if necessary
	$bin = sprintf("%03b",$octal);
	// array of 3 bits for separate treatment
	$bits = array(
			0	=>	$bin[0],
			1	=>	$bin[1],
			2	=>	$bin[2],
	);
	// Array for the type of the member
	$members = array(
			1	=>	"le propri&eacute;taire,",
			2	=>	"le group,",
			3	=>	"les autres.",
	);	
	
	// for each bits on the binary number
	foreach ($bits as $key => $value) {
		// if the bit is 1 or 0
		switch ($key) {
			case 0:
				if ($value == 1) {
					$class = "info";
					$right .= "<em>lecture,</em> ";
				}
				break;
			case 1:
				if ($value == 1) {
					$class = "info";
					$right .= "<em>&eacute;criture,</em> ";
				}
				break;
			default:
				$right .= "";
				break;
		}
	}
	
	// If the chmod for the user contains "x"
	if ($octal == 1 || $octal == 3 || $octal == 5 || $octal == 7) {
		// A file
		if ($type == "- ") {
			$spec = "et <em>&eacute;x&eacute;cutable</em> ";
			// A folder
		} else {
			$spec = "et <em>traversable</em> ";
		}
	} elseif ($octal == 0) {
		$right .= "<em>Aucun droit</em> ";
	}
	$spec .= "pour <strong>".$members[$member]."</strong></p>";
	
	return $right.$spec;
}

/**
 * ! ONLY WORKS FOR FORMS !. 
 * Return 3 octal values from a checkbox table.
 */
function chmod_octal_form() {

	// Array that contains all the name of the input element of the form
	$mode = array("read1","read2","read3","write1","write2","write3","execute1","execute2","execute3");
	$user = $group = $others = 0; // set variables to 0
	
	// run through all the value in the array that corresponds to the checkbox
	foreach ($mode as $value) {
		if (isset($_GET[$value]) ) {
			// we look at the last letter, 1 for user, 2 for group, 3 for others
			switch (substr($value, -1)) {
				case 1:
					$user += $_GET[$value]; // add the octal value for user if the checkbox is checked
					break;
				case 2:
					$group += $_GET[$value];  // add the octal value for group if the checkbox is checked
					break;
				case 3:
					$others += $_GET[$value];  // add the octal value for others if the checkbox is checked
					break;
						
				default:
					break;
			}
		}
	}
	// 000 is not really interesting to display
	if ($user == 0 && $group == 0 && $user == 0) {
		return "<p class=\"warning\"><em>ATTENTION !</em> Seul la racine peut lire et &eacute;crire. <em>(000)</em></p>";
	} else {
		return "<p class=\"info\">La valeur &agrave; utiliser est <em>".$user.$group.$others."</em>.</p>";
	}
}

// =======================
//			TD 12
// =======================

/**
 * Get the name or the value of the fruits from the csv file 'vitamin_c.csv'
 * 
 * @param boolen $bool - The name or the value
 * @return array - An array of the name or value of each fruit
 */
function get_vitamin_c_fruit_names($bool) {
	$data_file = fopen("../files/vitamin_c.csv", 'r'); // open the file for reading only
	$fruits = array();
	$line = 0;	
	$colum = 1;
	
	// get the name of the fruit
	if ($bool) {
		$colum = 0;
	}
	
	while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
		
		// Skip the titles (first line)
		if ($line > 0) {
			array_push($fruits, utf8_encode($data[$colum]));
		}		
		$line++;
	}
	fclose($data_file);
	
	return $fruits;
}

/**
 * Get the amount of vitamin C for a fruit
 * 
 * @param unknown $fruit - The name of the fruit
 * @return mixed - The amount of vitamin C
 */
function get_vitamin_c_amount_by_fruit($fruit) {
	$data_file = fopen("../files/vitamin_c.csv", 'r'); // open the file for reading only
	$line = 0;
	$amount = 0;
	
	while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
		
		// Skip the titles (first line)
		if ($line > 0 && $data[0] == utf8_decode($fruit)) {
			$amount = $data[1];
		}
		$line++;
	}
	fclose($data_file);
	
	return $amount;
}

/**
 * Get the value max in an array
 * 
 * @param unknown $array
 * @return number|unknown
 */
function get_max_value($array) {
	$max = 0;
	
	for ($index = 0; $index < count($array); $index++) {
		if ($array[$index] > $max) {
			$max = $array[$index];
		}
	}
	return $max;
}

/**
 * Get the length max of a word in an array
 * 
 * @param unknown $array
 * @return number|unknown
 */
function get_max_word($array) {
	$max = 0;
	
	for ($index = 0; $index < count($array); $index++) {
		if (strlen($array[$index]) > $max) {
			$max = strlen($array[$index]);
		}
	}
	return $max;
}

/**
 * Get the fill and stroke color for a fruit
 * 
 * @param string $fruit - The name of the fruit
 * @param boolean $fill
 * @return string
 */
function get_fruit_color($fruit, $fill = TRUE, $rgb = FALSE) {
	// colors for each fruits
	// pattern : array(names => array(hexadecimal colors, arrayrbg colors)));
	$colors = array(
			"Acérola"							=>	array("#ffb31a","#e60000", array(255,179,26), array(230,0,0)),
			"Goyave"							=>	array("#ff99cc","#8dd775", array(255,153,204), array(141,215,117)),
			"Persil"							=>	array("#009933","#009933", array(0,153,51), array(0,153,51)),
			"Fraise"							=>	array("#ffcccc","#ff3333", array(255,204,204), array(255,51,51)),
			"Kiwi"								=>	array("#59cc33","#c68039", array(29,204,51), array(198,128,57)),
			"Orange"							=>	array("#ff9900","#ff8000", array(255,153,0), array(255,128,0)),
			"Citron (jaune)"					=>	array("#ffff99","#f9f906", array(255,255,153), array(249,249,6)),
			"Citron (vert)"						=>	array("#8cf91f","#66cc00", array(140,249,31), array(102,204,0)),
			"Pomme de terre cuite (au four)"	=>	array("#eec72b","#ee8c2b", array(238,199,43), array(238,140,43)),
			"Pomme de terre cuite (à l'eau)"	=>	array("#eec72b","#eec72b", array(238,199,43), array(238,199,43))		
	);
	
	if (key_exists($fruit, $colors)) {
		// get the fill color
		if ($fill === TRUE && $rgb == FALSE) {
			return $colors[$fruit][0];
		// get the stroke color
		} elseif ($fill == FALSE && $rgb == FALSE) {
			return $colors[$fruit][1];
		// get the rgb color
		} elseif ($fill == TRUE && $rgb == TRUE) {
			return $colors[$fruit][2];
		} else {
			return $colors[$fruit][3];
		}
	// if fruits have been added to the file
	} elseif ($rgb == FALSE) {
		return "#dddddd";
	} else {
		return array(204,204,204);
	}
	
}
/**
 * Build a svg grahp-bar image.
 * 
 * @param unknown $total_elements
 * @param unknown $array_values
 * @param unknown $array_names
 * @param unknown $sort
 * @return string
 */
function build_svg_graph($total_elements, $array_values, $array_names) {
	$height = $total_elements * 28 + 4; // 28px = 20px width + 4px borders + 4px spacing + 1px x axe
	$width = (get_max_value($array_values) * 1.2);
	$max_length_word = get_max_word($array_names); // the length of the word
	
	
	$graph = "<svg width=\"$width\" height=\"$height\">
				<line	x1=\"".($max_length_word * 8)."\" y1=\"0\" 
						x2=\"".($max_length_word * 8)."\" y2=\"".($total_elements * 26 + 4)."\"
						style=\"stroke:rgb(0,0,0);stroke-width:1px\" />\n
				<line	x1=\"".($max_length_word * 8)."\" y1=\"".($total_elements * 26 + 4)."\"
						x2=\"".($width - $max_length_word)."\" y2=\"".($total_elements * 26 + 4)."\"
						style=\"stroke:rgb(0,0,0);stroke-width:1px\" />\n
				<text text-anchor=\"middle\" x=\"".($width / 2)."\" y=\"".($total_elements * 28)."\" fill=\"\">Teneur en vitamine C (mg/100g)</text>\n";
	
	for ($index = 0; $index < $total_elements; $index++) {		
		$amount = ceil(get_vitamin_c_amount_by_fruit($array_names[$index]));
		$graph .= "	<text text-anchor=\"end\" x=\"".($max_length_word * 8 - 6)."\" y=\"".($index * 26 + 20)."\" fill=\"black\">".$array_names[$index]."</text>
					<text text-anchor=\"start\" x=\"".($max_length_word * 8 + $amount + 10)."\" y=\"".($index * 26 + 20)."\" fill=\"black\">$amount</text>
					
					<rect x=\"".($max_length_word * 8 + 6)."\" y=\"".($index * 26 + 4)."\" rx=\"0\" ry=\"0\"
						width=\"$amount\"
						height=\"20\"
						style=\"fill: ".get_fruit_color(utf8_decode($array_names[$index])).";
								stroke: ".get_fruit_color(utf8_decode($array_names[$index]), FALSE).";
								stroke-width: 2px\"/>\n";
	}
	$graph .= "</svg>";
	return $graph;
}

function build_png_64_graph() {
	$fruit_names = get_vitamin_c_fruit_names(TRUE);
	$fruit_values = get_vitamin_c_fruit_names(FALSE);
	$total_fruits = count($fruit_names);
	$path = "../img/vitamin_c_graph_v2.png";
	
	$width = get_max_value($fruit_values) * 1.2;
	$height = $total_fruits* 28 + 4;
	$max_length_word = get_max_word($fruit_names);
	
	$image = imagecreate($width, $height);
	$background_color = imagecolorallocate($image, 255, 255, 255);
	$black = imagecolorallocate($image, 80, 80, 80);
	
	// Vertical line
	imageline($image, $max_length_word * 8, 0, $max_length_word * 8, ($total_fruits * 26) + 4, $black);
	// Horizontal line
	imageline($image, $max_length_word * 8, ($total_fruits* 26) + 4, $width - $max_length_word, ($total_fruits* 26) + 4, $black);
	// Subtitle
	imagestring($image, 3, $width / 2, $total_fruits * 27, "Teneur en vitamine C (mg/100g)", $black);
	
	for ($index = 0; $index < $total_fruits; $index++) {
		$amount = ceil(get_vitamin_c_amount_by_fruit($fruit_names[$index]));
		$colors_fill = get_fruit_color(utf8_decode($fruit_names[$index]),TRUE, TRUE);
		$colors_stroke = get_fruit_color(utf8_decode($fruit_names[$index]),FALSE, TRUE);
		
		$color_stroke = imagecolorallocate($image, $colors_stroke[0], $colors_stroke[1], $colors_stroke[2]);
		$color_fill = imagecolorallocate($image, $colors_fill[0], $colors_fill[1], $colors_fill[2]);
		imagestring($image, 4, 5, ($index * 26) + 7, utf8_decode($fruit_names[$index]), $black);
		imagestring($image, 4, ($max_length_word * 8) + $amount + 10, ($index * 26) + 8, $amount, $black);
		
		imagerectangle($image, $max_length_word * 8 + 6, $index * 26 + 4, ($max_length_word * 8 + 6) + $amount,  $index * 26 + 4 + 20, $color_stroke);
		imagefilledrectangle($image, $max_length_word * 8 + 7, $index * 26 + 5, ($max_length_word * 8 + 5) + $amount,  $index * 26 + 3 + 20, $color_fill);
	}
	imagecolortransparent($image, $background_color);
	
	ob_start();
	imagepng($image);
	imagepng($image, $path); // Can we do that?
	
	$embedded_data = ob_get_contents();
	
	imagedestroy($image);
	
	ob_end_clean();
	
	return $embedded_data;
}
?>
