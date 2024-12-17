<?php
	session_start();
	include_once('../include/db_connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM appointment WHERE id = '".$_GET['id']."'";

		if (mysqli_query($dbcon,$sql)) {
			echo "<script>window.open('appointment.php?msg=del_success','_self')</script>";
		}
		else{
			echo "<script>window.open('appointment.php?msg=del_error','_self')</script>";
		}
	}
?>

 