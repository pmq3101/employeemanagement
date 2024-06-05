<?php
session_start();
include 'connect.php';
$project_id=$_GET['getid'];
if(isset($_POST['submit'])){
  $employee_id = $_POST['employee_id'];

  $sql1="select employee_id from `generalinformation` where employee_id = '$employee_id'";
  $check=mysqli_query($con,$sql1);
  $row=mysqli_fetch_assoc($check);

  $sql2="select * from generalinformation where department_id = (select department_id from project 
where project_id=$project_id) and employee_id = $employee_id;";
  $check2=mysqli_query($con,$sql2);
  $row2=mysqli_num_rows($check2);
  
  $sql4="select employee_id from `projectemployee` where employee_id=$employee_id and project_id=$project_id";
  $check4=mysqli_query($con,$sql1);
  $row4=mysqli_fetch_assoc($check);

  if(!$row){
    echo '<h2 class="text-sm-left">Employee Not Found</h2>';
  }
  elseif ($row4) {
    echo '<h2 class="text-sm-left">Employee Already In This Project</h2>';
  }
  elseif ($row2 == 0) {
    echo '<h3 class="text-sm-left">Employee Not In This Department</h3>';
  }
  else{

  $sql = "insert into `projectemployee` (employee_id, project_id)
  values('$employee_id', '$project_id')";

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"  

    
  </head>

  <body>
    <div class="container my-5">
      <h1 class="text-center">Add Project Employee</h1>
    <form method="post">
      <div class="form-group">
        <label >Employee 's ID</label>
        <input type="text" class="form-control" 
        placeholder="Enter your employee 's id" name = "employee_id" autocomplete="off">
        </div>

  <button type="submit" class="btn btn-dark my-5"name = "submit">Submit</button>
  <button class="btn btn-dark float-right my-5"><a href="project.php" class = "text-light">Back</a>
</form>
    </div>
  </body>
</html>