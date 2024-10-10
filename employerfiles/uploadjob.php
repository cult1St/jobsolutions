<?php
    session_start();
    
    require_once "userguard.php";
    require_once "../classes/Employer.php";
    $cat1 = new Employer;
    $cats = $cat1->fetch_cat() ;
    $states = $cat1->fetch_state() ;
    require_once "partials/header.php";

?>
  
     
      <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <?php
    if(isset($_SESSION['errormsg'])){
        echo '<div class="alert alert-danger">'.$_SESSION['errormsg'].'</div>';
        unset($_SESSION['errormsg']);
    }
            ?>
            <h3 class="text-info">
                Post a job
            </h3>
            
            <form action="process/uploadprocess.php" method="post" class="form-control">
                <div class="form-floating mb-3">
                    <input type="text" name="role" id="" class="form-control">
                    <label for="role">Job Role</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="qualification" id="" class="form-control">
                    <label for="qualification">Applicant Qualification</label>
                </div>
                <div class="input-group mb-3">
                    <input type="number" name="low" id="low" class="form-control" placeholder="Minimum Salary Expectation">-
                    <input type="number" name="high" id="high" class="form-control" placeholder="Maximum Salary Expectation">
                </div>
                <div class=" mb-3">
                    <label for="type">Work Type</label>
                    <select name="worktype" id="" class="form-select">
                        <option value="">Select Work Type</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Closing date</label>
                    <input type="date" name="closingdate" id="date" class="form-control">
                </div>
               <div class="mb-3">
               <div class="req">
                    <h3 class="text-warning">Requirements *</h3>
                    <input type="text" name="req[]" class="form-control" placeholder="input requirement 1" >
                </div>
                <div class="buttons mt-2">
                    <button class="add btn btn-primary">Add Requirement</button>
                    <button class="delete btn btn-danger">delete Requirement</button>
                </div>
               </div>
                <div class="mb-3">
                    <textarea class="form-control" name="desc" id="desc" cols="30" rows="10" placeholder="Enter Job Description"></textarea>
                </div>
                <div class="mb-3">
                    <select name="cat" id="cat" class="form-select">
                        <option value="">Select Job Category</option>
                        <?php
                        foreach ($cats as $cat) {
                        ?>
                        <option value="<?php echo $cat['jobCat_id'] ?>"><?php echo $cat['jobCat_name'] ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <select name="states" id="state" class="form-select">
                        <option value="">Select State</option>
                        <?php
                        foreach ($states as $state) {

                        ?>
                        <option value="<?php echo $state['state_id'] ?>"><?php echo $state['state_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div id="view"></div>
                <div class="mb-3" id="lgadiv" style="display:none">
                <label for="">Local Government Area</label>
                        <select name="lga" id="lga" class="form-select">
                           
                        </select>
                </div>

                <div class="m-2">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
        </div>
      </div>

    

      <div class="row" id="contact" >
            <h3>Other ways to contact us</h3>
            <div class="col-md-6"  style="display: inline;">
             <a href="#"><img src="../icons/facebook.png" alt="facebooklink" class="img-fluid" style="width: 30px;"></a>
             <a href="#"><img src="../icons/instagram.png" alt="instagram link" class="img-fluid"  style="width: 30px;"></a>
             <a href="#"><img src="../icons/whatsapp.png" alt="whatsapp link" class="img-fluid"  style="width: 30px;"></a>
            </div>
           
            <div class="col-12">
             <p class=""> &copy;copyright 2024.All rights Reserved</p>
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
            <li><a href="employerdashboard.php">Home</a></li>
            <li><a href="uploadjob.php">upload jobs</a></li>
            <li><a href="settings.php">settings</a></li>
            <li><a href="viewapplications.php">View applications</a></li>
            <li><a href="">Help</a></li>
        </ul>
        <div class="col-6">
            <form action="logout.php" method="post">
                <button class="btn btn-primary m-3">Log Out</button>
            </form>
            <p class="mx-3"><?php if(isset($user['employer_email'] )){
                echo $user['employer_email'] ;
            } ?></p>
        </div>
       
      </div>
   

    <script src="../jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".ff").hover(function(){
                $(this).children("div").slideToggle(100).siblings("a").children("span").toggleClass("fa-xmark")
            })
           

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
            $("#state").change(function(){
                var state_id = $("#state").val();
                $.ajax({
                    url: "process/ajaxserver.php",
                    method: "post",
                    data: state_id,
                    dataType: "json",
                    success: function(res){
                        if(res.success==false){
                            $("#view").show()
                            $("#view").html("<div class='alert alert-danger'>"+res.message+"</div>")
                            $("#lgadiv").hide();
                        $("#lga").empty();
                        }else{
                            $("#view").hide()
                        $("#lgadiv").show();
                        $("#lga").empty();
                      res.forEach(element => {
                        $("#lga").append("<option value='"+element['lga_id']+"'>"+element['lga_name']+"</option>")
                      });}
                        
                    },
                })
            })
            var count = 1;
            $(".add").click(function(event){
                event.preventDefault()
               if(count>5){
                alert("Maximum number of requirements reached")
               }else{
                count++
                $(".req").append(`<input type="text" name="req[]" class="form-control req${count}" placeholder="input requirement ${count}" >`);
               
               }
            })
            $(".delete").click(function(event){
                event.preventDefault()
                if(count<=1){
                alert("Cannot remove requirements again")
               }else{
             
              $(".req"+count).remove()
                count--
               }
            })

        })

    </script>
   
    <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>   








      