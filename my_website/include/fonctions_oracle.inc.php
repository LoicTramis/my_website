<?php
    
    /**
     * Display an HTML table from a generic Oracle SQL query.
     *
     * @param string $select_query
     * @return string - HTML table
     */
    function set_select_generic_query($select_query) {
        include '../include/oracle.conf.inc.php';
        $result;
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
     */
    function set_2_fields_select_generic($select_query) {
        include '../include/oracle.conf.inc.php';      
        
        $connection = oci_connect($username, $password, $param);
        
        if ($connection) {
            $result = "<select name=\"ucs_carte3\">\n";
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
    
    /**
     * Display all items from a given table.
     * 
     * @param string $table
     * @return string - an HTML table
     */
    function display_DB_table($table) {
        include '../include/oracle.conf.inc.php';
        $result;
        $connection = oci_connect($username, $password, $param);
        
        if ($connection) {
            $select_query = "SELECT * FROM ".$table;
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
    
    function display_all_tables() {
        include '../include/oracle.conf.inc.php';
        $oracle_tables = ["Fournisseurs", "Obj_inventaires", "Peripheriques","Ucs", "Composants","Pannes"];
        $connection = oci_connect($username, $password, $param);
        
        if ($connection) {
            for ($i = 0; $i < 5; $i++) {
                $select_query = "SELECT * FROM ".$oracle_tables[$i];
                $statement = oci_parse($connection, $select_query);
                
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
                    echo "</tr>\n";
                }
                echo "</table>\n";
                
            }
            oci_free_statement($statement);
            oci_close($connection);
        } else {
            echo "Connexion &agrave; la base de donn&eacute;es impossible.";
        }
    }