<?php




include "dbh_class.php";
include "header.php";
?>

<!Doctype html>
<html >
<head>
<meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER  ROLE </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<body>       
        
        <div class="card2">
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
             <div class="card-header">
             <h2>Change userrole here!</h2>
           </div>
                <?php ?> 
                <div class="form-group ">
                    
                      <input type="text" name="Name" placeholder="Name" class="input-style"></br>
                      <span class="error"><?php  $nameErr; ?></span>
       
                      <input type="email" name="Email" placeholder="Email" class="input-style">
                      <span class="error"><?php  $emailErr; ?></span>
<!--        
                      <input type="password" name="Password"placeholder="Password" class="input-style">
                      <span class="error"><?php  $passwordErr; ?></span> -->
                       
                      <select class="input-style" placeholder="Choose role" name="role" >
                        <option value="0" >Normal User</option>
                        <option value="1" >Admin </option>
                      </select> 
               
                      </br>
                     <div >
                      <button type="submit" name="Change"  class="button">Update role
                    </div>  
                   </div>
                  
                 </form>

        </div>
</body>
</html> 

<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){

  $name = htmlspecialchars($_POST['Name'], ENT_QUOTES, 'UTF-8');
  $email = htmlspecialchars($_POST['Email'], ENT_QUOTES, 'UTF-8');
  $role = htmlspecialchars($_POST['role'], ENT_QUOTES, 'UTF-8');

  //include necessary files 
  include 'dbh.class.php';
  include 'admin_class.php';
  include 'admin_contr.class.php';

  $userrole = new ChangeRole($name,$email,$role);

  $userrole->showRole();
}

?>