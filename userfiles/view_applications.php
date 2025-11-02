<?php
    session_start();
    require_once "../classes/User.php";
    require_once "userguard.php";
     $user = new User;
     if(isset($_SESSION['user_id'])){
         $id = $_SESSION['user_id'];
         $user_id = $user->get_user_by_id($id);
        
     }else{
         header("location:../login.php");
         
     }
     require_once "../classes/Employer.php";
     $employer = new Employer;
     $fetchs = $employer->fetch_applications_for_users($id);
     

     $active = 'applications';
     require_once 'partials/header.php';

?>


        <?php
        if(isset($_SESSION['feedback'])){
            echo '<div class="alert alert-success">'.$_SESSION['feedback'].'</div>';
            unset($_SESSION['feedback']);
        }
        if(isset($_SESSION['errormsg'])){
            echo '<div class="alert alert-danger">'.$_SESSION['errormsg'].'</div>';
            unset($_SESSION['errormsg']);
        }

        ?>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <span class="fa fa-table"></span>
                        <h2 class="text-warning">View Applications</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Job Post</th>
                                    <th>Company Name</th>
                                    <th>Date Applied</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(isset($fetchs)){
                                    $n=1;
                                    foreach($fetchs as $fetch){
                                ?>
                                <tr>
                                    <td><?php echo $n++ ?></td>
                                    <td><?php echo $fetch['jobVacancy_title'] ?></td>
                                    <td><?php echo $fetch['employer_companyName'] ?></td>
                                    <td><?php echo $fetch['date_applied'] ?></td>
                                    <td><?php $stats = $fetch['application_status'] ;
                                        if($stats == 0){
                                            echo '<div  class="badge bg-warning">Pending</div>';
                                        }elseif($stats == 1){
                                            echo '<div class="badge bg-danger">Not accepted</div>';
                                        }elseif($stats == 2){
                                            echo '<div class="badge bg-success">Approved</div>';
                                        }
                                    
                                    ?>
                                
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
      


        <?php 

        require_once 'partials/footer.php';