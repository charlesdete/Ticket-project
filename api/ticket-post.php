<?php

$servername = "localhost";
$dbname = "event_ticket";
$dbusername = "charlie";
$dbpassword = "root123@";
 
$conn =new mysqli($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}

$featured_query= "SELECT * FROM tickets WHERE is_featured=1";
$featured_result =mysqli_query($conn,$featured_query);
$featured =mysqli_fetch_assoc($featured_result);

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", intial-scale="1.0">
        <title>Tickets</title>
        <link rel="stylesheet"  href="style1.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <script src="script.js" defer></script>
   
    </head>
    <body>
 <!--show featured post if there`s any-->
 <?php if(mysqli_num_rows($featured_result) == 1) : ?>
           <section class="featured">
          
            <div class="container post">
                <div class="post_thumbnail">
                    <img  src="images<?= $featured['thumbnail'] ?>">
                    
                </div>
               
                <div class="post_info">
                 <?php
                 //fetch category from categories table using category_id of posts table
                 $category_id= $featured['id'];
                 $category_query= "SELECT * FROM categories WHERE id= $category_id";
                 $category_result = mysqli_query($conn,$category_query);
                 $category =mysqli_fetch_assoc($category_result);
                 $category_title = $category['title'];
                      ?>
                    <a href="category-post.php?id=<?= $category['id'] ?>" class="category_button"><?=$category_title ?></a>       

                    <h2 class="post_title"><a href="post.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a></h2>
                    <p class="post_body">
                    <?=substr( $featured['body'],0, 300) ?>...
                    </p>
                    
                    <div class="post_author">
               <?php 
                //fetch author from users table using id
                $author_id=$featured['id'];
                $author_query = "SELECT * FROM users WHERE id=$author_id";
                $author_result =  mysqli_query($conn,$author_query);
               $author = mysqli_fetch_assoc($author_result);
               ?>
                <div  class="post_author-avatar">
                     <img src="images<?= $featured['thumbnail'] ?>">
                     
                      </div>
                      <div class="post_author-info">
                        <!-- <h5>by: <?= "{$author['Name']}" ?></h5> -->
                        <small>
                            <?= date("M d, Y = H:i",strtotime($featured['date_time'])) ?>
                        </small>
                    </div>
                </div>
                </div>
                
            </div>
          
          </section>

          <?php endif ?>
    </body>
</html>