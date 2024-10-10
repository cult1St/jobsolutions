<?php
    session_start();
    require_once "userguard.php";
    require_once "../classes/Employer.php";
    $employer = new Employer;
    $user = $employer->get_user_by_id($_SESSION['useronline']);  

    $fetchs = $employer->fetch_vacancy($_SESSION['useronline']);
    
    require_once "partials/header.php";
if(isset($_SESSION['feedback'])){
    echo '<div class="alert alert-success">'.$_SESSION['feedback'].'</div>';
    unset($_SESSION['feedback']);
}

?>

        <div class="row">
            <div class="col">
                <h3 class="text-primary">
                    Details
                </h3>
                <p class="text-secondary">
                    Full Name : <?php echo $user['employer_fullName'] ?>
                </p>
                <p class="text-secondary">
                    Company  Name : <?php echo $user['employer_companyName'] ?>
                </p>
                <p class="text-secondary">
                    Email : <?php echo $user['employer_email'] ?>
                </p>
                <p class="text-secondary">
                    Company Logo: <img src="" alt="">
                </p>
                <p class="text-secondary">
                    Data registered: <?php echo $user['dateRegistered'] ?>
                </p>
                <p class="text-secondary">
                    Specialization: 
                </p>
            </div>
            <div class="col">
                <h3 class="text-info">
                    Recent Uploads
                </h3>
               
                <div class="recent card card-body">
                    <?php
                    if(!empty($fetchs)){
                        
                    
                    ?>
                    <img src="../logos/<?php echo $fetchs['employer_companyLogo'] ?>" alt="" style="width: 100px;height: 100px;">
                    <h3 style="text-align: center;"><?php echo $fetchs['employer_companyName'] ?></h3>
                    <label for="">Role</label>
                    <input type="text" disabled class="form-control" value="<?php echo $fetchs['jobVacancy_title'] ?>">
                    <label for="">Qualification</label>
                    <input type="text" disabled class="form-control" value="<?php echo $fetchs['qualification'] ?>">
                    <p>Salary Range= <?php echo $fetchs['vacancy_salaryRange'] ?></p>
                    <p><?php echo $fetchs['work_type'] ?></p>
                    <?php
                    }else{
                        echo "No jobs posted";
                    }
                    ?>
                </div>
                
            </div>
        </div>


    <?php   
    require_once "partials/footer.php";


?>










   