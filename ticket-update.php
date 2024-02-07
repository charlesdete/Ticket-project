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


if(isset($_GET['id'])){
 $id = $_GET['id'];
 
 $sql = "SELECT * FROM tickets WHERE id= $id";
 $query = mysqli_query($conn,$sql);
 $ticket =mysqli_fetch_assoc($query);

}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", intial-scale="1.0">
        <title>Ticket Update</title>
        <link rel="stylesheet"  href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <script src="script.js" defer></script>
   
    </head>
    <body>
    <div class="card2">
<div class="card-header">
        <h2>Update Ticket
        <span class="error"><?php  $nameErr; ?></span>
        <span class="error"><?php  $emailErr; ?></span>
        </h2>
    <form action=" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
         <?php if(isset($_GET['error'])){?>
            <p class="error"><?php echo $_GET ['error'];?></p> 
       <?php  } ?>  
            
       <input type="hidden" name="id" value="<?=$_GET['id'] ?>" >
       <input type="text" name="Title" value="<?= $ticket['Title'] ?>" placeholder="Title"  class="input-style">
        <input type="text" name="Location" value="<?= $ticket['Location'] ?>" placeholder="Location"  class="input-style">
        <input type="numbers" name="Date"  placeholder="Event Date" value="<?= $ticket['Date'] ?>" class="input-style">
        <input type="file" name="Thumbnail" value="<?= $ticket['Thumbnail'] ?>" placeholder="Photo"  class="input-style">
        <button  type="submit" name="update-ticket"  class="button">Update Ticket
        
        </button>
    </body>
</html>
<?php



if(isset($_POST['update-ticket'])){
    $id= $_POST['id'];
   $title = $_POST['Title'];
   $thumbnail = $_POST['Thumbnail'];
   $location = $_POST['Location'];
   $date = $_POST['Date'];

   $sql = "UPDATE tickets SET Title='$title', Thumbnail='$thumbnail', Location='$location', Date='$date'  WHERE id=$id";

   if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);

  header('Location:ticket-status.php');
  exit();


}

?>