<div class="show">
<h6>THÊM SẢN PHẨM</h6>
<div class="table">
    <form action="module\sanpham\xuly.php" method="post" enctype="multipart/form-data">
        <table class="table table-bordered table-sm" style="border: 1px">
            <tr>
                <td>Tên Sản Phẩm</td>
                <td><input type="text" name="tensp"></td>
            </tr>
            <tr>
                <td>Mã SP</td>
                <td><input type="text" name="masp"></td>
            </tr>
            <tr>
                <td>Giá Sản Phẩm</td>
                <td><input type="text" name="gia"></td>
            </tr>
            <tr>
                <td>Số Lượng</td>
                <td><input type="text" name="soluong"></td>
            </tr>
            <tr>
                <td>Hình Ảnh</td>
                <td><input type="file" name="hinhanh"></td>
            </tr>
            <tr>
                <td>Ghi Chú</td>
                <td><textarea name="ghichu" rows="5" style="resize: none" width=100%></textarea></td>
            </tr>
            <tr>
                <td>Loại SP</td>
                <td>
                    <select name="danhmuc">
                        <?php
                        $sql_loaisp = "SELECT * FROM ql_danhmucsp ORDER BY id_danhmucsp DESC";
                        $query_loai = mysqli_query($mysqli, $sql_loaisp);
                        while ($row_loai = mysqli_fetch_array($query_loai)){
                        ?>
                        <option value="<?php echo $row_loai['id_danhmucsp']?>"><?php echo $row_loai['tendanhmuc'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Trạng Thái</td>
                <td>
                    <select name="trangthai">
                        <option value="1">Kích Hoạt</option>
                        <option value="0">Ẩn</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="addsp" value="Add"></td>
            </tr>
        </table>
    </form>
</div>
</div>