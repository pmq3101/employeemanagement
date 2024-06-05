<?php
session_start();
include 'connect.php';
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


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    
  <?php 
    if(isset($_SESSION['status']))
    {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
               <?php echo $_SESSION['status']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <?php 
        unset($_SESSION['status']);
    }

?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">
    <img src="style/1.png" width="40" height="35" alt="">
  </a>
</nav>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="display.php">Employee</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="salary.php">Salary</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="department.php">Department</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="project.php">Project</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Settings
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="addAdmin.php">Add new admin</a>
          <a class="dropdown-item" href="changepw.php">Change Password</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
  <button class="btn btn-dark my-5"><a href="addDepartment.php" class = "text-light">Add department</a>

</button>
<div class="container">
<table class="table table-bordered">
  <caption>List of departments</caption>
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Manager's ID</th>
      <th scope="col">Hotline</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

  <?php

  $sql = "Select * from `department`";
  $result = mysqli_query($con, $sql);
  if($result){
  	while($row=mysqli_fetch_assoc($result)){
  		$department_id=$row['department_id'];
  		$department_name=$row['department_name'];
  		$department_manager_id=$row['department_manager_id'];
            $hotline=$row['hotline'];

  		echo '<tr>
      <th scope="row">'.$department_id.'</th>
      <td>'.$department_name.'</td>
      <td>'.$department_manager_id.'</td>
      <td>'.$hotline.'</td>
    <td>
 	<button class="btn btn-dark"><a href="updateDepartment.php?updateid='.$department_id.'" class="text-light">Update</a></button>
 	<button class="btn btn-danger"><a href="deleteDepartment.php?deleteid='.$department_id.'" class="text-light">Delete</a></button>
  <button class="btn btn-info"><a href="departmentEmployee.php?getid='.$department_id.'" class="text-light">Get Employee</a></button>
  <button class="btn btn-info"><a href="departmentProject.php?getid='.$department_id.'" class="text-light">Get Project</a></button>
 </td>
    </tr>';
  	}
  }

  ?>

  </tbody>
</table>
</div> 
	
</body>
</html>