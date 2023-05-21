<?php
    include('..\connet.php');
    $id = $_GET['IDLoai'];
    $sql = "SELECT * FROM sanpham sp, giasanpham gsp, nhacungcap ncc, loai l, thuoctinh tt WHERE sp.IDSanPham = gsp.IDSanPham and ncc.IDNhaCungCap = sp.IDNhaCungCap and l.IDLoai = sp.IDLoai and sp.IDThuocTinh = tt.IDThuocTinh and l.IDLoai = $id";
    $kq = mysqli_query($con, $sql);
    if (mysqli_num_rows($kq) > 0) {
        ?> <?php
        while ($row = mysqli_fetch_array($kq)) {
            ?>
<div class="col-lg-3 col-md-6 col-sm-12 mt-2">
    <!--col-4 = 12/4-->
    <!--md chia doi dung cho may tính bảng-->
    <!--sm trên VNĐiện thoại-->
    <div class="">
        <div class="product_box">
            <h3 style="font-size: 20px;"><?php echo $row['TenSanPham'];?></h3>
            <a href="./index.php?admin=view_sanpham&IDSanPham=<?php echo $row['IDSanPham'];?>"><img
                    style="height: 200px; width: 200px;" src="<?php echo $row['Hinh'];?>" alt="Shoes 1" /></a>
            <p style="text-align:left; font-size: 20px; height: 300px; color: black; line-height: 0.8;">
                Nhà cung cấp: <?php echo $row['TenNhaCungCap']; ?></br></br>
                Thuộc tính: <?php echo $row['Tenthuoctinh']; ?></br></br>
                Mô tả: <?php echo $row['MoTaSanPham']; ?> </br></br>
            </p>
            <p class="product_price"><?php echo number_format($row['GiaBan']).' VNĐ'; ?></p>
            <?php  if (!isset($_SESSION['TenDangNhap']) || $_SESSION['TenDangNhap']=='') { ?>
            <p class="text-center" style="float: left;"><a href="../" class="text-right"><button type="submit"
                        name="form_click_capnhap" value="save" class="btn btn-outline-info mb-3 btn-lg"><i
                            class="fas fa-shopping-cart" style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a href="../" class="text-right"><button type="submit" name="form_click_pay_now"
                        value="save" class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }else{ ?>
            <p class="text-center" style="float: left;"><a
                    href="./index.php?admin=themsp_loai&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>&ID_DS_Loai=<?php echo $id;?>"
                    class="text-right"><button type="submit" name="form_click_capnhap" value="save"
                        class="btn btn-outline-info mb-3 btn-lg"><i class="fas fa-shopping-cart"
                            style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a
                    href="./index.php?admin=pay_now&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>&ID_DS_Loai=<?php echo $id;?>"
                    class="text-right"><button type="submit" name="form_click_pay_now" value="save"
                        class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }?>
        </div>
    </div>
</div>
<?php
        }
    }
?>