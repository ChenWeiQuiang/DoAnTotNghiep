<?php
require('connect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO `users`(`name`, `email`, `password`, `id_role`) VALUES ('$name', '$email', '$password', '2')";

mysqli_query($connect, $sql);
header('location:login.php');
