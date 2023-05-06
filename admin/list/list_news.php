<style>
  th{
    font-size: 25px;
  }
  td p{
    font-size:20px;
  }
</style>

<div class="container">
  <h1 class="text-center text-dark " >Danh sách loại</h1>        
  <table class="table table-bordered table-hover table-dark">
    <thead class="table-success">
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Tên tin tức</th>
        <th class="text-center" width="500px">Ảnh</th>
        <th width="150px">Trạng thái</th>
        <th colspan="1" style="text-align: center; width: 220px;">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
            include('../connet.php');
            $sql = " SELECT * from loaitin";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
                    ?>
                     <tr>
                        <td class="text-center"width="20px"><p><?php echo $row['idloaitin'];?></p></td>
                        <td width="200px"><p><?php echo $row['tenloaitin'];?></p></td>
                        <td class="text-center" width="500"><img class="card-img-top" style="max-width:60%; height:atou; margin-right:20px;" src="<?php echo $row['hinh'];?>"  alt=""></td>
                        <td class="text-center"><p><?php echo $row['trangthai'];?></p></td>
                        <td>
                          <a href="./index.php?admin=updatenew&IDNew=<?php echo $row['idloaitin']?>" class="text-right"><button type="submit" name="form_click_capnhap" value="Update" class="btn btn-outline-warning mb-3 btn-lg">Chỉnh sửa</button></a>

                          <a href="./index.php?admin=delete&IDNew=<?php echo $row['idloaitin']?>" class="text-right"><button type="submit" name="form_click_delete" value="Delete" class="btn btn-outline-danger  mb-3 btn-lg">Xóa</button></a>
                        </tb>
                    </tr>
                    <?php
                }
            }
        ?>
  </table>
  <a href="?admin=themtintuc" class="text-right"><button type="submit" name="form_click" value="save" class="btn btn-outline-success mb-3 btn-lg">Thêm</button></a>
</div>
