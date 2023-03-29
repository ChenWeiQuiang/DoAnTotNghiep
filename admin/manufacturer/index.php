<?php
session_start();
$title = 'Tất cả loại hàng';
require('../../services/connect.php');

$sql = "SELECT * FROM `manufacturers` WHERE 1";
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
                                <h4 class="page-title">Tất cả nhà sản xuất</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-10 ">
                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>Tên </th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Hình ảnh</th>
                                        <th>Thêm</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $each) { ?>
                                        <tr>
                                            <td><?php echo $each['id'] ?></td>
                                            <td><?php echo $each['name'] ?></td>
                                            <td><?php echo $each['phone'] ?></td>
                                            <td><?php echo $each['address'] ?></td>

                                            <td class="table-user">
                                                <img src="../../public/images/<?php echo $each['image'] ?>" alt="table-user" />
                                            </td>
                                            <td>
                                                <a href="edit_manufacturer.php?id=<?= $each['id'] ?>">
                                                    <button class="btn btn-warning" style="margin-top:2px;">Sửa</button>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" onclick="remove(<?php echo $each['id'] ?>)">Xóa</button>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <form action="delete.php" method="post" id="xoa">
                    <input type="hidden" id="id" name="id">
                </form>
                <!-- container -->
            </div>
            <!-- content -->

            <!-- Footer Start -->
            <?php include('../footer.php'); ?>
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
        <script>
            function remove(id) {
                document.getElementById('id').value = id;
                var form = document.getElementById('xoa');
                swal({
                        title: "Bạn chắc chắn?",
                        text: "Khi đã xóa, bạn sẽ không thể lấy lại được bản ghi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                            swal("Bạn đã xóa một bản ghi! " + id, {
                                icon: "success",
                            });
                        } else {
                            swal("Bản ghi an toàn!");
                        }
                    });
            }

            <?php
            if (isset($_SESSION['success'])) {
                if ($_SESSION['success'] == "Thêm thành công") { ?>
                    swal("Success", "Thêm sản phẩm thành công", "success");
                <?php
                } else if ($_SESSION['success'] == "Sửa thành công") {
                ?>
                    swal("Success", "Sửa sản phẩm thành công", "success");

            <?php }
            }
            unset($_SESSION['success']); ?>
        </script>
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <?php include('../components/right_sidebar.php') ?>
    <!-- /Right-bar -->

    <!-- bundle -->
    <?php include('../components/link_footer.php') ?>
    <!-- end demo js-->


</body>

</html>