<?php
session_start();
if(!isset($_SESSION['username'])){
  header("Location: index.php");
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
	<div class="container my-5">
  <h3>Welcome To Employee Management System, <?php echo $_SESSION['username']; ?></h3>
</div>
</body>
</html>