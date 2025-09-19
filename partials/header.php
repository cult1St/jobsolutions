<?php
//write some global functions


if (!function_exists('base_url')) {
  function base_url($url = "")
  {
    // Determine the protocol (HTTP or HTTPS)
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';

    // Get the host (e.g., example.com)
    $host = $_SERVER['HTTP_HOST'];

    // Get the directory path of the current script (without the file name)
    $basePath = dirname($_SERVER['PHP_SELF']);

    // Make sure the base path has a trailing slash
    $basePath = rtrim($basePath, '/') . '/';

    // Construct and return the base URL
    return $protocol . '://' . $host . $basePath . "/" . $url;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="My job Solutions web is a website with the sole imterest of helping Nigerians get a job of their choice without the stress of going about with their CVs ">
  <meta name="keywords" content="jobs in lagos">
  <meta property="og:image" content="images/logo">
  <link rel="icon" href="images/logo">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
    rel="stylesheet">

  <title>Job Solutions </title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="fontawesome/css/all.css">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">

  <script src="jquery-3.7.1.min.js"></script>

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="row">
          <header style="width:100% !important" class="">
            <nav class="navbar  navbar-expand-lg">
              <div class="container">
                <a class="navbar-brand" href="index.php">
                  <h2>Job <em>Solutions</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                  aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home

                      </a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="<?= base_url('jobs.php') ?>">Jobs</a></li>

                    <li class="nav-item"><a class="nav-link" href="<?= base_url('about.php') ?>">About us</a></li>

                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">More</a>

                      <div class="dropdown-menu">
                        <?php
                        if (!isset($_SESSION['user_id'])) {
                          echo '  <a class="dropdown-item" href="login.php">Login As A Job Seeker</a>';
                        }
                        if (!isset($_SESSION['useronline'])) {
                          echo '  <a class="dropdown-item" href="employer.php">Login As An Employer</a>';
                        }
                        ?>
                        <!-- <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                        <a class="dropdown-item" href="terms.html">Terms</a> -->
                      </div>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="<?= base_url('contact.php') ?>">Contact Us</a></li>
                  </ul>
                </div>
              </div>
            </nav>
          </header>

        </div>
        <!-- Header -->