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
     $requirement = $emp->fetch_requirements($fetch['jobVacancy_id']);
     $check = $emp->check_application($jid, $_SESSION['user_id'])

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="My job Solutions web is a website with the sole imterest of helping Nigerians get a job of their choice without the stress of going about with their CVs ">
    <meta name="keywords" content="jobs in lagos">
    <meta property="og:image" content="images/logo">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <style>
        .myoff ul li a{
            
            text-decoration: none;
            color: rgb(95, 89, 89);
            
            
        }
        .myoff ul li{
            list-style-type: none;
            

        }
        #borrow{
        height: 400px;
        width: 500px;
        display: flex;
        border-radius: 50%;
        justify-content: center;
        align-items: center;
      }
     
      
        
    </style>
    
    <title>My Job Solutions</title>
   
</head>
<body>
    <div class="container-fluid">
       
        <!-- <h2 class="text-primary">Welcome <?php //echo $user_id['jobSeeker_firstName'] ?></h2> -->
        <div class="row navigation">
            <div class="col col-md-1">
                <img src="../images/logo.png" alt="my logo" style="width:100px">
            </div>
           
            
               
            <div class="col col-md-2 ff">
                <a id="linking2" href="#" class="" >Help<span class='fa fa-chevron-down' style="margin-left: 5px;"></span></a>
                <div class="employerdropdown">
                    <a href="#" style="border-bottom: 1px solid black;">Faq </a>
                    <a href="#contact" style="border-top: 1px solid black;border-bottom: 1px solid black">Contact Us</a>
               </div>
            </div>
            
            <div class="col-2 buttonspan"><button class="mt-2"><span class="fa fa-bars "></span></button></div>
            <div class="col-1 offset-md-2 mt-2">
                  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <span class="fa-regular fa-user"></span>
                  </button>
                
            </div>
        </div>
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
       
    <div class="row justify-content-center">
       
        <div class="col-md-6">
        <div class="col">
            <a href="dashboard.php" class="btn btn-warning">Go Back</a>
        </div>
            <div class="row justify-content-center">
                <div class="col-8">
                    <img  src="../logos/<?php echo $fetch['employer_companyLogo'] ?>" class="img-fluid" style="height: 200px;" alt="">
                </div>
                <div class="col">
                        <h2 class="text-warnng"><?php echo $fetch['employer_companyName'] ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3 class="text-primary"><?php echo $fetch['jobVacancy_title'] ?></h3>
                </div>
<div class="col">
    <h3 class="text-primary">Qualification</h3>
    <input type="text" disabled class="form-control" value=" <?php echo $fetch['qualification'] ?>">
</div>
            </div>
            <div class="row">
                <div class="col">
                    <h3 class="text-primary">Salary Range</h3>
                    <h4> <?php echo $fetch['vacancy_salaryRange'] ?></h4>
                    <p><?php echo $fetch['work_type'] ?></p>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <h3 class="text-primary">Requirements</h3>
                    <ul>
                        <?php 
                        foreach($requirement as $r){
                            $text = $r['req_text'];
                            echo "<li class='list-item'>$text</li>";
                        }
                        ?>
                    </ul>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <h3 class="text-primary">Description</h3>
                    <p><?php echo $fetch['vacancy_description'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <h3 class="text-primary">Location</h3>
                    <p>State: <?php echo $fetch['state_name'] ?><br>Local Government Area: <?php echo $fetch['lga_name'] ?></p>
                </div>
            </div>
            <form action="../process/processapply.php" method="post" enctype="multipart/form-data" >
            <div class="row">
                        <div class="col">
                            <input type="file" name="cv" id="cv" class="form-control my-3">
                            <span class="text-secondary">Choose A file for your CV which must not Be above 10mb. pdf only</span>
                        </div>
                       
                        <input type="hidden" name="jobVid" value="<?php echo $fetch['jobVacancy_id'] ?>">
                    <input type="hidden" name="jobSid" value="<?php echo $id ?>">   
                    <?php  
                    if($check==false){
                        ?>
                                <button disabled name="button" type="submit" value="btn" class="btn btn-primary mx-5">Already applied</button>
                        <?php
                    }else{
                    ?>
                     <button name="button" type="submit" value="btn" class="btn btn-primary mx-5">Apply</button>

                    <?php
                    }

                    ?>
                       
                        </form>
                       </div>


        </div>
       
    </div>
  

        

    <?php require_once "../partials/minfooter.php" ?>
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
   

    <script src="../jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".ff").hover(function(){
                $(this).children("div").slideToggle(100).siblings("a").children("span").toggleClass("fa-xmark")
            })
            
        })
    </script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script>
        // $(function(){
        //     var firstname = $('first').attr();
        //     if(firstname=="checked"){
        //         alert("hello World");
        //     }
        // })
        let numb = document.getElementById("numb");
        let count = 0;
        setInterval(()=>{
           if(count ==<?php echo $numb-30 ?>){
            clearInterval();
           }else{
            count += 1;
            numb.innerHTML = count ;
           
           }
        }, 30)
    </script>
</body>
</html>   