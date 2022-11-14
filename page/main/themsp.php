<?php
    session_start();
    include("../../admin/connected.php");
    //Add
    if(isset($_GET['add'])){
        $id = $_GET['add'];
        foreach ($_SESSION['cart'] as $cart){
            if($cart['id'] != $id){
                $pro [] = array('tensp'=>$cart['tensp'], 'id'=>$cart['id'], 'soluong'=>$cart['soluong'], 'gia'=>$cart['gia'],
                'hinhanh'=>$cart['hinhanh'], 'masp'=>$cart['masp']);
                $_SESSION['cart'] = $pro;
            }else{
                $addsl = $cart['soluong'] + 1;
                if ($cart['soluong']<10){
                    $pro [] = array('tensp'=>$cart['tensp'], 'id'=>$cart['id'], 'soluong'=>$addsl, 'gia'=>$cart['gia'],
                    'hinhanh'=>$cart['hinhanh'], 'masp'=>$cart['masp']);
                }else{
                    $pro [] = array('tensp'=>$cart['tensp'], 'id'=>$cart['id'], 'soluong'=>$cart['soluong'], 'gia'=>$cart['gia'],
                    'hinhanh'=>$cart['hinhanh'], 'masp'=>$cart['masp']);
                }
                $_SESSION['cart'] = $pro;
            }
        header('Location:../../index.php?control=giohang');
        } 
    }
    //Sub
    if(isset($_GET['sub'])){
        $id = $_GET['sub'];
        foreach ($_SESSION['cart'] as $cart){
            if($cart['id'] != $id){
                $pro [] = array('tensp'=>$cart['tensp'], 'id'=>$cart['id'], 'soluong'=>$cart['soluong'], 'gia'=>$cart['gia'],
                'hinhanh'=>$cart['hinhanh'], 'masp'=>$cart['masp']);
                $_SESSION['cart'] = $pro;
            }else{
                $subsl = $cart['soluong'] - 1;
                if ($cart['soluong'] > 1){
                    $pro [] = array('tensp'=>$cart['tensp'], 'id'=>$cart['id'], 'soluong'=>$subsl, 'gia'=>$cart['gia'],
                    'hinhanh'=>$cart['hinhanh'], 'masp'=>$cart['masp']);
                }else{
                    $pro [] = array('tensp'=>$cart['tensp'], 'id'=>$cart['id'], 'soluong'=>$cart['soluong'], 'gia'=>$cart['gia'],
                    'hinhanh'=>$cart['hinhanh'], 'masp'=>$cart['masp']);
                }
                $_SESSION['cart'] = $pro;
            }
        header('Location:../../index.php?control=giohang');
        } 
    }
    //Del 1
    if(isset($_GET['del']) && $_GET['del']){
        $id = $_GET['del'];
        foreach ($_SESSION['cart'] as $cart){
            if($cart['id'] != $id){
                $pro [] = array('tensp'=>$cart['tensp'], 'id'=>$cart['id'], 'soluong'=>$cart['soluong'], 'gia'=>$cart['gia'],
                'hinhanh'=>$cart['hinhanh'], 'masp'=>$cart['masp']);
            }
        $_SESSION['cart'] = $pro;
        header('Location:../../index.php?control=giohang');
        }
        
    }
    //Del all
    if(isset($_GET['delall']) && $_GET['delall'] == 1){
        unset($_SESSION['cart']);
        header('Location:../../index.php?control=giohang');
    }
    //ADD vao gio
    if (isset($_POST['themsp'])){
        // session_destroy();
        $id = $_GET['idsp'];
        $soluong = 1;
        $sql = 'SELECT * FROM ql_sanpham WHERE id_sp = "'.$id.'" LIMIT 1';
        $que = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($que);
        if ($row){
            $new_pro=array(array('tensp'=>$row['tensp'], 'id'=>$id, 'soluong'=>$soluong, 'gia'=>$row['gia'],
            'hinhanh'=>$row['hinhanh'], 'masp'=>$row['ma_sp']));
            //kt ton tai
            if(isset($_SESSION['cart'])){
                $tmp = false;
                foreach ($_SESSION['cart'] as $cart){
                    if ($cart['id'] == $id){
                        $pro [] = array('tensp'=>$cart['tensp'], 'id'=>$cart['id'], 'soluong'=>$cart['soluong']+1, 'gia'=>$cart['gia'],
                        'hinhanh'=>$cart['hinhanh'], 'masp'=>$cart['masp']);
                        $tmp = true;
                    }else{
                        $pro [] = array('tensp'=>$cart['tensp'], 'id'=>$cart['id'], 'soluong'=>$cart['soluong'], 'gia'=>$cart['gia'],
                        'hinhanh'=>$cart['hinhanh'], 'masp'=>$cart['masp']);
                    }
                }
                if ($tmp == false){
                    $_SESSION['cart'] = array_merge($pro, $new_pro);
                }else{
                    $_SESSION['cart'] = $pro;
                }
            }else{
                $_SESSION['cart'] = $new_pro;
            }
        }
    }
    header('Location:../../index.php?control=giohang');

?>