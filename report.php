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
<Doctype html>
<html>
  <head>  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Page</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <script type="text/javascript" src="js/jquery-1.12.4.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
$(function(){
    $("#from_sales").datepicker();

});
 </script>
 <script>
    $(function(){
    $("#to_sales").datepicker();
     });
 </script>    

</head>
  <body>
  <div class="card2">
  <h2>REPORT</h2>
  <br>
  <button class="button"><a href="additem.php">Add item</a></button>
  <br>

  
  <form action="<?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <fieldset>
      <div class="row">
       <div class="col-md-4">
         <div class="form-group">
            <label control-label style="text-align:left;">Your Choice</label>
         </div>
         <div class="form-group">
            <select name="filterChoice" class="form-control">
                 <option value="0">Select</option>
                 <option value="1">Last 7 days ticket sales</option>
                 <option value="1">Last  2weeks ticket sales</option>
                 <option value="1">Last 21 days ticket sales</option>
                 <option value="1">Last 28 days ticket sales</option>
            </select>
         </div>
         <div class="form-group">
           <label class="col-lg-10 control-label" style="text-align:left;">Ticket Sale</label>
         </div>
        <div class="form-group">
           <input type="text" id="from_sales" class="form-control" name="from_sales">
       </div>
       <div class="form-group">
           <input type="text" id="to_sales" class="form-control" name="to_sales">
       </div>
       <div class="form-group">
          <button  value="submit" name="choice" class="button">Submit</button>
       </div>
       </div>

       <div class="col-lg-8">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Ticket Name</th>
                    <th scope="col">Customer Mobile</th>
                    <th scope="col">Purchased Ticket</th>
                    <th scope="col">Price Paid</th>
                    <th scope="col">Purchased Date</th>
                </tr>
            </thead>
            <tbody>   
              <?php
              if(!isset($_POST['choice'])){
                $query="SELECT * FROM filter";
                getData($query);
              }elseif(isset($_POST['choice'])){
                $from_sales=$_POST['from_sales'];
                $from_sales =strtotime($from_sales);
                 $fsales = date("Y/m/d",$from_sales);
                $to_sales =$_POST['to_sales'];
                $to_sales = strtotime($to_sales);
                $tsales = date("Y/m/d", $to_sales);

             switch($_POST['filterChoice']){
                case "1":
            // last 7 days 
            $sql="SELECT * FROM filter WHERE purchased_date > DATE_SUB(NOW(),INTERVAL 7 DAY) ORDER BY DAY(purchased_date)";
            getData($sql);
            break;
            case "2":
                $sql="SELECT * FROM filter WHERE purchased_date > DATE_SUB(NOW(),INTERVAL 28 DAY) ORDER BY DAY(purchased_date)";
                getData($sql);   
             }
            }
             ?>
            </tbody>
        </table>            
       </div>
      </div>
    </fieldset>
  </form>  
  </div>
</body>
</html>

<?php


function getData($sql){
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
   $sql="SELECT * FROM filter";
    $data = mysqli_query($conn,$sql) or die('error');
    if(mysqli_num_rows($data)){
        while($row = mysqli_fetch_assoc($data) > 0){
            $id = $row['id'];
            $customerName =$row['customer_name'];
            $customerMobile= $row['customer_mobile'];
            $ticketPurchased = $row['ticket_purchased'];
            $pricePaid = $row['price_paid'];
            $purchasedDate = $row['purchased_date'];
            $date = date("d/m/Y",$purchasedDate);
            ?>
            <tr class="table-active">
                <th scope="row"><?php echo $customerName;?></th>
                <td><?php echo $customerMobile;?></td>
                <td><?php echo $ticketPurchased;?></td>
                <td><?php echo $pricePaid;?></td>
                <td><?php echo $date;?></td>
            </tr>
            <?php

        }
    }else{?>
    <tr><td>No Data Found</td></tr>
    <?php
    }
}
?>