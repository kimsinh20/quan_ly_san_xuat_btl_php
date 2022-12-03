<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','quanlysanxuat');
define('DB_PORT', '3307');
$con=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME,DB_PORT);
if($con) {
    //echo"connect susscesfull";
}
else {
    die('Cannot connect to the localhost');
}


?>