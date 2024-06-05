<?php
include 'connect.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Employee Management</title>

  </head>
  <body>
  <div class="container my-5">
    <h1 class="text-center">Search Employee</h1>
    <form method="post">
      <input type="text" placeholder="search data" name = "submit">
      <button class="btn btn-dark btn-sm">Search</button>
    </form>
    <div class="container my-5">
      <table class="table">
        <?php
          if(isset($_POST['submit'])){
            $search=$_POST['submit'];

            $sql="select * from  `generalinformation` where firstname like '%$search%'";

            $result=mysqli_query($con,$sql);
            if($result){
              if(mysqli_num_rows($result) > 0){
                echo '<thead class="thead-dark">
                  <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                  </tr>
                  </thread>';
                  while($row=mysqli_fetch_assoc($result)){
                  echo '<tbody>
                    <tr>
                      <td>'.$row['employee_id'].'</td>
                      <td>'.$row['firstname'].'</td>
                      <td>'.$row['lastname'].'</td>
                      <td>'.$row['email'].'</td>
                      <td>'.$row['phonenumber'].'</td>
                      <td>'.$row['address'].'</td>

                    </tr>
                  </tbody>';
                }
              }
              else{
                echo '<h2 class="text-danger">Employee not found</h2>';
              }
            }

          }


        ?>
      </table>
      <button class="btn btn-dark float-left"><a href="display.php" class = "text-light">Back</a>
    </div>
  </div>
  </body>
</html>