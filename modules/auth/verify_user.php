<?php
include('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $query = "SELECT * FROM userdata WHERE username='$username' AND phone='$phone' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['reset_username'] = $username;
        header("Location: reset_password.php");
        exit;
    } else {
        echo "<script>alert('Invalid username or phone number'); window.location.href='index.php';</script>";
        exit;
    }
}
?>
