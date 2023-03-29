<?php
    include("../../services/connect.php");
    session_start();
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $path = "../../public/images/";
	$file = $path.basename($_FILES['img']['name']);
	if(!file_exists($file)){
		$rs = move_uploaded_file($_FILES['img']['tmp_name'], $file);
	}
    $anh = $file;  
    $sql = "INSERT INTO `users`(`name`, `email`, `password`, `address`, `phone`, `gender`, `image`, `id_role`) 
            VALUES ('$name','$email','$password','$address','$phone','$gender','$anh','1')";
    $rs1 = mysqli_query($connect,$sql); 
    if($rs1){
        $_SESSION['success'] = "Thêm thành công nhân viên!";
       header("location:index.php");
    }    
?>