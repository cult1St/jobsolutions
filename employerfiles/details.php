<?php
session_start();
require_once "userguard.php";
require_once "../classes/Employer.php";
require_once "../classes/User.php";

$employer = new Employer;
$user3 = new User;

$user = $employer->get_user_by_id($_SESSION['useronline']);

if (isset($_POST['details'])) {
    $id = $_POST['id'];
} else {
    header("location: applications.php");
    exit();
}

$cv = $employer->fetch_applications_by_userid($id);
$fetch = $user3->get_user_by_id($id);

require_once "partials/header.php";
?>

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary"><i class="bx bx-user"></i> Applicant Details</h4>
    <a href="applications.php" class="btn btn-outline-secondary">
      <i class="bx bx-arrow-back"></i> Back
    </a>
  </div>

  <div class="card shadow-sm p-4">
    <div class="card-body">
      <div class="row g-4">
        <div class="col-md-6">
          <h6 class="text-muted mb-1">Full Name</h6>
          <p class="fw-semibold text-dark"><?= $fetch['jobSeeker_firstName'] . " " . $fetch['jobSeeker_lastName']; ?></p>
        </div>

        <div class="col-md-6">
          <h6 class="text-muted mb-1">Email</h6>
          <p class="fw-semibold text-dark"><?= $fetch['jobSeeker_email']; ?></p>
        </div>

        <div class="col-md-6">
          <h6 class="text-muted mb-1">Phone Number</h6>
          <p class="fw-semibold text-dark"><?= $fetch['jobSeeker_phone']; ?></p>
        </div>

        <div class="col-md-6">
          <h6 class="text-muted mb-1">Address</h6>
          <p class="fw-semibold text-dark"><?= $fetch['jobSeeker_Address']; ?></p>
        </div>

        <div class="col-md-6">
          <h6 class="text-muted mb-1">Qualification</h6>
          <p class="fw-semibold text-dark"><?= $fetch['jobSeeker_qualification']; ?></p>
        </div>

        <div class="col-md-6">
          <h6 class="text-muted mb-1">Experience</h6>
          <p class="fw-semibold text-dark"><?= $fetch['jobSeeker_experience']; ?></p>
        </div>

        <div class="col-12">
          <h6 class="text-muted mb-1">Application Status</h6>
          <?php 
          $status = $cv['application_status'];
          $badge = match ($status) {
              0 => "<span class='badge bg-warning text-dark'>Pending</span>",
              1 => "<span class='badge bg-danger'>Not Accepted</span>",
              2 => "<span class='badge bg-success'>Approved</span>",
              default => "<span class='badge bg-secondary'>Unknown</span>"
          };
          echo $badge;
          ?>
        </div>
      </div>

      <!-- Actions -->
      <div class="mt-4 d-flex align-items-center gap-3">
        <?php if ($status == 0): ?>
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approveModal">
            <i class="bx bx-check-circle"></i> Approve
          </button>
          <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
            <i class="bx bx-x-circle"></i> Reject
          </button>
        <?php endif; ?>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#cvModal">
          <i class="bx bx-file"></i> View CV
        </button>
      </div>
    </div>
  </div>
</div>

<!-- ✅ CV Modal -->
<div class="modal fade" id="cvModal" tabindex="-1" aria-labelledby="cvModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="cvModalLabel">Applicant CV</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <embed src="../applicationfiles/<?= $cv['application_CV']; ?>" type="application/pdf" width="100%" height="600px">
      </div>
      <div class="modal-footer">
        <a href="../applicationfiles/<?= $cv['application_CV']; ?>" download="<?= $cv['application_CV']; ?>" class="btn btn-primary">
          <i class="bx bx-download"></i> Download CV
        </a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bx bx-x"></i> Close
        </button>
      </div>
    </div>
  </div>
</div>

<!-- ✅ Approve Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="approveModalLabel">Approve Application</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to <strong class="text-success">approve</strong> this application?</p>
      </div>
      <div class="modal-footer">
        <form action="process/updatestatus.php" method="post">
          <input type="hidden" name="id" value="<?= $fetch['jobSeeker_id']; ?>">
          <input type="hidden" name="status" value="2">
          <button type="submit" class="btn btn-success">
            <i class="bx bx-check"></i> Approve
          </button>
        </form>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- ✅ Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="rejectModalLabel">Reject Application</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to <strong class="text-danger">reject</strong> this application?</p>
      </div>
      <div class="modal-footer">
        <form action="process/updatestatus.php" method="post">
          <input type="hidden" name="id" value="<?= $fetch['jobSeeker_id']; ?>">
          <input type="hidden" name="status" value="1">
          <button type="submit" class="btn btn-danger">
            <i class="bx bx-x"></i> Reject
          </button>
        </form>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<?php require_once "partials/footer.php"; ?>
