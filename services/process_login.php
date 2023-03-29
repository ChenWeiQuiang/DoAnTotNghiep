<?php
session_start();
require('admin/connect.php');
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password' limit 1";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['messageLogin']  = "Đăng nhập thành công";
} else {
    $_SESSION['messageLogin']  = "Tài khoản hoặc mật khẩu không chính xác";
    header('location:login.php');
}
