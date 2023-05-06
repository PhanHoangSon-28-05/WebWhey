<?php
//Processing more type
    if (isset($_POST['form_click'])) {
        if($_POST['NameType'] != ''){
           $loai = $_POST['NameType'];
           $trangthai = $_POST['StatusType'];
            $sql_loai = "Insert into  loai(TenLoai, Trangthai)
            Values ('$loai','$trangthai')";
            $kq_loai = mysqli_query($con, $sql_loai);

            if ($kq_loai === TRUE) {
                ?>
                    <script>
                        alert("Bạn đã thêm loại");
                        window.location="../admin/?admin=listloaisanpham";
                    </script>
                    <?php
                    
            }else{
                ?>
                <script>
                    alert("Bạn chưa cập nhập loại");
                </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert("Bạn chưa nhập tên loại");
                </script>
            <?php
        }
    }
?>