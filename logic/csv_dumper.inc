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
    
    $csvStr = [];
    foreach($this->persons as $person) 
    {
      array_push( $csvStr, $person);
    }
    
    return $csvStr;
  }
}
?>
