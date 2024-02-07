<?php
include 'header.php';


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
$name=$_POST['Name'];
$subject=$_POST['Subject'];
$message=$_POST['Message'];
$email=$_POST['Email'];

   
    
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
    $mail->addAddress($email,'charles');     //Add a recipient
   
    

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);
    //Set email format to HTML
   
    $mail->Subject = $subject;
    $mail->Body =$message;
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", intial-scale="1.0">
        <title>TICKECT-CONCTACT</title>
        <link rel="stylesheet"  href="style.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link href="https://fonts.googleapis.com/css2?family=Monserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <body>
    <div class="card2">
        <div class="card-header">
            <h2>Contact Us</h2>
        </div>
        <form  action="<?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
           <div class="form-group ">
                 
           <input type="text" name="Name" placeholder="Name" class="input-style">
               <input type="text" name="Email" placeholder="Email" class="input-style">
               <input type="text" name="Subject" placeholder="subject" class="input-style">
               <textarea type="text" name="Message" placeholder="Message" class="input-style"></textarea>     
                <button type="submit" name="submit" class="button">Send Message
                </button>
          </div>
          
                 </form>
             </div>



    </body>
</html>