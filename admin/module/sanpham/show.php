<?php
    $sql_show_sp = "SELECT * FROM ql_sanpham, ql_danhmucsp WHERE ql_danhmucsp.id_danhmucsp = ql_sanpham.id_danhmucsp";
    $show_sp = mysqli_query($mysqli,$sql_show_sp);
?>

<div class="show">
<h6>DANH SÁCH SẢN PHẨM</h6>
<div class="add">
<a class="btn btn-primary" href="?action=sanpham&query=add">Add</a>
</div>
<div class="table">
    <table class="table table-bordered table-sm" style="border: 1px">
        <form action="module\quanlyloaisp\xuly.php" method="post" >
        <tr>
            <th>ID</th>
            <th>Mã SP</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Loại SP</th>
            <th>Hình Ảnh</th>
            <th>Ghi Chú</th>
            <th>Trạng Thái</th>
            <th>QUẢN LÝ</th>
        </tr>
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($show_sp)){
                $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['ma_sp'] ?></td>
            <td><?php echo $row['tensp'] ?></td>
            <td><?php echo $row['gia'] ?></td>
            <td><?php echo $row['soluong'] ?></td>
            <td><?php echo $row['tendanhmuc'] ?></td>
            <td><img src="module/sanpham/uploads/<?php echo $row['hinhanh'] ?>" width="100px"></td>
            <td><?php echo $row['ghichu'] ?></td>
            <td><?php if ($row['trangthai']==1){
                echo 'Kích Hoạt'; 
            }else{
                echo 'Ẩn';
            }
            ?>              
            </td>

            <td>
                <a class="delete" href="module\sanpham\xuly.php?idsp=<?php echo $row['id_sp'] ?>'">Delete</a> | 
                <a href="?action=sanpham&query=edit&idsp=<?php echo $row['id_sp'] ?>">Edit</a>
            </td>
        </tr>
        <?php
        };
        ?>
        </form>
    </table>
</div>
</div>