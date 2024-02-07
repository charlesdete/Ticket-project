<?php

//  session_start();
//  $_SESSION['Email'] = $user[0]['Email'];
// if(!isset($_SESSION['Email'])){
//       header ('location:login.php'); 
//  }

class Ticket extends Dbh{

    protected function setTicket($title,$date,$image,$location,$category,$body,$featured,$price){

        $stmt = $this->connect()->prepare('INSERT INTO tickets (Title,Date,Thumbnail,Location,Categories_title,Body,is_featured,price) VALUES (?,?,?,?,?,?,?,?);');
        if(!$stmt->execute(array($title,$date,$image,$location,$category,$body,$featured,$price))){
            $stmt = null;
            header('location:Add-ticket.php?error=stmtfailed');
            exit();
        }
        $resultCheck= true; 
    }

}
?>