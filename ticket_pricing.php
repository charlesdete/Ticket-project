<?php
 
 include 'header.php';


?>
<!Doctype html>
<html>
  <head>
  <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", intial-scale="1.0">
        <title>Ticket Pricing</title>
        <link rel="stylesheet"  href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <script src="script.js" defer></script>
  </head>
  <body>
    <div class="card">
      <h5>Ticket Pricing</h5>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
<div class="col-md-4">
<label for="inputState" class="form-label">First Name</label>
    <input type="text" name="Firstname" placeholder="First Name" class="form-control" id="inputEmail4">
  </div>&nbsp;
<div class="col-md-4">
<label for="inputState" class="form-label">Last Name</label>
    <input type="text" class="form-control"  placeholder="Last Name" id="inputEmail4">
  </div></br>
<div class="col-md-4">
<label for="inputState" class="form-label">Email Address</label> 
    <input type="email" placeholder="Email" class="form-control" id="inputEmail4">
  </div>  &nbsp;
  <div class="col-md-4">
  <label for="inputState" class="form-label">Phone Number</label>
    <input type="text"   placeholder="Phone Number" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Ticket Type</label>
    <select id="inputState" placeholder="Ticket Type" class="form-control">
      <option selected>Choose...</option>
      <option>Adult</option>
      <option>Children</option>
    </select>
  </div>&nbsp;
  <div class="col-md-4">
    <label for="inputZip" class="form-label">Ticket Price</label>
    <input type="int"  placeholder="Ticket Price" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
    <button type="submit" class="btn">Price a ticket</button>
  </div>
</form>
    </div>
  </body>
</html>