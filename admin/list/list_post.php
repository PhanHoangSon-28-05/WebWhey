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

<div class="container ">
  <h1 class="text-center text-dark ">Danh sách bài viết</h1>        
  <table class="table table-bordered table-hover table-dark">
    <thead class="table-success">
      <tr>
        <th width="20px">ID</th>
        <th >Tên sản phẩm</th>
        <th>Loại tin</th>
        <th>Ảnh</th>
      </tr>
    </thead>
    <tbody>
        <?php 
            include('../connet.php');
            $sql = " SELECT * from baiviet bv, loaitin l, sanpham s where bv.idloaitin = l.idloaitin and s.IDSanPham = bv.IDSanPham order by idbaiviet ASC";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
                    ?>
                     <tr>
                        <td><?php echo $row['idbaiviet'];?></td>
                        <td style="text-align: left;"><?php echo $row['TenSanPham'];?></td>
                        <td><?php echo $row['tenloaitin'];?></td>
                        <td width="250px"><img class="card-img-top" style=" max-width:50%; height:atou; margin-right:20px;" src="<?php echo $row['anhminhhoa'];?>"  alt=""></td>
                   
                    </tr>
                    <?php
                }
            }
        ?>
  </table>
  <a href="?admin=themnoidungsanpham" class="text-right"><button type="submit" name="form_click" value="save" class="btn btn-outline-success mb-3 btn-lg">Thêm</button></a>
</div>
