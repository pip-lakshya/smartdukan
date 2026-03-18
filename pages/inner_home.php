<?php include 'include/header.php';
include 'include/navbar.php';
include 'config.php';
$user = $_SESSION['username'];
$in = "_inventory";
$inven = $user . $in;
?>
<link rel="stylesheet" href="assets\css\styles.css">
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php if (!isset($_SESSION['username'])) 
 include('login.php'); ?>
<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$session_expiry = 120 * 60; // 2 hours

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
} elseif (time() - $_SESSION['login_time'] > $session_expiry) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Our Services | SMART DUKAN</title>
    <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

    <!-- Page Header -->
     <div class="container breadcrumb">
    <div class="container services text-center my-5">
        <h2>Explore Our Services</h2>
        <p>Learn how Smart Dukan can help your business grow with our amazing services!</p>
    </div></div>

    <!-- Cards Section -->
    <div class="container mb-5">
        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-md-3 mb-4 justify-content-center">
                <a href="inventory_management.php" class="card card-custom text-decoration-none">
                    <div class="card-header">
                        <h5 class="card-title text-black text-center">Inventory Management</h5>
                    </div>
                    <div class="card-body text-center ">
                       <i class="fa-solid font fa-warehouse text-black"></i>
                    </div>
                    <div class="card-footer " data-bs-toggle="popover" data-bs-trigger="hover" title="Manage Your Inventory, Restocking Or Editing Products">
                        <span class="text-black">Learn More</span>
                    </div>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="col-md-3">
                <a href="sales.php" class="card card-custom text-decoration-none">
                    <div class="card-header ">
                        <h5 class="card-title text-black text-center">Sales Tracking</h5>
                    </div>
                    <div class="card-body text-center">
                        <i class="fas fa-cart-plus text-black font"></i>
                    </div>
                     <div class="card-footer " data-bs-toggle="popover" data-bs-trigger="focus" title="Track Your Sales, Mark Sold Inventory And View Sales History">
                        <span class="text-black">Learn More</span>
                    </div>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="col-md-3">
                <a href="khatabook.php" class="card card-custom text-decoration-none ">
                    <div class="card-header ">
                        <h5 class="card-title text-black text-center">Khata Book</h5>
                    </div>
                    <div class="card-body text-center ">
                        <i class="fa fa-book text-black font"></i>
                    </div>
                    <div class="card-footer " data-bs-toggle="popover" data-bs-trigger="focus" title="Manage Khata Book, Track Khata Transactions, View History">
                        <span class="text-black">Learn More</span>
                    </div>
                </a>
            </div>

            <!-- Card 4 -->
            <div class="col-md-3">
                <a href="search.php" class="card card-custom text-decoration-none ">
                    <div class="card-header ">
                        <h5 class="card-title text-black text-center">Search</h5>
                    </div>
                    <div class="card-body text-center">
                        <i class="fas fa-search text-black font"></i>
                    </div>
                    <div class="card-footer " data-bs-toggle="popover" data-bs-trigger="focus" title="Search Products, Find Sales, View Khata Transactions">
                        <span class="text-black">Learn more</span>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'include/footer.php';?>
</body>

</html>