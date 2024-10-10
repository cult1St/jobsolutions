<?php
session_start();
require_once "admin_guard.php";
?>

<?php
    require_once "partials/admin_header.php";
    require_once "classes/Admin.php";
    $admin = new Admin;
    $fetches = $admin->fetch_users();
    $employers = $admin->fetch_employers();
    $applications = $admin->fetch_applications();

   
    
?>
      <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <?php
 if(isset($_SESSION["errormsg"])){
    echo "<div class='alert alert-danger'>".$_SESSION["errormsg"]."</div>";
    unset($_SESSION["errormsg"]);
}
if(isset($_SESSION["feedback"])){
    echo "<div class='alert alert-success'>".$_SESSION["feedback"]."</div>";
    unset($_SESSION["feedback"]);
}
                            ?>
                            <div id="msg"></div>
                            <div class="col-xl-3 col-md-6">
                                
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">List of Job Seekers</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a id="jobseekers" class="small text-white stretched-link" href="">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">List Of Employers</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link " id="employers" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">List Of Applications</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a id="applications" class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                         <div class="row">
                            <div class="showjobseeker" style="display: none;">
                                <div class="card">
                                    <div class="card-header">
                                       <h2 class="text-secondary"> Job Seekers</h2>
                                    </div>
                                    <div class="card-body table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        S/N
                                                    </th>
                                                    <th>
                                                        NAME
                                                    </th>
                                                    <th>
                                                        Email
                                                    </th>
                                                    <th>
                                                        Phone
                                                    </th>
                                                    <th>
                                                        State
                                                    </th>
                                                    <th>
                                                        Address
                                                    </th>
                                                    <th>
                                                        Qualification
                                                    </th>
                                                    <th>
                                                        Experience
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $n=1;
                                                    foreach ($fetches as $fetch){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $n++ ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['jobSeeker_firstName']." ". $fetch['jobSeeker_lastName'] ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['jobSeeker_email'] ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['jobSeeker_phone'] ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['state_name'] ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['jobSeeker_Address'] ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['jobSeeker_qualification'] ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['jobSeeker_experience'] ?>
                                                    </td>
                                                    <td>
                                                        <form action="delete.php" id="employ" method="post" >
                                                            <input type="hidden" name="id" value="<?php echo $fetch['jobSeeker_id'] ?>">
                                                            <button type="submit" name="delete" value="delete" class="delete btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="showemployers" style="display: none;">
                                <div class="card">
                                    <div class="card-header">
                                       <h2 class="text-secondary"> Employers</h2>
                                    </div>
                                    <div class="card-body table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                <th>
                                                        S/N
                                                    </th>
                                                    <th>
                                                        NAME
                                                    </th>
                                                    <th>
                                                        Email
                                                    </th>
                                                    <th>
                                                       Company Name
                                                    </th>
                                                    <th>
                                                       State
                                                    </th>
                                                    <th>
                                                        Company Logo
                                                    </th>
                                                    <th>
                                                        Date and Time Registered
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $n=1;
                                                    foreach ($employers as $fetch) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $n++ ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['employer_fullName'] ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['employer_email'] ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['employer_companyName'] ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['state_name'] ?>
                                                    </td>
                                                    <td>
                                                    <img src="../logos/<?php echo $fetch['employer_companyLogo'] ?>" alt="" style="width: 100px;height: 100px;">
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['dateRegistered'] ?>
                                                    </td>
                                                    <td class="col-2">
                                                        <form enctype="multipart/form-data" action="" class="pp" method="post" >
                                                            <input type="hidden" name="id" value="<?php echo $fetch['employer_id'] ?>">
                                                            <input <?php echo $fetch['status']==1 ? "checked" : "" ?> type="radio" name="status" id="status" value="1" class="form-check-input">Enable
                                                           <p><input style="float: left;" <?php echo $fetch['status']==0 ? "checked" : "" ?> type="radio" name="status" id="status" value="0" class="form-check-input">Disable</p>
                                                        </form>
                                                    </td>
                                                </tr>

                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="applications" style="display: none;">
                                <div class="card">
                                    <div class="card-header">
                                       <h2 class="text-secondary">Job Applications</h2>
                                    </div>
                                    <div class="card-body table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                <th>
                                                        S/N
                                                    </th>
                                                    <th>
                                                        Vacancy Name
                                                    </th>
                                                    <th>
                                                        Date Applied
                                                    </th>
                                                    <th>
                                                       Company Name
                                                    </th>
                                                    <th>
                                                        Date and Time Registered
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $n=1;
                                                    foreach ($applications as $fetch) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $n++ ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['jobVacancy_title'] ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['date_applied'] ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['employer_companyName'] ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $fetch['dateRegistered'] ?>
                                                    </td>
                                                    <td>
                                                        <form action="delete.php" method="post" >
                                                            <input type="hidden" name="id" value="<?php echo $fetch['application_id'] ?>">
                                                            <button type="submit" name="deleteapp" value="delete" class="delete btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
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
                            <div class="text-muted">Copyright &copy; <i>My Job Solutions</i>  <?php print date("Y") ?></div>
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
               $(".pp").change(function(event){
                event.preventDefault();
                var formData = new FormData(this);
           $.ajax({
            url: "process/disableserver.php",
            method: "post",
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            cache: false,
            success: function(res){
                       if(res.success==true){
                        $("#msg").show()
                        $("#msg").addClass("alert")
                        $("#msg").removeClass("alert-danger")
                        $("#msg").addClass("alert-success")
                        $("#msg").html(res.msg)
                       }else{
                        $("#msg").show()
                        $("#msg").addClass("alert")
                        $("#msg").removeClass("alert-success")
                        $("#msg").addClass("alert-danger")
                        $("#msg").html(res.msg)
                       }
                    }
                })
               })
                

            })
        </script>
        <script>
             
        </script>
    </body>
</html>
