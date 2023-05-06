<?php
// Processing more product
    if (isset($_POST['form_click'])) {
        if ($_POST['NameProduct'] != '') {
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
            $sql_sanpham = "Insert  into sanpham(TenSanPham,IDLoai,IDThuocTinh,IDNhaCungCap,MoTaSanPham,Hinh,TrangThai) 
            Values ('$tensp','$loaisp','$thuoctinhsp','$nhacc','$mota','$dich','$trangthai')";
            $kq_sanpham = mysqli_query($con, $sql_sanpham);

            if ( $kq_sanpham == True) {
                    ?>
                    <script>
                        alert("Bạn đã thêm sản phẩm");
                        window.location="../admin/?admin=listsanpham";
                    </script>
                    <?php
            }else{
                ?>
                <script>
                    alert("Bạn chưa cập nhập sản phẩm");
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