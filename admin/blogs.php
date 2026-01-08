<?php
session_start();
require_once "admin_guard.php";
?>

<?php
require_once "classes/ORM.php";

$perPage = 20;
$currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($currentPage - 1) * $perPage;

$blogs = ORM::table('blogs')->get($perPage, $offset);
$totalBlogs = ORM::table('blogs')->select(['COUNT(*) as count'])->first()['count'];
$totalPages = ceil($totalBlogs / $perPage);

//if edit
$edit = false;
if (isset($_GET['edit']) && $_GET['edit'] == true && isset($_GET['id'])) {
    $blog = ORM::table('blogs')->where(['id' => $_GET['id'] ?? 0])->first();
    if (!$blog) {
        $_SESSION['errormsg'] = 'Blog not found';
        header('location: ' . base_url('blogs.php'));
    }
    $edit = true;


}

if (isset($_GET['delete']) && $_GET['delete'] == true && isset($_GET['id'])) {
    $blog = ORM::table('blogs')->where(['id' => $_GET['id'] ?? 0])->first();
    if (!$blog) {
        $_SESSION['errormsg'] = 'Blog not found';
        header('location: ' . base_url('blogs.php'));
    } else {
        //proceed to delete
        $deleted = ORM::table('blogs')->delete(['id' => $_GET['id']]);
        if ($deleted) {
            $_SESSION['feedback'] = 'Blog deleted successfully';
            header('location: ' . base_url('blogs.php'));
        } else {
            $_SESSION['errormsg'] = 'Error deleting blog. Try again later';
            header('location: ' . base_url('blogs.php'));
        }
    }
}


$page_title = 'Blogs';

require_once "partials/admin_header.php";
?>


<link rel="stylesheet" href="assets/quill/katex.css">
<link rel="stylesheet" href="assets/quill/editor.css">
<link rel="stylesheet" href="assets/quill/typography.css">
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Blogs</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item ">Blogs</li>
                <li class="breadcrumb-item active">list</li>
            </ol>
            <div class="row">
                <?php
                if (isset($_SESSION["errormsg"])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION["errormsg"] . "</div>";
                    unset($_SESSION["errormsg"]);
                }
                if (isset($_SESSION["feedback"])) {
                    echo "<div class='alert alert-success'>" . $_SESSION["feedback"] . "</div>";
                    unset($_SESSION["feedback"]);
                }
                ?>
                <div id="msg"></div>
                <div class="col-xl-3 col-md-6">

                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Total Blogs: <?= $totalBlogs ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a id="jobseekers" class="small text-white stretched-link" href="">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Total articles read</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link " id="employers" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Total Comments on articles </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a id="applications" class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col card px-3">
                    <div class="col">
                        <button onclick="add_blog()" type="button" data-bs-toggle="modal" data-bs-target="#addBlogModal"
                            class="btn btn-primary pull-right m-2">Create Blog</button>
                    </div>
                    <table class="table table-bordered table-warning mb-3" id="datatables">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Total Views</th>
                                <th>Uploaded By</th>
                                <th>Uploaded At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($blogs && !empty($blogs)): ?>
                                <?php foreach ($blogs as $blog): ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $blog['title'] ?></td>
                                        <td><?= substr($blog['content'], 0, 20) ?><a
                                                href="?edit=true&id=<?= $blog['id'] ?>"><?= strlen($blog['content']) > 20 ? '...' : '' ?></a>
                                        </td>
                                        <td><?= $blog['views'] ?></td>
                                        <td>Admin</td>
                                        <td><?= date("l, d F Y", strtotime($blog['created_at'])) ?> </td>
                                        <td>
                                            <a href="?edit=true&id=<?= $blog['id'] ?>&page=<?= $currentPage ?>"
                                                class="btn btn-info btn-sm m-1">Edit</a>
                                            <a onclick="return confirm('Are You sure you want to delete this blog')"
                                                href="?delete=true&id=<?= $blog['id'] ?>"
                                                class="btn btn-danger btn-sm m-1">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="12">No Blogs Added Yet</td>
                                </tr>

                            <?php endif; ?>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav aria-label="Blog pagination">
                        <ul class="pagination justify-content-center">
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?php if ($i == $currentPage)
                                    echo 'active'; ?>">
                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <?php
            //handle delete
            if (!$edit) {
                $blog = null;
            }
            ?>

            <div class="modal modal-lg fade" id="addBlogModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="<?= base_url('process/process_blog.php') ?> " id="menuForm">

                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><span
                                        id="modalType"><?= $edit ? 'Edit' : 'Add' ?></span> Blog
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="">Blog Title</label>
                                    <input value="<?= $blog['title'] ?? '' ?>" required type="text" class="form-control"
                                        name="title" id="menu_name" placeholder="Enter Title">
                                </div>
                                <div class="mb-3">
                                    <input type="file" name="image" id="image-input"  class="form-control">
<img id="image-preview" style="display:<?= $edit == true && isset($blog['image']) ? "block" :"none" ?>" src="<?= $edit == true && isset($blog['image']) && !empty($blog['image']) ? "../". $blog['image'] : '' ?>" alt="">
                                </div>
                                <div class="mb-3">
                                    <label for="">Blog Text</label>
                                    <div class="form-control p-0 pt-1">
                                        <div class="comment-toolbar border-0 border-bottom">
                                            <div class="d-flex justify-content-start">
                                                <span class="ql-formats me-0">
                                                    <button class="ql-bold"></button>
                                                    <button class="ql-italic"></button>
                                                    <button class="ql-underline"></button>
                                                    <button class="ql-list" value="ordered"></button>
                                                    <button class="ql-list" value="bullet"></button>
                                                    <button class="ql-link"></button>
                                                    <button class="ql-image"></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="comment-editor border-0 pb-4" id="ecommerce-category-description">
                                            <?= $blog['content'] ?? "" ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php if ($edit): ?>
                                <input type="hidden" name="id" value="<?= $blog['id'] ?>">
                            <?php endif; ?>
                            <input type="hidden" name="desc" id="desc" value="<?= $blog['content'] ?? "" ?>">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button name="submit" value="kudutf" type="submit" class="btn btn-primary">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; <i>My Job Solutions</i> <?php print date("Y") ?></div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<script src="assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<!-- <script src="../jquery-3.7.1.min.js"></script> -->

<script src="assets/quill/quill.js"></script>
<script src="assets/quill/katex.js"></script>

<script>
    const quill = new Quill('.comment-editor', {
        modules: {
            toolbar: '.comment-toolbar'
        },
        placeholder: 'Blog Content',
        theme: 'snow'
    });


    $(document).ready(function () {
        $("#menuForm").submit(function () {
            var desc = quill.root.innerHTML;
            $("#desc").val(desc);
        });

        function add_blog() {
            $("#desc").val('');
            quill.root.innerHTML = '';
            $("#menu_name").val('');
            $("#modalType").text('Add');
        }

        $("#image-input").change(function(){
            var imagePreview = document.getElementById('image-preview');
            var input = document.getElementById('image-input');

            
        });
    });


</script>

<?php if ($edit): ?>
    <script>
        $(document).ready(function () {
            $("#addBlogModal").modal('show');
        })
    </script>
<?php endif; ?>
</body>

</html>