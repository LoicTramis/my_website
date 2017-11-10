<?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);
    
    require_once '../include/header.inc.php';
    
    /**
     * Display an HTML table from a Oracle SQL query.
     *
     * @param string $select_query
     * @return string - HTML table
     */
    function set_select_query($select_query) {
        include '../include/postreg.conf.inc.php';
        $connection = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$username." password=".$password);
        $statement = pg_query($connection, $select_query);
        
        // get the number of fields
        $nb_columns = pg_num_fields($statement);
        $result = "<table>\n
                        <tr>";
        
        // headers
        for ($index = 1; $index <= $nb_columns; $index++) {
            $result .= "<th>".pg_field_name($statement, $index)."</th>\n";
        }
        $result .= " </tr>\n";
        
        // display every row
        while ($row = pg_fetch_array($statement)) {
            $result .= "<tr>\n";
            
            // display every item
            for ($index = 0; $index < $nb_columns; $index++) {
                $result .= "<td>".$row[$index]."</td>\n";
            }
            $result .= "</tr>\n";
        }
        $result .= "</table>\n";
        
        pg_free_result($statement);
        pg_close($connection);

        return $result;
}
?>
<div class="center">
    <section style="left: 0%;
                    transform: none;
                    width: 85%;">
    	<h2>PostregSQL</h2>
    	
    	<article>
    		<h3>Incoming</h3>
    		<?php 
    		  set_select_query('SELECT * FROM Ucs');
    		?>
    	</article>
	</section>

	<?php
        require_once '../include/l3aside.inc.php';
    ?>
     </div>
<?php
    require_once '../include/footer.inc.php';
?>