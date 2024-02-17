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
        <h2>Login
        <span class="error"><?php  $emailErr; ?></span>
        <span class="error"><?php  $passwordErr; ?></span>
        </h2>
    <form action=" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
         <?php if(isset($_GET['error'])){?>
            <p class="error"><?php echo $_GET ['error'];?></p> 
       <?php  } ?>  
            
        <input type="email" name="Email" placeholder="Email" class="input-style">
          
        
        <input type="password" name="Password"  placeholder="Password" class="input-style">
        <span class="error"><?php  $passwordErr; ?></span>

            <div class="remember">
        <p><label for="rememeber-me">Remember me</label>
            <input type="checkbox" name="remember"></p>
        <button  type="submit" name="login"  class="button">login
        
        </button>
        <br/>
        
        <a href="registration.php"> Create an account </a></br>
        <a href="forgot-password.php">Forgotten Password</a>
    
         </form>
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

include 'header.php';
// define variables and set to empty values
 $emailErr =  $passwordErr =  "";
 $email =  $password = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    // clean the data/ remove special characters
    // include 'functions.php';


    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // declare the post variables from form input
    $email=validate($_POST['Email']);
    $password=validate($_POST['Password']);

    

    if (empty($_POST['Email'])) {
        echo "Enter your email address";
        
      } else{
        $email =validate($_POST['Email']);
     if( !filter_var($email, FILTER_VALIDATE_EMAIL)){ ;
        echo "Invalid email format";
    }
      }
    
      if (empty($_POST['Password'])) {
        echo "password is required";
        $error=1;
      } else {
        $password =validate($_POST['Password']);
        if (strlen($password) > 5 || strlen($password) < 12) {
                   $passwordErr = "Password should be between 5 and 12 characters long";
               }
           
               // Check if the password contains at least one alphabet character
               else if (!preg_match("/[a-zA-Z]/", $password)) {
                $passwordErr = "Password must contain at least one alphabet character";
            }
           
                // Check if the password contains at least one numeric character
               else if (!preg_match("/[0-9]/", $password)) {
                $passwordErr = "Password must contain at least one numeric character";
            }
               //        // Check if the password contains at least one symbol character
              else if (!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password)) {
                $passwordErr = "Password must contain at least one symbol character";
                } 
            }

    $sql="SELECT * FROM users WHERE Email='$email'";
    $query=mysqli_query($conn,$sql);
    $result=mysqli_fetch_assoc($query);
            
            
                // User with provided email found, verify password
                $hashedPassword = $result['Password'];
                
                if (password_verify($password, $hashedPassword)) {
                    // echo 'login success';
                    //  login was successfull.. proceed with setting cookies and sessions and redirecting
                    
                    $_SESSION['Email'] = $email;
                    
        
                    if(!empty($_POST['remember'])){
                        $set_remember = $_POST['remember'];
                        
                        // set session
                        $_SESSION['Email'] = $email;
                        //set cookie that will be used to auto login a user.
                        
                        setcookie('user_id', md5($result['id']),time()+3600);
                    }
                 
                    if(empty($_POST['remember'])){

                        //set temporary user email session
                        $_SESSION['Email']=$email;
                    }


                    // redirect logged in user to homepage
                     header('Location:index.php');
                } else {
                    echo "Invalid password";
                    // header('Location:login.php?error=Wrong credentials');
                }
                
            // No user with provided email found
        
}

?>