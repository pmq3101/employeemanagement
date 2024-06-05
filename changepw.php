<?php
session_start();
include 'connect.php';

$user=$_SESSION['username'];
$sql="Select * from  `admin` where username='$user'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$password1 = $row['password'];
$resetid = $row['resetid'];

if(isset($_POST['submit'])){
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];
  $newpassword = $_POST['newpassword'];
  $resetid = $_POST['resetid'];
  
  $sql1="select resetid from `admin` where resetid='$resetid'";
  $check1=mysqli_query($con,$sql1);
  $row1=mysqli_num_rows($check1);

  if(empty($password)){
    echo '<h2 class="text-sm-left">Old password is required</h2>'; 
  }
  elseif(empty($newpassword)){
    echo '<h2 class="text-sm-left">New password is required</h2>';
  }
  elseif (empty($confirmpassword)){ 
    echo '<h2 class="text-sm-left">You need to confirm new password</h2>';
  }
  elseif (empty($resetid)){ 
    echo '<h2 class="text-sm-left">Reset code is required</h2>';
  }
  elseif($row1===0){
    echo '<h2 class="text-sm-left">Reset code is wrong</h2>';
  }
  elseif ($confirmpassword != $newpassword) {
    echo '<h2 class="text-sm-left">Confirm your password again</h2>';
  }
  elseif (!password_verify($password, $password1)) {
    echo '<h2 class="text-sm-left">Old password is wrong</h2>';
  }


  else{
  $hashed=password_hash($newpassword, PASSWORD_DEFAULT);
  $sql = "update `admin` set password = '$hashed' where username='$user'";
  $result = mysqli_query($con,$sql);
  if($result){
    $_SESSION['status'] = "Data updated successfully";
    header('location:home.php');
  } else {
    die(mysqli_error($con));
  }
}
}




?>


<!DOCTYPE html<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Employee Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"  

    
  </head>

  <body>
    <div class="container my-5">
      <h1 class="text-center">Change Password</h1>
    <form method="post">
      <div class="form-group">
        <label >Old Password</label>
        <input type="password" class="form-control" 
        placeholder="Enter your old password" name = "password" autocomplete="off">
        </div>
      <div class="form-group">
        <label >New Password</label>
        <input type="password" class="form-control" 
        placeholder="Enter your new password" name = "newpassword" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Confirm Password</label>
        <input type="password" class="form-control" 
        placeholder="Confirm your password" name = "confirmpassword" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Reset Code</label>
        <input type="number" class="form-control" 
        placeholder="Enter your reset code" name = "resetid" autocomplete="off">
        </div>

  <button type="submit" class="btn btn-dark"name = "submit">Update</button>
  <button class="btn btn-dark float-right"><a href="home.php" class = "text-light">Back</a>
</form>
    </div>
  </body>
</html>