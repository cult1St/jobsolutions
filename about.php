<?php
require_once "classes/Employer.php";
$employer = new Employer;
require_once "classes/User.php";
$user = new User;
$fetchss = $employer->fetch_vacancies_for_users();
require_once "partials/header.php";

?>



<!-- Page Content -->
<div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-1-1920x500.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>about us</h4>
          <h2>JobSolutions</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="best-features about-features">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Connecting Talent with Opportunity</h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="right-image">
          <img src="assets/images/about-1-570x350.jpg" alt="About JobSolutions">
        </div>
      </div>
      <div class="col-md-6">
        <div class="left-content">
          <h4>Our Mission</h4>
          <p>At JobSolutions, we are passionate about bridging the gap between employers and job seekers. 
            Our platform is designed to make recruitment faster, smarter, and more efficient for businesses, 
            while helping job seekers find meaningful opportunities that match their skills and career goals.<br><br>
            We focus on creating a simple yet powerful job search and recruitment experience by combining 
            user-friendly design, robust technology, and a commitment to excellent support.</p>
          <ul class="social-icons">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="team-members">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Why Choose JobSolutions</h2>
        </div>

        <h5>Making Recruitment Seamless</h5>

        <p>Whether you are a company looking to hire top talent or a job seeker searching for your next 
          career move, JobSolutions provides the tools and resources to make the process easy. 
          Our platform offers real-time job listings, resume uploads, candidate filtering, and 
          a secure communication system between employers and applicants.</p>

        <p>We believe in transparency, efficiency, and results. Our goal is to ensure that every user—employer 
          or job seeker—has a smooth, reliable, and productive experience. We are constantly improving 
          our features to meet the evolving needs of the job market and empower individuals and businesses 
          to thrive.</p>
      </div>
    </div>
  </div>
</div>

<?php
require_once "partials/footer.php";
?>