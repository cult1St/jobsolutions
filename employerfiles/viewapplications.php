
<?php
    session_start();
    require_once "userguard.php";
    require_once "../classes/Employer.php";
    $employer = new Employer;
    $user = $employer->get_user_by_id($_SESSION['useronline']);  
    $fetchs = $employer->fetch_vacancies($_SESSION['useronline']);
   //$fetchapplications = $employer->fetch_applications($_SESSION['useronline']);
    
    require_once "partials/header.php";



?>

        <!-- <div class="row">
            <div class="col card">
                <div class="card-header">
                    <i class="fa fa-table"></i>
                    <h3 class="text-primary">
                        Job Applications
                    </h3>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="row"> -->
            <div class="col mt-5 card">
                <div>
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
                </div>
                <div class="card-header">
                    <i class="fa fa-table"></i>
                    <h3 class="text-primary">
                        Job Posted
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                           <tr>
                            <th>
                                S/N
                            </th>
                            <th>
                                Role
                            </th>
                            <th>
                                Qualification
                            </th>
                            <th>
                                Salary Range
                            </th>
                            <th>
                                Work Type
                            </th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n=1;
                            foreach ($fetchs as $fetch) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $n++ ?>
                                </td>
                                <td>
                                    <?php echo $fetch['jobVacancy_title'] ?>
                                </td>
                                <td>
                                <?php echo $fetch['qualification'] ?>
                                </td>
                                <td>
                                <?php echo $fetch['vacancy_salaryRange'] ?>
                                </td>
                                <td>
                                <?php echo $fetch['work_type'] ?>
                                </td>
                                <td>
                                    <form action="editjob.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fetch['jobVacancy_id']?>">
                                        <button type="submit" class="btn btn-primary" name="editbtn" value="editbtn">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="../adminfiles/delete.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fetch['jobVacancy_id'] ?>">
                                       
                                        <button type="submit" class="btn btn-danger" name="deleteapp2" value="deletebtn">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="applications.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fetch['jobVacancy_id']?>">
                                        <button type="submit" name="application" value="application" class="btn btn-warning noround">Applications</button>
                                    </form>
                                </td>
                                <td>
                                    <?php
                                         $exp_date = $fetch['dateClosed'];
                                         $today_date = date('Y-m-d');
                                         $exp_date = strtotime($exp_date);
                                         $today_date = strtotime($today_date);
                                         if($today_date>$exp_date){
                                            echo "<div class='badge bg-danger'>Expired</div>";
                                         }else{
                                            echo "<div class='badge bg-success'>Active</div>";
                                         }
                                    ?>
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

    


<?php
    require_once "partials/footer.php";

?>





