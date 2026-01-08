<?php
session_start();
require_once "admin_guard.php";
if(!$_POST['update']){
    $_SESSION['erroemsg'] = 'Click On update To access this page';
    header('location:../viewAdmins.php');
}
?>


<?php
    require_once "partials/admin_header.php";
    require_once "classes/Admin.php";
    $admin = new Admin;
    $fetches = $admin->fetch_admins_by_id($_POST['id']);
    
   
    
?>
      <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Add Admin</li>
                        </ol>
                        <div class="row">
                            <?php
 if(isset($_SESSION["errormsg"])){
    echo "<div class='alert alert-danger'>".$_SESSION["errormsg"]."</div>";
    unset($_SESSION["errormsg"]);
}

                            ?>
                            <div class="row justify-content-center">
                                <div class="col-8">
                                    <h3 class="text-warning">Update Admin</h3>
                                    <form action="process/process_updateAdmin.php" method="post" class="form-control">
                                        <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="username" id="" class="form-control" value="<?php echo $fetches['admin_username'] ?>">
                                            <label for="username">Enter Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="password" id="" class="form-control">
                                            <label for="username">Update Password</label>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="update" value="update" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        
                        
                    </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="../jquery-3.7.1.min.js"></script>
        <script>
            $(function(){
                //$("#showjobseeker").hide();
                $("#jobseekers").click(function(event){
                    event.preventDefault();
                   // alert("Hello World")
                   $(".showjobseeker").slideToggle();
                   $(".showjobseeker").siblings().hide()
                    
                })
                $("#employers").click(function(event){
                    event.preventDefault();
                   // alert("Hello World")
                   $(".showemployers").slideToggle();
                   $(".showemployers").siblings().hide()
                    
                })
                $("#applications").click(function(event){
                    event.preventDefault();
                   // alert("Hello World")
                   $(".applications").slideToggle();
                   $(".applications").siblings().hide()
                    
                })

            })
        </script>
    </body>
</html>
