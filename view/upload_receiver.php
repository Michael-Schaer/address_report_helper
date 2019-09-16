<html>
 <head>
  <title>PHP-Test</title>
  </head>
  <body>
    
  <?php
    require_once(__DIR__.'/../logic/upload_controller.inc');
    require_once(__DIR__.'/../logic/query_controller.inc');
    require_once(__DIR__.'/../logic/csv_dumper.inc');
    require_once(__DIR__.'/../logic/log.inc');
    
    $log = new Log();
    $upload_controller = new UploadController($log);
    
    $query_controller = new QueryController($log, $upload_controller->persons);
    $query_controller->query_groups();
    
    $csv_dumper = new CsvDumper($log, $query_controller->persons);
    $results = $csv_dumper->create_csv_file();
        
    echo "
		<table>
			<tr>
				<th>
					User-ID
				</th>
				<th>
					Primäre Gruppe
				</th>
				<th>
					Gruppen-Kontakt
				</th>
				<th>
					Mail senden
				</th>
			</tr>
			
";

    foreach ($results as $result){
    	echo "<tr>";
    	foreach ($result as $entrie){
    		echo '<td>' . $entrie . '</td>';
	    }
	    echo '
	        <td><form method="post" action="mail.php"><input type="hidden" name="mailaddress" value="'.$result[2].'" /><input type="submit" /></form></td>
	    ';
	    echo "</tr>";
    }

    echo "</table>";
  ?>

  </body>
</html>
