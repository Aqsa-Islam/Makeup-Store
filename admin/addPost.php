<?php
// include the header file for the show the header 
include 'header.php';


if (isset($_POST['submit']))
{


    session_start();
    // get the data form the form 
    $title = $_POST['title'];
    $descripition = $_POST['descripition'];
    $catageroy = $_POST['catageroy'];
    $postImg = $_FILES['postImg']['name'];

    $postImg_tmp = $_FILES['postImg']['tmp_name'];
    $postDate = date("Y/m/d");
    $author = $_SESSION['userName'];
    move_uploaded_file($postImg_tmp, 'upload/' . $postImg);
    // build the query for the insert 

    $query = "INSERT INTO post(title,descripition,catageroy,postImg,postDate,author) values ('$title','$descripition','$catageroy','$postImg','$postDate','$author');";
    $query .= "UPDATE category set post = post+1 where categoryId = $catageroy";
    // run the query 

    $result = mysqli_multi_query($connection, $query) or die("query of insert of users is not properly working " . mysqli_error($connection));

    if ($result) {
        header("location:post.php");
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
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <?php
                        $query1 = "SELECT * from category";

                        $result1 = mysqli_query($connection, $query1)  or die("add post query is not working properly " . mysqli_errno($connection) . mysqli_error($connection));
                        ?>
                        <div class="inputStyle flex flex-col">
                            <label for="title">Title: </label>
                            <input type="text" name="title" id="title">
                        </div>
                        <div class="inputStyle flex flex-col">
                            <label for="descripition">Price: </label>
                            <input type="text" name="descripition" id="descripition">
                        </div>
                        <div class="inputStyle flex flex-col">
                            <label for="file">Upload Image: </label>
                            <input type="file" name="postImg" id="postImg">
                        </div>
                        <div class="inputStyle flex flex-col">
                            <label for="catageroy">Category: </label>
                            <select name="catageroy" id="catageroy">
                                <?php while ($rows = mysqli_fetch_assoc($result1)) 
                                { ?>
                                    <option value="<?php echo $rows['categoryId'] ?>"><?php echo $rows['categoryName']; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div>
                            <input type="submit" value="submit" name="submit" class="btn formBtn">
                        </div>

                    </form>
                </div>
                <div class="usersImg flex-1">
                    <img src="../admin/images/postitem.png"alt="">

                </div>
            </div>

        </div>
    </section>
</body>

</html>