<?php

if (empty($_SESSION)) {
    session_start();
}
if (empty($_SESSION['admin'])) {
    $_SESSION['require_login'] = "Yêu cầu đăng nhập !";
    header("location:../login.php");
    exit();
}
