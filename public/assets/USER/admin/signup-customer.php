<?php
session_start();
include 'layouts/head-main.php';
require_once "layouts/config.php";
if (isset($_POST['username'])) {
    if($_POST['password'] == $_POST['repeat_password']) {
        $result = $link->query("select * from users where useremail = '" . $_POST['email'] . "' and role = 'customer'");
        if ($result->num_rows > 0) {
            echo "<script>alert('Customer Already Exists');</script>";
        } else {
            $result = $link->query("insert into users (
                    useremail,
                    username,
                    password,
                    role
                ) values (
                    '" . $_POST['email'] . "',
                    '" . $_POST['username'] . "',
                    '" . password_hash($_POST['password'], PASSWORD_DEFAULT) . "',
                    'customer'
                )
            ");
            $user_id = $link->insert_id;
            $result = $link->query("insert into customers (
                    user_id,
                    full_name,
                    email,
                    phone,
                    address
                ) values (
                    '" . $user_id . "',
                    '" . $_POST['full_name'] . "',
                    '" . $_POST['contact_email'] . "',
                    '" . $_POST['phone'] . "',
                    '" . $_POST['address'] . "'
                )
            ");
            if ($result) {
                echo "<script>alert('Signup Successful');</script>";
            } else {
                echo "<script>alert('An Error Occurred');</script>";
            }
        }
    } else {
        echo "<script>alert('Passwords Do Not Match');</script>";
    }
}
?>

<head>

    <title>Customer Signup | GiGi</title>
    <?php include 'layouts/head.php'; ?>

    <?php include 'layouts/head-style.php'; ?>

</head>

<?php include 'layouts/body.php'; ?>
<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="index.php" class="d-block auth-logo">
                                    <img src="assets/images/gigi-logo.png" alt="" height="28"> <span class="logo-txt">GiGi</span>
                                </a>
                            </div>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5 class="mb-0">Sign Up !</h5>
                                    <p class="text-muted mt-2">Sign up with GiGi.</p>
                                </div>
                                <form class="custom-form mt-4 pt-2" action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="repeat_password">Repeat Password</label>
                                                <input type="password" class="form-control" id="repeat_password" name="repeat_password" placeholder="Repeat Password" style="width: 100%; margin-bottom: 20px;" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="full_name">Full Name</label>
                                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Full Name" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="contact_email">Contact Email</label>
                                                <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Enter Contact Email" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="address">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">Copyright © <script>
                                    document.write(new Date().getFullYear() + " GiGi")
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="col-md-2"></div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>


<!-- JAVASCRIPT -->

<?php include 'layouts/vendor-scripts.php'; ?>
<!-- password addon init -->
<script src="assets/js/pages/pass-addon.init.js"></script>

</body>

</html>