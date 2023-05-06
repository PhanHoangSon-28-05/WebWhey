<style>
    legend{
        text-shadow: 2px 2px 4px #000000;
    }
    label{
        font-size:30px;
        color: black;
    }
     textarea{
        margin-top:10px;
    }

    /*  /* Below are style suggestions for the button */ 
  
  /* #tooltip {
    visibility: hidden;
    background-color: #555;
    color: #fff;
    border-radius: 6px;
    margin-top: -22px;
    padding: 1px 2px;
    position: absolute;
    z-index: 1;
  }
  
  #btn-tooltip:hover + #tooltip {
    visibility: visible;
  } */

</style>



<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="col-md-12">
        <?php 
            include('../connet.php');
            $id = $_GET['IDGia'];
            $idview = $_GET['IDView'];
            $sql = " SELECT * from giasanpham gsp, sanpham sp where gsp.IDSanPham = sp.IDSanPham and IDGia = $id";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row1 = mysqli_fetch_array($kq)) {
        ?>
            <form action="" method="POST">
            <fieldset>
                <legend class="text-center" style="font-size:50px; margin-top:20px; margin-bottom:40px; color:black; font-style: bold;">GIÁ SẢN PHẨM</legend>
                <!-- Name Product -->
                <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                    <div class="col-auto">
                        <label>Tên sản phẩm: </label>
                    </div>
                    <div class="col-6">
                        <select style="height:30px; font-size: 20px;" name="idsanpham" id="">
                        <option value="<?php echo $row1['IDSanPham']?>"><?php echo $row1['TenSanPham']?></option>
                        </select>                    
                    </div>  
                </div>
                <!-- Entry Price -->
                <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                    <div class="col-auto">
                        <label>Giá nhập sản phẩm: </label>
                    </div>
                    <div class="col-auto">
                        <input name="EntryPrice"  type="number" class="form-control" id="" placeholder="Nhập giá khi nhận hàng" value="<?php echo $row1['GiaNhap'];?>">
                    </div>  
                </div>
                <!-- Price -->
                <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                    <div class="col-auto">
                        <label>Giá bán sản phẩm: </label>
                    </div>
                    <div class="col-auto">
                        <input name="Price"  type="number" class="form-control" id="" placeholder="Nhập giá bán ra thị trường" value="<?php echo $row1['GiaBan'];?>">
                    </div>  
                </div>

                <a href="?admin=listgiasanpham"><p ><button id="btn-tooltip" type="submit" name="form_click" value="save" class="btn btn-outline-success mb-3 btn-lg">Cập nhập</button></p></a>
                <!-- Below are suggestions for the button  -->
                <!-- <div id="tooltip"><p class="text-center">Nếu trùng sản phẩm nó sẽ cập nhập</p></div> -->
                <!-- <script>
                    const btnTooltip = document.querySelector('#btn-tooltip');
                    const tooltip = document.querySelector('#tooltip');

                    btnTooltip.addEventListener('mouseover', () => {
                    tooltip.style.visibility = 'visible';
                    });

                    btnTooltip.addEventListener('mouseout', () => {
                    tooltip.style.visibility = 'hidden';
                    });
                </script> -->
                 <?php
                    }
                }
                    include('Handle/handle_product_price.php');
                ?> 
            </fieldset>
        </form>
       
        </div>
    </div>
</div>
