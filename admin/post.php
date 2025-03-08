<?php
include 'header.php';




// build a query fro fetch all the data from the users
$query = "SELECT * FROM post
join category
on post.catageroy = category.categoryId
";
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
                    <h2>List Of Added Posts</h2>
                    <button class="btn btn-primary"><a href="addPost.php">ADD POST</a></button>
                </div>
                <div class="detialsContent">
                    <table class="table">
                        <thead>
                            <tr>
                                <th data-lable="ID NO.">S NO. </th>
                                <th data-lable="ITEMS">TTILE</th>
                                <th data-lable="CATEGORY">CATEGORY</th>
                                <th data-lable="BRAND">BRAND</th>
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
                                        <td data-lable="ID NO."><?php echo $rows['postId'] ?></td>
                                        <td data-lable="ITEMS"><?php echo $rows['title']; ?></td>
                                        <td data-lable="CATEGORY"><?php echo $rows['categoryName'] ?></td>
                                        <td data-lable="BRAND"><?php echo $rows['author'] ?></td>
                                        <td data-lable="EDIT"><a href="updatePost.php?postId=<?php echo $rows['postId'] ?>">EDIT</a> </td>
                                        <td data-lable="DELETE"><a href="deletePost.php?postId=<?php echo $rows['postId'] ?>&categoryId=<?php echo $rows['catageroy']?>">DELETE</a> </a></td>
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