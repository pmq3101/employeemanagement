<?php
session_start();
include 'connect.php';

$project_id=$_GET['updateid'];
$sql = "Select * from  `project` where project_id=$project_id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$project_id = $row['project_id'];
$project_name = $row['project_name'];
$place = $row['place'];
$department_id = $row['department_id'];



if(isset($_POST['submit'])){
  $project_name = $_POST['project_name'];
  $place = $_POST['place'];
  $department_id = $_POST['department_id'];

  $sql = "update `project` set project_name='$project_name', place='$place', department_id='$department_id' where project_id=$project_id";

  $result = mysqli_query($con,$sql);
  if($result){
    $_SESSION['status'] = "Data updated successfully";
    header('location:project.php');
  } else {
    die(mysqli_error($con));
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
      <h1 class="text-center">Update Project 's Information</h1>
    <form method="post">
      <div class="form-group">
        <label >Project 's name</label>
        <input type="text" class="form-control" 
        placeholder="Enter your project's name" name = "project_name" autocomplete="off" value=<?php echo $project_name;?>>
        </div>
      <div class="form-group">
        <label >Place</label>
        <input type="text" class="form-control" 
        placeholder="Enter your place" name = "place" autocomplete="off" value=<?php echo $place;?>>
        </div>
      <div class="form-group">
        <label >Department 's ID</label>
        <input type="number" class="form-control" 
        placeholder="Enter your department's id" name = "department_id" autocomplete="off" value=<?php echo $department_id;?>>
        </div>

  <button type="submit" class="btn btn-dark"name = "submit">Update</button>
  <button class="btn btn-dark float-right"><a href="project.php" class = "text-light">Back</a>
</form>
    </div>
  </body>
</html>