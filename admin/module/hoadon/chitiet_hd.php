<?php
    $code = $_GET['code'];
    $hoadon = "SELECT * FROM cart_detail, ql_sanpham WHERE cart_detail.id_sp = ql_sanpham.id_sp
    AND cart_detail.cart_code = '".$code."'  ORDER BY cart_detail.cart_code DESC";
    $show_hd = mysqli_query($mysqli,$hoadon);
    $sql = "SELECT * FROM cart, account WHERE cart.cart_code = '".$code."' AND cart.id_acc = account.id_acc";
    $query = mysqli_query($mysqli, $sql);
    $ttin = mysqli_fetch_array($query);
?>

<div class="show">
<h6>HÓA ĐƠN</h6>
<p><strong>Tên Khách Hàng: </strong> <?php echo $ttin['name'] ?> </p>
<p><strong>Email: </strong> <?php echo $ttin['email'] ?> </p>
<p><strong>SĐT: </strong> <?php echo $ttin['sdt'] ?> </p>
<p><strong>Thời Gian Đặt Hàng: </strong> <?php echo $ttin['time_cart'] ?> </p>

<div class="table">
    <table class="table table-bordered table-sm" style="border: 1px">
        <form action="module\quanlyloaisp\xuly.php" method="post" >
        <tr>
            <th>ID</th>
            <th>Mã SP</th>
            <th>Tên Sản Phẩm</th>   
            <th>Số Lượng</th>
            <th>Giá</th>
            <td>Thành Tiền</td>
        </tr>
        <?php
            $i = 0;
            $tong= 0;
            while ($row = mysqli_fetch_array($show_hd)){
                $i++;
                $tong += $row['gia']*$row['sl'];
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['ma_sp'] ?></td>
            <td><?php echo $row['tensp'] ?></td>
            <td><?php echo $row['sl'] ?></td>
            <td><?php echo number_format($row['gia'],0,',','.') ?></td>
            <td><?php echo number_format($row['gia']*$row['sl'],0,',','.') ?></td>          
        </tr>
        <?php
        };
        ?>
        <tr>
            <td colspan="6">Tổng: <?php echo number_format($tong,0,',','.')?></td>
        </tr>
        </form>
    </table>
</div>
</div>