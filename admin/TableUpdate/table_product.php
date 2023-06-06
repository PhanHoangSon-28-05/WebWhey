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
            $id = $_GET['IDSanPham'];
            $idview = $_GET['IDView'];
            $sql = " SELECT * from  sanpham sp, loai l, thuoctinh tt, nhacungcap ncc where sp.IDLoai = l.IDLoai and tt.IDThuocTinh = sp.IDThuocTinh and ncc.IDNhaCungCap = sp.IDNhaCungCap and  IDSanPham = $id";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row1 = mysqli_fetch_array($kq)) {
        ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend class="text-center"
                        style="font-size:50px; margin-top:20px; margin-bottom:40px; color:black; font-style: bold;">SẢN
                        PHẨM</legend>
                    <!-- Name Product -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Tên sản phẩm: </label>
                        </div>
                        <div class="col-6">
                            <input name="NameProduct" type="text" class="form-control" id=""
                                placeholder="Nhập tên sản phẩm" value="<?php echo $row1['TenSanPham'];?>">
                        </div>
                    </div>
                    <!-- Image Product -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Chọn file ảnh:</label>
                        </div>
                        <div class="col-auto">
                            <input class="form-control-sm" style="size:50px;" type="file" name="ImgProduct" id="">
                        </div>
                    </div>
                    <!-- Name Type -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Loại sản phẩm: </label>
                        </div>
                        <div class="col-6">
                            <select style="height:30px; font-size: 20px;" name="idloai" id="">
                                <option value="<?php echo $row1['IDLoai'];?>"><?php echo $row1['TenLoai'];?></option>
                                <?php
                                $id_loai = $row1['IDLoai'];
                                $sql = "Select * from Loai EXCEPT Select * from Loai where IDLoai = $id_loai";
                                $loai = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($loai)) {
                                    echo "<option value =".$row['IDLoai'].">".$row['TenLoai']."</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <!-- Name Properties -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Thuộc tính sản phẩm: </label>
                        </div>
                        <div class="col-6">
                            <select style="height:30px; font-size: 20px;" name="idthuoctinh" id="">
                                <option value="<?php echo $row1['IDThuocTinh'];?>"><?php echo $row1['Tenthuoctinh'];?>
                                </option>
                                <?php
                                $id_thuoctinh = $row1['IDThuocTinh'];
                                $sql = "Select * from thuoctinh EXCEPT Select * from thuoctinh where IDThuocTinh=$id_thuoctinh";
                                $thuoctinh = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($thuoctinh)) {
                                    echo "<option value =".$row['IDThuocTinh'].">".$row['Tenthuoctinh']."</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <!-- Name Properties -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Nhà cung cấp sản phẩm: </label>
                        </div>
                        <div class="col-6">
                            <select style="height:30px; font-size: 20px;" name="idnhacungcap" id="">
                                <option value="<?php echo $row1['IDNhaCungCap'];?>"><?php echo $row1['TenNhaCungCap'];?>
                                </option>
                                <?php
                                $id_nhacc = $row1['IDNhaCungCap'];
                                $sql = "Select * from nhacungcap EXCEPT Select * from nhacungcap where IDNhaCungCap = $id_nhacc";
                                $nhacc = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($nhacc)) {
                                    echo "<option value =".$row['IDNhaCungCap'].">".$row['TenNhaCungCap']."</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <!-- Product Description -->
                    <div class="form-group" style="margin-top:20px; margin-bottom:20px;">
                        <tr>
                            <td></td>
                            <td><label for="">Mô tả sản phẩm</label> </td>
                            <td><textarea name="ProductDescription" id="ProductDescription" class="form-control"
                                    rows="5" required="required"><?php echo $row1['MoTaSanPham'];?></textarea></td>
                        </tr>
                    </div>
                    <!-- Status -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Trạng thái: </label>
                        </div>
                        <div class="col-3">
                            <input name="Status" type="text" class="form-control" id=""
                                placeholder="Còn hàng, hết hàng, bán chạy" required="required"
                                value="<?php echo $row1['TrangThai'];?>">
                        </div>
                    </div>


                    <p class="text-center"><button type="submit" name="form_click" value="save"
                            class="btn btn-outline-success mb-3 btn-lg">Cập nhật</button></p>
                    <?php
                    }
                }
                    include('Update/update_product.php');
                ?>
                </fieldset>
            </form>

        </div>
    </div>
</div>