<?php
session_start();
include '../include/db_connection.php';
$email = $_POST['email'];
$pword = $_POST['pword'];


      $login = "SELECT * FROM users WHERE email='$email' AND pword='$pword'";
          $logrun = mysqli_query($dbcon,$login);
          if (mysqli_num_rows($logrun)>0) {

              $_SESSION['email']=$email;
              echo "success";
            }
        
          else{
             echo "Invalid Login Details";
          }
          


?>