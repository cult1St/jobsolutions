<?php
session_start();
require_once "../classes/User.php";
require_once "userguard.php";

$user = new User;

if (isset($_SESSION['user_id'])) {
  $id = $_SESSION['user_id'];
  $user_id = $user->get_user_by_id($id);
} else {
  header("location:../login.php");
  exit;
}

$active = 'settings';
require_once 'partials/header.php';
?>

<!-- Sneat Rebrand: Profile Settings Page -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">

      <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Profile Settings</h5>
        </div>

        <div class="card-body">
          <form id="settingsForm" action="../process/updateprocess.php" method="post" enctype="multipart/form-data">

            <!-- Phone Number -->
            <div class="mb-3">
              <label for="number" class="form-label fw-semibold">Phone Number</label>
              <input type="text" class="form-control" id="number" name="number"
                     value="<?= $user_id['jobSeeker_phone'] ?>" placeholder="Enter your phone number" />
              <small id="para3" class="text-danger d-none">Enter a valid number</small>
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label fw-semibold">Email</label>
              <input type="email" class="form-control" id="email" name="email"
                     value="<?= $user_id['jobSeeker_email'] ?>" placeholder="Enter your email" />
              <small id="para4" class="text-danger d-none">Enter a valid email address</small>
            </div>

            <!-- Passwords -->
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="pass1" class="form-label fw-semibold">New Password</label>
                <div class="input-group">
                  <input type="password" id="pass1" class="form-control" placeholder="Enter new password">
                  <button class="btn btn-outline-secondary toggle-pass" type="button">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
                <small id="para5" class="text-danger d-none">Enter a password</small>
              </div>

              <div class="col-md-6 mb-3">
                <label for="pass2" class="form-label fw-semibold">Confirm Password</label>
                <div class="input-group">
                  <input type="password" id="pass2" name="password" class="form-control" placeholder="Confirm password">
                  <button class="btn btn-outline-secondary toggle-pass" type="button">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
                <small id="para6" class="text-danger d-none">Passwords must match</small>
              </div>
            </div>

            <!-- Qualification and Experience -->
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="qualification" class="form-label fw-semibold">Qualification</label>
                <select name="qualification" id="qualification" class="form-select">
                  <option value="">Select Qualification</option>
                  <option value="olevel">O-Level / SSCE</option>
                  <option value="nce">NCE</option>
                  <option value="nd">National Diploma</option>
                  <option value="bsc">B.Sc</option>
                  <option value="msc">M.Sc</option>
                  <option value="phd">Ph.D</option>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label for="yox" class="form-label fw-semibold">Experience</label>
                <select name="experience" id="yox" class="form-select">
                  <option value="">Select Experience</option>
                  <?php 
                    for ($i = 1; $i <= 10; $i++) {
                      $selected = $user_id['jobSeeker_experience'] == $i ? "selected" : "";
                      $label = ($i < 10) ? "$i Year(s)" : "$i Years and Above";
                      echo "<option value='$i' $selected>$label</option>";
                    }
                  ?>
                </select>
              </div>
            </div>

            <!-- Address -->
            <div class="mb-3">
              <label for="add" class="form-label fw-semibold">Address</label>
              <textarea name="address" id="add" class="form-control" rows="3"><?= $user_id['jobSeeker_Address'] ?></textarea>
            </div>

            <!-- CV Upload -->
            <div class="mb-3">
              <label for="cv" class="form-label fw-semibold">Upload CV (PDF only, max 10MB)</label>
              <input type="file" class="form-control" id="cv" name="cv" accept=".pdf" />
            </div>

            <!-- Submit -->
            <div class="text-end">
              <button type="submit" name="save" value="save" class="btn btn-primary px-4">
                <i class="bi bi-save me-2"></i>Save Settings
              </button>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Include Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Sneat JS -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  // Password toggle
  document.querySelectorAll('.toggle-pass').forEach(btn => {
    btn.addEventListener('click', () => {
      const input = btn.parentElement.querySelector('input');
      const icon = btn.querySelector('i');
      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
      }
    });
  });

  // Form validation
  const form = document.getElementById('settingsForm');
  form.addEventListener('submit', e => {
    let valid = true;
    const email = document.getElementById('email');
    const pass1 = document.getElementById('pass1');
    const pass2 = document.getElementById('pass2');
    const number = document.getElementById('number');

    // Phone validation
    if (!/^[0-9]{10,15}$/.test(number.value)) {
      document.getElementById('para3').classList.remove('d-none');
      valid = false;
    } else {
      document.getElementById('para3').classList.add('d-none');
    }

    // Email validation
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!emailPattern.test(email.value)) {
      document.getElementById('para4').classList.remove('d-none');
      valid = false;
    } else {
      document.getElementById('para4').classList.add('d-none');
    }

    // Password validation
    if (pass1.value && pass1.value !== pass2.value) {
      document.getElementById('para6').classList.remove('d-none');
      valid = false;
    } else {
      document.getElementById('para6').classList.add('d-none');
    }

    if (!valid) e.preventDefault();
  });
});
</script>

<?php require_once 'partials/footer.php'; ?>
