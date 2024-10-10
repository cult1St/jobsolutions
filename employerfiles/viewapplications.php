
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
                <div class="table-responsive">
  <table class="table align-middle">
                        <thead >
                           <tr>
                            <th scope="col">
                                S/N
                            </th>
                            <th  scope="col">
                                Role
                            </th>
                            <th  scope="col">
                                Qualification
                            </th>
                            <th  scope="col">
                                Salary Range
                            </th>
                            <th  scope="col">
                                Work Type
                            </th>
                            <th  scope="col">
                               Requirements
                            </th>
                            <th  scope="col">
                              Actions
                            </th>
                            <th  scope="col">
                                Status
                            </th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n=1;
                            foreach ($fetchs as $fetch) {
                                $req = $employer->fetch_requirements($fetch['jobVacancy_id']);
                            //   echo "<pre>";
                            //   var_dump($req);
                            //   echo "</pre>";
                            
                            ?>
                            <tr>
                                <td scope="row" colspan="1">
                                   <!-- <strong class="hidden@l">S/N</strong> -->
                                    <?php echo $n++ ?>
                                </td>
                                <td colspan="1">
                                    <?php echo $fetch['jobVacancy_title'] ?>
                                </td>
                                <td colspan="1" >
                                <?php echo $fetch['qualification'] ?>
                                </td>
                                <td colspan="1">
                                <?php echo $fetch['vacancy_salaryRange'] ?>
                                </td>
                                <td colspan="1">
                                <?php echo $fetch['work_type'] ?>
                                </td>
                                <td colspan="1">
                                <?php 
                                    if(!empty($req)){
                                        foreach($req as $r){
                                            $text = $r['req_text'];
                                            echo "<span class='m-2'>$text</span>";
                                        }
                                    }else{
                                        echo "No requirements";
                                    }
                                ?>
                                </td>
                                <td colspan="1">
                                    <form  class="form-control" action="editjob.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fetch['jobVacancy_id']?>">
                                        <button type="submit" class="btn btn-primary" name="editbtn" value="editbtn">Edit</button>
                                    </form>
                                    
                                    <form class="form-control" action="../adminfiles/delete.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fetch['jobVacancy_id'] ?>">
                                       
                                        <button type="submit" class="btn btn-danger" name="deleteapp2" value="deletebtn">Delete</button>
                                    </form>
                                    <form  class="form-control" action="applications.php" method="post">
                                        
                                        <input type="hidden" name="id" value="<?php echo $fetch['jobVacancy_id']?>">
                                        <button type="submit" name="application" value="application" class="btn btn-warning noround">Applications</button>
                                    </form>
                                </td>

                                <td colspan="1">
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
        </div>

    


<?php
    require_once "partials/footer.php";

?>





