<?php

error_reporting(0);
session_start();
include 'db_connection.php';
$errors = array();

if (isset($_POST['login'])) {
  
	$uname = $_POST['uname'];
	$pword = $_POST['pword'];


	
       $check_user = "SELECT * FROM backend WHERE uname = '$uname' AND pword='$pword'";
       $run = mysqli_query($dbcon,$check_user);
       if (mysqli_num_rows($run)>0) {
        $_SESSION['uname'] = $uname;
          header('Location: dashboard.php?msg=success');
       }else{
         header('Location: index.php?msg=error');
      } 
      }

      if (isset($_POST['dlogin'])) {
  
  $email = $_POST['email'];
  $pword = $_POST['pword'];


  
       $check_user = "SELECT * FROM doctor WHERE email = '$email' AND pword='$pword'";
       $run = mysqli_query($dbcon,$check_user);
       if (mysqli_num_rows($run)>0) {
        $_SESSION['email'] = $email;
          header('Location: dashboard.php?msg=success');
       }else{
         header('Location: index.php?msg=error');
      } 
      }
    

   if (isset($_POST['proceedbook'])) {
          
          $id = $_POST['id'];
          $name = $_POST['name'];
          $email = $_POST['email'];
          $gsm = $_POST['gsm'];
          $pemail = $_POST['pemail'];
          $pname = $_POST['pname'];
          $comment = mysqli_escape_string($dbcon,$_POST['comment']);
          $apdate = date('d-m-Y');
           

          $sql = "INSERT INTO appointment (dname,demail,pname,pemail,remark,apdate) VALUES ('$name','$email','$pname','$pemail','$comment','$apdate')";
          if (mysqli_query($dbcon,$sql)) {
            $url = "https://www.bulksmsnigeria.com/api/v1/sms/create";
            $fields = [
              'api_token' => "Your Token",
              'from' => "Sender ID",
               'to' => $gsm,
              'body' => "Hello ".$name.", ".$pname." Booked an appointment withyou. Visit your dashboard to view full analysis and details ",
              'dnd' => "2"
            ];
            $fields_string = http_build_query($fields);
            //open connection
            $ch = curl_init();
            
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            
            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
            
            
            $result = curl_exec($ch);
            if ($result) {
              header('Location: history.php?msg=success');
            }else{
              header('Location: history.php?msg=error01');
             
          }
            

            

     }  else{
      header('Location: history.php?msg=error02');
     }  

   }

    
?>
