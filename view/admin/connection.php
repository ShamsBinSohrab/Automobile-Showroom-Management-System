<?php

    define('HOST','localhost');
    define('USERNAME','root');
    define('PASSWORD','root');
    define('DATABASE_NAME','royal_motors_db');

    $db = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE_NAME) or die(mysql_error());
?>