<?php

 
//  $_SESSION['Email'] = $user[0]['Email'];
// if(!isset($_SESSION['Email'])){
//       header ('location:login.php'); 
//  }

// include 'dbh-class.php';
  
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
$sql = "SELECT * FROM categories ";
$query= mysqli_query($conn,$sql);
$results = mysqli_fetch_assoc($query);


include 'header.php';
?>

<!DOCTYPE html>
<html>
    <head> 
        <title>CREATE NEW TICKECT </title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>       
        <section class="card2-wrapper">
 <div class="card2">
 <form action="ticket-inc.php" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?> method="POST">
      <div class="card-header">
      <h2>Create New Ticket</h2>
    </div>
         <div class="form-group ">
             
               <input type="text" name="Title" placeholder="Title" class="input-style"></br>
               
               <input type="date" name="Date"placeholder="Date" class="input-style">
                
               <input type="address" name="Location" placeholder="Location" class="input-style">
               <input  name="Body" placeholder="Body" class="input-style">
               <input type="file" class="input-style" name="Thumbnail" id="thumbnail">
               <input type="int" name="price" placeholder="Ticket Price" class="input-style">
               <input type="checkbox" value="1" name="is_featured" class="input-style">
               <label>Category</label> 
               <select name="Categories_title" class="input-style">              
               <p>
                    <?php  while ($results = mysqli_fetch_assoc($query)) :?>
                    <option value="<?= $results['id'] ?>"><?= $results['Title']?></option> 
                     <?php endwhile ?>
                    </p>
                </select>
                    
                     
                        <button type="submit" name="ticket"  class="button">Add Ticket
                </button>
            
            </div>
          </form> 
         </div> 
    
        </section>
</body>
        <!-- <footer>
            <div class="footer_socials">
                <a href="https://youtube.com/egatortutorials" target="_blank"><i class="uil uil-youtube"></i></a>
                <a href="https://facebook.com/egatortutorials" target="_blank"><i class="uil uil-facebook-f"></i></a>
                <a href="https://instagram.com/egatortutorials" target="_blank"><i class="uil uil-instagram-alt"></i></a>
                <a href="https://linkedin.com/egatortutorials" target="_blank"><i class="uil uil-linkedin"></i></a>
                <a href="https://twitter.com/egatortutorials" target="_blank"><i class="uil uil-twitter"></i></a>
            </div> 
            <div class="container footer_container">
                <article>
                    <h4>Categories</h4 >
                        <ul>
                            <li><a href="art.html">Art</a></li>
                            <li><a href="wildlife.html">Wild Life</a></li>
                            <li><a href="">Travel</a></li>
                            <li><a href="">Music</a></li>
                            <li><a href="">Science & Technology</a></li>
                            <li><a href="food.html">Food</a></li>
                        </ul>
                </article>
              </div>
              <div class="footer_copyright">
                <small>Copyright &copy;SPECTACULAR VIEWS </small>
              </div>
          </footer> -->
    
    <script>
  button =document.querySelector(".button");
  button.onclick =function(){
  this.innerHTML = "<div class='loader'></div>";
 setTimeout(() =>{
 this.innerHTML = " Successful!";
 this.style = "background:#eee; color:#2d2b7c; pointer-events:none";
   },2000);
  }
 </script> 
</html>
<?php
// include_once 'footer.php';
?>