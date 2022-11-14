<?php
    $sql_show_dmsp = "SELECT * FROM ql_danhmucsp";
    $show_dmsp = mysqli_query($mysqli,$sql_show_dmsp);
?>

<div class="show">
<h6>DANH SÁCH LOẠI SẢN PHẨM</h6>
<div class="add">
<a class="btn btn-primary" href="?action=quanlydanhmucsp&query=add">Add</a>
</div>
<div class="table">
    <table class="table table-bordered table-sm" style="border: 1px">
        <form action="module\quanlyloaisp\xuly.php" method="post">
        <tr>
            <th>ID</th>
            <th>TÊN LOẠI</th>
            <th>QUẢN LÝ</th>
        </tr>
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($show_dmsp)){
                $i++;
        ?>
        <tr>
            <td><?php echo $row['id_danhmucsp'] ?></td>
            <td><?php echo $row['tendanhmuc'] ?></td>
            <td>
                <a class="delete" href="module\quanlyloaisp\xuly.php?iddanhmuc=<?php echo $row['id_danhmucsp'] ?>'">Delete</a> | 
                <a href="?action=quanlydanhmucsp&query=edit&iddanhmuc=<?php echo $row['id_danhmucsp'] ?>">Edit</a>
            </td>
        </tr>
        <?php
        };
        ?>
        </form>
    </table>
</div>
</div>