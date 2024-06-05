<?php
session_start();
include 'connect.php';

$employee_id=$_GET['updateid'];
$sql="Select * from  `generalinformation` where employee_id=$employee_id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $email = $row['email'];
  $phonenumber = $row['phonenumber'];
  $address = $row["address"];
  $department_id = $row["department_id"];


if(isset($_POST['submit'])){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $phonenumber = $_POST['phonenumber'];
  $address = $_POST["address"];
  $department_id = $_POST["department_id"];



  $sql2="select department_id from `department` where department_id = '$department_id'";
  $check2=mysqli_query($con,$sql2);
  $row2=mysqli_fetch_assoc($check2);


  if(!$row2){
    echo '<h3 class="text-sm-left">Department not exists</h3>';
  }
  else{
  $sql = "update `generalinformation` set employee_id = $employee_id, firstname='$firstname', lastname='$lastname', email='$email', phonenumber='$phonenumber', address='$address', department_id='$department_id' where employee_id=$employee_id";

  $result = mysqli_query($con,$sql);
  if($result){
    $_SESSION['status'] = "Data updated successfully";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"  

    
  </head>

  <body>
    <div class="container my-5">
      <h1 class="text-center">Update Employee 's Information</h1>
    <form method="post">
      <div class="form-group">
        <label >First Name</label>
        <input type="text" class="form-control" 
        placeholder="Enter your first name" name = "firstname" autocomplete="off" value=<?php echo $firstname;?>>
        </div>
      <div class="form-group">
        <label >Last Name</label>
        <input type="text" class="form-control" 
        placeholder="Enter your last name" name = "lastname" autocomplete="off" value=<?php echo $lastname;?>>
        </div>
      <div class="form-group">
        <label >Email</label>
        <input type="email" class="form-control" 
        placeholder="Enter your email" name = "email" autocomplete="off" value=<?php echo $email;?>>
        </div>
      <div class="form-group">
        <label >Phone Number</label>
        <input type="text" class="form-control" 
        placeholder="Enter your phone number" name = "phonenumber" autocomplete="off" value=<?php echo $phonenumber;?>>
        </div>
      <div class="form-group">
        <label >Address</label>
        <input type="text" class="form-control" 
        placeholder="Enter your address" name = "address" autocomplete="off" value=<?php echo $address;?>>
        </div>
      <div class="form-group">
        <label >Department_id</label>
        <input type="number" class="form-control" 
        placeholder="Enter your department_id" name = "department_id" autocomplete="off" value=<?php echo $department_id;?>>
        </div>

  <button type="submit" class="btn btn-dark"name = "submit">Update</button>
  <button class="btn btn-dark float-right"><a href="display.php" class = "text-light">Back</a>
</form>
    </div>
  </body>
</html>