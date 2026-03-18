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
<div class="breadcrumb">
<div class="container mt-5">
    <h5 class="text-center mb-4 ">Sales Management</h5>
</div>
</div>
    <div class="container mt-5">
    <!-- Sales Entry Form -->
    <form method="POST" action="sales_backend.php" class="row g-3">
        <input type="hidden" name="action" value="insert">

        <div class="col-md-4">
            <label class="form-label">Select Product</label>
            <select name="product_id" id="product_id" class="form-select" required>
                <option value="" disabled selected>Select Product</option>
                <?php
                $res = mysqli_query($conn, "SELECT product_id FROM $inventory_table");
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<option value='{$row['product_id']}'>{$row['product_id']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">Quantity Sold</label>
            <input type="number" name="quantity_sold" id="quantity_sold" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label class="form-label">Product Type</label>
            <input type="text" id="product_type" class="form-control" placeholder="Type" readonly>
        </div>

        <div class="col-md-4">
            <label class="form-label">Brand</label>
            <input type="text" id="brand" class="form-control" placeholder="Brand" readonly>
        </div>

        <div class="col-md-4">
            <label class="form-label">Price (per item)</label>
            <input type="number" step="0.01" id="price" name="price" class="form-control" readonly required>
        </div>

        <div class="col-md-4">
            <label class="form-label">Total Amount</label>
            <input type="number" id="total_amount" class="form-control" placeholder="Total Amount" readonly>
        </div>

        <div class="col-md-6">
            <label class="form-label">Customer Name</label>
            <input type="text" name="customer_name" class="form-control" placeholder="Optional">
        </div>

        <div class="col-md-6">
            <label class="form-label">Payment Method</label>
            <select class="form-select" name="payment_method" required>
                <option value="" disabled selected>Select Payment Method</option>
                <option value="Cash">Cash</option>
                <option value="UPI">UPI</option>
                <option value="Card">Card</option>
                <option value="Khata">Khata</option>
            </select>
        </div>

        <div class="col-12">
            <button class="btn btn-danger w-100" type="submit">Record Sale</button>
        </div>
    </form>

    <!-- View History Button -->
    <div class="mt-4 mb-5">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#historyModal">View Sale History</button>
    </div>

    <!-- Sale History Modal -->
    <div class="modal fade" id="historyModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sales History</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Sr.No</th>
                                <th>Product ID</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Customer</th>
                                <th>Payment</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_sales = 0;
                            $res = mysqli_query($conn, "SELECT * FROM $sales_table ORDER BY sale_date DESC");
                            while ($row = mysqli_fetch_assoc($res)) {
                                $total_sales += $row['total_amount'];
                                echo "<tr>
                                    <td>{$row['sr_no']}</td>
                                    <td>{$row['product_id']}</td>
                                    <td>{$row['quantity_sold']}</td>
                                    <td>₹{$row['total_amount']}</td>
                                    <td>{$row['customer_name']}</td>
                                    <td>{$row['payment_method']}</td>
                                    <td>{$row['sale_date']}</td>
                                  </tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot class="table-secondary fw-bold">
                            <tr>
                                <td colspan="3">TOTAL</td>
                                <td colspan="4">₹<?= number_format($total_sales, 2) ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('product_id').addEventListener('change', function () {
    const productId = this.value;
    if (productId) {
        fetch('getproduct_details.php?product_id=' + productId)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('product_type').value = data.pro_type;
                    document.getElementById('brand').value = data.brand;
                    document.getElementById('price').value = data.price;
                } else {
                    alert('Product not found');
                }
            });
    }
});

document.getElementById('quantity_sold').addEventListener('input', function () {
    const qty = parseFloat(this.value);
    const price = parseFloat(document.getElementById('price').value);
    const total = (!isNaN(qty) && !isNaN(price)) ? (qty * price).toFixed(2) : '';
    document.getElementById('total_amount').value = total;
});
</script>
<?php include("include/footer.php"); ?>
