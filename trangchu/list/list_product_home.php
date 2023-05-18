<!-- Quảng cáo -->
<div class="slideshow-container" data-interval="5000">

    <?php include('./list/list_slide.php');?>

</div>
<br>
<script src="script.js"></script>

<div id="test"></div>
<marquee style="color:red;font-weight:bold " scrollamount="8" behavior="alternate">
    <h1 style="background:url(../images/templatemo_list.png)">Sản Phẩm </h1>
</marquee>

<?php
whey();
Mass();
Pre_workout_Creatin();
Amino_Acid_BCAAs();
Vitamin();
GiamMo();

function whey(){
    include('..\connet.php');
    $dem  = 0;
    $sql = "SELECT * FROM `sanpham` sp, giasanpham gsp, nhacungcap ncc, loai l, thuoctinh tt WHERE sp.IDSanPham = gsp.IDSanPham and ncc.IDNhaCungCap = sp.IDNhaCungCap and l.IDLoai = sp.IDLoai and sp.IDThuocTinh = tt.IDThuocTinh and l.TenLoai = 'Whey Protein' and sp.TrangThai = 'Bán Chạy' ";
    $kq = mysqli_query($con, $sql);
    $sql_l = "SELECT * FROM loai WHERE TenLoai = 'Whey Protein'";
    $kq_l = mysqli_query($con,$sql_l);
    if (mysqli_num_rows($kq) > 0) {
        ?><a href="./index.php?admin=loaisp&IDLoai=<?php echo mysqli_fetch_array($kq_l)['IDLoai']?>"
    style="text-decoration: none">
    <h1>Whey Protein </h1>
</a><?php
        while ( $row = mysqli_fetch_array($kq) and $dem < 4) {
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
                Mô tả: <?php echo wordwrap($row['MoTaSanPham'], 30, "\n", true); ?> </br></br>
            </p>
            <p class="product_price"><?php echo number_format($row['GiaBan']).' VNĐ'; ?></p>
            <?php  if (!isset($_SESSION['TenDangNhap'])||$_SESSION['TenDangNhap']=='') { ?>
            <p class="text-center" style="float: left;"><a href="../" class="text-right"><button type="submit"
                        name="form_click_capnhap" value="save" class="btn btn-outline-info mb-3 btn-lg"><i
                            class="fas fa-shopping-cart" style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a href="../" class="text-right"><button type="submit" name="form_click_pay_now"
                        value="save" class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }else{ ?>
            <p class="text-center" style="float: left;"><a
                    href="./index.php?admin=themsp&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_capnhap" value="save"
                        class="btn btn-outline-info mb-3 btn-lg"><i class="fas fa-shopping-cart"
                            style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a
                    href="./index.php?admin=pay_now&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_pay_now" value="save"
                        class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }?>
        </div>
    </div>
</div>

<?php
          
        $dem++;
        }
        
    }
    
}

function Mass(){
    include('..\connet.php');
    $dem  = 0;
    $sql = "SELECT * FROM `sanpham` sp, giasanpham gsp, nhacungcap ncc, loai l, thuoctinh tt WHERE sp.IDSanPham = gsp.IDSanPham and ncc.IDNhaCungCap = sp.IDNhaCungCap and l.IDLoai = sp.IDLoai and sp.IDThuocTinh = tt.IDThuocTinh and l.TenLoai = 'Mass tăng cân' and sp.TrangThai = 'Bán Chạy' ORDER by sp.IDSanPham DESC";
    $kq = mysqli_query($con, $sql);
    $sql_l = "SELECT * FROM loai WHERE TenLoai = 'Mass tăng cân'";
    $kq_l = mysqli_query($con,$sql_l);
    if (mysqli_num_rows($kq) > 0) {
        ?><a href="./index.php?admin=loaisp&IDLoai=<?php echo mysqli_fetch_array($kq_l)['IDLoai']?>"
    style="text-decoration: none">
    <h1> Mass tăng cân </h1>
</a><?php
        while ( $row = mysqli_fetch_array($kq) and $dem < 4) {
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
            <?php  if (!isset($_SESSION['TenDangNhap'])||$_SESSION['TenDangNhap']=='') { ?>
            <p class="text-center" style="float: left;"><a href="../" class="text-right"><button type="submit"
                        name="form_click_capnhap" value="save" class="btn btn-outline-info mb-3 btn-lg"><i
                            class="fas fa-shopping-cart" style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a href="../" class="text-right"><button type="submit" name="form_click_pay_now"
                        value="save" class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }else{ ?>
            <p class="text-center" style="float: left;"><a
                    href="./index.php?admin=themsp&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_capnhap" value="save"
                        class="btn btn-outline-info mb-3 btn-lg"><i class="fas fa-shopping-cart"
                            style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a
                    href="./index.php?admin=pay_now&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_pay_now" value="save"
                        class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }?>

        </div>
    </div>
</div>

<?php
          
        $dem++;
        }
        
    }
}
function Pre_workout_Creatin(){
    include('..\connet.php');
    $dem  = 0;
    $sql_banchay = "SELECT * FROM `sanpham` sp, giasanpham gsp, nhacungcap ncc, loai l, thuoctinh tt WHERE sp.IDSanPham = gsp.IDSanPham and ncc.IDNhaCungCap = sp.IDNhaCungCap and l.IDLoai = sp.IDLoai and sp.IDThuocTinh = tt.IDThuocTinh and l.TenLoai = 'Pre-workout, Creatine' and sp.TrangThai = 'Bán Chạy'ORDER by sp.IDSanPham DESC";
    $kq_banchay = mysqli_query($con, $sql_banchay);

    $sql_bth = "SELECT * FROM `sanpham` sp, giasanpham gsp, nhacungcap ncc, loai l, thuoctinh tt WHERE sp.IDSanPham = gsp.IDSanPham and ncc.IDNhaCungCap = sp.IDNhaCungCap and l.IDLoai = sp.IDLoai and sp.IDThuocTinh = tt.IDThuocTinh and l.TenLoai = 'Pre-workout, Creatine' ORDER by sp.IDSanPham DESC";
    $kq_bth = mysqli_query($con, $sql_bth);

    $sql_l = "SELECT * FROM loai WHERE TenLoai = 'Pre-workout, Creatine'";
    $kq_l = mysqli_query($con,$sql_l);
    if (mysqli_num_rows($kq_banchay) >= 4) {
        
        ?><a href="./index.php?admin=loaisp&IDLoai=<?php echo mysqli_fetch_array($kq_l)['IDLoai']?>"
    style="text-decoration: none">
    <h1> Pre-workout, Creatine </h1>
</a> <?php
        while ($row = mysqli_fetch_array($kq_banchay) and $dem < 4) {
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
            <?php  if (!isset($_SESSION['TenDangNhap'])||$_SESSION['TenDangNhap']=='') { ?>
            <p class="text-center" style="float: left;"><a href="../" class="text-right"><button type="submit"
                        name="form_click_capnhap" value="save" class="btn btn-outline-info mb-3 btn-lg"><i
                            class="fas fa-shopping-cart" style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a href="../" class="text-right"><button type="submit" name="form_click_pay_now"
                        value="save" class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }else{ ?>
            <p class="text-center" style="float: left;"><a
                    href="./index.php?admin=themsp&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_capnhap" value="save"
                        class="btn btn-outline-info mb-3 btn-lg"><i class="fas fa-shopping-cart"
                            style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a
                    href="./index.php?admin=pay_now&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_pay_now" value="save"
                        class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }?>
        </div>
    </div>
</div>
<?php
        $dem++;
        }
    }else{
        ?><a href="./index.php?admin=loaisp&IDLoai=<?php echo mysqli_fetch_array($kq_l)['IDLoai']?>"
    style="text-decoration: none">
    <h1> Pre-workout, Creatine </h1>
</a> <?php
        while ($row = mysqli_fetch_array($kq_bth) and $dem < 4) {
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
            <?php  if (!isset($_SESSION['TenDangNhap'])||$_SESSION['TenDangNhap']=='') { ?>
            <p class="text-center" style="float: left;"><a href="../" class="text-right"><button type="submit"
                        name="form_click_capnhap" value="save" class="btn btn-outline-info mb-3 btn-lg"><i
                            class="fas fa-shopping-cart" style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a href="../" class="text-right"><button type="submit" name="form_click_pay_now"
                        value="save" class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }else{ ?>
            <p class="text-center" style="float: left;"><a
                    href="./index.php?admin=themsp&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_capnhap" value="save"
                        class="btn btn-outline-info mb-3 btn-lg"><i class="fas fa-shopping-cart"
                            style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a
                    href="./index.php?admin=pay_now&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_pay_now" value="save"
                        class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }?>
        </div>
    </div>
</div>
<?php
        $dem++;
        }
    }
}
function Amino_Acid_BCAAs(){
    include('..\connet.php');
    $dem  = 0;
    $sql_banchay = "SELECT * FROM `sanpham` sp, giasanpham gsp, nhacungcap ncc, loai l, thuoctinh tt WHERE sp.IDSanPham = gsp.IDSanPham and ncc.IDNhaCungCap = sp.IDNhaCungCap and l.IDLoai = sp.IDLoai and sp.IDThuocTinh = tt.IDThuocTinh and l.TenLoai = 'Amino Acid, BCAAs' and sp.TrangThai = 'Bán Chạy' ORDER by sp.IDSanPham DESC";
    $sql_bth = "SELECT * FROM `sanpham` sp, giasanpham gsp, nhacungcap ncc, loai l, thuoctinh tt WHERE sp.IDSanPham = gsp.IDSanPham and ncc.IDNhaCungCap = sp.IDNhaCungCap and l.IDLoai = sp.IDLoai and sp.IDThuocTinh = tt.IDThuocTinh and l.TenLoai = 'Amino Acid, BCAAs' ORDER by sp.IDSanPham DESC";
    $kq_banchay = mysqli_query($con, $sql_banchay);
    $kq_bth = mysqli_query($con, $sql_bth);

    $sql_l = "SELECT * FROM loai WHERE TenLoai = 'Amino Acid, BCAAs'";
    $kq_l = mysqli_query($con,$sql_l);
    if (mysqli_num_rows($kq_banchay) >= 4) {
        ?><a href="./index.php?admin=loaisp&IDLoai=<?php echo mysqli_fetch_array($kq_l)['IDLoai']?>"
    style="text-decoration: none">
    <h1> Amino Acid, BCAAs </h1>
</a> <?php
        while ($row = mysqli_fetch_array($kq_banchay) and $dem < 4) {
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
            <?php  if (!isset($_SESSION['TenDangNhap'])||$_SESSION['TenDangNhap']=='') { ?>
            <p class="text-center" style="float: left;"><a href="../" class="text-right"><button type="submit"
                        name="form_click_capnhap" value="save" class="btn btn-outline-info mb-3 btn-lg"><i
                            class="fas fa-shopping-cart" style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a href="../" class="text-right"><button type="submit" name="form_click_pay_now"
                        value="save" class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }else{ ?>
            <p class="text-center" style="float: left;"><a
                    href="./index.php?admin=themsp&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_capnhap" value="save"
                        class="btn btn-outline-info mb-3 btn-lg"><i class="fas fa-shopping-cart"
                            style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a
                    href="./index.php?admin=pay_now&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_pay_now" value="save"
                        class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }?>
        </div>
    </div>
</div>
<?php
        $dem++;
        }
    }else{
        ?><a href="./index.php?admin=loaisp&IDLoai=<?php echo mysqli_fetch_array($kq_l)['IDLoai']?>"
    style="text-decoration: none">
    <h1> Amino Acid, BCAAs </h1>
</a> <?php
        while ($row = mysqli_fetch_array($kq_bth) and $dem < 4) {
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
            <?php  if (!isset($_SESSION['TenDangNhap'])||$_SESSION['TenDangNhap']=='') { ?>
            <p class="text-center" style="float: left;"><a href="../" class="text-right"><button type="submit"
                        name="form_click_capnhap" value="save" class="btn btn-outline-info mb-3 btn-lg"><i
                            class="fas fa-shopping-cart" style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a href="../" class="text-right"><button type="submit" name="form_click_pay_now"
                        value="save" class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }else{ ?>
            <p class="text-center" style="float: left;"><a
                    href="./index.php?admin=themsp&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_capnhap" value="save"
                        class="btn btn-outline-info mb-3 btn-lg"><i class="fas fa-shopping-cart"
                            style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a
                    href="./index.php?admin=pay_now&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_pay_now" value="save"
                        class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }?>
        </div>
    </div>
</div>
<?php
        $dem++;
        }
    }


}
function Vitamin(){
    include('..\connet.php');
    $dem  = 0;
    $sql_banchay = "SELECT * FROM `sanpham` sp, giasanpham gsp, nhacungcap ncc, loai l, thuoctinh tt WHERE sp.IDSanPham = gsp.IDSanPham and ncc.IDNhaCungCap = sp.IDNhaCungCap and l.IDLoai = sp.IDLoai and sp.IDThuocTinh = tt.IDThuocTinh and l.TenLoai = 'Vitamin' and sp.TrangThai = 'Bán Chạy' ORDER by sp.IDSanPham DESC";
    $kq_banchay = mysqli_query($con, $sql_banchay);

    $sql_bth = "SELECT * FROM `sanpham` sp, giasanpham gsp, nhacungcap ncc, loai l, thuoctinh tt WHERE sp.IDSanPham = gsp.IDSanPham and ncc.IDNhaCungCap = sp.IDNhaCungCap and l.IDLoai = sp.IDLoai and sp.IDThuocTinh = tt.IDThuocTinh and l.TenLoai = 'Vitamin' ORDER by sp.IDSanPham DESC";
    $kq_bth = mysqli_query($con, $sql_bth);

    $sql_l = "SELECT * FROM loai WHERE TenLoai = 'Vitamin'";
    $kq_l = mysqli_query($con,$sql_l);
    if (mysqli_num_rows($kq_banchay) >= 4) {
        ?> <a href="./index.php?admin=loaisp&IDLoai=<?php echo mysqli_fetch_array($kq_l)['IDLoai']?>"
    style="text-decoration: none">
    <h1> Vitamin </h1>
</a> <?php
        while ($row = mysqli_fetch_array($kq_banchay) and $dem < 4) {
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
            <?php  if (!isset($_SESSION['TenDangNhap'])||$_SESSION['TenDangNhap']=='') { ?>
            <p class="text-center" style="float: left;"><a href="../" class="text-right"><button type="submit"
                        name="form_click_capnhap" value="save" class="btn btn-outline-info mb-3 btn-lg"><i
                            class="fas fa-shopping-cart" style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a href="../" class="text-right"><button type="submit" name="form_click_pay_now"
                        value="save" class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }else{ ?>
            <p class="text-center" style="float: left;"><a
                    href="./index.php?admin=themsp&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_capnhap" value="save"
                        class="btn btn-outline-info mb-3 btn-lg"><i class="fas fa-shopping-cart"
                            style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a
                    href="./index.php?admin=pay_now&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_pay_now" value="save"
                        class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }?>
        </div>
    </div>
</div>
<?php
        $dem++;
        }
    }else{
        ?> <a href="./index.php?admin=loaisp&IDLoai=<?php echo mysqli_fetch_array($kq_l)['IDLoai']?>"
    style="text-decoration: none">
    <h1> Vitamin </h1>
</a> <?php
        while ($row = mysqli_fetch_array($kq_bth) and $dem < 4) {
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
            <?php  if (!isset($_SESSION['TenDangNhap'])||$_SESSION['TenDangNhap']=='') { ?>
            <p class="text-center" style="float: left;"><a href="../" class="text-right"><button type="submit"
                        name="form_click_capnhap" value="save" class="btn btn-outline-info mb-3 btn-lg"><i
                            class="fas fa-shopping-cart" style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a href="../" class="text-right"><button type="submit" name="form_click_pay_now"
                        value="save" class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }else{ ?>
            <p class="text-center" style="float: left;"><a
                    href="./index.php?admin=themsp&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_capnhap" value="save"
                        class="btn btn-outline-info mb-3 btn-lg"><i class="fas fa-shopping-cart"
                            style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a
                    href="./index.php?admin=pay_now&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_pay_now" value="save"
                        class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }?>
        </div>
    </div>
</div>
<?php
        $dem++;
        }
    }
}
function GiamMo(){
    include('..\connet.php');
    $dem  = 0;
    $sql_banchay = "SELECT * FROM `sanpham` sp, giasanpham gsp, nhacungcap ncc, loai l, thuoctinh tt WHERE sp.IDSanPham = gsp.IDSanPham and ncc.IDNhaCungCap = sp.IDNhaCungCap and l.IDLoai = sp.IDLoai and sp.IDThuocTinh = tt.IDThuocTinh and l.TenLoai = 'Giảm Mỡ' and sp.TrangThai = 'Bán Chạy' ORDER by sp.IDSanPham DESC";
    $kq_banchay = mysqli_query($con, $sql_banchay);

    $sql_bth = "SELECT * FROM `sanpham` sp, giasanpham gsp, nhacungcap ncc, loai l, thuoctinh tt WHERE sp.IDSanPham = gsp.IDSanPham and ncc.IDNhaCungCap = sp.IDNhaCungCap and l.IDLoai = sp.IDLoai and sp.IDThuocTinh = tt.IDThuocTinh and l.TenLoai = 'Giảm Mỡ' ORDER by sp.IDSanPham DESC";
    $kq_bth = mysqli_query($con, $sql_bth);

    $sql_l = "SELECT * FROM loai WHERE TenLoai = 'Giảm Mỡ'";
    $kq_l = mysqli_query($con,$sql_l);
    if (mysqli_num_rows($kq_banchay) >= 4) {
        ?><a href="./index.php?admin=loaisp&IDLoai=<?php echo mysqli_fetch_array($kq_l)['IDLoai']?>"
    style="text-decoration: none">
    <h1> Giảm Mỡ </h1>
</a> <?php
        while ($row = mysqli_fetch_array($kq_banchay) and $dem < 4) {
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
            <?php  if (!isset($_SESSION['TenDangNhap'])||$_SESSION['TenDangNhap']=='') { ?>
            <p class="text-center" style="float: left;"><a href="../" class="text-right"><button type="submit"
                        name="form_click_capnhap" value="save" class="btn btn-outline-info mb-3 btn-lg"><i
                            class="fas fa-shopping-cart" style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a href="../" class="text-right"><button type="submit" name="form_click_pay_now"
                        value="save" class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }else{ ?>
            <p class="text-center" style="float: left;"><a
                    href="./index.php?admin=themsp&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_capnhap" value="save"
                        class="btn btn-outline-info mb-3 btn-lg"><i class="fas fa-shopping-cart"
                            style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a
                    href="./index.php?admin=pay_now&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_pay_now" value="save"
                        class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }?>
        </div>
    </div>
</div>
<?php
        $dem++;
        }
    }else{
        ?><a href="./index.php?admin=loaisp&IDLoai=<?php echo mysqli_fetch_array($kq_l)['IDLoai']?>"
    style="text-decoration: none">
    <h1> Giảm Mỡ </h1>
</a> <?php
        while ($row = mysqli_fetch_array($kq_bth) and $dem < 4) {
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
            <?php  if (!isset($_SESSION['TenDangNhap'])||$_SESSION['TenDangNhap']=='') { ?>
            <p class="text-center" style="float: left;"><a href="../" class="text-right"><button type="submit"
                        name="form_click_capnhap" value="save" class="btn btn-outline-info mb-3 btn-lg"><i
                            class="fas fa-shopping-cart" style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a href="../" class="text-right"><button type="submit" name="form_click_pay_now"
                        value="save" class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }else{ ?>
            <p class="text-center" style="float: left;"><a
                    href="./index.php?admin=themsp&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_capnhap" value="save"
                        class="btn btn-outline-info mb-3 btn-lg"><i class="fas fa-shopping-cart"
                            style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

            <p class="text-center"><a
                    href="./index.php?admin=pay_now&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                    class="text-right"><button type="submit" name="form_click_pay_now" value="save"
                        class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
            <?php }?>
        </div>
    </div>
</div>
<?php
        $dem++;
        }
    }
}
?>