<?php
    session_start();
    require_once "classes/Employer.php";
    $cat1 = new Employer;
    //$cats = $cat1->fetch_cat() ;
    $states = $cat1->fetch_state() ;
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
/* .footer{
    position: relative;
    top: 0px;
    bottom: 0px;
} */


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
                <div class="jobseekdropdown">                 <a href="#"border-bottom: 1px solid black">upload CV</a>
                    <a href="#" style="border-top: 1px solid black">Job Vacancies</a>
                </div>
            </div>
            <div class="col col-md-3 ff">
                <a id="linking2" href="#" class="" >Employers<span class='fa fa-chevron-down' style="margin-left: 5px;"></span></a>
                <div class="employerdropdown">
                    <a href="employer.php" style="border-bottom: 1px solid black;">Create an employer account</a>
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
            <div class="col col-md-3 lagin"><a href="index.php" style="color: rgb(32, 30, 30); text-decoration: none;">Home page</a></div>
            <div class="col-2 buttonspan"><button class="mt-2"><span class="fa fa-bars "></span></button></div>
        </div>
        <div style="border: 0.1px solid black; background-color: rgb(250, 251, 251); border-radius: 30px;">
        <?php if(isset($_SESSION['errormsg'])){
    echo '<div class="col-6 offset-3 alert alert-danger">'.$_SESSION['errormsg'].'</div>';
    unset($_SESSION['errormsg']);
} ?>
        <div class="col-12  login" >
            <div class="row">
                <div class="col-8 offset-2">
                   <span>New Member</span> <button id="btnnnn" class="btn btn-success" style="border: none; color: blue;background: transparent;">Sign Up</button>
                    <form action="process/login_process.php" method="post" >
                        <label for="username">Email</label>
                        <input type="email" name="email" id="username" class="form-control m-2" placeholder="Email" >
                        <p style="color: red;display: none;" id="para1" >Enter Email</p>

                        <div class="input-group mb-3">
                            <input name="password" type="password" id="password" class="form-control" placeholder="Enter Your Password"  aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon5"><span class="fa-regular fa-eye"></span></button>
                            <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon6" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                          </div>
                          <p style="color: red;display: none;" id="paratwo" >Enter password</p>

                          <button name="login" value="login" type="button" class="btn btn-primary m-2" id="looginbtn">Login</button>
                    </form>
                    <a href="forgetpasswordform.php">Forgot password</a>
                </div>
            </div>
           </div>

           <div class="col-12  signup">
                <div class="row">
                    <div class="col-8 offset-2">
                       <span>Already Have An Account ?</span> <button id="btnnnn1"  class="" style="border: none; color: blue; background: transparent;">Login</button>
                        <form action="process/signup_process.php" method="post">
                           <div class="firstform">
                            <h2>Your Personal Information</h2>
                            <label for="fname">Firstname</label>
                            <input type="text" name="firstname" id="firstname" placeholder="Enter Your FirstName" class="form-control m-2">
                            <p style="color: red;display: none;" id="paraone">please input your firstname</p>
                            <label for="lname">Lastname</label>
                            <input type="text" name="lastname" id="lastname" placeholder="Enter Your LastName" class="form-control m-2">
                            <p style="color: red;display: none;" id="para2">please input your lastname</p>
                            <label for="number">Phone Number</label>
                            <input type="text" name="number" id="number" placeholder="Enter Your Phone Number" class="form-control m-2">
                            <p style="color: red;display: none;" id="para3">Enter a valid number</p>
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="enter Your Email" class="form-control m-2" >
                            <p style="color: red;display: none;" id="para4">Enter Your Email</p>
                            <label for="pass1">Choose Password</label>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Enter Your Password" id="pass1" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon1"><span class="fa-regular fa-eye"></span></button>
                                <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon2" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                              </div>
                              <p style="color: red;display: none;" id="para5" >Enter password</p>
                              <label for="pass2">Confirm Password</label>
                              <div class="input-group mb-3">
                                <input type="password" name="cpassword" class="form-control" id="pass2" placeholder="Enter Your Password" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon3"><span class="fa-regular fa-eye"></span></button>
                                <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon4" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                              </div>      
                              <p style="color: red;display: none;" id="para6">password should be the same with confirm password</p>                     
                              <label for="date of birth">Date Of Birth</label>
                            <div class="row">
                                <div class="col-4 mb-2">
                                    <select name="year" id="year" class="form-select firsts">
                                        <option selected value="">choose year</option>
                                        <?php
                                        $d = date('Y');
                                            for($i = ($d-18); $i >($d-65) ; $i--){
                                        ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                    <p style="color: red;display: none;" id="para7">select an option</p>
                                
                                    
                                </div>
                                <div class="col-4 mb-2">
                                    <select name="month" id="month" class="form-select firsts1">
                                        <option selected value=""> choose Month</option>
                                        <option value="01">January</option>
                                        <option value="02">february</option>
                                        <option value="03">march</option>
                                        <option value="04">april</option>
                                        <option value="05">may</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                
                                    </select>
                                    <p style="color: red;display: none;" id="para8">select an option</p>
                                
                                </div>
                                <div class="col-4 mb-2">
                                    <select name="day" id="select2" class="form-select firsts2">
                                        <option selected value="">choose day</option>
                                    </select>
                                    <p style="color: red;display: none;" id="para9">select an option</p>
                                
                                    
                                </div>
                                 <div class="col-4">
                                    <select name="gender" id="gender" class="form-select">
                                        <option value="">-Select Gender-</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <p style="color: red;display: none;" id="para11">select an option</p>
                                 </div>
                                <div class="col-4">
                                    <select name="states" id="state" class="form-select firsts3 mb-3" aria-label="Large select example">
                                        <option value="" >Choose your State</option>
                                        <?php 
                                        foreach($states as $state){
                                        ?>
                                        <option value="<?php echo $state['state_id'] ?>"><?php echo $state['state_name'] ?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                    <p style="color: red;display: none;" id="para10">select an option</p>
                                
                                </div>
                                 </div>
                           
                           
                               <div class="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="agree" id="agree">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                     I agree with the terms and condition
                                    </label>
                                    <button type="submit" class="btn btn-outline-primary" value="register" name="register" id="submiting" disabled>Register</button>
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


       <?php require_once "partials/minfooter.php" ?>
    


        <script src="jquery-3.7.1.min.js"></script>
    <script src="login.js"></script>  
    </body>
</html>