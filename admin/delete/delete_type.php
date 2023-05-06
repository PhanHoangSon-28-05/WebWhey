<?php

        $idloai= filter_input(INPUT_GET,'IDType');
        
        $sql_delete_loai = "DELETE FROM loai where IDLoai =  $idloai";
        $stmt = mysqli_query($con, $sql_delete_loai); 
        if ($stmt === TRUE) {
            ?>
                <script>
                    alert("Bạn đã xóa loại sản phẩm")
                    window.location="../admin/?admin=listloaisanpham"
                </script>
                <?php
                
        }else{
            ?>
            <script>
                alert("Bạn chưa xóa loại sản phẩm")
            </script>
            <?php
        }

?>