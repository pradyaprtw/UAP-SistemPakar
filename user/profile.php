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
$gsm = $row['phone'];
$state = $row['state'];
$state = $row['state'];
$age = $row['age'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">
  	<title>Medical Diagnosis</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap-icons/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../js/sweetalert.js"></script>  
    <script src="../dist/js/iziToast.min.js" type="text/javascript"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            background-color: #e8f0f7;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        #dash {
            margin-top: 40px;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #044451;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
            z-index: 1000;
        }

        .navbar .navbar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: bold;
            color: #fff;
        }

        .navbar-toggler {
            background: none;
            border: none;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
            margin-left: auto; /* Menjauhkan hamburger ke kanan */
        }

        .hamburger-icon {
            font-size: 24px;
            color: #fff;
        }

        .navbar-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 50px;
            background-color: #044451;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            flex-direction: column;
            gap: 30px;
            padding: 15px;
            
        }

        .navbar-menu.active {
            display: flex;
        }

        .navbar-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 5px;
            padding: 0 10px;
        }

        .navbar-item:hover {
            background-color: #ffffff;
            color: #044451;
        }

        .navbar-item.active {
            background-color: #ffffff;
            color: #044451;
        }

        .material-icons {
            font-size: 20px;
        }

        @media (max-width: 768px) {
            .navbar .navbar-header {
                width: 100%;
            }
        }

        @media (min-width: 768px) {
            .navbar-menu {
                display: flex;
                position: static;
                flex-direction: row;
                background-color: transparent;
                box-shadow: none;
                padding: 0;
            }
            .navbar-toggler {
                display: none;
            }
        }
    </style>
</head>
<body style="background-color: #e8f0f7">
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Cek Jantung</a>
            <button class="navbar-toggler" onclick="toggleMenu()">
                <span class="hamburger-icon">☰</span>
            </button>
        </div>
        <div class="navbar-menu" id="navbarMenu">
            <div class="navbar-item <?php echo basename($_SERVER['PHP_SELF']) == 'account.php' ? 'active' : ''; ?>" onclick="home()">
                <i class="material-icons home-icon">home</i>
                <span class="navbar-text">Beranda</span>
            </div>
            <div class="navbar-item <?php echo basename($_SERVER['PHP_SELF']) == 'diagnose.php' ? 'active' : ''; ?>" onclick="diagnose()">
                <i class="material-icons favorite-icon">favorite</i>
                <span class="navbar-text">Diagnosis</span>
            </div>
            <div class="navbar-item <?php echo basename($_SERVER['PHP_SELF']) == 'history.php' ? 'active' : ''; ?>" onclick="history()">
                <i class="material-icons toll-icon">toll</i>
                <span class="navbar-text">Riwayat</span>
            </div>
            <div class="navbar-item <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>" onclick="profile()">
                <i class="material-icons person-icon">person</i>
                <span class="navbar-text">Profil</span>
            </div>
        </div>
    </div>
</nav>
<section id="dash" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4 text-center" style="background-color:rgb(255, 255, 255)">
                    <img src="https://www.gravatar.com/avatar/?d=mp&s=120" alt="User Avatar" class="img-fluid rounded-circle mb-4" style="width: 120px;">

                        <h4 style="color: #044451;" class="card-title font-weight-bold">Hi, <?php echo $name; ?></h4>
                        <p class="card-text">Your profile information</p>

                        <ul class="list-group list-group-flush text-start">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong style="color: #044451;" class="font-weight-bold">Name:</strong> <?php echo $name; ?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong style="color: #044451;" class="font-weight-bold">Phone Number:</strong> <?php echo $gsm; ?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong style="color: #044451;" class="font-weight-bold">State:</strong> <?php echo $state; ?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong style="color: #044451;" class="font-weight-bold">Age:</strong> <?php echo $age; ?>
                            </li>
                        </ul>

                        <a href="logout.php" class="btn btn-danger mt-4">
                            <span class="bi bi-lock me-2"></span> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script type="text/javascript">
   const navItems = document.getElementsByClassName('nav-item');

for (let i = 0; i < navItems.length; i++) {
    navItems[i].addEventListener('click', () => {
        for(let j = 0; j < navItems.length; j++) 
            navItems[j].classList.remove('active');
        
        navItems[i].classList.add('active');
    });
}

function toggleMenu() {
    const menu = document.getElementById('navbarMenu');
    menu.classList.toggle('active');
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
