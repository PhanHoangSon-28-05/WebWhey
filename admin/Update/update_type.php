<?php
    if (isset($_POST['form_click_capnhap'])) {
        if($_POST['NameType'] != ''){
            $idLoai = $_GET['IDType'];
            $ten_loai = $_POST['NameType'];
            $trangthai = $_POST['StatusType'];
           
            $sql_capnhap_loai = "UPDATE loai  SET TenLoai = '$ten_loai', Trangthai = '$trangthai' where IDLoai =  $idLoai";
                
            $kq_capnhap_loai = mysqli_query($con, $sql_capnhap_loai);

            if ($kq_capnhap_loai === TRUE) {
                ?>
<script>
    alert("Bạn đã cập nhật loại sản phẩm");
    window.location = "../admin/?admin=listloaisanpham";
</script>
<?php
                    
            }else{
                ?>
<script>
    alert("Bạn chưa cập nhật loại sản phẩm");
</script>
<?php
            }
        }else{
            ?>
<script>
    alert("Bạn chưa nhập tên loại sản phẩm")
</script>
<?php
        }
    }
?>