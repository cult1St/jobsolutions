<?php
    session_start();
    require_once "userguard.php";

  
    require_once "classes/User.php";
    require_once "classes/Employer.php";
    $employer = new User;
    if(isset($_SESSION['search'])){
        $fetches = $_SESSION['search'];
    }
    
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="My job Solutions web is a website with the sole imterest of helping Nigerians get a job of their choice without the stress of going about with their CVs ">
    <meta name="keywords" content="jobs in lagos">
    <meta property="og:image" content="images/logo">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <style>
        .myoff ul li a{
            
            text-decoration: none;
            color: rgb(95, 89, 89);
          
            
        }
        .myoff ul li{
            list-style-type: none;
            

        }
        #logo{
            width: 100px;
        }
    </style>
    
    <title>My Job Solutions</title>
   
</head>
<body>
    <div class="container">
        <div class="row navigation">
            <div class="col col-md-1">
                <img  src="images/logo.png" alt="my logo" class="img-fluid" id="logo">
            </div>
                        <div class="col col-md-2 ff">
                <a id="linking2" href="#" class="" >Help<span class='fa fa-chevron-down' style="margin-left: 5px;"></span></a>
                <div class="employerdropdown">
                    <a href="#" style="border-bottom: 1px solid black;">Faq </a>
                    <a href="#contact" style="border-top: 1px solid black;border-bottom: 1px solid black">Contact Us</a>
               </div>
            </div>
            <div class="col-1 offset-md-2 mt-2">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                  <span class="fa-regular fa-user"></span>
                </button>
              
          </div>           <div class="col-2 buttonspan"><button class="mt-2"><span class="fa fa-bars "></span></button></div>
        </div>


    <?php
     $user = new User;
     if(isset($_SESSION['user_id'])){
         $id = $_SESSION['user_id'];
         $user_id = $user->get_user_by_id($id);
         echo "<h2 style='color:blue'>Welcome ".$user_id['jobSeeker_firstName']."</h2>";
     }else{
         header("location:login.php");
          session_destroy();
     }
   
    require_once "partials/banner.php";

?>
        <div class="row find">
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
       <div class="row justify-content-center">
        <h1 style="text-align: center;">Jobs Available</h1>
        
        <?php 
        if(isset($_SESSION["searchmsg"])){
            echo "<div class='alert alert-info'>".$_SESSION["searchmsg"]."</div>";
            unset($_SESSION["searchmsg"]);
        }
        if(isset($_SESSION["search"]) && !empty( $_SESSION["search"] )){
        foreach($fetches as $fetch){
            $exp_date = $fetch['dateClosed'];
            $today_date = date('Y-m-d');
            $exp_date = strtotime($exp_date);
            $today_date = strtotime($today_date);
            if($today_date<$exp_date){
              
            
        ?>
       
       <div class="col-6 col-md-4 m-2" style="border: 1px solid black;border-radius: 30px;">
       
       <img src="logos/<?php echo $fetch['employer_companyLogo'] ?>" alt="" style="width: 100px;height: 100px;">
                    <h3 style="text-align: center;"><?php echo $fetch['employer_companyName'] ?></h3>
                    
                    <label for="">Role</label>
                    <input type="text" disabled class="form-control" value="<?php echo ucfirst($fetch['jobVacancy_title']) ?>">
                    <label for="">Qualification</label>
                    <input type="text" disabled class="form-control" value=" <?php echo ucfirst($fetch['qualification']) ?>">
                    <p>Salary Range= <?php echo $fetch['vacancy_salaryRange'] ?></p>
                    
                    <label for="">Location</label>
                    <p>State:   <?php echo $fetch['state_name'] ?> Local Government Area: <?php echo $fetch['lga_name'] ?></p>
           
                      
                    <a href="userfiles/viewjobs.php?jid=<?php echo $fetch['jobVacancy_id']?>"  type="submit" class="btn btn-primary mx-5">Apply</a>
                  
        </div>
      
       <?php
            }
        }
        unset($_SESSION['search']);
    }else{
        echo "Search for a job";
    }
       ?>
       </div>
        <!-- <div class="row hero">
            <h2 style="text-align: center;">Job Categories Available</h2>
           <div class="col-6 col-md-4"> 
            <a href="#">Accounting, Auditing & Finance</a>
            <a href="#">Admin & Office</a>
            <a href="#">Creative & Design</a>
            <a href="#">Building & Architecture</a>
            <a href="#">Consulting & Strategy</a>
            <a href="#">Customer Service & Support</a>
            <a href="#">Engineering & Technology</a>
            <a href="#">Farming & Agriculture</a>
            
            </div>
            <div class="col-6 col-md-4">
            <a href="#">Food Services & Catering</a>
            <a href="#">Hospitality & Leisure</a>
            <a href="#">Software & Data</a>
            <a href="#">Legal Services</a>
            <a href="#">Marketing & Communications</a>
            <a href="#">Medical & Pharmaceutical</a>
            <a href="#">Product & Project Management</a>
            <a href="#">Estate Agents & Property Management</a>
            <a href="#">Quality Control & Assurance</a>
            <a href="#">Human Resources</a>
            </div>
            <div class="col-12 col-md-4">
            <a href="#">Management & Business Development</a>
            <a href="#">Community & Social Services</a>
            <a href="#">Sales</a>
            <a href="#">Supply Chain & Procurement</a>
            <a href="#">Research, Teaching & Training</a>
            <a href="#">Trades & Services</a>
            <a href="#">Driver & Transport Services</a>
            <a href="#">Health & Safety</a>
            </div>
       
            <div class="row" id="contat" >
           <h3>Other ways to contact us</h3>
           <div class="col-md-6"  style="display: inline;">
            <a href="#"><img src="icons/facebook.png" alt="facebooklink" class="img-fluid" style="width: 30px;"></a>
            <a href="#"><img src="icons/instagram.png" alt="instagram link" class="img-fluid"  style="width: 30px;"></a>
            <a href="#"><img src="icons/whatsapp.png" alt="whatsapp link" class="img-fluid"  style="width: 30px;"></a>
           </div>
          
           <div class="col-12">
            <p class=""> &copy;copyright 2024.All rights Reserved</p>
           </div>
           
           </div>
        </div> -->
    </div>
    <?php 
    require_once "partials/minfooter.php";
    ?>

    <div class="offcanvas offcanvas-end myoff" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h3 style="text-align: center;">Account Information</h3>        
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <hr>
        
        <div class="image ml-5 container" style="width: 200px; height: 200px; border: 1px solid burlywood;">
            <img src="images/profile.jpeg" alt="profile picture" class="container-fluid">

        </div>
        <ul>
            <li><a href="userfiles/dashboard.php">Dashboard</a></li>
            <li><a href="userfiles/view_applications.php">View Applications</a></li>
            <li><a href="userfiles/usersettings.php">settings</a></li>
            <li><a href="">Help</a></li>
        </ul>
        <div class="col-6">
                <form action="process/logout.php" method="post"><button class="btn btn-primary m-3">Log Out</button></form><p class="mx-3"><?php echo $user_id['jobSeeker_email']; ?></p>
            </div>
           
       
      </div>

    <script src="jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".ff").hover(function(){
                $(this).children("div").slideToggle(100).siblings("a").children("span").toggleClass("fa-xmark")
            })
         
        })
    </script>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>