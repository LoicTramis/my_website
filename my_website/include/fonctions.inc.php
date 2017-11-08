<?php
	/**
	 * Open the local csv file or the online csv file
	 *
	 * @return string|resource - a file pointer resource
	 */
	function open_csv_file() {
		$file = "../files/etablissements_denseignement_superieur.csv";
		$data_file;
		// open the file
		if (file_exists($file)) {
			$data_file = fopen($file, 'r');
		}
		return $data_file;
	}
	
	/**
	 * Check if the french department is part of the OD-OT
	 *
	 * @param unknown $department
	 * @return boolean
	 */
	function is_dom_tom($department, $name = FALSE) {		
		$dom_tom = array("Guadeloupe", "Guyane", utf8_encode("La Réunion"), "Martinique", "Mayotte", "Territoires d'Outre Mer");
		
		if ($name == FALSE) {
			if (in_array($department, $dom_tom, TRUE)) {
				return TRUE;
			}
			return FALSE;
		} elseif ($name == TRUE) {
			if (in_array($department, $dom_tom, TRUE)) {
				return "DOM-TOM";
			} else {
				return "M&eacute;trop&ocirc;le";
			}
		}
	}
	
	/*	-----------------------------------
		-------- RESEARCH FUNCTIONS -------
		----------------------------------- */
	
	/* SIMPLE RESEARCH */

	/**
	 * Search one or several words in the file
	 * 
	 * @param unknown $word
	 * @param unknown $current_page
	 * @param unknown $display_line
	 * @return string - An HTML table
	 */
	function simple_research($word, $current_page, $display_line, $total_line)  {
		$data_file = open_csv_file();
		$line_word = "<table>"; // the line that contains the word
		$no_element = FALSE; // No element found
		$line = 0; // line on the file
		$displayed_line = 0;
		$actual_line = 1; // pagination
		
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
			$num = count($data);
			
			// first line
			if ($line == 0) {
				$line_word .= "<tr style=\"background-color: #d1d1e0; color: #3f3050;\">
											<td>$data[3]</td>\n
											<td>$data[5]</td>\n
											<td>$data[9]</td>\n
											<td>$data[10]</td>\n
											<td>$data[11]</td>\n
											<td>$data[14]</td>\n
										</tr>\n";
			}
			
			// after the first line
			if ($line > 0 && $actual_line <= $display_line * $current_page) {
				
				// Verify is the word is on the whole line
				if ($word === "iseedeadpeople" || (stripos(implode(",", $data), $word))) {
				$background_color = pick_background_color($actual_line); // alternate the background color
					// Display only 
					if ($actual_line > ($current_page - 1) * $display_line) {
						$line_word .= "	<tr class=\"row\" tabindex=\"1\" style=\"background-color: $background_color;\">
											<td>$data[3]</td>\n
											<td>$data[5]</td>\n
											<td>$data[9]</td>\n
											<td>$data[10]</td>\n
											<td>$data[11]</td>\n
											<td>$data[14]</td>\n
										</tr>\n";
						$no_element = TRUE;
						$displayed_line++;
					}
					$actual_line++;
				}
			}
			$line++;
		}
		fclose($data_file);
		
		$line_word .= "</table><p>".$displayed_line." r&eacute;sultats sur $total_line</p>";
		
		if ($no_element === FALSE) {
			$line_word = "<p class=\"error\">Aucun r&eacute;sultat trouv&eacute; pour <strong>$word</strong> !</p>";
		}
		
		return $line_word;
	}
	
	function get_total_lines($word) {
		$data_file = open_csv_file();
		$line = 0; // line on the file
		$actual_line = 0; // line on the screen		
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {			
			// after the first line
			if ($line > 0) {				
				// Verify is the word is on the whole line
				if ($word == "iseedeadpeople" || stripos(implode(",", $data), $word)) {
					$actual_line++;
				}
			}
			$line++;
		}
		fclose($data_file);
		
		return $actual_line;		
	}
	
	/* MULTIPLE RESEARCH */
	
	/**
	 * Put all status on a array
	 * 
	 * @return array - An array of status
	 */
	function get_status() {
		$data_file = open_csv_file();
		$status = array();
		$line = 1;
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
			// Skip the 1st line and make the array uniq
			if ($line > 1 && !in_array($data[5], $status)) {
				array_push($status, $data[5]);
				sort($status);
			}
			$line++;
		}
		fclose($data_file);
		
		return $status;
	}
	
	/**
	 * Put all types on a array
	 * 
	 * @return array - An array of types
	 */
	function get_types() {
		$data_file = open_csv_file();
		$types = array();
		$line = 1;
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
			// Skip the 1st line and make the array uniq
			if ($line > 1 && !in_array($data[2], $types)) {
				array_push($types, $data[2]);
			}
			$line++;
		}
		sort($types);
		fclose($data_file);
		
		return $types;
	}
	
	function multiple_research($status, $type, $region) {
		$data_file = open_csv_file();
		$line_word = "<table>"; // the line that contains the word
		$present = FALSE;
		$line = 0; // line on the file
		$actual_line = 0; // line on the screen
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
			$num = count($data);
			$background_color = pick_background_color($actual_line);
			
			if ($line == 0) {
				$line_word .= "<tr style=\"background-color: #d1d1e0; color: #3f3050;\">";
				for ($colum = 0; $colum < $num; $colum++) {
					$line_word .= "<th>$data[$colum]</th>\n";
				};
				$line_word .= "</tr>\n";
			}
			
			if ($line > 1  && ($type == $data[2]) && ($status == $data[5]) && ($region == $data[18])) {
				$line_word .= "<tr style=\"background-color: $background_color;\">";
				for ($colum = 0; $colum < $num; $colum++) {
					$line_word .= "<td>$data[$colum]</td>\n";
					$present = TRUE;
				}
				$actual_line++;
				$line_word .= "</tr>\n";
			}
			$line++;
			
		}
		fclose($data_file);
		
		$line_word .= "</table>\n";
		
		if ($present == FALSE) {
			$line_word = "<p class=\"error\">Aucun r&eacute;sultat trouv&eacute; pour <strong>$status $type $region</strong> !</p>";
		}
		return $line_word;
	}
	
	/*	-----------------------------------
		--------- DETAIL FUNCTIONS --------
		----------------------------------- */
	
	/**
	 * 
	 * @param unknown $academy
	 * @return unknown
	 */
	function get_cities_by_academies($academy) {
		$data_file = open_csv_file();
		$cities = array();
		$line = 1;
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
			// Skip the 1st line && make the array uniq && the city is in the academy
			if ($line > 1 && !in_array($data[11], $cities) && $data[17] == $academy) {
				array_push($cities, $data[11]);
			}
			$line++;
		}
		sort($cities);
		fclose($data_file);
		
		return $cities;
	}
	
	/**
	 * Put all the name of the univeristy in an array
	 * 
	 * @return array
	 */
	function get_universities_by_cities($city, $academy) {
		$data_file = open_csv_file();
		$universities = array();
		$line = 1;
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
			// Skip the 1st line && make the array uniq
			if ($line > 1 && !in_array($data[3], $universities) && $data[11] == $city && $data[17] == $academy) {
				array_push($universities, $data[3]);
			}
			$line++;
		}
		sort($universities);
		fclose($data_file);
		
		return $universities;
	}
	
	function get_comprehensive_university($academy, $city, $university) {
		$data_file = open_csv_file();
		$line_word = "<p>Oups, aucun r&eacute;sultat trouv&eacute;.</p>";
		$line = 0; // line on the file
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
			
			if ($line > 1  && ($university == $data[3]) && ($city== $data[11]) && ($academy == $data[17])) {
				$line_word = "	<div class=\"card-recto\">
									<div class=\"card-top\">
										<p>Acad&eacute;mie ".($data[17] == "Territoires d'Outre Mer" ? "des $data[17]" : "de $data[17]")."</p>
									</div>
									<div class=\"card-sigle\">
										<p class=\"left\"><strong>Sigle : </strong>$data[4]</p>
										<p class=\"right\"><strong>".is_dom_tom(utf8_encode($academy), TRUE)."</strong>
									</div>
									<div class=\"card-main\">
										<div class=\"card-photo\">
                                            <figure style=\"margin: 0px;\">
    											<img src=\"../img/shop_icon.png\" alt=\"IMAGE\">
                                                <figcaption class=\"hidden\">Shop</figcaption>
                                            </figure>
										</div>
										<div class=\"card-info\">
											<p><strong>Nom : </strong>$data[3]</p>
											<p><strong>Statut : </strong>$data[5]</p>
											<p><strong>Type : </strong>$data[2]</p>
										</div>
										<div class=\"card-contact\">
											<p><strong>Tutelle : </strong>$data[6]</p>
											<p><strong>Universit&eacute; : </strong>$data[7]</p>
											<p><strong>D&eacute;partement : </strong>$data[16]</p>
											<p><strong>R&eacute;gion : </strong>$data[18]</p>
										</div>
									</div>
									<div class=\"card-link\">
										<p><strong>Lien : </strong><a href=\"$data[25]\">Voir sur ONICEP</a></p>
									</div>
									<div class=\"card-bot\">
										<p class=\"left\"><strong>N&deg;Siret : </strong>$data[1]</p>
										<p class=\"right\"><strong>Code UAI : </strong>$data[0]</p>
									</div>								
								</div>

								<div class=\"card-verso\">
									<div class=\"card-top\"></div>

									<div class=\"card-main\">
										<div class=\"card-adress\">
											<p><strong>Adresse : </strong>$data[9]</p>
											<p><strong>CP : </strong>$data[10]</p>
											<p><strong>Commune : </strong>$data[11]</p>									
											<p><strong>Cedex : </strong>$data[13]</p>
											<p><strong>Bo&icirc;te postale : </strong>$data[8]</p>
										</div>
										<div class=\"card-phone\">
											<p><strong>T&eacute;l&eacute;phone : </strong>$data[14]</p>
											<p><strong>Arrondissement : </strong>$data[15]</p>
										</div>
									</div>
									<div class=\"card-miscellaneous\">
										<strong>Portes ouvertes</strong>
										<div class=\"left\">
											<p><strong>D&eacute;but : </strong>$data[22]</p>
											<p><strong>Fin : </strong>$data[23]</p>											
										</div>
										<div class=\"right\">
											<p><strong>Commentaire : </strong>$data[24]</p>											
										</div>
									</div>
								</div>";
				
			}
			$line++;			
		}
		fclose($data_file);
		return $line_word;
	}
	
	/*	-----------------------------------
		------- SYNTHETIC FUNCTIONS -------
		----------------------------------- */
	
	/* FOR THE REGIONS */
	
	/**
	 * Put all the regions in an array
	 *
	 * @return array - An array of regions
	 */
	function get_regions() {
		$data_file = open_csv_file();
		$regions = array();
		$line = 1;
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
			// Skip the 1st line and make the array uniq
			if ($line > 1 && !in_array($data[18], $regions)) {
				array_push($regions, $data[18]);
				sort($regions);
			}
			$line++;
		}
		fclose($data_file);
		
		return $regions;
	}
	
	/**
	 * Count the regions in the array
	 *
	 * @return int - The number of regions
	 */
	function get_total_regions() {
		$regions = get_regions();
		$total_regions = count($regions);
		
		return $total_regions;
	}
	
	/**
	 * Count the total of institutions for a specific region.
	 *
	 * @param string $region
	 * @return number
	 */
	function get_total_institutions_by_region($region) {
		$data_file = open_csv_file();
		$total =  0;
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
			if ($data[18] == $region) {
				$total++;
			}
		}
		fclose($data_file);
		
		return $total;
	}
	
	/**
	 * Get the total university per region.
	 * 
	 * @return array
	 */
	function display_all_regions($numeric_sort = TRUE) {
		$file_handle = open_csv_file();
		$regions = array();
		$line = 0;
		
		while (($data = fgetcsv($file_handle, 0, ";")) !== FALSE) {
			// after the first ligne and if the cell (region) is not empty
			if ($line > 0 && !empty($data[18]) && !is_dom_tom($data[18])) {
				array_push($regions, $data[18]);
			// if empty take the academy
			} elseif (empty($data[18])) {
				array_push($regions, $data[17]);
			// overseas departments
			} elseif (is_dom_tom($data[18])) {
				array_push($regions, "Département d'Outre Mer");
			}
			$line++;
		}		
		fclose($file_handle);
		
		// numeric sort by default or if TRUE, regular sort if FALSE
		if ($numeric_sort == FALSE) {
			sort($regions);
			$values = array_count_values($regions);
		} else {
			$values = array_count_values($regions);
			arsort($values);
		}
		
		return $values;
	}
	
	/* FOR THE ACADEMIES */
	
	/**
	 * Put all the academies in an array
	 *
	 * @return array - AN array of regions
	 */
	function get_academies() {
		$data_file = open_csv_file();
		$academies = array();
		$line = 1;
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
			// Skip the 1st line and make the array uniq
			if ($line > 1 && !in_array($data[17], $academies)) {
				array_push($academies, $data[17]);
			}
			$line++;
		}
		sort($academies);
		fclose($data_file);
		
		return $academies;
	}
	
	/**
	 * Count the academies in the array
	 *
	 * @return number - The number of academies
	 */
	function get_total_academies() {
		$academies = get_academies();
		$total_academies = count($academies);
		
		return $total_academies;
	}
	
	/**
	 * Count the total of institutions for a specific academy
	 *
	 * @param unknown $academy
	 * @return number
	 */
	function get_total_institutions_by_academy($academy) {
		$data_file = open_csv_file();
		$total =  0;
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
			if ($data[17] == $academy) {
				$total++;
			}
		}
		fclose($data_file);
		
		return $total;
	}
	
	/**
	 * Get the total university per academy.
	 * 
	 * @return array
	 */
	function display_all_academies($numeric_sort = TRUE) {
		$file_handle = open_csv_file();
		$academies= array();
		$line = 0;
		
		while (($data = fgetcsv($file_handle, 0, ";")) !== FALSE) {
			if ($line > 0) {
				array_push($academies, $data[17]);
			}
			$line++;
		}
		
		fclose($file_handle);
		
		// numeric sort by default or if TRUE, regular sort if FALSE
		if ($numeric_sort == FALSE) {
			sort($academies);
			$values = array_count_values($academies);
		} else {
			$values = array_count_values($academies);
			arsort($values);
		}		

		return $values;
	}
	
	/* FOR THE CITIES */
	
	/**
	 * Put all the cities in an array
	 *
	 * @return array - An array of cities
	 */
	function get_cities() {
		$data_file = open_csv_file();
		$cities = array();
		$line = 1;
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
			// Skip the 1st line and make the array uniq
			if ($line > 1 && !in_array($data[11], $cities)) {
				array_push($cities, $data[11]);
			}
			$line++;
		}
		sort($cities);
		
		fclose($data_file);
		
		return $cities;
	}
	
	/**
	 * Count the cities in the array
	 *
	 * @return number - The numbre of cities
	 */
	function get_total_cities() {
		$cities = get_cities();
		$total_cities= count($cities);
		
		return $total_cities;
	}
	
	/**
	 * Count the total of instituions for a specific city
	 *
	 * @param string $city
	 * @return number
	 */
	function get_total_institutions_by_city($city) {
		$data_file = open_csv_file();
		$total =  0;
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
			if ($data[11] == $city) {
				$total++;
			}
		}
		fclose($data_file);
		
		return $total;
	}
	

	/**
	 * Get the total university per city.
	 * 
	 * @return array
	 */
	function display_all_cities($numeric_sort = TRUE) {
		$file_handle = open_csv_file();
		$cities = array();
		$line = 0;
		
		while (($data = fgetcsv($file_handle, 0, ";")) !== FALSE) {
			if ($line > 0) {
				array_push($cities, $data[11]);	
			}
		$line++;
		}
		
		fclose($file_handle);
		
		// numeric sort by default or if TRUE, regular sort if FALSE
		if ($numeric_sort == FALSE) {
			sort($cities);
			$values = array_count_values($cities);
		} else {
			$values = array_count_values($cities);
			arsort($values);
		}
		
		return $values;
	}
	
	/* FOR THE TYPES */
	
	/**
	 * Count the total of instituions for a specific type
	 *
	 * @param string $city
	 * @return number
	 */
	function get_total_institutions_by_types($city) {
		$data_file = open_csv_file();
		$total =  0;
		
		while (($data = fgetcsv($data_file, 0, ";")) !== FALSE) {
			if ($data[2] == $city) {
				$total++;
			}
		}
		fclose($data_file);
		
		return $total;
	}
	
	
	/**
	 * Get the total university per type.
	 *
	 * @return array
	 */
	function display_all_types($numeric_sort = TRUE) {
		$file_handle = open_csv_file();
		$types= array();
		$line = 0;
		
		while (($data = fgetcsv($file_handle, 0, ";")) !== FALSE) {
			if ($line > 0) {
				array_push($types, $data[2]);
			}
			$line++;
		}
		
		fclose($file_handle);
		
		// numeric sort by default or if TRUE, regular sort if FALSE
		if ($numeric_sort == FALSE) {
			sort($types);
			$values = array_count_values($types);
		} else {
			$values = array_count_values($types);
			arsort($values);
		}	
		return $values;
	}
?>