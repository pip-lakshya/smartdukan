<?php include('include/header.php');?>
<?php include('include/navbar.php');?>
<?php 
if (!isset($_SESSION['username']))
   include('login.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SMART DUKAN</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/styles.css">
  <script src="assets\style.js"></script>
</head>

<body>


  <!-- Hero Section -->
  <div class="container my-5">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4">
        <h1>Empowering Local Shopkeepers with <span>SMART DUKAN</span></h1>
        <p>Manage Inventory, Sales, Khata, Payments and more – all from your phone in very simple steps.</p>
      </div>
      <div class="col-lg-6">
        <img src="assets/images/image1.png" class="img-fluid rounded shadow" alt="Smart Dukan Image">
      </div>
    </div>
  </div>

  <!-- Key Features -->
  <div class="container text-center my-5">
    <h3 class="mb-4">Key Features</h3>
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="key-features-content p-4 shadow rounded card-hover">
          <h4>Inventory Management</h4>
          <p>Track stock in real-time and get restock alerts automatically.</p>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="key-features-content p-4 shadow rounded card-hover">
          <h4>Khata Book</h4>
          <p>Digitize your credit ledger and send reminders to customers.</p>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="key-features-content p-4 shadow rounded card-hover">
          <h4>Track Sales</h4>
          <p>Track all your sales with timestamp and detailed sale log with payment integration.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Image & Content Section -->
  <div class="container my-5">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <img src="assets/images/image2.png" class="img-fluid rounded shadow" alt="Smart Dukan Image">
      </div>
      <div class="col-lg-6 mb-4">
        <h1><span>ABOUT US</span></h1>
        <p class="p-2">Smart Dukan is a startup aiming to revolutionize small stores by providing a simple,affordable and useful digital platform built for India's next billion users, enable shopkeepers thrive in the digital age-with minimal tech knowledge.</p>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'include/footer.php';?>
</body>

</html>