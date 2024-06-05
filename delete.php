<?php
session_start();
include 'connect.php';
if(isset($_GET['deleteid'])){
	$employee_id=$_GET['deleteid'];

	$sql="delete from `generalinformation` where employee_id=$employee_id";
	$result=mysqli_query($con, $sql);
	if($result){
		$_SESSION['status'] = "Data deleted successfully";
		header('location:display.php');
	}
	else{
		die(mysqli_error($con));
	}

}



?>