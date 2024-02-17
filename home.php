<?php

include 'header.php';


$servername = "localhost";
$dbname = "event_ticket";
$dbusername = "charlie";
$dbpassword = "root123@";
 
$conn =new mysqli($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}

//Fetch data from the database
$sql = "SELECT * FROM tickets WHERE is_featured= 1";
$query = mysqli_query($conn, $sql);
$result =mysqli_fetch_assoc($query);



?>
<!Doctype html>
<html>
  <head>  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="style1.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>

      <div class="wrapper-sub-nav">
         <div class="sub-nav">
         <ul>
              <li><a href="">MOVIES</a></li>
              <li><a href="">FESTIVALS</a></li>
              <li><a href="">TRAVELS</a></li>
              <li><a href="">GAMES</a></li>
            </ul> 
         </div>
      </div> 

        <div class="sub-body">
         <div class="wrapper">

         <div class="card">
         <img src="images/The-Equalizer-3.png">
         <div class="info">
        <h1>Movies</h1>
        <p>lorem ipsum is simply dummy text from the printing and typeseting</p>
        <a href="#" class="btn">Read More</a>   
          </div>
       </div>

       <div class="card">
         <img src="images/Festivals.jpg">
         <div class="info">
        <h1>FESTIVALS</h1>
        <p>lorem ipsum is simply dummy text from the printing and typeseting</p>
        <a href="#" class="btn">Read More</a>   
          </div>
       </div>

       <div class="card">
         <img src="images/harshil.jpg">
         <div class="info">
        <h1>TRAVELS</h1>
        <p>lorem ipsum is simply dummy text from the printing and typeseting</p>
        <a href="#" class="btn">Read More</a>   
          </div>
       </div>

       <div class="card">
         <img src="images/basketball.jpg">
         <div class="info">
        <h1>Games</h1>
        <p>lorem ipsum is simply dummy text from the printing and typeseting</p>
        <a href="#" class="btn">Read More</a>   
          </div>
       </div>
    </div> 
    </div>
    
    <!-- <form action="">
   <input  type="search" placeholder="Search..." id="">
      </form> -->

    

    <div class="movies">
    <div class="text-box">
    <h1>TICKETS</h1>    
    </div>
          <!-- <div class="slide">
          <img src="images/<?= $result['Thumbnail'] ?>"  class="slide-img" alt="">
          <div class="slide-body">
            <h1 class="slide-title"><?= $result['Title'] ?></h1>
            <p class="slide-sub-title"><?= $result['Date'] ?></p>
            <p class="slide-info"><?= $result['Body'] ?></p>

            <button class="slide-btn">Order ticket</button>
          </div>
          </div>
          <div class="slide">
          <img src="images/<?= $result['Thumbnail'] ?>"  class="slide-img" alt="">
          <div class="slide-body">
            <h1 class="slide-title"><?= $result['Title'] ?></h1>
            <p class="slide-sub-title"><?= $result['Date'] ?></p>
            <p class="slide-info"><?= $result['Body'] ?></p>

            <button class="slide-btn">Order ticket</button>
          </div>
          </div>
          <div class="slide">
          <img src="images/<?= $result['Thumbnail'] ?>"  class="slide-img" alt="">
          <div class="slide-body">
            <h1 class="slide-title"><?= $result['Title'] ?></h1>
            <p class="slide-sub-title"><?= $result['Date'] ?></p>
            <p class="slide-info"><?= $result['Body'] ?></p>

            <button class="slide-btn">Order ticket</button>
          </div>
          </div>
          <div class="slide">
          <img src="images/<?= $result['Thumbnail'] ?>"  class="slide-img" alt="">
          <div class="slide-body">
            <h1 class="slide-title"><?= $result['Title'] ?></h1>
            <p class="slide-sub-title"><?= $result['Date'] ?></p>
            <p class="slide-info"><?= $result['Body'] ?></p>

            <button class="slide-btn">Order ticket</button>
          </div>
          </div> -->

          <?php while ($result = mysqli_fetch_assoc($query)): ?>
  <div class="slide">
    <img src="images/<?= $result['Thumbnail'] ?>" class="slide-img" alt="">
    <div class="slide-body">
      <h1 class="slide-title"><?= $result['Title'] ?></h1>
      <p class="slide-sub-title"><?= $result['Date'] ?></p>
      <p class="slide-info"><?= $result['Body'] ?></p>
      <button class="slide-btn">Order ticket</button>
    </div>
  </div>
<?php endwhile; ?>
  
  </div> 
         </div>














         
   <div class="scroll-down">
    <a href="#"><i class="uil uil-arrow-circle-down"></i>  </a>
   </div>
</body>
</html>
