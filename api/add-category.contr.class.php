<?php

 session_start();
 $_SESSION['Email'] = $user[0]['Email'];
if(!isset($_SESSION['Email'])){
      header ('location:login.php'); 
 }


class CategoryContr extends addCategory{
    private $title;
    private $description;
   
     
 public function __construct($title,$description){
    $this->title = $title;
    $this->description = $description;
   
 }

 public function  addCategory(){
  
  if($this->invalidTitle() == false){
     //echo "Empty user title!";
     header('location:Add-category.php?error=username');
     exit();
  }
 

  $this->setCategory($this->title,$this->description);
 }

 private function emptyInput() {
    $result= true;
    if(empty($this->title)|| empty($this->description) ){
      $result =false;
    }
    return $result;
 }
  private function invalidTitle(){
    $result= true;
    if(!preg_match("/^[a-zA-z0-9]*$/", $this->title))
    {
        $result = false;
    }
    return $result;
  }
   
}