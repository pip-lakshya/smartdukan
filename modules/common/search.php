<?php
session_start();
include("config.php");
include("include/header.php");
include("include/navbar.php");

$user = $_SESSION['username'];
$sales_table = $user . "_sales";
$inventory_table = $user . "_inventory";
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="assets/css/styles.css">

<div class="container mt-5">
    <div class="breadcrumb justify-content-center">
    <h2 class="text-center mb-4 mt-3">Search Inventory & Sales</h2>
</div></div>
<div class="container mt-5">
    <!-- Search Form -->
    <form method="GET" class="mb-4">
        <input type="text" name="query" class="form-control" placeholder="Search any product, customer, payment method, etc..." value="<?= isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '' ?>" required>
    </form>

    <?php
    if (isset($_GET['query'])) {
        $search = "%" . $conn->real_escape_string($_GET['query']) . "%";

        // Search in Sales Table
        $sql_sales = "SELECT * FROM $sales_table 
            WHERE product_id LIKE ? OR 
                  customer_name LIKE ? OR 
                  payment_method LIKE ? OR 
                  sale_date LIKE ? OR 
                  total_amount LIKE ? OR 
                  quantity_sold LIKE ?";
        $stmt_sales = $conn->prepare($sql_sales);
        $stmt_sales->bind_param("ssssss", $search, $search, $search, $search, $search, $search);
        $stmt_sales->execute();
        $res_sales = $stmt_sales->get_result();

        // Search in Inventory Table
        $sql_inventory = "SELECT * FROM $inventory_table 
            WHERE product_id LIKE ? OR 
                  pro_type LIKE ? OR 
                  brand LIKE ? OR 
                  price LIKE ? OR 
                  quantity LIKE ? OR 
                  specification LIKE ?";
        $stmt_inv = $conn->prepare($sql_inventory);
        $stmt_inv->bind_param("ssssss", $search, $search, $search, $search, $search, $search);
        $stmt_inv->execute();
        $res_inv = $stmt_inv->get_result();
    ?>

    <!-- Sales Matches -->
    <h4 class="mt-4">Sales Matches</h4>
    <div class="table-responsive mb-5">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Sr.No</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Customer Name</th>
                    <th>Payment Method</th>
                    <th>Sale Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($res_sales->num_rows > 0) {
                    while ($row = $res_sales->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['sr_no']}</td>
                            <td>{$row['product_id']}</td>
                            <td>{$row['quantity_sold']}</td>
                            <td>{$row['total_amount']}</td>
                            <td>{$row['customer_name']}</td>
                            <td>{$row['payment_method']}</td>
                            <td>{$row['sale_date']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center text-muted'>No matching sales found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Inventory Matches -->
    <h4 class="mt-4">Inventory Matches</h4>
    <div class="table-responsive mb-5">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Sr.No</th>
                    <th>Product ID</th>
                    <th>Product Type</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Specification</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($res_inv->num_rows > 0) {
                    while ($row = $res_inv->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['sr_no']}</td>
                            <td>{$row['product_id']}</td>
                            <td>{$row['pro_type']}</td>
                            <td>{$row['brand']}</td>
                            <td>{$row['price']}</td>
                            <td>{$row['quantity']}</td>
                            <td>{$row['specification']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center text-muted'>No matching inventory found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php } else { ?>
        <p class="text-center text-muted">Type something to begin searching.</p>
    <?php } ?>
</div>

<?php include("include/footer.php"); ?>
