<?php
session_start();
include 'connect.php';

$employee_id=$_GET['updateid'];
$sql="Select * from  `salary` where employee_id=$employee_id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$employee_id = $row['employee_id'];
$fixedsalary = $row['fixedsalary'];
$bonussalary = $row['bonussalary'];


if(isset($_POST['submit'])){
  $fixedsalary = $_POST['fixedsalary'];
  $bonussalary = $_POST['bonussalary'];


  
  $sql = "update `salary` set fixedsalary='$fixedsalary', bonussalary='$bonussalary' where employee_id=$employee_id";

  $result = mysqli_query($con,$sql);
  if($result){
    $_SESSION['status'] = "Data updated successfully";
    header('location:salary.php');
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
      <h1 class="text-center">Update Salary</h1>
    <form method="post">
      <div class="form-group">
        <label >Fixed salary</label>
        <input type="number" class="form-control" 
        placeholder="Enter your fixed salary" name = "fixedsalary" autocomplete="off" value=<?php echo $fixedsalary;?>>
        </div>
      <div class="form-group">
        <label >Bonus salary</label>
        <input type="number" class="form-control" 
        placeholder="Enter your bonus salary" name = "bonussalary" autocomplete="off" value=<?php echo $bonussalary;?>>
        </div>

  <button type="submit" class="btn btn-dark"name = "submit">Update</button>
  <button class="btn btn-dark float-right"><a href="salary.php" class = "text-light">Back</a>
</form>
    </div>
  </body>
</html>