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


<div class="container ">
  <h1 class="text-center text-dark ">Danh khách hàng</h1>
  <table class="table table-bordered table-hover table-dark">
    <thead class="table-success">
      <tr>
        <th class="text-center" width="20px">ID</th>
        <th>Email</th>
        <th>Họ và tên</th>
        <th>Ngày Sinh</th>
        <th>SĐT</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
            include('../connet.php');
            $sql = "SELECT * from taikhoan tk, thongtinkhachang ttkh where tk.IDTaiKhoan = ttkh.IDTaiKhoan";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
                    ?>
      <tr>
        <td>
          <p><?php echo $row['IDKhachHang'];?></p>
        </td>
        <td>
          <p style="text-align: left;"><?php echo $row['TenDangNhap'];?></p>
        </td>
        <td>
          <p><?php echo $row['Ho']." ".$row['Ten'];?></p>
        </td>
        <td>
          <p><?php echo date("d-m-Y", strtotime($row['NgaySinh']));?></p>
        </td>
        <td>
          <p><?php echo $row['SDT'];?></p>
        </td>
        <td>
          <a href="./index.php?admin=delete_customer&IDKhachHang=<?php echo $row['IDKhachHang']?>"
            style="margin-left: 50px;"><button type="submit" name="form_click_delete" value="Delete"
              class="btn btn-outline-danger  mb-3 btn-lg">Xóa</button></a>
          </tb>
      </tr>
      <?php
                }
            }
        ?>
  </table>
</div>