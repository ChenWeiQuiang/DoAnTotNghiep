<?php
session_start();
include("../../services/connect.php");
$id = trim($_POST['id']);
$sql = "DELETE FROM products WHERE id = '$id'";
try {
    mysqli_query($connect, $sql);
    $_SESSION['success'] = "Xóa sản phẩm thành công!";
    header("location:index.php");
} catch (Exception $e) {
    $_SESSION['erorr_delete_product'] = "Sản phẩm đã ở trong đơn hàng không thể xóa";
    header("location:index.php");
}

//$rs = 