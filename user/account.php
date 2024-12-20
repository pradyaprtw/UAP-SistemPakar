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
$gsm = $row['address'];
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
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../js/sweetalert.js"></script>  
    <script src="../dist/js/iziToast.min.js" type="text/javascript"></script>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            background-color: #e8f0f7;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        .greeting {
            font-size: 24px;
            font-weight: bold;
            color:rgb(0, 68, 137);
        }
        .box {
            background: #ffffff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 15px;
        }
        .box img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .box h6 {
            font-size: 18px;
            font-weight: 600;
            color: #000;
            margin-top: 10px;
        }
        .tips {
            margin-top: 20px;
            background: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .tips h4 {
            font-size: 20px;
            font-weight: bold;
            color: #000;
            margin-bottom: 10px;
        }
        .tips ol {
            padding-left: 20px;
        }
        .tips li {
            margin-bottom: 10px;
            font-size: 16px;
            color: #000;
        }

        #dash {
            margin-top: 80px;
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
            padding-left:100px
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
<body>   
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
	<section id="dash">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                <h4 class="greeting" style="color: #044451;">Hai, <?php echo $name; ?>!</h4>
                   <p>Temukan teknologi baru untuk meningkatkan perjalanan kesehatan Anda.</p>
                   <div class="box d-flex align-items-center" style="background-color: #fff;">
                       <div class="col-4">
                           <img src="../img/beat.gif" alt="Heart Animation">
                       </div>
                       <div class="col-8">
                          <h6 style="color: #000;">Dapatkan diagnosis dan buat janji temu dengan dokter dengan mudah dan cepat!</h6>
                          <a href="diagnose.php" class="btn btn-primary mt-3" style="background-color: #044451;">Mulai Diagnosis</a>
                       </div>
                   </div>

                   <h5 style="font-weight: 600; margin-top:20px; margin-left: 15px;">Tips untuk melindungi jantung Anda</h5>

                   <div class="row">
                       <?php
                       $tips = [
                           ['icon' => 'bi bi-x-circle-fill text-danger mr-2', 'text' => 'Hindari merokok dan penggunaan tembakau untuk melindungi jantung Anda.'],
                           ['icon' => 'bi bi-person-arms-up mr-2', 'text' => 'Lakukan aktivitas kardiovaskular selama setidaknya 30 menit setiap hari.'],
                           ['icon' => 'bi bi-egg-fried mr-2', 'text' => 'Periksa tekanan darah Anda secara teratur untuk kesehatan jantung.'],
                           ['icon' => 'bi bi-scale mr-2', 'text' => 'Kelola stres untuk mengurangi risiko penyakit jantung.'],
                           ['icon' => 'bi bi-moon mr-2', 'text' => 'Pastikan tidur yang cukup dan berkualitas untuk mendukung kesehatan jantung.'],
                           ['icon' => 'bi bi-emoji-smile mr-2', 'text' => 'Pertahankan berat badan yang sehat untuk mengurangi risiko penyakit jantung.'],
                           ['icon' => 'bi bi-clipboard-check mr-2', 'text' => 'Pantau tingkat kolesterol Anda untuk mencegah masalah jantung.'],
                           ['icon' => 'bi bi-graph-up mr-2', 'text' => 'Ikuti diet sehat untuk jantung, kaya dengan buah-buahan, sayuran, dan biji-bijian utuh.'],
                           ['icon' => 'bi bi-speedometer mr-2', 'text' => 'Lakukan pemeriksaan rutin untuk memantau tekanan darah dan kolesterol.'],
                       ];
                       foreach ($tips as $index => $tip) {
                       ?>
                       <div class="col-md-3">
                           <div class="card tips-card mt-4" style="background-color: #fff; color: #000;">
                               <div class="card-header">
                                   <h6><i class="<?php echo $tip['icon']; ?>"></i> <?php echo $tip['text']; ?></h6>
                               </div>
                           </div>
                       </div>
                       <?php
                       }
                       ?>
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
