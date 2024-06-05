<?php
session_start();
include 'connect.php';

if(isset($_GET['deleteid'])){
	$department_id=$_GET['deleteid'];

	$sql="select * from `generalinformation` where department_id=$department_id";
	$result=mysqli_query($con, $sql);
	$row = mysqli_num_rows($result);

	if($row > 0){
		$_SESSION['status'] = "If you want to delete this department, please move employees in it to another one";
		header('location:department.php');
	}
	else{

		$sql1="delete from `department` where department_id=$department_id";
		$result1=mysqli_query($con, $sql1);


		$sql2="delete from `project` where department_id=$department_id";
		/*$result2=mysqli_query($con, $sql2);*/


		$sql3="select * from `project` where department_id=$department_id";
		$result3=mysqli_query($con, $sql3);
		$row3=mysqli_num_rows($result3);
		if($result1){
			if($row3 > 0){
				$result2=mysqli_query($con, $sql2);
				$_SESSION['status'] = "Data deleted successfully";
				header('location:department.php');
			}
			else{
				$_SESSION['status'] = "Data deleted successfully";
				header('location:department.php');
			}
		}
		else{
			die(mysqli_error($con));
		}
	}

}


?>