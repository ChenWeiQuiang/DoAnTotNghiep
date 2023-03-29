<?php
session_start();
require('services/connect.php');
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) == 1) {
    $each = mysqli_fetch_array($result);
    if ($each['id_role'] == 1) {
        $_SESSION['admin'] = $each;
        header('location:admin/index.php');
    } else {
        $_SESSION['login_success'] = 'Đăng nhập thành công !';
        $_SESSION['user'] = $each;
        header('location:index.php');
    }
} else {
    $_SESSION['login_failed'] = 'Tài khoản hoặc mật khẩu không hợp lệ, vui lòng thử lại !';
    header('location:login.php');
}
