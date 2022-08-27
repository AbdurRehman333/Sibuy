<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php require_once "layouts/config.php"; ?>

<head>
    
    <title>GiGi</title>
    <?php include 'layouts/head.php'; ?>
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
                            <h4 class="mb-sm-0 font-size-18">Profile</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">GiGi</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <?php
                $result = $link->query("select * from users, merchants where merchants.user_id = users.id and users.id = '" . $_SESSION['id'] . "'");
                while($row = $result->fetch_assoc()) {
                ?>
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm order-2 order-sm-1">
                                        <div class="d-flex align-items-start mt-3 mt-sm-0">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xl me-3">
                                                    <?php
                                                    $img = explode(",", $row['image']);
                                                    for ($i = 0; $i < count($img); $i++) {
                                                        echo "<img style='width: 100px;' src='" . $img[$i] . "' class='img-fluid rounded-circle d-block' />";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="font-size-16 mb-1"><?php echo $row['name']; ?></h5>
                                                    <p class="text-muted font-size-13"><?php echo $row['contact_email']; ?></p>

                                                    <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?php echo $row['contact_number']; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto order-1 order-sm-2">
                                        <div class="d-flex align-items-start justify-content-end gap-2">
                                            <div>
                                                <button type="button" class="btn btn-soft-light"><i class="me-1"></i> Message</button>
                                            </div>
                                            <div>
                                                <div class="dropdown">
                                                    <button class="btn btn-link font-size-16 shadow-none text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="tab-content">
                            <div class="tab-pane active" id="overview" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">About</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <div class="pb-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Details :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <p class="mb-2"><?php echo $row['detail']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Owner :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <p class="mb-2"><?php echo $row['owner']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h5 class="card-title mb-0">Offers</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <a href="list-offers.php">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <div class="row">
                                                <?php
                                                $res = $link->query("select * from discounts where user_id = '" . $_SESSION['id'] . "' limit 3");
                                                while($ro = $res->fetch_assoc()) {
                                                ?>
                                                <div class="col-xl-4">
                                                    <div class="card p-1 mb-xl-0">
                                                        <div class="p-3">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <h5 class="font-size-14 text-truncate"><a href="#" class="text-dark"><?php echo $ro['title']; ?></a></h5>
                                                                    <p class="font-size-13 text-muted mb-0"><?php echo $ro['price']; ?></p>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-link text-muted font-size-16 p-1 py-0 dropdown-toggle shadow-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="position-relative">
                                                            <?php
                                                            $img = explode(",", $ro['image']);
                                                            for ($i = 0; $i < count($img); $i++) {
                                                                echo "<img style='width: 100px;' src='" . $img[$i] . "' class='img-thumbnail' />";
                                                            }
                                                            ?>
                                                        </div>

                                                        <div class="p-3">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item me-3">
                                                                    <a href="javascript: void(0);" class="text-muted">
                                                                        <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Offer
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item me-3">
                                                                    <a href="javascript: void(0);" class="text-muted">
                                                                        <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 12 Comments
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <p class="text-muted"><?php echo $ro['title']; ?></p>

                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end tab pane -->

                        </div>
                        <!-- end tab content -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Business Categories</h5>

                                <div class="d-flex flex-wrap gap-2 font-size-16">
                                    <?php
                                    $res = $link->query("select * from categories");
                                    while($ro = $res->fetch_assoc()) {
                                        if(strpos($row['business_categories'], $ro['title']) != false) {echo "<a href='#' class='badge badge-soft-primary'>" . ucwords(str_replace('-', ' ', $ro['title'])) . "</a>";}
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Portfolio</h5>

                                <div>
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="#" class="py-2 d-block text-muted"><i class="mdi mdi-web text-primary me-1"></i> Website</a>
                                        </li>
                                        <li>
                                            <a href="#" class="py-2 d-block text-muted"><i class="mdi mdi-note-text-outline text-primary me-1"></i> Blog</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Similar Profiles</h5>

                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0 me-3">
                                                <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="font-size-14 mb-1">James Nix</h5>
                                                    <p class="font-size-13 text-muted mb-0">Restaurant</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0 me-3">
                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="img-thumbnail rounded-circle">
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="font-size-14 mb-1">Darlene Smith</h5>
                                                    <p class="font-size-13 text-muted mb-0">Salon</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0 me-3">
                                                <div class="avatar-title bg-soft-light text-light rounded-circle font-size-22">
                                                    <i class="bx bxs-user-circle"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="font-size-14 mb-1">William Swift</h5>
                                                    <p class="font-size-13 text-muted mb-0">Grocery</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                <?php } ?>

            </div> <!-- container-fluid -->
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

<script src="assets/js/app.js"></script>

</body>

</html>