<?php
    session_start();
   
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


    <!-- CSS -->
    <link href="templatemo_style.css" rel="stylesheet" type="text/css" />
    <link href="slider.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

    <link rel="shortcut icon" href="../admin/img/vui.jpg" type="image/x-icon" />

    <link rel="stylesheet" href="css/Slider.css">
    <!-- JS -->
    <script type="text/javascript" src="../js/thietkewebphp.net.snow.js"></script>
    <title>Phan Hoàng Sơn</title>
    <style>
        #donhang {
        font-size: 20px;
        height: 30px;
        visibility: hidden;
        background-color: yellow;
        color: black;
        border-radius: 6px;
        margin-top: 40px;
        margin-left: 270px;
        padding: 4px;
        position: absolute;
        z-index: 1;
    }
    
    #btn-donhang:hover + #donhang {
        visibility: visible;
    }
    </style>
</head>

<body>
    
    <div class="loader-wrapper img-gif">
        <img style="width: 100%; height: 150px;" src="../admin/img/logo1.jpg" alt="">
    </div>
    <div id="templatemo_body_wrapper" class="page-container">
        
        <div id="templatemo_wrapper">
            <div class="container-fluid p-1 text-black text-center">
                <div id="templatemo_menubar">
                    <div class="row">
                        <div class="col-sm-9">
                            <div id="top_nav" class="ddsmoothmenu">
                                <ul>
                                    <li><a href="./index.php?admin=trangchu" class="selected">Trang chủ</a></li>
                                    <?php 
                                    include('laymenu/menubar.php');
                                    ?>
                                </ul>
                                <br style="clear: left" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div style="margin-top: 10px;">
                                <?php 
                                if (!isset($_SESSION['TenDangNhap']) || $_SESSION['TenDangNhap']=='') {
                                    ?>
                                <a href="../"><button class="btn btn-outline-danger" type="submit"
                                        name="form_click_Logout" style="margin-top:-5px;">Login/Sign up</button></a><?php
                                }else{
                                    ?><p style="font-size: 30px; color: white; float: left; margin-top: 5px;">
                                    <?php echo $_SESSION['TenKhachHang'];?>
                                </p>
                                <a href="./index.php?admin=giohang&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                                    class="cart" style=" display: block; float: left; margin-left: 10px;
                                    display: inline-block;
                                    width: 40px;
                                    height: 40px;
                                    text-align: center;
                                    line-height: 20px;
                                    font-size: 20px;
                                    font-weight: bold;
                                    color: #333;
                                    background: url(../images/icon3.png);
                                    background-repeat: no-repeat;
                                    background-size: 100%;
                                    margin-top: -5px;"></a>
                                <a href="./index.php?admin=donhang&IDTaiKhoan=<?php echo $_SESSION['IDTaiKhoan'];?>"
                                class="hoadon" id="btn-donhang" style="
                                display: block; float: left; margin-left: 10px; margin-right: -40px;
                                display: inline-block;
                                width: 40px;
                                height: 40px;
                                text-align: center;
                                line-height: 20px;
                                font-size: 20px;
                                font-weight: bold;
                                color: white;
                                background: url(../images/icon4.png);
                                background-repeat: no-repeat;
                                background-size: 100%;
                                margin-top: -5px;"></a>
                                <!-- Below are suggestions for the button -->
                                <div id="donhang"><p class="text-center">Đơn Hàng</p></div>
                                <script>
                                    const btndonhang = document.querySelector('#btn-donhang');
                                    const donhang = document.querySelector('#donhang');

                                    btndonhang.addEventListener('mouseover', () => {
                                    donhang.style.visibility = 'visible';
                                    });

                                    btndonhang.addEventListener('mouseout', () => {
                                    donhang.style.visibility = 'hidden';
                                    });
                                </script>
                                <form method="post">
                                    <button class="btn btn-outline-danger" type="submit" name="form_click_Logout"
                                        style="margin-top:-5px;">Logout</button>
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

            <div class="row bg-white">
                <div class="col-sm-3" style="margin-right: -100px;">
                    <div id="sidebar" class="float_l">
                        <div class="sidebar_box">
                            <span class="bottom"></span>
                            <div class="sidebar_box"><span class="bottom"></span>
                                <h3>Sản Phẩm Bán Chạy Nhất </h3>
                                <div class="content">
                                    <?php include('list/list_product_selling_new.php');?>
                                </div>  
                                 
                            </div>
                            <a class="btn btn-info" href="#" id="loadMore" style="text-decoration: none; font-weight: bold; color: black; ">Hiển thị thêm</a>
                        </div>
                        <div class="sidebar_box">
                            <span class="bottom"></span>
                            <h3>Sản Phẩm Bán Giảm Mỡ </h3>
                            <div class="content">
                                <?php include('list\list_product_selling_fat_loss.php');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-md-9 " style="width: 1600px;">
                    <div class="row">
                        <?php
                        include('./conten_trangchu.php');
                        
                        ?>
                    </div>

                </div>

            </div>
        </div>
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "100311729563790");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v16.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
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