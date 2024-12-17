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
        .tstchk span{
              font-family: Bold;
            }
            .tstchk p{
                font-size: 13px;
            }
            .aplist{
              background-color: #153097 !important;
              margin-bottom: 15px;
              padding: 15px;
            }
            .aplist h5{
                color: #fff;
                font-family: Bold;
            }
            .aplist h6{
                color: aqua;
            }
            .aplist span{
                color: #fff;
            }
    </style>
</head>
<body>
         <script>
          //  iziToast.success({
          //     title: 'Success',
          //     message: 'Meal added to cart!',
          //     position: 'topLeft',
          //      animateInside: true,
          // });
        </script> 
   

    <section id="dash">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                   <h4 class="greeting">Hi <?php echo $name; ?></h4>
                   <p>Book an appointment with a Doctor within your state</p>
                    
                    <div class="results" >
                        <?php 

                            $sqld = "SELECT * FROM doctor WHERE state = '$state' ORDER BY id DESC";
                            $rund = mysqli_query($dbcon,$sqld);
                            if (mysqli_num_rows($rund)>1) {
                                
                            while($rowd = mysqli_fetch_assoc($rund)){
                                ?>
                                    <a style="text-decoration: none;" href="#edit_<?php echo $rowd['id']; ?>" data-toggle='modal'>
                                        <div class="aplist">
                                        <h5><?php echo $rowd['name']; ?></h5>
                                        <h6><?php echo $rowd['lga']; ?></h6>
                                        <span><?php echo $rowd['gsm']; ?></span>
                                    </div>
                                    </a>
                            <?php 
                            include('proceed.php'); 
                            }
                        }else{
                            echo "No doctor found in your state. Check again";
                             }
                            ?>
                       
                               
                       
                    </div>

                   <div>
                       <!-- <img src="../img/beatm.gif"> -->
                   </div>
                </div>
            </div> 
        </div>
    </section>


  <div class="nav shadow-lg">
  <div onclick="home()" class="nav-item ">
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
  <div onclick="history()" class="nav-item active">
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


</body>
</html>