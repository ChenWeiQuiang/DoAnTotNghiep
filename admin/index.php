<?php

require('../services/check_admin_login.php');
require('../services/connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('components/head.php') ?>
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <!-- LOGO -->
                <?php include('components/logo.php') ?>
            <!-- END LOGO -->
            <div class="h-100" id="left-side-menu-container" data-simplebar>

                <!--- Sidemenu -->
                <?php include("components/sidemenu.php"); ?>
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include('components/topbar.php'); ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-success border-success text-white">
                                                        <i class="mdi mdi-calendar-range font-13"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript: void(0);" class="btn btn-success ml-2">
                                            <i class="mdi mdi-autorenew"></i>
                                        </a>
                                    </form>
                                </div>
                                <h4 class="page-title">Tổng quan</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-5 col-lg-6">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-right">
                                                <i class="mdi mdi-account-multiple widget-icon bg-success-lighten text-success"></i>
                                            </div>
                                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Tổng khách hàng</h5>

                                            <?php
                                            $sql = "SELECT * FROM `users` WHERE id_role = 2";
                                            $result = mysqli_query($connect, $sql);
                                            $total_user = mysqli_num_rows($result);
                                            ?>
                                            <h3 class="mt-3 mb-3"><?php echo $total_user; ?></h3>

                                            <p class="mb-0 text-muted">
                                                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                                                <span class="text-nowrap">Kể từ tháng trước</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->

                                <div class="col-lg-6">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-right">
                                                <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
                                            </div>
                                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Tổng đơn hàng</h5>

                                            <?php
                                            $sql = "SELECT * FROM `orders`";
                                            $result = mysqli_query($connect, $sql);
                                            $total_order = mysqli_num_rows($result);
                                            ?>
                                            <h3 class="mt-3 mb-3"><?php echo $total_order ?></h3>

                                            <p class="mb-0 text-muted">
                                                <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                                                <span class="text-nowrap">Kể từ tháng trước</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-right">
                                                <i class="mdi mdi-currency-usd widget-icon bg-info-lighten text-info"></i>
                                            </div>
                                            <h5 class="text-muted font-weight-normal mt-0" title="Average Revenue">Doanh thu</h5>

                                            <?php
                                            $sql = "SELECT sum(orders.total_price) as total_price FROM `orders` WHERE status = 'Đã duyệt'";
                                            $result = mysqli_query($connect, $sql);
                                            $each = mysqli_fetch_array($result);
                                            $total_money = $each['total_price'];

                                            ?>
                                            <h3 class="mt-3 mb-3"><?php echo number_format($total_money) ?>VND</h3>

                                            <p class="mb-0 text-muted">
                                                <span class="text-danger mr-2"><i class="mdi mdi-arrow-up-bold"></i> 7.00%</span>
                                                <span class="text-nowrap">Kể từ tháng trước</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->

                                <div class="col-lg-6">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-right">
                                                <i class="mdi mdi-pulse widget-icon bg-warning-lighten text-warning"></i>
                                            </div>
                                            <h5 class="text-muted font-weight-normal mt-0" title="Growth">Phát triển</h5>
                                            <h3 class="mt-3 mb-3">+ 30.56%</h3>
                                            <p class="mb-0 text-muted">
                                                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                                                <span class="text-nowrap">Kể từ tháng trước</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div> <!-- end row -->

                        </div> <!-- end col -->

                        <div class="col-xl-7  col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title mb-3">DỰ ÁN VÀ THỰC TẾ</h4>

                                    <div id="high-performing-product" class="apex-charts" data-colors="#fa6767,#e3eaef"></div>

                                    <!-- <div style="height: 263px;" class="chartjs-chart">
                                            <canvas id="high-performing-product"></canvas>
                                        </div> -->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->

                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>


                                    <?php
                                    $sql = "SELECT sum(orders.total_price) as total_price FROM `orders` WHERE status = 'Đã duyệt' and DATE(created_at) = CURDATE()";
                                    $result = mysqli_query($connect, $sql);
                                    $each = mysqli_fetch_array($result);
                                    $total_money_earn = $each['total_price'];

                                    ?>
                                    <div class="dash-item-overlay d-none d-md-block">
                                        <h5>Thu nhập hôm nay: <?php echo number_format($total_money_earn) ?>VND</h5>
                                    </div>

                                    <div id="revenue-chart" class="apex-charts mt-3" data-colors="#3688fc,#f9bc0d"></div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title">Doanh thu theo vị trí</h4>
                                    <div class="mb-4 mt-4">
                                        <div id="world-map-markers" style="height: 224px"></div>
                                    </div>

                                    <h5 class="mb-1 mt-0 font-weight-normal">Việt nam</h5>
                                    <div class="progress-w-percent">
                                        <span class="progress-value font-weight-bold">72k </span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-dark" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-xl-12 col-lg-12 order-lg-2 order-xl-1">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mt-2">SẢN PHẨM BÁN CHẠY NHẤT</h4>
                                    <?php
                                    $sql = "select id_product, sum(order_product.quantity) as 'tong_so',
                                    products.name as 'product_name' ,
                                    products.price as 'product_price'
                                    from order_product 
                                    INNER JOIN products on order_product.id_product = products.id 
                                    GROUP BY order_product.id_product ORDER by sum(order_product.quantity) DESC ";
                                    $result = mysqli_query($connect, $sql);
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap table-hover mb-0">
                                            <tbody>
                                                <?php
                                                foreach ($result as $item) :
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1 font-weight-normal"><?= $item['product_name'] ?></h5>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 font-weight-normal"><?php echo number_format($item['product_price']) ?>VND</h5>
                                                            <span class="text-muted font-13">Giá tiền</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 font-weight-normal"><?php echo $item['tong_so'] ?></h5>
                                                            <span class="text-muted font-13">Số lượng</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 font-weight-normal"><?php echo number_format($item['product_price'] * $item['tong_so']) ?></h5>
                                                            <span class="text-muted font-13">Tổng giá</span>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- Footer Start -->
        <?php include('footer.php'); ?>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <?php include('components/right_sidebar.php') ?>
    <?php include('components/link_footer.php') ?>
</body>

</html>