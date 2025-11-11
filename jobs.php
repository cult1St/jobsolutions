<?php

$active_page = 'jobs';

require_once "partials/header.php";
//get all categories
require_once "classes/Employer.php";

$class = new Employer;
$categories = $class->job_cat();

$total_jobs = $class->get_current_jobs();
//now lets generate a draw for them4 per page
$draw = count($total_jobs) / 4;
//round it up
$draw = round($draw, 0, 0.5);



?>


<div class="page-heading about-heading header-text"
  style="background-image: url(assets/images/heading-6-1920x500.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>Find your dream jobs here</h4>
          <h2>Jobs</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="products">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="contact-form">
          <form action="#">

            <h5 style="margin-bottom: 15px">Category</h5>

            <?php
            foreach ($categories as $category):
              ?>
              <div>
                <label>
                  <input type="checkbox" name="categories[]" value="<?= $category['jobCat_id'] ?>">

                  <small><?= $category['jobCat_name'] ?></small>
                </label>
              </div>

            <?php
            endforeach;
            ?>

          </form>
        </div>
      </div>

      <div class="col-md-9">
        <div class="row">
          <?php
          foreach ($total_jobs as $job):
            ?>
            <div class="col-md-6">
              <div class="product-item">
                <a href="<?= base_url() ?>/user/viewjobs.php?jid=<?= $job['jobVacancy_id'] ?>"><img
                    src="assets/images/product-1-370x270.jpg" alt=""></a>
                <div class="down-content">
                  <a href="<?= base_url() ?>/user/viewjobs.php?jid=<?= $job['jobVacancy_id'] ?>">
                    <h4><?php echo ucfirst($job['jobVacancy_title']) ?></h4>
                  </a>

                  <h6>$ <?= $job['vacancy_salaryRange'] ?></h6>

                  <h4><small><i class="fa fa-briefcase"></i> <?php echo ucfirst($job['qualification']) ?> <br> <strong><i
                          class="fa fa-building"></i> <?php echo $job['employer_companyName'] ?></strong></small></h4>

                  <small>
                    <strong class="m-1" title="Posted on"><i
                        class="fa fa-calendar m-1"></i><?= date("d-m-Y", strtotime($job['dateClosed'])) ?></strong>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <strong title="Type"><i class="fa fa-file m-1"></i> <?= $job['work_type'] ?></strong>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <strong title="Location"><i class="fa fa-map-marker"></i>
                      <?= ucfirst($job['lga_name']) ?>,<?= $job['state_name'] ?></strong>
                  </small>
                </div>
              </div>
            </div>
            <?php
          endforeach;
          ?>
          <div class="col-md-12">
            <ul class="pages">

              <?php for ($n = 1; $n <= $draw; $n++) { ?>
                <li><a href="?<?= $_SERVER['QUERY_STRING']; ?>&draw=<?= $n ?>"><?= $n ?></a></li>

              <?php } ?>

              <!-- <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php
require_once "partials/footer.php";