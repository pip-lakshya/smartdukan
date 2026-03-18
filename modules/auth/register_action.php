<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nm = $_POST['nm'];
    $sname = $_POST['sname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $referral = $_POST['referral'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $valid_referral = "SMART100";


    // Check duplicates
    $stmt1 = $conn->prepare("SELECT phone FROM userdata WHERE phone = ?");
    $stmt1->bind_param("s", $phone);
    $stmt1->execute();
    $stmt1->store_result();
    if ($stmt1->num_rows > 0) {
        echo "<script>alert('This phone number is already registered.'); window.location.href='join.php';</script>";
        exit;
    }

    $stmt2 = $conn->prepare("SELECT username FROM userdata WHERE username = ?");
    $stmt2->bind_param("s", $username);
    $stmt2->execute();
    $stmt2->store_result();
    if ($stmt2->num_rows > 0) {
        echo "<script>alert('Username already exists.'); window.location.href='join.php';</script>";
        exit;
    }

    // Insert into master table
    $stmt = $conn->prepare("INSERT INTO userdata (nm, sname, email, phone, username, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nm, $sname, $email, $phone, $username, $password);
    if (!$stmt->execute()) {
        echo "<script>alert('Something went wrong.'); window.location.href='join.php';</script>";
        exit;
    }

    // Create user-specific tables
    $user = $conn->real_escape_string($username);
    $conn->query("CREATE TABLE IF NOT EXISTS `{$user}_inventory` LIKE template_inventory");
    $conn->query("CREATE TABLE IF NOT EXISTS `{$user}_sales` LIKE template_sales");

    // Redirect based on referral
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['nm'] = $nm;

    if ($referral !== $valid_referral) {
        echo "<script>alert('Thank you! We will contact you soon.');
        window.location.href='join.php';</script>";
    } else {
        header("Location: inner_home.php");
    }
    exit;
}
?>
