<?php
session_start();
$title = "Danh sách nhân viên";
require("../../services/connect.php");
$sql = "SELECT `id`, `name`, `email`, `password`, `address`, `phone`, `gender`, `image` FROM `users` WHERE id_role = 1";
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
                                <h4 class="page-title">Danh sách nhân viên</h4>
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
                                        <th>Tên nhân viên </th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Giới tính</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
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
                                            <td class="table-user">
                                                <img src="../../public/images/<?php echo $each['image'] ?>" alt="table-user" />
                                            </td>
                                            <td>
                                                <a href="./edit_customer.php?id=<?php echo $each['id'] ?>" class="btn btn-outline-warning">Sửa</a>
                                            </td>
                                            <td>
                                                <button onclick="remove(<?php echo $each['id'] ?>)" class="btn btn-outline-danger">Xóa</button>
                                            </td>
                                        </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                            <form action="delete_customer.php" method="POST" id="delete">
                                <input type="hidden" name="id" id="idCustomer">
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    function remove(id) {
                        document.getElementById('idCustomer').value = id;
                        var form = document.getElementById('delete');

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
                </script>
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
    <?php include('../components/right_sidebar.php') ?>
    <?php include('../components/link_footer.php') ?>
</body>

</html>