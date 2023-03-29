<?php
session_start();
require('services/connect.php');
require('constants/common.php');
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$id_role = constant('role_user');

if (strlen($password) < 8) {
    $_SESSION['error_register'] = 'Mật khẩu dưới 8 ký tự !';
    header('location:register.php');
} else {
    $mdPass = md5($password);
    $sql = "INSERT INTO `users`(`name`, `email`, `password`, `id_role`) VALUES ('$name', '$email', '$mdPass',$id_role)";
    $result = mysqli_query($connect, $sql);

    if ($result === false) {
        $_SESSION['error_register'] = 'Email đã được đăng kí, vui lòng thử lại !';
        header('location:register.php');
    } else {
        $sql = "SELECT * FROM `users` WHERE `email` = '$email' limit 1";
        $result = mysqli_query($connect, $sql);
        $_SESSION['user'] = mysqli_fetch_array($result);
        header('location:index.php');
    }
}
