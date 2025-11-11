<?php 
session_start();
require_once "partials/header.php";
?>
    <div class="container mt-5">
        <div class="row justify-content-center mt-5">

            <div class="col-8 card mt-5">
            <?php if(isset($_SESSION['errormsg'])){
    echo '<div class="col-6 offset-3 alert alert-danger">'.$_SESSION['errormsg'].'</div>';
    unset($_SESSION['errormsg']);
} ?>
                <h2 class="text-primary">Change Password</h2>
                <form method="post" action="process/changepasswordemail.php" class="form-control">
                    <div class="row">
                        <div class="col">
                        <h4 class="text-warning">Change your password</h4>
                        <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Enter Your Password" id="" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon2"><span class="fa-regular fa-eye"></span></button>
                                <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon2" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                              </div>
                              <p style="color: red;display: none;" id="para5" >Enter password</p>
                              <label for="pass2">Confirm Password</label>
                              <div class="input-group mb-3">
                                <input type="password" name="cpassword" class="form-control" id="" placeholder="Enter Your Password" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon2"><span class="fa-regular fa-eye"></span></button>
                                <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon2" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                              </div>      
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <button value="btn" type="submit" class="btn btn-primary" name="change">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="jquery-3.7.1.min.js"></script>
    <script src="login.js" ></script>
</body>
</html>