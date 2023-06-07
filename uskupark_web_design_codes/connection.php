<?php

$db_server="31.223.68.41:3306";
$db_username="user";
$db_password="fatih123";
$db_name="arduino_db";

$connect=mysqli_connect($db_server, $db_username, $db_password, $db_name);

if(!$connect)
{
    die("Database connection failed.".mysqli_connect_error());
}

?>