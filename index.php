<?php
require_once "classes/Employer.php";
    $employer = new Employer;
    require_once "classes/User.php";
    $user = new User;
    $fetchss = $employer->fetch_vacancies_for_users();
    require_once "partials/header.php";
    require_once "partials/banner.php";
   
?>

      
        <div class="row find my-5">
            <div class="col-12 col-md-6 p-2">
                <h1 class="text-info">
                    Tired of looking around for jobs,Job Solutions is there for you. Just search for the right job that suits your career.
                </h1>
                <h2>
                    Register if you don't have an account
                </h2>
                <a href="login.php" class="btn btn-primary pb-3">Register</a>
            </div>
            <div class="col-12 col-md-5 m-3" >
                <img src="images/jobs.jpeg" alt="jobimg" class="container">
            </div>
        </div>
        <!-- <div class="row mx-3 my-3">
            <?php
            if(isset($_SESSION['searchmsg'])){
                echo '<div class="badge bg-info">'.$_SESSION['searchmsg'].'</div>';
                unset($_SESSION['searchmsg']);
            }

            ?>
                <h3 class="text-info">
                    Available jobs
                </h3>
           
        </div> -->


        
    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Featured Jobs</h2>
              <a href="jobs.html">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <?php
                if(isset($fetchss) && !empty($fetchss)){
             
                foreach ($fetchss as $key => $fetch) {
                  if($key < 3){
                    //get the states for each job post
                    $state = $user->get_state_by_id($fetch['states_id']);
                    $lga =  $user->get_lga_by_id($fetch['lga']);
                ?>
               
               
        <div class="col-md-4">
            <div class="product-item">
              <a href="<?= base_url() ?>/userfiles/viewjobs.php?jid=<?= $fetch['jobVacancy_id'] ?>"><img src="assets/images/product-1-370x270.jpg" alt=""></a>
              <div class="down-content">
                <a href="<?= base_url() ?>/userfiles/viewjobs.php?jid=<?= $fetch['jobVacancy_id'] ?>"><h4><?php echo ucfirst($fetch['jobVacancy_title']) ?></h4></a>

                <h6>$ <?= $fetch['vacancy_salaryRange'] ?></h6>

                <h4><small><i class="fa fa-briefcase"></i> <?php echo ucfirst($fetch['qualification']) ?> <br> <strong><i class="fa fa-building"></i> <?php echo $fetch['employer_companyName'] ?></strong></small></h4>

                <small>
                     <strong class="m-1" title="Posted on"><i class="fa fa-calendar m-1"></i><?= date("d-m-Y", strtotime($fetch['dateClosed'])) ?></strong> &nbsp;&nbsp;&nbsp;&nbsp;
                     <strong title="Type"><i class="fa fa-file m-1"></i> <?= $fetch['work_type'] ?></strong> &nbsp;&nbsp;&nbsp;&nbsp;
                     <strong title="Location"><i class="fa fa-map-marker"></i> <?= $lga['lga_name'] ?>,<?= $state['state_name'] ?></strong>
                </small>
              </div>
            </div>
          </div>

                <?php
                  }  
              }
            }
                ?>
       

        </div>
      </div>
    </div>




     <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>For employers</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
            <h4>Are you an employer seeking for the right employees</h4>
            <p>Click the link Below to Go to the employer section</p>
             
              <a href="employer.php" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="<?= base_url() ?>/assets/images/about-1-570x350.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>



        
    <div class="services" style="background-image: url(<?= base_url() ?>/assets/images/other-image-fullscren-1-1920x900.jpg);" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest blog posts</h2>

              <a href="blog.html">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="assets/images/blog-1-370x270.jpg" class="img-fluid" alt=""></a>

              <div class="down-content">
                <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit hic</a></h4>

                <p style="margin: 0;"> John Doe &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="assets/images/blog-2-370x270.jpg" class="img-fluid" alt=""></a>

              <div class="down-content">
                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h4>

                <p style="margin: 0;"> John Doe &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="assets/images/blog-3-370x270.jpg" class="img-fluid" alt=""></a>

              <div class="down-content">
                <h4><a href="#">Aperiam modi voluptatum fuga officiis cumque</a></h4>

                <p style="margin: 0;"> John Doe &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Happy Clients</h2>

              <a href="testimonials.html">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel text-center">
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>John Doe</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Jane Smith</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Antony Davis</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>John Doe</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Jane Smith</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Antony Davis</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                </div>
                <div class="col-lg-4 col-md-6 text-right">
                  <a href="contact.html" class="filled-button">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

       
        <?php
            require_once "partials/footer.php";
        ?>