<?php 
session_start();
include '../include/server.php';
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
}

$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
$run = mysqli_query($dbcon,$sql);
$row = mysqli_fetch_assoc($run);
$name = $row['name'];
$gsm = $row['gsm'];
$state = $row['state'];
$lga = $row['lga'];
$age = $row['age'];
$status = $row['status'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">
  	<title>Medical Diagnosis</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap-icons/bootstrap-icons.css">
	<link href="../css/animate.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../dist/css/iziToast.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../js/sweetalert.js"></script>  
    <script src="../dist/js/iziToast.min.js" type="text/javascript"></script>
</head>
<body>
<section id="dash" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body text-center">
                        <img src="user.svg" alt="User Avatar" class="img-fluid rounded-circle mb-3" style="width: 120px;">
                        <h4 class="card-title">Hi, <?php echo $name; ?></h4>

                        <ul class="list-group list-group-flush text-start">
                            <li class="list-group-item"><strong>Name:</strong> <?php echo $name; ?></li>
                            <li class="list-group-item"><strong>Phone Number:</strong> <?php echo $gsm; ?></li>
                            <li class="list-group-item"><strong>State:</strong> <?php echo $state; ?></li>
                            <li class="list-group-item"><strong>LGA:</strong> <?php echo $lga; ?></li>
                            <li class="list-group-item">
                                <strong>Status:</strong> 
                                <?php if ($status=="") {
                                    echo "<span class='text-danger'>Not Diagnosed</span>";
                                } else {
                                    echo "<span class='text-success'>Diagnosed</span>";
                                } ?>
                            </li>
                        </ul>

                        <a href="logout.php" class="btn btn-danger mt-3"><span class="bi bi-lock"></span> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="nav shadow-lg">
  <div onclick="home()" class="nav-item">
      <i class="material-icons home-icon">
          home
      </i>
      <span class="nav-text">Home</span>
  </div>
  <div onclick="diagnose()" class="nav-item">
      <i class="material-icons favorite-icon">
          favorite
      </i>
      <span class="nav-text">Diagnosis</span>
  </div>
  <div onclick="history()" class="nav-item">
      <i class="material-icons toll-icon">
          toll
      </i>
      <span class="nav-text">History</span>
  </div>
  <div onclick="profile()" class="nav-item active">
      <i class="material-icons person-icon">
          person
      </i>
      <span class="nav-text">Profile</span>
  </div>
</div>


<script type="text/javascript">
   const navItems = document.getElementsByClassName('nav-item');

for (let i = 0; i < navItems.length; i++) {
    navItems[i].addEventListener('click', () => {
        for(let j = 0; j < navItems.length; j++) 
            navItems[j].classList.remove('active');
        
        navItems[i].classList.add('active');
    });
}

function home() {
    window.open('account.php','_self');
}
function diagnose() {
    window.open('diagnose.php','_self');
}
function history() {
    window.open('history.php','_self');
}
function profile() {
    window.open('profile.php','_self');
}

    $(document).ready(function(){

 $(document).on('submit','#formadd', function(e){
                e.preventDefault();
                $("#save").attr("disabled", "disabled");
                $("#spinner").show();
                
            
                    $.ajax({
                        method: "POST",
                        url: "process.php",
                        data: $(this).serialize(),
                        success: function(data){
                          
                              if (data=="success") {
                                    window.open('history.php','_self');
                              }else{
                                    $("#save").removeAttr("disabled");
                                    $("#spinner").hide();
                                    iziToast.error({
                                    title: '',
                                    message: data,
                                    position: 'topCenter',
                                    animateInside: true,
                                });
                              }
                            }
                        });
                
               
            });

});
</script>

</body>
</html>
