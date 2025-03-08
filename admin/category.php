<?php
include 'header.php';




// build a query fro fetch all the data from the users
$query = "SELECT * FROM category";
$result = mysqli_query($connection, $query) or die("query is not properly working of fetch data from the users table " . mysqli_errno($connection));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAKEUP ONLINE STORE</title>
    <!-- this is the link of index page css -->
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
                    <h2>Added Categories List</h2>
                    <button class="btn btn-primary"><a href="addCategory.php">Add Category</a></button>
                </div>
                <div class="detialsContent">
                    <table class="table">
                        <thead>
                            <tr>
                                <th data-lable="S NO. ">S NO. </th>
                                <th data-lable="CATEGORY NAME">CATEGORY NAME</th>
                                <th data-lable="USER NAME">NO. OF POSTS</th>
                                <th data-lable="jawad">EDIT</th>
                                <th data-lable="ilyas">DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // put condition if we found the records then it will show the data

                            if (mysqli_num_rows($result) > 0) {

                                while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td data-lable="S NO. "><?php echo $rows['categoryId'] ?></td>
                                        <td data-lable="CATEGORY NAME"><?php echo $rows['categoryName']; ?></td>
                                        <td data-lable="post"><?php echo $rows['post'] ?></td>
                                        <td data-lable="EDIT" ><a href="updateCategory.php?categoryId=<?php echo $rows['categoryId']?>">EDIT</a> </td>
                                        <td data-lable="DELETE"><a href="deleteCategory.php?categoryId=<?php echo $rows['categoryId']?>">DELETE</a> </a></td>
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