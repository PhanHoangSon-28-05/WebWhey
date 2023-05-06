<style>
  th{
    font-size: 25px;
    text-align: center;
  }
  td{
    font-size:20px;
  }
</style>>

<div class="container ">
  <h1 class="text-center text-dark ">Danh sách nhà cung cấp</h1>        
  <table class="table table-bordered table-hover table-dark">
    <thead class="table-success">
      <tr>
        <th>ID</th>
        <th>Tên nhà cung cấp</th>
        <th width="300px">Địa chỉ</th>
        <th>Số điện thoại</th>
        <th width="200px">Email</th>
        <th colspan="1" style="text-align: center; width: 220px;">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
            include('../connet.php');
            $sql = " SELECT * from nhacungcap";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
                    ?>
                     <tr>
                        <td class="text-center"><?php echo $row['IDNhaCungCap'];?></td>
                        <td><?php echo $row['TenNhaCungCap'];?></td>
                        <td class="text-center"><?php echo $row['DiaChi'];?></td>
                        <td class="text-center"><?php echo $row['SDT'];?></td>
                        <td><?php echo $row['Email'];?></td>
                        <td>
                          <a href="./index.php?admin=updatesupplier&IDSupplier=<?php echo $row['IDNhaCungCap']?>" class="text-right"><button type="submit" name="form_click_capnhap" value="Update" class="btn btn-outline-warning mb-3 btn-lg">Chỉnh sửa</button></a>

                          <a href="./index.php?admin=deletesupplier&IDSupplier=<?php echo $row['IDNhaCungCap']?>" class="text-right"><button type="submit" name="form_click_delete" value="Delete" class="btn btn-outline-danger  mb-3 btn-lg">Xóa</button></a>
                        </tb>
                    </tr>
                    <?php
                }
            }
        ?>
  </table>
  <a href="?admin=themnhacungcap" class="text-right"><button type="submit" name="form_click" value="save" class="btn btn-outline-success mb-3 btn-lg">Thêm</button></a>
</div>
