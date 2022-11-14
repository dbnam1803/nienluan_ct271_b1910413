<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = '';
    }
    if ($page == '' || $page == 1){
        $begin = 0;
    }else{
        $begin = ($page*8)-8;
    }
    $sql = "SELECT * FROM ql_sanpham ORDER BY id_sp DESC LIMIT $begin,8";
    $query = mysqli_query($mysqli, $sql);
    
?>

<div class="content">
                <div class="title_box">
                    <h5>Sản Phẩm Mới</h5>
                </div>
                <div class="list_sp">
                    <ul class="sp">
                        <?php
                            while ($row = mysqli_fetch_array($query)){
                                if($row['trangthai']==1){
                        ?>
                        <li>
                            <a href="index.php?control=chitietsp&id=<?php echo $row['id_sp'] ?>">
                                <img src="admin/module/sanpham/uploads/<?php echo $row['hinhanh'] ?>" width="100px">
                                <div class="sp_title">
                                    <h6><?php echo $row['tensp'] ?></h6>
                                    <p class="sp_price">Giá: <?php echo number_format($row['gia'],0,',','.').'₫' ?></p>
                                </div>
                            </a>
                        </li>
                        <?php
                                }
                            }
                        ?>
                    </ul>
                    <div style="clear: both;"></div>
                    <div class="page">
                        <?php
                            $sql_page = mysqli_query($mysqli, 'SELECT * FROM ql_sanpham');
                            $count = mysqli_num_rows($sql_page);
                            $num_page = ceil($count/8);
                        ?>
                        <ul class="list_page pagination  justify-content-center">
                            <?php
                                for($i=1;$i<=$num_page;$i++){
                            ?>
                                <li <?php if($i==$page){echo 'style="background-color:black;pointer-events:none;"';}else{echo '';} ?>><a href="index.php?page=<?php echo $i ?>"><?php echo $i ?></a></li> 
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>