<?php
    $sql_show_sp = "SELECT * FROM ql_sanpham WHERE id_sp='$_GET[idsp]' LIMIT 1";
    $show_sp = mysqli_query($mysqli,$sql_show_sp);
?>
<div class="show">
<h6>SỬA SẢN PHẨM</h6>
<div class="table">
    
    
    <table class="table table-bordered table-sm" style="border: 1px">
        <?php
            while ($row = mysqli_fetch_array($show_sp)){
        ?>
        <form action="module\sanpham\xuly.php?idsp=<?php echo $row['id_sp'] ?>" method="post" enctype="multipart/form-data">
            <tr>
                <td>Tên Sản Phẩm</td>
                <td><input type="text" value="<?php echo $row['tensp'] ?>" name="tensp"></td>
            </tr>
            <tr>
                <td>Mã SP</td>
                <td><input type="text" value="<?php echo $row['ma_sp'] ?>" name="masp"></td>
            </tr>
            <tr>
                <td>Giá Sản Phẩm</td>
                <td><input type="text" value="<?php echo $row['gia'] ?>" name="gia"></td>
            </tr>
            <tr>
                <td>Số Lượng</td>
                <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
            </tr>
            <tr>
                <td>Hình Ảnh</td>
                <td><input type="file" name="hinhanh">
                    <img src="module/sanpham/uploads/<?php echo $row['hinhanh'] ?>" width="100px">
                </td>
            </tr>
            <tr>
                <td>Ghi Chú</td>
                <td><textarea name="ghichu" rows="3" style="resize: none" width=100%></textarea></td>
            </tr>
            <tr>
                <td>Loại SP</td>
                <td>
                    <select name="danhmuc">
                        <?php
                        $sql_loaisp = "SELECT * FROM ql_danhmucsp ORDER BY id_danhmucsp DESC";
                        $query_loai = mysqli_query($mysqli, $sql_loaisp);
                        while ($row_loai = mysqli_fetch_array($query_loai)){
                            if ($row_loai['id_danhmucsp'] ==$row['id_danhmucsp']){
                        ?>
                        <option selected value="<?php echo $row_loai['id_danhmucsp']?>"><?php echo $row_loai['tendanhmuc'] ?></option>
                        <?php
                            }else{
                        ?>
                            <option value="<?php echo $row_loai['id_danhmucsp']?>"><?php echo $row_loai['tendanhmuc'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Trạng Thái</td>
                <td>
                    <select name="trangthai">
                        <?php
                            if ($row['trangthai']==1){
                        ?>
                            <option value="1" selected>Kích Hoạt</option>
                            <option value="0">Ẩn</option>
                        <?php
                            }else{
                        ?>
                            <option value="1">Kích Hoạt</option>
                            <option value="0" selected>Ẩn</option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="editsp" value="Update"></td>
            </tr>
            </form>
            <?php
            }
            ?>
    </table>
</div>
</div>