<?php



include 'header.php';
$email = $_SESSION['Email'];



include 'dbh.class.php';
include 'user-profile.class.php';
include 'user-profile.contr.class.php';



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", intial-scale="1.0">
        <title>Tickets</title>
        <link rel="stylesheet"  href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <script src="script.js" defer></script>
   
    </head>
 <body>

 <section class="profile">
     <div class="profile-wrapper">
        <div class="card2">

        <div class="profile-info">
           <div class="profile-info-img">
             <p>Charles</p>
             <div class="break" ></div>
           </div>

           <div class="profile-info-about">
            <h3>ABOUT</h3>
            <p>
       <?php
$userProfile = new user_profileContr($email);
$userProfile->showProfile();
        ?>
            </p>
        </div>

        </div>

     </div>
 </section>

 <?php


   

    

   






?>