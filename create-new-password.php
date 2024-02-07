<?php
//database connection
$servername = "localhost";
$dbname = "event_ticket";
$dbusername = "charlie";
$dbpassword = "root123@";


 
$conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}

include 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>New Password</title>
 <link rel="stylesheet" href="style.css">
</head>
    <body>

   
    <div class="card2">
<div class="card-header">
        <h2>New Password </h2>
        
       
         <form action="<?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <input type="hidden" name="selector" value="<?php echo  $selector ?>">
        <input type ="hidden" name="validator" value="<?php echo $validator ?>">
        <input type="password" name="password" class="input-style" placeholder="Enter a new password...">
        <input type="password" name="password_repeat" class="input-style" placeholder="Repeat new password">
        <button type="submit" class="button" name="reset-password">Reset Password</button>
         </form> 
        
        </div>
               </div>
                 </div>
        </div>

    </body>
</html>
<?php 


if($_SERVER["REQUEST_METHOD"] == "POST"){

  $selector = $_GET["selector"];
  $validator = $_GET['validator'];

 if (empty($selector) || empty($validator)){
   echo 'Could not validate your request!';

 }else{
   if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false);
 }
   



    $selector=$_POST['selector'];
    $validator=$_POST['validator'];
    $password=$_POST['password'];
    $passwordRepeat=$_POST['passwordrepeat'];

    if (empty($password) || empty($passwordRepeat)){
    header('Location:create-new-password.php?newpwd=empty');
    exit();

    }else if ($password != $passwordRepeat){
        header('Location:create-new-password.php?newpwd=pwdnotsame');
        exit(); 
    }

    $currentDate = date("U");

    $sql ="SELECT * FROM  passwordreset WHERE passwdresetSelector=? AND passwdresetExpires >= ?;";
    $stmt =mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "there was an error";
        exit();
    }else{
       mysqli_stmt_bind_param($stmt,"s",$selector);
        mysqli_stmt_execute($stmt);
    
     $result =mysqli_stmt_get_result($stmt);
    
     if(!$row = mysqli_fetch_assoc($result)){
       echo "You need to re-submit your reset request";
       exit();
     }else{

        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin,$row['passwdresetToken']);

        if($tokenCheck === false){
            echo "You need to re-submit your reset request.";
            exit();
        }elseif($tokenCheck === true){

            $tokenEmail = $row['passwdresetEmail'];

          $sql = "SELECT * FROM  users WHERE Email=?;";
          $stmt =mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "there was an error";
        exit();
    }else{
     mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
     mysqli_stmt_execute($stmt);
     $result =mysqli_stmt_get_result($stmt);
    
     if(!$row = mysqli_fetch_assoc($result)){
       echo "There was an error!";
       exit();
     }else{
     

        $sql="UPDATE users SET  Password=? WHERE  Email=?";
        $stmt =mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "there was an error";
            exit();
        }else{

         $newpasswdhash= password_hash($password,PASSWORD_DEFAULT);   
         mysqli_stmt_bind_param($stmt,"ss",$newpasswdhash,$tokenEmail);
         mysqli_stmt_execute($stmt);

         $sql= "DELETE FROM passwordreset WHERE passwdresetEmail= ?";
         $stmt =mysqli_stmt_init($conn);

          if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "there was an error";
           exit();
        }else{
           mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
          mysqli_stmt_execute($stmt);
           header ('Location:registration.php?newpasswd=passwdupdated');
         }
        }
     }
        }
    }
     }
     }

}else{
    // header('Location:../');
}