<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Join - Smart Dukan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">

  <style>
    .form-card {
      max-width: 600px;
      margin: auto;
      border-radius: 16px;
      box-shadow: 0 0 25px rgba(33, 9, 40, 0.228);
      background-color: #fff;
    }
    #paymentsection.hidden {
      display: none;
    }
  </style>
</head>
<body class="bg-light">

<?php include 'include/navbar.php'; ?>
<?php include 'login.php'; ?>

<div class="container my-5">
  <div class="breadcrumb text-center my-4 py-4 d-flex justify-content-center">
    <h5>JOIN SmartDukan</h5>
    <p class="text-muted container">Register your local shop with us and start your digital journey.</p>
  </div>

  <form id="joinForm" method="POST" action="join_action.php" class="form-card p-4">
    <div class="mb-3">
      <label class="form-label">Full Name</label>
      <input type="text" name="nm" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Shop Name</label>
      <input type="text" name="sname" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Phone</label>
      <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Referral Code ("SMART100")</label>
      <input type="text" name="referral" id="referral" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="text" name="password" class="form-control" required>
    </div>

    <div class="mb-3" id="paymentsection">
      <label class="form-label">Payment</label>
      <p>Pay via UPI: 
        <a href="upi://pay?pa=7357278264@axl&pn=LAKSHYA%20BHANDARI">Click to Pay</a>
      </p>
      <img src="assets/images/upi.jpeg" alt="UPI QR" class="img-fluid rounded" width="200">
    </div>

    <button type="submit" class="btn btn-primary w-100">Join Now</button>
  </form>
</div>

<script>
  const referralInput = document.getElementById("referral");
  const paymentsection = document.getElementById("paymentsection");

  referralInput.addEventListener("input", function () {
    if (referralInput.value.trim() === "SMART100") {
      paymentsection.classList.add("hidden");
    } else {
      paymentsection.classList.remove("hidden");
    }
  });
</script>

<!-- Bootstrap JS (needed for navbar toggler) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'include/footer.php'; ?>
</body>
</html>
