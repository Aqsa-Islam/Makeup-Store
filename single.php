<?php

include 'header.php';

$postId = $_GET['postId'];

$query = "SELECT * FROM post 
left join category
on post.catageroy = category.categoryId

where postId = '$postId'";
$result = mysqli_query($connection, $query) or die("query of show data on single page is not working properly " . mysqli_errno($connection) . mysqli_error($connection));



$rows = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- this is the link of index page css -->
    <link rel="stylesheet" href="./styleInterface/utility.css">
    <link rel="stylesheet" href="./styleInterface/single.css">
    <link rel="stylesheet" href="./styleInterface/interface.css">
    <link rel="stylesheet" href="./styleInterface/search.css">
    <link rel="stylesheet" href="./styleInterface/recentPost.css">
</head>

<body>
    <section class="singlePost">
        <div class="container">
            <div class="singlePostWrapper">
                <div class="singlePost">
                    <div class="singlePostBox">
                        <div class="singlePostImg">
                            <img src="./admin/upload/<?php echo $rows['postImg']; ?>" alt="">
                        </div>
                        <div class="singlePageContent">
                            <h1><?php echo $rows['title']; ?></h1>
                            <div class="singlePageContentInfo">
                                <li><a href="category.php?categoryId=<?php echo $rows['categoryId'];?>"><?php echo $rows['categoryName']; ?></a></li>
                                <li><a href="author.php?authorName=<?php echo $rows['author']; ?>"><?php echo $rows['author']; ?></a><?php echo $rows['author']; ?></a></li>
                                <li><a href="#"><?php echo $rows['postDate']; ?></a></li>
                            </div>
                            <p><?php echo $rows['descripition'] ?></p>
                        </div>
                    </div>

                </div>
                <div>
                    <?php
                    include 'sideBar.php';
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include 'footer.php' ;?>
</html>