<?php

// include the database of all the pages through this header file becuase this is add to all pages

// include 'database.php';



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup Online Store</title>
    <!-- this is the link of index page css -->
    <link rel="stylesheet" href="./styleInterface/utility.css">
    <link rel="stylesheet" href="./styleInterface/interface.css">
    <link rel="stylesheet" href="./styleInterface/footer.css">
    <style>

    </style>
</head>

<body>

    <!-- this section for the footer  -->
    <header class="footer">
        <div class="container">
            <div class="footerWrapper text-center">
                
                <div class="footerItems">
                    <a href="index.php">Home</a>
                    <?php

                    $query = "SELECT * FROM category where post > 0";
                    $result =  mysqli_query($connection, $query) or die("query of show categoru is not working  properly ");


                    while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                        <a href="category.php?categoryId=<?php echo $rows['categoryId'] ?>"><?php echo $rows['categoryName']; ?></a>
                        <!-- <a href="category.php">Post</a> -->
                        <!-- <a href="category.php">Post</a> -->
                    <?php } ?>
                </div>
                <div class="copyRightTextFooter">
                    <a href="index.php">Aqsa Islam</a><br>
                    <a href="index.php">...Thankyou For Choosing us...</a>
                </div>
            </div>
        </div>
    </header>
</body>

</html>