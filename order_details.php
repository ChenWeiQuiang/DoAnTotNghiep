<?php
require('services/check_user_login.php');
include("services/connect.php");
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('user/components/head.php') ?>
</head>

<body>
    <?php
    include("services/connect.php");
    ?>
    <!-- header start -->
    <?php include('user/components/header.php') ?>
    <!-- header end -->

    <!-- body start -->

    <body>
        <?php
        //lấy id của bản ghi cần xem
        $id = $_GET['id'];
        $sql = "SELECT * FROM order_product WHERE id_order = '$id'";
        $rs = mysqli_query($connect, $sql);
        ?>
        <div class="cart-main-area pt-95 pb-100">
            <br><br><br><br><br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                        <h1 class="cart-heading">Chi tiết hóa đơn</h1>
                        <form action="#">
                            <div class="table-content table-responsive">
                                <?php
                                //lấy giỏ hàng
                                if (isset($_SESSION['user'])) {
                                ?>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Hình ảnh</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                                <th>Thành tiền</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 0;
                                            $total = 0;
                                            while ($row = mysqli_fetch_assoc($rs)) {
                                                $product_id = $row['id_product'];
                                                $sql2 = "SELECT * FROM products WHERE id= '$product_id'";
                                                $rs2 = mysqli_query($connect, $sql2);
                                                $row2 = mysqli_fetch_assoc($rs2);
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><?= $count ?></td>
                                                    <td><?= $row2['name'] ?></td>
                                                    <td><img style="width:100px" src="public/images/<?= $row2['image'] ?>" alt=""></td>
                                                    <td><?= $row['quantity'] ?></td>
                                                    <th><?= number_format($row2['price'] * (100 - $row2['discount']) / 100) ?></th>
                                                    <td><?= number_format($row['quantity'] * $row2['price'] * (100 - $row2['discount']) / 100) ?></td>
                                                    <?php
                                                    $total += ($row['quantity'] * $row2['price'] * (100 - $row2['discount']) / 100);
                                                    ?>
                                                </tr>
                                            <?php
                                                // close while()  
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="5"><strong>Tổng tiền</strong></td>
                                                <td><b id="tongTien"><?= number_format($total) ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php
                                } else {
                                    echo 'Đăng nhập để xem lại lịch sử mua hàng';
                                }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <a href="bill_print.php?id=<?php echo $id ?>">In hóa đơn</a>
                                        <!-- <a href="index.php">Trở về trang chủ</a> -->
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </body>

    <!-- footer start -->
    <?php
    include('user/components/footer.php');
    ?>

    <!-- all js here -->
    <?php include('user/components/link_footer.php') ?>

</html>