<?php
    $id = $_COOKIE['id_kh'];
    $list_hd = "SELECT * FROM cart, account WHERE cart.id_acc = account.id_acc AND account.id_acc = '".$id."'";
    $show_list = mysqli_query($mysqli,$list_hd);
?>


<div class="user_ad">
<div class="show">
<h6>DANH SÁCH HÓA ĐƠN</h6>
<div class="table">
    <table class="table" style="border: 1px">
        <form action="module\quanlyloaisp\xuly.php" method="post" >
        <tr>
            <th>STT</th>
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
</div>