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
    $result = $csv_dumper->create_csv_file();
        
    echo "<h2>Log</h2>";
    echo $log->message;
  ?>

  <br /><br />
  <form action="download.php" method="post">
    <input type="submit" value="Datei herunterladen" />
    <input type="hidden" name="content" value="<?php echo $result; ?>"/>
  </form>
    
  </body>
</html>
