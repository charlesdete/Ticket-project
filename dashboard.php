 <?php
 session_start();
 //$_SESSION['Email'] = $user[1]['Email'];
// if(!isset($_SESSION['Email'])){
//       header ('location:login.php'); 
//  }

?> 
<!Doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Dashboard</title>
<link rel="stylesheet" href="dashboard.css">
<!--lato font -->
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
<!--matrial icons-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "ticket-status.php?=" + str, true);
    xmlhttp.send();
  }
}
</script>

</head>
<body>
<div class="grid-container">

  <!--header-->
  <header class="header">
     <div class="menu-icon" onclick="openSidebar()">
           <span class="material-icons-outlined">menu</span>
     </div>
          <div class="header-left">
        
          <form action="">
  <label for="gsearch"> <span class="material-icons-outlined">search</span></label>
  <input type="search" id="gsearch" name="gsearch" placeholder="Search..." class="search"  onkeyup="showHint(this.value)">
  <button type="submit" class="search-btn">Search</button>
</form>





          </div>
          <div class="header-right">
          <span class="material-icons-outlined">notifications</span>
          <span class="material-icons-outlined">mail</span>
          <span class="material-icons-outlined">account_circle</span>
          </div>
  </header>
  <!--end header-->

  <!--sidebar-->
  <aside id="sidebar">
   <div class="sidebar-title">
    <div class="sidebar-brand">
    <span class="material-icons-outlined">account_circle</span><?=  $_SESSION['Email']; ?>
    </div>
    <span class="material-symbols-outlined" onclick="closeSidebar()">Close</span>
   </div>

   <ul class="sidebar-list">
     
     <li class="sidebar-list-item">
     <span class="material-icons-outlined">inventory_2</span><a href="ticket-status.php">Tickets</a>
     </li>
     <li class="sidebar-list-item">
     <span class="material-icons-outlined">category</span><a href="Add-category.php">Categories</a>
     </li>
     <li class="sidebar-list-item">
     <span class="material-icons-outlined">groups</span><a href="users.php">Users</a>
     </li>
     <li class="sidebar-list-item">
     <span class="material-icons-outlined">fact_check</span><a href="inventory.php">Inventory</a>
     </li>
     <li class="sidebar-list-item">
     <span class="material-icons-outlined">poll</span><a href="report.php">Report</a>
     </li>
     <li class="sidebar-list-item">
     <span class="material-icons-outlined">settings</span><a href="setting.php">Settings</a>
     </li>
   </ul>
  </aside>
  <!--end sidebar-->
  
  <!--main-->
  <main class="main-container">
  <p>Suggestions: <span id="txtHint"></span></p>
   <div class="main-title">
      <h2>DASHBOARD</h2>
   </div>

   <div class="main-cards">

     <div class="card">
       <div class="card-inner">
         <h3>Tickets</h3>
         <span class="material-icons-outlined">local_activity</span>
        </div>
        <h1>344</h1>
      </div>

      <div class="card">
       <div class="card-inner">
         <h3>Categories</h3>
         <span class="material-icons-outlined">category</span>
        </div>
        <h1>344</h1>
      </div>

      <div class="card">
       <div class="card-inner">
         <h3>Customers</h3>
         <span class="material-icons-outlined">groups</span>
        </div>
        <h1>344</h1>
      </div>

      

   </div> 

   <div class="charts">
       <div class="charts-card">
        <h2 class="chart-title">Top 5 Tickets</h2>
         <div id="bar-chart"> </div>
       </div>

       <div class="charts-card">
        <h2 class="chart-title">Purchase and Sales </h2>
         <div id="area-chart"> </div>
       </div>

   </div>
  </main>
  <!--main--> 

</div>

<!--scripts  -->

<!-- apexchart-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.42.0/apexcharts.min.js"></script>
 <!--Custom js-->
 <script src="main.js"></script>
</body>
</html>
