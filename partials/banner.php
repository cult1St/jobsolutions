<?php
require_once "classes/User.php";
$jobcat1 = new User;
$stats = $jobcat1->fetch_state();
$fetchs = $jobcat1->job_cat();


?>
<!-- 
<div class="row banner my-5">
           <div class="col-12">
            <h1 class="text-light">Find your dream jobs on job solutions</h1>
           </div>
            <div class="col" id="formforsearch">
               <form action="process/processsearch.php" method="post">
                    <div class="row">
                        <div class="col " style="margin-left:10px;">
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
                        <div class="col">
                            <select name="state" id="jobind" class="form-select">
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
                        <div class="col">
                            <input type="text" name="jobname" id="jobname" class="form-control" placeholder="Job Name">
                        </div>
                        <div class="col">
                            <button class="btn btn-primary " name="searchbtn" value="search" id="searchbtn1" style="background-color: aliceblue;color: blue;">Search</button>
                        </div>
                    </div>
               </form>
            </div>
        </div> -->


        <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Find your Dream Job today!</h4>
            <h2>Get Your dream jobs on job solutions</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Get potential empoloyees</h4>
            <h2>Get Your Potentials Employees On Job Soloutions</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Latest News</h4>
            <h2>Browse and get inspired by our latest blogs</h2>
          </div>
        </div>
      </div>
    </div>