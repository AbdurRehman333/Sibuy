<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php
require_once "layouts/config.php";
?>
<head>
    <title>GiGi</title>

    <?php include 'layouts/head.php'; ?>

    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    
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
                            <h4 class="mb-sm-0 font-size-18">Customers</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">GiGi</a></li>
                                    <li class="breadcrumb-item active">Customers</li>
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
                            <div class="card-body">
                                <table id="merchants" class="table table-striped table-bordered">
                                    <thead>
                                        <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>QR Scanned</th><th>Total Spending</th><th>Actions</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $link->query("select * from users, customers where customers.user_id = users.id");
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "
                                                <tr>
                                                    <td>USER" . $row['id'] . "</td>
                                                    <td>" . $row['full_name'] . "</td>
                                                    <td>" . $row['email'] . "</td>
                                                    <td>" . $row['phone'] . "</td>
                                                    <td>" . rand(10,100) . "</td>
                                                    <td>$" . rand(10,100) . "</td>
                                                    <td style='text-align: center;'>
                                                        <a class='btn btn-primary' href='view-customer.php?id=" . $row['id'] . "'><i class='fas fa-eye'></i></a>
                                                    </td>
                                                </tr>
                                                ";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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

<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>$('#merchants').DataTable();</script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>