<?php
// session_start();
//  $_SESSION['Email'] ;
// if(!isset($_SESSION['Email'])){
//       header ('location:login.php'); 
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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage tickets</title>
    <link rel="stylesheet" href="display_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
 <div class="container"> 
 
<button type="submit" name="submit" class="btn btn-primary my-5"><a href="Add-ticket.php" class= "text-light">Add Ticket</a></button>
 

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Status</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>



  <?php
$sql="SELECT *FROM tickets";
$result=mysqli_query($conn,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $title =$row['Title'];
        $status =$row['is_featured'];
        
        echo'<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$title.'</td>
        <td>'.$status.'</td>
        
        <td>
        <button class="btn btn-primary"><a href="ticket-update.php?id='.$id.'" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="ticket-delete.php?id='.$id.'" class="text-light">Delete</a></button>
     </td>
       </tr>';
    }
}


  ?>
 
  </tbody>
</table>

 </div>

</body>
</html>