<script language="javascript" src="Load_more_button.js"></script>
<?php
    include('..\connet.php');
    $sql = "SELECT * FROM `sanpham` sp, giasanpham gsp WHERE sp.IDSanPham = gsp.IDSanPham and TrangThai = 'Bán chạy' ORDER by sp.IDSanPham DESC";
    $kq = mysqli_query($con, $sql);
    if (mysqli_num_rows($kq) > 0) {
        while ($row = mysqli_fetch_array($kq)) {
            ?>
<div class="bs_box" style="display: none;">
    <a href="./index.php?admin=view_sanpham&IDSanPham=<?php echo $row['IDSanPham'];?>"><img
            style="width: 100px; height: 100px;" src="<?php echo $row['Hinh'];?>" alt="image" /></a>
    <h4><a href="./index.php?admin=view_sanpham&IDSanPham=<?php echo $row['IDSanPham'];?>"
            style="font-size: 20px; height: 30px; text-decoration: none;"> <?php echo $row['TenSanPham'];?></a></h4>
    <p class="price" style="font-size: 20px; height: 30px;"><?php echo number_format($row['GiaBan']).' VNĐ'; ?></p>
    <div class="cleaner"></div>
</div>

<?php
        }
    }
?>