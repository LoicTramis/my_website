<?php

define('SECURE_FILE', "../files/secure_data.csv");

/**
 * Put the datas of the array into the csv file.
 */
function store_secure_data($lastname, $firstname, $username, $email, $password) {
	$data_file = fopen(SECURE_FILE, 'a'); // open the file for writing only

	// get the data of the array
	$datas = array(
			utf8_decode($lastname), // accent
			utf8_decode($firstname), // accent
			$username,
			$email,
			password_hash($password, PASSWORD_DEFAULT) // secure
	);

	fputcsv($data_file, $datas);
	
	fclose($data_file);
}

function is_connected($secure_file = SECURE_FILE) {
	$data_file = fopen($secure_file, 'r');
	$data = array();
	
	if (isset($_POST['login']) && (!empty($_POST['login']) && !empty($_POST['password']))) {
		$login = $_POST['login'];
		$passowrd= $_POST['password'];

		while (($data = fgetcsv($data_file, 0, ",")) !== FALSE){

			if (($data[2] == $login) && password_verify($passowrd, $data[4])) {
				$_SESSION['lastname'] = utf8_encode($data[0]);
				$_SESSION['firstname'] = utf8_encode($data[1]);
				$_SESSION['login'] = $login;
				$_SESSION['email'] = $data[3];
				($_SESSION['login'] == "Entropy" ? $_SESSION['admin'] = TRUE : $_SESSION['admin'] = FALSE);
				
				return true;
			}
		}
	}
	return false;
}

/**
 * Check if the username already exists in the database.
 * 
 * @param string $username
 * @return boolean
 */
function is_same_user($username, $email) {    
    $data_file = fopen(SECURE_FILE, 'r'); // open the file for reading only;
    $data = array();
    
    while (($data = fgetcsv($data_file, 0, ",")) !== FALSE) {
        if ($data[2] == $username || $data[3] == $email) {
            return FALSE;
        }
    }
    
    return TRUE;
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
 * @param string $username
 * @return string
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
 * @param string $username
 * @return string
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
 * @param string $username
 * @return string 
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