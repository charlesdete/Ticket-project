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
    <h5><?= $ticket['Title'] ?></h5>
        <div class="singleticket_container">                
                
            <div class="singleticket_thumbnail">
                <img src="images/<?= $ticket['Thumbnail'] ?>" class="singleticket_thumbnail"> 
            </div>
          <div class="singleticket_details">
             <p> <?=substr( $ticket['Body'],0, 300) ?>...</p> 
               
            <p> Date: <?= date("M d, Y",strtotime($ticket['Date'])) ?></p> 
              <p>Location: <?= $ticket['Location'] ?></p>   
              <p>Cost: <?= $ticket['price'] ?></p>      
          </div>
        </div>
    </section>
</br>
          <!---end of singlepost-->
    <form  action="buy_ticket.inc.php" method="POST" class="buy_ticket">
    <h2>Fill in to purchase</h2>
      <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
      <input type="text" class="form-control" name="second_name" placeholder="Second Name" required>
      <input type="text" class="form-control" name="email" placeholder="Email Address" required>
      <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
      <input type="text" class="form-control" name="cost" placeholder="Ticket Cost" required>
      
      <button type="submit" name="submit" class="btn-buy" >Buy </button>
    </form>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ticket</th>
      <th scope="col">Cost</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?= $ticket['Title'] ?></td>
      <td><?= $ticket['price'] ?></td>
      <td></td>
    </tr>
    
   
  </tbody>
</table>

</body>
</html>

