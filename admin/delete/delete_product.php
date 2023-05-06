<?php

        $idsp= filter_input(INPUT_GET,'IDView');
        $idLoai= filter_input(INPUT_GET,'IDType');
        $sql_delete = "DELETE FROM sanpham where IDSanPham = $idsp";
        $stmt = mysqli_query($con, $sql_delete); 
        if ($stmt === TRUE) {
            ?>
                <script>
                    alert("Bạn đã xóa sản phẩm")
                    window.location="../admin/index.php?admin=loaisp&IDLoai= <?php echo $idLoai; ?>"
                </script>
                <?php
                
        }else{
            ?>
            <script>
                alert("Bạn chưa xóa sản phẩm")
            </script>
            <?php
        }

?>