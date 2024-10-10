<?php
    session_start();
    if (isset($_POST['id'])){
        $id = $_POST['id'];
        $_SESSION['editid'] = $id;
    }

    require_once "userguard.php";
    require_once "../classes/Employer.php";
    $cat1 = new Employer;
    $cats = $cat1->fetch_cat() ;
    $states = $cat1->fetch_state() ;
    $fetch = $cat1->selectVacancyById($id) ;
    //var_dump($fetch);
    require_once "partials/header.php";
    $range = $fetch['vacancy_salaryRange'];
    $newRange = explode("-",$range);
    $lga = $cat1->get_lga_by_state($fetch['states_id']);

?>
  
     
      <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h3 class="text-info">
                Post a job
            </h3>
            <form action="process/editprocess.php" method="post" class="form-control">
                <div class="form-floating mb-3">
                    <input type="text" name="role" id="" class="form-control" value="<?php echo $fetch['jobVacancy_title']  ?>">
                    <label for="role">Change Role</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="qualification" id="" class="form-control" value="<?php echo $fetch['qualification']  ?>">
                    <label for="qualification">Change Qualification</label>
                </div>
                <div class="input-group mb-3">
                    <input type="number" name="low" id="low" class="form-control" value="<?php echo $newRange[0] ?>" placeholder="Minimum Salary expectation">-
                    <input type="number" name="high" id="high" class="form-control" value="<?php echo $newRange[1] ?>" placeholder="Maximum Salary Expectation">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="type" id="" class="form-control" value="<?php echo $fetch['work_type']  ?>">
                    <label for="type">Change Work Type</label>
                </div>
                <div class="mb-3">
                    <input type="date" name="closingdate" id="date" class="form-control" value="<?php echo $fetch['dateClosed']  ?>">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="desc" id="desc" cols="30" rows="10" placeholder="Enter Job Description" value="<?php echo $fetch['vacancy_description']  ?>"><?php echo $fetch['vacancy_description']  ?></textarea>
                </div>
                <div class="mb-3">
                    <select name="cat" id="cat" class="form-select">
                        <option value="">Select Job Category</option>
                        <?php
                        foreach ($cats as $cat) {
                           
                        ?>
                        
                        <option <?php echo $cat['jobCat_id'] == $fetch['jobCat_id'] ? "selected" : "";  ?> value="<?php echo $cat['jobCat_id'] ?>"><?php echo $cat['jobCat_name'] ?></option>

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
                        <option <?php echo $state['state_id'] == $fetch['states_id'] ? "selected" : "" ?> value="<?php echo $state['state_id'] ?>"><?php echo $state['state_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div id="view"></div>
                <div class="mb-3" id="lgadiv" >
                <label for="">Local Government Area</label>
                        <select name="lga" id="lga" class="form-select">
                        <?php
                        foreach ($lga as $state) {

                        ?>
                        <option <?php echo $state['lga_id'] == $fetch['lga'] ? "selected" : "" ?> value="<?php echo $state['lga_id'] ?>"><?php echo $state['lga_name'] ?></option>
                        <?php
                        }
                        ?>
                        </select>
                </div>
                <div class="m-2">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
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

        })

    </script>
   
    <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>   









      