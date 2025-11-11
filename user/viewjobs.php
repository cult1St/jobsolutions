<?php
session_start();
require_once "../classes/User.php";
require_once "../classes/Employer.php";
require_once "userguard.php";

$user = new User;
if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $user_id = $user->get_user_by_id($id);
} else {
    header("location:../login.php");
    exit();
}

if (!isset($_GET['jid'])) {
    header('location:dashboard.php');
    exit();
}

$jid = $_GET['jid'];
$emp = new Employer();
$fetch = $emp->fetch_vacancies_for_users_by_id($jid);

if ($fetch == false) {
    header('location:dashboard.php');
    exit();
}

require_once "../partials/header.php";
?>

<!-- Sidebar Toggle Button -->
<div class="col-1 offset-md-2 mt-2">
  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    <span class="fa-regular fa-user"></span>
  </button>
</div>

<!-- Page Content -->
<div class="page-heading about-heading header-text" style="background-image: url(../logos/<?php echo htmlspecialchars($fetch['employer_companyLogo']); ?>);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4><?php echo htmlspecialchars($fetch['employer_companyName']); ?> Jobs</h4>
          <h2><?php echo htmlspecialchars($fetch['jobVacancy_title']); ?></h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="products">
  <div class="container">
    <div class="row">
      <!-- Job Description -->
      <div class="col-md-9 col-sm-8">
        <p class="lead">
          <i class="fa fa-map-marker"></i> State: <?php echo htmlspecialchars($fetch['state_name']); ?><br>
          Local Government Area: <?php echo htmlspecialchars($fetch['lga_name']); ?>&nbsp;&nbsp;
          <i class="fa fa-calendar"></i> <?= date("d-m-Y", strtotime($fetch['dateClosed'])); ?>&nbsp;&nbsp;
          <i class="fa fa-file"></i> <?php echo htmlspecialchars($fetch['work_type']); ?>
        </p>

        <br><br>

        <div class="form-group">
          <h5 class="text-primary">Job Description</h5>
        </div>
        <p><?php echo nl2br(htmlspecialchars($fetch['vacancy_description'])); ?></p>

        <br><br>
      </div>

      <!-- Apply Section -->
      <div class="col-md-3 col-sm-4">
        <div class="contact-form">
          <form action="../process/processapply.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="file" name="cv" id="cv" class="form-control my-3" accept=".pdf" required>
              <span class="text-secondary small">PDF only, max 10MB</span>
            </div>

            <input type="hidden" name="employerid" value="<?php echo htmlspecialchars($fetch['jobVacancy_employerId']); ?>">
            <input type="hidden" name="jobSeekerid" value="<?php echo htmlspecialchars($id); ?>">

            <button type="submit" name="button" value="btn" class="filled-button btn-block">Apply for this job</button>
          </form>
        </div>

        <div class="mt-4">
          <img src="<?= base_url(); ?>/assets/images/product-1-370x270.jpg" alt="Job image" class="img-fluid wc-image">
        </div>

        <br>

        <ul class="social-icons text-center">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-envelope"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          <li><a href="#"><i class="fa fa-behance"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Company Details Section -->
<div class="section">
  <div class="container">
    <div class="row">
      <!-- About Company -->
      <div class="col-md-9">
        <div class="section-heading">
          <h2>About <?php echo htmlspecialchars($fetch['employer_companyName']); ?></h2>
        </div>
        <p class="lead"><i class="fa fa-map-marker"></i> <?php echo htmlspecialchars($fetch['state_name']); ?></p>
        <p><?php echo nl2br(htmlspecialchars($fetch['employer_description'] ?? 'No company information provided.')); ?></p>
      </div>

      <!-- Contact Details -->
      <div class="col-md-3">
        <div class="section-heading">
          <h2>Contact Details</h2>
        </div>

        <div class="left-content">
          <p>
            <span>Name</span><br>
            <strong><?php echo htmlspecialchars($fetch['employer_fullName']); ?></strong>
          </p>
          <p>
            <span>Email</span><br>
            <strong>
              <a href="mailto:<?php echo htmlspecialchars($fetch['employer_email']); ?>">
                <?php echo htmlspecialchars($fetch['employer_email']); ?>
              </a>
            </strong>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Offcanvas Sidebar -->
<div class="offcanvas offcanvas-end myoff" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h3 class="text-center">Account Information</h3>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <hr>

  <div class="image container text-center mb-3" style="width: 200px; height: 200px; border: 1px solid burlywood;">
    <img src="../images/profile.jpeg" alt="profile picture" class="img-fluid">
  </div>

  <ul class="list-unstyled ps-3">
    <li><a href="../employeepage.php">Home</a></li>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a href="view_applications.php">View Applications</a></li>
    <li><a href="usersettings.php">Settings</a></li>
    <li><a href="#">Help</a></li>
  </ul>

  <div class="col-6 ps-3">
    <form action="../process/logout.php" method="post">
      <button class="btn btn-primary m-3">Log Out</button>
    </form>
    <p class="mx-3 text-secondary"><?php echo htmlspecialchars($user_id['jobSeeker_email']); ?></p>
  </div>
</div>

<?php require_once "../partials/footer.php"; ?>
