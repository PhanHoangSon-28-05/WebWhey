<?php
//Processing more supplier
    if (isset($_POST['form_click'])) {
        if($_POST['NameSupplier'] != ''){
           $ten_nnc = $_POST['NameSupplier'];
           $diachi_nnc = $_POST['AddressSupplier'];
           $sdt_nnc = $_POST['PhoneNumber'];
           $email_ncc = $_POST['Email'];
            $sql_ncc = "INSERT INTO nhacungcap( TenNhaCungCap, DiaChi, SDT, Email)
            Values ('$ten_nnc','$diachi_nnc','$sdt_nnc','$email_ncc')";
            $kq_ncc = mysqli_query($con, $sql_ncc);

            if ($kq_ncc === TRUE) {
                ?>
                    <script>
                        alert("Bạn đã thêm nhà cung cấp");
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