
<?php
    session_start();
    require_once "userguard.php";
    require_once "../classes/Employer.php";
    $employer = new Employer;
    $user = $employer->get_user_by_id($_SESSION['useronline']);  
    //$fetchs = $employer->fetch_vacancies($_SESSION['useronline']);
    
    
    require_once "partials/header.php";
    if($_POST['application']){
        $id = $_POST['id'];
        $fetchs = $employer->fetch_applications($_SESSION['useronline'], $id);
    }else{
        header('location:viewapplications.php');
    }


?>

        <!-- <div class="row">
            <div class="col card">
                <div class="card-header">
                    <i class="fa fa-table"></i>
                    <h3 class="text-primary">
                        Job Applications
                    </h3>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="row"> -->
            <div class="row"><div class="col-2"> <a href="viewapplications.php" class="btn btn-warning">Go Back</a></div>
</div>
            <div class="col mt-5 card">
                <div class="card-header">
                    <i class="fa fa-table"></i>
                    <h3 class="text-primary">
                        Applications
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                           <tr>
                            <th>
                                S/N
                            </th>
                            <th>
                               Name
                            </th>
                            <th>
                                Match Requirements
                            </th>
                            <th>
                                Action
                            </th>
                            
                           </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n=1;
                            if(!empty($fetchs)){
                            foreach ($fetchs as $fetch) {
                                
                                $reqs = $employer->fetch_requirements($fetch['jobVacancy_id']);
                                if(!empty($reqs)){
                                    $file = $fetch['application_CV'];
                                    require "../vendor2/vendor/autoload.php";
                                    // Parse PDF file and build necessary objects.
                                    $parser = new \Smalot\PdfParser\Parser();
                                    $pdf = $parser->parseFile("../applicationfiles/$file");
                                   
                                    
                                    $text = $pdf->getText();
                                    $text = strtolower($text);
                                    $b = 1;
                                    foreach($reqs as $req){
                                      
                                        $contains = stripos($text, $req['req_text']);
                                     
                                        if($contains){
                                            $rate = $employer->add_rating($n, $fetch['application_id']);
                                            $b++;
                                        }
                                    }
                                }
                            ?>
                            <tr>
                                <td>
                                    <?php echo $n++ ?>
                                </td>
                                <td>
                                    <?php echo $fetch['jobSeeker_firstName']." ". $fetch['jobSeeker_lastName'] ?>
                                </td>
                               <td>
                                <?php echo $fetch['application_rating'] ?>
                               </td>
                                <td>
                                    <form action="details.php" method="post">
                                        <input type="hidden" name="app_id" value="<?php echo $fetch['application_id']?>">
                                        <input type="hidden" name="id" value="<?php echo $fetch['jobSeeker_id']?>">
                                        <button type="submit" name="details" value="details" class="btn btn-warning noround">View Details</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                            }
                        }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    


<?php
    require_once "partials/footer.php";

?>





