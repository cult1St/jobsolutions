<?php
session_start();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $_SESSION['editid'] = $id;
}

require_once "userguard.php";
require_once "../classes/Employer.php";

$cat1 = new Employer;
$cats = $cat1->fetch_cat();
$states = $cat1->fetch_state();
$fetch = $cat1->selectVacancyById($id);

// Split salary range
$price_arr = explode("-", $fetch['vacancy_salaryRange']);

require_once "partials/header.php";
?>

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary"><i class="bx bx-edit-alt"></i> Edit Job Posting</h4>
    <a href="viewapplications.php" class="btn btn-outline-secondary">
      <i class="bx bx-arrow-back"></i> Back to Jobs
    </a>
  </div>

  <div class="card shadow-sm p-4">
    <form action="process/editprocess.php" method="post" id="editJobForm">
      <div class="row g-3">
        <!-- Role -->
        <div class="col-md-6">
          <label for="role" class="form-label fw-semibold">Role</label>
          <input type="text" name="role" id="role" class="form-control" 
                 value="<?= htmlspecialchars($fetch['jobVacancy_title']); ?>" placeholder="Job title">
        </div>

        <!-- Qualification -->
        <div class="col-md-6">
          <label for="qualification" class="form-label fw-semibold">Qualification</label>
          <input type="text" name="qualification" id="qualification" class="form-control"
                 value="<?= htmlspecialchars($fetch['qualification']); ?>" placeholder="Required qualification">
        </div>

        <!-- Salary Range -->
        <div class="col-md-6">
          <label class="form-label fw-semibold">Salary Range</label>
          <div class="input-group">
            <input type="number" name="low" id="low" class="form-control" 
                   value="<?= $price_arr[0]; ?>" placeholder="Minimum">
            <span class="input-group-text">-</span>
            <input type="number" name="high" id="high" class="form-control" 
                   value="<?= $price_arr[1]; ?>" placeholder="Maximum">
          </div>
        </div>

        <!-- Work Type -->
        <div class="col-md-6">
          <label for="type" class="form-label fw-semibold">Work Type</label>
          <input type="text" name="type" id="type" class="form-control"
                 value="<?= htmlspecialchars($fetch['work_type']); ?>" placeholder="Full-time, Remote, etc.">
        </div>

        <!-- Closing Date -->
        <div class="col-md-6">
          <label for="date" class="form-label fw-semibold">Closing Date</label>
          <input type="date" name="closingdate" id="date" class="form-control" 
                 value="<?= htmlspecialchars($fetch['dateClosed']); ?>">
        </div>

        <!-- Job Description -->
        <div class="col-12">
          <label for="desc" class="form-label fw-semibold">Job Description</label>
          <textarea name="desc" id="desc" class="form-control" rows="5"
                    placeholder="Describe the job role, responsibilities, and expectations"><?= htmlspecialchars($fetch['vacancy_description']); ?></textarea>
        </div>

        <!-- Category -->
        <div class="col-md-6">
          <label for="cat" class="form-label fw-semibold">Job Category</label>
          <select name="cat" id="cat" class="form-select">
            <option value="">Select Category</option>
            <?php foreach ($cats as $cat): ?>
              <option value="<?= $cat['jobCat_id']; ?>" 
                      <?= $cat['jobCat_id'] == $fetch['jobCat_id'] ? 'selected' : ''; ?>>
                <?= htmlspecialchars($cat['jobCat_name']); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- State -->
        <div class="col-md-6">
          <label for="state" class="form-label fw-semibold">State</label>
          <select name="states" id="state" class="form-select">
            <option value="">Select State</option>
            <?php foreach ($states as $state): ?>
              <option value="<?= $state['state_id']; ?>" 
                      <?= $state['state_id'] == $fetch['states_id'] ? 'selected' : ''; ?>>
                <?= htmlspecialchars($state['state_name']); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- LGA -->
        <div class="col-md-6" id="lgadiv" style="display:none;">
          <label for="lga" class="form-label fw-semibold">Local Government Area</label>
          <select name="lga" id="lga" class="form-select"></select>
        </div>

        <div id="view" class="col-12"></div>

        <!-- Submit Button -->
        <div class="col-12 mt-4">
          <button type="submit" name="submit" value="submit" class="btn btn-primary">
            <i class="bx bx-save"></i> Save Changes
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- jQuery -->
<script src="../jquery-3.7.1.min.js"></script>

<script>
$(document).ready(function() {

  // State → LGA dynamic load
  $("#state").change(function() {
    const state_id = $(this).val();
    if (!state_id) return;

    $("#view").html("<div class='alert alert-info py-2'><i class='bx bx-loader-circle bx-spin'></i> Loading LGAs...</div>");
    $("#lgadiv").hide();

    $.ajax({
      url: "process/ajaxserver.php",
      method: "POST",
      data: { state_id: state_id },
      dataType: "json",
      success: function(res) {
        $("#view").hide();
        $("#lga").empty();

        if (res.success === false) {
          $("#view").show().html("<div class='alert alert-danger py-2'>" + res.message + "</div>");
          $("#lgadiv").hide();
        } else {
          $("#lgadiv").show();
          res.forEach(element => {
            $("#lga").append("<option value='" + element['lga_id'] + "'>" + element['lga_name'] + "</option>");
          });
        }
      },
      error: function() {
        $("#view").html("<div class='alert alert-danger py-2'>An error occurred loading LGAs.</div>");
      }
    });
  });

  // Form submission confirmation
  $("#editJobForm").on("submit", function() {
    return confirm("Are you sure you want to update this job posting?");
  });
});
</script>

<?php require_once "partials/footer.php"; ?>
