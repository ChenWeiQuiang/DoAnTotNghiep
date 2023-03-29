<?php
session_start();
require('services/connect.php');

$id = $_GET['id']; // id cart
$type = $_GET['type'];

$sql = "select * from products where id = $id";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
if ($type === "1") {
    if ($_SESSION['cart'][$id]['quantity'] < $each['quantity']) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $_SESSION['cart'][$id]['quantity']--;
        echo 'update_failed';
    }
} else {
    if ($_SESSION['cart'][$id]['quantity'] > 1) {
        $_SESSION['cart'][$id]['quantity']--;
    } else {
        unset($_SESSION['cart'][$id]);
    }
}
