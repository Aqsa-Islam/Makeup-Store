<?php
// include the header file for the show the header 
include 'header.php';


// this portion use for the show the data of id that we get 

// get the id from the url that is means we use the gloable variable $_get  





if (isset($_POST['submit'])) 
{


    // this check is use for use upload the new img or not



    // $postImg = $_FILES['postImg']['name'];
    // $postImg_tmp = $_FILES['postImg']['tmp_name'];
    // move_uploaded_file($postImg_tmp, '../admin/uoload/' . $postImg);




    // get the data form the form 
    session_start();
    // get the data form the form 
    $postId = $_POST['postId'];
    $title = $_POST['title'];
    $descripition = $_POST['descripition'];
    $catageroy = $_POST['catageroy'];
    $postDate = date("Y/m/d");
    $author = $_SESSION['userName'];




    echo $query = "UPDATE post set title = '$title' , descripition = '$descripition' ,  catageroy ='$catageroy' ,postDate = 
    '$postDate' ,author ='$author'  where postId = '$postId'";

    // run the query 

    $result = mysqli_query($connection, $query) or die("query of insert of users is not properly working " . mysqli_errno($connection) . mysqli_error($connection));

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
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <?php





                        $postId = $_GET['postId'];


                        $query1 = "SELECT * FROM post
                        join category
                        on post.catageroy = category.categoryId
                        where postId = $postId
                        ";
                        $result1 = mysqli_query($connection, $query1) or die("query is not properly working of fetch data from the users table " . mysqli_errno($connection));







                        while ($rows = mysqli_fetch_assoc($result1)) { ?>
                            <div class="inputStyle flex flex-col">
                                <label for="postId" hidden></label>
                                <input type="text" name="postId" id="postId" value="<?php echo $rows['postId'] ?>" hidden>
                            </div>
                            <div class="inputStyle flex flex-col">
                                <label for="title">title</label>
                                <input type="text" name="title" id="title" value="<?php echo $rows['title'] ?>">
                            </div>
                            <div class="inputStyle flex flex-col">
                                <label for="descripition">descripition</label>
                                <input type="text" name="descripition" id="descripition" value="<?php echo $rows['descripition'] ?>">
                            </div>
                            <div class="inputStyle flex flex-col">
                                <label for="catageroy">catageroy</label>
                                <select name="catageroy" id="catageroy">
                                    <?php
                                    $query3 = "SELECT * FROM category";
                                    $result3 = mysqli_query($connection, $query3);
                                    while ($rows3 = mysqli_fetch_assoc($result3)) {
                                    ?>
                                        <?php if ($rows['catageroy'] == $rows3['categoryId']) { ?>
                                            <option value="<?php echo $rows3['categoryId']; ?>" selected><?php echo $rows3['categoryName']; ?></option>
                                            <!-- <option value="0">Normal</option> -->
                                        <?php } else { ?>
                                            <option value="<?php echo $rows3['categoryId']; ?>"><?php echo $rows3['categoryName']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="inputStyle flex flex-col">
                            
                            <input type="hidden" name="postImg" value="<?php $rows['postImg']; ?>">
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