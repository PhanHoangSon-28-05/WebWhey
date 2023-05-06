<?php
    if (isset($_POST['form_click_capnhap'])) {
        if($_POST['NameSupplier'] != ''){
            $idncc = $_GET['IDSupplier'];
            echo $idncc;
            $ten_nnc = $_POST['NameSupplier'];
            $diachi_nnc = $_POST['AddressSupplier'];
            $sdt_nnc = $_POST['PhoneNumber'];
            $email_ncc = $_POST['Email'];
           
            $sql_capnhap_nccc = "UPDATE nhacungcap  SET TenNhaCungCap = '$ten_nnc', DiaChi = '$diachi_nnc', SDT = '$sdt_nnc', Email = '$email_ncc' where IDNhaCungCap =  $idncc";
                
            $kq_capnhap_nccc = mysqli_query($con, $sql_capnhap_nccc);

            if ($kq_capnhap_nccc === TRUE) {
                ?>
                    <script>
                        alert("Bạn đã cập nhập nhà cung cấp");
                        window.location="../admin/?admin=listnhacungcap";
                    </script>
                    <?php
                    
            }else{
                ?>
                <script>
                    alert("Bạn chưa cập nhập nhà cung cấp");
                </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert("Bạn chưa nhập tên nhà cung cấp")
                </script>
            <?php
        }
    }
?>