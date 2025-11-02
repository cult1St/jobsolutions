<?php
require_once "classes/Employer.php";
$employer = new Employer;
require_once "classes/User.php";
$user = new User;
$fetchss = $employer->fetch_vacancies_for_users();
$active_page = 'contact';
require_once "partials/header.php";

?>

<!-- Page Content -->
<div class="page-heading contact-heading header-text"
  style="background-image: url(assets/images/heading-4-1920x500.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>get in touch</h4>
          <h2>Contact JobSolutions</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="find-us">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Our Location</h2>
        </div>
      </div>
      <div class="col-md-8">
        <!-- Update with your actual office address or main location -->
        <div id="map">
          <iframe src="https://maps.google.com/maps?q=Lagos,+Nigeria&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%"
            height="330px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-md-4">
        <div class="left-content">
          <h4>Our Office</h4>
          <p>We’re here to help you with job listings, applications, and recruitment solutions.
            You can reach out to us for support, partnership inquiries, or platform-related questions.<br><br>
            Our team is available Monday to Friday, 9AM - 5PM WAT.</p>
          <p><strong>Email:</strong> support@jobsolutions.com<br>
            <strong>Phone:</strong> +234 800 123 4567
          </p>
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

<div class="send-message">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Send Us a Message</h2>
          <p>Have a question or need assistance? Fill out the form below and our team will respond promptly.</p>
        </div>
      </div>
      <div class="col-md-8">
        <div class="contact-form">
          <form id="contact" action="#" method="post">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <fieldset>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                </fieldset>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12">
                <fieldset>
                  <input name="email" type="email" class="form-control" id="email" placeholder="E-Mail Address"
                    required="">
                </fieldset>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12">
                <fieldset>
                  <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message"
                    required=""></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-4">
        <img src="assets/images/support-team.jpg" class="img-fluid" alt="Customer Support">
        <h5 class="text-center" style="margin-top: 15px;">JobSolutions Support Team</h5>
        <p class="text-center">Here to guide you through job postings, applications, and hiring.</p>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function () {
    $("#contact").submit(function (e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        url: 'ajax_calls.php',
        method: 'post',
        data: formData,
        dataType: 'json',
        success: function (res) {
          alert(res.message);
          if(res.success == true){
            var fields = ['name', 'email', 'subject', 'message'];

            fields.forEach((v, i) => {
              document.getElementById(v).value = '';
            })
          }
        },
        error: function (xhr, request, error) {
          alert('An Error Occurred');
          console.log(xhr, request, error);
        }
      })
    });
  });
</script>
<?php
require_once "partials/footer.php";
?>