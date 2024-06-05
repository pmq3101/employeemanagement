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

<div class="container my-3">
  <h1 class="text-center">Projects of department</h1>
    <button class="btn btn-dark float-left my-5"><a href="department.php" class = "text-light">Back</a>

</button>
<div class="container">
<table class="table table-bordered">
  <caption>List of projects</caption>
  <thead class="thead-dark">
    <?php
            $department_id=$_GET['getid'];

            $sql="select project_id, project_name, place from project p 
              inner join department d on p.department_id = d.department_id 
              where d.department_id = $department_id";

            $result=mysqli_query($con,$sql);
            if($result){
              
                echo '<thead class="thead-dark">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Place</th>

                  </tr>
                  </thread>';
                  while($row=mysqli_fetch_assoc($result)){
                  echo '<tbody>
                    <tr>
                      <td>'.$row['project_id'].'</td>
                      <td>'.$row['project_name'].'</td>
                      <td>'.$row['place'].'</td>

                    </tr>
                  </tbody>';
                }
            
            }

          


        ?>
  </thead>
</table>
</div> 
  
</body>
</html>