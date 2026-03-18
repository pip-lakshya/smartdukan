<!-- Login Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title">Login</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        Enter your login details here.
        <form action="login_action.php" method="POST">
          <div class="mb-3 mt-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter Username" name="user">
          </div>
          <p class="text-danger" id="username-error"></p>

          <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="pass">
          </div>
          <p id="password-error" class="text-danger"></p>

          <div class="form-check mb-3">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
          <div class="text-end">
        <a href="#" data-bs-toggle="modal" data-bs-target="#forgotModal">Forgot Password?</a>
      </div>
        </form>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotModal" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="forgotModalLabel">Recover Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="verify_user.php" method="POST">
          <div class="mb-3">
            <label for="recoverUsername" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required>
          </div>
          <div class="mb-3">
            <label for="recoverPhone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phone" required>
          </div>
          <button type="submit" class="btn btn-primary">Recover</button>
        </form>
      </div>

    </div>
  </div>
</div>

