<?php
session_start();
require_once "admin_guard.php";
?>

<?php
    require_once "partials/admin_header.php";
    require_once "classes/ORM.php";
    
    $contacts = ORM::table('contact')->orderBy('created_at', 'desc')->get();
    $page_title = 'View Contacts';
    
?>
      <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Contact Messages</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact Messages</li>
                        </ol>
                       <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-envelope me-1"></i>
                                    All Contact Messages
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Date Received</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $n=1;
                                            if(!empty($contacts)) {
                                                foreach($contacts as $contact) {
                                            ?>
                                            <tr>
                                                <td><?php echo $n++ ?></td>
                                                <td><?php echo htmlspecialchars($contact['name']) ?></td>
                                                <td><?php echo htmlspecialchars($contact['email']) ?></td>
                                                <td><?php echo htmlspecialchars($contact['subject']) ?></td>
                                                <td><?php echo htmlspecialchars($contact['message']) ?></td>
                                                <td><?php echo date('M d, Y H:i', strtotime($contact['created_at'])) ?></td>
                                            </tr>
                                            <?php
                                                }
                                            } else {
                                            ?>
                                            <tr>
                                                <td colspan="6" class="text-center">No contact messages found.</td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       </div>
                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; JobSolutions 2024</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script>
            window.addEventListener('DOMContentLoaded', event => {
                const datatable = document.querySelector('.table');
                if (datatable) {
                    new simpleDatatables.DataTable(datatable);
                }
            });
        </script>
    </body>
</html>