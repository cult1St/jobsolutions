<?php 
session_start();
require_once "userguard.php";
require_once "classes/User.php";
require_once "classes/Employer.php";

if (isset($_SESSION['search'])) {
    $fetches = $_SESSION['search'];
}

$user = new User;
if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $user_id = $user->get_user_by_id($id);
    $profile = $user_id;
} else {
    header("location:login.php");
    session_destroy();
    exit;
}

$active = 'available_jobs';
require_once 'user/partials/header.php';
?>

<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-12 text-center mb-4">
      <h3 class="fw-bold text-primary">Available Job Openings</h3>
      <p class="text-muted">Browse through job listings that match your skills and interests.</p>
    </div>

    <?php 
    if (isset($_SESSION["searchmsg"])) {
        echo "<div class='alert alert-info text-center'>".$_SESSION["searchmsg"]."</div>";
        unset($_SESSION["searchmsg"]);
    }

    if (isset($_SESSION["search"]) && !empty($_SESSION["search"])) {
        foreach ($fetches as $fetch) {
            $exp_date = strtotime($fetch['dateClosed']);
            $today_date = strtotime(date('Y-m-d'));
            if ($today_date < $exp_date) {
    ?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body text-center">
            <div class="mb-3">
              <img src="logos/<?php echo $fetch['employer_companyLogo']; ?>" 
                   alt="Company Logo" 
                   class="rounded-circle border" 
                   style="width: 80px; height: 80px; object-fit: cover;">
            </div>

            <h5 class="card-title fw-semibold text-dark"><?php echo ucfirst($fetch['employer_companyName']); ?></h5>
            <p class="text-muted small mb-1"><?php echo ucfirst($fetch['jobVacancy_title']); ?></p>
            <span class="badge bg-label-primary mb-2"><?php echo ucfirst($fetch['qualification']); ?></span>

            <p class="mb-1 text-dark fw-medium">Salary: <span class="text-success"><?php echo $fetch['vacancy_salaryRange']; ?></span></p>
            <p class="text-muted small mb-3">
              <i class="bx bx-map"></i> <?php echo $fetch['state_name']; ?>, <?php echo $fetch['lga_name']; ?>
            </p>

            <a href="user/viewjobs.php?jid=<?php echo $fetch['jobVacancy_id']; ?>" 
               class="btn btn-primary w-100">
              Apply Now
            </a>
          </div>
        </div>
      </div>
    <?php
            }
        }
        unset($_SESSION['search']);
    } else {
    ?>
      <div class="col-12 text-center mt-4">
        <div class="alert alert-secondary shadow-sm">
          <i class="bx bx-search"></i> No jobs found. Please try searching for a job.
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php require_once 'user/partials/footer.php'; ?>
