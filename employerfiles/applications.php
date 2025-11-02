<?php
session_start();
require_once "userguard.php";
require_once "../classes/Employer.php";

$employer = new Employer;
$user = $employer->get_user_by_id($_SESSION['useronline']);  

require_once "partials/header.php";

if (isset($_POST['application'])) {
    $id = $_POST['id'];
    $fetchs = $employer->fetch_applications($_SESSION['useronline'], $id);
} else {
    header('location:viewapplications.php');
    exit();
}
?>

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary"><i class="bx bx-file"></i> Job Applications</h4>
    <a href="viewapplications.php" class="btn btn-outline-warning">
      <i class="bx bx-arrow-back me-1"></i> Go Back
    </a>
  </div>

  <div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="bx bx-user-pin"></i> Applications</h5>
      <div class="d-flex align-items-center gap-2">
        <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Search by name...">
        <i class="bx bx-search text-muted"></i>
      </div>
    </div>

    <div class="table-responsive text-nowrap">
      <table class="table table-hover" id="applicationsTable">
        <thead class="table-light">
          <tr>
            <th>S/N</th>
            <th>Applicant Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $n = 1;
          foreach ($fetchs as $fetch) {
          ?>
          <tr>
            <td><?php echo $n++; ?></td>
            <td><?php echo htmlspecialchars($fetch['jobSeeker_firstName'] . " " . $fetch['jobSeeker_lastName']); ?></td>
            <td>
              <form action="details.php" method="post" onsubmit="return confirmView();">
                <input type="hidden" name="id" value="<?php echo $fetch['jobSeeker_id']; ?>">
                <button type="submit" name="details" value="details" class="btn btn-sm btn-warning">
                  <i class="bx bx-show"></i> View Details
                </button>
              </form>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
// ====== JS Enhancements ======

// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
  const searchValue = this.value.toLowerCase();
  const rows = document.querySelectorAll('#applicationsTable tbody tr');
  rows.forEach(row => {
    const nameCell = row.cells[1].textContent.toLowerCase();
    row.style.display = nameCell.includes(searchValue) ? '' : 'none';
  });
});

// Confirmation before viewing
function confirmView() {
  return confirm('View this applicant’s details?');
}
</script>

<?php require_once "partials/footer.php"; ?>
