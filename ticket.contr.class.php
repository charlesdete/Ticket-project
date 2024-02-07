<?php
//  session_start();
//  $_SESSION['Email'] = $user[0]['Email'];
// if(!isset($_SESSION['Email'])){
//       header ('location:login.php'); 
//  }



class TicketContr extends Ticket {

    private $title;
    private $date;
    private $location;
    private $image;
    private $category;
    private $body;
    private $featured;
    private $price;

 public function __construct($title,$date,$location,$image,$category,$body,$featured,$price){
    $this->title = $title;
    $this->date = $date;
    $this->location = $location;
    $this->image = $image;
    $this->category = $category;
    $this->body = $body;
    $this->featured = $featured;
    $this->price = $price;
 }

 public function AddTicket(){
  if($this->emptyInput() == false){
    //echo "Empty input!";
    header('location:Add-ticket.php?error=emptyinput');
    exit();
  }
  
 
  $this->setTicket( $this->title,$this->date,$this->location, $this->image,$this->category,$this->body,$this->featured, $this->price);
 }

 private function emptyInput() {
    $result= true;
    if(empty($this->title)|| empty($this->date) || empty($this->location) || empty($this->body) || empty($this->category) || empty($this->image) ){
      $result =false;
    }
    return $result;
 }

}

?>