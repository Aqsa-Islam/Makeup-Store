<?php

// include the database of all the pages through this header file becuase this is add to all pages

include 'database.php';



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAKEUP ONLINE STORE</title>
    <!-- this is the link of index page css -->
    <link rel="stylesheet" href="./styleInterface/utility.css">
    <link rel="stylesheet" href="./styleInterface/interface.css">

</head>

<body>
    <nav class="interFace">
        <div class="container">
            <div class="interFaceWrapper flex align-center justify-center">
                <div class="interFaceLogo">
                    <h1>MAKEUP ONLINE STORE</h1>
                </div>
            </div>
        </div>
    </nav>
    <!-- this section for the menu  -->
    <header class="menu">
        <div class="container">
            <div class="menuWrapper text-center">
                <div class="menuItems">
                    <a href="index.php">HOME PAGE</a>
                    <?php

                    $query = "SELECT * FROM category where post > 0";
                    $result =  mysqli_query($connection, $query) or die("query of show categoru is not working  properly ");


                    while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                        <a href="category.php?categoryId=<?php echo $rows['categoryId']?>"><?php echo $rows['categoryName']; ?></a>
                        <!-- <a href="category.php">Post</a> -->
                        <!-- <a href="category.php">Post</a> -->
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>
</body>

</html>