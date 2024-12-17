<?php
include '../include/server.php';
session_start();
$uname = $_SESSION['uname'];
if ($uname=="") {
 echo "<script>window.open('index.php','_self')</script>";
}
$sql = "SELECT * FROM backend WHERE uname='$uname'";
$run = mysqli_query($dbcon,$sql);
$row=mysqli_fetch_assoc($run);

$name = $row['name'];
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Admin Dashboard</title>
	 <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	  <link rel="stylesheet" href="vendors/feather/feather.css">
     <link rel="stylesheet" type="text/css" href="../bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <link href="../font-awesome/all.css" rel="stylesheet">
  <link href="../css/admin_style.css" rel="stylesheet">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <style type="text/css">
    body{
      font-family: Mont !important;
    }
  </style>
</head>
<body> 

  <div class="container-scroller">
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
       <a href="dashboard.php"> <img src="../img/logo.jpeg" style="width: 30%;border-radius: 10px;"></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      
        <ul class="navbar-nav navbar-nav-right">
        
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
             <span class="bi bi-person-fill"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             
              <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
      
        </ul>
         <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Shoes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="new_shoe.php">Add New Shoe</a></li>
                <li class="nav-item"> <a class="nav-link" href="view_shoe.php">View Shoes</a></li>
              </ul>
            </div>
          </li>

           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
              <i class="bi bi-cart  menu-icon"></i>
               <span class="menu-title"> Orders</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="orders.php">View orders</a></li>
              </ul>
            </div>
          </li>

        
              <li class="nav-item">
            <a class="nav-link" href="messages.php">
              <i class="bi bi-envelope menu-icon"></i>
              <span class="menu-title">View Messages</span>
            </a>
          </li>    


        


          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
            


             <div class="main-panel">
        <div class="content-wrapper">
        
         
     
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card" id="einput">
              <div class="card">
                <div class="card-body shadow-lg">
                   <?php include("../include/errors.php"); ?>
                  <h4 style="background-color: #4B49AC;padding: 10px;color: #fff;border-radius: 5px;">CHANGE PASSWORD</h4>
                <br>
                 <form action="change.php"  method="post" >
                  <div class="col-md-12 mb-3">
            <label for="lastName">Old Username</label>
            <input type="text" class="form-control" id="ouname" placeholder="Enter Previous Username" name="ouname" required>
            
          </div>
           <div class="col-md-12 mb-3">
            <label for="lastName">New Username</label>
            <input type="text" class="form-control" id="nuname" placeholder="Enter Previous Username" name="nuname" required>
            
          </div>
       <div class="col-md-12 mb-3">
            <label for="lastName">Old Password</label>
            <input type="password" class="form-control" id="opword" placeholder="Enter Previous Password" name="opword" required>
          
          </div>
          <div class="col-md-12 mb-3">
            <label for="firstName">New Password</label>
            <input type="password" class="form-control" id="npword" placeholder="Enter New Password" name="npword" required>
            
          </div>
      
   
          <div class="col-md-12">
            <br>
             <button class="btn btn-primary  btn-block" type="submit" name="changepword" id="btn-submitted">Proceed</button>
             <br>
          </div>

        </form>
                </div>
              </div>
            </div>
          </div>
        
         
          </div>
         
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>



</body>
</html>