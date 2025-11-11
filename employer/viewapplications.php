<?php
session_start();
require_once "userguard.php";
require_once "../classes/Employer.php";

$employer = new Employer;
$user = $employer->get_user_by_id($_SESSION['useronline']);
$fetchs = $employer->fetch_vacancies($_SESSION['useronline']);

$active = 'viewapplications';
require_once "partials/header.php";
?>

<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Page Header -->
  <div class="row mb-4">
    <div class="col">
      <h4 class="fw-bold text-primary mb-1">Your Job Applications</h4>
      <p class="text-muted">View applications for your posted jobs.</p>
    </div>
  </div>

  <!-- Feedback Messages -->
  <?php if (isset($_SESSION["errormsg"])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= $_SESSION["errormsg"]; unset($_SESSION["errormsg"]); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <?php if (isset($_SESSION["feedback"])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $_SESSION["feedback"]; unset($_SESSION["feedback"]); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <!-- Applications Table -->
  <div class="card shadow-sm border-0">
    
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="bx bx-user-pin"></i> Job Listings</h5>
     
    </div>

    <div class="card-body">
      <?php if (!empty($fetchs)): ?>
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Job Title</th>
                <th>Qualification</th>
                <th>Work Type</th>
                <th>Applications</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php $n = 1; foreach ($fetchs as $fetch): ?>
                <tr>
                  <td><?= $n++; ?></td>
                  <td class="fw-semibold text-dark"><?= htmlspecialchars($fetch['jobVacancy_title']); ?></td>
                  <td><?= htmlspecialchars($fetch['qualification']); ?></td>
                  <td><span class="badge bg-label-info"><?= htmlspecialchars($fetch['work_type']); ?></span></td>

                  <!-- Count Applications -->
                  <td>
                    <?php 
                      $count = $employer->count_applications($fetch['jobVacancy_id']);
                      echo "<span class='badge bg-label-primary'>$count Applicants</span>";
                    ?>
                  </td>

                  <!-- Job Status -->
                  <td>
                    <?php
                      $exp_date = strtotime($fetch['dateClosed']);
                      $today_date = strtotime(date('Y-m-d'));
                      if ($today_date > $exp_date) {
                        echo '<span class="badge bg-danger">Expired</span>';
                      } else {
                        echo '<span class="badge bg-success">Active</span>';
                      }
                    ?>
                  </td>

                  <!-- Action Buttons -->
                  <td class="text-center">
                    <div class="btn-group" role="group">
                      <!-- Edit Job -->
                      <form action="editjob.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value="<?= $fetch['jobVacancy_id']; ?>">
                        <button type="submit" class="btn btn-sm btn-outline-primary" name="editbtn" title="Edit Job">
                          <i class="bx bx-edit-alt"></i>
                        </button>
                      </form>

                      <!-- Delete Job -->
                      <form action="../adminfiles/delete.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value="<?= $fetch['jobVacancy_id']; ?>">
                        <button type="submit" class="btn btn-sm btn-outline-danger" name="deleteapp2" title="Delete Job">
                          <i class="bx bx-trash"></i>
                        </button>
                      </form>

                      <!-- View Applications -->
                      <form action="applications.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value="<?= $fetch['jobVacancy_id']; ?>">
                        <button type="submit" name="application" class="btn btn-sm btn-outline-warning" title="View Applicants">
                          <i class="bx bx-user-pin"></i> View
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <div class="alert alert-info mb-0" role="alert">
          You haven’t posted any jobs yet. <a href="uploadjob.php" class="alert-link">Click here to post one</a>.
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php require_once "partials/footer.php"; ?>
