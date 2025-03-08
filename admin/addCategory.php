<?php
// include the header file for the show the header 
include 'header.php';


if (isset($_POST['submit']))
 {



    // get the data form the form 
    $categoryName = $_POST['categoryName'];



    // build the query for the insert 

    $query = "INSERT INTO category(categoryName) values ('$categoryName')";

    // run the query 

    $result = mysqli_query($connection, $query) or die("Query of insert category not working..." . mysqli_errno($connection));

    if ($result)
    {
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
                        <div class="inputStyle flex flex-col">
                            <label for="categoryName">Category Name</label>
                            <input type="text" name="categoryName" id="categoryName">
                        </div>

                        <div>
                            <input type="submit" value="submit" name="submit" class="btn formBtn">
                        </div>
                    </form>
                </div>
                <div class="usersImg flex-1">
                    <img src="../admin/images/addcategory.png" alt="">

                </div>
            </div>

        </div>
    </section>
</body>

</html>