<style>
    legend {
        text-shadow: 2px 2px 4px #000000;
    }

    label {
        font-size: 30px;
        color: black;
    }

    textarea {
        margin-top: 10px;
    }
</style>

<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="col-md-12">
            <?php
                include('..\connet.php');
                $idtaikhoan = $_GET['IDTaiKhoan'];
                $sql_select = "Select * from thongtinkhachang where IDTaiKhoan = $idtaikhoan";
                $result_select = mysqli_query($con, $sql_select);
                if (mysqli_num_rows($result_select)>0) {
                    while ($row = mysqli_fetch_array($result_select)) {
                        # code...
                ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend class="text-center"
                        style="font-size:50px; margin-top:20px; margin-bottom:40px; color:black; font-style: bold;">
                        THÔNG TIN NGƯỜI NHẬN</legend>
                    <!-- User Name -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Tên người nhận: </label>
                        </div>
                        <div class="col-6">
                            <input name="UserName" type="text" class="form-control" id=""
                                placeholder="Nhập tên người nhận" value="<?php echo $row['Ho'].' '.$row['Ten'];?>" required>
                        </div>
                        <!-- User Name -->
                        <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                            <div class="col-auto">
                                <label>Đia chỉ người nhận: </label>
                            </div>
                            <div class="col-6">
                                <input name="address" type="text" class="form-control" id=""
                                    placeholder="Nhập địa chỉ." required >
                            </div>
                        </div>

                        <!-- User Name -->
                        <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                            <div class="col-auto">
                                <label>Số điện thoại người nhận: </label>
                            </div>
                            <div class="col-6">
                                <input name="SDT" type="number" class="form-control" id=""
                                    placeholder="Nhập số điện thoại" value="<?php echo $row['SDT']?>" required  minlength="10" maxlength="10">
                            </div>
                        </div>
                        <!-- User Name -->
                        <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                            <div class="col-auto">
                                <label>Ghi chú: </label>
                            </div>
                            <div class="col-6">
                                <input name="ghichu" type="text" class="form-control" id=""
                                    placeholder="Dặn dò khi ship hàng">
                            </div>
                        </div>
                        <?php
                        }
                    }
                ?>
                </fieldset>
                <a href="">
                    <p class="text-center"><button type="submit" name="form_click_thanhtoan" value="save"
                            class="btn btn-outline-success mb-3 btn-lg">Xác nhận</button></p>
                </a>
            </form>
            <?php
                if (isset($_POST['form_click_thanhtoan'])) {
                    $idtaikhoan = $_GET['IDTaiKhoan'];
                    $tennguoinhan = $_POST['UserName'];
                    $diachi = $_POST['address'];
                    $sdt = $_POST['SDT'];
                    $ghichu = $_POST['ghichu'];

                    $sql_kt_giohang ="SELECT * from giohang where IDTaiKhoan= $idtaikhoan";
                    $kq_kt = mysqli_query($con, $sql_kt_giohang);
                    if (mysqli_num_rows($kq_kt) > 0) {
                        $sql_tonghd ="SELECT SUM(SoLuong * sp.GiaBan) FROM `giohang` gh,`giasanpham`sp WHERE gh.IDSanPham = sp.IDSanPham AND gh.IDTaiKhoan =  $idtaikhoan";
                        $kq_tonghd = mysqli_query($con, $sql_tonghd);
                        $tonghd = mysqli_fetch_array($kq_tonghd)['SUM(SoLuong * sp.GiaBan)'];
                        
                        if ($ghichu == "") {   
                            $sql_insert = "INSERT INTO hoadonbanhang (IDKhachHang, TenNguoiNhan, DiaChi, SoDienThoai, NgayTao, TongTien, TinhTrangVanChuyen) VALUES ('$idtaikhoan', '$tennguoinhan', '$diachi', '$sdt', CURDATE(), '$tonghd', 'Chờ xác nhận')";
                            $result_insert = mysqli_query($con, $sql_insert);
                        }else{
                            $sql_insert = "INSERT INTO hoadonbanhang (IDKhachHang, TenNguoiNhan, DiaChi, SoDienThoai, GhiChu, NgayTao, TongTien, TinhTrangVanChuyen) VALUES ('$idtaikhoan', '$tennguoinhan', '$diachi', '$sdt', '$ghichu', CURDATE(), '$tonghd', 'Chờ xác nhận')";
                            $result_insert = mysqli_query($con, $sql_insert);
                        }
                        
                        if ($result_insert === TRUE) {
                            $sql_select = "SELECT MaHDB FROM `hoadonbanhang` WHERE IDKhachHang = $idtaikhoan ORDER BY NgayTao DESC LIMIT 1";
                            $result_select =  mysqli_query($con, $sql_select);

                            $idmahoadon = mysqli_fetch_array($result_select)['MaHDB'];

                            $sql_insert =  "INSERT INTO chitietbanhang (MaHDB, IDSanPham, SoLuong, DonGia)
                                            SELECT hdbh.MaHDB, gh.IDSanPham, gh.SoLuong, sp.GiaBan
                                            FROM giohang gh, hoadonbanhang hdbh, giasanpham sp
                                            WHERE gh.IDSanPham = sp.IDSanPham and hdbh.IDKhachHang = gh.IDTaiKhoan and hdbh.MaHDB = (SELECT MaHDB FROM `hoadonbanhang` WHERE IDKhachHang = $idtaikhoan ORDER BY NgayTao DESC LIMIT 1) and gh.IDTaiKhoan = $idtaikhoan";
                            $result_insert = mysqli_query($con, $sql_insert);
                            if ($result_insert === TRUE) {
                                // Thực hiện câu lệnh SQL DELETE để xóa dữ liệu trong bảng giỏ hàng
                            $sql_delete = "DELETE FROM giohang WHERE IDTaiKhoan = $idtaikhoan";
                            $result_delete = mysqli_query($con, $sql_delete);
                                ?>
                                    <script>
                                        alert("Bạn đã thanh toán")
                                        window.location="../trangchu/index.php?admin=trangchu"
                                    </script>
                                <?php
                            }
                        }
                    }else{
                        ?>
                            <script>
                                alert("Bạn chưa có sản phẩm nào ở trong giỏ hàng")
                                window.location="../trangchu/index.php?admin=trangchu"
                            </script>
                        <?php
                            
                    }
                }

                ?>
        </div>
    </div>
</div>