<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php
require_once "layouts/config.php";
if (isset($_POST['edit-title']) && $_POST['edit-title'] != "") {
    $result = $link->query("update categories set title = '" . $_POST['edit-title'] . "' where id = " . $_POST['edit-id']);
    if ($result) {
        echo "<script>alert('Business Category has been Updated');</script>";
    } else {
        echo "<script>alert('An Error Occurred');</script>";
    }
}
if (isset($_POST['create-title']) && $_POST['create-title'] != "") {
    $result = $link->query("insert into categories values (null, '" . $_POST['create-title'] . "')");
    if ($result) {
        echo "<script>alert('Business Category has been Created');</script>";
    } else {
        echo "<script>alert('An Error Occurred');</script>";
    }
}
if (isset($_GET['delete-id']) && $_GET['delete-id'] != "") {
    $result = $link->query("delete from categories where id = " . $_GET['delete-id']);
    if ($result) {
        header('Location: list-categories.php');
    } else {
        echo "<script>alert('An Error Occurred');</script>";
    }
}
?>
<head>
    <title>Sibuy</title>

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
                            <h4 class="mb-sm-0 font-size-18">Business Categories</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Sibuy</a></li>
                                    <li class="breadcrumb-item active">Business Categories</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal">
                            <i class='fas fa-pencil-alt'></i>
                            <span data-key="t-dashboard" style="color: #fff;">Create Category</span>
                        </button>
                        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Create Business Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <input class="form-control" type="text" name="create-title" placeholder="Enter Category Here" /><br />
                                            <input type="submit" class="btn btn-primary" />
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div>
                    <div class="col-md-10"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- card -->
                        <div class="card card-h-100">
                            <div class="card-body">
                                <table id="merchants" class="table table-striped table-bordered">
                                    <thead>
                                        <tr><th>ID</th><th>Title</th><th>Edit</th><th>Delete</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $link->query("select * from categories");
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "
                                                <tr>
                                                    <td>" . $row['id'] . "</td>
                                                    <td>" . $row['title'] . "</td>
                                                    <td style='text-align: center;'>"; ?>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id']; ?>"><i class='fas fa-pencil-alt'></i></button>
                                                    <div id="myModal<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myModalLabel<?php echo $row['id']; ?>">Edit Category</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="" method="post">
                                                                        <input type="hidden" name="edit-id" value="<?php echo $row['id']; ?>" />
                                                                        <input class="form-control" type="text" name="edit-title" value="<?php echo $row['title']; ?>" /><br />
                                                                        <input type="submit" class="btn btn-primary" />
                                                                    </form>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                    <?php echo "</td><td style='text-align: center;'><a class='btn btn-primary' href='list-categories.php?delete-id=" . $row['id'] . "'><i class='fas fa-trash-alt'></i></a></td>
                                                </tr>
                                                <?php";
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