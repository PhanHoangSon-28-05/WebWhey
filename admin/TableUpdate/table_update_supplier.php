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
            $id = $_GET['IDSupplier'];
            $sql = " SELECT * from nhacungcap where IDNhaCungCap = $id";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
        ?>

            <form action="" method="POST">
                <fieldset>
                    <legend class="text-center"
                        style="font-size:50px; margin-top:20px; margin-bottom:40px; color:black; font-style: bold;">Cập
                        nhập nhà cung cấp</legend>
                    <!-- Name Supplier -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Tên nhà cung cấp: </label>
                        </div>
                        <div class="col-6">
                            <input name="NameSupplier" value="<?php echo $row['TenNhaCungCap'] ?>" type="text"
                                class="form-control" id="" placeholder="Nhập tên nhà cung cấp">
                        </div>
                    </div>
                    <!-- Address Supplier -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Địa chỉ: </label>
                        </div>
                        <div class="col-6">
                            <input name="AddressSupplier" value="<?php echo $row['DiaChi'] ?>" type="text"
                                class="form-control" id="" placeholder="Nhập địa chỉ nhà cung cấp">
                        </div>
                    </div>
                    <!-- Phone Number -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Số điện thoại: </label>
                        </div>
                        <div class="col-6">
                            <input name="PhoneNumber" value="<?php echo $row['SDT'] ?>" type="number"
                                class="form-control" id="" placeholder="Nhập số điện thoại nhà cung cấp">
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                        <div class="col-auto">
                            <label>Email: </label>
                        </div>
                        <div class="col-6">
                            <input name="Email" value="<?php echo $row['Email'] ?>" type="text" class="form-control"
                                id="" placeholder="Nhập Email nhà cung cấp">
                        </div>
                    </div>

                    <!-- Thêm -->
                    <p class="text-center"><a class="text-right"><button type="submit" name="form_click_capnhap"
                                value="save" class="btn btn-outline-success mb-3 btn-lg">Cập nhật</button></a></p>
                    <?php 
                }
            }
                include('Update/update_supplier.php');
            ?>
                </fieldset>
            </form>


        </div>
    </div>
</div>