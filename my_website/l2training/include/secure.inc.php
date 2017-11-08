<?php

define('SECURE_FILE', "../files/secure_data.csv");

/**
 * Return the array of datas
 *
 * @return string[][] - the array of the keys/values
 */
function get_secure_data() {
	$datas = array(
			1	=>	array("IronMan","mark10","Tony","Stark"),
			2	=>	array("BlackPanther","vib20","","T'Challa"),
			3	=>	array("CaptainAmerica","shield30","Steve","Rogers"),
			4	=>	array("BlackWidow","suit40","Natasha","Romanoff"),
	);
	return $datas;
}
/**
 * Put the datas of the array into the csv file. *
 */
function store_secure_data() {
	$data_file = fopen(SECURE_FILE, 'w'); // open the file for writing only

	// get the data of the array
	$datas = get_secure_data();

	// write the array of datas in the file
	foreach ($datas as $value) {
		// crypt the password before write in the file
		$value[1] = password_hash($value[1], PASSWORD_DEFAULT);

		fputcsv($data_file, $value);
	}
	fclose($data_file);
}
/**
 * Check if the password if valid
 * 
 * @return bool - true or false
 */
function is_password_valid($password) {
	$bool = false;
	$data_file = fopen(SECURE_FILE, 'r'); // open the file for reading only
	$datas = get_secure_data();
	
	// get the data in the csv file
	foreach ($datas as $value) {
		$fields = fgetcsv($data_file);
		
		// password matches with its crypted version
		if (password_verify($password, $fields[1])) {
			$bool = true;
		}
	}
	return $bool;
}

/**
 * 
 * @param string $username
 * @return string 
 */
function get_family_names($username) {
	$datas = get_secure_data();
	$firstname = "";
	$lastname = "";
	
	foreach ($datas as $value) {
		// Found the username in the array, firstname and lastname
		if ($value[0] == $username) {
			$firstname = $value[2];
			$lastname = $value[3];
		}		
	}	
	return $firstname." ".$lastname;
}

/**
 * Get the first name of the user
 * 
 * @param unknown $username
 * @return string|unknown
 */
function get_family_firstname($username) {
	$datas = get_secure_data();
	$firstname = "";
	
	foreach ($datas as $value) {
		// Found the username in the array, firstname and lastname
		if ($value[0] == $username) {
			$firstname = $value[2];
		}
	}
	return $firstname;
}

/**
 * Get the last name of the user
 * 
 * @param unknown $username
 * @return string|unknown
 */
function get_family_lasttname($username) {
	$datas = get_secure_data();
	$lastname= "";
	
	foreach ($datas as $value) {
		// Found the username in the array, firstname and lastname
		if ($value[0] == $username) {
			$lastname= $value[3];
		}
	}
	return $lastname;
}

/**
 * Get the profile icon of the user
 * 
 * @param unknown $username
 * @return string|icon 
 */
function get_profil_icon($username) {
	$icon = "";
	// each username has its own icon
	$icons = array(
			1	=>	array("IronMan","ironman_icon"),
			2	=>	array("BlackPanther","blackpanther_icon"),
			3	=>	array("CaptainAmerica","captain_icon"),
			4	=>	array("BlackWidow","widow_icon"),
	);
	// get the user icon
	foreach ($icons as $value) {
		if ($value[0] == $username) {
			$icon = $value[1];
		}
	}
	return $icon;
}

?>