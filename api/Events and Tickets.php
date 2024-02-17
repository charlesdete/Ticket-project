<?php

 session_start();
 $_SESSION['Email'] = $user[0]['Email'];
if(!isset($_SESSION['Email'])){
      header ('location:login.php'); 
 }

include_once 'header.php';
$servername = "localhost";
$dbname = "event_ticket";
$dbusername = "charlie";
$dbpassword = "root123@";
 
$conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}
//fetch categories from database
$query ="SELECT * FROM categories";
$categories =mysqli_query($conn,$query);
$category =mysqli_fetch_assoc($categories);
?>

<!DOCTYPE html>
<html>
    <head> 
        <title>CREATE NEW TICKECT </title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>       
        
 <div class="card2">
 <form action="ticket-inc.php" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?> method="POST">
      <div class="card-header">
      <h2>Create New Ticket</h2>
    </div>

         <div class="form-group ">
             
               <input type="text" name="Ticket" placeholder="Ticket" class="input-style"></br>
               
              
                
               <input type="date" name="Date"placeholder="Date" class="input-style">
                
               <input type="address" name="Location" placeholder="Location" class="input-style">
               <textarea rows="8" name="Body" placeholder="body" class="input-style"></textarea>
               <input type="file" class="input-style" name="Thumbnail" id="thumbnail">
               <select name="category" class="input-style">
                                
               <p>
                    <?php  while ($category_id = mysqli_fetch_assoc($categories)) :?>
                    <option value="<?= $category_id['id'] ?>"><?= $category_id['Title']?></option> 
                     <?php endwhile ?>
                    </p>
                </select>
                    
                     
                        <button type="submit" name="ticket"  class="button">Register
                </button>
            
            </div>
          </form> 
         </div> 
    
    </body>
   
</html>