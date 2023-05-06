<?php
//Processing more news
    if (isset($_POST['form_click'])) {
        if($_POST['NameNews'] != ''){
           $loaitin = $_POST['NameNews'];
           $anh = $_FILES['ImgNews']['name'];
           if ($anh != '') {
               $dich = "../images/slider/".$anh;
               move_uploaded_file($_FILES['ImgNews']['tmp_name'],$dich);
               $dich = substr($dich,0);           
           }
           echo $dich;
           $trangthai = $_POST['StatusNews'];
            $sql_loaitin = "Insert into  loaitin(tenloaitin, hinh, trangthai)
            Values ('$loaitin', '$dich','$trangthai')";
            $kq_loaitin = mysqli_query($con, $sql_loaitin);

            if ($kq_loaitin === TRUE) {
                ?>
                    <script>
                        alert("Bạn đã thêm tin");
                        window.location="../admin/?admin=listtintuc";
                    </script>
                    <?php
                    
            }else{
                ?>
                <script>
                    alert("Bạn chưa cập nhập tin");
                </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert("Bạn chưa nhập tên tin");
                </script>
            <?php
        }
    }
?>