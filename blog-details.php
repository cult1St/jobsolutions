<?php
require_once "classes/Employer.php";
$employer = new Employer;
require_once "classes/User.php";
require_once "classes/ORM.php";
$user = new User;
$fetchss = $employer->fetch_vacancies_for_users();
$active_page = 'blog';
$page_title = 'Blog Details';
require_once "partials/header.php";

$id = (int)($_GET['id'] ?? 0);
if (!$id) {
    echo "<div class='container'><h2>Invalid blog ID</h2></div>";
    require_once "partials/footer.php";
    exit;
}

$blog = ORM::table('blogs')->where(['id' => $id])->first();
if (!$blog) {
    echo "<div class='container'><h2>Blog not found</h2></div>";
    require_once "partials/footer.php";
    exit;
}

// Update views
ORM::table('blogs')->update([
    "views" => ($blog['views'] ?? 0) + 1,
], [
    "id" => $id
], true);
?>


<!-- Page Content -->
<div class="page-heading about-heading header-text"
    style="background-image: url(assets/images/heading-6-1920x500.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4><i class="fa fa-user"></i> Admin &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-calendar"></i>
                        <?= date("d/m/Y H:i", strtotime($blog['created_at'])) ?> &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-eye"></i> <?= $blog['views'] + 1 ?></h4>
                    <h2><?= htmlspecialchars($blog['title']) ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2><?= htmlspecialchars($blog['title']) ?></h2>
                </div>
            </div>

            <div class="col-md-8">
                <div class="blog-content">
                    <?= $blog['content'] ?>
                </div>
                <br>
                <a href="blogs.php" class="btn btn-primary">Back to Blogs</a>

            </div>

            <div class="col-md-4">
                <div class="left-content">
                    <h4>Recent Blogs</h4>
                    <br>
                    <?php
                    $recentBlogs = ORM::table('blogs')->orderBy('created_at', 'desc')->get(5);
                    if ($recentBlogs):
                        foreach ($recentBlogs as $recent):
                            if ($recent['id'] != $id):
                    ?>
                        <p><a href="blog-details.php?id=<?= $recent['id'] ?>"><?= htmlspecialchars($recent['title']) ?></a></p>
                    <?php
                            endif;
                        endforeach;
                    else:
                    ?>
                        <p>No recent blogs.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <br>

        <div>
            <img src="assets/images/blog-image-fullscren-1-1920x700.jpg" class="img-fluid" alt="">
        </div>
    </div>
</div>

<div class="send-message">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Leave a Comment</h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="contact-form">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Full Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email"
                                        placeholder="E-Mail Address" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message"
                                        placeholder="Your Message" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="filled-button">Submit</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="left-content">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
require_once "partials/footer.php";