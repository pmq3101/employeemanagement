<?php
session_start();
include 'connect.php';

if(isset($_GET['deleteid'])){
	$employee_id=$_GET['deleteid'];
	$sql1="select * from `generalinformation` where employee_id=$employee_id";
	$res=mysqli_query($con,$sql1);
	$row=mysqli_num_rows($res);
	if($row > 0){
		$_SESSION['status'] = "Delete information of this employee first";
		header('location:salary.php');
	}
	else{
		$sql="delete from `salary` where employee_id=$employee_id";
		$result=mysqli_query($con, $sql);
		if($result){
			$_SESSION['status'] = "Data deleted successfully";
			header('location:salary.php');
		}
		else{
			die(mysqli_error($con));
		}
	}

}



?>