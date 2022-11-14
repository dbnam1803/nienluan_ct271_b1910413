<?php
    session_start();
    include ('connected.php');
    if (isset($_POST['login'])){
        $user = $_POST['username'];
        $pass = md5($_POST['password']);
        $sql = 'SELECT * FROM tbl_admin WHERE username = "'.$user.'" AND password = "'.$pass.'"';
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if ($count == 1){
            $_SESSION['login'] = $user;
            header('Location:index.php');
        }else{
            header('Location:login.php');
            echo '<script>
                    alert("Sai Thong Tin);
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
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="css/adminstyle.css">

</head>
<body>
    <div class="container">
        <form action="" autocomplete="off" method="post">
            <table class="logintable bg-light" >
                <tr>
                    <td colspan="2" class="tdst"><h3>Admin Login</h3></td>
                </tr>
                <tr>
                    <td>User</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="login" value="LOGIN"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>