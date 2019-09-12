<?php

class UploadController {

  var $persons;
  var $ini;
  var $log;

  function __construct($log)
  {
    $this->persons = array();
    $this->ini = parse_ini_file(__DIR__.'/../config/app.ini');
    $this->log = $log;
    $this->log->add("öffne Datei");
    
    if(!isset($_FILES["fileToUpload"]["tmp_name"])) 
    {
      $this->log->add("Datei konnte nicht gelesen werden");
      return;
    }
    
    $file = $_FILES["fileToUpload"]["tmp_name"];
    
    // Debug
    //$contents = nl2br(file_get_contents($file));
    //echo $contents."<br /><br />";
    
    $delimiter = $this->detectDelimiter($file);
  
    // Create array from file contents (personID, groupID)
    $fp = fopen($file, 'rb');
    while(!feof($fp)) {
        $this->persons[] = fgetcsv($fp, null, $delimiter);
    }
    
    // Remove last entry (end of file)
    $this->persons = array_slice($this->persons, 0, -1);
  }
  
  function detectDelimiter($csvFile)
  {
    $delimiters = array(
        ';' => 0,
        ',' => 0,
        "\t" => 0,
        "|" => 0
    );

    $handle = fopen($csvFile, "r");
    $firstLine = fgets($handle);
    fclose($handle); 
    foreach ($delimiters as $delimiter => &$count) {
        $count = count(str_getcsv($firstLine, $delimiter));
    }

    return array_search(max($delimiters), $delimiters);
  }
}
?>
