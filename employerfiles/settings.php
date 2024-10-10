<?php
session_start();    
    require_once "partials/header.php";

?>



        <div style="border: 0.1px solid black; background-color: rgb(250, 251, 251); border-radius: 30px;">
            <h1 class="text-secondary" style="text-align: center;">Change settings</h1>
          

           <div class="col-12  signup">
                <div class="row">
                    <div class="col-8 offset-2">
                        <?php
    if (isset($_SESSION["errormsg"])) {
        echo "<div class='alert alert-danger'>". $_SESSION["errormsg"] ."</div>";
        unset($_SESSION["errormsg"]);
    }
                        ?>
                       
                        <form action="process/processupdate.php" method="post" enctype="multipart/form-data">
                           <div class="firstform">
                            <label for="pass1">Change Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Enter Your Password" id="pass1" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon2"><span class="fa-regular fa-eye"></span></button>
                                <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon2" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                              </div>
                              <p style="color: red;display: none;" id="para5" >Enter password</p>
                              <label for="pass2">Confirm Password</label>
                              <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" id="pass2" placeholder="Enter Your Password" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon2"><span class="fa-regular fa-eye"></span></button>
                                <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon2" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                              </div>      
                              <p style="color: red;display: none;" id="para6">password should be the same with confirm password</p>                     
                            
                              <label for="ogname">change Name Of Organisation</label>
                              <input type="text" name="ogname" id="ogname" placeholder="Enter Your Organisation Name" class="form-control m-2">
                              <p style="color: red;display: none;" id="parafour">please input your firstname</p>
                              
                            <div class="row mb-3">
                                <label for="logo">Put Your Logo</label>
                                <input type="file" name="logo" id="" class="form-control">
                            </div>
                            <input type="hidden" name="id" value="<?php echo $_SESSION['useronline']?>">
                            <div class="mb-3">
                                <input type="submit" value="Update" name="update" class="btn btn-primary">
                            </div>                         
                             
                        </form>
                    </div>
                </div>
                </div>
                </div>
           </div>



<?php

require_once "partials/footer.php";
?>








      