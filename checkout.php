<?php
require('services/check_user_login.php');
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    header('location:index.php');
}

$total_money = 0;
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('user/components/head.php') ?>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- header start -->
    <?php include('user/components/header.php') ?>
    <!-- header end -->
    <div class="container">
        <h2>Thông tin thanh toán</h2>
    </div>
    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        <h3>Phản hồi khách hàng <span id="showlogin">Nhấn vào đây để đăng nhập</span></h3>
                        <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="form-row-first">
                                        <label>Tài khoản hoặc email <span class="required">*</span></label>
                                        <input type="text" />
                                    </p>
                                    <p class="form-row-last">
                                        <label>Mật khẩu <span class="required">*</span></label>
                                        <input type="text" />
                                    </p>
                                    <p class="form-row">
                                        <input type="submit" value="Đăng nhập" />
                                        <label>
                                            <input type="checkbox" />
                                            Nhớ thiết bị này
                                        </label>
                                    </p>
                                    <p class="lost-password">
                                        <a href="#">Bạn quên mật khẩu?</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!-- ACCORDION END -->
                        <!-- ACCORDION START -->
                        <h3>Có phiếu giảm giá? <span id="showcoupon">Nhấn vào đây để nhập phiếu giảm giá</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="checkout-coupon">
                                        <input type="text" placeholder="Mã giảm giá" />
                                        <input type="submit" value="Đồng ý" />
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!-- ACCORDION END -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <form id="form_checkout" action="process_checkout.php" method="POST">
                        <input type="hidden" name="id_user" value="<?php echo $user['id'] ?>">
                        <div class="checkbox-form">
                            <h3>Chi tiết hóa đơn</h3>
                            <?php if (isset($_SESSION['error_checkout'])) { ?>
                                <h5 class="text-danger">
                                    <?php echo $_SESSION['error_checkout'];
                                    unset($_SESSION['error_checkout']); ?>
                                </h5>
                            <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Họ tên người nhận <span class="required">*</span></label>
                                        <input name="name_receiver" type="text" placeholder="" value="<?php echo $user['name'] ?>" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Địa chỉ nhận hàng <span class="required">*</span></label>
                                        <input type="text" name="address_receiver" placeholder="" value="<?php echo $user['address'] ?>" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Số điện thoại <span class="required">*</span></label>
                                        <input name="phone_receiver" type="number" value="<?php echo $user['phone'] ?>" />
                                    </div>
                                </div>
                                <div class="order-notes">
                                    <div class="checkout-form-list mrg-nn">
                                        <label>Notes</label>
                                        <textarea name="notes" id="checkout-mess" cols="50" rows="30" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: lưu ý đặc biệt để giao hàng."></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="total_price" value="<?php echo $total_money; ?>">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="your-order">
                        <h3>Hóa đơn của bạn</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-total">Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart as $item) { ?>
                                        <?php $total_money += $item['price']  * $item['quantity'] ?>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                <?php echo $item['name'] ?> <strong class="product-quantity"> × <?= $item['quantity'] ?></strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount"><?php echo number_format($item['price']  * $item['quantity']) ?>VND</span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>

                                    <tr class="cart-subtotal">
                                        <th>Tổng giá trị</th>
                                        <td><span class="amount"><?php echo number_format($total_money) ?>VND</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Số tiền cần thanh toán</th>
                                        <td><strong><span class="amount"><?php echo number_format($total_money) ?>VND</span></strong>
                                        </td>
                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div class="panel-group" id="faq">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title"><a data-toggle="collapse" aria-expanded="true" data-parent="#faq" href="#payment-1">Chuyển khoản trực tiếp.</a></h5>
                                        </div>
                                        <div id="payment-1" class="panel-collapse collapse show">
                                            <div class="panel-body">
                                                <p>Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn làm tham chiếu thanh toán. Đơn đặt hàng của bạn sẽ không được giao cho đến khi tiền đã hết trong tài khoản của chúng tôi.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title"><a class="collapsed" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-2">Sử dung Payment</a></h5>
                                        </div>
                                        <div id="payment-2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn làm tham chiếu thanh toán. Đơn đặt hàng của bạn sẽ không được giao cho đến khi tiền đã hết trong tài khoản của chúng tôi.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title"><a class="collapsed" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-3">PayPal</a></h5>
                                        </div>
                                        <div id="payment-3" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn làm tham chiếu thanh toán. Đơn đặt hàng của bạn sẽ không được giao cho đến khi tiền đã hết trong tài khoản của chúng tôi.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <input type="submit" value="Đặt hàng" onclick="handleClick()" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
    <?php include('user/components/footer.php') ?>
    <!-- modal -->
    <div class="modal fade" id="exampleCompare" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="pe-7s-close" aria-hidden="true"></span>
        </button>
        <div class="modal-dialog modal-compare-width" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="#">
                        <div class="table-content compare-style table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>
                                            <a href="#">Remove <span>x</span></a>
                                            <img src="assets/img/cart/4.jpg" alt="">
                                            <p>Blush Sequin Top </p>
                                            <span>$75.99</span>
                                            <a class="compare-btn" href="#">Add to cart</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>Description </h4>
                                        </td>
                                        <td class="compare-dec compare-common">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has beenin the stand ard dummy text ever since the 1500s, when an unknown printer took a galley</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>Sku </h4>
                                        </td>
                                        <td class="product-none compare-common">
                                            <p>-</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>Availability </h4>
                                        </td>
                                        <td class="compare-stock compare-common">
                                            <p>In stock</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>Weight </h4>
                                        </td>
                                        <td class="compare-none compare-common">
                                            <p>-</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>Dimensions </h4>
                                        </td>
                                        <td class="compare-stock compare-common">
                                            <p>N/A</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>brand </h4>
                                        </td>
                                        <td class="compare-brand compare-common">
                                            <p>HasTech</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>color </h4>
                                        </td>
                                        <td class="compare-color compare-common">
                                            <p>Grey, Light Yellow, Green, Blue, Purple, Black </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>size </h4>
                                        </td>
                                        <td class="compare-size compare-common">
                                            <p>XS, S, M, L, XL, XXL </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title"></td>
                                        <td class="compare-price compare-common">
                                            <p>$75.99 </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <!-- all js here -->
    <?php include('user/components/link_footer.php') ?>
    <script>
        function handleClick() {
            $("input[name=total_price]").val("<?php echo $total_money ?>");
            $('#form_checkout').submit();
        }
    </script>
</body>

</html>