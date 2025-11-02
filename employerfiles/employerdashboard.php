<?php
session_start();
require_once "userguard.php";
require_once "../classes/Employer.php";

$employer = new Employer;
$user = $employer->get_user_by_id($_SESSION['useronline']);  
$fetchs = $employer->fetch_vacancy($_SESSION['useronline']);

$active = 'dashboard';
require_once "partials/header.php";

if (isset($_SESSION['feedback'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'
        . $_SESSION['feedback'] .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['feedback']);
}
?>

<!-- Employer Dashboard -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="fw-bold text-primary">Welcome, <?= htmlspecialchars($user['employer_fullName']) ?></h4>
            <p class="text-muted mb-0">Here’s a quick overview of your account and job postings.</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Employer Info Card -->
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Company Profile</h5>
                    <i class="bx bx-buildings fs-4"></i>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img src="../logos/<?= $user['employer_companyLogo'] ?: 'default-logo.png' ?>" 
                             alt="Company Logo" 
                             class="rounded-circle border" 
                             style="width: 90px; height: 90px; object-fit: cover;">
                    </div>
                    <p><strong>Company Name:</strong> <?= htmlspecialchars($user['employer_companyName']) ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($user['employer_email']) ?></p>
                    <p><strong>Date Registered:</strong> <?= date("F j, Y", strtotime($user['dateRegistered'])) ?></p>
                    <p><strong>Specialization:</strong> <?= $user['specialization'] ?? '<em>Not specified</em>' ?></p>
                </div>
            </div>
        </div>

        <!-- Recent Job Uploads Card -->
        <div class="col-md-6 col-lg-7">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-info text-white d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Recent Job Postings</h5>
                    <i class="bx bx-briefcase fs-4"></i>
                </div>
                <div class="card-body">
                    <?php if (!empty($fetchs)): ?>
                        <div class="d-flex align-items-center mb-3">
                            <img src="../logos/<?= $fetchs['employer_companyLogo'] ?>" 
                                 alt="Company Logo" 
                                 class="rounded me-3" 
                                 style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <h6 class="fw-bold mb-1"><?= htmlspecialchars($fetchs['jobVacancy_title']) ?></h6>
                                <span class="badge bg-label-primary"><?= htmlspecialchars($fetchs['qualification']) ?></span>
                                <span class="badge bg-label-success"><?= htmlspecialchars($fetchs['work_type']) ?></span>
                            </div>
                        </div>
                        <p class="mb-1"><strong>Salary Range:</strong> <?= htmlspecialchars($fetchs['vacancy_salaryRange']) ?></p>
                        <p class="text-muted small mb-0">Posted on <?= date("F j, Y", strtotime($fetchs['datePosted'])) ?></p>
                        <a href="viewapplications.php" class="btn btn-outline-info btn-sm mt-3">
                            <i class="bx bx-show-alt me-1"></i> View Applications
                        </a>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <i class="bx bx-briefcase-alt-2 fs-1 text-muted mb-2"></i>
                            <p class="text-muted">You haven’t posted any jobs yet.</p>
                            <a href="uploadjob.php" class="btn btn-primary btn-sm">
                                <i class="bx bx-upload me-1"></i> Upload Job
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "partials/footer.php"; ?>
