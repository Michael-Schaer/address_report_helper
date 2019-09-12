<?php

class QueryController {

  var $persons;
  var $ini;
  var $log;

  function __construct($log, $persons)
  {
    $this->ini = parse_ini_file(__DIR__.'/../config/app.ini');
    $this->log = $log;
    $this->persons = $persons;
  }
  
  /**
  * Adds the group's email address to the persons array
  * Example use: `echo $this->persons[0][2];`
  */
  function query_groups()
  {
    $channel = curl_init(); 
    $this->log->add("Suche nach E-Mails der Gruppen...");
    
    $counter = 0;
    foreach ($this->persons as $person) 
    {
      $email = $this->single_query($channel, $person[1]);
      $this->persons[$counter][2] = $email;
      $counter++;
    }

    $this->log->add("Suche wird beendet...");
    curl_close($channel);
  }
  
  function single_query($channel, $group_id) 
  {
    $url = $this->ini['url_start'].$group_id.$this->ini['url_end'];
    curl_setopt($channel, CURLOPT_URL, $url); 
    curl_setopt($channel, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($channel); 
    
    if($output === false) 
    { 
      $this->log->add("Gruppe mit ID ".$group_id." nicht gefunden");
      return null;
    }
    
    $output_json = json_decode($output, true);
    if ($output_json === null || !isset($output_json["groups"][0]["email"])) 
    {
      $this->log->add("Gruppe mit ID ".$group_id." nicht gefunden");
      return null;
    }
    
    $email = $output_json["groups"][0]["email"];
    if($this->isNullOrEmptyString($email)) 
    {
      $this->log->add("Gruppe mit ID ".$group_id." hat keine E-Mail-Adresse hinterlegt");
      return null;
    }
    
    return $email;    
  }
  
  function isNullOrEmptyString($str) 
  {
    return (!isset($str) || trim($str) === '');
  }
}
?>
