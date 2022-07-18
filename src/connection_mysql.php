<?php

define('DB_SERVER', 'mysql');
define('DB_USERNAME', getenv("MYSQL_USER"));
define('DB_PASSWORD', getenv("MYSQL_PASSWORD"));
define('DB_NAME', getenv("MYSQL_DATABASE"));

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>