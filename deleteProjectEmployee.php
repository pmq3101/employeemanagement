<?php
session_start();
include 'connect.php';
if(isset($_GET['deleteid'])){
	$employee_id=$_GET['deleteid'];

	$sql="delete from `projectemployee` where employee_id=$employee_id";
	$result=mysqli_query($con, $sql);
	if($result){
		$_SESSION['status'] = "Data deleted successfully";
		header('location:project.php');
	}
	else{
		die(mysqli_error($con));
	}

}

?>