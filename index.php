<?php
require_once "classes/Employer.php";
    $employer = new Employer;
    $fetchss = $employer->fetch_vacancies_for_users();
    require_once "partials/header.php";
    require_once "partials/banner.php";
   
?>

      
        <div class="row find my-5">
            <div class="col-12 col-md-6 p-2">
                <h1 class="text-info">
                    Tired of looking around for jobs,Job Solutions is there for you. Just search for the right job that suits your career.
                </h1>
                <?php  
                if(!isset($_SESSION['user_id'])){
                    ?>
                       <h2>
                    Register if you don't have an account
                </h2> 
                <a href="login.php" class="btn btn-primary pb-3">Register</a>
                    <?php 
                }
                ?>
               
            </div>
            <div class="col-12 col-md-5 m-3" >
                <img src="images/jobs.jpeg" alt="jobimg" class="container">
            </div>
        </div>
        <div class="row mx-3 my-3">
            <?php
            if(isset($_SESSION['searchmsg'])){
                echo '<div class="badge bg-info">'.$_SESSION['searchmsg'].'</div>';
                unset($_SESSION['searchmsg']);
            }

            ?>
                <h3 class="text-info">
                    Available jobs
                </h3>
                <?php
                if(isset($fetchss) && !empty($fetchss)){
             
                foreach ($fetchss as $fetch) {
                ?>
                
                <div class="col-4 col-md-4 my-1" style="border: 1px solid grey">
            <h3 style="text-align: center;"><?php echo $fetch['employer_companyName'] ?></h3>
            <label for="">Role</label>
            <input type="text" disabled class="form-control" value="<?php echo ucfirst($fetch['jobVacancy_title']) ?>">
            <label for="">Qualification</label>
            <input type="text" disabled class="form-control" value="<?php echo ucfirst($fetch['qualification']) ?>">
            <p>Signup or login in order to apply</p>
            <a href="login.php" class="btn btn-primary mx-5">Apply</a>
        </div>
                <?php
                }
            }
                ?>
           
        </div>
        <div class="row employers my-5" style="background-color: rgb(65, 147, 218);">
            <div class="col-12 col-md-5 m-1 my-3">
                <img src="images/employ.jpeg" alt="jobimg" class="container-fluid">
            </div>
            <div class="col-12 col-md-6 p-3">
                <h3 class="text-secondary">For employers</h3>
                <h1>Are you an employer seeking for the right employees</h1>
                <p>Click the link Below to Go to the employer section</p>
                <a href="employer.php" class="btn btn-light">Learn More</a>
            </div>
        </div>
        <div class="row hero my-5">
            <h2 style="text-align: center;">Job Categories Available</h2>
          <?php 
    $cats = $employer->fetch_categories();
            foreach($cats as $cat){
          ?>
       <div class="col-md-4">
        <a href="categories.php?id=<?php  echo $cat['jobCat_id'] ?>"><?php echo $cat['jobCat_name'] ?></a>
       </div>
        <?php
            }
           
            require_once "partials/footer.php";
        ?>