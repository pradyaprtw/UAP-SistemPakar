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

// Hitung total skor untuk setiap penyakit
$A = $rowd['gagal_jantung1'] + $rowd['gagal_jantung2'] + $rowd['gagal_jantung3']; // Gagal Jantung
$B = $rowd['valve_disease1'] + $rowd['valve_disease2']; // Heart Valve Disease
$C = $rowd['aritmia1'] + $rowd['aritmia2'] + $rowd['aritmia3']; // Aritmia
$D = $rowd['perikarditis1'] + $rowd['perikarditis2']; // Perikarditis
$E = $rowd['jantung_koroner1'] + $rowd['jantung_koroner2']; // Jantung Koroner
$F = $rowd['additional1'] + $rowd['additional2']; // Additional Symptoms
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
    <style type="text/css">
        .tstchk span {
            font-family: Bold;
        }
        .tstchk p {
            font-size: 13px;
        }
    </style>
</head>
<body>
    <section id="dash">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="greeting">Hi <?php echo $name; ?></h4>
                    <p>Berikut adalah hasil diagnosis Anda:</p>
                    <div class="results" style="background-color: #f5f5f5; padding: 20px;">
                        <h5 style="font-family: Bold; border-left: 4px solid #153097; padding-left: 10px;">
                            <?php echo $rowd['recommendation']; ?>
                        </h5>
                        <div class="tstchk">
                            <p style="font-size: 14px;"><?php echo $rowd['binfo']; ?></p>
                        </div>

                        <table class="table table-striped" style="color: #153097;">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Penyakit</th>
                                    <th scope="col">Skor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Gagal Jantung</td>
                                    <td><?php echo $A; ?></td>
                                </tr>
                                <tr>
                                    <td>Penyakit Katup Jantung</td>
                                    <td><?php echo $B; ?></td>
                                </tr>
                                <tr>
                                    <td>Aritmia</td>
                                    <td><?php echo $C; ?></td>
                                </tr>
                                <tr>
                                    <td>Perikarditis</td>
                                    <td><?php echo $D; ?></td>
                                </tr>
                                <tr>
                                    <td>Jantung Koroner</td>
                                    <td><?php echo $E; ?></td>
                                </tr>
                                <tr>
                                    <td>Gejala Tambahan</td>
                                    <td><?php echo $F; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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

