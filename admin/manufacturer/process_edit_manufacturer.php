<?php
require("../../services/connect.php");
session_start();
$id = $_POST['id'];
$name = $_POST["name"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$sql = "UPDATE `manufacturers` SET `name`='$name',`phone`='$phone', `address`='$address' WHERE id = $id";
$result = mysqli_query($connect, $sql);
if($result) {
    $_SESSION["success"]="Sửa thành công";
    header("location:../../admin/manufacturer"); 
}
?>
