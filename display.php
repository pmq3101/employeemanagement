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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>


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
	<button class="btn btn-dark my-5"><a href="user.php" class = "text-light">Add employee</a>
<div class="dropdown">
  <button class="btn btn-info dropdown-toggle float-right my-5" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Search Employee
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="searchEmployeeID.php">Search By ID</a>
    <a class="dropdown-item" href="searchFName.php">Search By First Name</a>
    <a class="dropdown-item" href="searchLName.php">Search By Last Name</a>
  </div>
</div>

</button>
<table class="table">
  <caption>List of employees</caption>
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Address</th>
      <th scope="col">Department 's ID</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

  <?php

  $sql = "Select * from `generalinformation`";
  $result = mysqli_query($con, $sql);
  if($result){
  	while($row=mysqli_fetch_assoc($result)){
  		$employee_id=$row['employee_id'];
  		$firstname=$row['firstname'];
  		$lastname=$row['lastname'];
  		$email=$row['email'];
  		$phonenumber=$row['phonenumber'];
  		$address=$row['address'];
      $department_id=$row['department_id'];
  		echo '<tr>
      <th scope="row">'.$employee_id.'</th>
      <td>'.$firstname.'</td>
      <td>'.$lastname.'</td>
      <td>'.$email.'</td>
      <td>'.$phonenumber.'</td>
      <td>'.$address.'</td>
      <td>'.$department_id.'</td>
    <td>
 	<button class="btn btn-dark"><a href="update.php?updateid='.$employee_id.'" class="text-light">Update</a></button>
 	<button class="btn btn-danger"><a href="delete.php?deleteid='.$employee_id.'" class="text-light">Delete</a></button>
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