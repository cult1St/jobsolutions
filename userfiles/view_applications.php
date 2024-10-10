<?php
    session_start();
    require_once "../classes/User.php";
    require_once "userguard.php";
     $user = new User;
     if(isset($_SESSION['user_id'])){
         $id = $_SESSION['user_id'];
         $user_id = $user->get_user_by_id($id);
        
     }else{
         header("location:../login.php");
         
     }
     require_once "../classes/Employer.php";
     $employer = new Employer;
     $fetchs = $employer->fetch_applications_for_users($id);
     

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
    <div class="container">
       
        <h2 class="text-primary">Welcome <?php echo $user_id['jobSeeker_firstName'] ?></h2>
        <div class="row navigation">
            <div class="col col-md-1">
                <img src="../images/logo.png" alt="my logo" class="img-fluid">
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

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <span class="fa fa-table"></span>
                        <h2 class="text-warning">View Applications</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Job Post</th>
                                    <th>Company Name</th>
                                    <th>Date Applied</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(isset($fetchs)){
                                    $n=1;
                                    foreach($fetchs as $fetch){
                                ?>
                                <tr>
                                    <td><?php echo $n++ ?></td>
                                    <td><?php echo $fetch['jobVacancy_title'] ?></td>
                                    <td><?php echo $fetch['employer_companyName'] ?></td>
                                    <td><?php echo $fetch['date_applied'] ?></td>
                                    <td><?php $stats = $fetch['application_status'] ;
                                        if($stats == 0){
                                            echo '<div  class="badge bg-warning">Pending</div>';
                                        }elseif($stats == 1){
                                            echo '<div class="badge bg-danger">Not accepted</div>';
                                        }elseif($stats == 2){
                                            echo '<div class="badge bg-success">Approved</div>';
                                        }
                                    
                                    ?>
                                
                                    </td>
                                </tr>

                                <?php 
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      












        <?php require_once "../partials/minfooter.php" ?>
    </div>






    <div class="offcanvas offcanvas-end myoff" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h3 style="text-align: center;">Account Information</h3>        
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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