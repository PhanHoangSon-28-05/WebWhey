<style>
  th {
    font-size: 25px;
    text-align: center;
  }

  td {
    font-size: 20px;
    text-align: center;
  }

  .clearfix::after {
    content: "";
    display: table;
    clear: both;

  }

  #tooltip {
    font-size: 20px;
    visibility: hidden;
    background-color: red;
    color: black;
    border-radius: 6px;
    margin-top: 80px;
    margin-left: 1200px;
    padding: 1px 2px;
    position: absolute;
    z-index: 1;
  }

  #btn-tooltip:hover+#tooltip {
    visibility: visible;
  }
</style>

<div class="container-fluid mt-3" style="height: 120%;">
  <h1 class="text-center text-dark ">Giỏ Hàng Của Bạn</h1>
  <table class="table">
    <thead>
      <tr>
        <th>Tên sản phẩm</th>
        <th>Hình sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Tổng giá</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <form method="post" enctype="multipart/form-data">
        <?php 
            include('../connet.php');
            $idtaikhoan = $_GET['IDTaiKhoan'];
            $sql = " SELECT * from sanpham s, giasanpham gsp, taikhoan t, giohang gh where s.IDSanPham = gsp.IDSanPham and  s.IDSanPham = gh.IDSanPham and t.IDTaiKhoan = gh.IDTaiKhoan and t.IDTaiKhoan = $idtaikhoan ";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
                    ?>
        <tr>
          <td>
            <a href="./index.php?admin=view_sanpham&IDSanPham=<?php echo $row['IDSanPham'];?>"
              style="text-decoration: none; color: black;">
              <p name="tensanpham"><?php echo $row['TenSanPham'];?></p>
            </a>
          </td>
          <td class="text-center" width="250px">
            <a href="./index.php?admin=view_sanpham&IDSanPham=<?php echo $row['IDSanPham'];?>"><img class="card-img-top"
                style=" max-width:50%; height:atou; margin-right:20px;" src="<?php echo $row['Hinh'];?>" alt=""></a>
          </td>
          <td>
            <p name=""><?php echo $row['SoLuong'];?></p>
          </td>

          <td>
            <p name="GiaBan"><?php echo number_format($row['GiaBan']).' VNĐ';?></p>
          </td>
          <td>
            <p name="TongCong"><?php $tongcong = $row['SoLuong'] * $row['GiaBan']; 
                                  echo number_format($tongcong).' VNĐ';?></p>
          </td>

          <td>
            <a href="#" class="btn btn-outline-warning mb-3 btn-lg" style="text-decoration: none; font-weight: bold;"
              onclick="hienThiDialog()">Thay đổi số lượng</a>
            <a href="./index.php?admin=deletegiohang&IDSanPham=<?php echo $row['IDSanPham'];?>&IDTaiKhoan=<?php echo $idtaikhoan;?>"
              class=" text-danger btn btn-outline-danger  mb-3 btn-lg"
              style="text-decoration: none; font-weight: bold;">Xóa</a>
            <div id="dialog" style="display: none;">
              <form method="POST">
                <input type="hidden" name="masp" value="<?php echo $row['IDSanPham'];?>">
                <label name="" value="">Số lượng:</label>
                <input type="number" name="SoLuong" style="width: 50px;" min="1" max="999">
                <a href="" onclick="thayDoiSoLuong()" style="text-decoration: none; color: black;"><button type="submit"
                    class="btn btn-outline-success  mb-1 btn-lg" name="form_click_capnhap">OK</button></a>
              </form>
            </div>
            <script>
              function hienThiDialog() {
                document.getElementById("dialog").style.display = "block";
              }
            </script>

          </td>

        </tr>
        <?php
                }
            }
        ?>

  </table>
  <div class="clearfix" style=" float: right;">
    <?php 
            $sql_tonghd ="SELECT SUM(SoLuong * sp.GiaBan) FROM `giohang` gh,`giasanpham`sp WHERE gh.IDSanPham = sp.IDSanPham AND gh.IDTaiKhoan =  $idtaikhoan";
            $kq_tonghd = mysqli_query($con, $sql_tonghd);
            $tonghd = mysqli_fetch_array($kq_tonghd)['SUM(SoLuong * sp.GiaBan)'];
          ?>
    <h3 name="TongHD" style="font-weight:bold; color: black;"> <?php echo number_format( $tonghd).' VNVNĐ';?></h3>
    <p style="height: 150px;">
      <a href="./index.php?admin=pay&IDTaiKhoan=<?php echo $idtaikhoan;?> " class="text-center btn btn-outline-success"
        id="btn-tooltip" name="form_click_ThanhToan"
        style="text-decoration: none; margin-top:-5px; font-weight: bold;">Thanh Toán</a>
    </p>
  </div>
  <!-- Below are suggestions for the button -->
  <div id="tooltip">
    <p class="text-center">Khi nhấn thanh toán sẽ không thể hủy được đơn hàng chỉ hủy đơn trực tiếp lúc shipper giao
      hàng</p>
  </div>
  <script>
    const btnTooltip = document.querySelector('#btn-tooltip');
    const tooltip = document.querySelector('#tooltip');

    btnTooltip.addEventListener('mouseover', () => {
      tooltip.style.visibility = 'visible';
    });

    btnTooltip.addEventListener('mouseout', () => {
      tooltip.style.visibility = 'hidden';
    });
  </script>
  <form>


</div>
<?php
          if (isset($_POST['form_click_capnhap'])) {
            $idSanPham =$_POST['masp'];
            $soLuong = $_POST['SoLuong'];
            $sql_CapNhap = "UPDATE giohang SET SoLuong = '$soLuong' WHERE IDSanPham = '$idSanPham' and IDTaiKhoan = '$idtaikhoan'";
            $kq_CapNhap = mysqli_query($con, $sql_CapNhap);
            if ($kq_CapNhap === TRUE) {
              ?>
<script>
  alert(
    "Bạn đã cập nhập bài viết sản phẩm <?php echo 'MaSP:'.$idSanPham.' MaTaiKhoan: '.$idtaikhoan.' Số lượng: '.$soLuong; ?>"
    );
  window.location = "../trangchu/index.php?admin=giohang&IDTaiKhoan=<?php echo $idtaikhoan?>";
</script>
<?php
            }else{
              ?>
<script>
  alert("Bạn đã cập nhập bài viết sản phẩm <?php echo $idSanPham.' '.$idtaikhoan.' '.$soLuong;?>");
  window.location = "../trangchu/index.php?admin=giohang&IDTaiKhoan=<?php echo $idtaikhoan?>";
</script>
<?php
            }
          }
          
        ?>