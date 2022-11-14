<?php
    if (isset($_GET['logout']) && $_GET['logout']==1){
        setcookie('user',$name , time()-86400*60, "/");
        setcookie('id_kh',$id , time() -86400*60, "/");
        header('Location:index.php?control=home&page=1');
    }
?>

<div class="header ">
        <nav class="navbar navbar-expand-sm navbar-dark mybg" >
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?control=home&page=1"><img src="../img/logo.gif" style="width: 100px;" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link <?php if($nav=='home') {echo 'active';} ?>" href="index.php?control=home&page=1">Trang Chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($nav=='sanpham') {echo 'active';} ?>" href="index.php?control=sanpham&id=0&page=1">Sản Phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($nav=='giohang') {echo 'active';} ?>" href="index.php?control=giohang">Giỏ Hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($nav=='gioithieu') {echo 'active';} ?>" href="gioithieu.php?control=gioithieu">Giới Thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($nav=='sizecheck') {echo 'active';} ?>" href="sizecheck.php?control=sizecheck">size-check</a>
                        </li>
                    </ul>
                    <form method="POST" id="form-serach1" action="index.php?control=timkiem">
                        <label class="form_icon">
                        <button id="searchitem" name="search" type="submit" class="btn btn-primary-outline"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input class="form-control me-2 btn-dark" id="searchkeyword" name="searchkey" type="text" placeholder="Search" autocomplete="off">
                    </label>
                    </form>
                    <?php
                        if(isset($_COOKIE['user'])){
                    ?>
                        <a class="user"  href="user.php"><?php echo $_COOKIE['user'] ?></a>
                        <a  href="index.php?logout=1">&ensp;<i class="fa-solid fa-right-from-bracket"></i> </a>;
                    <?php
                        }else{
                    ?>
                        <a class="login" href="login.php">Login</a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </nav>
    </div>

