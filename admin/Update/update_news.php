<?php
    if (isset($_POST['form_click_capnhap'])) {
        if($_POST['NameNews'] != ''){
            $idloaitin = $_GET['IDNew'];
            $loaitin = $_POST['NameNews'];
            $anh = $_FILES['ImgNews']['name'];
            if ($anh != '') {
                $dich = "../images/slider/".$anh;
                move_uploaded_file($_FILES['ImgNews']['tmp_name'],$dich);
                $dich = substr($dich,0);           
            }
            $trangthai = $_POST['StatusNews'];
           
            $sql_capnhap_gia = "UPDATE loaitin SET tenloaitin = '$loaitin', hinh = '$dich', trangthai =  '$trangthai' where idloaitin =  $idloaitin";
                
            $kq_capnhap_gia = mysqli_query($con, $sql_capnhap_gia);

            if ($kq_capnhap_gia === TRUE) {
                ?>
<script>
    alert("Bạn đã cập nhật tin");
    window.location = "../admin/?admin=listtintuc";
</script>
<?php
                    
            }else{
                ?>
<script>
    alert("Bạn chưa cập nhật tin");
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