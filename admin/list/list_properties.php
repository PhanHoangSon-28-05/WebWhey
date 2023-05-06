<style>
  th{
    font-size: 25px;
  }
  td{
    font-size:20px;
  }
</style>>

<div class="container-sm ">
  <h1 class="text-center text-dark ">Danh thuộc tính</h1>        
  <table class="table table-bordered table-hover table-dark">
    <thead class="table-success">
      <tr>
        <th class="text-center" width="20px">ID</th>
        <th>Tên thuộc tính</th>
        <th colspan="1" style="text-align: center; width: 250px;">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
            include('../connet.php');
            $sql = " SELECT * from thuoctinh";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
                    ?>
                     <tr>
                        <td class="text-center"><?php echo $row['IDThuocTinh'];?></td>
                        <td><?php echo $row['Tenthuoctinh'];?></td>
                        <td>
                          <a href="./index.php?admin=updateproperties&IDProperties=<?php echo $row['IDThuocTinh']?>" class="text-right"><button type="submit" name="form_click_capnhap" value="Update" class="btn btn-outline-warning mb-3 btn-lg">Chỉnh sửa</button></a>

                          <a href="./index.php?admin=deleteproperties&IDProperties=<?php echo $row['IDThuocTinh']?>" class="text-right"><button type="submit" name="form_click_delete" value="Delete" class="btn btn-outline-danger  mb-3 btn-lg">Xóa</button></a>
                        </tb>
                    </tr>
                    <?php
                }
            }
        ?>
  </table>
  <a href="?admin=themthuoctinh" class="text-right"><button type="submit" name="form_click" value="save" class="btn btn-outline-success mb-3 btn-lg">Thêm</button></a>
</div>
