<?php

// include the database of all the pages through this header file becuase this is add to all pages

include 'database.php';
session_start();
if (!isset($_SESSION['usersId']))
{
    header("location:index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAKEUP ONLINE STORE</title>
    <!-- this is the link of index page css -->
    <link rel="stylesheet" href="../admin/style/utility.css">
    <link rel="stylesheet" href="../admin/style/indexStyle.css">
</head>

<!-- INSERT PIC OF LOGO HERE ADJUST IT HERE-->
<body>
    <nav class="topBar">
        <div class="container">
            <div class="topBarWrapper flex justify-between  align-center">
                <div class="topBarlogo">
                   <H1>
                </div>
                <div class="topBarLink">
                    <a href="../admin/logout.php">LOGOUT</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- this section for the menu  -->
    <header class="menu">
        <div class="container">
            <div class="menuWrapper text-center">
                <div class="menuItems">
                    <a href="post.php">Upload</a>
                    <a href="category.php">Category</a>
                    <a href="users.php">Customers</a>


                    
                </div>
            </div>
        </div>
    </header>
</body>

</html>