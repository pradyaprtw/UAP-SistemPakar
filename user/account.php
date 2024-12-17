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
    <style type="text/css">
        body {
            background-color: #f4f8fc;
            font-family: 'Arial', sans-serif;
        }
        .greeting {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
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
            color: #34495e;
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
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .tips ol {
            padding-left: 20px;
        }
        .tips li {
            margin-bottom: 10px;
            font-size: 16px;
            color: #34495e;
        }

    </style>
</head>
<body>   
	<section id="dash">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                   <h4 class="greeting">Hi, <?php echo $name; ?>!</h4>
                   <p>Discover new technologies to enhance your health journey.</p>
                   <div class="box d-flex align-items-center">
                       <div class="col-4">
                           <img src="../img/beat.gif" alt="Heart Animation">
                       </div>
                       <div class="col-8">
                          <h6>Get diagnosed and book appointments with doctors easily and quickly!</h6>
                          <a href="diagnose.php" class="btn btn-primary mt-3">Start Diagnosis</a>
                       </div>
                   </div>

                   <div class="row">
                       <?php
                       $tips = [
                           ['icon' => 'bi bi-x-circle-fill text-danger mr-2', 'text' => 'Don\'t smoke or use tobacco.'],
                           ['icon' => 'bi bi-activity mr-2', 'text' => 'Aim for at least 30 to 60 minutes of activity daily.'],
                           ['icon' => 'bi bi-egg-fried mr-2', 'text' => 'Eat a heart-healthy diet.'],
                           ['icon' => 'bi bi-scale mr-2', 'text' => 'Maintain a healthy weight.'],
                           ['icon' => 'bi bi-moon mr-2', 'text' => 'Get good quality sleep.'],
                           ['icon' => 'bi bi-emoji-smile mr-2', 'text' => 'Manage stress effectively.'],
                           ['icon' => 'bi bi-clipboard-check mr-2', 'text' => 'Get regular health screenings.'],
                           ['icon' => 'bi bi-graph-up mr-2', 'text' => 'Check cholesterol levels.'],
                           ['icon' => 'bi bi-speedometer mr-2', 'text' => 'Have regular blood pressure check-ups.'],
                       ];
                       foreach ($tips as $tip) {
                       ?>
                       <div class="col-md-3">
                           <div class="card tips-card mt-4" style="background-color: #213F99; color: #fff;">
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

    <div class="nav shadow-lg">
  <div onclick="home()" class="nav-item active">
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
  <div onclick="profile()" class="nav-item">
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
