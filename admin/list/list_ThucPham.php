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
    <?php 
      include('../connet.php');
      $id = $_GET['IDLoai'];
      $sql = " SELECT * from loai where IDLoai = $id";
      $kq = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($kq)
    ?>
  <h1 class="text-center text-dark ">Danh sách <?php echo $row['TenLoai'];?></h1>        
  <table class="table table-bordered table-hover table-dark">
    <thead class="table-success">
      <tr>
        <th width="20px">ID</th>
        <th>Tên sản phẩm</th>
        <th width="200px">Hình sản phẩm</th>
        <th width="170px">Loại</th>
        <th width="250px">Thuộc tính</th>
        <th width="200px">Nhà cung cấp</th>
        <th width="170px">Trạng thái</th>
        <th  colspan="1" style="text-align: center; width: 180px;">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
            include('../connet.php');
            $id = $_GET['IDLoai'];
            $sql = " SELECT * from sanpham s, loai l, thuoctinh t, nhacungcap n where s.IDLoai = l.IDLoai and s.IDThuocTinh = t.IDThuocTinh and s.IDNhaCungCap = n.IDNhaCungCap and l.IDLoai = $id ORDER BY IDSanPham";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
                    ?>
                     <tr>
                        <td><?php echo $row['IDSanPham'];?></td>
                        <td style="text-align: left;"><?php echo $row['TenSanPham'];?></td>
                        <td class="text-center" width="250px"><img class="card-img-top" style=" max-width:50%; height:atou; margin-right:20px;" src="<?php echo $row['Hinh'];?>"  alt=""></td>
                        <td ><?php echo $row['TenLoai'];?></td>
                        <td><?php echo $row['Tenthuoctinh'];?></td>
                        <td><?php echo $row['TenNhaCungCap'];?></td>
                        <td><?php echo $row['TrangThai'];?></td>
                        <td><a href="./index.php?admin=view&IDView=<?php echo $row['IDSanPham']?>" class="text-right"><button type="submit" name="form_click" value="save" class="btn btn-outline-success mb-3 btn-lg">View</button></a>
                        <a href="./index.php?admin=deleteproduct&IDView=<?php echo $row['IDSanPham'];?>&IDType=<?php echo $id;?>" class="text-right"><button type="submit" name="form_click_delete" value="Delete" class="btn btn-outline-danger  mb-3 btn-lg">Xóa</button></a></td>
                        
                      </tr>
                    <?php
                }
            }
        ?>
  </table>
</div>
