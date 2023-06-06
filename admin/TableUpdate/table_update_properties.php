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
                $id = $_GET['IDProperties'];
                $sql = " SELECT * from thuoctinh where IDThuocTinh = $id";
                $kq = mysqli_query($con, $sql);
                if (mysqli_num_rows($kq) > 0) {
                    while ($row = mysqli_fetch_array($kq)) {
            ?>
            <form action="" method="POST">
                <fieldset>
                    <legend class="text-center"
                        style="font-size:50px; margin-top:20px; margin-bottom:40px; color:black; font-style: bold;">
                        THUỘC TÍNH SẢN PHẨM</legend>
                    <!-- Name Properties -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Tên thuộc tính: </label>
                        </div>
                        <div class="col-6">
                            <input name="NameProperties" value="<?php echo $row['Tenthuoctinh']?>" type="text"
                                class="form-control" id="" placeholder="Nhập thuộc tính sản phẩm">
                        </div>
                    </div>

                    <p class="text-center"><a href=""><button type="submit" name="form_click_capnhap" value="save"
                                class="btn btn-outline-success mb-3 btn-lg">Thêm</button></a></p>
                    <?php
                    }
                }
                     include('Update/update_properties.php');
                ?>
                </fieldset>

            </form>

        </div>
    </div>
</div>