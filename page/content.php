<?php

if (isset($_GET['control'])){
    $non = $_GET['control'];
}else{
    $non = '';
}

if  ($non =='sanpham'){
    include("main/sanpham.php");
}elseif ($non == 'giohang'){
    include("main/giohang.php");
}elseif ($non == 'chitietsp'){
    include("main/chitietsp.php");
}elseif ($non == 'timkiem'){
    include("main/timkiem.php");
}else{
    include("main/home.php");
}
?>