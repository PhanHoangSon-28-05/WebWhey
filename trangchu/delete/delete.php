<?php
    
    $idsp= filter_input(INPUT_GET,'IDSanPham');
    $idtaikhoan= filter_input(INPUT_GET,'IDTaiKhoan');
    echo $idtaikhoan.' '.$idsp;
    $sql_delete = "DELETE FROM giohang where IDSanPham = $idsp and IDTaiKhoan=$idtaikhoan";
    $stmt = mysqli_query($con, $sql_delete); 
    if ($stmt === TRUE) {
        ?>
            <script>
                alert("Bạn đã xóa sản phẩm")
                window.location="../trangchu/index.php?admin=giohang&IDTaiKhoan= <?php echo $idtaikhoan; ?>"
            </script>
            <?php
            
    }else{
        ?>
        <script>
            alert("Bạn chưa sản phẩm")
        </script>
        <?php
    }

?>