<style>
    legend{
        text-shadow: 2px 2px 4px #000000;
    }
    label{
        font-size:30px;
        color: black;
    }
     textarea{
        margin-top:10px;
    }
</style>

<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="col-md-12">
        
            <form action="" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend class="text-center" style="font-size:50px; margin-top:20px; margin-bottom:40px; color:black; font-style: bold;">THÊM BÀI VIẾT SẢN PHẨM</legend>
                <!-- Name Posts -->
                <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                    <div class="col-auto">
                        <label>Tên bài viết: </label>
                    </div>
                    <div class="col-6">
                        <input name="NamePost"  type="text" class="form-control" id="" placeholder="Nhập tên bài viết">
                    </div>  
                </div>
                <!-- Name Product -->
                <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                    <div class="col-auto">
                        <label>Tên sản phẩm: </label>
                    </div>
                    <div class="col-6">
                        <select style="height:30px; font-size: 20px;" name="idsanpham" id="">
                            <option value="">==Chọn Tên Sản Phẩm ==</option>
                            <?php
                                $sql = "Select * from sanpham sp WHERE NOT EXISTS ( Select 1 from baiviet bv where sp.IDSanPham = bv.idSanPham)";
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
                            <option value="">==Chọn Loại Tin==</option>
                            <?php
                                $sql = "Select * from loaitin";
                                $nhacc = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($nhacc)) {
                                    echo "<option value =".$row['idloaitin'].">".$row['tenloaitin']."</option>";
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
                        <input class="form-control-sm"  style="size:50px;" type="file" name="ImgPosts" id="">
                    </div>  
                </div>
                <!-- Summary -->
                <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                    <div class="col-auto">
                        <label>Tóm tắt: </label>
                    </div>
                    <div class="col-6">
                    <textarea name="SummaryPosts" id="ProductDescription" class="form-control" rows="12" required="required"></textarea>
                    </div>  
                </div>
                <!-- Name Content -->
                <div class="form-group" style="margin-top:20px; margin-bottom:20px;">
                    <tr>
                        <td></td>
                        <td><label for="">Nội dung sản phẩm: </label> </td>
                        <td> <textarea name="PostsContent" id="ProductDescription" class="form-control" rows="36" required="required"></textarea></td>
                    </tr> 
                </div>
                <p class="text-center"><button type="submit" name="form_click" value="save" class="btn btn-outline-success mb-3 btn-lg">Thêm</button></p>
                <?php
                    include('Handle/handle_post.php')
                ?>
            </fieldset>
        </form>
       
        </div>
    </div>
</div>
