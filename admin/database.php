<?php

// define a variable for create a connection

define('host', '');
define('password', '');
define('user', 'root');
define('database', 'dbWebProject');


$connection = mysqli_connect(host,user,password,database) or die("NOT_CONNECTED" . mysqli_connect_error());


?>