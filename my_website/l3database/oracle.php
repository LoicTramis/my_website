<?php
$file_name = basename(__FILE__);
$folder_name = basename(__DIR__);

require_once '../include/header.inc.php';
require_once '../include/oracle.conf.inc.php';
require_once '../include/fonctions_oracle.inc.php';

/**
 * Display an HTML table from a Oracle SQL query.
 *
 * @param string $select_query
 * @return string - HTML table
 */
function set_select_query($select_query) {
    include '../include/oracle.conf.inc.php';
    $connection = oci_connect($username, $password, $param);
    
    if ($connection) {
        $statement = oci_parse($connection, $select_query);
        
        oci_execute($statement);
        
        // get the number of fields
        $nb_columns = oci_num_fields($statement);
        $result = "<table>\n
                        <tr>";
        
        // headers
        for ($index = 1; $index <= $nb_columns; $index++) {
            $result .= "<th>".oci_field_name($statement, $index)."</th>\n";
        }
        $result .= " </tr>\n";
        
        // display every row
        while ($row = oci_fetch_array($statement)) {
            $result .= "<tr>\n";
            
            // display every item
            for ($index = 0; $index < $nb_columns; $index++) {
                $result .= "<td>".$row[$index]."</td>\n";
            }
            $result .= "</tr>\n";
        }
        $result .= "</table>\n";
        
        oci_free_statement($statement);
        oci_close($connection);
    } else {
        $result = "Connexion &agrave; la base de donn&eacute;es impossible.";
    }
    return $result;
}

/**
 * Take a SELECT SQL query and return a HTML select field
 *
 * @param string $select_query
 * @return string - HTML select tag
 */
function set_2_fields_select($select_query) {
    include '../include/oracle.conf.inc.php';
    $connection = oci_connect($username, $password, $param);
    
    if ($connection) {
        $result = "<select name=\"ucs_carte2\">\n";
        $statement = oci_parse($connection, $select_query);
        
        oci_execute($statement);
        
        // get the number of fields
        $nb_rows = 0;
        $code_array = array();
        $value_array = array();
        
        // display every row
        while ($row = oci_fetch_array($statement)) {
            // display every item
            array_push($code_array, $row[0]);
            array_push($value_array, $row[1]);
            $nb_rows++;
        }
        oci_free_statement($statement);
        oci_close($connection);
        
        for ($index = 0; $index < $nb_rows; $index++) {
            $result .= "<option value=".$code_array[$index].">".$value_array[$index]."</option>\n";
        }
        $result .= "</select>";
    } else {
        $result = "Connexion &agrave; la base de donn&eacute;es impossible.";
    }
    return $result;
}
?>
<div class="center">
    <section style="left: 0%;
                    transform: none;
                    width: 85%;">
    	<h2>PHP / Oracle</h2>
    	<article>
    		<h3>Script PHP de base (Fonctions)</h3>
    		<?php 
        		$connection = oci_connect($username, $password, $param);
        		
        		if ($connection) {
        		    $sql_text = 'SELECT * FROM Ucs'; // SQL Oracle query
        		    $statement = oci_parse($connection, $sql_text);
        		    
        		    oci_execute($statement);
                    
        		    // get the number of fields
        		    $nb_columns = oci_num_fields($statement);
        		    echo "<table>\n
                            <tr>";
        	        
        		    // headers
        	        for ($index = 1; $index <= $nb_columns; $index++) {
        	            echo "<th>".oci_field_name($statement, $index)."</th>\n";
                    } 
        		    echo " </tr>\n";
        		    
        		    // display every row
        		    while ($row = oci_fetch_array($statement)) {
        		        echo "<tr>\n";
        		        
        		        // display every item
        	            for ($index = 0; $index < $nb_columns; $index++) {
        	                echo "<td>".$row[$index]."</td>\n";
        	            }
        		        echo  "</tr>\n";
        		    }
        		    echo "</table>\n";
        		    
        		    oci_free_statement($statement);
        		    oci_close($connection);
        		} else {
        		    echo "Connexion &agrave; la base de donn&eacute;es impossible.";
        		}
    		?>
    	</article>
    	
    	<article>
    		<h3>Mise en forme du code sous la forme d'une fonction</h3>
    		<?php 
    		  echo set_select_query("SELECT * FROM Obj_inventaires");
    		?>
    	</article>
    	
    	<article>
    		<h3>Extraction du code de la fonction</h3>
    		<?php 
    		  echo set_select_generic_query("SELECT * FROM Composants");
    		?>
    	</article>
    	
    	<article id="first_form">
    		<h3>Script PHP de base (Formulaire)</h3>
    		<?php 
        		
        		$connection = oci_connect($username, $password, $param);
        		
        		if ($connection) {
        		    $sql_text = 'SELECT no_uc, cartemere FROM Ucs'; // SQL Oracle query
        		    $statement = oci_parse($connection, $sql_text);
        		    
        		    oci_execute($statement);
        		    
        		    // get the number of fields
        		    $nb_rows = 0;
        		    $code_array = array();
        		    $value_array = array();
        		    
        		    // display every row
        		    while ($row = oci_fetch_array($statement)) {
        		        // display every item
    		            array_push($code_array, $row[0]);
    		            array_push($value_array, $row[1]);
        		        $nb_rows++;   
        		    }
        		    oci_free_statement($statement);
        		    oci_close($connection);
        		} else {
        		    echo "Connexion &agrave; la base de donn&eacute;es impossible.";
        		}
    		?>
    		<fieldset>
    			<legend>Choisissez le mod&egrave;le</legend>
    			<form action="./#first_form" method="get">
    				<select name="ucs_carte">
    					<?php 
    					
        					for ($index = 0; $index < $nb_rows; $index++) {
        					    echo "<option value=".$code_array[$index].">".$value_array[$index]."</option>\n";
        					}
    					?>
    				</select>
    				
    				<input type="submit" value="Envoyer"/>
    			</form>
        		<?php 
        		if (isset($_GET['ucs_carte'])) {
        		    echo "<p>Unit&eacute; centrale choisit : ".$_GET['ucs_carte']."</p>" ;
        		  }
        		?>
    		</fieldset>		
    	</article>
    	
    	<article id="2nd_form">
    		<h3>Structuration en une fonction</h3>
    		<fieldset>
    			<legend>Choisissez la vitesse du processeur</legend>
    			<form action="./#2nd_form" method="get">
    				<?php
    				   echo set_2_fields_select('SELECT no_uc, vitesse FROM Ucs');
    				?>
    				
    				<input type="submit" value="Envoyer"/>
    			</form>
        		<?php 
        		if (isset($_GET['ucs_carte2'])) {
        		    echo "<p>Unit&eacute; centrale choisit : ".$_GET['ucs_carte2']."</p>" ;
        		  }
        		?>
    		</fieldset>	
    	</article>
    	
    	<article id="3rd_form">
    		<h3>Construction multi-fichiers</h3>
    		<fieldset>
    			<legend>Choisissez le type de processeur</legend>
    			<form action="./#3rd_form" method="get">
    				<?php
    				   echo set_2_fields_select_generic('SELECT no_uc, processeur FROM Ucs');
    				?>
    				
    				<input type="submit" value="Envoyer"/>
    			</form>
        		<?php 
        		if (isset($_GET['ucs_carte3'])) {
        		    echo "<p>Unit&eacute; centrale choisit : ".$_GET['ucs_carte3']."</p>" ;
        		  }
        		?>
    		</fieldset>	
    	</article>
    	
    	<article id="4th_form">
    		<h3>Liaison des codes</h3>
    		<fieldset>
    			<legend>Choisissez une table</legend>
    			<form action="./#4th_form">
        			<select name="table">
        				<option value="Obj_inventaires">Objets inventaires</option>
        				<option value="Ucs">Unit&eacute;s centrales</option>
        				<option value="Composants">Composants</option>
        				<option value="Peripheriques">P&eacute;riph&eacute;ques</option>
        				<option value="Fournisseurs">Les fournisseurs</option>
        				<option value="Pannes">Les objets en panne</option>
        			</select>
        			<input type="submit" value="Valider">
    				
    				<?php 
    				    if (isset($_GET['table'])) {
    				        echo "R&eacute;sultat pour \"".$_GET['table']."\"".display_DB_table($_GET['table']);
    				    }
    				?>
    			</form>
    			
    			
    		</fieldset>
    	</article>
    	
    	<article>
    		<h3>Affichage complet</h3>
    		<a href="./td_php_oracle.php">R&eacute;sultat ici</a>
    	</article>
    	
    	<article>
    		<h3></h3>
    	</article>
    </section>
    <?php
        require_once '../include/l3aside.inc.php';
    ?>
</div>
<?php
	require_once '../include/footer.inc.php';
?>