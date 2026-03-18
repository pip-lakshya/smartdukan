<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['user']);
    $password = trim($_POST['pass']);

    if (empty($username) || empty($password)) {
        die("Username and Password required");
    }

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $stmt = $conn->prepare("SELECT * FROM userdata WHERE username = ? AND password = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = time();
        setcookie("user_logged_in", "true", time() + 120*60, "/");
        header("Location: inner_home.php");
        exit;
    } else {
        echo "Invalid login credentials!";
    }
}
?>
