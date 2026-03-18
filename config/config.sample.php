<?php
$dbname = 'your_database_name';
$host = 'localhost';
$user = 'your_username';
$password = 'your_password';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>