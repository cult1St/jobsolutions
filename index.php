<?php
require_once "classes/Employer.php";
require_once "classes/User.php";
require_once "classes/ORM.php";
require_once "partials/header.php";
require_once "partials/banner.php";

$employer = new Employer;
$user = new User;
$fetchss = $employer->fetch_vacancies_for_users();
$blogs = ORM::table('blogs')->orderBy('created_at', 'desc')->get(3);
?>

<!-- Hero Section -->
<div class="container my-5">
  <div class="row align-items-center justify-content-between">
    <!-- Text Column -->
    <div class="col-12 col-md-6 mb-4 mb-md-0 text-center text-md-start">
      <h1 class="text-info fw-bold">
        Find your dream job today with <strong>Job Solutions</strong>.
      </h1>
      <h4 class="mt-3 text-secondary">
        Join thousands of job seekers already connecting with top employers across Nigeria.
      </h4>
      <a href="login.php?step=signup" class="btn btn-primary mt-4 px-4 py-2">Get Started</a>
    </div>

    <!-- Image Column -->
    <div class="col-12 col-md-5 text-center">
      <img src="images/jobs.jpeg" alt="Job search" class="img-fluid rounded shadow-lg">
    </div>
  </div>
</div>

<!-- Featured Jobs -->
<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Featured Jobs</h2>
          <a href="jobs.php">View all <i class="fa fa-angle-right"></i></a>
        </div>
      </div>

      <?php if (!empty($fetchss)): ?>
        <?php foreach ($fetchss as $key => $fetch): ?>
          <?php if ($key < 3): 
            $state = $user->get_state_by_id($fetch['states_id']);
            $lga = $user->get_lga_by_id($fetch['lga']);
          ?>
          <div class="col-md-4">
            <div class="product-item">
              <a href="<?= base_url() ?>/user/viewjobs.php?jid=<?= $fetch['jobVacancy_id'] ?>">
                <img src="assets/images/product-1-370x270.jpg" alt="Job image">
              </a>
              <div class="down-content">
                <a href="<?= base_url() ?>/user/viewjobs.php?jid=<?= $fetch['jobVacancy_id'] ?>">
                  <h4><?= ucfirst($fetch['jobVacancy_title']); ?></h4>
                </a>

                <h6>₦<?= htmlspecialchars($fetch['vacancy_salaryRange']); ?></h6>
                <h4>
                  <small>
                    <i class="fa fa-briefcase"></i> <?= ucfirst($fetch['qualification']); ?><br>
                    <strong><i class="fa fa-building"></i> <?= htmlspecialchars($fetch['employer_companyName']); ?></strong>
                  </small>
                </h4>

                <small>
                  <strong class="m-1" title="Deadline">
                    <i class="fa fa-calendar m-1"></i><?= date("d-m-Y", strtotime($fetch['dateClosed'])); ?>
                  </strong>
                  &nbsp;&nbsp;
                  <strong title="Type">
                    <i class="fa fa-file m-1"></i> <?= htmlspecialchars($fetch['work_type']); ?>
                  </strong>
                  &nbsp;&nbsp;
                  <strong title="Location">
                    <i class="fa fa-map-marker"></i> <?= $lga['lga_name']; ?>, <?= $state['state_name']; ?>
                  </strong>
                </small>
              </div>
            </div>
          </div>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12">
          <p class="text-muted">No featured jobs available at the moment. Please check back later.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Employer CTA Section -->
<div class="best-features">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>For Employers</h2>
        </div>
      </div>

      <div class="col-md-6">
        <div class="left-content">
          <h4>Looking for the right talent?</h4>
          <p>Post your job openings and reach thousands of qualified candidates on Job Solutions.</p>
          <a href="employer.php" class="filled-button">Post a Job</a>
        </div>
      </div>

      <div class="col-md-6">
        <div class="right-image">
          <img src="<?= base_url(); ?>/assets/images/about-1-570x350.jpg" alt="Employers" class="img-fluid rounded">
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Blog Section -->
<div class="services" style="background-image: url(<?= base_url(); ?>/assets/images/other-image-fullscren-1-1920x900.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>From Our Blog</h2>
          <a href="blogs.php">Read more <i class="fa fa-angle-right"></i></a>
        </div>
      </div>

      <?php if ($blogs && !empty($blogs)): ?>
        <?php foreach ($blogs as $blog): ?>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="blog-details.php?id=<?= $blog['id'] ?>" class="services-item-image">
                <img src="assets/images/blog-1-370x270.jpg" class="img-fluid" alt="<?= htmlspecialchars($blog['title']) ?>">
              </a>
              <div class="down-content">
                <h4><a href="blog-details.php?id=<?= $blog['id'] ?>"><?= htmlspecialchars($blog['title']) ?></a></h4>
                <p class="text-muted">By Admin | <?= date("d/m/Y", strtotime($blog['created_at'])) ?> | <?= $blog['views'] ?? 0 ?> views</p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12">
          <p>No blogs available yet.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Testimonials -->
<div class="happy-clients">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>What Our Users Say</h2>
          <a href="testimonials.php">See all <i class="fa fa-angle-right"></i></a>
        </div>
      </div>

      <div class="col-md-12">
        <div class="owl-clients owl-carousel text-center">
          <div class="service-item">
            <div class="icon"><i class="fa fa-user"></i></div>
            <div class="down-content">
              <h4>Emeka U.</h4>
              <p class="n-m"><em>"I got my first remote job through Job Solutions within two weeks!"</em></p>
            </div>
          </div>

          <div class="service-item">
            <div class="icon"><i class="fa fa-user"></i></div>
            <div class="down-content">
              <h4>Fatima A.</h4>
              <p class="n-m"><em>"Posting a job as an employer was seamless — I hired two great developers!"</em></p>
            </div>
          </div>

          <div class="service-item">
            <div class="icon"><i class="fa fa-user"></i></div>
            <div class="down-content">
              <h4>Oluwaseun T.</h4>
              <p class="n-m"><em>"The job alerts and recommendations really helped me stay updated."</em></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Call to Action -->
<div class="call-to-action">
  <div class="container">
    <div class="inner-content">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h4>Ready to take the next step in your career?</h4>
          <p>Join Job Solutions today and connect with verified employers offering real opportunities.</p>
        </div>
        <div class="col-lg-4 col-md-6 text-end">
          <a href="contact.php" class="filled-button">Contact Us</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once "partials/footer.php"; ?>
