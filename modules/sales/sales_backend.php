<?php
session_start();
include("config.php");

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$user = $_SESSION['username'];
$sales_table = $user . "_sales";
$inventory_table = $user . "_inventory";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'insert') {
        $product_id = $_POST['product_id'];
        $quantity_sold = intval($_POST['quantity_sold']);
        $price_per_item = floatval($_POST['price']);
        $customer_name = $_POST['customer_name'] ?? null;
        $payment_method = $_POST['payment_method'] ?? 'Cash';

        $total_amount = $quantity_sold * $price_per_item;

        // Check if product exists and quantity is sufficient
        $check_sql = "SELECT quantity FROM $inventory_table WHERE product_id = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $product_id);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows === 0) {
            echo "<script>alert('Product not found in inventory.'); window.location.href='sales.php';</script>";
            exit;
        }

        $row = $result->fetch_assoc();
        $available_quantity = intval($row['quantity']);

        if ($quantity_sold > $available_quantity) {
            echo "<script>alert('Not enough stock available.'); window.location.href='sales.php';</script>";
            exit;
        }

        // Insert into sales table
        $insert_sql = "INSERT INTO $sales_table (product_id, quantity_sold, total_amount, customer_name, payment_method) VALUES (?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sidss", $product_id, $quantity_sold, $total_amount, $customer_name, $payment_method);
        $insert_stmt->execute();

        // Update inventory quantity
        $update_sql = "UPDATE $inventory_table SET quantity = quantity - ? WHERE product_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("is", $quantity_sold, $product_id);
        $update_stmt->execute();

        header("Location: sales.php");
        exit;
    }
}
?>
