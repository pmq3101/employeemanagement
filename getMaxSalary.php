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
    <form method="post">
      <input type="number" placeholder="insert a number" name = "submit">
      <button class="btn btn-dark btn-sm">Submit</button>
    </form>
    <div class="container my-5">
      <table class="table">
        <?php
          if(isset($_POST['submit'])){
            $search=$_POST['submit'];
            $count="select * from `salary`";
            $result1=mysqli_query($con,$count);
            $row=mysqli_num_rows($result1);
            if($search > $row){
              echo '<h2 class="text-sm-left">Quantity exceeded</h2>';
            }
            else{

            $sql="select * from  `salary` order by fixedsalary desc limit $search";

            $result=mysqli_query($con,$sql);
            if($result){
              
                echo '<thead class="thead-dark">
                  <tr>
                    <th>ID</th>
                    <th>Fixed Salary</th>
                    <th>Bonus Salary</th>
                  </tr>
                  </thread>';
                  while($row=mysqli_fetch_assoc($result)){
                  echo '<tbody>
                    <tr>
                      <td>'.$row['employee_id'].'</td>
                      <td>'.$row['fixedsalary'].'</td>
                      <td>'.$row['bonussalary'].'</td>
              

                    </tr>
                  </tbody>';
                }
            
            }
          }

          }


        ?>
      </table>
      <button class="btn btn-dark float-left"><a href="salary.php" class = "text-light">Back</a>
    </div>
  </div>
  </body>
</html>