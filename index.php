<?php
include 'header.php';


 if(!isset($_SESSION['Email'])){
       header ('location:login.php'); 
  }


require 'dbh-class.php';


class buy_ticket extends Dbh{

  function feature($featured){
  
      $stmt= $this->connect()->prepare('SELECT * FROM tickets WHERE is_featured=1";) VALUES (?);');
     
      if(!$stmt->execute(array($featured))){
      $stmt = null;
     header('Location:index.php?error=stmtfailed');
     exit();
  }
  $resultCheck= true;
  }
  }
  
include 'log_user_activity.php';


//fetch 9 posts from posts table
$query = "SELECT * FROM tickets ORDER BY Date DESC LIMIT 9";
$tickets=mysqli_query($conn,$query);




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", intial-scale="1.0">
        <title>Tickets</title>
        <link rel="stylesheet"  href="style1.css">
        <link rel="stylesheet"  href="footer.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <script src="script.js" defer></script>
   
    </head>
    <body>
    
         <section class="wrapper-carousel">
           <div class="cover">
            <i id="left" class="fa-solid fa-angle-left"></i>
             <div class="carousel">
              
                <img src="images/lebron.jpg" alt="img">
                
                <img src="images/Festivals.jpg" alt="img">

                <img src="images/upcoming-events.jpg" alt="img">

                <img src="images/spider.jpg" alt="img">

                <img src="images/all-events.jpg" alt="img">
                
                <img src="images/cypher.jpg" alt="img">

                <img src="images/events.jpg" alt="img">

             </div>
             <i id="right"  class="fa-solid fa-angle-right"></i>
           </div> 
         </section>

       
         <section class="tickets">
         <?php while ($ticket = mysqli_fetch_assoc($tickets)): ?> 
           <div class="thumbnail_container">
              <div class="thumbnail">         
                  <img src="images/<?= $ticket['Thumbnail'] ?>">
              
              <div class="details_container">
              <?php
                 //fetch category from categories table using category_id of posts table
                 $category_id= $ticket['id'];
                 $category_query= "SELECT * FROM tickets WHERE id= $category_id";
                 $category_result = mysqli_query($conn,$category_query);
                 $category =mysqli_fetch_assoc($category_result);
                 $category_title = $category['Categories_title'];
                      ?>
              <a href="ticket-post.php?id=<?= $category['id'] ?>" class="category_button"><?=$category_title ?></a> 
              <table>
            <thead>
     
                <?= date("M d, Y ",strtotime($ticket['Date'])) ?>
                &nbsp; 
                <?= $ticket['Location'] ?>
               
            </thead>
            
              </table>
              
        <!-- <form action="index.php?id=<?php echo $ticket['id'] ?>" method="POST">
        <input type="hidden" id="quantity" name="quantity" value="1">
        <input type="hidden" name="title" value="<?php echo $ticket['Title'] ?>">
        <input type="hidden" name="price"   value="<?php echo $ticket['price'] ?>">
         <a href="buy_ticket.php?id=<?= $ticket['id'] ?>" class="buy" >Add to Cart</a> 
        <input type="submit" name="Add_to_cart" class="add" value="Add To Cart"> 
        </form> -->

        <a href="buy_ticket.php?id=<?= $ticket['id'] ?>" class="buy" >Add to Cart</a>
          </div>
              </div>
           </div>
           <?php endwhile ?>  
         </section>
        

         <?php
         include 'footer.php';
         ?>

    </body>
</html>