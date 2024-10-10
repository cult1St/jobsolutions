<?php 
  
?>

<?php
require_once "classes/Employer.php";
    $employer = new Employer;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header("location:index.php");
        exit();
    }
    $fetchss = $employer->fetch_vacancies_by_cat($id);
    $cat = $employer->get_cat_by_id($id);
    empty($fetchss) ? $_SESSION['searchmsg']= "No jobs for this category" : "";
    require_once "partials/header.php";
  str_replace("hello", " ", "")
   
?>

      
        
        <div class="row mx-3 my-3">
            <?php
            if(isset($_SESSION['searchmsg'])){
                echo '<div class="badge bg-info">'.$_SESSION['searchmsg'].'</div>';
                unset($_SESSION['searchmsg']);
            }

            ?>
                <h3 class="text-info">
                    Available jobs for        <a href="categories.php?id=<?php  echo $cat['jobCat_id'] ?>" class="text-primary"><?php echo $cat['jobCat_name'] ?>  </a>       </h3>
                <?php
                if(isset($fetchss) && !empty($fetchss)){
             
                foreach ($fetchss as $fetch) {
                    $exp_date = $fetch['dateClosed'];
                    $today_date = date('Y-m-d');
                    $exp_date = strtotime($exp_date);
                    $today_date = strtotime($today_date);
                    if($today_date<$exp_date){
                ?>
                
                <div class="col-4 col-md-4 my-1" style="border: 1px solid grey">
            <h3 style="text-align: center;"><?php echo $fetch['employer_companyName'] ?></h3>
            <label for="">Role</label>
            <input type="text" disabled class="form-control" value="<?php echo ucfirst($fetch['jobVacancy_title']) ?>">
            <label for="">Qualification</label>
            <input type="text" disabled class="form-control" value="<?php echo ucfirst($fetch['qualification']) ?>">
            <p>Signup or login in order to apply</p>
            <a href="login.php" class="btn btn-primary mx-5">Apply</a>
        </div>
                <?php
                    }
                }
            }
                ?>
           
        </div>
       
        <div class="row hero my-5">
            <h2 style="text-align: center;">Job Categories Available</h2>
          <?php 
    $cats = $employer->fetch_categories();
            foreach($cats as $cat){
          ?>
       <div class="col-md-4">
        <a href="categories.php?id=<?php  echo $cat['jobCat_id'] ?>"><?php echo $cat['jobCat_name'] ?></a>
       </div>
        <?php
            }
           
            require_once "partials/footer.php";
        ?>