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
      return;
    }
    
    $file = $_FILES["fileToUpload"]["tmp_name"];
    if($file === false) 
    {
      $this->log->add("Datei konnte nicht gelesen werden");
    }
    // Debug
    //$contents = nl2br(file_get_contents($file));
    //echo $contents."<br /><br />";
  
    // Create array from file contents (personID, groupID)
    $fp = fopen($file, 'rb');
    while(!feof($fp)) {
        $this->persons[] = fgetcsv($fp);
    }
    
    // Remove last entry (end of file)
    $this->persons = array_slice($this->persons, 0, -1);
  }
}
?>
