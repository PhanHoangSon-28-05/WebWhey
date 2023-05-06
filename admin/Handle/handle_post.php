<?php
//Processing more posts
    if (isset($_POST['form_click'])) {
        if ($_POST['NamePost'] != '') {
            $tenpost = $_POST['NamePost'];
            $sp = $_POST['idsanpham'];
            $loaisp = $_POST['idloaitin'];
           
            $anh = $_FILES['ImgPosts']['name'];
            if ($anh != '') {
                $dich = "../images/product_material/".$anh;
                move_uploaded_file($_FILES['ImgPosts']['tmp_name'],$dich);
                $dich = substr($dich,0);           
            }
            $tomtat = $_POST['SummaryPosts'];
            $noidung = $_POST['PostsContent'];
            if ($loaisp == "") {
                $sql_post = "Insert  into baiviet(tenbaiviet,anhminhhoa,tomtat,noidung,idsanpham) 
                Values ('$tenpost','$dich','$tomtat','$noidung','$sp')";
            }else{
                $sql_post = "Insert  into baiviet(tenbaiviet,anhminhhoa,tomtat,noidung,idloaitin,idsanpham) 
                Values ('$tenpost','$dich','$tomtat','$noidung','$loaisp','$sp')";
            }
            $kq_post = mysqli_query($con, $sql_post);

            if ( $kq_post === True) {
                    ?>
                    <script>
                        alert("Bạn đã thêm bài viết sản phẩm");
                        // window.location="../admin/?admin=listnoidungsanpham";
                        window.location="../admin/?admin=themnoidungsanpham";
                    </script>
                    <?php
            }else{
                ?>
                <script>
                    alert("Bạn chưa cập nhập bài viết sản phẩm");
                </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert("Bạn phải nhập tên bài viết sản phẩm");
                </script>
            <?php
        }
    }
?>