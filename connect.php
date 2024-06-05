<?php

$con = new mysqli('localhost', 'root', 'Phamminhquang311@@', 'employeemanagement');

if(!$con){
	die(mysqli_error($con));
}
?>