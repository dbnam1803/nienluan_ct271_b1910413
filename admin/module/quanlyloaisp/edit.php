<?php
    $sql_show_dmsp = "SELECT * FROM ql_danhmucsp WHERE id_danhmucsp='$_GET[iddanhmuc]' LIMIT 1";
    $show_dmsp = mysqli_query($mysqli,$sql_show_dmsp);
?>
<div class="show">
<h6>SỮA DANH MỤC SẢN PHẨM</h6>
<div class="table">
    <table class="table table-bordered table-sm" style="border: 1px">
        <form action="module\quanlyloaisp\xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>" method="post">
            <?php
                while ($dong = mysqli_fetch_array($show_dmsp)){
            ?>
            <tr>
                <td>TÊN DANH MỤC</td>
                <td><input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc"></td>
            </tr>
            <tr>
                <td>THỨ TỰ</td>
                <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="editloai" value="Update"></td>
            </tr>
            <?php
            }
            ?>
            </form>
    </table>
    
</div>
</div>