<?php
$sql = 'SELECT * FROM ql_danhmucsp ORDER BY id_danhmucsp';
$query = mysqli_query($mysqli, $sql);

?>
<div class="sidebar">
    <ul class="side_list">
        <?php
            while ($row = mysqli_fetch_array($query)){
        ?>
        <li class="list_D <?php if($menu==$row['id_danhmucsp']) {echo 'active';} ?>" id="list_D">
            <a class="" href="index.php?control=sanpham&id=<?php echo $row['id_danhmucsp'] ?>&page=1">
                <h5><?php echo $row['tendanhmuc'] ?></h5>
            </a>
        </li>
        <?php
            }
        ?>
    </ul>
</div>