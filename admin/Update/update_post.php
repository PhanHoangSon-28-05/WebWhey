<?php
    if (isset($_POST['form_click'])) {
        if ($_POST['NamePost'] != '') {
            $id = $_GET['IDView'];
            $id_baiviet = $_GET['IDBaiViet'];
            $tenpost = $_POST['NamePost'];
            $sp = $_POST['idsanpham'];
            $loaitin = $_POST['idloaitin'];
            $anh = $_FILES['ImgPosts']['name'];
            if ($anh != '') {
                $dich = "../images/product_material/".$anh;
                move_uploaded_file($_FILES['ImgPosts']['tmp_name'],$dich);
                $dich = substr($dich,0);           
            }
            $tomtat = $_POST['SummaryPosts'];
            $noidung = $_POST['PostsContent'];
            if ($loaitin == "") {
                $sql_post = "UPDATE `baiviet` SET `tenbaiviet`='$tenpost',`anhminhhoa`='$dich',`tomtat`='$tomtat',`noidung`='$noidung',`idSanPham`='$sp' WHERE `idbaiviet`='$id_baiviet'";
            }else{
                $sql_post = "UPDATE `baiviet` SET `tenbaiviet`='$tenpost',`anhminhhoa`='$dich',`tomtat`='$tomtat',`noidung`='$noidung',`idloaitin`='$loaitin',`idSanPham`='$sp' WHERE `idbaiviet`='$id_baiviet'";
            }
            
            $kq_post = mysqli_query($con, $sql_post);

            if ( $kq_post === True) {
                    ?>
                    <script>
                        alert("Bạn đã cập nhập bài viết sản phẩm");
                        window.location="../admin/index.php?admin=view&IDView=<?php echo $id;?>";
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