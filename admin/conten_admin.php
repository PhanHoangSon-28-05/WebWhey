<?php
include ('../connet.php');
if (isset($_GET['admin'])) {
    switch ($_GET['admin']) {
        // New
        case 'listtintuc':
            include("list/list_news.php");
            break;
        case 'themtintuc':
            include("kind_of_news.php");
            break;
        case 'updatenew':
            include("TableUpdate/table_update_news.php");
            break;
        case 'delete':
            include('delete/delete_news.php');
            break;    
        // supplier
        case 'listnhacungcap':
            include("list/list_supplier.php");
            break;
        case 'themnhacungcap':
            include("supplier.php");
            break;
        case 'updatesupplier':
            include("TableUpdate/table_update_supplier.php");
            break;
        case 'deletesupplier':
            include('delete/delete_supplier.php');
            break;
        // type product
        case 'listloaisanpham':
            include("list/list_type.php");
            break;
        case 'themloaisanpham':
            include("type_product.php");
            break;
        case 'updatetype':
            include("TableUpdate/table_update_type.php");
            break;
        case 'deletetype':
            include('delete/delete_type.php');
            break;         
        // properties
        case 'listthuoctinh':
            include("list/list_properties.php");
            break;
        case 'themthuoctinh':
            include("properties.php");
            break;
        case 'updateproperties':
            include("TableUpdate/table_update_properties.php");
            break;
        case 'deleteproperties':
            include('delete/delete_properties.php');
            break;    
        //product
        case 'listsanpham':
            include("list/list_product.php");
            break;
        case 'themsanpham':
            include("product.php");
            break;
        case 'deleteproduct':
            include('delete/delete_product.php');
            break; 
        case 'update_product':
            include("TableUpdate/table_product.php");
            break; 
        // product price
        case 'listgiasanpham':
            include("list/list_product_price.php");
            break;
        case 'themgiasanpham':
            include("product_price.php");
            break;
        case 'update_product_price':
            include("TableUpdate/table_product_price.php");
            break;
        // posts product
        case 'listnoidungsanpham':
            include("list/list_post.php");
            break;
        case 'themnoidungsanpham':
            include("post_product.php");
            break;
        case 'update_post_product':
            include("TableUpdate/table_post_product.php");
            break;

        case 'loai':
            include("frm_NhapLoai.php");
            break;
        
        // MenuBar -> product
        case 'loaisp':
            include("list/list_ThucPham.php");
            break;
        case 'view':
            include("view/view.php");
            break;

        // 
        case 'listkhachhang':
            include("list/list_customer.php");
            break;
        case 'list_hoadon':
            include("list/list_hoadon.php");
            break;
        case 'chitet_hoadon':
            include("list/list_chitiet_hoadon.php");
            break;
        default:
        
            break;
    }
}


?>