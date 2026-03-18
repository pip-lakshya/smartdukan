<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['username'])) {
    session_unset();
    session_destroy();
}

header("Location: index.php");
exit;
?>
