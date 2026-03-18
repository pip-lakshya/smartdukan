<?php include 'include/header.php';?>
<?php include 'include/navbar.php';?>
<?php if (!isset($_SESSION['username'])) include('login.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us | SMART DUKAN</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>


  <!-- Intro Section -->
  <div class="container my-5">
    <div class="breadcrumb text-center my-4 py-4 d-flex justify-content-center">
    <h5>About Us</h5>
  </div>
    <p class="text-center">
      Smart Dukan is an initiative to empower local shopkeepers by providing a simple and efficient platform to manage their inventory, sales, khata, and payments digitally, enabling them to grow and modernize their business operations seamlessly.
    </p>
  </div>

  <!-- Team Section -->
<div class="container my-5">
    <h3 class="text-center mb-4">Our Team</h3>
    <div class="row justify-content-center text-center">
        <div class="col-md-4 mb-4 abba">
            <img src="assets\images\teamleader.jpeg" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
            <h4>Lakshya Bhandari</h4>
            <p>Team Leader</p>
        </div>
        <div class="col-md-4 mb-4 abba">
            <img src="assets/images/teammember2.jpeg" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
            <h4>Kanishka Joshi</h4>
            <p>Team Member</p>
        </div>
        <div class="col-md-4 mb-4 abba">
            <img src="assets/images/teammember3.jpeg" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
            <h4>Khushboo Suwalka</h4>
            <p>Team Member</p>
        </div>
    </div>
</div>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <?php include 'include/footer.php';?>
</body>
</html>
