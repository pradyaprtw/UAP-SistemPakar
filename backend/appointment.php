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
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
   <link rel="stylesheet" type="text/css" href="../bootstrap-icons/bootstrap-icons.css">
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <link href="../font-awesome/all.css" rel="stylesheet">

  <link rel="stylesheet" href="css/vertical-layout-light/style.css">

  <link href="../css/admin_style.css" rel="stylesheet">
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="js/upload.js"></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  <!-- End plugin css for this page -->
  <!-- inject:css -->  <script type="text/javascript" src="nicEdit/nicEdit.js"></script>
  <script type="text/javascript" src="../js/sweetalert.js"></script>
  <style type="text/css">
    body{
      font-family: Mont !important;
    }
  </style>
</head>
<body> 
<?php
    if ($_GET['msg']=="del_error") { ?>
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
    elseif ($_GET['msg']=="del_success") {
      ?>
        <script>
       
             swal.fire({
              icon : 'success',
                 type : 'success',
                 title : 'Success',
                 text : 'Appointment Deleted Successfully',
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
 <!-- Добавьте модальное окно после открывающего тега body-->
<div class="modal fade" id="image-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      
      </div>
      <div class="modal-body">
        <img class="img-responsive center-block" src="" style="width: 100%;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
                <h4 style="background-color: #4B49AC;padding: 10px;color: #fff;border-radius: 5px;">VIEW APPOINTMENT</h4>
                <br>



                   <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                           <th>S/N</th>
                         
                         <th>Doctor Name</th>
                         <th>Patient Name</th>
                           
                         <th>Date</th>
                            <th>Action</th>

                        </tr>  
                      </thead>
                      <tbody>

                        <?php
             if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
  } else {
    $page_no = 1;
        }

  $total_records_per_page = 10;
    $offset = ($page_no-1) * $total_records_per_page;
  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;
  $adjacents = "2"; 

  $result_count = mysqli_query($dbcon,"SELECT COUNT(*) As total_records FROM `appointment`");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1; // total page minus 1
$counter = 1;
    $result = mysqli_query($dbcon,"SELECT * FROM `appointment` ORDER BY id DESC LIMIT $offset, $total_records_per_page");
    while($row = mysqli_fetch_array($result)){
 
                echo 
                "<tr>
                <td>".$counter++."</td>
                 
                  <td>".$row['dname']."</td>
                  <td>".$row['pname']."</td>
                  <td><a href='delete_ap.php?id=".$row['id']."'><button class='btn btn-danger btn-sm'>Delete</button></a></td>
                </tr>";
              }
            ?>

                     
                       
                      </tbody>
                    </table>
                  </div>
                  <br>
<?php include("functions/function_event.php"); ?>
     <h6 style="text-align: center !important;">Page <?php echo $page_no." of ".$total_no_of_pages; ?></h6>




               
          </div>
         
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
   <script type="text/javascript">


$(function() {     
  $('a.thumbnail').click(function(e) {
    e.preventDefault();
    $('#image-modal .modal-body img').attr('src', $(this).find('img').attr('src'));
    $("#image-modal").modal('show');
  });
  $('#image-modal .modal-body img').on('click', function() {
    $("#image-modal").modal('hide')
  });
});



   </script>  
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