<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SideBar</title>
    <link rel="stylesheet" href="./styleInterface/form.css">
    <link rel="stylesheet" href="./styleInterface/search.css">
    <link rel="stylesheet" href="./styleInterface/recentPost.css">
</head>

<body>
    <div class="searchSection">
        <div class="container">
            <h2 class="searchHeading">SEARCH</h2>
            <form action="search.php" method="get">
                <div class="searchWrapper flex align-center flex-col">
                    <div>
                        <div class="searchInput">
                            <input type="search" name="search" id="">
                        </div>
                        <div class="searchBtn">
                            <input class="btn btn-primary btnSearchPost" type="submit" value="submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <section class="recentPost">
        <div class="container">
            <h2 class="recenthHeading">NEW ITEMS ADDED</h2>
            <div class="recentPostWrapper">
                <div class="recent">
                    <?php
                    // include 'database.php';
                    $query = "SELECT * FROM post order by postId desc limit 3";
                    $result = mysqli_query($connection, $query);


                    while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="recentBox">
                            <div class="recentImg">
                                <a href="single.php?postId=<?php echo $rows['postId']; ?>"> <img src="./admin/upload/<?php echo $rows['postImg']; ?>" alt="no image present "></a>

                            </div>
                            <div class="recentContent">
                                <h6> <a style="color:var(--primary)" href="single.php?postId=<?php echo $rows['postId']; ?>"> <?php echo $rows['title']; ?></a></h6>
                                <p><?php echo substr($rows['descripition'], 0, 100) . "...." ?></p>
                                <div class="recentBtn">
                                    <button class="btn btn-primary recentButton"><a href="single.php?postId=<?php echo $rows['postId']; ?>">View Item</a> </button>
                                </div>
                            </div>
                        </div>
                    <?php

                    }



                    ?>


                </div>
            </div>
        </div>
    </section>
</body>

</html>