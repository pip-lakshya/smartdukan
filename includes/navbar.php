<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<link rel ="stylesheet" href="assets/css/styles.css">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="assets/images/logo.png" alt="SMART DUKAN Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="join.php">Join</a></li>
        <li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>

        <?php if (isset($_SESSION['username'])): ?>
          <li class="nav-item"><a class="nav-link" href="inner_home.php">Dashboard</a></li>
          <li class="nav-item">
  <form action="logout.php" method="POST">
    <button class="nav-link btn btn-primary text-white ms-2 container-fluid" type="submit">Logout</button>
  </form>
</li>

        <?php else: ?>
          <li class="nav-item">
            <button class="nav-link btn btn-primary text-white ms-2 container-fluid" type="button"
              data-bs-toggle="modal" data-bs-target="#myModal" action=login.php> Login</button>
          </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
