<?php
session_start();
include '../include/db_connection.php';
$email = $_POST['email'];
$pword = $_POST['pword'];
$name = $_POST['name'];
$state = $_POST['state'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$age = $_POST['age'];



      $sql = "INSERT INTO users (name, email, pword,  state, phone, age, address) VALUES ('$name','$email','$pword','$state','$phone','$age','$address')";
          $logrun = mysqli_query($dbcon,$sql);
          if ($logrun) {

              $_SESSION['email']=$email;
              echo "success";
            }
        
          else{
             echo mysqli_error($dbcon);
          }
          


?>