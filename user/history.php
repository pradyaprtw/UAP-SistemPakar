<?php 
session_start();
include '../include/server.php';

// Jika belum login, redirect ke halaman login
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
}

$email = $_SESSION['email'];

// Ambil data pengguna berdasarkan email
$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
$run = mysqli_query($dbcon, $sql);
$row = mysqli_fetch_assoc($run);
$name = $row['name'];
$gsm = $row['address'];
$state = $row['state'];
$lga = $row['lga'];
$age = $row['age'];

// Ambil data diagnosis terbaru untuk pengguna ini
$sqld = "SELECT * FROM diagnosis WHERE email = '$email' ORDER BY id DESC LIMIT 1";
$rund = mysqli_query($dbcon, $sqld);
$rowd = mysqli_fetch_assoc($rund);

// Fetch scores from the diagnosis table
$gagal_jantung_score = $rowd['gagal_jantung_score']; 
$valve_disease_score = $rowd['valve_disease_score']; 
$aritmia_score = $rowd['aritmia_score']; 
$perikarditis_score = $rowd['perikarditis_score']; 
$jantung_koroner_score = $rowd['jantung_koroner_score']; 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Diagnosis Medis</title>
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            background-color: #e8f0f7;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }
        .results-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        #dash {
            margin-top: 80px;
        }

        .diagnosis-header {
            background-color: #044451;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .score-bar {
            height: 20px;
            background-color: #e9ecef;
            border-radius: 10px;
            margin: 10px 0;
            overflow: hidden;
        }
        .score-fill {
            height: 100%;
            background-color: #044451;
            transition: width 0.3s ease;
        }
        .recommendation-box {
            background-color: #f8f9fa;
            border-left: 4px solid #044451;
            padding: 15px;
            margin: 20px 0;
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
        .recommendation-list {
            list-style-type: disc;
            margin-left: 20px;
            padding: 0;
            color: #044451;
        }

        .recommendation-list li {
            margin: 5px 0;
            font-size: 16px;
        }

        .recommendation-box h5 {
            font-weight: bold;
            color: #044451;
        }

        .recommendation-box p {
            color: #333;
            font-size: 14px;
        }

        .recommendation-box {
            padding: 15px;
            border-left: 4px solid #044451;
            margin-bottom: 20px;
            background-color: #f8f9fa;
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
    <div class="results-card">
        <div class="diagnosis-header">
            <h4 class="mb-0">Hasil Diagnosis - <?php echo htmlspecialchars($name); ?></h4>
        </div>

        <div class="recommendation-box">
            <h5><?php echo htmlspecialchars($rowd['recommendation']); ?></h5>
            <p class="mb-0"><?php echo htmlspecialchars($rowd['binfo']); ?></p>
        </div>

        <h5 class="mt-4 mb-3">Analisis Gejala:</h5>

        <!-- Gagal Jantung -->
        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <span>Gagal Jantung</span>
                <span><?php echo number_format($gagal_jantung_score, 1); ?>/10</span>
            </div>
            <div class="score-bar">
                <div class="score-fill" style="width: <?php echo ($gagal_jantung_score * 10); ?>%"></div>
            </div>
        </div>

        <!-- Penyakit Katup Jantung -->
        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <span>Penyakit Katup Jantung</span>
                <span><?php echo number_format($valve_disease_score, 1); ?>/10</span>
            </div>
            <div class="score-bar">
                <div class="score-fill" style="width: <?php echo ($valve_disease_score * 10); ?>%"></div>
            </div>
        </div>

        <!-- Aritmia -->
        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <span>Aritmia</span>
                <span><?php echo number_format($aritmia_score, 1); ?>/10</span>
            </div>
            <div class="score-bar">
                <div class="score-fill" style="width: <?php echo ($aritmia_score * 10); ?>%"></div>
            </div>
        </div>

        <!-- Perikarditis -->
        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <span>Perikarditis</span>
                <span><?php echo number_format($perikarditis_score, 1); ?>/10</span>
            </div>
            <div class="score-bar">
                <div class="score-fill" style="width: <?php echo ($perikarditis_score * 10); ?>%"></div>
            </div>
        </div>

        <!-- Jantung Koroner -->
        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <span>Jantung Koroner</span>
                <span><?php echo number_format($jantung_koroner_score, 1); ?>/10</span>
            </div>
            <div class="score-bar">
                <div class="score-fill" style="width: <?php echo ($jantung_koroner_score * 10); ?>%"></div>
            </div>
        </div>

        <!-- Gejala Tambahan -->
        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <span>Gejala Tambahan</span>
                <span><?php echo number_format($additional_score, 1); ?>/10</span>
            </div>
            <div class="score-bar">
                <div class="score-fill" style="width: <?php echo ($additional_score * 10); ?>%"></div>
            </div>
        </div>
        <h5 class="mt-4 mb-3">Rekomendasi Tindakan:</h5>
        <ul class="recommendation-list">
            <?php
            if ($gagal_jantung_score >= 7) {
                echo '<li>Konsultasikan segera dengan dokter spesialis jantung untuk penanganan gagal jantung.</li>';
                echo '<li>Kurangi konsumsi garam dan cairan berlebih sesuai anjuran dokter.</li>';
            }
            if ($valve_disease_score >= 7) {
                echo '<li>Diskusikan kemungkinan tindakan medis seperti operasi katup jantung dengan dokter.</li>';
                echo '<li>Hindari aktivitas berat yang dapat memperburuk kondisi katup jantung.</li>';
            }
            if ($aritmia_score >= 7) {
                echo '<li>Lakukan pemeriksaan lanjutan seperti Holter monitor atau EKG untuk memantau detak jantung.</li>';
                echo '<li>Konsultasikan penggunaan obat antiaritmia atau ablasi jika diperlukan.</li>';
            }
            if ($perikarditis_score >= 7) {
                echo '<li>Segera konsultasikan dengan dokter untuk mengelola peradangan perikardium.</li>';
                echo '<li>Hindari aktivitas fisik berat hingga perikarditis mereda.</li>';
            }
            if ($jantung_koroner_score >= 7) {
                echo '<li>Lakukan tes tambahan seperti angiogram untuk mengetahui tingkat penyumbatan arteri.</li>';
                echo '<li>Ikuti pola makan sehat jantung dengan mengurangi lemak jenuh dan meningkatkan konsumsi serat.</li>';
            }
            if ($gagal_jantung_score < 7 && $valve_disease_score < 7 && $aritmia_score < 7 && $perikarditis_score < 7 && $jantung_koroner_score < 7) {
                echo '<li>Hasil diagnosis Anda menunjukkan risiko yang rendah, namun tetap jaga pola hidup sehat.</li>';
                echo '<li>Lakukan pemeriksaan rutin untuk memantau kesehatan jantung Anda.</li>';
            }
            ?>
        </ul>
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
    </script>
</body>
</html>