<?php
include("../../connected.php");

$tenloaisp = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];
if (isset($_POST['addloai'])){
    $sql_add = "INSERT INTO ql_danhmucsp(tendanhmuc,thutu) VALUE ('".$tenloaisp."','".$thutu."')";
    mysqli_query($mysqli, $sql_add);
    header('Location:../../index.php?action=quanlydanhmucsp&query=show');
}elseif (isset($_POST['editloai'])) {
    $sql_edit = "UPDATE ql_danhmucsp SET tendanhmuc='".$tenloaisp."',thutu='".$thutu."' WHERE id_danhmucsp='$_GET[iddanhmuc]'";
    mysqli_query($mysqli, $sql_edit);
    header('Location:../../index.php?action=quanlydanhmucsp&query=show');
}
else {
    $id = $_GET['iddanhmuc'];
    $sql_del = 'DELETE FROM ql_danhmucsp WHERE id_danhmucsp="'.$id.'" ';
    mysqli_query($mysqli, $sql_del);
    header('Location:../../index.php?action=quanlydanhmucsp&query=show');
}

?>