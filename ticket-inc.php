<?php
// session_start();
// $_SESSION['Email'] = $user[0]['Email'];
// if(!isset($_SESSION['Email'])){
//      header ('location:login.php'); 
// }

if(isset($_POST['ticket'])){
//Grabbing the data    
$title=$_POST['Title'];
$category=$_POST['Categories_title'];
$date=$_POST['Date'];
$location=$_POST['Location'];
$image=$_POST['Thumbnail'];
$body=$_POST['Body'];
$featured=$_POST['is_featured'];
$price =$_POST['price'];
//instantiate SignupContr class
include "dbh.class.php";
include "ticket.class.php";
include "ticket.contr.class.php";
$ticket = new TicketContr($title,$date,$image,$location,$category,$body,$featured, $price);

//Running error handlers and user signup
$ticket->AddTicket();

//Going to the front page
header('location:Add-ticket.php');
 
}
?>