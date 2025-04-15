<?php
    session_start();
    require_once "../classes/User.php";
    require_once "../classes/Employer.php";
    require_once "userguard.php";
     $user = new User;
     if(isset($_SESSION['user_id'])){
         $id = $_SESSION['user_id'];
         $user_id = $user->get_user_by_id($id);
        
     }else{
         header("location:../login.php");
         
     }
     if(!isset($_GET['jid'])){
        header('location:dashboard.php');
        die();
     }
     $jid = $_GET['jid'];
     $emp = new Employer() ;
     $fetch = $emp->fetch_vacancies_for_users_by_id($jid);
     
        if($fetch == false){
            header('location:dashboard.php');
            die();
        }
require_once "../partials/header.php";

?>


<div class="col-1 offset-md-2 mt-2">
                  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <span class="fa-regular fa-user"></span>
                  </button>
                
            </div>

 <!-- Page Content -->
 <div class="page-heading about-heading header-text" style="background-image: url(logos/<?php echo $fetch['employer_companyLogo'] ?>);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4><?php echo $fetch['employer_companyName'] ?> Jobs</h4>

              <h2><?php echo $fetch['jobVacancy_title'] ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-sm-8">
              <p class="lead">
                   <i class="fa fa-map-marker"></i> State: <?php echo $fetch['state_name'] ?><br>Local Government Area: <?php echo $fetch['lga_name'] ?> &nbsp;&nbsp;
                   <i class="fa fa-calendar"></i> <?= date("d-m-Y", strtotime($fetch['dateClosed'])) ?> &nbsp;&nbsp;
                   <i class="fa fa-file"></i> <?php echo $fetch['work_type'] ?>
              </p>

              <br>
              <br>
              
            
              <div class="col">
                <h3 class="text-primary">Description</h3>
                <p><?php echo $fetch['vacancy_description'] ?></p>
              </div>
              <br>
              <br>
          </div>

          <div class="col-md-3 col-sm-4">
            <div class="contact-form">
              <div class="form-group">
              <form action="../process/processapply.php" method="post" enctype="multipart/form-data" >
            <div class="row">
                        <div class="col">
                            <input type="file" name="cv" id="cv" class="form-control my-3">
                            <span class="text-secondary">Choose A file for your CV which must not Be above 10mb. pdf only</span>
                        </div>
                       
                        <input type="hidden" name="employerid" value="<?php echo $fetch['jobVacancy_employerId'] ?>">
                    <input type="hidden" name="jobSeekerid" value="<?php echo $id ?>">     
                    <button type="submit" name="button" type="submit" value="btn" class="filled-button btn-block">Apply for this job</button>
                        </form>
                
              </div>
            </div>

            <div>
              <img src="<?= base_url() ?>/assets/images/product-1-370x270.jpg" alt="" class="img-fluid wc-image">
            </div>

            <br>

            <ul class="social-icons text-center">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-envelope"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>

            <br>
            <br>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="section-heading">
              <h2>About <?php echo $fetch['employer_companyName'] ?></h2>
            </div>

            <p class="lead">
                   <i class="fa fa-map-marker"></i> London 
              </p>

                   </div>

          <div class="col-md-3">
            <div class="section-heading">
              <h2>Contact Details</h2>
            </div>
            
            <div class="left-content">
              <p>
                <span>Name</span>

                <br>

                <strong><?php echo $fetch['employer_fullName'] ?></strong>
              </p>

              <!-- <p>
                <span>Phone</span>

                <br>
                
                <strong>
                  <a href="tel:123-456-789">123-456-789</a>
                </strong>
              </p> -->

              <!-- <p>
                <span>Mobile phone</span>

                <br>
                
                <strong>
                  <a href="tel:456789123">456789123</a>
                </strong>
              </p> -->

              <p>
                <span>Email</span>

                <br>
                
                <strong>
                  <a href="mailto:<?php echo $fetch['employer_email'] ?>"><?php echo $fetch['employer_email'] ?></a>
                </strong>
              </p>
<!-- 
              <p>
                <span>Website</span>

                <br>
                
                <strong>
                  <a href="http://www.cannonguards.com/">http://www.cannonguards.com/</a>
                </strong>
              </p> -->
            </div>
          </div>
        </div>
      </div>
    </div>




    <div class="offcanvas offcanvas-end myoff" tabindex="-1" id="offcanvasExample" aria-h3ledby="offcanvasExampleh3">
        <div class="offcanvas-header">
            <h3 style="text-align: center;">Account Information</h3>        
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-h3="Close"></button>
          </div>
          <hr>
        
        <div class="image ml-5 container" style="width: 200px; height: 200px; border: 1px solid burlywood;">
            <img src="../images/profile.jpeg" alt="profile picture" class="container-fluid">

        </div>
        <ul>
            <li><a href="../employeepage.php">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="view_applications.php">View Applications</a></li>
            <li><a href="usersettings.php">settings</a></li>
            <li><a href="">Help</a></li>
        </ul>
        <div class="col-6">
                <form action="../process/logout.php" method="post"><button class="btn btn-primary m-3">Log Out</button></form><p class="mx-3"><?php echo $user_id['jobSeeker_email']; ?></p>
            </div>
           
       
      </div>
   
    <?php 

    require_once "../partials/footer.php";