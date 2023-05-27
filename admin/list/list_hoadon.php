<style>
  th {
    font-size: 25px;
    text-align: center;
  }

  td p {
    font-size: 20px;
    text-align: center;
  }
</style>


<div class="container-fluid">
  <h1 class="text-center text-dark ">Danh khách hàng</h1>
  <table class="table table-bordered table-hover table-dark">
    <thead class="table-success">
      <tr>
        <th class="text-center" width="20px">Mã</th>
        <th width="220px">Email</th>
        <th width="220px">Họ và tên</th>
        <th>Địa chỉ nhận hàng</th>
        <th width="150px">SĐT</th>
        <th>Ghi chú</th>
        <th width="140px">Tổng tiền</th>
        <th width="220px">Ngày chốt đơn</th>
        <th colspan="1" style="text-align: center; width: 20px;">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
            include('../connet.php');
            $sql = "SELECT * from hoadonbanhang hdbh, thongtinkhachang ttkh, taikhoan t where ttkh.IDTaiKhoan = t.IDTaiKhoan and hdbh.IDKhachHang = ttkh.IDTaiKhoan";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
                    ?>
      <tr>
        <td>
          <p><?php echo $row['MaHDB'];?></p>
        </td>
        <td>
          <p style="text-align: left;"><?php echo $row['TenDangNhap'];?></p>
        </td>
        <td>
          <p><?php echo $row['Ho']." ".$row['Ten'];?></p>
        </td>
        <td>
          <p><?php echo $row['DiaChi'];?></p>
        </td>
        <td>
          <p><?php echo $row['SDT']?></p>
        </td>
        <td>
          <p><?php echo $row['GhiChu'];?></p>
        </td>
        <td>
          <p><?php echo number_format( $row['TongTien']).' đ';?></p>
        </td>
        <td>
          <p><?php  echo date("d-m-Y", strtotime($row['NgayTao']));?></p>
        </td>
        <td>
          <a href="./index.php?admin=chitet_hoadon&IDMaHDB=<?php echo $row['MaHDB']?>" class="text-right"><button
              type="submit" name="form_click_capnhap" value="Update" class="btn btn-outline-warning mb-3 btn-lg">Chi
              tiết</button></a>
          </tb>
      </tr>
      <?php
                }
            }
        ?>
  </table>
</div>