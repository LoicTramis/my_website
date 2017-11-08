<?php

    define('VISITOR_FILE', "../files/total_visitors.txt");
	/**
	 * Alternate the background color in a loop.
	 * For ex. in a table, the color of the rows are different.
	 * 
	 * @param number $value - The value for picking the color
	 * @return string - The color #rrggbb
	 */
	function pick_background_color($value) {
		// For the background color of the row
		if ($value % 2 == 0) {
			$background_color = "#e7d1fa"; // light pink
		} else {
			$background_color = "#cde6fe"; // light blue
		}
		
		return $background_color;
	}

	
	function paginate($total_line, $display_line, $get_page) {
		$total_pages = ceil($total_line / $display_line);
		$current_page = $get_page;
		
		if ($current_page > $total_pages) {
			$current_page = $total_pages;
		}
		
		return $current_page;
	}
	
	function display_pagination($total_line, $display_line, $get_simple, $get_page) {
		$total_pages = ceil($total_line / $display_line);
		$current_page = $get_page;
		$pagination = "";
		
		if ($current_page > $total_pages) {
			$current_page = $total_pages;
		}
		
		$pagination .= "<div class=\"pagination\">";
		
		for ($index = 1; $index <= $total_pages; $index++) {
			if ($index == $current_page) {
				$pagination .= "<a class=\"active\" href=\"research_single.php?simple=".urlencode($get_simple)."&page=$index\">$index</a>";
			} else {
			    $pagination .= "<a href=\"research_single.php?simple=".urlencode($get_simple)."&page=$index\">$index</a>";
			}
		}
		
		$pagination .= "</div>";
		
		return $pagination;
	}
	
	function connexion() {
		
		if (file_exists("../files/file.csv")) {
			$data_file = fopen("../files/file.csv", 'r');
		} else {
			return "<p>Erreur de lecture. Contacter le webmaster.</p>";
		}
		
		$data=array();
		if (isset($_POST['login'])){ // Sinon l'utilisateur a essayé de se connecter
			
			if (!empty($_POST['login']) & !empty($_POST['password'])) {
				$login=$_POST['login'];
				$pswrd=$_POST['password'];
				// on parcourt notre base de données
				while (($data = fgetcsv($data_file, 0, ",")) !== FALSE){
					// on vérifie si le login et le mot de passe sont corrects
					if ( ($data[0]==$login) && ( password_verify($pswrd,trim($data[1])) ) ) {
						$_SESSION['login']=$login;
						$_SESSION['firstname']=$data[2];
						$_SESSION['lastname']=$data[3];
						
						return true;
					}
				}
			}
		}
		return false;
	}
	
	function get_current_folder($folder_name) {
	    switch ($folder_name) {
	        // Second year
	        case "l2index":
	            $style = "style=\"color: #bd7f6b;font-weight: bold;\"";
	            break;
	        case "l2training":
	            $style = "style=\"color: #bd7f6b;font-weight: bold;\"";
	            break;
	        case "l2project":
	            $style = "style=\"color: #bd7f6b;font-weight: bold;\"";
	            break;
            // Third year
	        case "l3index":
	            $style = "style=\"color: #5cac3f;font-weight: bold;\"";
	            break;
	        case "l3database":
	            $style = "style=\"color: #5cac3f;font-weight: bold;\"";
	            break;
	        case "l3advance":
	            $style = "style=\"color: #5cac3f;font-weight: bold;\"";
	            break;
	        case "l3project":
	            $style = "style=\"color: #5cac3f;font-weight: bold;\"";
	            break;
            // Miscellaneous
	        case "misc":
	            $style = "style=\"color: #3e81f4;font-weight: bold;\"";
	            break;
            // Miscellaneous JS
	        case "miscjs":
	            $style = "style=\"color: #3e81f4;font-weight: bold;\"";
	            break;
            // Miscellaneous
	        case "miscangular":
	            $style = "style=\"color: #3e81f4;font-weight: bold;\"";
	            break;
            // Miscellaneous
	        case "miscnode":
	            $style = "style=\"color: #3e81f4;font-weight: bold;\"";
	            break;
            // Account
	        case "account":
	            $style = "style=\"color: #944dff;font-weight: bold;\"";
	            break;
	        
	        default:
	            $style = "";
	            break;
	    }
	    return $style;
	}
	
	function get_logo_folder($folder_name) {
	    switch ($folder_name) {
	        // Second year
	        case "l2index":
	            $logo_path = "../img/logo_entropy_l2.svg";
	            break;
	        case "l2training":
	            $logo_path = "../img/logo_entropy_l2.svg";
	            break;
	        case "l2project":
	            $logo_path = "../img/logo_entropy_l2.svg";
	            break;
	            // Third year
	        case "l3index":
	            $logo_path = "../img/logo_entropy_l3.svg";
	            break;
	        case "l3database":
	            $logo_path = "../img/logo_entropy_l3.svg";
	            break;
	        case "l3advance":
	            $logo_path = "../img/logo_entropy_l3.svg";
	            break;
	        case "l3project":
	            $logo_path = "../img/logo_entropy_l3.svg";
	            break;
	            // Miscellaneous
	        case "misc":
	            $logo_path = "../img/logo_entropy_misc.svg";
	            break;
	            // Miscellaneous JS
	        case "miscjs":
	            $logo_path = "../img/logo_entropy_misc.svg";
	            break;
	            // Miscellaneous
	        case "miscangular":
	            $logo_path = "../img/logo_entropy_misc.svg";
	            break;
	            // Miscellaneous
	        case "miscnode":
	            $logo_path = "../img/logo_entropy_misc.svg";
	            break;
	            // Account
	        case "account":
	            $logo_path = "../img/logo_entropy_account.svg";
	            break;
	            
	        default:
	            $logo_path = "../img/logo_entropy.svg";
	            break;
	    }
	    return $logo_path;
	}
	
	/**
	 * Get the name of the browser
	 *
	 * @return string The name of the browser
	 */
	function get_browser_name($name = FALSE) {
	    // get the name of the browser for the css
	    if ($name == FALSE) {
	        // Get many informations about the browers
	        $user_agent = $_SERVER['HTTP_USER_AGENT'];
	        
	        // Default value
	        $browser = "default";
	        
	        // The most use browsers
	        $browser_array  =   array(
	            '/msie/i'		=>'ie',
	            '/firefox/i'	=>'firefox',
	            '/safari/i'		=>'safari',
	            '/chrome/i'		=>'chrome',
	            '/edge/i'		=>'edge',
	            '/opera/i'		=>'opera', //Opera uses both names "opera" and "OPR"
	            '/OPR/i'		=>'opera',
	            '/netscape/i'	=>'netscape', // Not so used
	            '/mobile/i'		=>'default' // Smartphones
	        );
	        
	        // Read through the array and for each key...
	        foreach ($browser_array as $regex => $value) {
	            // ...check if the HTML client informations match with one of the key in the array
	            if (preg_match($regex, $user_agent)) {
	                // then affect the value to the varible
	                $browser = $value;
	            }
	        }
	    // get the proper name of the browser for display
	    } else {
	        // The most use browsers
	        $browser_array  =   array(
	            'ie'		    =>'Internet Explorer',
	            'firefox'       =>'Firefox',
	            'safari'		=>'Safari',
	            'chrome'		=>'Chrome',
	            'edge'		    =>'Microsoft Edge',
	            'opera'	       	=>'Opera', //Opera uses both names "opera" and "OPR"
	            'netscape'     	=>'Netscape', // Not so used
	            'default'		=>'Autre', // Smartphones
	        );
	        
	        foreach ($browser_array as $key_names => $browser_name) {
	            if ($name == $key_names) {
	                $browser = $browser_name;
	            };
	        }
	    }
	    return $browser;
	}
	
	function get_OS_name($name = FALSE) {
	    $user_agent = $_SERVER['HTTP_USER_AGENT'];	        
        $os ="Unknown OS Platform";  
        
        $os_array = array(
            '/windows nt 10/i'     =>  array('Windows 10', 'windows-new'),
            '/windows nt 6.3/i'     =>  array('Windows 8.1', 'windows-new'),
            '/windows nt 6.2/i'     =>  array('Windows 8', 'windows-new'),
            '/windows nt 6.1/i'     =>  array('Windows 7', 'windows-old'),
            '/windows nt 6.0/i'     =>  array('Windows Vista', 'windows-old'),
            '/windows nt 5.2/i'     =>  array('Windows Server 2003', 'windows-old'),
            '/windows nt 5.1/i'     =>  array('Windows XP', 'windows-old'),
            '/windows xp/i'         =>  array('Windows XP', 'windows-old'),
            '/windows nt 5.0/i'     =>  array('Windows 2000', 'windows-old'),
            '/windows me/i'         =>  array('Windows ME', 'windows-old'),
            '/win98/i'              =>  array('Windows 98', 'windows-old'),
            '/win95/i'              =>  array('Windows 95', 'windows-old'),
            '/win16/i'              =>  array('Windows 3.11', 'windows-old'),
            '/macintosh|mac os x/i' =>  array('Mac OS X', 'macos'),
            '/mac_powerpc/i'        =>  array('Mac OS 9', 'macos'),
            '/linux/i'              =>  array('Linux', 'linux'),
            '/ubuntu/i'             =>  array('Ubuntu', 'ubuntu'),
            '/iphone/i'             =>  array('iPhone', 'ios'),
            '/ipod/i'               =>  array('iPod', 'ios'),
            '/ipad/i'               =>  array('iPad', 'ios'),
            '/android/i'            =>  array('Android', 'android'),
            '/blackberry/i'         =>  array('BlackBerry', 'blackberry'),
            '/webos/i'              =>  array('Mobile', 'mobile')
        );
        
        foreach ($os_array as $regex => $value) {            
            if (preg_match($regex, $user_agent)) {
                $os = $value;
            }            
        }        
        return $os;
	}
	
	function save_total_visitors($ip_adress, $home_page) {
	    if ($home_page == TRUE) {
	        $file = "./files/total_visitors.txt";
	    } else {
	        $file = VISITOR_FILE;
	    }
	    
	    // No file : create a new file.
	    if (!file_exists($file)) {
	        $hits = fopen($file, 'x+'); // create a new file
        // The file exists
	    } else {
	        $hits = fopen($file, 'c+'); // open the file without change
	    }
	    fwrite($hits, $ip_adress."\n");
	    fclose($hits);
	}
	
	function get_total_visitors($ip_adress, $home_page = FALSE) {
	    save_total_visitors($ip_adress, $home_page);
	    
	    if ($home_page == TRUE) {
	        $file = "./files/total_visitors.txt";
	    } else {
    	    $file = VISITOR_FILE;
	    }
	    $visitor = fopen($file, 'r');
	    $number = 0;
	    
	    while (!feof($visitor)) {
	        $line = fgets($visitor);
	        $number++;
	    }
	    
	    return $number-1;	    
	}
	
	function get_day() {
	    $day = date("w");
	    
	    $days = array(
	        0  =>  "Sunday_48px",
	        1  =>  "Monday_48px",
	        2  =>  "Tuesday_48px",
	        3  =>  "Wednesday_48px",
	        4  =>  "Thursday_48px",
	        5  =>  "Friday_48px",
	        6  =>  "Saturday_48px"
	    );
	    
	    return $days[$day];
	}