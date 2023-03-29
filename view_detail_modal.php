<?php
$id_product = $_GET['id'];
require('services/connect.php');
$sql = "SELECT * FROM `products` WHERE id = $id_product";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) == 1) {
    $each = mysqli_fetch_array($result);
}
echo json_encode($each);
