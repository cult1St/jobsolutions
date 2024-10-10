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

        })

    </script>
    <script src="ajaxserver.js"></script>
   
    <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>   