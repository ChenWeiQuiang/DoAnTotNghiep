<?php
session_start();
$title = 'Tất cả sản phẩm';
require("../../services/connect.php");

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
            <!-- END LOGO -->
            <div class="h-100" id="left-side-menu-container" data-simplebar>

                <!--- Sidemenu -->
                <?php
                include("../components/sidemenu.php");
                ?>
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
                                <h4 class="page-title">Tất cả sản phẩm</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row justify-content-center">
                        <table class="table table-striped table-centered mb-0" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Loại hàng</th>
                                    <th> Danh Mục</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Hình Ảnh</th>
                                    <th>Giá</th>
                                    <th>Giảm giá</th>
                                    <th>Số Lượng</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM products";         
                                $rs = mysqli_query($connect, $sql);
                                $count = 0;
                                while ($r = mysqli_fetch_assoc($rs)) {
                                    $count++;
                                ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td>
                                            <?php
                                                $resul = $r['id_manufacturer'];
                                                $sql2 = "SELECT * FROM manufacturers WHERE id = '$resul'";         
                                                $rs2 = mysqli_query($connect, $sql2);
                                                $r2 = mysqli_fetch_assoc($rs2)
                                            ?>
                                            <?=$r2['name']?>
                                        </td>
                                        <td>
                                            <?php
                                                $resul2 = $r['id_category'];
                                                $sql3 = "SELECT * FROM categories WHERE id = '$resul2'";         
                                                $rs3 = mysqli_query($connect, $sql3);
                                                $r3 = mysqli_fetch_assoc($rs3)
                                            ?>
                                            <?=$r3['name']?>    
                                        </td>
                                        <td style="max-width:200px"><?= $r['name'] ?></td>
                                        <td><img src="../../public/images/<?= $r['image'] ?>" alt="" style="width: 100px"></td>
                                        <td><?= number_format($r['price']) ?></td>
                                        <td><?= $r['discount'] ?>%</td>
                                        <td><?= $r['quantity'] ?></td>
                                        <td>
                                            <a href="edit_product.php?id=<?=$r['id']?>">
                                                <button class="btn btn-warning" style="margin-top:2px;">Sửa</button>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger" onclick="xoa(<?= $r['id'] ?>)">Xóa</button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                        <form action="remove_product.php" method="post" id="xoa">
                            <input type="hidden" id="id" name="id">
                        </form>
                    </div>
                    <script>
                        function xoa(id){
                            var cf = confirm("Bạn có thực sự muốn xóa không!");
                            if(cf){
                                var f = document.getElementById('xoa');
                                document.getElementById('id').value = id;
                                f.submit();
                            }
                        }
                        <?php if (isset($_SESSION['success'])) { ?>
                            <?php
                            if ($_SESSION['success'] == "Thêm thành công") { ?>
                                swal("Success", "Thêm sản phẩm thành công", "success");
                            <?php
                            } else if ($_SESSION['success'] == "Sửa thành công") {
                            ?>
                                swal("Success", "Sửa sản phẩm thành công", "success");
                            <?php } else if ($_SESSION['success'] == "Xóa sản phẩm thành công!") {  ?>
                                swal("Success", "Xóa sản phẩm thành công!", "success");
                            <?php }
                            unset($_SESSION['success']); ?>
                        <?php } ?>
                        <?php if (isset($_SESSION['erorr_delete_product'])) { ?>
                                swal("error", "<?php  echo $_SESSION['erorr_delete_product'];?>", "error");
                        <?php } unset($_SESSION['erorr_delete_product']); ?>
                    </script>
                </div>
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

    <?php include('../components/link_footer.php') ?>
    <!-- end demo js-->
</body>

</html>