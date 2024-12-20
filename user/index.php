<?php 
session_start();
include '../include/server.php';
if (isset($_SESSION['email'])) {
    header('Location: account.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">
  	<title>Medical Diagnosis</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../dist/css/iziToast.min.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../js/sweetalert.js"></script>  
    <script src="../dist/js/iziToast.min.js" type="text/javascript"></script>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-image: url('jantung.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        input::placeholder {
            font-size: 12px; 
            color: #888;
        }
        
        .form-wrapper h3,p {
            text-align: center;
            color: #044451;
        }

    </style>
</head>
<body>

<section id="login">
    <div class="container" style="padding: 50px;">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="form-wrapper" style="background-color: #f7f9fc; border-radius: 10px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h3>Buat Akun</h3>
                    <p>Masukkan detail Anda untuk membuat akun</p>
                    <form id="formadd" name="form1" method="post" enctype="multipart/form-data">
                        <div class="form">
                        <input type="text" name="name" id="name" placeholder="Masukkan Nama Anda" class="form-control mb-3">
                            <input type="tel" name="phone" id="phone" placeholder="Masukkan Nomor Telepon Anda" class="form-control mb-3">
                            <input type="text" name="address" id="address" placeholder="Masukkan Alamat Anda" class="form-control mb-3">
                            <input type="number" name="age" id="number" placeholder="Masukkan Umur Anda" class="form-control mb-3">
                            <input type="email" name="email" id="email" placeholder="Masukkan Email Anda" class="form-control mb-3">
                            <input type="password" name="pword" id="pword" placeholder="Masukkan Password Anda" class="form-control mb-3">
                            <select onchange="toggle(this);" name="state" id="state" class="form-control mb-3" style="font-size: 12px;">
                                <option value="" selected="selected" style="font-size:12px">Pilih Kabupaten</option>
                                <option value="Bandar Lampung">Bandar Lampung</option>
                                <option value="Lampung Barat">Lampung Barat</option>
                                <option value="Lampung Selatan">Lampung Selatan</option>
                                <option value="Lampung Tengah">Lampung Tengah</option>
                                <option value="Lampung Timur">Lampung Timur</option>
                                <option value="Lampung Utara">Lampung Utara</option>
                                <option value="Mesuji">Mesuji</option>
                                <option value="Pesisir Barat">Pesisir Barat</option>
                                <option value="Pesawaran">Pesawaran</option>
                                <option value="Pringsewu">Pringsewu</option>
                                <option value="Tanggamus">Tanggamus</option>
                                <option value="Tulang Bawang">Tulang Bawang</option>
                                <option value="Tulang Bawang Barat">Tulang Bawang Barat</option>
                                <option value="Way Kanan">Way Kanan</option>
                            </select>
                            <button class="btn btn-primary btn-block btn-lg" id="save" style="background-color: #044451; font-size: 15px;">
                                <span class="bi bi-lock" id="lock"></span>
                                Buat Akun
                            </button>
                            <p class="mt-3 text-center"> Sudah punya akun? <a href="login.php" style="color: #4f94dd;">Masuk di sini</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

    <br>
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

//SIGN UP

 $(document).on('submit','#formadd', function(e){
                e.preventDefault();
                $("#save").attr("disabled", "disabled");
                $("#spinner").show();
                var email = $('#email').val();
                var pword = $("#pword").val();
                var name = $('#name').val();
                var phone = $("#phone").val();
                var age = $('#age').val();
                var state = $("#state").val();
                var address = $("#address").val();
              
                
                if (email !== "" || pword !== "" || name !== "" || phone !== "" || age !== "" || state !== ""|| address !== "") {
                    $.ajax({
                        method: "POST",
                        url: "account_script.php",
                        data: $(this).serialize(),
                        success: function(data){
                          
                              if (data=="success") {
                                    window.open('account.php','_self');
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
                }else{

                                $("#save").removeAttr("disabled");
                                $("#spinner").hide();
                                iziToast.error({
                                    title: '',
                                    message: "All fields are required!",
                                    position: 'topCenter',
                                    animateInside: true,
                                });

                }
               
            });


//END OF SIGN UP

  });
     
</script>
</body>
</html>