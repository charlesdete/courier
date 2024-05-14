<?php
 session_start();
 
 if(!isset($_SESSION['Email'])){
    header ('location:login.php'); 
}

?> 
<!Doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Dashboard</title>
<link rel="stylesheet" href="home.css">
<!--lato font -->
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
<!--matrial icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
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

const dropdownElementList = document.querySelectorAll('.dropdown-toggle')
const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl))
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
  <!-- <button type="submit" class="search-btn">Search</button> -->
</form>





          </div>
          <div class="header-right">
          <span class="material-icons-outlined"><a href="" >notifications</span></a>
          <span class="material-icons-outlined"><a href="mail.php" >mail</a></span>
          <span class="material-icons-outlined"><a href="user-profile.php"> account_circle</a></span>
          </div>
  </header>
  <!--end header-->

  <!--sidebar-->
  <aside id="sidebar">
   <div class="sidebar-title">
    <div class="sidebar-brand">
    <span class="material-icons-outlined">account_circle</span> Welcome</br><?=  $_SESSION['Email']; ?>
    </div>
    <span class="material-symbols-outlined" onclick="closeSidebar()">Close</span>
   </div>

   <ul class="sidebar-list">
     
     <li class="sidebar-list-item">
     <span class="material-icons-outlined">inventory_2</span><a href="order-placement.php">ORDERS</a>
     </li>
     <li class="sidebar-list-item">
     <span class="material-icons-outlined">category</span><a href="courier.php">DELIVERY</a>
     </li>
     <li class="sidebar-list-item">
     <!-- <span class="material-icons-outlined">groups</span><a href=""></a> -->
     <div class="dropdown-center">
  <button class="btn " type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <span class="material-icons-outlined">settings</span>COURIER
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="courier_list.php">Courier list</a></li>
    <li><a class="dropdown-item" href="insert-courier.php">Add Courier</a></li>
    <li><a class="dropdown-item" href="#"></a></li>
  </ul>
</div>
     </li>
     <li class="sidebar-list-item">
     <span class="material-icons-outlined">fact_check</span><a href="track.php">TRACK </a>
     </li>
     <li class="sidebar-list-item">
     <span class="material-icons-outlined">groups</span><a href="users.php">USERS</a>
     </li>
     <li class="sidebar-list-item">
     <span class="material-icons-outlined"><i class="uil uil-sign-out-alt"></i></span><a href="logout.php">LOGOUT</a>
     </li>
     
   </ul>
  </aside>
  <!--end sidebar-->
  
  <!--main-->
  <main class="main-container">
  <p>Suggestions: <span id="txtHint"></span></p>
   <div class="main-title">
      <h2>Home</h2>
   </div>

   <div class="main-cards">

     <div class="card">
       <div class="card-inner">
         <h3>Orders</h3>
         <span class="material-icons-outlined">local_activity</span>
        </div>
        <h1>1</h1>
      </div>

      <div class="card">
       <div class="card-inner">
         <h3>Deliveries</h3>
         <span class="material-icons-outlined">category</span>
        </div>
        <h1>1</h1>
      </div>

      <div class="card">
       <div class="card-inner">
         <h3>Couriers</h3>
         <span class="material-icons-outlined">groups</span>
        </div>
        <h1>5</h1>
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
