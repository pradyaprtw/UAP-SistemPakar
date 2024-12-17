<?php
session_start();
include '../include/server.php';
if (!empty($_SESSION['uname'])) {
	header('Location: dashboard.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	  <script src="../js/sweetalert.js"></script>
	  <style type="text/css">
	  	body{
	  		background-image: radial-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8)),url('../img/banner-4.jpg');
			background-position: center;
			background-size: cover;
	  	}
	  	::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #fff;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #fff;
}

::-ms-input-placeholder { /* Microsoft Edge */
  color: #fff;
}
input{
	color: #fff !important;
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
                 text : 'Wrong Login Details, try Again',
                 confirmButtonColor: '#06d1f8',
             })
       
    </script> 
    <?php }
?><div class="container">
	<div class="row">
	<div class="col-md-3">
		
	</div>
	<div class="col-md-6">
		<div id="login" style="margin-top:100px;">
			<form action="index.php" method="POST">
			<center><span class="bi bi-person-fill top" style="font-size: 50px;"></span></center>
			<h3 style="text-align:center;">ADMINISTRATOR LOGIN</h3>
		
			<label style="color: #fff;">Username</label>
			<input type="text" name="uname" class="form-control" placeholder="Enter Username" required><br>
			<label style="color: #fff;">Password</label>
			<input type="password" name="pword" class="form-control" placeholder="Enter Password" required><br>
			<button class="btn btn-primary btn-block btn-lg" name="login"><span class="fa fa-sign-in-alt"></span>LOGIN</button>
			</form>
		</div>
	</div>
	<div class="col-md-3">
		
	</div>
</div>
	</div>
</body>
</html>
