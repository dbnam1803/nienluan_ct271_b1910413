<?php
    $list_hd = "SELECT * FROM cart, account WHERE cart.id_acc = account.id_acc ORDER BY cart_id DESC";
    $show_list = mysqli_query($mysqli,$list_hd);
?>

<div class="show">
<h6>DANH SÁCH HÓA ĐƠN</h6>
<div class="table">
    <table class="table table-bordered table-sm" style="border: 1px">
        <form action="module\quanlyloaisp\xuly.php" method="post" >
        <tr>
            <th>ID</th>
            <th>Tên Khách Hàng</th>
            <th>Email</th>
            <th>Thời Gian</th>
            <th>QUẢN LÝ</th>
        </tr>
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($show_list)){
                $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['email'] ?></td>       
            <td><?php echo $row['time_cart'] ?></td>       

            <td>
                <a href="?action=chitiet&query=xem&code=<?php echo $row['cart_code'] ?>">Chi Tiết</a>
            </td>
        </tr>
        <?php
        };
        ?>
        </form>
    </table>
</div>
</div>