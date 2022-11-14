<?php
    if (isset($_GET['logout']) && $_GET['logout']==1){
        unset($_SESSION['login']);
        header('Location:login.php');
    }
?>

<div class="sidebar">
                <div class="side_list">
                    <div class="list_D">
                        <a href="index.php?action=quanlydanhmucsp&query=show">
                            <h5>Danh Mục</h5>
                        </a>
                    </div>
                    <div class="list_D">
                        <a href="index.php?action=sanpham&query=show">
                            <h5>Sản phẩm</h5>
                        </a>
                    </div>
                    <div class="list_D">
                        <a href="index.php?action=hoadon&query=list">
                            <h5>Hóa Đơn</h5>
                        </a>
                    </div>
                    <div class="list_D">
                        <a href="index.php?logout=1">
                            <h5>Đăng Xuất_<?php 
                                if (isset($_SESSION['login'])){
                                    echo $_SESSION['login'];
                                }
                            ?></h5>
                        </a>
                    </div>
                </div>
            </div>