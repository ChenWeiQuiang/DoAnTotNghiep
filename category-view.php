<?php
include("services/connect.php");
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('user/components/head.php') ?>
</head>

<body>
    <!-- header start -->
    <?php include('header.php') ?>
    <div class="container">
        <div id="content">
            <?php
            $cate_id = $_GET['cate_id'];
            $manu_id = $_GET['manu_id'];
            $sql =  "SELECT * FROM categories WHERE id =  '$cate_id'";
            $rs  = mysqli_query($connect, $sql);
            $r = mysqli_fetch_assoc($rs);
            if (empty($manu_id)) {
            ?>
                <h4><?= strtoupper($r['name']) ?> / <a href="index.php" style="color: aqua">TRANG CHỦ</a></h4>
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="home1" role="tabpanel">
                        <div class="custom-row">
                            <?php
                            $sql3 =  "SELECT * FROM products WHERE id_category =  '$cate_id'";
                            $rs3  = mysqli_query($connect, $sql3);
                            while ($r3 = mysqli_fetch_assoc($rs3)) {
                            ?>
                                <div class="custom-col-5 custom-col-style mb-65">
                                    <div class="product-wrapper" style="text-align: center;">
                                        <div class="product-img">
                                            <a href="#" style="display:block;">
                                                <img style="width:90%; height:90%;" src="public/images/<?= $r3['image'] ?>" alt="">
                                            </a>
                                            <span><?= -$r3['discount'] ?>%</span>
                                            <div class="product-action">
                                                <?php if (isset($_SESSION['user'])) { ?>
                                                    <a class="btn-add-to-cart animate-left" title="Add To Cart" data-id="<?php echo $r3['id'] ?>">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                    </a>
                                                <?php } else { ?>
                                                    <a class="animate-left" title="Đăng nhập" href="login.php">
                                                        <i class=" pe-7s-next"></i>
                                                    </a>
                                                <?php } ?>
                                                <a class="btn-view-detail animate-right" title="Quick View" data-id="<?php echo $r3['id'] ?>" data-toggle="modal" data-target="#exampleModal" href="#">
                                                    <i class="pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a href="product-detail.php?id=<?php echo $r3['id'] ?>" style="display:block;">
                                                <h4><?= $r3['name'] ?></h4>
                                                <div style=" text-decoration: line-through;"><?= number_format($r3['price']) ?><span style="text-decoration: underline;"><sup>đ</sup></span></div>
                                                <div style="color:red;font-weight: bold;font-size: 18px;"><?= number_format($r3['price'] * (1 - $r3['discount'] / 100)) ?><span style="text-decoration: underline;"><sup>đ</sup></span></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            } else {
                $sql2 =  "SELECT * FROM manufacturers WHERE id =  '$manu_id'";
                $rs2  = mysqli_query($connect, $sql2);
                $r2 = mysqli_fetch_assoc($rs2);
            ?>
                <h4><?= (strtoupper($r['name'])) ?> : <?= strtoupper($r2['name']) ?> / <a href="index.php" style="color: aqua">TRANG CHỦ</a></h4>
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="home1" role="tabpanel">
                        <div class="custom-row">
                            <?php
                            $sql3 =  "SELECT * FROM products WHERE id_category =  '$cate_id' AND id_manufacturer  = '$manu_id'";
                            $rs3  = mysqli_query($connect, $sql3);
                            while ($r3 = mysqli_fetch_assoc($rs3)) {
                            ?>
                                <div class="custom-col-5 custom-col-style mb-65">
                                    <div class="product-wrapper" style="text-align: center;">
                                        <div class="product-img">
                                            <a href="#" style="display:block;">
                                                <img style="width:90%; height:90%;" src="public/images/<?= $r3['image'] ?>" alt="">
                                            </a>
                                            <span><?= -$r3['discount'] ?>%</span>
                                            <div class="product-action">
                                                <?php if (isset($_SESSION['user'])) { ?>
                                                    <a class="btn-add-to-cart animate-left" title="Add To Cart" data-id="<?php echo $r3['id'] ?>">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                    </a>
                                                <?php } else { ?>
                                                    <a class="animate-left" title="Đăng nhập" href="login.php">
                                                        <i class=" pe-7s-next"></i>
                                                    </a>
                                                <?php } ?>
                                                <a class="btn-view-detail animate-right" title="Quick View" data-id="<?php echo $r3['id'] ?>" data-toggle="modal" data-target="#exampleModal" href="#">
                                                    <i class="pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a href="product-detail.php?id=<?php echo $r3['id'] ?>" style="display:block;">
                                                <h4><?= $r3['name'] ?></h4>
                                                <div style=" text-decoration: line-through;"><?= number_format($r3['price']) ?><span style="text-decoration: underline;"><sup>đ</sup></span></div>
                                                <div style="color:red;font-weight: bold;font-size: 18px;"><?= number_format($r3['price'] * (1 - $r3['discount'] / 100)) ?><span style="text-decoration: underline;"><sup>đ</sup></span></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- insta feed end -->
    <?php include('user/components/footer.php') ?>
    <!-- modal -->
    <?php include('user/components/modal_product.php') ?>
    <!-- all js here -->
    <?php include('user/components/link_footer.php') ?>
    <script>
        function convertNumberToCurrency(number) {
            const result = number.toLocaleString('it-IT', {
                style: 'currency',
                currency: 'VND'
            })
            return result;

        }
        $(document).ready(function() {
            // thêm sản phẩm vào giỏ hàng
            $(".btn-add-to-cart").click(function() {
                let id = $(this).data('id');
                $.ajax({
                        url: 'add_to_cart.php',
                        type: 'GET',
                        data: {
                            id
                        },
                    })
                    .done(function(response) {
                        if (response === 'add_to_cart_failed') {
                            $.notify('Số lượng trong giỏ hàng đã đạt tối đa', 'error');
                        } else if (response === 'product_out_of_stock') {
                            $.notify('Số lượng sản phẩm đã hết !', 'error');
                        } else {
                            $.notify(response + " vào giỏ hàng", "success");
                        }
                    })
            })

            // show modal chi tiết sản phẩm
            $(".btn-view-detail").click(function() {

                let id = $(this).data('id');
                $.ajax({
                        url: 'view_detail_modal.php',
                        type: 'GET',
                        data: {
                            id
                        },
                    })
                    .done(function(response) {
                        const product = JSON.parse(response)
                        console.log(product['name'])
                        $(".title-modal").text(product['name']);
                        $(".modal-quantity").text(`Số lượng: ${product['quantity']}`);
                        $(".title-price-old").text(convertNumberToCurrency(product['price']));
                        $(".title-price-new").text(convertNumberToCurrency(product['price'] - (product['price'] * product['discount'] / 100)));
                        $(".title-desc").text(product['description']);
                        $(".modal-image").attr("src", `public/images/${product['image']}`);
                        $(".modal-link").attr("href", `product-detail.php?id=${product['id']}`)
                    })
            })
        })

        <?php if (isset($_SESSION['login_success'])) { ?>
            $.notify('Đăng nhập thành công !', 'success');
        <?php unset($_SESSION['login_success']);
        } ?>
    </script>
</body>

</html>