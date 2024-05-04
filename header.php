<?php


//database connection
$servername = "localhost";
$dbname = "event_ticket";
$dbusername = "charlie";
$dbpassword = "root123@";


 
$conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}
?>
<!Doctype html>
<html>
  <head>  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  
</head>
<body>
<div class="navbar">
     <div class="icon">
       <h2 class="logo"><i class="uil uil-ticket"></i><a href="index.php">TICKET</a></h2>
         </div>
           <div class="menu">
            <ul>
            <li><a href="about.php">ABOUT US</a></li>
              <li><a href="services.php">SERVICES</a></li>
              <li><a href="contact.php">CONTACT</a></li>
                    <?php
                    session_start();
                    
                    //running conditions based on the pages being accessed
                    if(isset($_SESSION['Email'])){
                  //if the session is not set show login 
                  ?>
                     <li><a href="logout.php"><i class="uil uil-sign-out-alt"></i>LOGOUT</a></li> 
                   
                  <?php

                    }else{
                      ?>
                      <li><a href="login.php"><i class="uil uil-sign-in-alt"></i>LOGIN</a></li> 
                   <li><a href="registration.php">REGISTER</a></li>
                        
                       <?php 

                    }?>

             <?php          
           
             if(isset($_SESSION['role']) && $_SESSION['role'] == 1 ){
              echo  ' <li><a href="dashboard.php">DASHBOARD</a> </li>'; 
             }
             else{            
              ?>
              <!-- <li><a href="cart.php">ADD CART</a></li>  -->
              <?php
            }

          
            
              ?>
             <!-- <li><a href="cart.php">ADD CART</a></li> --> 
            </ul> 
           </div>
         </div>
