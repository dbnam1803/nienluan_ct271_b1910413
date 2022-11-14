<?php 
    session_start();
?>
<div class="content container">
<h4>Gio Hang</h4> 
<table class="table table-bordered" style="text-align: center; border: 1px">
    <tr>
        <th>Mã SP</th>
        <th>Tên Sản Phẩm</th>
        <th>Số Lượng</th>
        <th>Giá</th>
        <th>Hình Ảnh</th>
        <th>Thành Tiền</th>
        <th>Quản Lý</th>
    </tr>
    <?php
        if(isset($_SESSION['cart'])){
            $tong = 0;
            foreach($_SESSION['cart'] as $cart){
            $thanhtien = $cart['gia'] * $cart['soluong'];
            $tong += $thanhtien;
    ?>
    <tr>
        <td><?php echo $cart['masp']; ?></td>
        <td><?php echo $cart['tensp']; ?></td>
        <td>
            <a href="page/main/themsp.php?sub=<?php echo $cart['id'] ?>"> <i class="fa-solid fa-minus"></i> </a>
            <?php echo $cart['soluong']?>
            <a href="page/main/themsp.php?add=<?php echo $cart['id'] ?>"> <i class="fa-solid fa-plus"></i> </a>
        </td>
        <td><?php echo number_format($cart['gia'],0,',','.').' vnđ'; ?></td>
        <td><img src="admin/module/sanpham/uploads/<?php echo $cart['hinhanh']?>" width="100px"></td>
        <td><?php echo number_format($thanhtien,0,',','.').' vnđ' ?></td>
        <td><a href="page/main/themsp.php?del=<?php echo $cart['id'] ?>" class='delsp'><i class="fa-solid fa-eraser"></i></a>
        </td>
    </tr>
    
    <?php
        }
    ?>
    <tr>
        <td colspan=6>Tong tien: <?php echo number_format($tong,0,',','.').' vnđ' ?></td>
        <td><a href="page/main/themsp.php?delall=1" class="delsp"><i class="fa-solid fa-trash"></i></a></td>
    </tr>
    <tr><td colspan="7"><p><a href="page/main/thanhtoan.php">Đặt Hàng</a></p></td></tr>
    <?php
    }else{
    ?>
    <tr>
        <td colspan="7" style="text-align: center">Chưa Có Sản Phẩm Trong Giỏ Hàng</td>
    </tr>
    <?php
    }
    if (isset($_SESSION['cp'])){
        echo '<script>
            alert("Thanh Toán Thành Công!!!");
        </script>';
        unset($_SESSION['cp']);
    }
    ?>

</table>
</div>
