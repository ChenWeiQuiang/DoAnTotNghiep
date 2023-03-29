<?php 
require("../../services/connect.php");
session_start();
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $id = $_POST["id"];
    
    $sql = "UPDATE `users` SET `name`='$name',`email`='$email',
    `address`='$address',`phone`='$phone',`gender`='$gender' WHERE id = $id";
    mysqli_query($connect, $sql);
    $_SESSION["success"]="Thành công";
    header("location:../../admin/employee");
}   
?>