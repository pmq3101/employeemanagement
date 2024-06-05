<?php
session_start();
include 'connect.php';
if(isset($_POST['submit'])){
  $employee_id = $_POST['employee_id'];
  $fixedsalary = $_POST['fixedsalary'];
  $bonussalary = $_POST['bonussalary'];

  $sql1="select employee_id from `generalinformation` where employee_id = '$employee_id'";
  $check=mysqli_query($con,$sql1);
  $row=mysqli_fetch_assoc($check);
  if(!$row){
    echo '<h2 class="text-sm-left">Employee Not Found</h2>';
  }
  else{

  $sql = "insert into `salary` (employee_id, fixedsalary, bonussalary)
  values('$employee_id', '$fixedsalary', '$bonussalary')";

  $result = mysqli_query($con,$sql);
  if($result){
    $_SESSION['status'] = "Data inserted successfully";
    header('location:salary.php');
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
      <h1 class="text-center">Add Employee 's Salary</h1>
    <form method="post">
      <div class="form-group">
        <label >Employee_id</label>
        <input type="text" class="form-control" 
        placeholder="Enter your employee_id" name = "employee_id" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Fixed Salary</label>
        <input type="number" class="form-control" 
        placeholder="Enter your fixed salary" name = "fixedsalary" autocomplete="off">
        </div>
      <div class="form-group">
        <label >Bonus Salary</label>
        <input type="number" class="form-control" 
        placeholder="Enter your bonus salary" name = "bonussalary" autocomplete="off">

  <button type="submit" class="btn btn-dark my-5"name = "submit">Submit</button>
  <button class="btn btn-dark float-right my-5"><a href="salary.php" class = "text-light">Back</a>
</form>
    </div>
  </body>
</html>