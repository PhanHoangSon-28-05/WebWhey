<style>
    #khung_thong_tin_sp p,#khung_gia_sp p{
        color: black;
        font-size: 30px;
        font-style: bold;
        margin-top: 20px;
        line-height: 1.8;
    }
    
    #khung_thong_tin_sp,#khung_gia_sp{
        margin-bottom: 10px;
        border: 5px black outset  ;
        border-radius: 12px;
    }
    .nut ul{
        float: right;
        z-index:100;
        width: 435px;
        margin: 0;
        padding: 0;
        list-style-type: none;
    }
    .nut ul li a{
        display: block;
        width: 100%;
        height: 50px;
    }
    .sub-menu{
        margin-bottom: -10px;
        background: #FFFF99;
        overflow: hidden;
        border: 10px solid #FFFF00;
        border-radius: 5px;
    }
    .sub-menu li{
        display: block;
        float: right; 
        margin: 5px;
    }
    .nut ul li >.sub-menu{
        display: none;
    }
    .nut ul li:hover .sub-menu{
	    display: block;
    }
</style>


<div class="container-fluid" style="padding-top: 5px;">
    <?php 
        include('../connet.php');
        $id = $_GET['IDSanPham'];
    ?>
    <div class="row" id="khung_gia_sp">
        <?php
            $sql = " SELECT * from sanpham s ,giasanpham g,  loai l, thuoctinh t, nhacungcap n, baiviet bv where s.IDSanPham = g.IDSanPham and s.IDLoai = l.IDLoai and s.IDThuocTinh = t.IDThuocTinh and s.IDNhaCungCap = n.IDNhaCungCap and s.IDSanPham = bv.IDSanPham and s.IDSanPham = $id ";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
        ?>
        <div class="col-sm-4">
            <p class="text-left"><img class="card-img-top" style=" max-width:50%; height:atou; margin-right:20px;" src="<?php echo $row['anhminhhoa'];?>"  alt=""></p>
        </div>
        <div class="col-sm-8">
            <p><?php echo preg_replace('/' . preg_quote($row['TenSanPham'], '/') . '/', "<span style='text-decoration: underline;'>".str_replace(' ', '_', $row['TenSanPham'])."</span>", $row['TenSanPham'], 1);?> </p>
            <p><?php echo $row['Tenthuoctinh']; ?></p>
            <p><?php echo number_format($row['GiaBan']).' đ'; ?></p>           
        </div>
    </div>
    <div class="row" id="khung_thong_tin_sp">    
        <p><?php echo preg_replace('/' . preg_quote("Nhà Cung Cấp Sản Phẩm:", '/') . '/', "<strong>Nhà Cung Cấp Sản Phẩm:</strong>", "Nhà Cung Cấp Sản Phẩm:", 1)?> <?php echo $row['TenNhaCungCap']; ?></p>
        <p><?php echo $row['MoTaSanPham']; ?></p>
        <p><?php echo preg_replace('/' . preg_quote("Tóm tắt lợt ích:", '/') . '/', "<strong>Tóm tắt lợt ích:</strong>", "Tóm tắt lợt ích:", 1)?> <?php echo '<br>'.$row['tomtat']; ?></p>
        <p><?php echo preg_replace('/' . preg_quote("Nội dung sản phẩm:", '/') . '/', "<strong>Nội dung sản phẩm:</strong>", "Nội dung sản phẩm:", 1)?><?php echo '<br>'.nl2br($row['noidung']); ?></p>
    </div>
    <?php  if (!isset($_SESSION['TenDangNhap']) || $_SESSION['TenDangNhap']=='') { ?>
        <p class="text-center" style="float: left;"><a href="../" class="text-right"><button  type="submit" name="form_click_capnhap" value="save" class="btn btn-outline-info mb-3 btn-lg"><i class="fas fa-shopping-cart" style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

        <p class="text-center" style="float: left; margin-left: 30px;"><a href="../" class="text-right"><button  type="submit" name="form_click_pay_now" value="save" class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>    
    <?php }else{ ?>
        <p class="text-center" style="float: left;"><a href="./index.php?admin=themsp&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>" class="text-right"><button  type="submit" name="form_click_capnhap" value="save" class="btn btn-outline-info mb-3 btn-lg"><i class="fas fa-shopping-cart" style="color: #26e8d2;"></i> Thêm giỏ hàng</button></a></p>

        <p class="text-center" style="float: left; margin-left: 30px;"><a href="./index.php?admin=pay_now&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>" class="text-right"><button  type="submit" name="form_click_pay_now" value="save" class="btn btn-outline-success mb-3 btn-lg"> Mua ngay</button></a></p>
    <?php }?>
    </div>
        <?php
            }
        }
        ?>
</div>