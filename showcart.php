<?php
require('services/check_user_login.php');
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('user/components/head.php') ?>
</head>
<script>
    function suasoluong(id) {
        var f = document.getElementById('suasl');
        document.getElementById('id').value = id;
        f.submit();
    }
</script>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- header start -->
    <?php include('user/components/header.php') ?>
    <!-- header end -->
    <!-- shopping-cart-area start -->
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="cart-heading">Giỏ hàng</h1>
                    <form class="form-cart" action="#">
                        <div class="table-content table-responsive">
                            <?php
                            //lấy giỏ hàng
                            if (isset($_SESSION['cart'])) {
                                $cart = $_SESSION['cart'];
                            ?>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên hàng</th>
                                            <th>Hình ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 0;
                                        $total_money = 0;
                                        $total_quantity = 0; ?>
                                        <?php foreach ($cart as $id => $item) : ?>
                                            <?php
                                            $count++;
                                            $total_quantity += $item['quantity'];
                                            $price_item = $item['price']  - ($item['price'] * $item['discount'] / 100);
                                            $price_total = $item['quantity'] *  $price_item;
                                            $total_money +=   $price_total;
                                            ?>
                                            <tr>
                                                <td><?= $count ?></td>
                                                <td><?= $item['name'] ?></td>
                                                <td><img src="public/images/<?php echo $item['image'] ?>" class="cart-image" alt=""></td>
                                                <td class="product-quantity">
                                                    <button type="button" class="btn btn-secondary btn-update-quantity" data-id="<?php echo $id ?>" data-quantity="<?php echo $item['total_quantity'] ?>" data-type="0">-</button>
                                                    <span class="span-quantity"><?php echo $item['quantity'] ?></span>
                                                    <button type="button" class="btn btn-secondary btn-update-quantity" data-id="<?php echo $id ?>" data-type="1" data-quantity="<?php echo $item['total_quantity'] ?>">+</button>
                                                </td>
                                                <td><span class="span-price"><?= number_format($price_item) ?></span></td>
                                                <td><span class="span-sum"><?= number_format($price_total) ?></span></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            <?php
                            } else {
                                echo 'Không có hàng trong giỏ';
                            }
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="coupon-all">
                                    <div class="coupon2">
                                        <button class="button-primary"><a href="reset_cart.php">Xóa tất cả sản phẩm</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['cart'])) { ?>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Tổng</h2>
                                        <ul>
                                            <li>Số sản phẩm: <span>
                                                    <?php
                                                    if (isset($total_quantity)) {
                                                        echo $total_quantity;
                                                    } else echo 0;
                                                    ?>
                                                </span></li>
                                            <li>Tổng tiền:
                                                <?php if (isset($total_money)) { ?>
                                                    <span class="span-total"><?php echo number_format($total_money) ?></span>
                                                <?php } ?>
                                                </span>
                                            </li>
                                        </ul>
                                        <a href="checkout.php">Đặt hàng</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- shopping-cart-area end -->
    <?php include('user/components/footer.php') ?>

    <!-- all js here -->
    <?php include('user/components/link_footer.php') ?>
    <script>
        Number.prototype.format = function(n, x) {
            var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
            return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
        };
        $(document).ready(function() {
            function getTotal() {
                let total = 0;
                $(".span-sum").each(function(index, el) {
                    total += parseInt($(this).text().replace(/,/g, ''));
                });
                $(".span-total").text(total.format())
            }
            $(".btn-update-quantity").click(function() {
                const btn = $(this);
                let id = $(this).data('id');
                const quantityProduct = $(this).data('quantity');
                console.log('quantity: ', quantityProduct);
                let type = $(this).data('type');
                $.ajax({
                        url: 'update_quantity.php',
                        type: 'GET',
                        data: {
                            id,
                            type
                        },
                    })
                    .done(function(response) {
                        let parent_tr = btn.parents('tr');
                        let price = parseInt(parent_tr.find(".span-price").text().replace(/,/g, ''));
                        let quantity = parent_tr.find(".span-quantity").text()

                        if (type === 1) {
                            quantity++;
                            if (quantity > quantityProduct) {
                                quantity--;
                            }
                        } else {
                            quantity--;
                        }
                        if (quantity === 0) {
                            parent_tr.remove()
                        } else {
                            parent_tr.find(".span-quantity").text(quantity);
                            let sum = price * quantity;
                            parent_tr.find('.span-sum').text(sum.format());
                        }
                        getTotal()

                        if (response) {
                            $.notify('Vượt quá số lượng sản phẩm !', 'error');
                        }
                    })

            });
        })
    </script>
</body>

</html>