<?php
include("config.php");
session_start();

$user = $_SESSION['username'];
$inventory_table = $user . "_inventory";

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $stmt = $conn->prepare("SELECT pro_type, brand, price FROM $inventory_table WHERE product_id = ?");
    $stmt->bind_param("s", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        echo json_encode([
            'success' => true,
            'pro_type' => $row['pro_type'],
            'brand' => $row['brand'],
            'price' => $row['price']
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
