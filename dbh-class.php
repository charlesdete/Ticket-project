<?php
class dbh{
   
    private $servername;
    private $username;
    private $password;

    private $dbname;
    
    protected function connect(){

      $this->servername = "localhost";
      $this->username = "charlie";
      $this->password = "root123@";
      $this->dbname = "event_ticket";
    // Create connection
    $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    return $conn;
    
    }
}


?>