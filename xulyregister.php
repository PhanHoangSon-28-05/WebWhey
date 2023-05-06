<?php
    include('connet.php');
    if (isset($_POST['btn_register'])) {
        $ho = $_POST['Ho'];
        $ten = $_POST['Ten'];  
        $ngaysinh = $_POST['NgaySinh'];
        $sdt = $_POST['SDT'];
        $email = $_POST['email'];
        $matkahu = MD5($_POST['password']);

        $sql = "select * from taikhoan where TenDangNhap = '$email'";
        $query = mysqli_query($con,$sql);
        $num_rows = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);
        if ($num_rows > 0) {
            echo "Email đã có người dùng!";
        }else{
            $sql_taikhoan = "INSERT INTO `taikhoan`(`TenDangNhap`, `MatKhau`,`Chuc`) VALUES ('$email','$matkahu','Khách hàng')";
            $kq_taikhoan = mysqli_query($con, $sql_taikhoan);
            if ($kq_taikhoan ===  TRUE) {
                $sql_tk = "select * from taikhoan where TenDangNhap = '$email'";
                $query_tk = mysqli_query($con,$sql_tk);
                $row_tk = mysqli_fetch_array($query_tk);
                $id = $row_tk['IDTaiKhoan'];

                $sql_thongtinkhachang="INSERT INTO `thongtinkhachang`(`IDTaiKhoan`, `Ho`, `Ten`, `NgaySinh`, `SDT`) VALUES ('$id','$ho','$ten','$ngaysinh','$sdt')";
                $kq_thongtinkhachang = mysqli_query($con, $sql_thongtinkhachang);
                if ($kq_thongtinkhachang === TRUE) {
                    $sql_lay_tk = "SELECT * from taikhoan tk, thongtinkhachang ttkh where tk.IDTaiKhoan = ttkh.IDTaiKhoan and  TenDangNhap = '$email'";
                        $kq = mysqli_query($con,$sql_lay_tk);
                        $row_lay_tk = mysqli_fetch_array($kq);
                        $_SESSION['IDTaiKhoan'] = true;
                        $_SESSION['IDTaiKhoan'] = $row_lay_tk['IDTaiKhoan'];
                        $_SESSION['TenDangNhap'] = $email;
                        $_SESSION['TenKhachHang'] = $row_lay_tk['Ho']." ".$row_lay_tk['Ten'];
                        $_SESSION['SDT'] = $row_lay_tk['SDT'];
                    ?>
                    <script>
                        alert("Bạn đã tạo tài khoản thành công");
                        window.location="../DoAnThuongMai/trangchu/";
                    </script>
                    <?php
                    
                }else{
                    ?>
                    <script>
                        alert("Bạn chưa tạo tài khoản thành công");
                    </script>
                    <?php
                }
            }
        }
    }
?>