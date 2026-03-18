<?php
include('config.php');
session_start();

if (!isset($_SESSION['reset_username'])) {
    header("Location: index.php");
    exit;
}
?>

<!-- Bootstrap CSS + JS (if not already included) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Password Reset Modal -->
<div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true" style="display:block;">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" action="">
        <div class="modal-header">
          <h5 class="modal-title">Reset Your Password</h5>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Enter New Password</label>
            <input type="text" name="newpass" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Reset Password</button>
        </div>
      </form>

    </div>
  </div>
</div>

<script>
  var resetModal = new bootstrap.Modal(document.getElementById('resetPasswordModal'));
  resetModal.show();
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newpass'])) {
    $newpass = mysqli_real_escape_string($conn, $_POST['newpass']);
    $username = $_SESSION['reset_username'];

    $update = "UPDATE userdata SET password='$newpass' WHERE username='$username'";
    if (mysqli_query($conn, $update)) {
        unset($_SESSION['reset_username']);
        echo "<script>alert('Password updated!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Failed to update password.');</script>";
    }
}
?>
