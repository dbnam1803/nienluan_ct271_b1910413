<?php
    if (isset($_POST['search'])){
        $key = $_POST['searchkey'];
    }
    $sql = 'SELECT * FROM ql_sanpham, ql_danhmucsp WHERE ql_sanpham.id_danhmucsp=ql_danhmucsp.id_danhmucsp AND
             ql_sanpham.tensp LIKE "%'.$key.'%"';
    $que = mysqli_query($mysqli, $sql);
?>

<div class="content">
                <div class="title_box">
                    <h5>Kết Quả Tìm Kiếm Cho: <?php echo $_POST['searchkey']?></h5>
                </div>
                <div class="list_sp">
                    <ul class="sp">
                        <?php
                            while ($row = mysqli_fetch_array($que)){
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
                </div>
            </div>