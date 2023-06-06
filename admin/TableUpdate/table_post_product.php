<style>
    legend {
        text-shadow: 2px 2px 4px #000000;
    }

    label {
        font-size: 30px;
        color: black;
    }

    textarea {
        margin-top: 10px;
    }
</style>

<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="col-md-12">
            <?php 
            include('../connet.php');
            $id = $_GET['IDBaiViet'];
            $idview = $_GET['IDView'];
            $sql = " SELECT * from baiviet bv, sanpham sp where bv.IDSanPham = sp.IDSanPham and idbaiviet = $id";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row1 = mysqli_fetch_array($kq)) {
        ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend class="text-center"
                        style="font-size:50px; margin-top:20px; margin-bottom:40px; color:black; font-style: bold;">THÊM
                        BÀI VIẾT SẢN PHẨM</legend>
                    <!-- Name Posts -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Tên bài viết: </label>
                        </div>
                        <div class="col-6">
                            <input name="NamePost" type="text" class="form-control" id=""
                                placeholder="Nhập tên bài viết" value="<?php echo $row1['tenbaiviet']?>">
                        </div>
                    </div>
                    <!-- Name Product -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Tên sản phẩm: </label>
                        </div>
                        <div class="col-6">
                            <select style="height:30px; font-size: 20px;" name="idsanpham" id="">
                                <option value="<?php echo $row1['IDSanPham']?>"><?php echo $row1['TenSanPham']?>
                                </option>
                                <?php
                                $id_sanpham = $row1['IDSanPham'];
                                $sql = "Select * from sanpham EXCEPT Select * from sanpham where IDSanPham = $id_sanpham";
                                $sanpham = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($sanpham)) {
                                    echo "<option value =".$row['IDSanPham'].">".$row['TenSanPham']."</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Loại tin: </label>
                        </div>
                        <div class="col-6">
                            <select style="height:30px; font-size: 20px;" name="idloaitin" id="">
                                <option value="<?php echo $row1['idloaitin']?>"><?php
                            $idSanpham = $row1['IDSanPham'];
                            $sql_loaitin = " SELECT * from baiviet bv, loaitin l, sanpham s where bv.idloaitin = l.idloaitin and s.IDSanPham = bv.IDSanPham and bv.IDSanPham = $idSanpham";
                            $kq_loaitin = mysqli_query($con, $sql_loaitin);
                            $row_loaitin = mysqli_fetch_array($kq_loaitin);
                         if (mysqli_num_rows($kq_loaitin) == 0) {
                              echo "Không có";
                          } else {
                              echo $row_loaitin['tenloaitin'];
                          }?>
                                </option>
                                <?php
                                if (mysqli_num_rows($kq_loaitin) == 0) {
                                    $sql_lt = "Select * from loaitin";
                                    $kq_lt = mysqli_query($con, $sql_lt);
                                    while ($row = mysqli_fetch_array($kq_lt)) {
                                        echo "<option value =".$row['idloaitin'].">".$row['tenloaitin']."</option>";
                                    }
                                } else {
                                    $id_loaitin = $row1['idloaitin'];
                                    $sql = "Select * from loaitin EXCEPT  Select * from loaitin where idloaitin = $id_loaitin";
                                    $kq = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_array($kq)) {
                                    echo "<option value =".$row['idloaitin'].">".$row['tenloaitin']."</option>";
                                }
                                }
                                
                            ?>
                            </select>
                        </div>
                    </div>
                    <!-- Image Posts -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Chọn file ảnh:</label>
                        </div>
                        <div class="col-auto">
                            <input class="form-control-sm" style="size:50px;" type="file" name="ImgPosts" id="">
                        </div>
                    </div>
                    <!-- Summary -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Tóm tắt: </label>
                        </div>
                        <div class="col-6">
                            <textarea name="SummaryPosts" id="ProductDescription" class="form-control" rows="5"
                                required="required" value=""><?php echo $row1['tomtat']?></textarea>
                        </div>
                    </div>
                    <!-- Name Content -->
                    <div class="form-group" style="margin-top:20px; margin-bottom:20px;">
                        <tr>
                            <td></td>
                            <td><label for="">Nội dung sản phẩm: </label> </td>
                            <td> <textarea name="PostsContent" id="ProductDescription" class="form-control" rows="15"
                                    required="required" value=""><?php echo $row1['noidung']?></textarea></td>
                        </tr>
                    </div>
                    <p class="text-center"><button type="submit" name="form_click" value="save"
                            class="btn btn-outline-success mb-3 btn-lg">Cập nhật</button></p>
                    <?php
                    }
                }
                    include('Update/update_post.php');
                ?>
                </fieldset>
            </form>

        </div>
    </div>
</div>