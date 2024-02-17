<?php

class buy_ticket extends Dbh{

function setTicket($firstname, $secondname, $email, $phone, $cost){

    $stmt= $this->connect()->prepare('INSERT INTO buy_ticket (first_name,second_name,email,phone,cost) VALUES (?,?,?,?,?);');
   
    if(!$stmt->execute(array($firstname, $secondname, $email, $phone, $cost))){
    $stmt = null;
   header('Location:buy_ticket.php?error=stmtfailed');
   exit();
}
$resultCheck= true;
}
}
?>

