
<?php
    session_start();
    require_once "userguard.php";
    require_once "../classes/Employer.php";
    require_once "../classes/User.php";
    $employer = new Employer;
    $user3 = new User;
    $user = $employer->get_user_by_id($_SESSION['useronline']);  
    if($_POST['details']){
        $id = $_POST['id'];
        $app_id = $_POST['app_id'];
    }else{
        header("location:viewapplications.php");
    }
    $cv = $employer->fetch_applications_by_id($app_id);
  
    $fetch = $user3->get_user_by_id($id);
    // $scan = scandir('../applicationfiles');
    // foreach($scan as $s){
    //     echo $s = $cv['application_CV'] ? $s : "";
    //   }
    //var_dump($scan);
 
   // $fetchapplications = $employer->fetch_applications($_SESSION['useronline']);
    
    require_once "partials/header.php";


?>

        <div class="row"> 
            <div class="col-2"> <a href="applications.php" class="btn btn-warning">Go Back</a></div>
            <div class="col-8 mt-5 card">
                <div id="view"></div>
           
                <div class="card-header">
                    <i class="fa fa-user"></i>
                    <h3 class="text-primary">
                         Details
                    </h3>
                </div>
                <div class="card-body">
                    <h3 class="text-success">
                        Full Name: <?php echo $fetch['jobSeeker_firstName']." ". $fetch['jobSeeker_lastName'] ?>
                    </h3>
                    <h3 class="text-success">
                        Email: <?php echo $fetch['jobSeeker_email'] ?>
                    </h3>
                    <h3 class="text-success">
                        Phone Number:  <?php echo $fetch['jobSeeker_phone'] ?>
                    </h3>
                    <h3 class="text-success">
                        Address:  <?php echo $fetch['jobSeeker_Address'] ?>
                    </h3>
                    <h3 class="text-success">
                        Qualification: <?php echo $fetch['jobSeeker_qualification'] ?>
                    </h3>
                    <h3 class="text-success">
                        Experience: <?php echo $fetch['jobSeeker_experience'] ?>
                    </h3>


                    <div class="my-2">
                    <?php $stats = $cv['application_status'] ;
                                        if($stats == 0){
                                            echo '<div  class="badge bg-warning">Pending</div>';
                                        }elseif($stats == 1){
                                            echo '<div class="badge bg-danger">Not accepted</div>';
                                        }elseif($stats == 2){
                                            echo '<div class="badge bg-success">Approved</div>';
                                        }
                                    
                                    ?>
                    </div>
                    <?php 
                     $stats = $cv['application_status'] ;
                    if($stats==0){
                        ?>
                    <form id="stats" action="">
                        <input type="hidden" name="id" value="<?php echo $fetch['jobSeeker_id']?>">
                           <div class="row">
                            <div class="col">
                                <label for="">Accept Application</label>
                            <input type="radio" name="stats" value="2"  data-bs-toggle="modal" data-bs-target="#exampleModal2" class="form-check-input" id="">
                            </div>
                           </div>
                           <div class="row">
                            <div class="col">
                                <label for="">Reject Application</label>
                            <input type="radio" name="stats" value="1" class="form-check-input" id="">
                            </div>
                           </div>
                    </form>
                    <?php 
                    }
                    ?>
                    
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" name="application" value="application" class="cava btn btn-warning noround">View CV</button>
                      
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Applicant Resume</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <embed class="container" height="300" src='../applicationfiles/<?php echo $cv['application_CV'] ?>' alt="">
      </div>
      
      <div class="modal-footer">
      <a href="../applicationfiles/<?php echo $cv['application_CV'] ?>" download="<?php echo $cv['application_CV'] ?>" class="btn btn-warning"><span class="fa fa-arrow-down"></span>Download</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Schedule interview</h5>
        <p>Cancel the modal if not interested in scheduling apointments here</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
            <form action="process/schedule.php" method="post">
                <input type="hidden" name="emp_id" value="<?php $user['employer_id'] ?>" >
                <input type="hidden" name="application_id" value="<?php echo $app_id ?>" >
                <div class="row">
                    <div class="col-md-2"><label for="">Company Location</label></div>
                    <div class="col-md-10"><input required type="text" name="location" id="" class="form-control"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"><label for="">Interview Date</label></div>
                    <div class="col-md-10"><input required type="date" name="date" id="" class="form-control"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"><label for="">Interview Time</label></div>
                    <div class="col-md-10"><input required type="time" name="time" id="" class="form-control"></div>
                </div>
                <div class="row">
                    <div class="col-12"><button type="submit" name="submit" value="submit" class="btn btn-primary">Schedule</button></div>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<?php
    require_once "partials/footer.php";

?>





