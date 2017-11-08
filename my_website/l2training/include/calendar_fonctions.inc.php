<?php
// The color of the current day
$currentDayColor = "silver";
define("CURRENT_MONTH", date('n')); // Current month
define("CURRENT_YEAR", date('Y')); // Current year

/**
 * Get the current day on this format : DaysMonth without zeros. 
 * Exemple : 16 for June the 1st, 
 * 2610 for October the 26th.
 * 
 * @return string - A formatting current date
 */
function getCurrentDay() {
	return date("jn");
}	

/**
 * Every month has a different color
 * 
 * @param unknown $month
 * @return string
 */
function getColor($month) {
	$index = $month - 1;	
	$colors = array("#F00","#804","#F60","#0C9","#C00","#099","#06C","#F93","#039","#600","#080","#3CF");
	
	return $colors[$index];
}

/**
 * Get the year on a specific format
 * @param unknown $year
 * @return string
 */
function getYear($year) {
	$format_year = number_format($year); // For the coma
	
	return '1'.$format_year;
}

/**
 * Get the month on uppercase
 * 
 * @param unknown $month
 * @return string
 */
function getUpperMonth($month) {
	$index = $month - 1;	
	$months = array("JANUARY","FEBRURARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER");
	
	return $months[$index];
}

/**
 * Get the day on a specific format
 * 
 * @param unknown $weekDay
 * @return string
 */
function getDay($weekDay) {
	$index = $weekDay;	
	$days = array("MON","TUE","WED","THU","FRI","SAT","SUN");
	
	return $days[$index];
}

/**
 * Fill the empty case at the beginning of the month
 * 
 * @param unknown $month
 * @param unknown $year
 */
function beforeCalendar($month, $year) {
	global $currentDayColor;
	$previousMonth = $month - 1;
	$previousYear = $year;
	$color = "grey";
	
	// if the previous month is december of the last year
	if ($previousMonth == 0) {
		$previousMonth = 12;
		$previousYear = $year - 1;
	}
	
	$dayNumber = cal_days_in_month(CAL_GREGORIAN, $previousMonth, $previousYear);
	$julian = cal_to_jd(CAL_GREGORIAN, $month, 1, $year);
	$weekDay = jddayofweek($julian);
	
	// Sunday is the seventh day
	if ($weekDay == 0) {
		$weekDay = 7;
	}	
	
	// For every day of the last month
	for ($index = $dayNumber - $weekDay +2; $index <= $dayNumber; $index++) {
		// If the current is display in the previous month
		if ($index.$previousMonth == getCurrentDay()) {
			echo "<td style=\"color:".$color."; background-color: ".$currentDayColor.";\">".$$indexi."</td>\n";
		} else {
			echo "<td style=\"color:".$color.";\">".$index."</td>\n";
		}
	}	
}

/**
 * Fill the empty case at the end of the month
 * 
 * @param unknown $month
 * @param unknown $year
 */
function afterCalendar($month, $year) {
	global $currentDayColor;
	$dayNumber = cal_days_in_month(CAL_GREGORIAN, $month, $year);	
	$julianDay = cal_to_jd(CAL_GREGORIAN, $month, $dayNumber, $year);
	$weekDay = jddayofweek($julianDay);
	$color = 'grey';
	
	// Fill the case after the last day of the month
	for ($lastDay = 1; $lastDay <= 7 - $weekDay ; $lastDay++) {
		// Sunday color is red
		if ($lastDay == 7 - $weekDay) {
			$color = getColor($month);
		}
		// If this is the current day
		if ($lastDay.$month + 1 == getCurrentDay()) {
			echo "<td style=\"color:".$color."; background-color: ".$currentDayColor.";\">".$lastDay."</td>\n";
		} else {
			echo "<td style=\"color:".$color.";\">".$lastDay."</td>\n"; // mettre les jours du mois suivants
		}
	}	
}

/**
 * Display the calendar for a given month and a given year.
 * 
 * @param unknown $month - The month
 * @param unknown $year - The year
 */
function calendar($month = CURRENT_MONTH, $year = CURRENT_YEAR) {
	global $currentDayColor;
	$dayNumber = cal_days_in_month(CAL_GREGORIAN, $month, $year); // get the total number of the day in the month	
	
	echo "<table class=\"calendar\">
			<tr>\n";
	// Display the days of the week
	for ($index = 0; $index < 7; $index++) {
		$color = 'black';
		// Sunday is colored
		if ($index == 6) {
			$color = getColor($month); 
		}
		echo "<th style=\"color:".$color."\">".getDay($index)."</th>\n";
	}
	echo "</tr>\n";
	//  For every day of the month, converts the day on a julian day and convert this on a scale to 0 to 6
	for ($index = 1; $dayNumber >= $index; $index++ ) {
		$julian = cal_to_jd(CAL_GREGORIAN, $month, $index, $year); 
		$weekDay = jddayofweek($julian);		
		$colorBot = 'black'; // default color
		// THE LAST DAYS OF THE CALENDAR (not the month)
		if ($index == $dayNumber) {			
			// A new line for monday
			if ($weekDay == 1) {				
				echo "<tr>\n";
			}
			// red color for Sunday
			if ($weekDay == 0) {
				$colorBot = getColor($month);
			}
			// black color otherwise
			if ($index.$month == getCurrentDay()) {
				echo "<td class=\"currentMonth\" style=\"color:".$colorBot."; background-color: ".$currentDayColor.";\">".$index."</td>\n";
			} else {
				echo "<td class=\"currentMonth\" style=\"color:".$colorBot."\">".$index."</td>\n"; //on créé la case et on ferme la ligne
			}
			
			// we stop at Sunday, display the beginning of the next month
			if ($weekDay != 0) {
				afterCalendar($month, $year);
			}			
			echo "</tr>\n";
		}
		// THE FIRST DAYS OF THE CALENDAR (not the month)
		else if ($index == 1) {
			$colorTop = "black";
			echo "<tr>\n";			

			beforeCalendar($month, $year); // display the days of the previous month
			// Sunday is the 7th day, we start with Monday (1)
			if ($weekDay == 0) {
				$weekDay = 7;
				$colorTop = getColor($month); // Sundays have different colors
			}
			// If this is the current day
			if ($index.$month == getCurrentDay()) {
				echo "<td class=\"currentMonth\" style=\"color:".$colorTop."; background-color: ".$currentDayColor.";\">".$index."</td>\n";;
			} else {
				echo "<td class=\"currentMonth\" style=\"color:".$colorTop."\">".$index."</td>\n";
			}
			// Close the line at Sunday
			if ($weekDay == 0) {
				echo "</tr>\n";
			}
		} else {
			// THE CURRENT DAY OF THE CALENDAR (Yes the actual month, not necessarily the current month though)
			$colorMiddle = "black";
			// Open a new line for Mondays
			if ($weekDay == 1) {
				echo "<tr>\n";
			}
			// Sunday has the color of the month
			if ($weekDay == 0) {
				$colorMiddle = getColor($month);
			}
			// The current day has a gray background-color
			if ($index.$month == getCurrentDay()) {
				echo "<td class=\"currentMonth\" style=\"color:".$colorMiddle."; background-color: ".$currentDayColor.";\">".$index."</td>\n";;
			} else {
				echo "<td class=\"currentMonth\" style=\"color:".$colorMiddle."\">".$index."</td>\n"; // On ajoute notre case
			}
			// Close the line for Sundays
			if ($weekDay == 0) {
				echo "</tr>\n";
			}
		}
	}
	echo "</table>";
}

/**
 * Display information aside the calendar
 * 
 * @param string $month
 * @param string $year
 */
function asideCalendar($month = CURRENT_MONTH, $year = CURRENT_YEAR) {

echo "	<p class=\"titleMonth\" style=\"color:".getColor($month)."\">".getUpperMonth($month)."</p>
		<p class=\"titleYearName\">YEAR</p>
		<p class=\"titleYearNumber\">".getYear($year)."</p>
		<p class=\"subtitle\">HUMAN ERA</p>";
}
?>