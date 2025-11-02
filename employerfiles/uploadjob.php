<?php
session_start();
require_once "userguard.php";
require_once "../classes/Employer.php";

$employer = new Employer;
$cats = $employer->fetch_cat();
$states = $employer->fetch_state();

$active = 'uploadjob';
require_once "partials/header.php";
?>

<div class="container-xxl flex-grow-1 container-p-y">

  <!-- Page Header -->
  <div class="row mb-4">
    <div class="col-12 d-flex align-items-center justify-content-between flex-wrap gap-2">
      <div>
        <h4 class="fw-bold text-primary mb-1">Post a New Job</h4>
        <p class="text-muted mb-0">Provide all necessary details to create a new job listing.</p>
      </div>
      <a href="employerdashboard.php" class="btn btn-outline-secondary btn-sm">
        <i class="bx bx-arrow-back me-1"></i> Back to Dashboard
      </a>
    </div>
  </div>

  <!-- Error / Success Message -->
  <?php if (isset($_SESSION['errormsg'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= $_SESSION['errormsg']; unset($_SESSION['errormsg']); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <!-- Job Upload Form -->
  <div class="card border-0 shadow-sm">
    <div class="card-header bg-light d-flex justify-content-between align-items-center py-3">
      <h5 class="mb-0 fw-semibold"><i class="bx bx-briefcase me-2 text-primary"></i>Job Information</h5>
      <small class="text-muted">* All fields are required</small>
    </div>

    <form action="process/uploadprocess.php" method="POST" class="card-body">
      <div class="row g-4">
        <!-- Role -->
        <div class="col-md-6">
          <label for="role" class="form-label fw-semibold">Role</label>
          <input type="text" name="role" id="role" class="form-control" placeholder="e.g. Frontend Developer" required>
        </div>

        <!-- Qualification -->
        <div class="col-md-6">
          <label for="qualification" class="form-label fw-semibold">Qualification</label>
          <input type="text" name="qualification" id="qualification" class="form-control" placeholder="e.g. BSc, OND" required>
        </div>

        <!-- Salary -->
        <div class="col-md-6">
          <label class="form-label fw-semibold">Salary Range (₦)</label>
          <div class="input-group">
            <input type="number" name="low" id="low" class="form-control" placeholder="Minimum" min="0" required>
            <span class="input-group-text">-</span>
            <input type="number" name="high" id="high" class="form-control" placeholder="Maximum" min="0" required>
          </div>
        </div>

        <!-- Work Type -->
        <div class="col-md-6">
          <label for="worktype" class="form-label fw-semibold">Work Type</label>
          <select name="worktype" id="worktype" class="form-select" required>
            <option value="">Select Work Type</option>
            <option value="Full Time">Full Time</option>
            <option value="Part Time">Part Time</option>
            <option value="Contract">Contract</option>
            <option value="Remote">Remote</option>
          </select>
        </div>

        <!-- Deadline -->
        <div class="col-md-6">
          <label for="closingdate" class="form-label fw-semibold">Application Deadline</label>
          <input type="date" name="closingdate" id="closingdate" class="form-control" required>
        </div>

        <!-- Category -->
        <div class="col-md-6">
          <label for="cat" class="form-label fw-semibold">Job Category</label>
          <select name="cat" id="cat" class="form-select" required>
            <option value="">Select Job Category</option>
            <?php foreach ($cats as $cat): ?>
              <option value="<?= $cat['jobCat_id'] ?>"><?= htmlspecialchars($cat['jobCat_name']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- State -->
        <div class="col-md-6">
          <label for="state" class="form-label fw-semibold">State</label>
          <select name="states" id="state" class="form-select" required>
            <option value="">Select State</option>
            <?php foreach ($states as $state): ?>
              <option value="<?= $state['state_id'] ?>"><?= htmlspecialchars($state['state_name']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- LGA -->
        <div class="col-md-6" id="lgadiv" style="display:none;">
          <label for="lga" class="form-label fw-semibold">Local Government Area</label>
          <select name="lga" id="lga" class="form-select"></select>
        </div>

        <!-- Description -->
        <div class="col-12">
          <label for="desc" class="form-label fw-semibold">Job Description</label>
          <textarea class="form-control" name="desc" id="desc" rows="5" placeholder="Describe the job role, responsibilities, and requirements..." required></textarea>
        </div>

        <!-- Submit -->
        <div class="col-12 text-end mt-3">
          <button type="submit" name="submit" value="submit" class="btn btn-primary px-4">
            <i class="bx bx-save me-2"></i>Post Job
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Ajax Logic -->
<script src="../jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function() {
  $('#state').change(function() {
    const state_id = $(this).val();
    if (state_id === '') {
      $('#lgadiv').hide();
      return;
    }
    $.ajax({
      url: 'process/ajaxserver.php',
      method: 'POST',
      data: { state_id: state_id },
      dataType: 'json',
      success: function(res) {
        if (res.success === false) {
          $('#lgadiv').hide();
          alert(res.message);
        } else {
          $('#lgadiv').show();
          $('#lga').empty();
          res.forEach(lga => {
            $('#lga').append(`<option value="${lga.lga_id}">${lga.lga_name}</option>`);
          });
        }
      },
      error: function() {
        alert('Error fetching LGAs. Please try again.');
      }
    });
  });
});
</script>

<?php require_once "partials/footer.php"; ?>
