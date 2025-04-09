<?php

$host = "mysql-cont"; // This should match the Docker service name
$username = "mysqluser";
$password = "mysqlpw123";
$database = "crud_example";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
