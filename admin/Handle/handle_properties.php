<?php
// Processing more properties
    if (isset($_POST['form_click'])) {
        if($_POST['NameProperties'] != ''){
           $thuoctinh = $_POST['NameProperties'];
            $sql_thuoctinh = "Insert into  thuoctinh(Tenthuoctinh)
            Values ('$thuoctinh')";
            $kq_thuoctinh = mysqli_query($con, $sql_thuoctinh);

            if ($kq_thuoctinh === TRUE) {
                ?>
                    <script>
                        alert("Bạn đã cập nhập thuộc tính");
                        window.location="../admin/?admin=listthuoctinh";
                    </script>
                    <?php
                    
            }else{
                ?>
                <script>
                    alert("Bạn chưa cập nhập thuộc tính");
                </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert("Bạn chưa nhập tên thuộc tính");
                </script>
            <?php
        }
    }
?>