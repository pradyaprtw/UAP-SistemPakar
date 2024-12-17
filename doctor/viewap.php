<?php 
session_start();
include '../include/server.php';


$email = $_GET['email'];
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
    </style>
</head>
<body>
         <?php 
            if ($_GET['msg']=="success") {
                ?>
                    <script>
                   iziToast.success({
                      title: '',
                      message: 'Appointment booked successfully',
                      position: 'topCenter',
                       animateInside: true,
                  });
        </script> 
                <?php
            }
         ?>
   

    <section id="dash">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                   <h4 class="greeting">Hi <?php echo $name; ?></h4>
                   <p>Below is your diagnosis results</p>
                    
                    <div class="results" >
                        <?php 

                            $sqld = "SELECT * FROM diagnosis WHERE email = '$email' ORDER BY id DESC LIMIT 1";
                            $rund = mysqli_query($dbcon,$sqld);
                            $rowd = mysqli_fetch_assoc($rund);
                                ?>

                                    <h5 style="font-family: Bold;border-left: 4px solid #153097;padding-left: 10px;"><?php echo $rowd['recommendation']; ?></h5>
                                    <div class="tstchk">
                                        <p><?php echo $rowd['binfo']; ?></p>
                                    </div>

                                <?php
                            
                                $hf = $rowd['heart_failure1'] + $rowd['heart_failure2'] + $rowd['heart_failure3'] + $rowd['heart_failure4'] + $rowd['heart_failure5'];
                                $st = $rowd['stroke1'] + $rowd['stroke2'] + $rowd['stroke3'] + $rowd['stroke4'] + $rowd['stroke7'];
                                $cp = $rowd['Cor_pulmonale1'] + $rowd['Cor_pulmonale2'] + $rowd['Cor_pulmonale3'] + $rowd['Cor_pulmonale4'] + $rowd['Cor_pulmonale5'] +  $rowd['Cor_pulmonale6'] +$rowd['Cor_pulmonale7'] +$rowd['Cor_pulmonale8'] +$rowd['Cor_pulmonale9'] +$rowd['Cor_pulmonale10'];
                                $cr = $rowd['coronary_heart_disease1'] + $rowd['coronary_heart_disease3'] + $rowd['coronary_heart_disease4'] + $rowd['coronary_heart_disease6'] +  $rowd['coronary_heart_disease7'] +$rowd['coronary_heart_disease8'];
                                $cd = $rowd['cardiac_dysrhythmia'];
                        ?>

                        <div class="card" style="margin-top: 20px;">
                            <div class="card-header border-0 pb-0 d-sm-flex d-block" style="background-color: #153097;color: #fff;">
                                <div>
                                    <h4 class="card-title">Diagnosis Analysis</h4>
                                    <!-- <small class="mb-0">Diagnose Analysis from results</small> -->
                                </div>
                                
                            </div>
                            <div class="card-body revenue-chart px-3">
                                    
                                <div id="chartBar"></div>
                            </div>
                        </div>

                       
                    </div>

                   <div>
                       <!-- <img src="../img/beatm.gif"> -->
                   </div>
                </div>
            </div> 
        </div>
    </section>



<script src="../user/chart.js/Chart.bundle.min.js"></script>
<script src="../user/apexchart/apexchart.js"></script> 
<!-- Chart piety plugin files -->
<script src="peity/jquery.peity.min.js"></script>
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


     
</script>
<script type="text/javascript">
    
    (function($) {
    /* "use strict" */


 var dzChartlist = function(){
    
    var screenWidth = $(window).width();
        
    
    var chartBar = function(){
        
        var options = {
              series: [
                {
                    name: 'Analysis',
                    data: [<?php echo $hf; ?>, <?php echo $st; ?>, <?php echo $cp; ?>, <?php echo $cr; ?>, <?php echo $cd; ?>],
                    //radius: 12,   
                }, 
                
                
            ],
                chart: {
                type: 'area',
                height: 350,
                
                toolbar: {
                    show: false,
                },
                
            },
            plotOptions: {
              bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
              },
            },
            colors:['#153097'],
            dataLabels: {
              enabled: true,
            },
            markers: {
        shape: "circle",
        },
        
        
            legend: {
                show: true,
                fontSize: '12px',
                
                labels: {
                    colors: '#000000',
                    
                },
                position: 'top',
                horizontalAlign: 'left',    
                markers: {
                    width: 19,
                    height: 19,
                    strokeWidth: 0,
                    strokeColor: '#fff',
                    fillColors: undefined,
                    radius: 4,
                    offsetX: -5,
                    offsetY: -5 
                }
            },
            stroke: {
              show: true,
              width: 4,
              colors:['#2f4cdd', '#b519ec'],
            },
            
            grid: {
                borderColor: '#eee',
            },
            xaxis: {
                
              categories: ['Failure', 'Stroke', 'Pulmonale', 'Coronary', 'Dysrhythmia'],
              labels: {
                style: {
                    colors: '#3e4954',
                    fontSize: '13px',
                    fontWeight: 100,
                    cssClass: 'apexcharts-xaxis-label',
                },
              },
              crosshairs: {
              show: false,
              }
            },
            yaxis: {
                labels: {
               style: {
                  colors: '#3e4954',
                  fontSize: '13px',
                   fontFamily: 'Bold',
                  cssClass: 'apexcharts-xaxis-label',
              },
              },
            },
            fill: {
              opacity: 1
            },
            tooltip: {
              y: {
                formatter: function (val) {
                  return "" + val + " Reports"
                }
              }
            }
            };

            var chartBar1 = new ApexCharts(document.querySelector("#chartBar"), options);
            chartBar1.render();
    }
    
    
    
    
    /* Function ============ */
        return {
            init:function(){
            },
            
            
            load:function(){  
                chartBar();
                
            },
            
            resize:function(){
                
            }
        }
    
    }();

    jQuery(document).ready(function(){
    });
        
    jQuery(window).on('load',function(){
        setTimeout(function(){
            dzChartlist.load();
        }, 1000); 
        
    });

    jQuery(window).on('resize',function(){
        
        
    });     

})(jQuery);
</script>
</body>
</html>