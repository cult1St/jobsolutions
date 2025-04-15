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
                <h2 class="text-primary">Forget Password</h2>
                <form method="post" action="process/process_fpasswordemail.php" class="form-control">
                    <div class="row">
                        <div class="col">
                        <h4 class="text-warning">Enter Your Email to recover your account</h4>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" id="" class="form-control">
                                <label for="">Email</label>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <button value="btn" type="submit" class="btn btn-primary" name="btn">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>