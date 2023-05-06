<?php

        $id= filter_input(INPUT_GET,'IDNew');
        
        $sql_delete = "DELETE FROM loaitin where idloaitin =  $id";
        $stmt = mysqli_query($con, $sql_delete); 
        if ($stmt === TRUE) {
            ?>
                <script>
                    alert("Bạn đã xóa thuộc tính sản phẩm")
                    window.location="../admin/?admin=listtintuc"
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