<?php


 include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Login</title>
 <link rel="stylesheet" href="style.css">
</head>
    <body>
    <div class="card2">
<div class="card-header">
        <h2>Forgot Password
        <span class="error"><?php  $emailErr; ?></span>
        <span class="error"><?php  $passwordErr; ?></span>
        </h2>
    <form action=" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
         <?php if(isset($_GET['error'])){?>
            <p class="error"><?php echo $_GET ['error'];?></p> 
       <?php  } ?>  
        <input type="email" name="Email" placeholder="Email" class="input-style">
        <button  type="submit" name="reset"  class="button">Reset 
        </button>
        <br/>
         </form>
         <?php
           if(isset($_GET['reset'])){
            if($_GET['reset'] == "success"){
                echo '<p class="signupsuccess">Check your email!</p>';
            }
           }
         ?>
            </div>
               </div>
                 </div>
        </div>

    </body>
</html>


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


     //phpmailer
    //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){


$useremail=$_POST['Email'];

$selector = bin2hex(random_bytes(8));
$token = random_bytes(32);
$url = "localhost:8090/create-new-password.php?selector=" .$selector ."&validator=". bin2hex($token);    
  


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'charlesdete52@gmail.com';                     //SMTP username
    $mail->Password   = 'lrkxkwvmisnyptrp';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('charlesdete52@gmail.com', 'charles');
    $mail->addAddress($useremail,'charles');     //Add a recipient
   
    

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);
    //Set email format to HTML
   
    $message = '<p>We received a password reset request.The link to reset your passwordis below</p>';
    $message .= '<a href="'.$url .'">' .$url . '</a></p>';  
    $mail->Body = $message;
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
   

   

    $mail->send();
    echo 'Message sent.Check your email'; 
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

   $selector = bin2hex(random_bytes(8));
   $token = random_bytes(32);
   
   
   $url = "localhost:8090/create-new-password.php?selector=" .$selector ."&validator=". bin2hex($token); 
  
   $expires = date("U") + 1800; 

    $userEmail =$_POST['Email'];

    $sql= "DELETE FROM passwordreset WHERE passwdresetEmail=?";
    $stmt =mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "there was an error";
        exit();
    }else{
       mysqli_stmt_bind_param($stmt,"s",$userEmail);
        mysqli_stmt_execute($stmt);
    }
 
    $sql = "INSERT INTO passwordreset (passwdresetEmail, passwdresetSelector,passwdresetToken,passwdresetExpires) VALUES (?,?,?,?)";
    $stmt =mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "there was an error";
        exit();
    }else{

       $hashedToken = password_hash($token,PASSWORD_DEFAULT); 
       mysqli_stmt_bind_param($stmt,"ssss",$userEmail,$selector,$hashedToken,$expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
   
   


   

    // header("Location:../forgot-password.php?reset=success");
}else{
    // header ('location:/');
}


?>
