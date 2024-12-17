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
                     <div class="test">
                    <?php 
                        if ($status=="") {
                    ?>
                   <h4 class="greeting">Get Diagnose</h4>
                   <p>Answer the questions below correctly</p>
                   
                  
                      <form id="formadd" name="form1" method="post" enctype="multipart/form-data">
                            <div class="radio-list">
                                <div class="radio-item">
                                    <input type="checkbox" name="heart_failure1" value="heart failure" id="heart_failure_0" />
                                     <label for="heart_failure_0"> Shortness of breath</label>
                                </div>
                            </div>
                          
                            <div class="radio-list">
                                <div class="radio-item">
                                     <input type="checkbox" name="heart_failure2" value="heart failure" id="heart_failure_1" />
                                     <label for="heart_failure_1"> Fatigue</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                      <input type="checkbox" name="heart_failure3" value="heart failure" id="heart_failure_2" />
                                     <label for="heart_failure_2"> Feet swelling, ankles swelling</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                      <input type="checkbox" name="heart_failure4" value="heart failure" id="heart_failure_3" />
                                     <label for="heart_failure_3"> Coughing</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                      <input type="checkbox" name="heart_failure5" value="heart failure" id="heart_failure_4" />
                                     <label for="heart_failure_4">  Increased fat around the middle</label>
                                </div>
                            </div>

                             <div class="radio-list">
                                <div class="radio-item">
                                     <input type="checkbox" name="stroke1" value="stroke" id="stroke_0" />
                                     <label for="stroke_0">  Old age</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                      <input type="checkbox" name="stroke2" value="stroke" id="stroke_1" />
                                     <label for="stroke_1">  High blood pressure</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                      <input type="checkbox" name="stroke3" value="stroke" id="stroke_2" />
                                     <label for="stroke_2"> Diabetes</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                      <input type="checkbox" name="stroke4" value="stroke" id="stroke_3" />
                                     <label for="stroke_3">  High cholesterol intake</label>
                                </div>
                            </div>

                             <div class="radio-list">
                                <div class="radio-item">
                                      <input type="checkbox" name="stroke7" value="stroke" id="stroke_6" />
                                     <label for="stroke_6">  Headache</label>
                                </div>
                            </div>

                             <div class="radio-list">
                                <div class="radio-item">
                                      <input type="checkbox" name="coronary_heart_disease1" value="coronary heart disease" id="coronary_heart_disease_0" />
                                     <label for="coronary_heart_disease_0">  Tobacco smoking</label>
                                </div>
                            </div>

                           
                            <div class="radio-list">
                                <div class="radio-item">
                                     <input type="checkbox" name="coronary_heart_disease3" value="coronary heart disease" id="coronary_heart_disease_2" />
                                     <label for="coronary_heart_disease_2"> Hypertension</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                     <input type="checkbox" name="coronary_heart_disease4" value="coronary heart disease" id="coronary_heart_disease_3" />
                                     <label for="coronary_heart_disease_3"> Obesity</label>
                                </div>
                            </div>


                          

                            <div class="radio-list">
                                <div class="radio-item">
                                    <input type="checkbox" name="coronary_heart_disease6" value="coronary heart disease" id="coronary_heart_disease_5" />
                                     <label for="coronary_heart_disease_5"> Lack of exercise</label>
                                </div>
                            </div>


                            <div class="radio-list">
                                <div class="radio-item">
                                    <input type="checkbox" name="coronary_heart_disease7" value="coronary heart disease" id="coronary_heart_disease_6" />
                                     <label for="coronary_heart_disease_6"> Feeling Stressed</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                    <input type="checkbox" name="coronary_heart_disease8" value="coronary heart disease" id="coronary_heart_disease_7" />
                                     <label for="coronary_heart_disease_7"> High alcohol consumption</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                   <input type="checkbox" name="Cor_pulmonale1" value="Cor pulmonale" id="Cor_pulmonale_0" />
                                     <label for="Cor_pulmonale_0"> Shortness of breath which occurs on exertion but when severe can occur at rest</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                   <input type="checkbox" name="Cor_pulmonale2" value="Cor pulmonale" id="Cor_pulmonale_1" />
                                     <label for="Cor_pulmonale_1"> Wheezing</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                   <input type="checkbox" name="Cor_pulmonale3" value="Cor pulmonale" id="Cor_pulmonale_2" />
                                     <label for="Cor_pulmonale_2"> Chronic wet cough</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                   <input type="checkbox" name="Cor_pulmonale4" value="Cor pulmonale" id="Cor_pulmonale_3" />
                                     <label for="Cor_pulmonale_3"> Swelling of the abdomen with fluid (ascites)</label>
                                </div>
                            </div>

                             <div class="radio-list">
                                <div class="radio-item">
                                   <input type="checkbox" name="Cor_pulmonale5" value="Cor pulmonale" id="Cor_pulmonale_4" />
                                     <label for="Cor_pulmonale_4"> Swelling of the ankles and feet (pedal edema)</label>
                                </div>
                            </div>


                             <div class="radio-list">
                                <div class="radio-item">
                                   <input type="checkbox" name="Cor_pulmonale6" value="Cor pulmonale" id="Cor_pulmonale_5" />
                                     <label for="Cor_pulmonale_5">  Enlargement or prominent neck and facial veins</label>
                                </div>
                            </div>

                              <div class="radio-list">
                                <div class="radio-item">
                                   <input type="checkbox" name="Cor_pulmonale7" value="Cor pulmonale" id="Cor_pulmonale_6" />
                                     <label for="Cor_pulmonale_6">  Raised Jugular Venous Pulse (JVP)</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                  <input type="checkbox" name="Cor_pulmonale8" value="Cor pulmonale" id="Cor_pulmonale_7" />
                                     <label for="Cor_pulmonale_7">  Enlargement of the liver</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                   <input type="checkbox" name="Cor_pulmonale9" value="Cor pulmonale" id="Cor_pulmonale_8" />
                                     <label for="Cor_pulmonale_8">   Bluish discoloration of face</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                   <input type="checkbox" name="Cor_pulmonale10" value="Cor pulmonale" id="Cor_pulmonale_9" />
                                     <label for="Cor_pulmonale_9">   Presence of abnormal heart sounds</label>
                                </div>
                            </div>

                            <div class="radio-list">
                                <div class="radio-item">
                                    <input type="checkbox" name="cardiac_dysrhythmia" value="cardiac dysrhythmia" id="cardiac_dysrhythmia_0" />
                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                     <label for="cardiac_dysrhythmia_0">   Abnormal awareness of heartbeat</label>
                                </div>
                            </div>



                            <button class="btn btn-primary btn-block btn-lg" id="save"> <span id="spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="width: 20px; height: 20px;display: none;color: #000 !important;"></span> Diagnose</button>  

                   

               <?php }else{
                ?>
                    <h4 class="greeting">You have already being diagnosed</h4>
                   <p>Click on the button below to view results</p>
                   <a href="history.php"><button class="btn btn-primary btn-block">View Results</button></a>
                <?php
               } ?>
                 </div>  
                </div>
            </div> 
        </div>
    </section>


  <div class="nav shadow-lg">
  <div onclick="home()" class="nav-item">
      <i class="material-icons home-icon">
          home
      </i>
      <span class="nav-text">Home</span>
  </div>
  <div onclick="diagnose()" class="nav-item active">
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