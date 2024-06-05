<?php
session_start();
include 'connect.php';

$department_id=$_GET['updateid'];
$sql="Select * from  `department` where department_id=$department_id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$department_id = $row['department_id'];
$department_name = $row['department_name'];
$department_manager_id = $row['department_manager_id'];
$hotline = $row['hotline'];



if(isset($_POST['submit'])){
  $department_id = $_POST['department_id'];
  $department_name = $_POST['department_name'];
  $department_manager_id = $_POST['department_manager_id'];
  $hotline = $_POST['hotline'];

  $sql2="select employee_id from `generalinformation` where employee_id = '$department_manager_id'";
  $check2=mysqli_query($con,$sql2);
  $row2=mysqli_fetch_assoc($check2);

  $sql3="select department_manager_id from `department` where department_manager_id = '$department_manager_id'";
  $check3=mysqli_query($con,$sql3);
  $row3=mysqli_fetch_assoc($check3);

  $sql4="select employee_id from `generalinformation` where department_id = '$department_id' and employee_id='$department_manager_id'";
  $check4=mysqli_query($con,$sql4);
  $row4=mysqli_num_rows($check4);


  
  if (!$row2) {
    echo '<h3 class="text-sm-left">Manager not exists</h3>';
  }
  elseif($row3){
    echo '<h4 class="text-sm-left">Manager already manages another department</h4>';
  }
  elseif($row4 == 0){
    echo '<h4 class="text-sm-left">Employee not in this department</h4>';
  }
  else{

  $sql = "update `department` set department_id = $department_id, department_name='$department_name', department_manager_id='$department_manager_id', hotline='$hotline' where department_id=$department_id";

  $result = mysqli_query($con,$sql);
  if($result){
    $_SESSION['status'] = "Data updated successfully";
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
      <h1 class="text-center">Update Department 's Information</h1>
    <form method="post">
      <div class="form-group">
        <label >Department 's ID</label>
        <input type="number" class="form-control" 
        placeholder="Enter your department's id" name = "department_id" autocomplete="off" value=<?php echo $department_id;?>>
        </div>
      <div class="form-group">
        <label >Department 's name</label>
        <input type="text" class="form-control" 
        placeholder="Enter your department name" name = "department_name" autocomplete="off" value=<?php echo $department_name;?>>
        </div>
      <div class="form-group">
        <label >Manager's ID</label>
        <input type="number" class="form-control" 
        placeholder="Enter your department manager's id" name = "department_manager_id" autocomplete="off" value=<?php echo $department_manager_id;?>>
        </div>
      <div class="form-group">
        <label >Department 's hotline</label>
        <input type="text" class="form-control" 
        placeholder="Enter your department's hotline" name = "hotline" autocomplete="off" value=<?php echo $hotline;?>>
        </div>

  <button type="submit" class="btn btn-dark"name = "submit">Update</button>
  <button class="btn btn-dark float-right"><a href="department.php" class = "text-light">Back</a>
</form>
    </div>
  </body>
</html>