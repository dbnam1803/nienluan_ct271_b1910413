<?php
    session_start();
    include("../../admin/connected.php");
    $id_kh = $_COOKIE['id_kh'];
    $cart_code = rand(0,9999);
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $time_cart = date("d/m/Y H:i:sa");
    $sql_cart = 'INSERT INTO cart (id_acc, cart_code, time_cart,cart_status) VALUE ("'.$id_kh.'", "'.$cart_code.'", "'.$time_cart.'", 1)';
    $query_cart = mysqli_query($mysqli, $sql_cart);
    if($sql_cart){
        foreach ($_SESSION['cart'] as $key => $value){
            $id_sp = $value['id'];
            $sl = $value['soluong'];
            $sql_detail = 'INSERT INTO cart_detail(cart_code, id_sp, sl) VALUE ("'.$cart_code.'", "'.$id_sp.'", "'.$sl.'")';
            mysqli_query($mysqli, $sql_detail);
        }
    }
    unset($_SESSION['cart']);
    $_SESSION['cp'] = 1;
    header('Location:../../index.php?control=giohang');
?>