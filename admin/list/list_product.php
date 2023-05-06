<style>
  th{
    font-size: 25px;
    text-align: center;
  }
  td{
    font-size:20px;
    text-align: center;
  }
</style>>

<div class="container-fluid ">
  <h1 class="text-center text-dark ">Danh sách sản phẩm</h1>        
  <table class="table table-bordered table-hover table-dark">
    <thead class="table-success">
      <tr>
        <th width="20px">ID</th>
        <th>Tên sản phẩm</th>
        <th width="200px">Hình sản phẩm</th>
        <th width="200px">Loại</th>
        <th width="250px">Thuộc tính</th>
        <th width="200px">Nhà cung cấp</th>
        <th width="200px">Trạng thái</th>
      </tr>
    </thead>
    <tbody>
        <?php 
            include('../connet.php');
            $sql = " SELECT * from sanpham s, loai l, thuoctinh t, nhacungcap n where s.IDLoai = l.IDLoai and s.IDThuocTinh = t.IDThuocTinh and s.IDNhaCungCap = n.IDNhaCungCap ORDER BY IDSanPham";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
                    ?>
                     <tr>
                        <td ><?php echo $row['IDSanPham'];?></td>
                        <td style="text-align: left;"><?php echo $row['TenSanPham'];?></td>
                        <td class="text-center" width="250px"><img class="card-img-top" style=" max-width:50%; height:atou; margin-right:20px;" src="<?php echo $row['Hinh'];?>"  alt=""></td>
                        <td ><?php echo $row['TenLoai'];?></td>
                        <td><?php echo $row['Tenthuoctinh'];?></td>
                        <td><?php echo $row['TenNhaCungCap'];?></td>
                        <td><?php echo $row['TrangThai'];?></td>
                    </tr>
                    <?php
                }
            }
        ?>
  </table>
  <a href="?admin=themsanpham" class="text-right"><button type="submit" name="form_click" value="save" class="btn btn-outline-success mb-3 btn-lg">Thêm</button></a>
</div>
