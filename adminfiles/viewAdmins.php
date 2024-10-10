<?php
session_start();
require_once "admin_guard.php";
?>

<?php
    require_once "partials/admin_header.php";
    require_once "classes/Admin.php";
    $admins = new Admin;
    $fetches = $admins->fetch_admins();
    

   
    
?>
      <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                       <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    ADMINS
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>
                                                S/N
                                            </th>
                                            <th>
                                                User Name
                                            </th>
                                            <th>
                                                Date Last Logged In
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $n=1;
                                            if(!empty($fetches)) {
                                                foreach($fetches as $admin) {
                                            ?>
                                            <tr>
                                                <td><?php echo $n++ ?></td>
                                                <td><?php
                                                    if($admin["admin_id"] == $_SESSION["adminonline"]) {
                                                        echo "<div class='badge bg-success'>Online</div>";
                                                    }
                                                echo $admin['admin_username'] ?></td>
                                                <td><?php echo $admin['dateLastLoggedIn'] ?>
                                                    <p>
                                                        <?php
                                                            $lastdate= strtotime($admin['dateLastLoggedIn']);
                                                            $newdate = time() - $lastdate;
                                                            $din = $newdate/(60*60*24);
                                                            if($din < 1) {
                                                            
                                                            }else{
                                                                $d = explode('.', $din);
                                                                $d = $d[0];                                                       
                                                                echo $d." days ago";
                                                            }
                                                           
                                                        ?>
                                                    </p>
                                                
                                                </td>
                                                <td>
                                                    <form action="update_admin.php" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $admin['admin_id'] ?>">
                                                        <button type="submit" name="update" value="up" class="btn btn-info">Edit</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="delete.php" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $admin['admin_id'] ?>">
                                                        <button type="submit" name="deleteadmin" value="deleteadmin" class="delete btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <?php
                                            }
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
                $(".delete").click(function(event){
                   var confirmation =  confirm("Are you sure you want to delete");
                   if(confirmation==false){
                    event.preventDefault();
                   }
                })

            })
        </script>
    </body>
</html>
