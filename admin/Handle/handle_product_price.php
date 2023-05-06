<?php
//Processing more product prices
    if (isset($_POST['form_click'])) {
        if($_POST['idsanpham'] != ''){
            $id = $_GET['IDView'];
            $idsanpham = $_POST['idsanpham'];
            $gianhap = $_POST['EntryPrice'];
            $giaban = $_POST['Price'];

            $sql_kt_gia = "SELECT * from sanpham sp, giasanpham gs, loai l where sp.IDLoai = l.IDLoai and sp.IDSanPham = gs.IDSanPham and sp. IDSanPham = $idsanpham";
            $kq_kt_gia = mysqli_query($con, $sql_kt_gia);
            $row = mysqli_fetch_array($kq_kt_gia);
            
            if (mysqli_num_rows($kq_kt_gia) >0 ) {
                $idgia = $row['IDGia'];
                $loaisp = $row['IDLoai'];
                $sql_capnhap_gia = "UPDATE giasanpham SET GiaNhap = $gianhap, GiaBan = $giaban, NgayCapNhap = CURDATE() where IDGia =  $idgia";
                
                $kq_capnhap_gia = mysqli_query($con, $sql_capnhap_gia);
                
                if ($kq_capnhap_gia === TRUE) {
                    ?>
                        <script>
                            alert("Bạn đã cập nhập giá")
                            window.location="../admin/index.php?admin=view&IDView=<?php echo $id;?>";
                        </script>
                        <?php
                        
                }
            }else {
                $sql_gia = "INSERT INTO giasanpham( IDSanPham, GiaNhap, GiaBan, NgayCapNhap)
                Values ('$idsanpham','$gianhap','$giaban', CURDATE())";
                $kq_gia = mysqli_query($con, $sql_gia);

                if ($kq_gia === TRUE) {
                    ?>
                        <script>
                            alert("Bạn đã thêm giá");
                            window.location="../admin/?admin=listgiasanpham";
                            // window.location="../admin/?admin=themgiasanpham";
                        </script>
                        <?php
                        
                }else{
                    ?>
                    <script>
                        alert("Bạn chưa thêm giá");
                    </script>
                    <?php
                }
             }
            
        }else{
            ?>
                <script>
                    alert("Bạn chưa nhập tên giá");
                </script>
            <?php
        }
    }
?>