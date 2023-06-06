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
            $id = $_GET['IDNew'];
            $sql = " SELECT * from loaitin where idloaitin = $id";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
        ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend class="text-center"
                        style="font-size:50px; margin-top:20px; margin-bottom:40px; color:black; font-style: bold;">LOẠI
                        TIN TỨC</legend>
                    <!-- Name News -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Tên loại tin: </label>
                        </div>
                        <div class="col-6">
                            <input name="NameNews" value="<?php echo $row['tenloaitin']; ?>" type="text"
                                class="form-control" id="" placeholder="Nhập tên sản phẩm">
                        </div>
                    </div>
                    <!-- Image News -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Chọn file ảnh:</label>
                        </div>
                        <div class="col-auto">
                            <input class="form-control-sm" style="size:50px;" type="file" name="ImgNews" id="">
                        </div>
                    </div>
                    <!-- Status News -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Trang thái: </label>
                        </div>
                        <div class="col-auto">
                            <input name="StatusNews" value="<?php echo $row['trangthai']; ?>" type="text"
                                class="form-control" id="" placeholder="Tin củ hoặc tin mới">
                        </div>
                    </div>

                    <p class="text-center"><a class="text-right"><button type="submit" name="form_click_capnhap"
                                value="save" class="btn btn-outline-success mb-3 btn-lg">Cập nhật</button></a></p>
                    <?php
                    }
                }
                    include('Update/update_news.php');
                ?>
                </fieldset>
            </form>

        </div>
    </div>
</div>