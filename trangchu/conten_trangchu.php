<?php
include ('../connet.php');
if (isset($_GET['admin'])) {
    switch ($_GET['admin']) {
        case 'view_sanpham':
            # code...
            include('view\view.php');
            break;
        // New
        case 'loaisp':
            include('list\list_product_loai.php');
            break;
        
        case 'themsp':
            // include('list/list_product_home.php');
            include('update\update_giohang.php'); 
            break;
        case 'themsp_loai':
            // include('list/list_product_home.php');
            include('update\update_giohang_loai.php'); 
            break; 
        case 'giohang':
            include('list\list_product_gio_hang.php');
            break;
        case 'deletegiohang':
            include('delete\delete.php'); 
            break;
        case 'donhang':
            include('list\list_product_donhang.php');
            break;
        case 'chitietdonhang':
            include('list\list_product_chitiet_donhang.php');
            break;
        // Pay
        case 'pay_now':
            include('form\form_pay_now.php'); 
            break;
        case 'pay':
            include('form\form_pay.php'); 
            break;
        default:
            break;
    }
}else{
    include('list\list_product_home.php');
}
?>