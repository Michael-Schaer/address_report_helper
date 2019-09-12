<?php

class CsvDumper {

  var $persons;
  var $ini;
  var $log;

  function __construct($log, $persons)
  {
    $this->ini = parse_ini_file(__DIR__.'/../config/app.ini');
    $this->log = $log;
    $this->persons = $persons;   
  }
  
  function create_csv_file() 
  {
    $this->log->add("erstelle CSV-Datei");
    
    $csvStr = "";
    foreach($this->persons as $person) 
    {
      $person_url = $this->ini['person_url'].$person[0];
      $csvStr .= $person[0].",".$person[1].",".$person[2].",".$person_url;
      $csvStr .= ";";
    }
    
    return $csvStr;
  }
}
?>
