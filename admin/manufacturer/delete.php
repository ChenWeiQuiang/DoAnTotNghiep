<?php
session_start();
require('../../services/connect.php');
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $sql = "DELETE FROM `manufacturers` WHERE id = $id";
    mysqli_query($connect, $sql);
    $_SESSION['success'] = "Delete success";
    header('location:../../admin/manufacturer');
}
