<?php

session_start();
include 'connect.php';
if(isset($_POST['submit'])){
  $project_name = $_POST['project_name'];
  $place = $_POST['place'];
  $department_id = $_POST['department_id'];


  $sql1="select project_name from `project` where project_name = '$project_name'";
  $check1=mysqli_query($con,$sql1);
  $row1=mysqli_fetch_assoc($check1);

  $sql2="select department_id from `department` where department_id = '$department_id'";
  $check2=mysqli_query($con,$sql2);
  $row2=mysqli_fetch_assoc($check2);

  if($row1){
    echo '<h2 class="text-sm-left">Project already exists</h2>';
  }
  elseif(!$row2){
    echo '<h3 class="text-sm-left">Department not exists</h3>';
  }
  else{
  $sql = "insert into `project` (project_name, place, department_id)
  values('$project_name', '$place', '$department_id')";

  $result = mysqli_query($con,$sql);
  if($result){
    $_SESSION['status'] = "Data inserted successfully";
    header('location:project.php');
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
      <h1 class="text-center">Add Project</h1>
    <form method="post">
      <div class="form-group">
        <label >Name</label>
        <input type="text" class="form-control" 
        placeholder="Enter your project's name" name = "project_name" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Place</label>
        <input type="text" class="form-control" 
        placeholder="Enter your place" name = "place" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Deparment 's ID</label>
        <input type="number" class="form-control" 
        placeholder="Enter your department's id" name = "department_id" autocomplete="off">
        </div>

  <button type="submit" class="btn btn-dark"name = "submit">Submit</button>
  <button class="btn btn-dark float-right"><a href="project.php" class = "text-light">Back</a>
</form>
    </div>
  </body>
</html>