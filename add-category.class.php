<?php

session_start();
$_SESSION['Email'] = $user[0]['Email'];
if(!isset($_SESSION['Email'])){
     header ('location:login.php'); 
}

class addCategory extends Dbh{
  

    protected function setCategory($title,$description){

        $stmt = $this->connect()->prepare('INSERT INTO categories (Title,Description) VALUES (?,?);');
    
        if(!$stmt->execute(array($title,$description))){
            $stmt = null;
            header('location:Add-category.php?error=stmtfailed');
            exit();
        }
        $resultCheck= true;
 
        

    }  
}


?>