<?php

// session_start();
//  if(!isset($_SESSION['Email'])){
//     header ('Location:login.php');
//  }
$servername = "localhost";
$dbname = "event_ticket";
$dbusername = "charlie";
$dbpassword = "root123@";
 
$conn =new mysqli($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}

include 'header.php';

//fetch post from database if id  is set
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM tickets WHERE  id = $id";
    $result = mysqli_query($conn, $query);
    $ticket=mysqli_fetch_assoc($result);
    }else{
    //    // header('location:index.php');
    //    // die();
    } 

   
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

    <section class="singleticket">
    <h5 class="ticket_title"><?= $ticket['Title'] ?> </h5>
                        
            <div class="ticket-details">
                <img src="images/<?= $ticket['Thumbnail'] ?>" class="singleticket_thumbnail"> 
            
          <div class="singleticket_details">
             <p> <?=substr( $ticket['Body'],0, 300) ?>...</p>
            <p> Date: <?= date("M d, Y",strtotime($ticket['Date'])) ?></p> 
              <p>Location: <?= $ticket['Location'] ?></p>   
              <p>Cost:Ksh. <?= $ticket['price'] ?></p> 
              <!-- <p>Host: <?= $ticket['Host']?> </p>      -->
              <form  action="" method="POST">
              <label for="no of tickets">Indicate number of tickets</label>
              <select type="submit" name="quantity" id="no of tickets">
              <option value="2">2</option>
              <option value="3">3</option>
             <option value="4">4</option>
             <option value="5">5</option>
             <option value="6">6</option>
             <option value="7">7</option>
             <option value="8">8</option>
             <option value="9">9</option>
             <option value="10">10</option>
             </select>
  </br>
             <button type="submit" name="submit">Update</button>

              </form>
            
             <?php
if(isset($_POST['submit'])){
    $quantity = $_POST['quantity'];
    $price= $ticket['price'];

    $total_cost= $_POST['quantity'] * $ticket['price'];

    echo "<p>Total Cost:Ksh.". $total_cost."</p>";
  
}


?>

          </div>
            </div>
  </br>
        <div class="ticket_form">
     <form  action="buy_ticket.inc.php" method="POST">
    <h2>Enter the required details</h2>
      <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
      <input type="text" class="form-control" name="second_name" placeholder="Second Name" required>
      <input type="text" class="form-control" name="email" placeholder="Email Address" required>
      <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
      <input type="text" class="form-control" name="cost" placeholder="Ticket Cost" value="<?= $total_cost ?>" required>
      <button type="submit" name="submit" class="btn-buy" >Proceed for payment </button>
    </form>
        </div>
    </section>
  </br>
    

</body>
 
</html>

