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
    <div class="container" style="padding: 50px;">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="form-wrapper" style="background-color: #f7f9fc; border-radius: 10px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h3>Create Account</h3>
                    <p>Input your details to create an account</p>
                    <form id="formadd" name="form1" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control mb-3">
                            <input type="tel" name="gsm" id="gsm" placeholder="Enter your phone number" class="form-control mb-3">
                            <input type="text" name="address" id="address" placeholder="Enter your address" class="form-control mb-3">
                            <input type="number" name="age" id="number" placeholder="Enter your age" class="form-control mb-3">
                            <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control mb-3">
                            <input type="password" name="pword" id="pword" placeholder="Enter your password" class="form-control mb-3">
                            <select onchange="toggleLGA(this);" name="state" id="state" class="form-control mb-3">
                                <option value="" selected="selected">- Select State -</option>
                                <option value="Abia">Abia</option>
                                <option value="Adamawa">Adamawa</option>
                                <option value="AkwaIbom">AkwaIbom</option>
                                <option value="Anambra">Anambra</option>
                                <option value="Bauchi">Bauchi</option>
                                <option value="Bayelsa">Bayelsa</option>
                                <option value="Benue">Benue</option>
                                <option value="Borno">Borno</option>
                                <option value="Cross River">Cross River</option>
                                <option value="Delta">Delta</option>
                                <option value="Ebonyi">Ebonyi</option>
                                <option value="Edo">Edo</option>
                                <option value="Ekiti">Ekiti</option>
                                <option value="Enugu">Enugu</option>
                                <option value="FCT">FCT</option>
                            </select>
                            <select name="lga" id="lga" class="form-control mb-4" required>
                                <option>- Select Local Government -</option>
                            </select>
                            <button class="btn btn-primary btn-block btn-lg" id="save" style="background-color: #044451; font-size: 15px;">
                                <span class="bi bi-lock" id="lock"></span>
                                Create account
                            </button>
                            <p class="mt-3 text-center">Already have an account? <a href="login.php" style="color: #4f94dd;">Login Here</a></p>
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
                var name = $('#name').val();
                var gsm = $("#gsm").val();
                var age = $('#age').val();
                var state = $("#state").val();
                var lga = $('#lga').val();
                var address = $("#address").val();
              
                
                if (email !== "" || pword !== "" || name !== "" || gsm !== "" || age !== "" || state !== ""|| lga !== "" || address !== "") {
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