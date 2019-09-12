<?php
  header("Content-type: text/plain");
  header("Content-Disposition: attachment; filename=data.csv.txt");
  
  if(isset( $_POST['content'])) 
  {
    $content = $_POST['content'];
    $content = str_replace(";", "\n", $content);
    
    print $content;    
  }
  else 
  {
    print "kein Inhalt gefunden";
  }

?>
