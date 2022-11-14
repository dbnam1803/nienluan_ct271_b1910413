<?php
    $sql = "SELECT * FROM ql_danhmucsp, ql_sanpham WHERE ql_danhmucsp.id_danhmucsp=ql_sanpham.id_danhmucsp AND ql_sanpham.id_sp = '$_GET[id]' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
?>


<div class="content">
    <div class="hinhanh">
        <img src="admin/module/sanpham/uploads/<?php echo $row['hinhanh'] ?>">
    </div>
    <div class="clear"></div>
    <form action="page/main/themsp.php?idsp=<?php echo $row['id_sp'] ?>" method="post">
        <div class="title">
            <h3>Tên Sản Phẩm: <?php echo $row['tensp'] ?></h3>
            <p>Mã SP: <?php echo $row['ma_sp'] ?></p>
            <p>Giá: <?php echo $row['gia'] ?></p>
            <p>Số Lượng: <?php echo $row['soluong'] ?></p>
            <p>Loại SP: <?php echo $row['tendanhmuc'] ?></p>
            <?php
                if(isset($_COOKIE['user'])){
            ?>
                <p><input class="addcart bg-danger" name="themsp" type="submit" value="Thêm Giỏ Hàng"></p>
            <?php
                }else{
            ?>
                <p><input class="addcart bg-danger" type ="button" value="Thêm Giỏ Hàng" id="cart"></p>
                <div id="tb" class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Vui lòng đăng nhập để có thể mua hàng !!!</strong> 
                </div>
            <?php
                }
            ?>
        </div>
    </form>
</div>

<?php
    }
?>