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

<?php
include('../connet.php');
$mahoadon = $_GET['IDMaHDB'];

?>
<div class="container">
  <h1 class="text-center text-dark ">Danh Hóa Đơn <?php echo $mahoadon;?> </h1>
  <table class="table table-bordered table-hover table-dark">
    <thead class="table-success">
      <tr>
        <th>Tên sản phẩm</th>
        <th width="150px">Số lượng</th>
        <th>Thanh tiền</th>
        <th>Đơn giá</th>
      </tr>
    </thead>
    <tbody>
      <?php 
            
            $sql = "SELECT * from chitietbanhang ctbh, sanpham sp, giasanpham gsp where ctbh.IDSanPham = sp.IDSanPham and gsp.IDSanPham = sp.IDSanPham and ctbh.MaHDB=$mahoadon";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
                    ?>
      <tr>
        <td>
          <p><?php echo $row['TenSanPham'];?></p>
        </td>
        <td>
          <p><?php echo $row['SoLuong'];?></p>
        </td>
        <td>
          <p><?php echo $row['DonGia'];?></p>
        </td>
        <td>
          <p><?php echo number_format($row['DonGia'] * $row['SoLuong']).' VNĐ';?></p>
        </td>
      </tr>
      <?php
                }
            }
        ?>
  </table>

</div>
<div class="container-fluid" style="margin-bottom: 10px;">
  <table class="table table-bordered table-hover table-dark">
    <thead class="table-success">
      <tr>
        <th class="text-center" width="20px">Mã</th>
        <th width="220px">Tên người nhận</th>
        <th>Địa chỉ nhận hàng</th>
        <th width="150px">SĐT</th>
        <th>Ghi chú</th>
        <th width="180px">Tổng tiền</th>
        <th width="220px">Ngày chốt đơn</th>
        <th colspan="1" style="text-align: center; width: 150px;">Tình trạng</th>
      </tr>
    </thead>
    <tbody>
      <?php 
            include('../connet.php');
            $sql = "SELECT * from hoadonbanhang hdbh, thongtinkhachang ttkh, taikhoan t where ttkh.IDTaiKhoan = t.IDTaiKhoan and hdbh.IDKhachHang = ttkh.IDTaiKhoan and hdbh.MaHDB=$mahoadon ";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
                    ?>
      <tr>
        <td>
          <p><?php echo $row['MaHDB'];?></p>
        </td>
        <td>
          <p><?php echo $row['TenNguoiNhan'];?></p>
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
          <p><?php echo number_format( $row['TongTien']).' VNĐ';?></p>
        </td>
        <td>
          <p><?php  echo date("d-m-Y", strtotime($row['NgayTao']));?></p>
        </td>
        <td>
          <p><?php  echo $row['TinhTrangVanChuyen'];?></p>
          </tb>
      </tr>
      <?php
                }
            }
        ?>
  </table>
</div>