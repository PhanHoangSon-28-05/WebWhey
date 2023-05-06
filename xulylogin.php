<?php
    include('connet.php');
	// $_SESSION['TenKhachHang'] = '';
	// $_SESSION['TenDangNhap']='';
	// $_SESSION['IDTaiKhoan'] = '';
    if (isset($_POST["btn_submit"])) {
        // lấy thông tin người dùng
		$email = $_POST["email"];
		$password = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$email = strip_tags($email);
		$email = addslashes($email);
		$password = strip_tags($password);
		$password = MD5(addslashes($password));
		if ($email == "" || $password =="") {
			echo "email hoặc password bạn không được để trống!";
		}else{
			$sql = "select * from taikhoan where TenDangNhap = '$email' and MatKhau = '$password' ";
			$query = mysqli_query($con,$sql);
			$num_rows = mysqli_num_rows($query);
			$row = mysqli_fetch_array($query);
			if ($num_rows==0) {
				echo "email hoặc mật khẩu không đúng !";
			}else{
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				$sql_tk = "SELECT * from taikhoan tk, thongtinkhachang ttkh where tk.IDTaiKhoan = ttkh.IDTaiKhoan and  TenDangNhap = '$email'";
				$kq = mysqli_query($con,$sql_tk);
				$row_tk = mysqli_fetch_array($kq);
                $_SESSION['IDTaiKhoan'] = true;
                $_SESSION['IDTaiKhoan'] = $row['IDTaiKhoan'];
				$_SESSION['TenDangNhap'] = $email;
				$_SESSION['TenKhachHang'] = $row_tk['Ho']." ".$row_tk['Ten'];
				$_SESSION['SDT'] = $row_tk['SDT'];
				$_SESSION['Chuc'] = $row['Chuc'];
				if ($_SESSION['Chuc'] == "Admin") {
					header('Location: admin');
				}else{
					header('Location: trangchu');
				}
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                
			}
		}
    }
?>