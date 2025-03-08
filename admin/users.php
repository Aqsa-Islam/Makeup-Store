<?php
include 'header.php';

// build a query to fetch all the data from the users
$query = "SELECT * FROM users";
$result = mysqli_query($connection, $query) or die("query is not properly working of fetch data from the users table " . mysqli_errno($connection));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Website Admin Panel </title>
    <!-- this is the link of index page css -->
    <link rel="stylesheet" href="../admin/style/utility.css">
    <link rel="stylesheet" href="../admin/style/indexStyle.css">
    <link rel="stylesheet" href="../admin/style/form.css">
    <link rel="stylesheet" href="../admin/style/table.css">
    <link rel="stylesheet" href="../admin/style/users.css">
</head>

<body>
    <!-- this section for the show the detials of all the user  -->
    <section class="detials">
        <div class="container">
            <div class="detialsWrapper">
                <div class="detialsInfo flex justify-between">
                    <h2>Registered Customer List</h2>
                    <button class="btn btn-primary"><a href="addUsers.php">ADD USER</a></button>
                </div>
                <div class="detialsContent">
                    <table class="table">
                        <thead>
                            <tr>
                                <th data-lable="S NO. ">ID NO. </th>
                                <th data-lable="FULL NAME">NAME</th>
                                <th data-lable="USER NAME">USER-NAME</th>
                                <th data-lable="ROLE">STATUS</th>
                                <th data-lable="EDIT">EDIT</th>
                                <th data-lable="DELETE">DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // put condition if we found the records then it will show the data

                            if (mysqli_num_rows($result) > 0) {

                                while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td data-lable="S NO. "><?php echo $rows['usersId'] ?></td>
                                        <td data-lable="FULL NAME"><?php echo $rows['firstName'] . '  ' . $rows['lastName'] ?></td>
                                        <td data-lable="USER NAME"><?php echo $rows['userName'] ?></td>
                                        <td data-lable="ROLE"><?php
                                                                if ($rows['userRole'] == 1) {
                                                                ?>
                                                Admin
                                            <?php } else { ?>
                                                Normal
                                            <?php } ?></td>
                                        <td data-lable="EDIT"><a href="updataUsers.php?usersId=<?php echo $rows['usersId'] ?>">EDIT</a> </td>
                                        <td data-lable="DELETE"><a href="deleteUsers.php?usersId=<?php echo $rows['usersId'] ?>">DELETE</a> </a></td>
                                    </tr>
                            <?php
                                } // this ending bracket of the while loop
                            } // this ending bracket of the if conditions



                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
</body>

</html>