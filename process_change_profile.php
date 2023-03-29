<?php
session_start();
require('services/connect.php');
require('constants/common.php');
$id = $_SESSION['user']['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phonenumber'];
$gender = $_POST['gender'];
$id_role = constant('role_user');

$sql = "UPDATE users SET name = '$name', address = '$address', phone = '$phone', gender = '$gender' WHERE id = '$id' ";
$rv = mysqli_query($connect, $sql);

$_SESSION['user']['name'] = $name;
$_SESSION['user']['address'] = $address;
$_SESSION['user']['phone'] = $phone;
$_SESSION['user']['gender'] = $gender;

header('location:profile.php');
