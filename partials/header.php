<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="My job Solutions web is a website with the sole imterest of helping Nigerians get a job of their choice without the stress of going about with their CVs ">
    <meta name="keywords" content="jobs in lagos">
    <meta property="og:image" content="images/logo">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    
    <title>My Job Solutions</title>
   
</head>
<body>
    <div class="container">
        <div class="row navigation">
            <div class="col-1 ">
                <a href="index.php">
                <img id="logo" src="images/logo.png" style="width: 100px;" alt="my logo" class="img-fluid">
                </a>
            </div>
            <div class="col col-md-3 ff">
                
                <a id="linking1" href="#" class="">Job Seekers<span class='fa fa-chevron-down' style="margin-left: 5px;"></span></a>
                <div class="jobseekdropdown">
                    <a href="login.php" style="border-bottom: 1px solid black;">Create an account</a>
                    <a href="login.php" style="border-top: 1px solid black;border-bottom: 1px solid black">upload CV</a>
                    <a href="#jobcat" style="border-top: 1px solid black">Job Vacancies</a>
                </div>
            </div>
            <div class="col col-md-3 ff">
                <a id="linking2" href="#" class="" >Employers<span class='fa fa-chevron-down' style="margin-left: 5px;"></span></a>
                <div class="employerdropdown">
                    <a href="employer.php" style="border-bottom: 1px solid black;">Create an employer account</a>
                    <a href="#" style="border-top: 1px solid black;border-bottom: 1px solid black">Post Your Job Vacancies</a>
               </div>
            </div>
            <div class="col col-md-2 ff">
                <a id="linking2" href="#" class="" >Help<span class='fa fa-chevron-down' style="margin-left: 5px;"></span></a>
                <div class="employerdropdown">
                    <a href="#" >Faq </a>
                    <a href="#contact" >Contact Us</a>
               </div>
            </div>
            <div class="col col-md-3 lagin"><a href="login.php" style="color: rgb(32, 30, 30); text-decoration: none;">Create An Account | Login</a></div>
            <div class="col-2 buttonspan"><button class="mt-2"><span class="fa fa-bars "></span></button></div>
        </div>


        <nav class="navbar navbar-expand-lg bg-light d-md-none">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
                <img id="logo" src="images/logo.png" style="width: 100px;" alt="my logo" class="img-fluid">
                </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown1">
          <a class="nav-link tanglebtn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown1" aria-expanded="false">
            Job Seekers
          </a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="login.php" style="border-bottom: 1px solid black;">Create an account</a>
                </li>
            <li><a class="nav-link" href="login.php" style="border-top: 1px solid black;border-bottom: 1px solid black">upload CV</a>
                   </li>
            <li> <a href="#jobcat" class="nav-link" style="border-top: 1px solid black">Job Vacancies</a></li>
          
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link tanglebtn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Employers
          </a>
          <ul class="dropdown-menu">
            <li> <a href="employer.php" style="border-bottom: 1px solid black;">Create an employer account</a>
           </li>
            <li><a href="#" style="border-top: 1px solid black;border-bottom: 1px solid black">Post Your Job Vacancies</a></li>
            
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link">Disabled</a>
        </li>
      </ul>
     
    </div>
  </div>
</nav>