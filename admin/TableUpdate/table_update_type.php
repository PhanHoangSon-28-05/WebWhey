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
            $id = $_GET['IDType'];
            $sql = " SELECT * from loai where IDLoai = $id";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
        ?>
            <form action="" method="POST">
                <fieldset>
                    <legend class="text-center"
                        style="font-size:50px; margin-top:20px; margin-bottom:40px; color:black; font-style: bold;">LOẠI
                        SẢN PHẨM</legend>
                    <!-- Name Type -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Tên loại: </label>
                        </div>
                        <div class="col-6">
                            <input name="NameType" value="<?php echo $row['TenLoai']?>" type="text" class="form-control"
                                id="" placeholder="Nhập loại sản phẩm">
                        </div>
                    </div>
                    <!-- Status News -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Trang thái: </label>
                        </div>
                        <div class="col-6">
                            <input name="StatusType" value="<?php echo $row['Trangthai']?>" type="text"
                                class="form-control" id="" placeholder="Còn cung cấp hoặc hết cung cấp">
                        </div>
                    </div>

                    <p class="text-center"><button type="submit" name="form_click_capnhap" value="save"
                            class="btn btn-outline-success mb-3 btn-lg">Cập nhập</button></p>
                    <?php
                       }
                    }
                        include('Update/update_type.php');
                ?>
                </fieldset>

            </form>

        </div>
    </div>
</div>