<?php
session_start();
require('services/connect.php');

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}

if (isset($_SESSION['user'])) {
    if (empty($_POST['name_receiver']) || empty($_POST['address_receiver']) || empty($_POST['phone_receiver'])) {
        $_SESSION['error_checkout'] = 'Yêu cầu nhập đủ thông tin thanh toán';
        header('location:checkout.php');
        die();
    }
    $id_user = $_POST['id_user'];
    $name_receiver = $_POST["name_receiver"];
    $address_receiver = $_POST["address_receiver"];
    $phone_receiver = $_POST["phone_receiver"];
    $notes = $_POST["notes"];
    $total_price = $_POST["total_price"];

    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];

        $sql = "INSERT INTO `orders`(`id_user`, `name_receiver`, `phone_receiver`, `address_receiver`, `notes`, `status`, `total_price`) 
                VALUES ('$id_user','$name_receiver','$phone_receiver','$address_receiver','$notes','Đang xử lý','$total_price')";
        mysqli_query($connect, $sql);

        $sql = "select max(id) from orders where id_user = '$id_user'";
        $result = mysqli_query($connect, $sql);
        $order_id = mysqli_fetch_array($result)['max(id)'];

        foreach ($cart as $product_id => $each) {
            $quantity = $each['quantity'];
            $sql = "insert into order_product(id_order, id_product, quantity)
	                values('$order_id', '$product_id', '$quantity')";
            mysqli_query($connect, $sql);
            $sql = "update products set quantity = products.quantity - $quantity where id = '$product_id'";
            mysqli_query($connect, $sql);
        }
        unset($_SESSION['cart']);
        header('location:purchase_history.php');
    }
} else {
    header('location:login.php');
}
