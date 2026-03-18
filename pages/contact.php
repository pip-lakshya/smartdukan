<?php include 'include/header.php';?>
<?php include 'include/navbar.php';?>
<?php if (!isset($_SESSION['username'])) include('login.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SMART DUKAN</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

  <!-- Breadcrumb -->
<!-- Intro Section -->
  <div class="container my-5">
    <div class="breadcrumb text-center my-4 py-4 d-flex justify-content-center">
    <h5>Contact Us</h5>
  </div>
  <!-- Contact Title -->
  <div class="container text-center my-5">
    <h3 class="contact-title">Get in Touch</h3>
  </div>

  <!-- Contact Details -->
  <div class="container mb-5 align-items-center p-4 ">
    <div class="row text-center">
      <div class="col-md-4 mb-4 dabba ">
        <i class="fa fa-map-marker fa-2x mb-2 text-primary mt-1"></i>
        <h4>Office Address</h4>
        <p>SKIT Incubation Cell, Ram Nagariya Rd, Shivam Nagar, Jagatpura, Jaipur, Rajasthan 302017</p>
      </div>
      <div class="col-md-4 mb-4 dabba ">
        <i class="fa fa-envelope fa-2x mb-2 text-primary mt-2"></i>
        <h4>Email</h4>
        <p>info@smartdukan.in<br>bhandarilakshya14@gmail.com</p>
      </div>
      <div class="col-md-4 mb-4 dabba ">
        <i class="fa fa-phone fa-2x mb-2 text-primary mt-4"></i>
        <h4 >Contact</h4>
        <p>+91 7357278264</p>
      </div>
    </div>
  </div>

  <!-- Map & Contact Form -->
  <div class="container mb-5">
    <div class="row g-4">
      <div class="col-md-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3560.5455824293967!2d75.8659493!3d26.822594199999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db770070b115f%3A0x6f306afd08a3e737!2sSwami%20Keshvanand%20Institute%20of%20Technology%2C%20Management%20%26%20Gramothan%20(SKIT)!5e0!3m2!1sen!2sin!4v1752741556318!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
      <div class="col-md-6">
        <form method="POST" action="sendmail.php" class="p-4 border rounded">
          <h4>Contact Form</h4>
          <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
          </div>
          <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
          </div>
          <div class="mb-3">
            <input type="phone" name="phone" class="form-control" placeholder="Your Phone Number" required>
          </div>
          <div class="mb-3">
            <input type="text" name="subject" class="form-control" placeholder="Subject" required>
          </div>
          <div class="mb-3">
            <textarea name="message" class="form-control" placeholder="Your Message" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary w-100">Send Message</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Footer -->
<?php include 'include/footer.php';?>
</body>
</html>
