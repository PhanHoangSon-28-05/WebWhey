<?php

        $idncc = filter_input(INPUT_GET,'IDSupplier');
        
        $sql_delete_nccc = "DELETE FROM nhacungcap where IDNhaCungCap    =  $idncc";
        $stmt = mysqli_query($con, $sql_delete_nccc); 
        if ($stmt === TRUE) {
            ?>
                <script>
                    alert("Bạn đã xóa nhà cung cấp")
                    window.location="../admin/?admin=listnhacungcap"
                </script>
                <?php
                
        }else{
            ?>
            <script>
                alert("Bạn chưa xóa nhà cung cấp")
            </script>
            <?php
        }

?>