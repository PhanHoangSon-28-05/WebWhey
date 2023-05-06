<?php
    session_start();

    if ($_SESSION['Chuc'] == "Admin") { 
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <!-- CSS -->
    <link href="templatemo_style.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

    <link rel="shortcut icon" href="img/vui.jpg" type="image/x-icon" />
    <!-- JS -->
    <script type="text/javascript" src="../js/thietkewebphp.net.snow.js"></script>

    <title>Phan Hoàng Sơn</title>

</head>

<body>
    <div class="container-fluid">
        <div class='loader-wrapper img-gif'>
            <img style="width: 100%; height: 150px;" src="img/logo1.jpg" alt="">
        </div>
    </div>


    <div id="templatemo_body_wrapper">
        <div id="templatemo_wrapper">

            <div class="container-fluid p-1 text-black text-center">
                <div id="templatemo_menubar">
                    <div class="row">
                        <div class="col-sm-9">
                            <div id="top_nav" class="ddsmoothmenu">
                                <ul>
                                    <li><a class="selected">Danh Sách</a></li>
                                    <?php include('laymenu/menubar.php');?>
                                </ul>
                                <br style="clear: left" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div style="margin-top: 10px;">
                                <?php 
                                    if (!isset($_SESSION['TenDangNhap']) ||$_SESSION['TenDangNhap'] == '') {
                                        ?><a href="../" style="font-size: 30px; color: white; margin-right: 40px;">Login/Sign up</a><?php
                                    }else{
                                        ?><p style="font-size: 30px; color: white; float: left; margin-top: 5px;">
                                        <?php echo $_SESSION['TenKhachHang'];?>
                                    </p>
                                    <a href="./index.php?admin=giohang&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan']?>" class="cart" style=" display: block; float: left; margin-left: 20px;"></a>
                                    <form method="post">
                                        <button class="btn btn-outline-danger" type="submit" name="form_click_Logout" style="margin-top:-5px;">Logout</button>
                                    </form>
                                <?php

                                }
                                if (isset($_POST['form_click_Logout'])) {
                                   ?><script>
                                        window.location='./index.php';
                                    </script><?php
                                    $_SESSION['IDTaiKhoan'] = '';
                                    $_SESSION['TenDangNhap'] = '';
                                    $_SESSION['TenKhachHang'] = '';
                                    $_SESSION['SDT'] = '';
                                    $_SESSION['Chuc'] = '';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <div class="ddsmoothmenu_right">
                        <ul>
                            <li><a href="?admin=listtintuc">Loại tin tức</a></li>
                            <li><a href="?admin=listnhacungcap">Nhà cung cấp</a></li>
                            <li><a href="?admin=listloaisanpham">Loại sản phẩm</a></li>
                            <li><a href="?admin=listthuoctinh">Thuộc tính sản phẩm</a></li>
                            <li><a href="?admin=listsanpham">Sản Phẩm</a>
                                <ul class="sub_menu">
                                    <li><a href="?admin=listgiasanpham">Giá sản phẩm</a></li>
                                    <li><a href="?admin=listnoidungsanpham">Nội dung sản phẩm</a></li>
                                </ul>
                            </li>
                            <!-- Hiện kết quả -->
                            <li><a href="">Danh sách KH</a>
                                <ul class="sub_menu">
                                    <li><a href="?admin=list_hoadon">Hóa đơn bán hàng</a></li>
                                    <li><a href="?admin=listkhachhang">Thông tin khách hàng</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="handle">
                        <?php 
                    include('./conten_admin.php');
                ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php 
}else{
        header('Location: ../');
    }
?>