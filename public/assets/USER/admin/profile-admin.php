<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php
require_once "layouts/config.php";
if (isset($_POST['username'])) {
    if($_POST['password'] == $_POST['repeat_password']) {
        $result = $link->query("update users set
            useremail = '" . $_POST['email'] . "',
            username = '" . $_POST['username'] . "',
            password = '" . password_hash($_POST['password'], PASSWORD_DEFAULT) . "',
            role = 'admin'
            where id = '" . $_SESSION['id'] . "'
        ");
        if ($result) {
            echo "<script>alert('Admin has been updated');</script>";
        } else {
            echo "<script>alert('An Error Occurred');</script>";
        }
    } else {
        echo "<script>alert('Passwords Do Not Match');</script>";
    }
}

?>
<head>
    <title>GiGi</title>

    <?php include 'layouts/head.php'; ?>

    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
    
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Update Profile</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">GiGi</a></li>
                                    <li class="breadcrumb-item active">Update Profile</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12">
                        <!-- card -->
                        <div class="card card-h-100">
                            <div class="card-body p-4">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <?php
                                        $result = $link->query("select * from users where id = '" . $_SESSION['id'] . "'");
                                        while($row = $result->fetch_assoc()) {
                                        ?>
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4">
                                            <div class="mt-3 mt-lg-0">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input class="form-control" type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input class="form-control" type="email" id="email" name="email" value="<?php echo $row['useremail']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input class="form-control" type="password" id="password" name="password" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="repeat-password" class="form-label">Repeat Password</label>
                                                    <input class="form-control" type="password" id="repeat_password" name="repeat_password" required>
                                                </div>
                                            </div>
                                            <div class="mt-3 mt-lg-0">
                                                <div class="mb-3">
                                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4"></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </form>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- Plugins js-->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="assets/js/pages/form-advanced.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>