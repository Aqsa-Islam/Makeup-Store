<?php

// include the database and the header file 
include 'header.php';

// we get the value of id we want to delete is this  
$postId = $_GET['postId'];
 $categoryId = $_GET['categoryId'];


 $query2 = "SELECT * FROM post Where postId = '$postId'";
 $result2 = mysqli_query($connection, $query2);
 $rows = mysqli_fetch_assoc($result2);
 
 // unlink use to delete something to folder 
 unlink('upload/'.$rows['postImg']);

$query1 = "DELETE from post where postId = $postId;";
$query1 .= "UPDATE category set post = post-1 where categoryId = '$categoryId'";


$result = mysqli_multi_query($connection,$query1) or die("query of delete is work properly " .mysqli_errno($connection) . mysqli_error($connection));
if($result)
    header('location: post.php');





?>