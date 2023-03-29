<?php
try {
    session_start();
    // unset($_SESSION['cart']);
    if (empty($_SESSION['user'])) {
        header('location:login.php');
        exit();
        throw new Exception("Yêu cầu đăng nhập để mua hàng");
    }
    $customer_id = $_SESSION['user']['id'];
    if (empty($_GET['id'])) {
        throw new Exception("Không tồn tại id");
    }
    $id = $_GET['id'];
    require('services/connect.php');

    $sql = "select * from products where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    if (empty($_SESSION['cart'][$id])) {
        $number_rows = mysqli_num_rows($result);
        if ($number_rows == 0) {
            $_SESSION['error'] = "Không có sản phẩm này !";
            header('location:index.php');
            exit();
        }
        if ($each['quantity'] == 0) {
            echo 'product_out_of_stock';
            return;
        }
        $_SESSION['cart'][$id]['name'] = $each['name'];
        $_SESSION['cart'][$id]['discount'] = $each['discount'];
        $_SESSION['cart'][$id]['image'] = $each['image'];
        $_SESSION['cart'][$id]['total_quantity'] = $each['quantity'];
        $_SESSION['cart'][$id]['price'] =  floatval($each['price']);
        $_SESSION['cart'][$id]['quantity'] = 1;
    } else {
        $_SESSION['cart'][$id]['quantity']++;
        if ($_SESSION['cart'][$id]['quantity'] > $each['quantity']) {
            $_SESSION['cart'][$id]['quantity']--;
            echo 'add_to_cart_failed';
            return;
        }
    }
    echo "Thêm thành công " . $_SESSION['cart'][$id]['name'];
} catch (Throwable $e) {
    echo $e->getMessage();
}
