<?php
        session_start();
        //lấy id của hàng cần mua
        $id = $_GET['id'];
        $name = $_GET['name'];
        $price = $_GET['price'];
        //Kiểm tra xem đã có giỏ hàng chưa
        if(isset($_SESSION['cart']))//đã có giỏ thì lấy ra
        {
            $cart = $_SESSION['cart'];
        }
        else{//chưa có thì tạo
                $cart = [];
        }
        //Kiểm tra hàng có trong giỏ chưa
        if(array_key_exists($id, $cart)){//hàng đã có trong giỏ
            $cart[$id]['quantity']++;
        }
        else{//chưa có sp trong giỏ
            $cart[$id] = array('name'=>$name,'quantity'=>1,'price'=>$price);
        }
        //cập nhật lại giỏ hàng
        $_SESSION['cart'] = $cart;
        header("Location: index.php");
        
?>