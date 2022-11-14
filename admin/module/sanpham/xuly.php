<?php
include("../../connected.php");

$tensp = $_POST['tensp'];
$masp = $_POST['masp'];
$gia = $_POST['gia'];
$soluong = $_POST['soluong'];

$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh_time = time().'_'.$hinhanh;
$ghichu = $_POST['ghichu'];
$trangthai = $_POST['trangthai'];
$danhmuc = $_POST['danhmuc'];

if (isset($_POST['addsp'])){
    $sql_add = "INSERT INTO ql_sanpham(tensp,ma_sp,gia,soluong,hinhanh,ghichu,trangthai,id_danhmucsp) 
    VALUE ('".$tensp."','".$masp."', '".$gia."', '".$soluong."', '".$hinhanh_time."', '".$ghichu."', '".$trangthai."', '".$danhmuc."')";
    mysqli_query($mysqli, $sql_add);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);
    header('Location:../../index.php?action=sanpham&query=show');
}elseif (isset($_POST['editsp'])) {
    if($hinhanh!=''){
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);
        $sql_edit = "UPDATE ql_sanpham SET tensp='".$tensp."',ma_sp='".$masp."', gia='".$gia."',soluong='".$soluong."',
                hinhanh='".$hinhanh_time."', ghichu='".$ghichu."',trangthai='".$trangthai."',id_danhmucsp='".$danhmuc."' WHERE id_sp='$_GET[idsp]'";
        $sql = "SELECT * FROM ql_sanpham WHERE id_sp='$_GET[idsp]' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink ('uploads/'.$row['hinhanh']);
        }
    }else{
        $sql_edit = "UPDATE ql_sanpham SET tensp='".$tensp."',ma_sp='".$masp."', gia='".$gia."',soluong='".$soluong."', ghichu='".$ghichu."',
        trangthai='".$trangthai."', id_danhmucsp='".$danhmuc."' WHERE id_sp='$_GET[idsp]'";
    }
    mysqli_query($mysqli, $sql_edit);
    header('Location:../../index.php?action=sanpham&query=show');
}
else {
    $id = $_GET['idsp'];
    $sql = 'SELECT * FROM ql_sanpham WHERE id_sp="'.$id.'" LIMIT 1';
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink ('uploads/'.$row['hinhanh']);
    }
    $sql_del = 'DELETE FROM ql_sanpham WHERE id_sp="'.$id.'" ';
    mysqli_query($mysqli, $sql_del);
    header('Location:../../index.php?action=sanpham&query=show');
}

?>