<?php
session_start();
include("config.php");
include("include/header.php");
include("include/navbar.php");

$user = $_SESSION['username'];
$sales_table = $user . "_sales";

// Handle search input
$search = $_GET['search'] ?? '';
$search = trim($search);

// Construct SQL query
$sql = "SELECT * FROM $sales_table WHERE payment_method = 'Khata'";
if ($search !== '') {
    $search_safe = mysqli_real_escape_string($conn, $search);
    $sql .= " AND (customer_name LIKE '%$search_safe%' OR sale_date LIKE '%$search_safe%')";
}
$sql .= " ORDER BY sale_date DESC";
$result = mysqli_query($conn, $sql);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="assets/css/styles.css">

<div class="container mt-5">
    <div class="breadcrumb justify-content-center">
    <h2 class="text-center mb-4 mt-3">Khata Book (Credit Transactions)</h2>
</div></div>
<div class="container mt-5">
    <!-- Search Bar -->
    <form method="GET" class="row mb-4">
        <div class="col-md-10">
            <input type="text" name="search" class="form-control" placeholder="Search by Customer Name or Date (YYYY-MM-DD)" value="<?= htmlspecialchars($search) ?>">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100" type="submit">Search</button>
        </div>
    </form>

    <!-- Khata Transactions Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>Sr.No</th>
                    <th>Product ID</th>
                    <th>Customer Name</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Sale Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sr = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$sr}</td>
                        <td>{$row['product_id']}</td>
                        <td>{$row['customer_name']}</td>
                        <td>{$row['quantity_sold']}</td>
                        <td>₹{$row['total_amount']}</td>
                        <td>{$row['sale_date']}</td>
                    </tr>";
                    $sr++;
                }

                if ($sr === 1) {
                    echo "<tr><td colspan='6'>No Khata transactions found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("include/footer.php"); ?>
