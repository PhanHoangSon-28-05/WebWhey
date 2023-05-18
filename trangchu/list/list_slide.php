<?php
    include('..\connet.php');
    $sql = "SELECT * FROM loaitin";
    $kq = mysqli_query($con, $sql);
    if (mysqli_num_rows($kq) > 0) {
        ?> <?php
        while ($row = mysqli_fetch_array($kq)) {
            ?>
<div class="mySlides fade">
    <img src="<?php echo $row['hinh']?>" style="height: 400px; width:100%">
</div>
<?php
        }
    }
?>