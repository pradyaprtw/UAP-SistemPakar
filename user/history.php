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
        body {
            background-color: #e8f0f7;
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
    </style>
</head>
<body>
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
    </section>

    <div class="nav shadow-lg">
        <div onclick="home()" class="nav-item">
            <i class="material-icons home-icon">home</i>
            <span class="nav-text">Beranda</span>
        </div>
        <div onclick="diagnose()" class="nav-item">
            <i class="material-icons favorite-icon">favorite</i>
            <span class="nav-text">Diagnosis</span>
        </div>
        <div onclick="history()" class="nav-item active">
            <i class="material-icons toll-icon">toll</i>
            <span class="nav-text">Riwayat</span>
        </div>
        <div onclick="profile()" class="nav-item">
            <i class="material-icons person-icon">person</i>
            <span class="nav-text">Profil</span>
        </div>
    </div>

    <script type="text/javascript">
        const navItems = document.getElementsByClassName('nav-item');

        for (let i = 0; i < navItems.length; i++) {
            navItems[i].addEventListener('click', () => {
                for (let j = 0; j < navItems.length; j++) 
                    navItems[j].classList.remove('active');

                navItems[i].classList.add('active');
            });
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