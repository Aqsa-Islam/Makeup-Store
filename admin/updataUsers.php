<?php
// include the header file for the show the header 
include 'header.php';


// this portion use for the show the data of id that we get 

// get the id from the url that is means we use the gloable variable $_get  





if (isset($_POST['submit'])) {



    // get the data form the form 
    $userRole = $_POST['userRole'];
    $usersId = $_POST['usersId'];
    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];




    $query = "UPDATE users set firstName = '$firstName' , lastName = '$lastName' ,  userRole ='$userRole' ,userName = 
    '$userName'  where usersId = $usersId";

    // run the query 

    $result = mysqli_query($connection, $query) or die("query of insert of users is not properly working " . mysqli_errno($connection) . mysqli_error($connection));

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
                        <?php





                        $usersGetId = $_GET['usersId'];


                        $query1 = "SELECT * FROM users where usersId = $usersGetId";

                        $result1 = mysqli_query($connection, $query1)  or die("user updata show data query is not working properly " . mysqli_errno($connection) . mysqli_error($connection));






                        while ($rows = mysqli_fetch_assoc($result1)) { ?>
                            <div class="inputStyle flex flex-col">
                                <label for="firstName" hidden></label>
                                <input type="text" name="usersId" id="firstName" value="<?php echo $rows['usersId'] ?>" hidden>
                            </div>
                            <div class="inputStyle flex flex-col">
                                <label for="firstName">FIRST NAME</label>
                                <input type="text" name="firstName" id="firstName" value="<?php echo $rows['firstName'] ?>">
                            </div>
                            <div class="inputStyle flex flex-col">
                                <label for="lastName">LAST NAME</label>
                                <input type="text" name="lastName" id="lastName" value="<?php echo $rows['lastName'] ?>">
                            </div>
                            <div class="inputStyle flex flex-col">
                                <label for="userName">USERNAME</label>
                                <input type="text" name="userName" id="userName" value="<?php echo $rows['userName'] ?>">
                            </div>
                            <div class="inputStyle flex flex-col">
                                <label for="userRole">STATUS</label>
                                <select name="userRole" id="userRole">
                                    <?php if ($rows['userRole'] == 1) { ?>
                                        <option value="1" selected>Admin</option>
                                        <option value="0">Customer</option>
                                    <?php } else { ?>
                                        <option value="1">Admin</option>
                                        <option value="0" selected>Customer</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <input type="submit" value="submit" name="submit" class="btn formBtn">
                            </div>
                        <?php } ?>
                    </form>
                </div>
                <div class="usersImg flex-1">
                    <img src="../admin/images/images-removebg-preview.png" alt="">

                </div>
            </div>

        </div>
    </section>
</body>

</html>