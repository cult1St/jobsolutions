<!-- <div class="row"  id="contact" >
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
     -->

     
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © <?= date("Y") ?> momoduwealth.com.ng</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    </div>
  </div>
</div> 

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>
</html>



    <script src="jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".ff").hover(function(){
                $(this).children("div").slideToggle(100).siblings("a").children("span").toggleClass("fa-xmark")
            })
            $(".ff").click(function(){
                $(this).children("div").slideToggle(100).siblings("a").children("span").toggleClass("fa-xmark")
            })
          
             
            // $(".buttonspan").children("button").click(function(){
            //     $(".ff").children("div").slideToggle(1000);
            // })
        })
    </script>
</body>
</html>