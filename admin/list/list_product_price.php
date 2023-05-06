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
  <h1 class="text-center text-dark ">Danh sách giá</h1>        
  <table class="table table-bordered table-hover table-dark">
    <thead class="table-success">
      <tr>
        <th width="20px">ID</th>
        <th width="500px">Tên sản phẩm</th>
        <th width="250px">Hình sản phẩm</th>
        <th width="250px">Giá nhập</th>
        <th width="250px">Giá bán</th>
        <th width="300px">Ngày cập nhập giá</th>
      </tr>
    </thead>
    <tbody>
        <?php 
            include('../connet.php');
            $sql = " SELECT * from sanpham s, giasanpham g where s.IDSanPham = g.IDSanPham";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
                    ?>
                     <tr>
                        <td ><?php echo $row['IDGia'];?></td>
                        <td style="text-align: left;"><?php echo $row['TenSanPham'];?></td>
                        <td><img class="card-img-top" style=" max-width:50%; height:atou; margin-right:20px;" src="<?php echo $row['Hinh'];?>"  alt=""></td>
                        <td><?php echo number_format($row['GiaNhap']).' đ';?></td>
                        <td><?php echo number_format($row['GiaBan']).' đ';?></td>
                        <td><?php echo date("d-m-Y", strtotime($row['NgayCapNhap']));?></td>
                    </tr>
                    <?php
                }
            }
        ?>
  </table>
  <a href="?admin=themgiasanpham" class="text-right"><button type="submit" name="form_click" value="save" class="btn btn-outline-success mb-3 btn-lg">Thêm</button></a>
</div>
