<?php

// include the database and the header file 
include 'header.php';

// we get the value of id we want to delete is this  
$usersGetId = $_GET['usersId'];


$query1 = "DELETE from users where usersId = $usersGetId";


$result = mysqli_query($connection,$query1) or die("query of delete is work properly " .mysqli_errno($connection) . mysqli_error($connection));
if($result)
    header('location: users.php');





?>