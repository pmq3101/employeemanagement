<?php
session_start();
include 'connect.php';
if(isset($_POST['submit'])){
  $department_id = $_POST['department_id'];
  $department_name = $_POST['department_name'];
  $department_manager_id = $_POST['department_manager_id'];
  $hotline = $_POST['hotline'];

  $sql1="select department_name from `department` where department_name = '$department_name'";
  $check1=mysqli_query($con,$sql1);
  $row1=mysqli_fetch_assoc($check1);


  $sql2="select employee_id from `generalinformation` where employee_id = '$department_manager_id'";
  $check2=mysqli_query($con,$sql2);
  $row2=mysqli_fetch_assoc($check2);

  $sql3="select department_manager_id from `department` where department_manager_id = '$department_manager_id'";
  $check3=mysqli_query($con,$sql3);
  $row3=mysqli_fetch_assoc($check3);

  $sql4="select employee_id from `generalinformation` where department_id = '$department_id' and employee_id='$department_manager_id'";
  $check4=mysqli_query($con,$sql4);
  $row4=mysqli_num_rows($check4);

  if($row1){
      echo '<h2 class="text-sm-left">Department already exists</h2>';
  }
  elseif (!$row2) {
    echo '<h3 class="text-sm-left">Manager not exists</h3>';
  }
  elseif($row3){
    echo '<h4 class="text-sm-left">Manager already manages another department</h4>';
  }
  elseif($row4 == 0){
    echo '<h4 class="text-sm-left">Employee not in this department</h4>';
  }
  else{
  $sql = "insert into `department` (department_id, department_name, department_manager_id, hotline)
  values('$department_id', '$department_name', '$department_manager_id', '$hotline')";

  $result = mysqli_query($con,$sql);
  if($result){
    $_SESSION['status'] = "Data inserted successfully";
    header('location:department.php');
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
      <h1 class="text-center">Add Department</h1>
    <form method="post">
      <div class="form-group">
        <label >Department 's ID</label>
        <input type="text" class="form-control" 
        placeholder="Enter your department's id" name = "department_id" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Department 's name</label>
        <input type="text" class="form-control" 
        placeholder="Enter your department's name" name = "department_name" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Manager 's ID</label>
        <input type="number" class="form-control" 
        placeholder="Enter your department manager's id" name = "department_manager_id" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Department 's hotline</label>
        <input type="text" class="form-control" 
        placeholder="Enter your department 's hotline" name = "hotline" autocomplete="off">
        </div>

  <button type="submit" class="btn btn-dark"name = "submit">Submit</button>
  <button class="btn btn-dark float-right"><a href="department.php" class = "text-light">Back</a>
</form>
    </div>
  </body>
</html>