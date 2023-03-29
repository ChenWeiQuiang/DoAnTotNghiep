<?php
require('services/connect.php');
$id = $_POST['id'];
$sql = "UPDATE `orders` SET `status`='Đã hủy' WHERE id = $id";
mysqli_query($connect, $sql);
header('location:purchase_history.php');
