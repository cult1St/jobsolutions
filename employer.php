<?php
    session_start();
    require_once "classes/Employer.php";
    require_once "partials/global_functions.php";
    $cat1 = new Employer;
    //$cats = $cat1->fetch_cat() ;
    $states = $cat1->fetch_state() ;

    if(isset($_SESSION['useronline']) && !empty($_SESSION['useronline'])){
        header("location: ". base_url("userfiles/dashboard.php"));
    }

    require_once "partials/header.php";


    $step = isset($_GET['step']) && !empty($_GET['step']) ? $_GET['step'] : "login";


    $display_none = "style='display:none'";
    $display_block = "style='display:block'";
?>



             



<div style="margin-top: 200px;" class="banner find row justify-content-center my-5">
    <?php if($step == "login"): ?>
        <div class="col-sm-5 text-start card" <?= $step == "login" ? $display_block : $display_none ?>>
            <h4 class="text-primary m-2">Welcome Back, Please Login To access our portal</h4>
            <?php if(isset($_SESSION['errormsg'])){
                echo '<div class=" m-3 col-6 offset-3 alert alert-danger">'.$_SESSION['errormsg'].'</div>';
                unset($_SESSION['errormsg']);
            } ?>
          
            <form action="employerfiles/process/loginprocess.php" method="post" >
                       <div class="mb-3 form-group">
                      
                        <label for="username">Email</label>
                        <input type="email" name="email" id="username" class="form-control m-2" placeholder="Email" required>
                       
                        <p style="color: red;display: none;" id="para1" >Enter Email</p>
                     
                       </div>

                        <div class="form-group mb-3">
                            <label for="">Password</label>
                        <div class="input-group mb-3">
                            <input required name="password" type="password" id="password" class="form-control" placeholder="Enter Your Password"  aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon5"><span class="fa-regular fa-eye"></span></button>
                            <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon6" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                          </div>
                          <p style="color: red;display: none;" id="paratwo" >Enter password</p>
                          <a href="employerfiles/forgetpasswordform.php">Forgot Password</a>
                        </div>
                        <div class="mb-3">
                        <button name="login" value="login" type="submit" class="btn btn-primary m-2" id="looginbtn">Login</button>


                        </div>      
                        <p>New To Our Platform <a href="?step=signup">Create Account</a> </p>
                    </form>
        </div>
            
        <?php endif; ?>

        <?php if($step == "signup"): ?>
        <div class="col-sm-7 text-start card p-5" <?= $step == "signup" ? $display_block : $display_none ?>>
            <h4 class="text-primary m-2">Welcome , Your Adventure starts here</h4>
            <?php if(isset($_SESSION['errormsg'])){
                echo '<div class=" m-3 col-6 offset-3 alert alert-danger">'.$_SESSION['errormsg'].'</div>';
                unset($_SESSION['errormsg']);
            } ?>


            <form action="employerfiles/process/signupprocess.php" method="post">
                           <div class="firstform">
                         
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="fname">Firstname</label>
                                    <input type="text" name="firstname" id="firstname" placeholder="Enter Your FirstName" class="form-control m-2">
                                    <p style="color: red;display: none;" id="paraone">please input your firstname</p>
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Lastname</label>
                                    <input type="text" name="lastname" id="lastname" placeholder="Enter Your LastName" class="form-control m-2">
                                    <p style="color: red;display: none;" id="para2">please input your lastname</p>
                                </div>
                            </div>
                           
                            <div class="row mb-3">
                                <div class="col-md-6">
                                <label for="ogname">Name Of Organisation</label>
                              <input type="text" name="ogname" id="ogname" placeholder="Enter Your Organisation Name" class="form-control m-2">
                              <p style="color: red;display: none;" id="parafour">please input your firstname</p>
                              
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="enter Your Email" class="form-control m-2" >
                                <p style="color: red;display: none;" id="para4">Enter Your Email</p>
                                    </div>
                            </div>
                           
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pass1">Choose Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Enter Your Password" id="pass1" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon1"><span class="fa-regular fa-eye"></span></button>
                                        <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon2" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                                    </div>
                                <p style="color: red;display: none;" id="para5" >Enter password</p>

                                </div>
                                <div class="col-md-6">
                                        <label for="pass2">Confirm Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" name="cpassword" class="form-control" id="pass2" placeholder="Enter Your Password" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon3"><span class="fa-regular fa-eye"></span></button>
                                        <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon4" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                                    </div>      
                                    <p style="color: red;display: none;" id="para6">password should be the same with confirm password</p>        
                                        </div>
                            </div>

                                         
                            
                      
                               <div class="row mb-3">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="agree" id="agree">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                        I agree with the terms and condition
                                        </label>
                                        <button type="submit" class="btn btn-outline-primary" value="register" name="signup" id="submiting" >Register</button>
                                    </div>
                                </div>
                                <p>Already Have An Account <a href="?step=login">Login</a></p>
                               </div>
                           </div>
                        </form>
          
        </div>
            
        <?php endif; ?>


    </div>




    <script>
        $(document).ready(function(){
    $(".ff").hover(function(){
       $(this).children("div").slideToggle(100).siblings("a").children("span").toggleClass("fa-xmark")
    })
    $(".login").hide()
    $("#btnnnn1").click(function(){
    $(".login").slideDown(2000)
    $(".signup").slideUp(1500)
    })
    $("#btnnnn").click(function(){
    $(".signup").slideDown(2000)
    $(".login").slideUp(1500)
    })
    $(".secondform").hide()
    $("input[type='text'],input[type='password'],input[type='email']").focus(function(){
    $(this).css({"background-color":"aqua"})
    })
    $("input[type='text'],input[type='password'],input[type='email']").blur(function(){
    $(this).css({"background-color":"white"})
    })
    var functions = ["Accounting, Auditing & Finance",
                       "Admin & Office",
                       "Creative & Design",
                       "Building & Architecture",
                       "Consulting & Strategy",
                       "Customer Service & Support",
                       "Engineering & Technology",
                       "Farming & Agriculture",
                       "Food Services & Catering",
                       "Hospitality & Leisure",
                       "Software & Data",
                       "Legal Services",
                       "Marketing & Communications",
                       "Medical & Pharmaceutical",
                       "Product & Project Management",
                       "Estate Agents & Property Management",
                       "Quality Control & Assurance",
                       "Human Resources",
                       "Management & Business Development",
                       "Community & Social Services",
                       "Sales",
                       "Supply Chain & Procurement",
                       "Research, Teaching & Training",
                       "Trades & Services",
                       "Driver & Transport Services",
                       "Health & Safety"]
    for (var f = 0;f<26;f++) {
       $("#functionss").append("<option value='"+functions[f]+"'>"+functions[f]+"</option>")
       $("#functionsss").append("<option value='"+functions[f]+"'>"+functions[f]+"</option>")
       
    }
    
    
       for (var y = 2; y <= 10; y++) {
           $("#yox").append("<option value='"+y+"'>"+y+"years</option>")
          
       }
       $("#yox").append("<option value='11'>11 years and above</option>")
           
      
           
       for (var d = 1; d <= 31; d++) {
           $("#select2").append("<option value='"+d+"'>"+d+"</option>")
           
           
       }
       var month = $(this).children().val();
       
    
    $(".passbtn").click(function(){
           $(this).attr("type","button")
           $(this).siblings().attr("type","text")
           $(this).hide()
           $(this).siblings("button").show()
            })
    $(".passbtn2").click(function(){
           $(this).attr("type","button")
           $(this).siblings().attr("type","password")
           $(this).hide()
           $(this).siblings("button").show()
    
            })
    $("#nextbtn").click(function(){
    const fname = $("#firstname").val();
    const lname = $("#lastname").val();
    const number = $("#number").val();
    const email = $("#email").val();
    const pass1= $("#pass1").val();
    const pass2= $("#pass2").val();
    const select = $(".firsts").val();
    const select1 = $(".firsts1").val();
    const select2 = $(".firsts2").val();
    const select3 = $(".firsts3").val();
    const select4 = $("#gender").val();
    
    if(fname==""){
        $("#paraone").show()
        $("#firstname").focus()
        }
        else if(lname==""){
            $("#para2").show()
            $("#lastname").focus()
        }else if(number==""||number.length <11){
            $("#para3").show()
            $("#number").focus()
        }else if(email==""){
            $("#para4").show()
            $("#email").focus()
        }else if(pass1==""||pass1.length <8){
            $("#para5").show()
            $("#pass1").focus()
        }else if(pass2==""||pass1!=pass2){
            $("#para6").show()
            $("#pass2").focus()
        }else if (select==""){
            $("#para7").show()
            $(".firsts").focus()
        }else if (select1==""){
            $("#para8").show()
            $(".firsts1").focus()
        }else if (select2==""){
            $("#para9").show()
            $(".firsts2").focus()
        }else if (select4==""){
            $("#para11").show()
            $("#gender").focus()
        }else if (select3==""){
            $("#para10").show()
            $(".firsts3").focus();
        }else{
            $(".secondform").slideDown(1000);
            $(".firstform").slideUp(1000)
            $("p").hide()
        }
        
    
   
    
    
    
    })
    $("#prevbtn").click(function(){
        $(".firstform").slideDown(1000);
            $(".secondform").slideUp(1000)
    })
    $("#agree").click(function(){
        var agreed = $(this).prop("checked");
   if (agreed) {
        
        $("#submiting").removeAttr("disabled")
   }else{
    $("#submiting").attr("disabled")

   }
   $("#submiting").click(function(){
   
        $(this).attr("type","submit")
        
  
   })
    
    })
    $("#looginbtn").click(function(e){
     
        var username = $("#username").val();
        var password = $("#password").val();
        if(username==""){
            $("#para1").show();
            $("#username").focus();
            e.preventDefault();
        }else if(password==""){
            $("#paratwo").show();
            $("#password").focus();
            e.preventDefault();
        }else{
            $(this).attr("type","submit")
        }
    })
})
   
    
    </script>
    <?php 

    require_once "partials/footer.php";