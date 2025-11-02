<?php
session_start();    
$active = 'settings';
require_once "partials/header.php";
?>

<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Page Header -->
  <div class="row mb-4">
    <div class="col-12">
      <h4 class="fw-bold text-primary">Account Settings</h4>
      <p class="text-muted">Update your password, organization name, and logo below.</p>
    </div>
  </div>

  <!-- Feedback Message -->
  <?php if (isset($_SESSION["errormsg"])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= $_SESSION["errormsg"]; unset($_SESSION["errormsg"]); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <!-- Settings Form -->
  <div class="card border-0 shadow-sm">
    <div class="card-header bg-light py-3">
      <h5 class="mb-0 fw-semibold">
        <i class="bx bx-cog me-2 text-primary"></i>Change Settings
      </h5>
    </div>

    <div class="card-body">
      <form action="process/processupdate.php" method="post" enctype="multipart/form-data">
        <div class="row g-4">
          <!-- Password Fields -->
          <div class="col-12">
            <label for="pass1" class="form-label fw-semibold">Change Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="pass1" placeholder="Enter new password" required>
              <button class="btn btn-outline-secondary passbtn" type="button">
                <i class="fa-regular fa-eye"></i>
              </button>
              <button class="btn btn-outline-secondary passbtn2" type="button" style="display:none;">
                <i class="fa-regular fa-eye-slash"></i>
              </button>
            </div>
            <p class="text-danger small mt-1 d-none" id="para5">Enter password</p>
          </div>

          <div class="col-12">
            <label for="pass2" class="form-label fw-semibold">Confirm Password</label>
            <div class="input-group">
              <input type="password" name="password" class="form-control" id="pass2" placeholder="Confirm password" required>
              <button class="btn btn-outline-secondary passbtn" type="button">
                <i class="fa-regular fa-eye"></i>
              </button>
              <button class="btn btn-outline-secondary passbtn2" type="button" style="display:none;">
                <i class="fa-regular fa-eye-slash"></i>
              </button>
            </div>
            <p class="text-danger small mt-1 d-none" id="para6">Passwords must match</p>
          </div>

          <!-- Organization Name -->
          <div class="col-md-6">
            <label for="ogname" class="form-label fw-semibold">Organization Name</label>
            <input type="text" name="ogname" id="ogname" class="form-control" placeholder="Enter your organization name">
            <p class="text-danger small mt-1 d-none" id="parafour">Please input your organization name</p>
          </div>

          <!-- Logo Upload -->
          <div class="col-md-6">
            <label for="logo" class="form-label fw-semibold">Upload Logo</label>
            <input type="file" name="logo" id="logo" class="form-control">
          </div>

          <input type="hidden" name="id" value="<?php echo $_SESSION['useronline']; ?>">

          <!-- Submit -->
          <div class="col-12 text-end">
            <button type="submit" name="update" class="btn btn-primary px-4">
              <i class="bx bx-save me-2"></i>Update Settings
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Password Toggle Script -->
<script src="../jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function() {
  // Toggle eye icons for password fields
  $(".passbtn").click(function() {
    const input = $(this).siblings("input");
    input.attr("type", "text");
    $(this).hide();
    $(this).siblings(".passbtn2").show();
  });

  $(".passbtn2").click(function() {
    const input = $(this).siblings("input");
    input.attr("type", "password");
    $(this).hide();
    $(this).siblings(".passbtn").show();
  });
});
</script>

<?php require_once "partials/footer.php"; ?>
