<?php
session_start();
include 'connect.php';
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];
  $resetid = $_POST['resetid'];


  $sql1="select username from `admin` where username = '$username'";
  $check1=mysqli_query($con,$sql1);
  $row1=mysqli_fetch_assoc($check1);


  if(empty($username)){
    echo '<h2 class="text-sm-left">Username is required</h2>';
  }
  elseif(empty($password)){
    echo '<h2 class="text-sm-left">Password is required</h2>';;
  }
  elseif (empty($resetid)) {
    echo '<h2 class="text-sm-left">Reset code is required</h2>';;
  }
  elseif($password != $confirmpassword){
    echo '<h2 class="text-sm-left">Password not match</h2>';;
  }
  elseif ($resetid < 1000 || $resetid > 9999) {
    echo '<h2 class="text-sm-left">Reset code only have 4 digits</h2>';;
  }
  elseif ($row1) {
    echo '<h2 class="text-sm-left">Admin already exists</h2>';;

  }
  else{
  $hashed=password_hash($password, PASSWORD_DEFAULT);
  $sql = "insert into `admin` (username, password, resetid)
  values('$username', '$hashed', '$resetid')";

  $result = mysqli_query($con,$sql);
  if($result){
    $_SESSION['status'] = "Data inserted successfully";
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
      <h1 class="text-center">Add Admin</h1>
    <form method="post">
      <div class="form-group">
        <label >Username</label>
        <input type="text" class="form-control" 
        placeholder="Enter your username" name = "username" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Password</label>
        <input type="password" class="form-control" 
        placeholder="Enter your password" name = "password" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Confirm password</label>
        <input type="password" class="form-control" 
        placeholder="Enter your password" name = "confirmpassword" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Reset Code</label>
        <input type="number" class="form-control" 
        placeholder="Enter your reset code" name = "resetid" autocomplete="off">
        </div>

  <button type="submit" class="btn btn-dark"name = "submit">Submit</button>
  <button class="btn btn-dark float-right"><a href="home.php" class = "text-light">Back</a>
</form>
    </div>
  </body>
</html>