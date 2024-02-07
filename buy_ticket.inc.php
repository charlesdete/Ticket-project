<?php

if(isset($_POST['submit'])){

    $firstname=$_POST['first_name'];
    $secondname= $_POST['second_name'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $cost= $_POST['cost'];

include ('dbh.class.php');
include ('buy_ticket.class.php');
include ('buy_ticket.contr.class.php');


$buy_ticket = new buy_ticketContr ($firstname,$secondname,$email,$phone,$cost);

$buy_ticket->buyTicket();

header ('Location:index.php');


}


?>
