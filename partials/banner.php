<?php
require_once "classes/User.php";
$jobcat1 = new User;
$stats = $jobcat1->fetch_state();
$fetchs = $jobcat1->job_cat();


?>

<div class="row banner my-5 justify-content-center">
           <div class="col-12">
            <h1 class="text-light">Find your dream jobs on job solutions</h1>
           </div>
            <div class="col" id="formforsearch">
               <form action="process/processsearch.php" method="post">
                    <div class="row">
                        <div class="col-8 col-md-3 my-2" style="margin-left:10px;">
                            <select name="jobcat" id="jobcat" class="form-select">
                                <option  selected>Job Categories</option>
                                <?php
                                    foreach ($fetchs as $fetch) {
                                ?>
                                <option value="<?php echo $fetch['jobCat_id']?>"><?php echo $fetch['jobCat_name']?></option>
                                <?php
                                    }
                                ?>

                          
                            </select>
                        </div>
                        <div class="col-8 my-2 col-md-3">
                            <select name="state" style="margin-left:10px;" id="jobind" class="form-select">
                                <option value="Main" selected>State</option>
                                <?php
                                    foreach ($stats as $fetch) {
                                ?>
                                <option value="<?php echo $fetch['state_id']?>"><?php echo $fetch['state_name']?></option>
                                <?php
                                    }
                                ?>
                         
                            </select>
                        </div>
                        <div style="margin-left:10px;" class=" my-2 col-8 col-md-3">
                            <input type="text" name="jobname" id="jobname" class="form-control" placeholder="Job Name">
                        </div>
                        <div class="col-8 my-2 col-md-1">
                            <button class="btn btn-primary " name="searchbtn" value="search" id="searchbtn1" style="background-color: aliceblue;color: blue;">Search</button>
                        </div>
                    </div>
               </form>
            </div>
        </div>