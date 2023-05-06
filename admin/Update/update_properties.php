<?php
    if (isset($_POST['form_click_capnhap'])) {
        if($_POST['NameProperties'] != ''){
            $idthuoctinh = $_GET['IDProperties'];
            $ten_thuoctinh = $_POST['NameProperties'];
           
            $sql_capnhap_thuoctinh = "UPDATE thuoctinh  SET Tenthuoctinh = '$ten_thuoctinh' where IDThuocTinh =  $idthuoctinh";
                
            $kq_capnhap_thuoctinh = mysqli_query($con, $sql_capnhap_thuoctinh);

            if ($kq_capnhap_thuoctinh === TRUE) {
                ?>
                    <script>
                        alert("Bạn đã cập nhập thuộc tính sản phẩm");
                        window.location="../admin/?admin=listloaisanpham";
                    </script>
                    <?php
                    
            }else{
                ?>
                <script>
                    alert("Bạn chưa cập nhập thuộc tính sản phẩm");
                </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert("Bạn chưa nhập tên nhà cung cấp");
                </script>
            <?php
        }
    }
?>