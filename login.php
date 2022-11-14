<?php
    error_reporting(E_ERROR | E_PARSE);
    include("admin/connected.php");


    if(isset($_POST['dangki'])){
        $name = $_POST['user'];
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        $sdt = $_POST['phone'];
        $status = 1;
        $sql = 'SELECT * FROM account WHERE email = "'.$email.'"';
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if ($count == 1){
            echo '<script>
                    alert("Tài Khoản Đã Tồn Tại");
                </script>';
            header("Locaion:login.php");          
        }else{
            $sql_dk = 'INSERT INTO account(name,email,sdt,password,acc_status) 
            VALUE ("'.$name.'", "'.$email.'", "'.$sdt.'" ,"'.$pass.'", "'.$status.'")';
            mysqli_query($mysqli, $sql_dk);
            echo '<script>
                    alert("Đăng Ký Tài Khoản Thành Công");
                </script>';
            header("Locaion:login.php");          
            
        }
    }elseif(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        $sql = 'SELECT * FROM account WHERE email = "'.$email.'" AND password = "'.$pass.'"';
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        $row1 = mysqli_fetch_array($row);
        $name = $row1['name'];
        $id = $row1['id_acc'];
        if ($count == 1){
            setcookie('user',$name , time() +86400*60, "/");
            setcookie('id_kh',$id , time() +86400*60, "/");
            header("Location:index.php");
            echo '<script>
                    alert("Đăng Nhập Thành Công");
                </script>';
        }else{
            echo '<script>
                    alert("Thông Tin Đăng Nhập Sai");
                </script>';          
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    
    <link rel="stylesheet" href="css/login.css">
</head>

<body id="content-box"></body>

<div class="box">
    <div class="container">
        <span class="error animated tada" id="msg"></span>
        <form name="form1" class="box" onsubmit="return checkStuff()" method="post" action="">
            <h4>Đăng Nhập</h4>
            <input type="text" name="email" placeholder="Email" autocomplete="off">
            <i onclick="clickeye()" class="typcn typcn-eye" id="eye"></i>
            <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
            <label>
                <input type="checkbox">
                <span></span>
                <small class="rmb">Nhớ đăng nhập</small>
            </label>
            <a href="#" class="forgetpass">Quên mật khẩu?</a>
            <input type="submit" value="Đăng Nhập" name="dangnhap" class="btn1">
        </form>
        <a href="#" class="dnthave" data-bs-toggle="modal" data-bs-target="#myModal">Chưa có tài khoản? Đăng Ký</a>
    </div>

    <div class="footer">

    </div>
    <!-- Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <span class="error animated tada place" id="msg1"></span>
                    <form id="form2" name="form2" class="box" method="post" action="" onsubmit="return checkreg()">
                        <h4>Đăng Ký</h4>
                        <input type="text" id="user" name="user" placeholder="Nhập Name" >
                        <input type="text" id="email" name="email" placeholder="Nhập Email" >
                        <input type="number" id="phone" name="phone" placeholder="Nhập SĐT" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
                        <i onclick="clickeye()" class="typcn typcn-eye eye1" id="eye1"></i>
                        <input type="password" id="password" name="password" placeholder="Nhập Passsword" autocomplete="off">
                        <i onclick="clickeye()" class="typcn typcn-eye eye2" id="eye2"></i>
                        <input type="password" id="repassword " name="repassword" placeholder="Nhập Lại Passsword" autocomplete="off">
                        <label for="checkcode">
                            <input type="checkbox" id="checkcode" name="checkcode">
                            <span id="action" name="checkcode"></span>
                            <h6 class="rule" >Tôi đồng ý với <a href="#"> điều khoản & điều kiện</a></h6>
                        </label>
                        <input type="submit" value="Đăng Ký" name="dangki" class="btn1 btn2">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--  -->
    <script type="text/javascript ">
        function clickeye() {
            var pwd = document.getElementById('pwd');
            document.getElementById("eye").classList.toggle("active");
            (pwd.type == 'password') ? pwd.type = 'text': pwd.type = 'password';
            var pwd1 = document.getElementById('password');
            document.getElementById("eye1").classList.toggle("active");
            (pwd1.type == 'password') ? pwd1.type = 'text': pwd1.type = 'password';
            var pwd2 = document.getElementById('repassword');
            document.getElementById("eye2").classList.toggle("active");
            (pwd2.type == 'password') ? pwd2.type = 'text': pwd2.type = 'password';
        }
    </script>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js " ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>

</html>