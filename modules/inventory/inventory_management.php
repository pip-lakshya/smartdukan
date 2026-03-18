<?php
include('config.php');
include("include/header.php");
include("include/navbar.php");
$user= $_SESSION['username'] ;
$in="_inventory";
$inven=$user.$in;
?>
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>
<link rel="stylesheet" href="assets/css/styles.css">
<div class="container mt-5">
    <button class="btn btn-danger text-white text-center ms-2 my-2 " type="button" data-bs-toggle="modal"
        data-bs-target="#myProductModal">Add Product</button>
    <!-- The Modal -->
   <!-- Add Product Modal -->
<div class="modal fade" id="myProductModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="inventory_backend.php" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Product Fields -->
                <input type="hidden" name="action" value="insert">
                <div class="mb-3">
                    <label class="form-label">Product ID</label>
                    <input type="text" name="product_id" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Product Type</label>
                    <input type="text" name="pro_type" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Brand</label>
                    <input type="text" name="brand" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Specification</label>
                    <input type="text" name="specification" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Add Product</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="inventory_backend.php" method="POST" class="modal-content">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="sr_no" id="edit_sr_no">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Product ID</label>
                    <input type="text" name="product_id" id="edit_product_id" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Product Type</label>
                    <input type="text" name="pro_type" id="edit_pro_type" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Brand</label>
                    <input type="text" name="brand" id="edit_brand" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" id="edit_price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" id="edit_quantity" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Specification</label>
                    <input type="text" name="specification" id="edit_specification" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-success" type="submit">Update Product</button>
            </div>
        </form>
    </div>
</div>

<!-- Inventory Table -->
<table class="table table-hover table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Sr.No.</th>
            <th>Product ID</th>
            <th>Type</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Specification</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM $inven ORDER BY sr_no ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?= $row['sr_no']?></td>
                <td><?= $row['product_id'] ?></td>
                <td><?= $row['pro_type'] ?></td>
                <td><?= $row['brand'] ?></td>
                <td><?= $row['price'] ?></td>
                <td><?= $row['quantity'] ?></td>
                <td><?= $row['specification'] ?></td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" 
                            data-sr_no="<?= $row['sr_no'] ?>" 
                            data-product_id="<?= $row['product_id'] ?>" 
                            data-pro_type="<?= $row['pro_type'] ?>" 
                            data-brand="<?= $row['brand'] ?>" 
                            data-price="<?= $row['price'] ?>" 
                            data-quantity="<?= $row['quantity'] ?>" 
                            data-specification="<?= $row['specification'] ?>" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editProductModal">
                        Edit
                    </button>
                    <form action="inventory_backend.php" method="POST" style="display:inline-block;">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="sr_no" value="<?= $row['sr_no'] ?>">
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<script>document.querySelectorAll('.edit-btn').forEach(button => { button.addEventListener('click', () => { document.getElementById('edit_sr_no').value = button.dataset.sr_no; 
    document.getElementById('edit_product_id').value = button.dataset.product_id; 
    document.getElementById('edit_pro_type').value = button.dataset.pro_type;
     document.getElementById('edit_brand').value = button.dataset.brand;
      document.getElementById('edit_price').value = button.dataset.price; 
      document.getElementById('edit_quantity').value = button.dataset.quantity;
       document.getElementById('edit_specification').value = button.dataset.specification; 
       }); }); 
       </script>
<?php include 'include/footer.php'; ?>