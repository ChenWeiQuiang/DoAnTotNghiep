<?php
    include("../../services/connect.php");
    session_start();
    $tenLH = $_POST['manufacturer_name'];
    $phone =$_POST['phone'];
    $address =$_POST['address'];
    $path = "../../public/images/";
	$file = $path.basename($_FILES['img']['name']);
	if(!file_exists($file)){
		$rs = move_uploaded_file($_FILES['img']['tmp_name'], $file);
	}
    $anh = $file;
    $sql = "insert into manufacturers (name,phone,address,image)
            values('$tenLH','$phone','$address','$anh')";    
    $rs1 = mysqli_query($connect,$sql); 
    if($rs1){
        $_SESSION['success'] = "Thêm thành công";
       header("location:index.php");
    }    
?>