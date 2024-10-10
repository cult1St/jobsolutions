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
     $fetchs = $employer->fetch_vacancies_for_users();
     

     $num = 0;
     $numb = 0;
    //  if(!empty($user_id['jobSeeker_firstName'])){
    //     $num =$num-10 ;
    //     $numb = $numb + 10;
    //  }
   foreach ($user_id as $value) {
   //foreach($value as $v){
    if(!empty($value)){
            $num =$num+7.69 ;
            $numb = $numb + 10;
          }
  // }
}
    //  $num = $num/100;

    //  $calc = 472 * $num;
    $num = 472-472*($num/100);

  //  $calc = 472 * $num;
  
   
   

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
     
      circle{
        fill: none;
        stroke: url(#GradientColor);
        stroke-width: 20px;
        stroke-dasharray: 472;
        stroke-dashoffset: 472;
        animation: anim 2s linear forwards;
      }
      @keyframes anim{
        100%{
          stroke-dashoffset: <?php echo $num ?>;
        }
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

        <div class="row"></div>
        <div class="row">
            <div class="col-12 col-md-6 col-md-8">
                <h1 style="text-align: center;">Available jobs</h1>
                <?php
                    foreach($fetchs as $fetch){
                        $exp_date = $fetch['dateClosed'];
                        $today_date = date('Y-m-d');
                        $exp_date = strtotime($exp_date);
                        $today_date = strtotime($today_date);
                        if($today_date<$exp_date){
                          
                ?>
                <div class="col-12 m-2" style="border: 1px solid black;">
                <img src="../logos/<?php echo $fetch['employer_companyLogo'] ?>" alt="" style="width: 100px;height: 100px;">
                    <h3 style="text-align: center;"><?php echo $fetch['employer_companyName'] ?></h3>
                    
                    <label for="">Role</label>
                    <input type="text" disabled class="form-control" value="<?php echo ucfirst($fetch['jobVacancy_title']) ?>">
                    <label for="">Qualification</label>
                    <input type="text" disabled class="form-control" value=" <?php echo ucfirst($fetch['qualification']) ?>">
                    <p>Salary Range= <?php echo $fetch['vacancy_salaryRange'] ?></p>
                    
                    <label for="">Location</label>
                    <p>State:   <?php echo $fetch['state_name'] ?> Local Government Area: <?php echo $fetch['lga_name'] ?></p>
           
                      
                    <a href="viewjobs.php?jid=<?php echo $fetch['jobVacancy_id']?>"  type="submit" class="btn btn-primary mx-5">Apply</a>
                  
                </div> 

                <?php
                        }
                    }
                ?>
               
              
            </div>
            <div class="col-12  col-md-4">
                <h1 style="text-align: center;">Status check</h1>
                <div id="borrow">
                 <svg width="160px" height="160px">
                     <defs>
                        <linearGradient id="GradientColor">
                    <stop offset="0%" stop-color="blue"/>
                 <stop offset="100%" stop-color="red"/>
                </linearGradient>
                </defs>
   
                <circle cx="80" cy="80" r="70" stroke-line-cap="round" />

  </svg>

    
 </div>
 <h1 ><span class="text-primary" id="numb"></span>% Completed</h1>
               <div>
                <p>
                <input <?php
                    echo !empty($user_id['jobSeeker_firstName']) ? "checked" : ""; 
                ?>
                
                type="checkbox" disabled name="firstname" id="first" value="firstname" class="form-check-input">Firstname</p>
                <p>
                <input 
                <?php
                    echo !empty($user_id['jobSeeker_lastName']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="lastname" id="last" value="lastname" class="form-check-input">Lastname</p>
                <p>
                <input  <?php
                    echo !empty($user_id['jobSeeker_phone']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="phone" id="phone" value="phone" class="form-check-input">phone number</p>
                <p>
                <input  <?php
                    echo !empty($user_id['jobSeeker_email']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="email" id="email" value="email" class="form-check-input">Email</p>
                <p>
                <input  <?php
                    echo !empty($user_id['jobSeeker_gender']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="gender" id="gender" value="gender" class="form-check-input">gender</p>
                <p>
                <input  <?php
                    echo !empty($user_id['jobSeeker_qualification']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="qualification" id="qualification" value="qualification" class="form-check-input">Qualification</p>
                <p>
                <input  <?php
                    echo !empty($user_id['jobSeeker_experience']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="exp" id="exp" value="exp" class="form-check-input">Experience</p>
                
                <input  <?php
                    echo !empty($user_id['jobSeeker_CV']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="cvcheck" id="cv" value="cv" class="form-check-input">CV</p>
                <p><input  <?php
                    echo !empty($user_id['jobSeeker_Address']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="address" id="address" value="address" class="form-check-input">Address</p>
                

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