<?php

session_start();
include 'connect.php';
if(isset($_POST['submit'])){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $phonenumber = $_POST['phonenumber'];
  $address = $_POST["address"];
  $department_id = $_POST["department_id"];


  $sql1="select email from `generalinformation` where email = '$email'";
  $check1=mysqli_query($con,$sql1);
  $row1=mysqli_fetch_assoc($check1);

  $sql2="select department_id from `department` where department_id = '$department_id'";
  $check2=mysqli_query($con,$sql2);
  $row2=mysqli_fetch_assoc($check2);


  if($row1){
    echo '<h2 class="text-sm-left">Email already exists</h2>';
  }
  elseif(!$row2){
    echo '<h3 class="text-sm-left">Department not exists</h3>';
  }

  else{

  $sql = "insert into `generalinformation` (firstname, lastname, email, phonenumber, address, department_id)
  values('$firstname', '$lastname', '$email', '$phonenumber', '$address', '$department_id')";

  $result = mysqli_query($con,$sql);
  if($result){
    $_SESSION['status'] = "Data inserted successfully";
    header('location:display.php');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css">

    
  </head>

  <body>
    <div class="container my-5">
      <h1 class="text-center">Add Employee</h1>
    <form method="post">
      <div class="form-group">
        <label >First Name</label>
        <input type="text" class="form-control" 
        placeholder="Enter your first name" name = "firstname" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Last Name</label>
        <input type="text" class="form-control" 
        placeholder="Enter your last name" name = "lastname" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Email</label>
        <input type="email" class="form-control" 
        placeholder="Enter your email" name = "email" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Phone Number</label>
        <input type="text" class="form-control" 
        placeholder="Enter your phone number" name = "phonenumber" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Address</label>
        <input type="text" class="form-control" 
        placeholder="Enter your address" name = "address" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Department_id</label>
        <input type="number" class="form-control" 
        placeholder="Enter your department_id" name = "department_id" autocomplete="off">
        </div>

  <button type="submit" class="btn btn-dark"name = "submit">Submit</button>
  <button class="btn btn-dark float-right"><a href="display.php" class = "text-light">Back</a>
</form>
    </div>
  </body>
</html>