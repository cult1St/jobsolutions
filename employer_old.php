<?php
session_start();
// echo password_hash("11111111", PASSWORD_DEFAULT);
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



    </style>
    
    <title>My Job Solutions</title>
   
</head>
<body>
    <div class="container">
        <div class="row navigation">
            <div class="col col-md-1">
                <img src="images/logo.png" style="width: 100px;" alt="my logo" class="img-fluid"><span><h4>Job Solutions</h1></span>
            </div>
            <div class="col col-md-3 ff">
                
                <a id="linking1" href="#" class="">Job Seekers<span class='fa fa-chevron-down' style="margin-left: 5px;"></span></a>
                <div class="jobseekdropdown">
                    <a href="login.php" style="border-bottom: 1px solid black;">Create an account</a>
                    <a href="login.php" style="border-top: 1px solid black;border-bottom: 1px solid black">upload CV</a>
                    <a href="#jobcat" style="border-top: 1px solid black">Job Vacancies</a>
                </div>
            </div>
            <div class="col col-md-3 ff">
                <a id="linking2" href="#" class="" >Employers<span class='fa fa-chevron-down' style="margin-left: 5px;"></span></a>
                <div class="employerdropdown">
                    <a href="#" style="border-bottom: 1px solid black;">Create an employer account</a>
                    <a href="#" style="border-top: 1px solid black;border-bottom: 1px solid black">Post Your Job Vacancies</a>
               </div>
            </div>
            <div class="col col-md-2 ff">
                <a id="linking2" href="#" class="" >Help<span class='fa fa-chevron-down' style="margin-left: 5px;"></span></a>
                <div class="employerdropdown">
                    <a href="#" style="border-bottom: 1px solid black;">Faq </a>
                    <a href="#contact" style="border-top: 1px solid black;border-bottom: 1px solid black">Contact Us</a>
               </div>
            </div>
            <div class="col col-md-3 lagin"><a href="index.php" style="color: rgb(32, 30, 30); text-decoration: none;">Home page</a><a href="index.php">Home</a></div>
            <div class="col-2 buttonspan"><button class="mt-2"><span class="fa fa-bars "></span></button></div>
        </div>
        <div style="border: 0.1px solid black; background-color: rgb(250, 251, 251); border-radius: 30px;">
            <h1 class="text-secondary" style="text-align: center;">Employer Section</h1>
            <?php if(isset($_SESSION['errormsg'])){
    echo '<div class="col-6 offset-3 alert alert-danger">'.$_SESSION['errormsg'].'</div>';
    unset($_SESSION['errormsg']);
} ?>
            <div class="col-12  login" >

            <div class="row">
                
                <div class="col-8 offset-2">
                   <span>New Member</span> <button id="btnnnn" class="btn btn-success" style="border: none; color: blue;background: transparent;">Sign Up</button>
                    <form action="employerfiles/process/loginprocess.php" method="post" >
                        <label for="username">Username</label>
                        <input type="email" name="email" id="username" class="form-control m-2" placeholder="Email" >
                        <p style="color: red;display: none;" id="para1" >Enter Username</p>

                        <div class="input-group mb-3">
                            <input name="password" type="password" id="password" class="form-control" placeholder="Enter Your Password"  aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon2"><span class="fa-regular fa-eye"></span></button>
                            <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon2" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                          </div>
                          <p style="color: red;display: none;" id="paratwo" >Enter password</p>

                          <button type="button" name="login" value="login" class="btn btn-primary m-2" id="looginbtn">Login</button>
                    </form>
                    <a href="employerfiles/forgetpasswordform.php">Forgot Password</a>
                </div>
            </div>
           </div>

           <div class="col-12  signup">
                <div class="row">
                    <div class="col-8 offset-2">
                       <span>Already Have An Account ?</span> <button id="btnnnn1"  class="" style="border: none; color: blue; background: transparent;">Login</button>
                        <form action="employerfiles/process/signupprocess.php" method="post">
                           <div class="firstform">
                           
                            <label for="fname">Firstname</label>
                            <input type="text" name="firstname" id="firstname" placeholder="Enter Your FirstName" class="form-control m-2">
                            <p style="color: red;display: none;" id="paraone">please input your firstname</p>
                            <label for="lname">Lastname</label>
                            <input type="text" name="lastname" id="lastname" placeholder="Enter Your LastName" class="form-control m-2">
                            <p style="color: red;display: none;" id="para2">please input your lastname</p>
                            
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="enter Your Email" class="form-control m-2" >
                            <p style="color: red;display: none;" id="para4">Enter Your Email</p>
                            <label for="pass1">Choose Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Enter Your Password" id="pass1" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon2"><span class="fa-regular fa-eye"></span></button>
                                <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon2" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                              </div>
                              <p style="color: red;display: none;" id="para5" >Enter password</p>
                              <label for="pass2">Confirm Password</label>
                              <div class="input-group mb-3">
                                <input name="password" type="password" class="form-control" id="pass2" placeholder="Enter Your Password" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon2"><span class="fa-regular fa-eye"></span></button>
                                <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon2" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                              </div>      
                              <p style="color: red;display: none;" id="para6">password should be the same with confirm password</p>                     
                            
                              <label for="ogname">Name Of Organisation</label>
                              <input type="text" name="ogname" id="ogname" placeholder="Enter Your Organisation Name" class="form-control m-2">
                              <p style="color: red;display: none;" id="parafour">please input your firstname</p>
                              
                            
                                <div class="col-4">
                                    <select name="states" id="state" class="form-select firsts3 mb-3" aria-label="Large select example">
                                        <option value="" >Choose your Company Location</option>
                                        <option value="1">Abia</option>
                                        <option value="2">Adamawa</option>
                                        <option value="3">Akwa-Ibom</option>
                                        <option value="4">Anambra</option>
                                        <option value="5">Bauchi</option>
                                        <option value="6">Bayelsa</option>
                                        <option value="7">Benue</option>
                                        <option value="8">Borno</option>
                                        <option value="9">Cross-River</option>
                                        <option value="10">Delta</option>
                                        <option value="11">Ebonyi</option>
                                        <option value="12">Edo</option>
                                        <option value="13">Ekiti</option>
                                        <option value="14">Enugu</option>
                                        <option value="15">Gombe</option>
                                        <option value="16">Imo</option>
                                        <option value="17">Jigawa</option>
                                        <option value="18">Kaduna</option>
                                        <option value="19">Kano</option>
                                        <option value="20">Katsina</option>
                                        <option value="21">Kebbi</option>
                                        <option value="22">Kogi</option>
                                        <option value="23">Kwara</option>
                                        <option value="24">Lagos</option>
                                        <option value="25">Nasarawa</option>
                                        <option value="26">Niger</option>
                                        <option value="27">Ogun</option>
                                        <option value="28">Ondo</option>
                                        <option value="29">Osun</option>
                                        <option value="30">Oyo</option>
                                        <option value="31">Plateau</option>
                                        <option value="32">Rivers</option>
                                        <option value="33">Sokoto</option>
                                        <option value="34">Taraba</option>
                                        <option value="35">Yobe</option>
                                        <option value="36a">Zamfara</option>
                                        <option value="37">Fedral-Capital-territory</option>
                                        <option value="38">Foreign</option>
                                    </select>
                                    <p style="color: red;display: none;" id="para10">select an option</p>
                                
                                </div>
                              
                           
                               `    `   
                            
                              
                              
                               
                               
                               <div class="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="agree" id="agree">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                     I agree with the terms and condition
                                    </label>
                                    <button type="submit" name="signup" value="signup" class="btn btn-outline-primary" id="submiting" disabled>Register</button>
                                  </div>
                               </div>
                           </div>
                        </form>
                    </div>
                </div>
                </div>
                </div>
                
            
            </div>
           </div>












        
         </div>
        </div>
    <footer style="position: sticky-bottom;">
          <div class="container">
    <div class="row" >
            <h1>Other ways to contact us</h1>
            <div class="col-md-6"  style="display: inline;">
             <a href="#"><img src="icons/facebook.png" alt="facebooklink" class="img-fluid" style="width: 30px;"></a>
             <a href="#"><img src="icons/instagram.png" alt="instagram link" class="img-fluid"  style="width: 30px;"></a>
             <a href="#"><img src="icons/whatsapp.png" alt="whatsapp link" class="img-fluid"  style="width: 30px;"></a>
            </div>
           
            <div class="col-12">
             <p class=""> &copy;copyright 2024.All rights Reserved</p>
            </div>
    </div>
    </footer>
  


        <script src="jquery-3.7.1.min.js"></script>
    <script src="employer.js"></script>  
   <script>
     <?php


?>
   </script>
    </body>
</html>