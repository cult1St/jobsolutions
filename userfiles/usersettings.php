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
        .savebtn,#savepassbtn{
            display: none;
        }
        .myoff ul li a{
            
            text-decoration: none;
            color: rgb(95, 89, 89);
            
            
        }
        .myoff ul li{
            list-style-type: none;
            

        }


    </style>
    
    <title>My Job Solutions</title>
   
</head>
<body>
    <div class="container">
    <h2 class="text-primary">Welcome <?php echo $user_id['jobSeeker_firstName'] ?></h2>
      <h1 class="text-primary">Settings</h1>
      <div class="col-1 offset-md-11 mt-2">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          <span class="fa-regular fa-user"></span>
        </button>
      
  </div>
        <div style="border: 0.1px solid black; background-color: rgb(250, 251, 251); border-radius: 30px;">
     

           <div class="col-12  signup">
                <div class="row">
                    <div class="col-8 offset-2">
                    <form action="../process/updateprocess.php" method="post" enctype="multipart/form-data">
                           <div class="firstform">
                            <div>
                            <label for="number">Change phone Number</label>
                            <input  value="<?php echo $user_id['jobSeeker_phone'] ?>" type="text" name="number" id="number" placeholder="Enter Your Phone Number" class="form-control m-2">
                            <p style="color: red;display: none;" id="para3" >Enter a valid number</p>
                            <!-- <button type="button" class="btn btn-secondary editbtn">Edit</button>
                            <button type="button" class="btn btn-secondary savebtn">Save</button> -->
                            </div>
                            <div>
                            <p><label for="email">Update Email</label></p>
                            <input  value="<?php echo $user_id['jobSeeker_email'] ?>"  type="email" name="email" id="email" placeholder="enter Your Email" class="form-control m-2" >
                            <p style="color: red;display: none;" id="para4">Enter Your Email</p>
                            <!-- <button type="button" class="btn btn-secondary editbtn">Edit</button>
                            <button type="button" class="btn btn-secondary savebtn">Save</button> -->

                            </div>
                            <div class="row">
                                <div class="col">
                                <label for="pass1">Change Password</label>
                            <div class="input-group mb-3">
                                <input    type="password" class="form-control" placeholder="Enter Your Password" id="pass1" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon2"><span class="fa-regular fa-eye"></span></button>
                                <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon2" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                              </div>
                              <p style="color: red;display: none;" id="para5" >Enter password</p>
                              <label for="pass2">Confirm Password</label>
                              <div class="input-group mb-3">
                                <input  type="password" class="form-control" name="password" id="pass2" placeholder="Enter Your Password" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon2"><span class="fa-regular fa-eye"></span></button>
                                <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon2" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                              </div>      
                              <!-- <button type="button" class="btn btn-secondary" id="editbtn">Change</button>
                            <button type="button" class="btn btn-secondary" id="savebtn">save Password</button> -->

                              <p style="color: red;display: none;" id="para6">password should be the same with confirm password</p>                     
                             
                           
                                </div>
                            </div>
                            
                               <div class="row">
                                <div class="col">
                                    <label for="qualification">Qualification</label>
                                    <select name="qualification"  id="qualification" class="form-select">
                                        <option  value="">Select Qualification</option>
                                        <option value="olevel">O-Level / SSCE</option>
                                        <option value="nce">NCE</option>
                                        <option value="nd">National Diploma</option>
                                        <option value="bsc">BSC(Bachelor In Science)</option>
                                        <option value="msc">MSC(Master In Science)</option>
                                        <option value="phd">PHD(Doctor In Philosophy)</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Experience</label>
                                    <select name="experience" id="yox" class="form-select">
                                        <option value="">Select Experience</option>
                                        <?php 
                                        for($i=1; $i<=10; $i++){
                                            if($i<10){
                                        ?>
                                            <option <?php echo $user_id['jobSeeker_experience']==$i ? "selected" : "" ?> value="<?php echo $i?>"><?php echo $i?> Year(s)</option>
                                        <?php 
                                            }else{
                                                ?>
                                                <option  <?php echo $user_id['jobSeeker_experience']==$i ? "selected" : "" ?> value="<?php echo $i?>"><?php echo $i?> Years and Above</option>
                                                <?php 
                                        }
                                    }
                                        ?>
                                        
                                    </select>
                                </div>
                                
                               </div>
                               
                               <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <textarea name="address" id="add" cols="30" rows="10" class="form-control" value="<?php echo $user_id['jobSeeker_Address'] ?>"><?php echo $user_id['jobSeeker_Address'] ?></textarea>
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                               </div>
                               <div class="row">
                                <div class="col">
                                    <input type="file" name="cv" id="cv" class="form-control my-3">
                                    <span class="text-secondary">Choose A file for your CV which must not Be above 10mb. pdf only</span>
                                </div>
                               </div>
                               <div class="row">
                                <div class="form-check">
                                
                                    <button type="submit" name="save" value="save" class="btn btn-outline-primary" id="submiting" >save Settings</button>
                                  </div>
                               </div>
                           </div>
                        </form>
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
    
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script>
       
    </script>
    </body>
</html>