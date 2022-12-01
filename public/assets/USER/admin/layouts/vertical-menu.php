<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/sibuy.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/sibuy.png" alt="" height="24"> <span class="logo-txt">Sibuy</span>
                    </span>
                </a>

                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/sibuy.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/sibuy.png" alt="" height="24"> <span class="logo-txt">Sibuy</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search">
                    <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                </div>
            </form>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item" id="page-header-search-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="search" class="icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">
        
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search Result">

                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell" class="icon-lg"></i>
                    <span class="badge bg-danger rounded-pill">5</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small text-reset text-decoration-underline"> Unread (3)</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">James_Lemire</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">It_will_seem_like_simplified_English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1_hours_ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your_order_is_placed</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If_several_languages_coalesce_the_grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3_min_ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View_More</span> 
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--<img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">-->
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo $_SESSION['username']; ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <?php if($_SESSION['role'] == "merchant"){ ?>
                        <a class="dropdown-item" href="profile-merchant.php"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                    <?php } ?>
                    <?php if($_SESSION['role'] == "admin"){ ?>
                        <a class="dropdown-item" href="profile-admin.php"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                    <?php } ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <?php if($_SESSION['role'] == "merchant"){ ?>
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="store-management.php">
                        <i class="fas fa-warehouse"></i>
                        <span data-key="t-dashboard">Store Management</span>
                    </a>
                </li>
                <li>
                    <a href="list-products.php">
                        <i class=" fas fa-shopping-cart"></i>
                        <span data-key="t-dashboard">Products and Services</span>
                    </a>
                </li>
                <li>
                    <a href="list-branches.php">
                        <i class=" fas fa-store"></i>
                        <span data-key="t-dashboard">Branches</span>
                    </a>
                </li>
                <li>
                    <a href="list-offers.php">
                        <i class="fas fa-tags"></i>
                        <span data-key="t-dashboard">Coupons and Discounts</span>
                    </a>
                </li>
                <li style="padding-top: 10px;" id="custom-button">
                    <a href="create-offer.php" style="background-color: #686cbb; color: #fff; text-align: left; border-radius: 10px;" id="custom-link">
                        <i class="fas fa-pencil-alt" style="color: #fff;"></i>
                        <span data-key="t-dashboard">Create Offer</span>
                    </a>
                </li>
            </ul>
            <?php } ?>
            <?php if($_SESSION['role'] == "admin"){ ?>
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="list-merchants.php">
                        <i class="fas fa-warehouse"></i>
                        <span data-key="t-dashboard">Merchants</span>
                    </a>
                </li>
                <li>
                    <a href="list-categories.php">
                        <i class="fas fa-align-left"></i>
                        <span data-key="t-dashboard">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="list-customers.php">
                        <i class="fas fa-tags"></i>
                        <span data-key="t-dashboard">Customers</span>
                    </a>
                </li>
                <li style="padding-top: 10px;" id="custom-button">
                    <a href="create-merchant.php" style="background-color: #686cbb; color: #fff; text-align: left; border-radius: 10px;" id="custom-link">
                        <i class="fas fa-pencil-alt" style="color: #fff;"></i>
                        <span data-key="t-dashboard">Create Merchant Profile</span>
                    </a>
                </li>
            </ul>
            <?php } ?>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->