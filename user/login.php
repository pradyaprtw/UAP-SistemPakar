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
	<link href="../css/animate.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../dist/css/iziToast.min.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../js/sweetalert.js"></script>  
    <script src="../dist/js/iziToast.min.js" type="text/javascript"></script>
    <style type="text/css">
        body{
          background-color: #ffffff;
        }
    </style>
</head>
<body>
<section id="login">
    <div class="container" style="padding: 80px;">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6" style="margin-top: 50px;">
                <div class="form-wrapper" style="background-color: #f7f9fc; border-radius: 10px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h3>Login Account</h3>
                    <p>Input your details to login an account</p>
                    <form id="formadd" name="form1" method="post" enctype="multipart/form-data">
                    <div class="form">         
                       <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control">
                       <br>
                       <input type="password" name="pword" id="pword" placeholder="Enter your password" class="form-control">
                       <br>
                        <button class="btn btn-primary btn-block btn-lg" id="save" style ="font-size: 15px;">Login</button>  
                        <p>Do not have an account? <a href="index.php" style="color: #4f94dd;">Create account</a></p>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
    <br>
<script src="../js/lga.min.js"></script>	
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
                
                if (email !== "" || pword !== "") {
                    $.ajax({
                        method: "POST",
                        url: "login_script.php",
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