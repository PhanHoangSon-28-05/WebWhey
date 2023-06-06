<?php
    if (isset($_POST['form_click'])) {
        if ($_POST['NameProduct'] != '') {
            $id = $_GET['IDSanPham'];
            $idview = $_GET['IDView'];
            $tensp = $_POST['NameProduct'];
            $loaisp = $_POST['idloai'];
            $thuoctinhsp = $_POST['idthuoctinh'];
            $nhacc = $_POST['idnhacungcap'];
            $anh = $_FILES['ImgProduct']['name'];
            if ($anh != '') {
                $dich = "../images/product_material/".$anh;
                move_uploaded_file($_FILES['ImgProduct']['tmp_name'],$dich);
                $dich = substr($dich,0);           
            }
            $mota = $_POST['ProductDescription'];
            $trangthai = $_POST['Status'];
            if($dich == "" || $dich == null){
                $sql_sanpham = "UPDATE `sanpham` SET `TenSanPham`='$tensp',`IDLoai`='$loaisp',`IDThuocTinh`='$thuoctinhsp',`IDNhaCungCap`='$nhacc',`MoTaSanPham`='$mota',`TrangThai`='$trangthai' WHERE `IDSanPham`= $id";
            }else{
                $sql_sanpham = "UPDATE `sanpham` SET `TenSanPham`='$tensp',`IDLoai`='$loaisp',`IDThuocTinh`='$thuoctinhsp',`IDNhaCungCap`='$nhacc',`MoTaSanPham`='$mota',`Hinh`='$dich',`TrangThai`='$trangthai' WHERE `IDSanPham`= $id";
            }
            $kq_sanpham = mysqli_query($con, $sql_sanpham);

            if ( $kq_sanpham == True) {
                    ?>
<script>
    alert("Bạn cập nhật sản phẩm");
    window.location = "../admin/index.php?admin=view&IDView=<?php echo $idview;?>";
</script>
<?php
            }else{
                ?>
<script>
    alert("Bạn chưa cập nhật sản phẩm");
</script>
<?php
            }
        }else{
            ?>
<script>
    alert("Bạn phải nhập tên sản phẩm");
</script>
<?php
        }
    }
?>