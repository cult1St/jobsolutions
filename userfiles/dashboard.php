<?php
session_start();
require_once "../classes/User.php";
require_once "../classes/Employer.php";
require_once "userguard.php";

$user = new User;
if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $user_id = $user->get_user_by_id($id);
    $profile = $user_id;
} else {
    header("location:../login.php");
    exit;
}

$employer = new Employer;
$fetchs = $employer->fetch_vacancies_for_users();

// Profile completion calculation
$total_fields = 9;
$filled = 0;
$fields = [
    'jobSeeker_firstName', 'jobSeeker_lastName', 'jobSeeker_phone',
    'jobSeeker_email', 'jobSeeker_gender', 'jobSeeker_qualification',
    'jobSeeker_experience', 'jobSeeker_CV', 'jobSeeker_Address'
];

foreach ($fields as $field) {
    if (!empty($user_id[$field])) $filled++;
}

$completion_percent = round(($filled / $total_fields) * 100);
$active = 'dashboard';

require_once 'partials/header.php';
?>

<div class="container py-4">
  <div class="row align-items-center mb-4">
    <div class="col-12 col-md-8">
      <h4 class="fw-bold text-primary mb-1">Welcome, <?= htmlspecialchars($user_id['jobSeeker_firstName']); ?> 👋</h4>
      <p class="text-muted mb-0">Here’s your job dashboard overview.</p>
    </div>
    <div class="col-12 col-md-4 text-md-end text-center mt-3 mt-md-0">
      <a href="usersettings.php" class="btn btn-sm btn-outline-primary">
        <i class="bx bx-cog"></i> Edit Profile
      </a>
    </div>
  </div>

  <?php if (isset($_SESSION['feedback'])): ?>
    <div class="alert alert-success"><?= $_SESSION['feedback']; ?></div>
    <?php unset($_SESSION['feedback']); ?>
  <?php endif; ?>
  <?php if (isset($_SESSION['errormsg'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['errormsg']; ?></div>
    <?php unset($_SESSION['errormsg']); ?>
  <?php endif; ?>

  <div class="row g-4">
    <!-- Profile Completion Card -->
    <div class="col-12 col-md-4">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body text-center">
          <h5 class="fw-semibold mb-3">Profile Completion</h5>
          <div class="progress mb-3" style="height: 12px;">
            <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $completion_percent ?>%;" 
                 aria-valuenow="<?= $completion_percent ?>" aria-valuemin="0" aria-valuemax="100">
              <?= $completion_percent ?>%
            </div>
          </div>
          <p class="text-muted small mb-3">Complete your profile to increase your chances of getting hired.</p>

          <div class="text-start small">
            <?php foreach ($fields as $field): ?>
              <div class="form-check mb-1">
                <input class="form-check-input" type="checkbox" disabled <?= !empty($user_id[$field]) ? 'checked' : '' ?>>
                <label class="form-check-label"><?= ucwords(str_replace(['jobSeeker_', '_'], ['', ' '], $field)); ?></label>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Available Jobs -->
    <div class="col-12 col-md-8">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-semibold mb-0">Available Jobs</h5>
            <a href="available_jobs.php" class="text-primary small">View All</a>
          </div>
          <div class="row">
            <?php 
            $has_jobs = false;
            foreach ($fetchs as $fetch):
              $exp_date = strtotime($fetch['dateClosed']);
              $today_date = strtotime(date('Y-m-d'));
              if ($today_date < $exp_date):
                $has_jobs = true;
            ?>
            <div class="col-12 col-lg-6 mb-3">
              <div class="card border shadow-sm h-100">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                    <img src="../logos/<?= htmlspecialchars($fetch['employer_companyLogo']); ?>" 
                         alt="Logo" class="rounded-circle border me-3" 
                         style="width: 50px; height: 50px; object-fit: cover;">
                    <div>
                      <h6 class="fw-semibold mb-0"><?= htmlspecialchars($fetch['employer_companyName']); ?></h6>
                      <small class="text-muted"><?= ucfirst($fetch['jobVacancy_title']); ?></small>
                    </div>
                  </div>
                  <p class="mb-1 text-muted small"><i class="bx bx-map"></i> <?= $fetch['state_name']; ?>, <?= $fetch['lga_name']; ?></p>
                  <p class="mb-2"><span class="fw-semibold">Salary:</span> <?= $fetch['vacancy_salaryRange']; ?></p>
                  <a href="viewjobs.php?jid=<?= $fetch['jobVacancy_id']; ?>" class="btn btn-sm btn-primary w-100">Apply Now</a>
                </div>
              </div>
            </div>
            <?php 
              endif;
            endforeach;

            if (!$has_jobs): 
            ?>
            <div class="col-12 text-center py-4">
              <div class="alert alert-secondary">
                <i class="bx bx-briefcase"></i> No active job postings at the moment.
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'partials/footer.php'; ?>
