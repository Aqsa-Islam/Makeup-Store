<?php




// get the data form the form 
$userRole = $_POST['userRole'];
$userName = $_POST['userName'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];

$usersId = $_GET['usersId']; // this is use for run the updata query 

// build the query for the insert 

$query = "UPDATE users set firsName = '$firstName' , lastName = '$lastName' ,  userRole ='$userRole' ,userName = 
'$userName'  where usersId = '$usersId'";

// run the query 

$result = mysqli_query($connection, $query) or die("query of insert of users is not properly working " . mysqli_errno($connection));

if ($result) {
    header("location:users.php");
}
