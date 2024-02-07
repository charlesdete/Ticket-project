<?php

//database connection
$servername = "localhost";
$dbname = "event_ticket";
$dbusername = "charlie";
$dbpassword = "root123@";


 
$conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}

//get id
$sql="SELECT * FROM users ";
$query=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($query);


//GET CURRENT PAGE URL
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$currentURL= $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
$user_id=$result['id'];

$browser_name=$_SERVER['PHP_SELF'];
//get server related info
$user_ip_address= $_SERVER['REMOTE_ADDR'];

$user_agent = $_SERVER['HTTP_USER_AGENT'];

$sql="INSERT INTO user_activity_log (page_url,ip_address,browser_info,user_id,user_agent) VALUES ('$currentURL','$user_ip_address','$browser_name','$user_id','$user_agent ')";
$query=mysqli_query($conn,$sql);

?>