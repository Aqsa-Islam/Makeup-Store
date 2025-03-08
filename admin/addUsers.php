<?php
// include the header file for the show the header 
include 'header.php';


if (isset($_POST['submit'])) {



    // get the data form the form 
    $userRole = $_POST['userRole'];
    $password = md5($_POST['password']);
    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];


    // build the query for the insert 

    $query = "INSERT INTO users(firstName,lastName,userName,password,userRole) values ('$firstName','$lastName','$userName','$password','$userRole')";

    // run the query 

    $result = mysqli_query($connection, $query) or die("query of insert of users is not properly working " . mysqli_errno($connection));

    if ($result) {
        header("location:users.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user form</title>
    <link rel="stylesheet" href="../admin/style/utility.css">
    <link rel="stylesheet" href="../admin/style/addUser.css">
    <link rel="stylesheet" href="../admin/style/form.css">
</head>

<body>
    <section class="addUsers">
        <div class="container">
            <div class="addUsersWrapper  ">

                <div class="userForms flex-1">
                    <img src="../admin/images/download (1).png" alt="">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="inputStyle flex flex-col">
                            <label for="firstName">firstName</label>
                            <input type="text" name="firstName" id="firstName">
                        </div>
                        <div class="inputStyle flex flex-col">
                            <label for="lastName">lastName</label>
                            <input type="text" name="lastName" id="lastName">
                        </div>
                        <div class="inputStyle flex flex-col">
                            <label for="userName">userName</label>
                            <input type="text" name="userName" id="userName">
                        </div>
                        <div class="inputStyle flex flex-col">
                            <label for="password">password</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div class="inputStyle flex flex-col">
                            <label for="userRole">userRole</label>
                            <select name="userRole" id="userRole">
                                <option value="1">Admin</option>
                                <option value="0">Customer</option>
                            </select>
                        </div>
                        <div>
                            <input type="submit" value="submit" name="submit" class="btn formBtn">
                        </div>
                    </form>
                </div>
                <div class="usersImg flex-1">
                    <img src="../admin/images/profile.png" alt="">

                </div>
            </div>

        </div>
    </section>
</body>

</html>