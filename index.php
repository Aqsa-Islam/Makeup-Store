<?php

include 'header.php';


// Different Pages


$limit = 4;
if (isset($_GET['pageNo']))
{
    $pageNo = $_GET['pageNo'];
} else 
{
    $pageNo = 1;
}
$offSet = ($pageNo - 1) * $limit;






$query = "SELECT * FROM post 
left join category
on post.catageroy = category.categoryId
limit $offSet, $limit
";
$result = mysqli_query($connection, $query) or die("Not Working Properly..." . mysqli_errno($connection) . mysqli_error($connection));


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styleInterface/utility.css">
    <link rel="stylesheet" href="./styleInterface/interface.css">
    <title>Document</title>
</head>

<body>
    <section class="display">
        <div class="container">
            <div class="displayWrapper">

                <div class="post ">
                    <?php
                    while ($rows = mysqli_fetch_assoc($result))
                    {
                    ?>
                        <div class="postBox">
                            <div class="postImg">
                                <a href="single.php?postId=<?php echo $rows['postId']; ?>"> <img src="./admin/upload/<?php echo $rows['postImg']; ?>" alt="no image present "></a>
                            </div>
                            <div class="postContent">
                                <h2> <a href="single.php?postId=<?php echo $rows['postId']; ?>"> <?php echo $rows['title']; ?></a></h2>
                                <div class="postInnerInfo">
                                    <li><a href="category.php?categoryId=<?php echo $rows['categoryId']; ?>"><?php echo $rows['categoryName']; ?></a></li>
                                    <li><a href="author.php?authorName=<?php echo $rows['author']; ?>"><?php echo $rows['author']; ?></a></li>
                                    <li><a href="#"><?php echo $rows['postDate']; ?></a></li>
                                </div>
                                <p><?php echo substr($rows['descripition'], 0, 100) . "...." ?></p>
                                <div class="postBtn">

                                    <button class="btn btn-primary "><a href="single.php?postId=<?php echo $rows['postId']; ?>">View Item</a> </button>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="sideBar">
                    <?php include 'sideBar.php'; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="pagination">
        <div class="container">
            <?php

            $query2 = "SELECT * FROM post";
            $result2 = mysqli_query($connection, $query2) or die("The Query for pages is not working.... " . mysqli_error($connection) . mysqli_error($connection));

            $totalRecords = mysqli_num_rows($result2);
            $totalPages = ceil($totalRecords / $limit);




            ?>
            <ul class="paginationWrapper">
                <?php

                for ($i = 1; $i <= $totalPages; $i++)
                {




                ?>
                    <?php if ($pageNo == $i) { ?>
                        <li class="paginationLink active"><a href="index.php?pageNo=<?php echo $i ?>"><?php echo $i; ?></a> </li>
                    <?php  } else { ?>
                        <li class="paginationLink "><a href="index.php?pageNo=<?php echo $i ?>"><?php echo $i; ?></a> </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </section>
</body>
<?php include 'footer.php' ;?>
</html>