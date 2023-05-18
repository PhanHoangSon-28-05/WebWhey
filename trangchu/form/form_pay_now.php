<style>
    #khung_gia_sp p {
        color: black;
        font-size: 30px;
        font-style: bold;
        margin-top: 20px;
        line-height: 1.8;
    }

    #khung_gia_sp {
        margin-bottom: 10px;
        border: 5px black outset;
        border-radius: 12px;
    }
</style>


<div class="container-fluid" style="padding-top: 5px;">
    <?php 
        include('../connet.php');
        $id = $_GET['IDSanPham'];
    ?>
    <form method="post">
        <div class="row" id="khung_gia_sp">
            <?php
            $sql = " SELECT * from sanpham s ,giasanpham g,  loai l, thuoctinh t  where s.IDSanPham = g.IDSanPham and s.IDLoai = l.IDLoai and s.IDThuocTinh = t.IDThuocTinh and s.IDSanPham = $id ";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
        ?>

            <div class="col-sm-4">
                <p class="text-center"><img class="card-img-top" style=" max-width:50%; height:atou; margin-right:20px;"
                        src="<?php echo $row['Hinh'];?>" alt=""></p>
            </div>
            <div class="col-sm-8">
                <p name="NameProduct">Tên Sản Phẩm: <?php echo $row['TenSanPham'] ?> </p>
                <p name="NameType">Loại Sản Phẩm: <?php echo $row['TenLoai'] ?></p>
                <p name="NameProperties">Thuộc Tính Sản Phẩm: <?php echo $row['Tenthuoctinh'] ?></p>
                <p>Số lương: <input type="number" name="SoLuong" style="width: 60px; height: 40px;" value="1"></p>
                <p name="GiaBan">Giá Bán: <?php echo number_format($row['GiaBan']).' đ' ?></p>
                <p name="TongCong"><?php $tongcong = $row['GiaBan']; 
                                  echo "Tổng tiền: ".number_format($tongcong).' đ';?></p>
                <p style="display: inline-block; margin-right: 10px;">Tên người nhận hàng: </p>
                <input name="name_use" type="text" class="form-control"
                    style="display: inline-block; width:400px;height: 40px; font-size: 30px;"
                    placeholder="Nhập tên người nhận" value="<?php echo $_SESSION['TenKhachHang'];?>" required></br>
                <p style="display: inline-block; margin-right: 10px;">Địa chỉ nhận hàng: </p>
                <input name="Address" type="text" class="form-control" style="display: inline-block; width: 500px;"
                    placeholder="Nhập địa chỉ" required></br>
                <p style="display: inline-block; margin-right: 10px;">Số điện thoại: </p>
                <input name="SDT" type="text" class="form-control" style="display: inline-block; width: 500px;"
                    placeholder="Nhập số điện thoại" value="<?php echo $_SESSION['SDT'];?>" required></br>
                <p style="display: inline-block; margin-right: 10px;">Ghi chú:</p>
                <input name="GhiChu" type="text" class="form-control" style="display: inline-block; width: 500px;"
                    placeholder="Yêu cầu hàng hóa"></br>
            </div>
            <script>
                // Lấy đối tượng input number và các phần tử p tương ứng
                var input = document.getElementsByName('SoLuong')[0];
                var giaban = document.getElementsByName('GiaBan')[0];
                var tongcong = document.getElementsByName('TongCong')[0];

                // Tính lại giá trị của biến $tongcong khi giá trị của input number thay đổi
                input.onchange = function () {
                    var soLuong = parseInt(input.value);
                    var giaBan = parseInt(giaban.textContent.replace(/[^0-9]/g, ''));
                    var newTongCong = soLuong * giaBan;
                    tongcong.textContent = "Tổng tiền: " + newTongCong.toLocaleString('vi', {
                        style: 'currency',
                        currency: 'VND'
                    });
                }
            </script>

            <a href="" class="text-right" style="text-align: center;"><button type="submit" name="form_click_HD"
                    value="save" class="btn btn-outline-success mb-3 btn-lg">Thanh Toán</button></a>
    </form>

</div>
<?php
                if (isset($_POST['form_click_HD'])) {
                    $idtaikhoan = $_SESSION['IDTaiKhoan'];
                    $tennguoinhan = $_POST['name_use'];
                    $sl = $_POST['SoLuong'];
                    $dongia = $row['GiaBan'];
                    $tongcong = $dongia*$sl;
                    $diachi = $_POST['Address'];
                    $idsanpham = $row['IDSanPham'];
                    $sdt = $_POST['SDT'];
                    $ghichu = $_POST['GhiChu'];
                    
                    if ($ghichu == "") {
                        $sql_insert = "INSERT INTO hoadonbanhang (IDKhachHang, TenNguoiNhan, DiaChi, SoDienThoai, NgayTao, TongTien, TinhTrangVanChuyen) VALUES ('$idtaikhoan', '$tennguoinhan', '$diachi', '$sdt', CURDATE(), '$tongcong', 'Chờ xác nhận')";
                    }else{
                        $sql_insert = "INSERT INTO hoadonbanhang (IDKhachHang, TenNguoiNhan, DiaChi, SoDienThoai, GhiChu, NgayTao, TongTien, TinhTrangVanChuyen) VALUES ('$idtaikhoan', '$tennguoinhan', '$diachi', '$sdt', '$ghichu', CURDATE(), '$tongcong', 'Chờ xác nhận')";
                    }
                    
                    $result_insert = mysqli_query($con, $sql_insert);
                        if ($result_insert === TRUE) {
                            
                            $sql_select = "SELECT MaHDB FROM `hoadonbanhang` WHERE IDKhachHang = $idtaikhoan ORDER BY NgayTao DESC LIMIT 1";
                            $result_select =  mysqli_query($con, $sql_select);
                            $idmahoadon = mysqli_fetch_array($result_select)['MaHDB'];
                
                            $sql_insert = "INSERT INTO chitietbanhang(MaHDB, IDSanPham, SoLuong, DonGia) VALUES ('$idmahoadon','$idsanpham','$sl','$dongia')";
                            $result_insert = mysqli_query($con, $sql_insert);
                            if ($result_insert === TRUE) {
                                ?>
<script>
    alert("Bạn đã thanh toán");
    window.location = "../trangchu/index.php?admin=trangchu";
</script>
<?php
                            }
                        }
                }
            }
        }
        ?>
</div>