<?php
session_start();
include 'connect.php';

if(isset($_GET['deleteid'])){
	$project_id=$_GET['deleteid'];

	$sql="delete from `project` where project_id=$project_id";
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