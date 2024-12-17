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
	 <link rel="stylesheet" type="text/css" href="../bootstrap-icons/bootstrap-icons.css">
	  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <link href="../css/admin_style.css" rel="stylesheet">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="js/upload.js"></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/sweetalert.js"></script>
  <style type="text/css">
    body{
      font-family: Mont !important;
    }
  </style>

  
</head>
<body> 
<?php
    if ($_GET['msg']=="error") { ?>
        <script>
       
             swal.fire({
              icon : 'error',
                 type : 'error',
                 title : 'Error',
                 text : 'Error, try Again',
                 confirmButtonColor: '#4B49AC',
             })
       
    </script> 
    <?php }
    elseif ($_GET['msg']=="success") {
      ?>
        <script>
       
             swal.fire({
              icon : 'success',
                 type : 'success',
                 title : 'Success',
                 text : 'Doctor added Successfully',
                 confirmButtonColor: '#4B49AC',
             })
       
    </script>
      <?php
    }
 elseif ($_GET['msg']=="msuccess") {
      ?>
        <script>
       
             swal.fire({
              icon : 'success',
                 type : 'success',
                 title : 'Success',
                 text : 'Meal Updated Successfully',
                 confirmButtonColor: '#4B49AC',
             })
       
    </script>
      <?php
    }
     elseif ($_GET['msg']=="mfail") {
      ?>
        <script>
       
             swal.fire({
              icon : 'error',
                 type : 'error',
                 title : 'Errpr',
                 text : 'Error, Try Again',
                 confirmButtonColor: '#4B49AC',
             })
       
    </script>
      <?php
    }


    else{

    }
?>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
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
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="view_users.php">View Users</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basicx" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Doctor</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basicx">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="new_doctor.php">Add New Doctor</a></li>
                <li class="nav-item"> <a class="nav-link" href="view_doctor.php">View Doctors</a></li>
              </ul>
            </div>
          </li>

           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
              <i class="bi bi-cart  menu-icon"></i>
               <span class="menu-title"> Diagnosis</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="diagnosis.php">View Diagnosis</a></li>
              </ul>
            </div>
          </li>

        
              <li class="nav-item">
            <a class="nav-link" href="appointment.php">
              <i class="bi bi-envelope menu-icon"></i>
              <span class="menu-title">View Appointment</span>
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
                <h4 style="background-color: #4B49AC;padding: 10px;color: #fff;border-radius: 5px;">ADD NEW DOCTOR</h4>
                <br>
                <?php include '../include/errors.php'; ?>
                <form action="server.php" method="POST">
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label>Doctor Name</label>
                
                        <input name="name" class="form-control" type="text" placeholder="Enter Doctor Name" required>
                     
                    </div>
                  </div>
                    <div class="form-group row">
                    <div class="col-sm-12">

                      <label>Doctor GSM</label>
                        <input name="gsm" class="form-control" type="tel" placeholder="Enter Doctor GSM" required>
                      
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-12">

                      <label>Doctor Address</label>
                        <input name="address" class="form-control" type="text" placeholder="Enter Doctor Address" required>
                      
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-12">

                      <label>Doctor Email</label>
                        <input name="email" class="form-control" type="email" placeholder="Enter Doctor Email" required>
                      
                    </div>
                  </div>
             <div class="form-group row">
                    <div class="col-sm-12">

                      <label>Doctor Password</label>
                        <input name="pword" class="form-control" type="passport" placeholder="Enter Doctor Password" required>
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                       <label>Doctor State</label>
                      <select onchange="toggleLGA(this);" name="state" id="state" class="form-control">
                                                    <option value="" selected="selected">- Select State -</option>
                                                    <option value="Abia">Abia</option>
                                                    <option value="Adamawa">Adamawa</option>
                                                    <option value="AkwaIbom">AkwaIbom</option>
                                                    <option value="Anambra">Anambra</option>
                                                    <option value="Bauchi">Bauchi</option>
                                                    <option value="Bayelsa">Bayelsa</option>
                                                    <option value="Benue">Benue</option>
                                                    <option value="Borno">Borno</option>
                                                    <option value="Cross River">Cross River</option>
                                                    <option value="Delta">Delta</option>
                                                    <option value="Ebonyi">Ebonyi</option>
                                                    <option value="Edo">Edo</option>
                                                    <option value="Ekiti">Ekiti</option>
                                                    <option value="Enugu">Enugu</option>
                                                    <option value="FCT">FCT</option>
                                                    <option value="Gombe">Gombe</option>
                                                    <option value="Imo">Imo</option>
                                                    <option value="Jigawa">Jigawa</option>
                                                    <option value="Kaduna">Kaduna</option>
                                                    <option value="Kano">Kano</option>
                                                    <option value="Katsina">Katsina</option>
                                                    <option value="Kebbi">Kebbi</option>
                                                    <option value="Kogi">Kogi</option>
                                                    <option value="Kwara">Kwara</option>
                                                    <option value="Lagos">Lagos</option>
                                                    <option value="Nasarawa">Nasarawa</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Ogun">Ogun</option>
                                                    <option value="Ondo">Ondo</option>
                                                    <option value="Osun">Osun</option>
                                                    <option value="Oyo">Oyo</option>
                                                    <option value="Plateau">Plateau</option>
                                                    <option value="Rivers">Rivers</option>
                                                    <option value="Sokoto">Sokoto</option>
                                                    <option value="Taraba">Taraba</option>
                                                    <option value="Yobe">Yobe</option>
                                                    <option value="Zamfara">Zamafara</option>
                                                </select>
                      
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-12">
                       <label>Doctor Local Government</label>
                      <select name="lga" id="lga" class="form-control select-lga" required>
                                                    <option>- Select Local Government -</option>
                                                 </select> 

                      
                    </div>
                  </div>
                  

                   <div class="form-group row">
                    <div class="col">
                     <button  class="btn btn-primary btn-block">Submit</button>
                     
                    </div>
                   
                  </div>
                         
              
                  </form>
          </div>
         
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
<script src="../js/lga.min.js"></script>  
  <!-- plugins:js -->
  <!-- endinject -->
  <!-- Plugin js for this page -->
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
  <!-- End custom js for this page-->
</body>

</html>



</body>
</html>