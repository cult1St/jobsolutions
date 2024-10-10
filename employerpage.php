<?php

    require_once "partials/header.php";
    ?>
     <div class="col-1 offset-md-2 mt-2">
                  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <span class="fa-regular fa-user"></span>
                  </button>
     </div>
    <?php
    require_once "partials/banner.php";

?>
  <div class="post">
                    <button class="btn btn-primary" id="postingbtn">Post Job</button>
                </div>
            <div class="col-8 offset-2">
              
                        <div class="posting" style="display: none;">
                    <form action="#" method="get">
                        <label for="jobcat">Select Job Category</label>
                        <select name="jobcat" id="jobcat2" class="form-select">
                            <option  selected>Job Categories</option>
                        </select>
                        <label for="jobname">JobName</label>
                        <input type="text" name="jobname" class="form-control">
                        <label for="salary">Salary Range</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="input minimum"  aria-label="Recipient's username" aria-describedby="button-addon2">
                            <input type="text" class="form-control" placeholder="input maximum" aria-label="Recipient's username" aria-describedby="button-addon2">
                           
                          </div>
                          <div class="col">
                            <label for="yearsofexperience">Years Of Experience</label>
                            <select name="yearsofexperience" id="yox" class="form-select">
                                <option selected>Select Years Of Experience</option>
                                <option value="not">Not Necessary</option>
                                <option value="below">Below one Year</option>
                                <option value="1">A Year</option>
                                
                            </select>
                            <button type="submit" class="btn btn-outline-primary m-3">Post</button>
                   
                        </div>
                         </form>
                </div>
            </div>
        </div>
       
        
        <div class="row hero">
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
       
            <div class="row" id="contact" >
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
        </div>
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
            <li><a href="employerpage.php">Home</a></li>
            <li><a href="employerfiles/uploadjob.php">upload jobs</a></li>
            <li><a href="employerfiles/settings.php">settings</a></li>
            <li><a href="employerfiles/viewapplications.php">View applications</a></li>
            <li><a href="">Help</a></li>
        </ul>
        <div class="col-6">
            <form action="" method="post">
                <button class="btn btn-primary m-3">Log Out</button>
            </form>
            <p class="mx-3">momoduwealth@gmail.com</p>
        </div>
       
      </div>
    
    



    <script src="jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".ff").hover(function(){
                $(this).children("div").slideToggle(100).siblings("a").children("span").toggleClass("fa-xmark")
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
                $("#jobcat,#jobcat2").append("<option value='"+f+"'>"+functions[f]+"</option>")
                
            }
            for (var f = 0;f<26;f++) {
                $("#jobind").append("<option value='"+f+"'>"+functions[f]+"</option>")
                
            }
            for (var y = 2; y <= 10; y++) {
           $("#yox").append("<option value='"+y+"'> "+y+" years</option>")
          
       }
       $("#yox").append("<option value='11'>11 years and above</option>")
          
        })
        $("#postingbtn").click(function(){
            $(".posting").slideToggle(1000)
        })
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>