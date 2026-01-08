<?php
require_once "classes/Employer.php";
$employer = new Employer;
require_once "classes/User.php";
require_once "classes/ORM.php";
$user = new User;
$fetchss = $employer->fetch_vacancies_for_users();
$active_page = 'blog';
$page_title = 'Blogs Page';
require_once "partials/header.php";

$perPage = 6;
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($currentPage - 1) * $perPage;
$search = trim($_GET['search'] ?? '');

if ($search) {
    $blogs = ORM::table('blogs')->search($search)->orderBy('created_at', 'desc')->get($perPage, $offset);
    $totalBlogs = ORM::table('blogs')->search($search)->select(['COUNT(*) as count'])->first()['count'];
} else {
    $blogs = ORM::table('blogs')->orderBy('created_at', 'desc')->get($perPage, $offset);
    $totalBlogs = ORM::table('blogs')->select(['COUNT(*) as count'])->first()['count'];
}
$totalPages = ceil($totalBlogs / $perPage);

$recentBlogs = ORM::table('blogs')->orderBy('created_at', 'desc')->get(3);

?>


<!-- Page Content -->
<div class="page-heading about-heading header-text"
    style="background-image: url(assets/images/heading-6-1920x500.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>Get More Info about job opportunities available on Jobsolutions</h4>
                    <h2>Blog</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <?php if ($blogs && !empty($blogs)): ?>
                        <?php foreach ($blogs as $blog): ?>
                            <div class="col-md-6">
                                <div class="service-item">
                                    <a href="blog-details.php?id=<?= $blog['id'] ?>" class="services-item-image">
                                        <img src="assets/images/blog-1-370x270.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="down-content">
                                        <h4><a href="blog-details.php?id=<?= $blog['id'] ?>"><?= htmlspecialchars($blog['title']) ?></a></h4>
                                        <p style="margin: 0;"> Admin &nbsp;&nbsp;|&nbsp;&nbsp; <?= date("d/m/Y H:i", strtotime($blog['created_at'])) ?> &nbsp;&nbsp;|&nbsp;&nbsp; <?= $blog['views'] ?? 0 ?> views</p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-md-12">
                            <p>No blogs available yet.</p>
                        </div>
                    <?php endif; ?>

                    <div class="col-md-12">
                        <ul class="pages">
                            <?php 
                            $pageLink = $search ? "?search=" . urlencode($search) . "&page=" : "?page=";
                            for ($i = 1; $i <= $totalPages; $i++): 
                            ?>
                                <li class="<?php if ($i == $currentPage) echo 'active'; ?>">
                                    <a href="<?= $pageLink . $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                            <?php if ($currentPage < $totalPages): ?>
                                <li><a href="<?= $pageLink . ($currentPage + 1) ?>"><i class="fa fa-angle-double-right"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-form">
                    <form method="get" action="">
                        <div class="form-group">
                            <h5>Blog Search</h5>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <input type="text" name="search" class="form-control" placeholder="Search" value="<?= htmlspecialchars($search) ?>" aria-label="Search" aria-describedby="basic-addon2">
                            </div>

                            <div class="col-4">
                                <button class="filled-button" type="submit">Go</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="form-group">
                    <h5>Recent Blogs</h5>
                </div>

                <?php if ($recentBlogs): ?>
                    <?php foreach ($recentBlogs as $recent): ?>
                        <p><a href="blog-details.php?id=<?= $recent['id'] ?>"><?= htmlspecialchars($recent['title']) ?></a></p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No recent blogs.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



<?php
require_once "partials/footer.php";