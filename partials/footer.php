
    <?php  require_once "partials/minfooter.php"; ?>


    <script src="bootstrap/js/bootstrap.min.js"></script>
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
            $(".tanglebtn").click(function(){
                $(this).siblings("ul").toggle(1000);
            })
        })
    </script>
</body>
</html>