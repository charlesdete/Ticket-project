<?php
class Dbh{
    protected function connect(){
       try{
    // set DB connections configs
   
    $username = "charlie";
    $password = "root123@";
    $dbh = new PDO('mysql:host=localhost;dbname=event_ticket', $username,$password);
    return $dbh;  
} 
catch (PDOException $e){
   print "Error!:" .$e->getMessage()."<br/>"; 
    die(); 
      }
    }
}


?>