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
            color:rgb(0, 128, 255);
        }
        .custom-form {
            font-family: Arial, sans-serif;
            margin: 0 auto;
            max-width: 700px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-form h4 {
            font-size: 24px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .custom-form p {
            font-size: 16px;
            color: #666;
            text-align: center;
            margin-bottom: 30px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .checkbox-item input {
            margin-right: 10px;
        }

        .checkbox-item label {
            font-size: 16px;
            color: #333;
        }

        .custom-form button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 18px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .custom-form button:hover {
            background-color: #0056b3;
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
        <div class="custom-form mt-4">
            <?php 
                if ($status == "") {
            ?>
            <h4 class="greeting">Diagnosis Kesehatan Jantung</h4>
            <p>Pilih gejala-gejala berikut dengan tepat untuk mendapatkan diagnosis yang akurat</p>

            <form id="formadd" name="form1" method="post" enctype="multipart/form-data">
                <div class="card mb-3">
                    <div class="card-header" style="background-color: #044451; color: #fff;">
                        Gejala 1 - 5
                    </div>
                    <div class="card-body">
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom1" value="G007" id="symptom1">
                            <label for="symptom1">Demam tinggi dan menggigil</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom2" value="G001" id="symptom2">
                            <label for="symptom2">Dada terasa penuh</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom3" value="G009" id="symptom3">
                            <label for="symptom3">Bunyi jantung abnormal</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom4" value="G013" id="symptom4">
                            <label for="symptom4">Pusing</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom5" value="G017" id="symptom5">
                            <label for="symptom5">Sulit tidur</label>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header" style="background-color: #044451; color: #fff;">
                        Gejala 6 - 10
                    </div>
                    <div class="card-body">
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom6" value="G019" id="symptom6">
                            <label for="symptom6">Mudah lelah</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom7" value="G012" id="symptom7">
                            <label for="symptom7">Mual dan muntah</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom8" value="G013" id="symptom8">
                            <label for="symptom8">Katup jantung tidak bekerja dengan baik</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom9" value="G018" id="symptom9">
                            <label for="symptom9">Denyut nadi yang lemah dan cepat</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom10" value="G004" id="symptom10">
                            <label for="symptom10">Nyeri pada dada sebelah kiri</label>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header" style="background-color: #044451; color: #fff;">
                        Gejala 11 - 15
                    </div>
                    <div class="card-body">
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom11" value="G002" id="symptom11">
                            <label for="symptom11">Detak jantung cepat (tachycardia)</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom12" value="G006" id="symptom12">
                            <label for="symptom12">Sesak napas</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom13" value="G014" id="symptom13">
                            <label for="symptom13">Pingsan (syncope)</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom14" value="G016" id="symptom14">
                            <label for="symptom14">Berat badan menurun</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="symptom15" value="G019" id="symptom15">
                            <label for="symptom15">Detak jantung lambat (bradycardia)</label>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <button style="background-color: #044451;" id="save" onclick="return checkSymptom()">Diagnosis</button>
                <script>
                    function checkSymptom(){
                        var symptom = document.querySelectorAll('input[name^=symptom]:checked');
                        if (symptom.length == 0) {
                            alert('Harap isi gejala terlebih dahulu');
                            return false;
                        }
                    }
                </script>
            </form>

            <?php } else { ?>
            <h4 class="greeting">You have already been diagnosed</h4>
            <p>Click on the button below to view results</p>
            <a href="history.php"><button class="btn btn-primary btn-block">View Results</button></a>
            <?php } ?>
        </div>  
    </div>
</section>

<script type="text/javascript">
    const navItems = document.getElementsByClassName('nav-item');

    for (let i = 0; i < navItems.length; i++) {
        navItems[i].addEventListener('click', () => {
            for (let j = 0; j < navItems.length; j++) 
                navItems[j].classList.remove('active');
            navItems[i].classList.add('active');
        });
    }

    function toggleMenu() {
            const menu = document.getElementById('navbarMenu');
            menu.classList.toggle('active');
    }

    function home() {
        window.open('account.php', '_self');
    }

    function diagnose() {
        window.open('diagnose.php', '_self');
    }

    function history() {
        window.open('history.php', '_self');
    }

    function profile() {
        window.open('profile.php', '_self');
    }

    $(document).ready(function() {
        $(document).on('submit','#formadd', function(e) {
            e.preventDefault();
            $("#save").attr("disabled", "disabled");

            $.ajax({
                method: "POST",
                url: "process.php",
                data: $(this).serialize(),
                success: function(data) {
                    if (data == "success") {
                        window.open('history.php', '_self');
                    } else {
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
