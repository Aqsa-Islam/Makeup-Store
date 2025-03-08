<?php
// include the header file for the show the header 
include 'header.php';


// this portion use for the show the data of id that we get 

// get the id from the url that is means we use the gloable variable $_get  





if (isset($_POST['submit'])) {


    // get the data form the form 
    $categoryName = $_POST['categoryName'];
    $categoryId = $_POST['categoryId'];
    $post = $_POST['post'];



    // build the query for the insert 

    $query = "UPDATE category set categoryName = '$categoryName' ,post = '$post' where  categoryId = '$categoryId' ";

    // run the query 

    $result = mysqli_query($connection, $query) or die("query of insert of category is not properly working " . mysqli_errno($connection));

    if ($result) {
        header("location:category.php");
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





                        $categoryId = $_GET['categoryId'];


                        $query1 = "SELECT * FROM category where categoryId = $categoryId";

                        $result1 = mysqli_query($connection, $query1)  or die("category updata show data query is not working properly " . mysqli_errno($connection) . mysqli_error($connection));






                        while ($rows = mysqli_fetch_assoc($result1)) { ?>
                            <div class="inputStyle flex flex-col">
                                <label for="categoryId" hidden></label>
                                <input type="text" name="categoryId" id="categoryId" value="<?php echo $rows['categoryId']; ?>" hidden>
                            </div>
                            <div class="inputStyle flex flex-col">
                                <label for="post" hidden></label>
                                <input type="text" name="post" id="post" value="<?php echo $rows['post']; ?>" hidden>
                            </div>
                            <div class="inputStyle flex flex-col">
                                <label for="firstName">categoryName</label>
                                <input type="text" name="categoryName" id="categoryName" value="<?php echo $rows['categoryName'] ?>">
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