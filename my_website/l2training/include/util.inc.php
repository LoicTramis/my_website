<?php

$global_visits = visits(); // global variable for the number of visits
$global_random; // global for the random generated number for the planets

// If there is no super-global variable defined then french
if (empty($_GET['lang'])) {
	$lang = "fr";
} else {
	$lang = $_GET['lang'];
}

function today() {
	global $lang;
	
	// French
	if ($lang == "fr") {
		// French days, starting with Sunday
		$days = array(
				0 =>"dimanche",
				1 =>"lundi",
				2 =>"mardi",
				3 =>"mercredi",
				4 =>"jeudi",
				5 =>"vendredi",
				6 =>"samedi",
		);

		// French months
		$months = array(
				1 =>"janvier",
				2 =>"f&eacute;vrier",
				3 =>"mars",
				4 =>"avril",
				5 =>"mai",
				6 =>"juin",
				7 =>"juilet",
				8 =>"ao&ucirc;t",
				9 =>"septembre",
				10 =>"octobre",
				11 =>"novembre",
				12 =>"d&eacute;cembre",
		);
		// The date on the format : "day X month YEAR"
		$today = $days[date("w")]." ".date("j")." ".$months[date("n")]." ".date("Y");
	} elseif ($lang == "en"){
		// days, starting with Sunday
		$days = array(
				0 =>"Sunday",
				1 =>"Monday",
				2 =>"Tuesday",
				3 =>"Wednesday",
				4 =>"Thursday",
				5 =>"Friday",
				6 =>"Saturday",
		);
		// months
		$months = array(
				1 =>"January",
				2 =>"February",
				3 =>"March",
				4 =>"April",
				5 =>"May",
				6 =>"June",
				7 =>"July",
				8 =>"August",
				9 =>"September",
				10 =>"October",
				11 =>"November",
				12 =>"December",
		);
		// The date on the format : "day, month X, YEAR"
		$today = $days[date("w")].", ".$months[date("n")].date(" j").", ".date("Y");
	}
	return $today;
}

/**
 * Get the current day on this format : DaysMonth without zeros.
 * Exemple : 16 for June the 1st,
 * 2610 for October the 26th.
 *
 * @return string - A formatting current date
 */
function getLongCurrentDay() {
	return date("jnY");
}

/**
 * Get the current month without zeros.
 * Example : 5 for May, 10 for October
 * 
 * @return string - The current month
 */
function getCurrentMonth() {
	return date('n');
}

/**
 * Get the current year with 4 digits. Ex: 1990, 2018
 * 
 * @return string - the current year
 */
function getCurrentYear() {
	return date('Y');
}

function getMonth($month, $lang = "fr") {
	// French months
	
	if ($lang == "fr") {
		$months = array(
				1 =>"Janvier",
				2 =>"F&eacute;vrier",
				3 =>"Mars",
				4 =>"Avril",
				5 =>"Mai",
				6 =>"Juin",
				7 =>"Juilet",
				8 =>"Ao&ucirc;t",
				9 =>"Septembre",
				10 =>"Octobre",
				11 =>"Novembre",
				12 =>"D&eacute;cembre",
		);
	} else if ($lang == "en") {
		// months
		$months = array(
				1 =>"January",
				2 =>"February",
				3 =>"March",
				4 =>"April",
				5 =>"May",
				6 =>"June",
				7 =>"July",
				8 =>"August",
				9 =>"September",
				10 =>"October",
				11 =>"November",
				12 =>"December",
		);		
	}
	return $months[$month];
}

function getShortDay($day, $lang) {
	global $lang;
	
	// French days
	if ($lang == "fr") {
		$days = array(
				0 =>"Lu",
				1 =>"Ma",
				2 =>"Me",
				3 =>"Je",
				4 =>"Ve",
				5 =>"Sa",
				6 =>"Di",
		);
	// English days
	} elseif ($lang == "en") {	
		$days = array(
				0 =>"Mon",
				1 =>"Tue",
				2 =>"Wed",
				3 =>"Thu",
				4 =>"Fri",
				5 =>"Sat",
				6 =>"Sun",
		);
	}	
	return $days[$day];
}
/**
 * Display the calendar for a given month and a given year.
 *
 * @param unknown $month - The month
 * @param unknown $year - The year
 */
function one_month_calendar($month, $year) {
	global $lang;
	$current_bcolor = "red";
	$dayNumber = cal_days_in_month(CAL_GREGORIAN, $month, $year); // get the total number of the day in the month
	$bcolor = "white";
	$current_calendar = "";
	$current_calendar .= "<table class=\"headcal\">
			 <tr>
    			<th colspan=\"7\" style=\"border: none; font-weight: bold; background-color: #9c88e0;\">".getMonth($month, $lang)."</th>
  			</tr>
			<tr>\n";
	// Display the days of the week
	for ($index = 0; $index < 7; $index++) {
		// Sateurday and Sunday are background-colored
		if ($index == 6 || $index == 5) {
			$bcolor = "#CCC";
		}
		$current_calendar .= "<td style=\"font-weight: bold; background-color: #3399ff;\">".getShortDay($index, $lang)."</td>\n";
	}
	$current_calendar .= "</tr>\n";
	
	$row_counter = 0; // Count the line
	//  For every day of the month, converts the day on a julian day and convert this on a scale to 0 to 6
	for ($index = 1; $dayNumber >= $index; $index++ ) {
		$julian = cal_to_jd(CAL_GREGORIAN, $month, $index, $year);
		$weekDay = jddayofweek($julian);
		$bcolor = "white";
		
		// THE FIRST DAYS OF THE CALENDAR		
		if ($index == 1) {	
			$current_calendar .= "<tr>\n";
			// Saturdays and Sundays have different background-colors
			if ($weekDay == 0 || $weekDay == 6) {
				$bcolor = "#CCC"; 
				// Sunday is the 7th day, we start with Monday
				if ($weekDay == 0) {
					$weekDay = 7;
				}				
			}
			
			// Fill the cells before the first day of the month
			for ($previousDay = 0; $previousDay < $weekDay - 1; $previousDay++) {
				$current_calendar .= "<td style=\"border: none;\">&nbsp;</td>\n";
			}
			
			// If this is the current day
			if ($index.$month.$year == getLongCurrentDay()) {
				$current_calendar .= "<td style=\"background-color: ".$current_bcolor.";\">".$index."</td>\n";;
			} else {
				$current_calendar .= "<td style=\"background-color: ".$bcolor.";\">".$index."</td>\n";
 			}
			
		// THE OTHER DAYS OF THE CALENDAR
		} else {
			// Open a new line for Mondays
			if ($weekDay == 1) {
				$current_calendar .= "<tr>\n";
				$row_counter++; // count the lines of the table
			}
			// Sunday has a gray background-color
			if ($weekDay == 0 || $weekDay == 6) {
				$bcolor = "#CCC";
			}		
			
			// The current day has a gray background-color
			if ($index.$month.$year == getLongCurrentDay()) {
				$current_calendar .= "<td style=\"background-color: ".$current_bcolor.";\">".$index."</td>\n";;
			} else {
				$current_calendar .= "<td style=\"background-color:".$bcolor."\">".$index."</td>\n"; // On ajoute notre case
			}
			// Close the line for Sundays
			if ($weekDay == 0) {
				$current_calendar .= "</tr>\n";				
			}
			if ($index == $dayNumber && $weekDay != 0 ) {

				for ($nextDay = 1; $nextDay <= 7 - $weekDay; $nextDay++) {
						
					$current_calendar .= "<td style=\"border: none;\">&nbsp;</td>\n";
				}
				$current_calendar .= "</tr>\n";;
			}
		}
	}
	// If the number of the lines (after the first one) is 4, then we must add one line to even the months
	if ($row_counter == 4) {
		$current_calendar .= "<tr>";
		// Fill the remained cells
		for ($colums = 0; $colums < 7; $colums++) {
			$current_calendar .= "<td class=\"borderless\">&nbsp;</td>\n";			
		}
		$current_calendar .= "</tr>\n";
	}
	$current_calendar .= "</table>";
	
	return $current_calendar;
}

function year_calendar($year = 0, $format = 0) {
	$calendar = ""; // the final result
	$current_month = date('n'); 
	$current_year = date('Y'); 
	
	// DEFAULT PARAMETERS
	if ($year == 0 && $format == 0) {
		$calendar .= "	<table class=\"borderless\"><tr>";
		// If the current month is January, we have to check the year before
		if ($current_month == 1) {
			$calendar .= "	<td class=\"borderless\">".one_month_calendar(12, $current_year - 1)."</td>
							<td class=\"borderless\">".one_month_calendar($current_month, $current_year)."</td>
							<td class=\"borderless\">".one_month_calendar($current_month + 1, $current_year)."</td>";
		// If the current month is December, we have to check the year after
		} elseif ($current_month == 12) {
			$calendar .= "	<td class=\"borderless\">".	one_month_calendar($current_month - 1, $current_year)."</td>
							<td class=\"borderless\">".one_month_calendar($current_month, $current_year)."</td>
							<td class=\"borderless\">".one_month_calendar(01, $current_year + 1)."</td>";
		// The 3 months are in the same year
		} else {
			$calendar .= "	<td class=\"borderless\">".one_month_calendar($current_month - 1, $current_year)."</td>
							<td class=\"borderless\">".one_month_calendar($current_month, $current_year)."</td>
							<td class=\"borderless\">".one_month_calendar($current_month + 1, $current_year)."</td>";
		}
		$calendar .= "</tr></table>";
	// SPECIFIC YEAR - DEFAULT FORMAT
	} elseif ($year != 0 && $format == 0) {
		$month = 1; // Initial month to 1 for future incrementation
		$calendar .= "<table class=\"borderless\">
						<tr><th colspan=\"4\" style=\"border: none; font-weight: bold; background-color: #9c88e0;\">".$year."</th></tr>";
		// the table 3x4
		for ($row = 0; $row < 3; $row++) {
			$calendar .= "<tr>";
			
			for ($colum = 0; $colum < 4; $colum++) {
				// return 
				$calendar .= "<td class=\"borderless\">".one_month_calendar($month, $year)."</td>";
				$month++;
			}			
			$calendar .= "</tr>";
		}
		$calendar .= "</table>";
	// SPECIFIC YEAR AND FORMAT
	} else {
		$month = 1; // Initial month to 1 for future incrementation
		$formatted_width = 12/$format;
		
		$calendar .= "<table class=\"borderless\">
						<tr><th colspan=\"".$format."\" style=\"border: none; font-weight: bold; background-color: #9c88e0;\">".$year."</th></tr>";
		// the formatted 	table
		for ($row = 0; $row < $formatted_width; $row++) {
			$calendar .= "<tr>";
				
			for ($colum = 0; $colum < $format; $colum++) {
				// return
				$calendar .= "<td class=\"borderless\">".one_month_calendar($month, $year)."</td>";
				$month++;
			}
			$calendar .= "</tr>";
		}
		$calendar .= "</table>";
	}
	
	
	return $calendar;
}

/**
 * Calul how many times the website is refresh
 * Display in footer
 */
function visits() {
	global $global_visits;
	$number = "";
	$file = "../files/hits.txt";
	$currentCounter = 0;
	
	// No file : create a new file.
	if (!file_exists($file)) {
		$hits = fopen($file, 'x+'); // create a new file
		fwrite($hits, 0);
		// The file exists
	} else {
		$hits = fopen($file, 'c+'); // open the file without change
		$oldCounter = file_get_contents($file); // get the previous value
		fwrite($hits, ++$oldCounter); // write the new value
		$currentCounter = file_get_contents($file); // get the currant value
	}
	fclose($hits);

	return $global_visits = $currentCounter;
}

/**
 * Get the current UNIQUE number of the visits() function.
 *
 * @return number - the UNIQUE number
 */
function getVisits() {
	global $global_visits;
	return $global_visits;
}

/**
 * get some info of the planets according to its position in the solar system.
 * (Ex. : 3 for Earth)
 *
 * @param int $position - its position compare to the Sun
 * @param string $choices - which info in the array
 * @return string - the info of the planet
 */
function info_planet($planet, $choices) {
	// the array of "images"
	$solar_system = array(
			1	=>	array(
					"id"	=>	"mercury",
					"name"	=>	"Mercure",
					"fact"	=>	"Si le soleil &eacute;tait une orange, Mercure serait situ&eacute; &agrave; 4,5 m&egrave;tres
								 et aurait la largeur de 4 cheveux (~300&mu;m).",
			),
			2	=>	array(
					"id"	=>	"venus",
					"name"	=>	"V&eacute;nus",
					"fact"	=>	"Si le soleil &eacute;tait une orange, V&eacute;nus serait situ&eacute; &agrave; 8,5 m&egrave;tres
								 et aurait l'&eacute;paisseur de 10 feuilles de papier empil&eacute;es (~1mm).",
			),
			3	=>	array(
					"id"	=>	"earth",
					"name"	=>	"Terre",
					"fact"	=>	"Si le soleil &eacute;tait une orange, la Terre serait situ&eacute; &agrave; 11,6 m&egrave;tres
								 et aurait la diam&egrave;tre d'une aiguille &agrave; coudre (~1mm).",
			),
			4	=>	array(
					"id"	=>	"mars",
					"name"	=>	"Mars",
					"fact"	=>	"Si le soleil &eacute;tait une orange, Mars serait situ&eacute; &agrave; 18 m&egrave;tres
								 et aurait la taille d'un ovule humain (~0,5mm)",
			),
			5	=>	array(
					"id"	=>	"jupiter",
					"name"	=>	"Jupiter",
					"fact"	=>	"Si le soleil &eacute;tait une orange, Jupiter serait situ&eacute; &agrave; 61 m&egrave;tres
								 et aurait la taille d'un petit pois (~1cm)",
			),
			6	=>	array(
					"id"	=>	"saturn",
					"name"	=>	"Saturne",
					"fact"	=>	"Si le soleil &eacute;tait une orange, Saturne serait situ&eacute; &agrave; 112 m&egrave;tres
								 et aurait la hauteur d'une brique de Lego (anneaux exclus) (~1cm)",
			),
			7	=>	array(
					"id"	=>	"uranus",
					"name"	=>	"Uranus",
					"fact"	=>	"Si le soleil &eacute;tait une orange, Uranus serait situ&eacute; &agrave; 226 m&egrave;tres
								 et aurait la taille d'un p&eacute;pin de raisin (~3.7mm)",
			),
			8	=>	array(
					"id"	=>	"neptune",
					"name"	=>	"Neptune",
					"fact"	=>	"Si le soleil &eacute;tait une orange, Neptune serait situ&eacute; &agrave; 350 m&egrave;tres
								 et aurait la taille d'un p&eacute;pin de raisin (~3.4mm)",
			),
			9	=> 	array(
					"id"	=>	"pluto",  // sorry, not a planet anymore :/
					"name"	=>	"Pluton",
					"fact"	=>	"Ce n'est plus une plan&egrave;te, mais une plan&egrave;te naine (tout comme C&eacute;r&eacute;s
								 - entre Mars et Jupiter - &Eacute;ris, Mak&eacute;mak&eacute; et Haum&eacute;a).",
			),
	);
	return $solar_system[$planet][$choices];
}

/**
 * Generate a random number to choose a random image.
 *
 * @return string - the path of the png (or gif) image.
 */
function randomImage() {
	global $global_random;
	// random number in other words random image
	$random = rand(1, 9);

	// a gif for the earth
	if ($random == 3) {
		$planet = "../img/photos/earth_revolution.gif";
		// ohter planets
	} else {
		$planet = "../img/photos/".info_planet($random, "id").".png";
	}
	$global_random = $random;
	return $planet;
}

/**
 * Get the name and the fact of the planet with the random the number 
 * generate in the function randomImage above.
 * 
 * @param string $fact - No fact for the name ; Fact for the fact
 * @return string - the name or the fact of the planet
 */
function get_info_planet($fact="") {
	global $global_random; // random number generate above
	$info; // the name or the fact
	
	// get the name of the planet for the figcaption tag
	if ($fact == "") {
		$info = info_planet($global_random, "name");
	// get the fact of the planet for fun
	} elseif ($fact != "") {
		$info = info_planet($global_random, "fact");
	}
	return $info;
} 
?>