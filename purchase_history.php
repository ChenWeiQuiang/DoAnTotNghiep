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
        <div class="cart-main-area pt-95 pb-100">
            <br><br><br><br><br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                        <h1 class="cart-heading">Lịch sử mua hàng</h1>
                        <form action="#">
                            <div class="table-content table-responsive">
                                <?php
                                //lấy giỏ hàng
                                if (isset($_SESSION['user'])) {
                                    //$cart = $_SESSION['cart'];
                                    $user_id = $_SESSION['user']['id'];
                                    $sql = " SELECT * FROM orders WHERE id_user = '$user_id' ";
                                    $rs = mysqli_query($connect, $sql);
                                    $total = 0;
                                    $count = 0;
                                ?>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Ngày tạo đơn</th>
                                                <th>Thành tiền</th>
                                                <th>Trạng thái</th>
                                                <th>Chi tiết đơn hàng </th>
                                                <th>Hành động</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($rs as $item) :
                                                $total += $item['total_price'];
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><?= $count ?></td>
                                                    <td><?= $item['created_at'] ?></td>
                                                    <td><?= number_format($item['total_price']) . 'VND' ?></td>
                                                    <td class="
                                                    <?php if ($item['status'] === 'Đang xử lý') {
                                                        echo 'text-warning';
                                                    } else if ($item['status'] === 'Thành công' || $item['status'] === 'Đã duyệt') {
                                                        echo 'text-success';
                                                    } else if ($item['status'] === 'Đã hủy' || $item['status'] === 'Đã xóa') {
                                                        echo 'text-danger';
                                                    } ?>"><?= $item['status'] ?></td>
                                                    <td>
                                                        <a class="cart-btn" href="order_details.php?id=<?php echo $item['id'] ?>">Chi tiết</a>
                                                    </td>
                                                    <?php if ($item['status'] === 'Đang xử lý') {                                                     ?>
                                                        <td>
                                                            <!-- <a class="cart-btn text-danger" href="cancel_order.php?id=<?php echo $item['id'] ?>">Hủy đơn</a> -->
                                                            <a class="cart-btn text-danger" href="javascript:void(0);" onclick="remove(<?php echo $item['id'] ?>)">Hủy đơn</a>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                            <?php endforeach ?>
                                            <tr>
                                                <td colspan=" 4"><strong>Tổng tiền</strong>
                                                </td>
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
                                        <a href="index.php">Trở về trang chủ</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="cancel_order.php" method="POST" id="form_delete">
                            <input type="hidden" name="id" id="id_delete">
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- all js here -->
        <?php include('user/components/link_footer.php') ?>
    </body>
    <?php include('user/components/footer.php'); ?>
    <script>
        function remove(id) {
            console.log(id)
            $("#id_delete").val(id);
            const form = $('#form_delete');

            swal({
                    title: "Bạn chắc chắn?",
                    text: "Khi đã xóa, bạn sẽ không thể lấy lại được bản ghi!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#form_delete').submit();
                        swal("Bạn đã xóa một bản ghi! " + id, {
                            icon: "success",
                        });
                    } else {
                        swal("Bản ghi an toàn!");
                    }
                });
        }
    </script>

</html>