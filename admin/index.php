<?php
    session_start();
    if (!isset($_SESSION['login'])){
        header('Location:login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="css/adminstyle.css">

</head>
<body class="bg-dark">
    <?php
        include("connected.php")
    ?>
    <div class="header">
        <h1>Admin Control</h1>
    </div>
    <div class="container">
        <div class="menu">
            <?php
                include("module/menu.php")
            ?>
        </div>
        <div class="main container">
            <?php
                include("module/main.php")
            ?>
        </div>
    </div>
</body>
</html>