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
 
    $id=$_GET['id'];
    
    $sql="DELETE FROM tickets WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleted record: " . mysqli_error($conn);
      }
      
      mysqli_close($conn);
    
      
    
      header('Location:ticket-status.php');

}

?>