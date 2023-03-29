<?php
session_start();
$title = 'Danh sách khách hàng';
require("../../services/connect.php");
$sql = "SELECT `id`, `name`, `email`, `password`, `address`, `phone`, `gender`, `image` FROM `users` WHERE id_role = 2";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../components/head.php') ?>

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <!-- LOGO -->
            <?php include('../components/logo.php') ?>

            <div class="h-100" id="left-side-menu-container" data-simplebar>
                <!--- Sidemenu -->
                <?php include("../components/sidemenu.php"); ?>
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
                <?php include('../components/topbar.php') ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                </div>
                                <h4 class="page-title">Danh sách khách hàng</h4>
                            </div>
                        </div>
                    </div>

                    <!-- end page title -->
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-10 ">
                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên khách hàng </th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Giới tính</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Sửa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($result as $each) {
                                        $count++;
                                    ?>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <td><?php echo $each['name'] ?></td>
                                            <td><?php echo $each['email'] ?></td>
                                            <td><?php echo $each['address'] ?></td>
                                            <td>
                                                <?php echo $each['phone'] ?>
                                            </td>
                                            <td>
                                                <?php echo $each['gender'] ?>
                                            </td>
                                            <td class= "table-user">
                                                <img src="../../public/images/<?php echo $each['image'] ?>" alt="table-user" />
                                            </td>
                                            <td>
                                                <a href="./edit_customer.php?id=<?php echo $each['id'] ?>" class="btn btn-outline-warning">Chỉnh sửa</a>
                                            </td>
                                        </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                            <form action="../customer/delete_customer.php" method="POST" id="delete">
                                <input type="hidden" name="id" id="idCustomer">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- container -->
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>
                    <?php if (isset($_SESSION["success"])) {
                        if ($_SESSION["success"] == "Thành công") { ?>

                            swal("Success", "Chỉnh sửa thành công", "success");
                        <?php
                        }
                        ?>



                    <?php
                        unset($_SESSION["success"]);
                    } ?>
                </script>

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <?php include('../footer.php'); ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">

        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Cài đặt</h5>
        </div>

        <div class="rightbar-content h-100" data-simplebar>

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Tùy chỉnh </strong> bảng màu tổng thể.
                </div>

                <!-- Settings -->
                <h5 class="mt-3">Bảng màu</h5>
                <hr class="mt-1" />

                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light" id="light-mode-check" checked />
                    <label class="custom-control-label" for="light-mode-check">Chế độ sáng</label>
                </div>

                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="color-scheme-mode" value="dark" id="dark-mode-check" />
                    <label class="custom-control-label" for="dark-mode-check">Chế độ tối</label>
                </div>
                <button class="btn btn-primary btn-block mt-4" id="resetBtn">Đặt lại về mặc định</button>
            </div> <!-- end padding-->

        </div>
    </div>

    <div class="rightbar-overlay"></div>
    <!-- /Right-bar -->

    <!-- bundle -->
    <script src="../assets/js/vendor.min.js"></script>
    <script src="../assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="../assets/js/vendor/apexcharts.min.js"></script>
    <script src="../assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="../assets/js/pages/demo.dashboard.js"></script>
    <!-- end demo js-->
</body>

</html>