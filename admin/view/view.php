<style>
    #khung_thuoc_tinh_sp p,#khung_gia_sp p,#khung_bai_viet_sp p  {
        color: black;
        font-size: 30px;
        font-style: bold;
        margin-top: 20px;
        line-height: 1.8;
    }
    
    #khung_thuoc_tinh_sp,#khung_gia_sp,#khung_bai_viet_sp{
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
        $id = $_GET['IDView'];
    ?>
    <div class="row" id="khung_gia_sp">
        <?php
            $sql = " SELECT * from sanpham s ,giasanpham g,  loai l, thuoctinh t, nhacungcap n, baiviet bv, loaitin lt  where s.IDSanPham = g.IDSanPham and s.IDLoai = l.IDLoai and s.IDThuocTinh = t.IDThuocTinh and s.IDNhaCungCap = n.IDNhaCungCap and s.IDSanPham = bv.IDSanPham and bv.idloaitin = lt.idloaitin and s.IDSanPham = $id ";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
        ?>
        <div class="col-sm-4">
        <p class="text-center"><img class="card-img-top" style=" max-width:50%; height:atou; margin-right:20px;" src="<?php echo $row['Hinh'];?>"  alt=""></p>
        </div>
        <div class="col-sm-8">
            <p><?php echo preg_replace('/' . preg_quote("Tên Sản Phẩm:", '/') . '/', "<strong>Tên Sản Phẩm:</strong>", "Tên Sản Phẩm:", 1)?> <?php echo preg_replace('/' . preg_quote($row['TenSanPham'], '/') . '/', "<span style='text-decoration: underline;'>".str_replace(' ', '_', $row['TenSanPham'])."</span>", $row['TenSanPham'], 1);?> </p>
            <p><?php echo preg_replace('/' . preg_quote("Giá Nhập:", '/') . '/', "<strong>Giá Nhập:</strong>", "Giá Nhập:", 1)?> <?php echo number_format($row['GiaNhap']).' đ'; ?> </p>
            <p><?php echo preg_replace('/' . preg_quote("Giá Bán:", '/') . '/', "<strong>Giá Bán:</strong>", "Giá Bán:", 1)?> <?php echo number_format($row['GiaBan']).' đ'; ?></p>           
        </div>
    </div>
    <div class="row" id="khung_thuoc_tinh_sp">  
        <p><?php echo preg_replace('/' . preg_quote("Loại Sản Phẩm:", '/') . '/', "<strong>Loại Sản Phẩm:</strong>", "Loại Sản Phẩm:", 1)?> <?php echo $row['TenLoai']; ?></p>
        <p><?php echo preg_replace('/' . preg_quote("Thuộc Tính Sản Phẩm:", '/') . '/', "<strong>Thuộc Tính Sản Phẩm:</strong>", "Thuộc Tính Sản Phẩm:", 1)?> <?php echo $row['Tenthuoctinh']; ?></p>
        <p><?php echo preg_replace('/' . preg_quote("Nhà Cung Cấp Sản Phẩm:", '/') . '/', "<strong>Nhà Cung Cấp Sản Phẩm:</strong>", "Nhà Cung Cấp Sản Phẩm:", 1)?> <?php echo $row['TenNhaCungCap']; ?></p>
        <p><?php echo preg_replace('/' . preg_quote("Mô Tả Sản Phẩm:", '/') . '/', "<strong>Mô Tả Sản Phẩm:</strong>", "Mô Tả Sản Phẩm:", 1)?> <?php echo $row['MoTaSanPham']; ?></p>
    </div>

    <div class="row" id="khung_bai_viet_sp"> 
        <div class="row">
            <div class="col-sm-3">
                <p><?php echo preg_replace('/' . preg_quote("Tên bài viết:", '/') . '/', "<strong>Tên bài viết:</strong>", "Tên bài viết:", 1)?> <?php echo $row['tenbaiviet']; ?></p>
                <p><?php echo preg_replace('/' . preg_quote("Tên loại tin:", '/') . '/', "<strong>Tên loại tin:</strong>", "Tên loại tin:", 1)?> <?php echo $row['tenloaitin']; ?></p>
            </div>
            <div class="col-sm-9">
                <p class="text-left"><img class="card-img-top" style=" max-width:50%; height:atou; margin-right:20px;" src="<?php echo $row['anhminhhoa'];?>"  alt=""></p>
            </div>
        </div>
        <p><?php echo preg_replace('/' . preg_quote("Tóm tắt:", '/') . '/', "<strong>Tóm tắt:</strong>", "Tóm tắt:", 1)?> <?php echo '<br>'.$row['tomtat']; ?></p>
        <p><?php echo preg_replace('/' . preg_quote("Nội dung:", '/') . '/', "<strong>Nội dung:</strong>", "Nội dung:", 1)?> <?php echo '<br>'.nl2br($row['noidung']); ?></p>
    </div>
    <div class="row">
        <div class="nut">
        <!-- href="./index.php?admin=updateproperties&IDProperties=<?php //echo $row['IDThuocTinh']?>" -->
        <ul>
            <li style="display: block; margin-bottom: 10px;"><a class="text-center"><button type="submit" name="form_click_capnhap" value="Update" class="btn btn-outline-warning mb-3 btn-lg">Chỉnh sửa</button></a>
                <ul class="sub-menu">
                   
                    <li><a href="./index.php?admin=update_product_price&IDGia=<?php echo $row['IDGia']?>&IDView=<?php echo $id;?>"><button type="submit" name="form_click_capnhap" value="Update" class="btn btn-outline-primary mb-3 btn-lg">Giá Sản Phẩm</button></a></li>
                    <li><a href="./index.php?admin=update_post_product&IDBaiViet=<?php echo $row['idbaiviet']?>&IDView=<?php echo $id;?> "><button type="submit" name="form_click_capnhap" value="Update" class="btn btn-outline-primary mb-3 btn-lg">Bài Viết</button></a></li> 
                    <li><a href="./index.php?admin=update_product&IDSanPham=<?php echo $row['IDSanPham']?>&IDView=<?php echo $id;?>"><button type="submit" name="form_click_capnhap" value="Update" class="btn btn-outline-primary mb-3 btn-lg">Sản Phẩm</button></a></li>
                </ul>
            </li>
        </ul>
    </div>
    </div>
        <?php
            }
        }
        ?>
</div>