<?php

    $idsanpham= filter_input(INPUT_GET,'IDSanPham');
    $idtaikhoan = filter_input(INPUT_GET,'IDTaiKhoan');
    $id_DS_Loai = filter_input(INPUT_GET,'ID_DS_Loai');
    
    $sql_kt_giohang ="SELECT * from giohang where IDSanPham = $idsanpham and IDTaiKhoan= $idtaikhoan";
    $kq_kt = mysqli_query($con, $sql_kt_giohang);

    if (mysqli_num_rows($kq_kt) > 0) {
        $id_giohang = mysqli_fetch_array($kq_kt)['IDGioHang'];
        $sql_capnhap_giohang ="UPDATE `giohang` SET `SoLuong`= SoLuong + 1 WHERE `IDGioHang`='$id_giohang'";
        $kq_capnhap = mysqli_query($con, $sql_capnhap_giohang);
        if ($kq_capnhap === TRUE) {
            ?>
<script>
    alert("Bạn thêm sản phẩm vào giỏ hàng");
    window.location = "../trangchu/index.php?admin=loaisp&IDLoai=<?php echo $id_DS_Loai;?>";
</script>
<?php
        }
    }else{
        $sql_capnhap_giohang = "INSERT INTO `giohang`(IDTaiKhoan, IDSanPham, SoLuong) VALUES ('$idtaikhoan','$idsanpham','1')";
                
        $stmt = mysqli_query($con, $sql_capnhap_giohang); 
            if ($stmt === TRUE) {
                ?>
<script>
    alert("Bạn thêm sản phẩm vào giỏ hàng");
    window.location = "../trangchu/index.php?admin=loaisp&IDLoai=<?php echo $id_DS_Loai;?>";
</script>
<?php
                    
            }
    }

  
?>