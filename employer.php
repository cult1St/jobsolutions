<?php
session_start();
require_once "classes/Employer.php";
require_once "partials/global_functions.php";
$cat1 = new Employer;
//$cats = $cat1->fetch_cat();
$states = $cat1->fetch_state();

if (isset($_SESSION['useronline']) && !empty($_SESSION['useronline'])) {
    header("location: " . base_url("userfiles/dashboard.php"));
}

require_once "partials/header.php";

$step = isset($_GET['step']) && !empty($_GET['step']) ? $_GET['step'] : "login";

$display_none = "style='display:none'";
$display_block = "style='display:block'";
?>

<div style="margin-top: 200px;" class="banner find row justify-content-center my-5">
    <?php if ($step == "login"): ?>
        <div class="col-sm-5 card shadow p-4 border-0" <?= $step == "login" ? $display_block : $display_none ?> style="background:#fff;">
            <h4 class="text-center fw-bold mb-3" style="color:#b30000;">Welcome Back</h4>
            <p class="text-center text-muted mb-4">Login to access your portal</p>

            <?php if (isset($_SESSION['errormsg'])): ?>
                <div class="alert alert-danger text-center"><?= $_SESSION['errormsg']; unset($_SESSION['errormsg']); ?></div>
            <?php endif; ?>

            <form action="employerfiles/process/loginprocess.php" method="post">
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
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="employerfiles/forgetpasswordform.php" class="text-decoration-none" style="color:#b30000;">Forgot Password?</a>
                </div>

                <button name="login" value="login" type="submit" class="btn w-100 fw-bold" style="background:#b30000;color:white;">Login</button>

                <p class="text-center mt-3 text-muted">
                    New to our platform?
                    <a href="?step=signup" class="fw-bold text-decoration-none" style="color:#b30000;">Create Account</a>
                </p>
            </form>
        </div>
    <?php endif; ?>

    <?php if ($step == "signup"): ?>
        <div class="col-sm-7 card shadow p-4 border-0" <?= $step == "signup" ? $display_block : $display_none ?> style="background:#fff;">
            <h4 class="text-center fw-bold mb-3" style="color:#b30000;">Create Your Account</h4>
            <p class="text-center text-muted mb-4">Start your journey with us</p>

            <?php if (isset($_SESSION['errormsg'])): ?>
                <div class="alert alert-danger text-center"><?= $_SESSION['errormsg']; unset($_SESSION['errormsg']); ?></div>
            <?php endif; ?>

            <form action="employerfiles/process/signupprocess.php" method="post">
                <div class="firstform">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstname">Firstname</label>
                            <input type="text" name="firstname" id="firstname" placeholder="Enter Your FirstName" class="form-control">
                            <small class="text-danger d-none" id="paraone">Please input your firstname</small>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname" id="lastname" placeholder="Enter Your LastName" class="form-control">
                            <small class="text-danger d-none" id="para2">Please input your lastname</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="ogname">Name Of Organisation</label>
                            <input type="text" name="ogname" id="ogname" placeholder="Enter Your Organisation Name" class="form-control">
                            <small class="text-danger d-none" id="parafour">Please input your organisation name</small>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter Your Email" class="form-control">
                            <small class="text-danger d-none" id="para4">Enter Your Email</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pass1">Choose Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="pass1" placeholder="Enter Your Password">
                                <button class="btn btn-outline-dark passbtn" type="button"><i class="fa-regular fa-eye"></i></button>
                                <button class="btn btn-outline-dark passbtn2 d-none" type="button"><i class="fa-regular fa-eye-slash"></i></button>
                            </div>
                            <small class="text-danger d-none" id="para5">Enter password</small>
                        </div>
                        <div class="col-md-6">
                            <label for="pass2">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" name="cpassword" class="form-control" id="pass2" placeholder="Confirm Your Password">
                                <button class="btn btn-outline-dark passbtn" type="button"><i class="fa-regular fa-eye"></i></button>
                                <button class="btn btn-outline-dark passbtn2 d-none" type="button"><i class="fa-regular fa-eye-slash"></i></button>
                            </div>
                            <small class="text-danger d-none" id="para6">Passwords must match</small>
                        </div>
                    </div>

                    <div class="mb-3 text-start">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="agree" id="agree">
                            <label class="form-check-label">
                                I agree with the terms and conditions
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn w-100 fw-bold" style="background:#b30000;color:white;" value="register" name="signup" id="submiting" disabled>Register</button>

                    <p class="text-center mt-3 text-muted">
                        Already have an account?
                        <a href="?step=login" class="fw-bold text-decoration-none" style="color:#b30000;">Login</a>
                    </p>
                </div>
            </form>
        </div>
    <?php endif; ?>
</div>

<style>
.form-control:focus {
    border-color: #b30000;
    box-shadow: 0 0 0 0.2rem rgba(179, 0, 0, 0.25);
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Password toggle
    document.querySelectorAll(".passbtn, .passbtn2").forEach(btn => {
        btn.addEventListener("click", function () {
            const input = this.closest(".input-group").querySelector("input");
            input.type = input.type === "password" ? "text" : "password";
            this.closest(".input-group").querySelectorAll(".passbtn, .passbtn2").forEach(b => b.classList.toggle("d-none"));
        });
    });

    // Enable register button when checkbox is ticked
    const agreeCheckbox = document.getElementById("agree");
    const submitBtn = document.getElementById("submiting");
    if (agreeCheckbox) {
        agreeCheckbox.addEventListener("change", function () {
            submitBtn.disabled = !this.checked;
        });
    }
});
</script>

<?php require_once "partials/footer.php"; ?>
