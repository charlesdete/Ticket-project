<?php
//  session_start();
//  $_SESSION['Email'] = $user[0]['Email'];
// if(!isset($_SESSION['Email'])){
//       header ('location:login.php'); 
//  }

?>


<!DOCTYPE html>
<html>
    <head> 
        <title>CREATE NEW Category </title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>  
    
<div class="navbar">
     <div class="icon">
       <h2 class="logo"><i class="uil uil-ticket"></i>TICKET</h2>
         </div>
           <div class="menu">
            <ul>
              <li><a href="about.php">ABOUT</a></li>
              <li><a href="services.php">SERVICES</a></li>
              <li><a href="contact.php">CONTACT</a></li>

              <?php
            if(isset($_SESSION['id']))
            {
            ?>
              
              <li><a href="logout.php">LOGOUT</a></li> 
            <?php
            }
            else
            {
              ?>
              <li><a href="signup.php">REGISTER</a></li> 
              <li><a href="login.php">LOGIN</a></li> 
              <?php
            }
              ?>
             
            </ul> 
           </div>
         </div>
        
 <div class="card2">
 <form action="add-category.inc.php" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?> method="POST">
      <div class="card-header">
      <h2>Create New Category</h2>
    </div>

         <div class="form-group ">
             
               <input type="text" name="Title" placeholder="Title" class="input-style"></br>
               <textarea rows="4" name="Description" placeholder="Description" class="input-style"></textarea>  
                <button type="submit" name="category"  class="button">New Category
                </button>
            
            </div>
          </form> 
         </div> 
    
    </body>
    
</html>