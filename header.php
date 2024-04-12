<?php
session_start();
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
              
              <li><a href="services.php">SERVICES</a></li>
              <li><a href="contact.php">CONTACT</a></li>

              <?php
            if(isset($_SESSION['Email'] ))
            {
            ?> 
              <li><a href="logout.php">LOGOUT</a></li> 
            <?php
               $sql = "SELECT * FROM users where role = 1";
               $query= mysqli_query($conn,$sql);
               $userrole= mysqli_fetch_assoc($query);
                

           if($userrole == true){
             ?> 
             <li><a href="dashboard.php">Admin</a></li> 
           <?php  
           }
            }
            else
            {
              ?>
              <li><a href="registration.php">REGISTER</a></li> 
              <li><a href="login.php">LOGIN</a></li> 
              <?php
            }

           
              ?>
             <li><a href="cart.php">ADD CART</a></li>
            </ul> 
           </div>
         </div>