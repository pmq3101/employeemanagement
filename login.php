<?php 
session_start(); 
include "connect.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{

		$sql1="SELECT * FROM admin WHERE username='$uname'";
		$res=mysqli_query($con, $sql1);
		$row=mysqli_fetch_array($res);
		$hashed = $row['password'];
		if(password_verify($pass, $hashed)){

			$sql = "SELECT * FROM admin WHERE username='$uname' AND password='$hashed'";

			$result = mysqli_query($con, $sql);

			if (mysqli_num_rows($result) === 1) {
				$row = mysqli_fetch_assoc($result);
	            if ($row['username'] === $uname && $row['password'] === $hashed) {
	            	$_SESSION['username'] = $row['username'];
	            	header("Location: home.php");
			        exit();
	            }else{
					header("Location: index.php?error=Incorect User name or password");
			        exit();
				}
			}else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}
		else{
			header("Location: index.php?error=Incorect User name or password");
			  exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}



