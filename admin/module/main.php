<?php
    if (isset($_GET['action']) && isset($_GET['query'])){
        $non = $_GET['action'];
        $que = $_GET['query'];
    }else{
        $non = '';
        $que = '';
    }
    
    if  ($non =='quanlydanhmucsp' && $que == 'show'){
        include("module/quanlyloaisp/show.php");
    }elseif ($non =='quanlydanhmucsp' && $que == 'edit') {
        include("module/quanlyloaisp/edit.php");
    }elseif ($non =='quanlydanhmucsp' && $que == 'add') {
        include("module/quanlyloaisp/add.php");
    }elseif ($non =='sanpham' && $que == 'show') {
        include("module/sanpham/show.php");
    }elseif ($non =='sanpham' && $que == 'edit') {
        include("module/sanpham/edit.php");
    }elseif ($non =='sanpham' && $que == 'add') {
        include("module/sanpham/add.php");
    }elseif ($non =='hoadon' && $que == 'list') {
        include("module/hoadon/list_hd.php");
    }elseif ($non =='chitiet' && $que == 'xem') {
        include("module/hoadon/chitiet_hd.php");
    }else{
        include("dash.php");
    }
?>