<?php
    session_start();
    require_once "classes/Employer.php";
    require_once "partials/global_functions.php";
    $cat1 = new Employer;
    $states = $cat1->fetch_state();

    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
        header("location: ". base_url("user/dashboard.php"));
    }
    $active_page = 'signin';
    require_once "partials/header.php";

    $step = isset($_GET['step']) && !empty($_GET['step']) ? $_GET['step'] : "login";

    $display_none = "style='display:none'";
    $display_block = "style='display:block'";
?>

<style>
    body {
        background: #f8f9fa;
    }
    .auth-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        padding: 2rem;
        border-top: 5px solid #b30000;
    }
    .auth-card h4 {
        color: #b30000;
        font-weight: bold;
        text-align: center;
    }
    .form-control:focus {
        border-color: #b30000;
        box-shadow: 0 0 0 0.2rem rgba(179, 0, 0, 0.25);
    }
    .btn-red {
        background-color: #b30000;
        color: #fff;
        font-weight: bold;
        border: none;
    }
    .btn-red:hover {
        background-color: #990000;
    }
    a {
        color: #b30000;
    }
    a:hover {
        text-decoration: underline;
    }
</style>

<div style="margin-top: 150px;" class="banner find row justify-content-center my-5">
    <?php if($step == "login"): ?>
        <div class="col-sm-5 auth-card" <?= $step == "login" ? $display_block : $display_none ?>>
            <h4>Welcome Back</h4>
            <p class="text-center text-muted mb-4">Please login to access your portal</p>

            <?php if(isset($_SESSION['errormsg'])): ?>
                <div class="alert alert-danger text-center">
                    <?= $_SESSION['errormsg']; unset($_SESSION['errormsg']); ?>
                </div>
            <?php endif; ?>

            <form action="process/login_process.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Email</label>
                    <input type="email" name="email" id="username" class="form-control" placeholder="Enter your email" required>
                    <small class="text-danger d-none" id="para1">Enter Email</small>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input required name="password" type="password" id="password" class="form-control" placeholder="Enter your password">
                        <button class="btn btn-outline-dark passbtn" type="button"><i class="fa-regular fa-eye"></i></button>
                        <button class="btn btn-outline-dark passbtn2 d-none" type="button"><i class="fa-regular fa-eye-slash"></i></button>
                    </div>
                    <small class="text-danger d-none" id="paratwo">Enter password</small>
                    <div class="text-end mt-2">
                        <a href="forgetpasswordform.php">Forgot Password?</a>
                    </div>
                </div>

                <button name="login" value="login" type="submit" class="btn btn-red w-100 mb-3" id="looginbtn">Login</button>

                <p class="text-center text-muted">
                    New to our platform? <a href="?step=signup" class="fw-bold">Create Account</a>
                </p>
            </form>
        </div>
    <?php endif; ?>

    <?php if($step == "signup"): ?>
        <div class="col-sm-7 auth-card p-4" <?= $step == "signup" ? $display_block : $display_none ?>>
            <h4>Welcome, Your Journey Starts Here</h4>
            <p class="text-center text-muted mb-4">Create an account to get started</p>

            <?php if(isset($_SESSION['errormsg'])): ?>
                <div class="alert alert-danger text-center">
                    <?= $_SESSION['errormsg']; unset($_SESSION['errormsg']); ?>
                </div>
            <?php endif; ?>

            <form action="process/signup_process.php" method="post">
                <div class="firstform">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fname" class="form-label">Firstname</label>
                            <input type="text" name="firstname" id="firstname" placeholder="Enter Your FirstName" class="form-control">
                            <small class="text-danger d-none" id="paraone">Please input your firstname</small>
                        </div>
                        <div class="col-md-6">
                            <label for="lname" class="form-label">Lastname</label>
                            <input type="text" name="lastname" id="lastname" placeholder="Enter Your LastName" class="form-control">
                            <small class="text-danger d-none" id="para2">Please input your lastname</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="number" class="form-label">Phone Number</label>
                            <input type="text" name="number" id="number" placeholder="Enter Your Phone Number" class="form-control">
                            <small class="text-danger d-none" id="para3">Enter a valid number</small>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter Your Email" class="form-control">
                            <small class="text-danger d-none" id="para4">Enter Your Email</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pass1" class="form-label">Choose Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" placeholder="Enter Your Password" id="pass1">
                                <button class="btn btn-outline-dark passbtn" type="button"><i class="fa-regular fa-eye"></i></button>
                                <button class="btn btn-outline-dark passbtn2 d-none" type="button"><i class="fa-regular fa-eye-slash"></i></button>
                            </div>
                            <small class="text-danger d-none" id="para5">Enter password</small>
                        </div>
                        <div class="col-md-6">
                            <label for="pass2" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" name="cpassword" class="form-control" id="pass2" placeholder="Confirm Password">
                                <button class="btn btn-outline-dark passbtn" type="button"><i class="fa-regular fa-eye"></i></button>
                                <button class="btn btn-outline-dark passbtn2 d-none" type="button"><i class="fa-regular fa-eye-slash"></i></button>
                            </div>
                            <small class="text-danger d-none" id="para6">Password must match</small>
                        </div>
                    </div>

                    <div class="form-check mb-3 text-start">
                        <input class="form-check-input" type="checkbox" value="agree" id="agree">
                        <label class="form-check-label" for="agree">
                            I agree with the terms and conditions
                        </label>
                    </div>
                    <button type="submit" class="btn btn-red w-100" value="register" name="register" id="submiting" disabled>Register</button>

                    <p class="text-center mt-3 text-muted">Already have an account? <a href="?step=login" class="fw-bold">Login</a></p>
                </div>
            </form>
        </div>
    <?php endif; ?>
</div>

<script>
    $(document).ready(function(){
        $(".passbtn").click(function(){
            let input = $(this).siblings("input");
            input.attr("type","text");
            $(this).hide();
            $(this).siblings(".passbtn2").show();
        });
        $(".passbtn2").click(function(){
            let input = $(this).siblings("input");
            input.attr("type","password");
            $(this).hide();
            $(this).siblings(".passbtn").show();
        });
        $("#agree").change(function(){
            $("#submiting").prop("disabled", !this.checked);
        });
        $("#looginbtn").click(function(e){
            if($("#username").val() === ""){
                $("#para1").removeClass("d-none");
                e.preventDefault();
            }
            if($("#password").val() === ""){
                $("#paratwo").removeClass("d-none");
                e.preventDefault();
            }
        });
    });
</script>

<?php require_once "partials/footer.php"; ?>
