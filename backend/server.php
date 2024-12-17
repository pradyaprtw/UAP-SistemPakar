<?php
error_reporting(0);
include '../include/db_connection.php';
$errors = array();
	$name = $_POST['name'];
  $gsm  = $_POST['gsm'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $state = $_POST['state'];
  $lga = $_POST['lga'];
  $pword = $_POST['pword'];


          $addevent = "INSERT INTO doctor (name,gsm,address,email,state,lga, pword) VALUES ('$name','$gsm','$address','$email','$state','$lga','$pword')";
          
          if (mysqli_query($dbcon,$addevent)) {
                       header('Location: new_doctor.php?msg=success');
                      }
                      else{
                         header('Location: new_doctor.php?msg=error');
          }
          

          



?>