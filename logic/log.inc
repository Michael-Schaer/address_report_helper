<?php

class Log {

  var $message;

  function __construct()
  {
    $this->message = "";
  }
  
  function add($string) 
  {
    $this->message .= strip_tags($string)."<br/>";
  }
}
?>
