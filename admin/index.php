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

    <!-- this css for the form  -->
    <link rel="stylesheet" href="../admin/style/form.css">
</head>

<body>
    <section class="indexForm">
        <div class="container">
            <div class="indexFormWrapper">
                <div>
                    <h1>MAKEUP ONLINE STORE</h1>
                </div>
                <div class="indexFormForm">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="inputStyle flex flex-col">
                            <label for="userName">Name</label>
                            <input type="text" name="userName" id="userName">
                        </div>

                        <div class="inputStyle flex flex-col">
                            <label for="password">password</label>
                            <input type="password" name="password" id="password">
                        </div>

                        <div>
                            <input type="submit" value="logIn" name="logIn" class="btn formBtnIndex">
                        </div>
                    </form>
                </div>
            </div>
            <?php

            include 'database.php';
/*Login */ 
            if (isset($_POST['logIn']))
             {
                $userName = $_POST['userName'];
                $password = md5($_POST['password']);

                $query = "SELECT * FROM users where userName = '$userName' AND password = '$password'";
                $result = mysqli_query($connection, $query) or die("query is fail of sessions");
                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_assoc($result))
                    {
                        session_start();
                        $_SESSION['usersId'] = $rows['usersId'];
                        $_SESSION['userName'] = $rows['userName'];
                        $_SESSION['userRole'] = $rows['userRole'];

                        header('location:users.php');
                    }
                }
                else
                {
                    echo " User Does not Exist!!!";
                }
            }
            

            ?>
            
        </div>
    </section>
</body>

</html>