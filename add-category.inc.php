<?php

// session_start();
// $_SESSION['Email'] = $user[0]['Email'];
// if(!isset($_SESSION['Email'])){
//      header ('location:login.php'); 
// }



if(isset($_POST['category'])){

//Grabbing the data    
$title=$_POST['Title'];
$description=$_POST['Description'];


//instantiate SignupContr class
include "classes/dbh.class.php";
include "classes/add-category.class.php";
include "classes/add-category.contr.class.php";
$category = new CategoryContr($title,$description);

//Running error handlers and user signup
$category->addCategory();

//Going to the front page
header('location:Add-category.php');

} 
?>