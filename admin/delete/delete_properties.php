<?php

        $id= filter_input(INPUT_GET,'IDProperties');
        
        $sql_delete = "DELETE FROM thuoctinh where IDThuocTinh =  $id";
        $stmt = mysqli_query($con, $sql_delete); 
        if ($stmt === TRUE) {
            ?>
                <script>
                    alert("Bạn đã xóa thuộc tính sản phẩm")
                    window.location="../admin/?admin=listthuoctinh"
                </script>
                <?php
                
        }else{
            ?>
            <script>
                alert("Bạn chưa xóa thuộc tính sản phẩm")
            </script>
            <?php
        }

?>